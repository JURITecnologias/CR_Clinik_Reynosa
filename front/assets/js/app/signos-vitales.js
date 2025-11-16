async function updateSignosVitales(signosVitales) {
    try {
        const response = await fetch(apiHost + apiPath + `/signos-vitales/${signosVitales.id}`, {
            method: 'PUT',
            headers: headersRequest,
            body: JSON.stringify(signosVitales)
        });
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return await response.json();
    } catch (error) {
        console.error('Error updating signos vitales:', error);
        throw error;
    }
}

function validarSignosVitales(){
    const temperatura = parseFloat(document.getElementById('frm_signos_vitales_temperatura').value);
    const frecuenciaCardiaca = parseInt(document.getElementById('frm_signos_vitales_frecuencia_cardiaca').value, 10);
    const frecuenciaRespiratoria = parseInt(document.getElementById('frm_signos_vitales_frecuencia_respiratoria').value, 10);
    const saturacionOxigeno = parseFloat(document.getElementById('frm_signos_vitales_saturacion_oxigeno').value);
    const presionArterial = document.getElementById('frm_signos_vitales_presion_arterial').value.trim();
    const peso = parseFloat(document.getElementById('frm_signos_vitales_peso').value);
    //const talla = parseFloat(document.getElementById('frm_signos_vitales_talla').value);
    //const estatura = parseFloat(document.getElementById('frm_signos_vitales_estatura').value);
    let estatura = parseInt(document.getElementById('frm_signos_vitales_estatura').value, 0);

    let isValid = true;

    if (isNaN(temperatura) || temperatura < 20 || temperatura > 50) {
        const errorElement = document.getElementById('invalid_frm_signos_vitales_temperatura');
        errorElement.textContent = 'Por favor, ingrese una temperatura válida entre 20°C y 50°C.';
        document.getElementById('frm_signos_vitales_temperatura').classList.add('is-invalid');
        isValid = false;
    } else {
        document.getElementById('frm_signos_vitales_temperatura').classList.remove('is-invalid');
    }
    if (isNaN(frecuenciaCardiaca) || frecuenciaCardiaca < 40 || frecuenciaCardiaca > 200) {
        const errorElement = document.getElementById('invalid_frm_signos_vitales_frecuencia_cardiaca');
        errorElement.textContent = 'Por favor, ingrese una frecuencia cardiaca válida entre 40 y 200 bpm.';
        document.getElementById('frm_signos_vitales_frecuencia_cardiaca').classList.add('is-invalid');
        isValid = false;
    } else {
        document.getElementById('frm_signos_vitales_frecuencia_cardiaca').classList.remove('is-invalid');
    }
    if (isNaN(frecuenciaRespiratoria) || frecuenciaRespiratoria < 9 || frecuenciaRespiratoria > 150) {
        const errorElement = document.getElementById('invalid_frm_signos_vitales_frecuencia_respiratoria');
        errorElement.textContent = 'Por favor, ingrese una frecuencia respiratoria válida entre 9 y 150 rpm.';
        document.getElementById('frm_signos_vitales_frecuencia_respiratoria').classList.add('is-invalid');
        isValid = false;
    } else {
        document.getElementById('frm_signos_vitales_frecuencia_respiratoria').classList.remove('is-invalid');
    }
    if (isNaN(saturacionOxigeno) || saturacionOxigeno < 50 || saturacionOxigeno > 110) {
        const errorElement = document.getElementById('invalid_frm_signos_vitales_saturacion_oxigeno');
        errorElement.textContent = 'Por favor, ingrese una saturación de oxígeno válida entre 50% y 110%.';
        document.getElementById('frm_signos_vitales_saturacion_oxigeno').classList.add('is-invalid');
        isValid = false;
    } else {
        document.getElementById('frm_signos_vitales_saturacion_oxigeno').classList.remove('is-invalid');
    }
    if (!/^\d{2,3}\/\d{2,3}$/.test(presionArterial)) {
        const errorElement = document.getElementById('invalid_frm_signos_vitales_presion_arterial');
        errorElement.textContent = 'Por favor, ingrese una presión arterial válida en el formato "120/80".';
        document.getElementById('frm_signos_vitales_presion_arterial').classList.add('is-invalid');
        isValid = false;
    } else {
        document.getElementById('frm_signos_vitales_presion_arterial').classList.remove('is-invalid');
    }

    if (!isNaN(peso) && (peso < 1 || peso > 300)) {
        const errorElement = document.getElementById('invalid_frm_signos_vitales_peso');
        errorElement.textContent = 'Por favor, ingrese un peso válido entre 1 kg y 300 kg.';
        document.getElementById('frm_signos_vitales_peso').classList.add('is-invalid');
        isValid = false;
    } 
    if ((document.getElementById('frm_signos_vitales_peso').value.trim() !== '' && (isNaN(peso) || !Number.isInteger(peso)))) {
        const errorElement = document.getElementById('invalid_frm_signos_vitales_peso');
        errorElement.textContent = 'Por favor, ingrese un peso válido como número entero.';
        document.getElementById('frm_signos_vitales_peso').classList.add('is-invalid');
        isValid = false;
    } else {
        document.getElementById('frm_signos_vitales_peso').classList.remove('is-invalid');
    }
    console.log(isValid);
    // if (isNaN(talla) || talla < 30 || talla > 250) {
    //     const errorElement = document.getElementById('invalid_frm_signos_vitales_talla');
    //     errorElement.textContent = 'Por favor, ingrese una talla válida entre 30 cm y 250 cm.';
    //     document.getElementById('frm_signos_vitales_talla').classList.add('is-invalid');
    //     isValid = false;
    // } else {
    //     document.getElementById('frm_signos_vitales_talla').classList.remove('is-invalid');
    // }
    if (!isNaN(estatura) &&  estatura > 250) {
        console.log('entro estatura');
        const errorElement = document.getElementById('invalid_frm_signos_vitales_estatura');
        errorElement.textContent = 'Por favor, ingrese una estatura válida entre 20 cm y 250 cm.';
        document.getElementById('frm_signos_vitales_estatura').classList.add('is-invalid');
        isValid = false;
    }

    if(document.getElementById('frm_signos_vitales_estatura').value.trim() !== '' && (isNaN(estatura) || !Number.isInteger(estatura))) {
         console.log('entro estatura NaN   ');
        const errorElement = document.getElementById('invalid_frm_signos_vitales_estatura');
        errorElement.textContent = 'Por favor, ingrese una estatura válida como número entero.';
        document.getElementById('frm_signos_vitales_estatura').classList.add('is-invalid');
        isValid = false;
    } else {
        document.getElementById('frm_signos_vitales_estatura').classList.remove('is-invalid');
        estatura = isNaN(estatura) ? 0 : estatura;
    }

    if (!isValid) {
            console.log('Peso ingresado:', peso);
        console.log(isValid);
        return;
    }

    return {
        temperatura,
        frecuencia_cardiaca: frecuenciaCardiaca,
        frecuencia_respiratoria: frecuenciaRespiratoria,
        presion_arterial: presionArterial,
        saturacion_oxigeno: saturacionOxigeno,
        peso: peso,
        talla: null,
        estatura: estatura
    };

}

async function EditarSignosVitales(){
    const signosVitales = validarSignosVitales();
    if(!signosVitales) return;
    signosVitales.id = $('#frm_signos_vitales_id').val();
    try {
        disableButtons();
        const updatedSignosVitales = await updateSignosVitales(signosVitales);
        renderAlertMessage('Signos vitales actualizados correctamente.', 'success');
    } catch (error) {
        renderAlertMessage('Error al actualizar los signos vitales. Por favor, intente nuevamente.', 'danger');
    } finally {
        enableButtons();
    }

}