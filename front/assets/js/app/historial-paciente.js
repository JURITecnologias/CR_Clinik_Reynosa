async function insertHistorialMedico(historialData) {
    try {
        const response = await fetch(apiHost + apiPath + '/historial-medico', {
            method: 'POST',
            headers: headersRequest,
            body: JSON.stringify(historialData)
        });
        if (!response.ok) {
            throw new Error('Failed to add medical history: ' + response.statusText);
        }
        return await response.json();
    } catch (error) {
        throw new Error('Error adding medical history: ' + error.message);
    }
}

async function updateHistorialPaciente(idhistorialData, historialData) {
    try {
        const response = await fetch(apiHost + apiPath + '/historial-medico/' + idhistorialData, {
            method: 'PUT',
            headers: headersRequest,
            body: JSON.stringify(historialData)
        });
        if (!response.ok) {
            throw new Error('Failed to update medical history: ' + response.statusText);
        }
        return await response.json();
    } catch (error) {
        throw new Error('Error updating medical history: ' + error.message);
    }
}

async function AddHistorialMedico(idPaciente) {

    let fechaNacimientoInput = document.getElementById('frm_add_paciente_fecha_nacimiento').value;
    let fechaNacimientoFormateada = '';
    let fechaAGuardar = '';
    if (fechaNacimientoInput) {
        const fecha = new Date(fechaNacimientoInput);
        const yyyy = fecha.getFullYear();
        const mm = String(fecha.getMonth() + 1).padStart(2, '0');
        const dd = String(fecha.getDate()).padStart(2, '0');
        fechaNacimientoFormateada = `${yyyy}-${mm}-${dd}`;
        fechaAGuardar = fechaNacimientoFormateada;
    }

    // Convert checkbox or select values to boolean for specific fields
    const transfusionesValue = document.getElementById('frm_add_paciente_transfusiones').checked;
    const fumaValue = document.getElementById('frm_add_paciente_fuma').checked;
    const alcoholValue = document.getElementById('frm_add_paciente_alcohol').checked;
    const apoyoPsicologicoValue = document.getElementById('frm_add_paciente_apoyo_psicologico').checked;

    // Assuming values are "1"/"0", "true"/"false", or "sí"/"no"
    const toBoolean = v => v === '1' || v === 'true' || v === 'sí';

    const transfusionesBool = transfusionesValue;
    const fumaBool = fumaValue;
    const alcoholBool = alcoholValue;
    const apoyoPsicologicoBool = apoyoPsicologicoValue;

    console.log('Transfusiones:', transfusionesBool);
    console.log('Fuma:', fumaBool);
    console.log('Alcohol:', alcoholBool);
    console.log('Apoyo Psicológico:', apoyoPsicologicoBool);    


    const historialData = {
        paciente_id: idPaciente,
        nombre_completo: document.getElementById('frm_add_paciente_nombres').value + ' ' + document.getElementById('frm_add_paciente_apellidos').value,
        fecha_nacimiento: fechaAGuardar,
        sexo: document.getElementById('frm_add_paciente_sexo').value,
        estado_civil: document.getElementById('frm_add_paciente_estado_civil').value,
        direccion: document.getElementById('frm_add_paciente_direccion').value,
        telefono: document.getElementById('frm_add_paciente_telefono').value,
        contacto_emergencia: document.getElementById('frm_add_paciente_contacto_emergencia').value,
        enfermedades_cronicas: document.getElementById('frm_add_paciente_enfermedades_cronicas').value,
        hospitalizaciones_previas: document.getElementById('frm_add_paciente_hospitalizaciones_previas').value,
        medicamentos_actuales: document.getElementById('frm_add_paciente_medicamentos_actuales').value,
        alergias: document.getElementById('frm_add_paciente_alergias').value,
        transfusiones: transfusionesBool,
        vacunas_recientes: document.getElementById('frm_add_paciente_vacunas_recientes').value,
        antecedentes_familiares: document.getElementById('frm_add_paciente_antecedentes_familiares').value,
        fuma: fumaBool,
        frecuencia_tabaco: document.getElementById('frm_add_paciente_frecuencia_tabaco').value,
        alcohol: alcoholBool,
        sustancias_psicoactivas: document.getElementById('frm_add_paciente_sustancias_psicoactivas').value,
        frecuencia_tabaco: document.getElementById('frm_add_paciente_frecuencia_tabaco').value,
        frecuencia_alcohol: document.getElementById('frm_add_paciente_frecuencia_alcohol').value,
        alimentacion: document.getElementById('frm_add_paciente_alimentacion').value,
        actividad_fisica: document.getElementById('frm_add_paciente_actividad_fisica').value,
        apoyo_psicologico: apoyoPsicologicoBool,
        ocupacion: document.getElementById('frm_add_paciente_ocupacion').value,
        notas: document.getElementById('frm_add_paciente_notas').value
    };

    try {
        const newHistorial = await insertHistorialMedico(historialData);
        console.log('Medical history added successfully:', newHistorial);
        return newHistorial;
    } catch (error) {
        console.error('Error adding medical history:', error);
        throw error;
    }
}

async function EditHistorialMedicoPaciente(idhistorialData) {

    let fechaNacimientoInput = document.getElementById('frm_add_paciente_fecha_nacimiento').value;
    let fechaNacimientoFormateada = '';
    let fechaAGuardar = '';
    if (fechaNacimientoInput) {
        const fecha = new Date(fechaNacimientoInput);
        const yyyy = fecha.getFullYear();
        const mm = String(fecha.getMonth() + 1).padStart(2, '0');
        const dd = String(fecha.getDate()).padStart(2, '0');
        fechaNacimientoFormateada = `${yyyy}-${mm}-${dd}`;
        fechaAGuardar = fechaNacimientoFormateada;
    }

    // Convert checkbox or select values to boolean for specific fields
    const transfusionesValue = document.getElementById('frm_add_paciente_transfusiones').checked;
    const fumaValue = document.getElementById('frm_add_paciente_fuma').checked;
    const alcoholValue = document.getElementById('frm_add_paciente_alcohol').checked;
    const apoyoPsicologicoValue = document.getElementById('frm_add_paciente_apoyo_psicologico').checked;

    // Assuming values are "1"/"0", "true"/"false", or "sí"/"no"
    const toBoolean = v => v === '1' || v === 'true' || v === 'sí';

    const transfusionesBool = transfusionesValue;
    const fumaBool = fumaValue;
    const alcoholBool = alcoholValue;
    const apoyoPsicologicoBool = apoyoPsicologicoValue;

    console.log('Transfusiones:', transfusionesBool);
    console.log('Fuma:', fumaBool);
    console.log('Alcohol:', alcoholBool);
    console.log('Apoyo Psicológico:', apoyoPsicologicoBool);    


    const historialData = {
        nombre_completo: document.getElementById('frm_add_paciente_nombres').value + ' ' + document.getElementById('frm_add_paciente_apellidos').value,
        fecha_nacimiento: fechaAGuardar,
        sexo: document.getElementById('frm_add_paciente_sexo').value,
        estado_civil: document.getElementById('frm_add_paciente_estado_civil').value,
        direccion: document.getElementById('frm_add_paciente_direccion').value,
        telefono: document.getElementById('frm_add_paciente_telefono').value,
        contacto_emergencia: document.getElementById('frm_add_paciente_contacto_emergencia').value,
        enfermedades_cronicas: document.getElementById('frm_add_paciente_enfermedades_cronicas').value,
        hospitalizaciones_previas: document.getElementById('frm_add_paciente_hospitalizaciones_previas').value,
        medicamentos_actuales: document.getElementById('frm_add_paciente_medicamentos_actuales').value,
        alergias: document.getElementById('frm_add_paciente_alergias').value,
        transfusiones: transfusionesBool,
        vacunas_recientes: document.getElementById('frm_add_paciente_vacunas_recientes').value,
        antecedentes_familiares: document.getElementById('frm_add_paciente_antecedentes_familiares').value,
        fuma: fumaBool,
        frecuencia_tabaco: document.getElementById('frm_add_paciente_frecuencia_tabaco').value,
        alcohol: alcoholBool,
        sustancias_psicoactivas: document.getElementById('frm_add_paciente_sustancias_psicoactivas').value,
        frecuencia_tabaco: document.getElementById('frm_add_paciente_frecuencia_tabaco').value,
        frecuencia_alcohol: document.getElementById('frm_add_paciente_frecuencia_alcohol').value,
        alimentacion: document.getElementById('frm_add_paciente_alimentacion').value,
        actividad_fisica: document.getElementById('frm_add_paciente_actividad_fisica').value,
        apoyo_psicologico: apoyoPsicologicoBool,
        ocupacion: document.getElementById('frm_add_paciente_ocupacion').value,
        notas: document.getElementById('frm_add_paciente_notas').value
    };

    try {
        const newHistorial = await updateHistorialPaciente(idhistorialData, historialData);
        console.log('Medical history updated successfully:', newHistorial);
        return newHistorial;
    } catch (error) {
        console.error('Error updating medical history:', error);
        throw error;
    }
}

