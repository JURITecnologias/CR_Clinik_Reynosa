<?php

namespace App\Http\Controllers;

use App\Models\SignosVitales;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

use function Psy\debug;

class PdfRecetaController extends Controller
{
    public function generar(Request $request)
    {
        $p = $request->query('p');
        
        // Validate that $p is a valid UUID
        if (!preg_match('/^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}$/', $p)) {
            return response()->json(['error' => 'Invalid UUID format for parameter p'], 400);
        }

        // Buscar el UUID en la base de datos
        $receta = \App\Models\RecetaMedica::with(['paciente', 'doctor', 'consulta'])
            ->where('uuid', $p)
            ->first();

        if (!$receta) {
            return response()->json(['error' => 'Receta no encontrada para el UUID proporcionado'], 404);
        }
        $doctorInfo = $receta->doctor;
        $paciente = $receta->paciente;

        $signosVitales = $receta->signos_vitales ?? [];
        $medicamentos = $receta->medicamentos ?? [];


        $pdf = new Fpdf('P', 'mm', 'Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 9);
        $pdf->SetTitle('Cruz Roja -Receta Medica -' . $receta->uuid);
        $pdf->SetAuthor('Dr. ' . $doctorInfo->nombre_completo);
        $pdf->SetSubject('Receta Medica');
        $pdf->SetKeywords('Receta, Medica, Consulta,Firma Digital, Cruz Roja');
        $pdf->SetCreator($receta->certificate);

        // Marco superior
        $pdf->SetDrawColor(255, 0, 0); // Rojo
        $pdf->SetLineWidth(1);
        $pdf->SetLineWidth(0.5); // Definir el grosor de la línea
        $pdf->Line(5, 10, 63.33, 10, 'D'); // Línea horizontal que ocupa un tercio del ancho de la página
        // Insertar imagen
        try {
           $pdf->Image(public_path('assets\\images\\logo-receta-superior-f4.png'), 69.33, 0, 83.33, 25); // Ajusta la posición y tamaño según sea necesario
        } catch (\Exception $e) {
            // Manejar el error si la imagen no se encuentra
            // Por ejemplo, puedes registrar el error o mostrar un mensaje
            try {
                $pdf->Image(public_path('assets/images/logo-receta-superior-f4.png'), 69.33, 0, 83.33, 25); // Ajusta la posición y tamaño según sea necesario
            } catch (\Throwable $th) {
                throw $th;
            }
        }
        
        $pdf->Line(155, 10, 210, 10, 'D'); // Línea horizontal que ocupa un poco más de un tercio del ancho de la página

        // Línea vertical
        $pdf->Line(5, 10, 5, 135, 'D'); // Línea vertical de 20 cm desde el inicio de la primera línea
        // Línea vertical del lado derecho
        $pdf->Line(210, 10, 210, 135, 'D'); // Línea vertical de 20 cm desde el inicio de la primera línea

        $pdf->Line(5, 55, 210, 55, 'D'); // Línea horizontal en Y=55
        // Agregar texto centrado
        $pdf->SetXY(133, 24); // Establecer posición inicial
        $pdf->MultiCell(75, 5, utf8_decode("BLVD. MORELOS Y ARGENTINA S.N\nCOL. ANZALDÚAS CD. REYNOSA, TAMAULIPAS\nC.P. 88630"), 0, 'C');

        // datos del doctor
        $pdf->SetXY(5, 30); // Establecer posición inicial
        $pdf->SetFont('Arial', 'B', 12); // Cambiar a negritas
        // Calcular el ancho del texto para centrarlo
        $doctorName = utf8_decode("DR.". strtoupper($doctorInfo->nombre_completo));
        $title = utf8_decode($doctorInfo->titulo);

        $nameWidth = $pdf->GetStringWidth($doctorName);
        $titleWidth = $pdf->GetStringWidth($title);

        // Calcular la posición X para centrar el texto
        $pageWidth = 85; // Ancho del área donde se centrará el texto
        $nameX = (15 + ($pageWidth - $nameWidth) / 2); // Ajustar el margen izquierdo
        $titleX = (15 + ($pageWidth - $titleWidth) / 2);

        // Imprimir el nombre del doctor centrado
        $pdf->SetXY($nameX, 25); // Establecer posición inicial
        $pdf->Cell($nameWidth, 5, $doctorName, 0, 0, 'C');

        // Imprimir el título del doctor centrado
        $pdf->SetFont('Arial', '', 7); // Volver a la fuente normal si es necesario
        $pdf->SetXY($titleX, 30); // Establecer posición inicial
        $pdf->Cell($titleWidth, 5, $title, 0, 0, 'C');


        // datos del doctor cedula y telefono en la misma línea
        $pdf->SetXY(5, 40); // Establecer posición inicial
        $pdf->SetFont('Arial', 'B', 9); // Cambiar a negritas
        $cedulaTelefono = utf8_decode("CÉDULA PROFESIONAL:" . $doctorInfo->cedula_profesional . "    TEL. MÉDICO: " . $doctorInfo->telefono);
        $cedulaTelefonoWidth = $pdf->GetStringWidth($cedulaTelefono);
        $cedulaTelefonoX = (15 + ($pageWidth - $cedulaTelefonoWidth) / 2); // Ajustar el margen izquierdo
        $pdf->SetXY($cedulaTelefonoX, 40); // Establecer posición inicial
        $pdf->Cell($cedulaTelefonoWidth, 5, $cedulaTelefono, 0, 0, 'C');
        
        // Obtener la fecha de creación de la consulta
        $fechaConsulta = $receta->consulta->created_at;

        // Formatear la fecha para obtener día, mes y año
        $diaConsulta = $fechaConsulta->format('d');
        $mesConsulta = $fechaConsulta->format('m');
        $anioConsulta = $fechaConsulta->format('Y');

        // Mapeo de números de mes a nombres de mes en español
        $meses = [
            '01' => 'ENE',
            '02' => 'FEB',
            '03' => 'MAR',
            '04' => 'ABR',
            '05' => 'MAY',
            '06' => 'JUN',
            '07' => 'JUL',
            '08' => 'AGO',
            '09' => 'SEP',
            '10' => 'OCT',
            '11' => 'NOV',
            '12' => 'DIC',
        ];
        $mesConsultaTexto = $meses[$mesConsulta];

        $pdf->SetTextColor(255, 0, 0); // Establecer el color del texto a rojo
        $pdf->SetFont('Arial', 'B', 9); // Cambiar a negritas
        $pdf->SetXY(133, 40); // Establecer posición inicial
        $pdf->MultiCell(75, 5, utf8_decode("FECHA CONSULTA $diaConsulta / $mesConsultaTexto / $anioConsulta"), 0, 'C');
        $pdf->SetTextColor(0, 0, 0); // Restablecer el color del texto a negro


        $pdf->SetTextColor(255, 0, 0); // Establecer el color del texto a rojo
        $pdf->SetXY(7, 50); // Establecer posición inicial
        $pdf->SetFont('Arial', 'B', 9); // Cambiar a negritas
        $nombrePaciente = strtoupper($paciente->nombre . " " . $paciente->apellido);
        $nombrePacienteLabel = "PACIENTE:   ".$nombrePaciente;
        $nombrePacienteWidth = $pdf->GetStringWidth($nombrePacienteLabel);
        $pdf->Cell($nombrePacienteWidth, 5, utf8_decode($nombrePacienteLabel), 0, 0, 'C');

        $pdf->SetXY(111, 50);
        $TAPacienteLabel = utf8_decode("T/A: ". $signosVitales['presion'] ?? 'N/A');
        $TAPacienteWidth = $pdf->GetStringWidth($TAPacienteLabel);
        $pdf->Cell($TAPacienteWidth, 5, $TAPacienteLabel, 0, 0, 'C');

        $pdf->SetXY(141, 50);
        $edadPacienteLabel = utf8_decode("EDAD:  " . $this->calcularEdad($paciente->fecha_nacimiento) . " AÑOS");
        $edadPacienteWidth = $pdf->GetStringWidth($edadPacienteLabel);
        $pdf->Cell($edadPacienteWidth, 5, $edadPacienteLabel, 0, 0, 'C');

        $pdf->SetXY(180, 50);
        $pesoPacienteLabel = utf8_decode("PESO: " . (isset($signosVitales['peso']) ? $signosVitales['peso'] : 'N/A') . " KG");
        $pesoPacienteWidth = $pdf->GetStringWidth($pesoPacienteLabel);
        $pdf->Cell($pesoPacienteWidth, 5, $pesoPacienteLabel, 0, 0, 'C');


        $pdf->SetFont('Arial', '', 9); // Cambiar a negritas
        $pdf->SetTextColor(0, 0, 0); // Restablecer el color del texto a negro
        $starPosY = 57;
        $lineHeight = 10;
        // Agregar líneas de texto para la receta médica, aquí se agregan los medicamentos
        for ($i = 0; $i < count($medicamentos); $i++) {

            $medicamento = utf8_decode($medicamentos[$i]['nombre']. " dosis:  ". $medicamentos[$i]['dosis']. " cada ". $medicamentos[$i]['frecuencia']." por ". $medicamentos[$i]['duracion']);
            $pdf->SetXY(7, $starPosY + ($i * ($lineHeight - 3))); // Reducir el margen ajustando el espacio entre líneas
            $pdf->Cell(0, 5, $medicamento, 0, 1, 'L');
            
        }

        // si hay servicios medicos agregarlos
        $serviciosMedicos = $receta->servicios_medicos ?? [];
        if (count($serviciosMedicos) > 0) {
            $pdf->SetFont('Arial', 'B', 9); // Cambiar a negritas
            $pdf->SetXY(7, $starPosY + (count($medicamentos) * ($lineHeight - 3)) + 5); // Reducir el margen ajustando el espacio entre líneas
            $pdf->Cell(0, 5, utf8_decode("SERVICIOS MÉDICOS: "), 0, 1, 'L');
            $pdf->SetFont('Arial', '', 9); // Cambiar a negritas
            for ($j = 0; $j < count($serviciosMedicos); $j++) {
                $servicio = utf8_decode("- " . $serviciosMedicos[$j]['nombre']. " ". ($serviciosMedicos[$j]['solicitud'] ?? ''));
                $pdf->SetXY(7, $starPosY + ((count($medicamentos) + $j) * ($lineHeight - 3)) + 10); // Reducir el margen ajustando el espacio entre líneas
                $pdf->Cell(0, 5, $servicio, 0, 1, 'L');
            }
        }
        
        
        $pdf->Line(5, 135, 210, 135, 'D'); // Línea horizontal que conecta las dos líneas verticales


        $pdf->SetXY(7, 135-5); // Reducir el margen ajustando el espacio entre líneas
        $diagnosticoPacienteLabel = utf8_decode("DIAGNÓSTICO PROBABLE: " . strtoupper($receta->diagnostico));
        $diagnosticoPacienteWidth = $pdf->GetStringWidth($diagnosticoPacienteLabel);
        $pdf->Cell($diagnosticoPacienteWidth, 5, $diagnosticoPacienteLabel, 0, 0, 'C');

        $ultimos = substr($receta->certificate, -100);
        $ultimoslength = $pdf->GetStringWidth("Frima Digital: ".$ultimos);
        // Agregar texto centrado para la firma digital
        $pdf->SetFont('Arial', '',7); // Cambiar a negritas
        $pdf->setXY(5, 136);
        $pdf->Cell($ultimoslength, 5, utf8_decode("Frima Digital: ".$ultimos), 0, 0, 'C');

        //revisamos si tiene la firma del doctor en la base de datos

        if ($doctorInfo->firma) {
            // Decodificar la imagen base64
            $base64Image = $doctorInfo->firma;
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));
            $tempImagePath = tempnam(sys_get_temp_dir(), 'firma_') . '.png';
            file_put_contents($tempImagePath, $imageData);

            // Insertar la imagen en el PDF (ajusta la posición y tamaño según sea necesario)
            $pdf->Image($tempImagePath, 160, 135 - 15, 40, 15); // Ajusta la posición y tamaño según sea necesario
            //$pdf->Image($tempImagePath, 160, 90, 50, 50); // Ajusta la posición y tamaño según sea necesario
            // Eliminar el archivo temporal
            unlink($tempImagePath);
        }
        
        $qrUrl = url('recetas/verificacion') . '?uuid=' . $receta->uuid;
        $qrCode = new QrCode($qrUrl);
        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        $tempPath = storage_path('app/temp_qr.png');
        file_put_contents($tempPath, $result->getString());

        // Insertar el QR en el PDF
        $pdf->Image($tempPath, 183, 57, 25, 25); // Ajusta posición y tamaño

        // Opcional: eliminar el archivo temporal después
        unlink($tempPath);

        
        // Descargar directamente
        return response($pdf->Output('S', $receta->uuid.'.pdf'))
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="'.$receta->uuid.'.pdf"');
    }

    private function calcularEdad($fechaNacimiento)
    {
        $fechaNacimiento = new \DateTime($fechaNacimiento);
        $hoy = new \DateTime();
        $edad = $hoy->diff($fechaNacimiento)->y;
        return $edad;
    }
}
