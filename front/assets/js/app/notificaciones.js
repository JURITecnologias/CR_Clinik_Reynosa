async function getNotificaciones(per_page = 10, page = 1,todas = false) {
    try {
        const response = await fetch(apiHost+apiPath+'/notificaciones?per_page=' + per_page + '&page=' + page + (todas ? '&todas=' + todas : ''), {
            method: 'GET',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Error en la solicitud: ' + response.status);
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error al obtener notificaciones:', error);
        throw error;
    }
}

async function getNotificacionesByRoles(roles) {
    try {
        const response = await fetch(apiHost+apiPath+'/notificaciones/roles?roles[]=' + roles.join('&roles[]='), {
            method: 'GET',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Error en la solicitud: ' + response.status);
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error al obtener notificaciones por roles:', error);
        throw error;
    }
}

async function getNotificacionesNoLeidas() {
    try {
        const response = await fetch(apiHost+apiPath+'/notificaciones/no-leidas', {
            method: 'GET',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Error en la solicitud: ' + response.status);
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error al obtener notificaciones no leídas:', error);
        throw error;
    }
}

async function getNotificacionesGlobales() {
    try {
        const response = await fetch(apiHost+apiPath+'/notificaciones/globales', {
            method: 'GET',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Error en la solicitud: ' + response.status);
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error al obtener notificaciones globales:', error);
        throw error;
    }
}

async function marcarNotificacionComoLeida(id) {
    try {
        const response = await fetch(apiHost+apiPath+`/notificaciones/${id}/marcar-leida`, {
            method: 'POST',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Error en la solicitud: ' + response.status);
        }

        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error al marcar notificación como leída:', error);
        throw error;
    }
}

async function getNotificacionById(id) {
    try {
        const response = await fetch(apiHost+apiPath+`/notificaciones/${id}`, {
            method: 'GET',
            headers: headersRequest
        });
        if (!response.ok) {
            throw new Error('Error en la solicitud: ' + response.status);
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error al obtener notificación por ID:', error);
        throw error;
    }
}

async function crearNotificacion(notificacionData) {
    try {
        const response = await fetch(apiHost+apiPath+'/notificaciones', {
            method: 'POST',
            headers: headersRequest,
            body: JSON.stringify(notificacionData)
        });
        if (!response.ok) {
            throw new Error('Error en la solicitud: ' + response.status);
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error al crear notificación:', error);
        throw error;
    }
}

async function actualizarNotificacion(id, notificacionData) {
    try {
        const response = await fetch(apiHost+apiPath+`/notificaciones/${id}`, {
            method: 'PUT',
            headers: headersRequest,
            body: JSON.stringify(notificacionData)
        });
        if (!response.ok) {
            throw new Error('Error en la solicitud: ' + response.status);
        }
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error al actualizar notificación:', error);
        throw error;
    }
}

let notificacionesSinLeer = [];

function renderNotificacionesGlobales(notificaciones) {
    const container = document.getElementById('alert-global-notifications');
    container.innerHTML = ''; // Limpiar contenido previo
    notificaciones.forEach(notificacion => {
        const alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-warning border border-warning text-dark';
        alertDiv.setAttribute('role', 'alert');
        alertDiv.innerHTML = `
            <strong>Alerta - </strong> ${notificacion.descripcion}`;
        container.appendChild(alertDiv);
    });
}

function renderNotificacionUser(notificacion) {
    const container = document.getElementById('notificaciones-usuario');
    const notificacionDiv = document.createElement('div');
    notificacionDiv.className = 'dropdown-item notification-item py-3 text-wrap border-bottom';
    let dotColor = 'bg-primary';
    if (notificacion.tipo === 'critica') {
        notificacionDiv.classList.add('background-critica', 'bg-danger', 'text-white');
        dotColor = 'bg-white';
    } else if (notificacion.tipo === 'informativa') {
        notificacionDiv.classList.add('background-informativa', 'bg-primary', 'text-white');
        dotColor = 'bg-white';
    } else if (notificacion.tipo === 'urgente') {
        notificacionDiv.classList.add('background-urgente', 'bg-warning');
        dotColor = 'bg-dark';
    }
    notificacionDiv.id = `notification-${notificacion.id}`;
    notificacionDiv.innerHTML = `
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="mb-0 fw-medium">Alerta - ${notificacion.tipo.charAt(0).toUpperCase() + notificacion.tipo.slice(1)}</p>
                                        <p class="mb-1 text-wrap">
                                            ${notificacion.descripcion}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fs-12"><i class="ti ti-clock me-1"></i>${calcularTiempoTranscurrido(notificacion.created_at)}</span>
                                            <div class="notification-action d-flex align-items-center float-end gap-2">
                                                <a href="javascript:marcarComoLeida(${notificacion.id});" class="notification-read rounded-circle ${dotColor}" data-bs-toggle="tooltip" title="" data-bs-original-title="Marcar como leído" aria-label="Marcar como leído"></a>
                                                <button class="btn rounded-circle p-0" onclick="removeAndMarkAsRead(${notificacion.id});" data-bs-toggle="tooltip" title="" data-bs-original-title="Cerrar" aria-label="Cerrar">
                                                    <i class="ti ti-x"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    `;
    container.appendChild(notificacionDiv);
}


async function loadGlobalNotifications() {
    try {
        const notificaciones = await getNotificacionesGlobales();
        console.log('Notificaciones globales:', notificaciones);
        renderNotificacionesGlobales(notificaciones.data);
    } catch (error) {
        console.error('Error al cargar notificaciones globales:', error);
    }
}

async function loadNotificacionesUsuario() {
    try {
        const user = JSON.parse(sessionStorage.getItem('user'));
        if (!user || !user.roles) {
            console.error('Usuario no autenticado o sin roles.');
            return;
        }
        const roles = user.roles;
        const notificaciones = await getNotificaciones(10, 1, false);
        console.log('Notificaciones por roles:', notificaciones);
        notificacionesSinLeer=notificaciones.data.filter(n => !n.leida);
        if(notificacionesSinLeer.length === 0 ) document.getElementById('notification-icon').classList.remove('animate-ring');
        notificaciones.data.slice(0, 4).forEach(notificacion => {
            if(!notificacion.leida) renderNotificacionUser(notificacion);
        });
        //document.querySelector('.notification-badge').textContent = notificacionesSinLeer.length;
    } catch (error) {
        console.error('Error al cargar notificaciones de usuario:', error);
    }   
}


function calcularTiempoTranscurrido(fechaNotificacion) {
    const ahora = new Date();
    const fecha = new Date(fechaNotificacion);
    const diferencia = Math.floor((ahora - fecha) / 1000); // Diferencia en segundos

    if (diferencia < 60) {
        return `hace ${diferencia} segundos`;
    } else if (diferencia < 3600) {
        const minutos = Math.floor(diferencia / 60);
        return `hace ${minutos} minuto${minutos !== 1 ? 's' : ''}`;
    } else if (diferencia < 86400) {
        const horas = Math.floor(diferencia / 3600);
        return `hace ${horas} hora${horas !== 1 ? 's' : ''}`;
    } else {
        const dias = Math.floor(diferencia / 86400);
        return `hace ${dias} día${dias !== 1 ? 's' : ''}`;
    }
}

async function removeAndMarkAsRead(id) {
    const notificacionDiv = document.getElementById(`notification-${id}`);
    if (notificacionDiv) {
        notificacionDiv.remove();
        try {
            await marcarNotificacionComoLeida(id);
            notificacionesSinLeer = notificacionesSinLeer.filter(n => n.id !== id);
            if(notificacionesSinLeer.length === 0 ) document.getElementById('notification-icon').classList.remove('animate-ring');
            //document.querySelector('.notification-badge').textContent = notificacionesSinLeer.length;
        } catch (error) {
            console.error('Error al marcar notificación como leída:', error);
        }
    }   
}

async function marcarComoLeida(id) {
    try {
        await marcarNotificacionComoLeida(id);
    } catch (error) {
        console.error('Error al marcar notificación como leída:', error);
    }
}

