async function getRoles() {
    const response = await fetch(apiHost+apiPath+'/roles', {
        method: 'GET',
        headers: headersRequest,
    });

    if (!response.ok) {
        throw new Error('failed to fetch: ' + response.statusText);
    }

    return await response.json();
}

async function LoadRoles() {
    showLoading();
    try {
        const roles = await getRoles();
        const roleTableBody = document.querySelector('#role_table tbody');
        roleTableBody.innerHTML = '';

        roles.forEach(role => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${role.id}</td>
                <td>${role.name}</td>
                <td>${role.description || ''}</td>
                <td>
                    <button class="btn btn-primary btn-sm" onclick="editRole(${role.id})">Editar</button>
                </td>
            `;
            roleTableBody.appendChild(row);
        });
        document.getElementById('total_roles').textContent = roles.length;
        hideLoading();
        showTable();
    } catch (error) {
        console.error('Error loading roles:', error);
    }
}

async function LoadRolesSelect() {
    try {
        const roles = await getRoles();
        const roleSelect = document.getElementById('role_select');
        roleSelect.innerHTML = '';

        roles.forEach(role => {
            const option = document.createElement('option');
            option.value = role.id;
            option.textContent = role.name;
            roleSelect.appendChild(option);
        });
    } catch (error) {
        console.error('Error loading roles for select:', error);
    }
}