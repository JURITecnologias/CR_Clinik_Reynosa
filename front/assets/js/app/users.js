async function getUsers() {
    const response = await fetch(apiHost+apiPath+'/users', {
        method: 'GET',
        headers: headersRequest,
    });

    if (!response.ok) {
        throw new Error('failed to fetch: ' + response.statusText);
    }

    return await response.json();
}

async function addUser(userData) {
    const response = await fetch(apiHost+apiPath+'/users', {
        method: 'POST',
        headers: headersRequest,
        body: JSON.stringify(userData),
    });

    if (!response.ok) {
        throw new Error('failed to add user: ' + response.statusText);
    }

    return await response.json();
}

async function getUserById(userId) {
    const response = await fetch(`${apiHost}${apiPath}/users/${userId}`, {
        method: 'GET',
        headers: headersRequest,
    });

    if (!response.ok) {
        throw new Error('failed to fetch user: ' + response.statusText);
    }

    return await response.json();
}

async function editUserRequest(userId, userData) {
    const response = await fetch(`${apiHost}${apiPath}/users/${userId}`, {
        method: 'PUT',
        headers: headersRequest,
        body: JSON.stringify(userData),
    });

    if (!response.ok) {
        throw new Error('failed to edit user: ' + response.statusText);
    }

    return await response.json();
}

async function removeUser(userId) {
    const response = await fetch(`${apiHost}${apiPath}/users/${userId}`, {
        method: 'DELETE',
        headers: headersRequest,
    });

    if (!response.ok) {
        throw new Error('failed to delete user: ' + response.statusText);
    }

    return await response.json();
}

async function LoadUsers() {
    showLoading();
    try {
        const users = await getUsers();
        const userTableBody = document.querySelector('#user_table tbody');
        userTableBody.innerHTML = '';

        users.forEach(user => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${user.id}</td>
                <td>${user.name}</td>
                <td>${user.email}</td>
                <td>${
                    Array.isArray(user.roles)
                        ? user.roles.map(role => typeof role === 'object' ? role.name || JSON.stringify(role) : role).join(', ')
                        : (typeof user.roles === 'object' ? user.roles.name || JSON.stringify(user.roles) : user.roles)
                }</td>
                <td>
                    ${user.permissions.includes('editar') ? `<button class="btn btn-primary btn-sm" onclick="LoadUserInfo(${user.id})">Editar</button>` : ''}
                    ${user.id !== 1 && user.permissions.includes('borrar') ? `<button class="btn btn-danger btn-sm" onclick="DeleteUser(${user.id})">Eliminar</button>` : ''}
                </td>
            `;
            userTableBody.appendChild(row);
        });
        document.getElementById('total_users').textContent = users.length;
        hideLoading();
        showTable();
    } catch (error) {
        console.error('Error loading users:', error);
    }
}

async function AddUserRequest() {
    if(document.getElementById('edit_user_id').value) {
        EditUser();
        return;
    }
    const name = document.getElementById('user_name').value;
    const email = document.getElementById('user_email').value;
    const password = document.getElementById('user_password').value;
    const roleId = document.getElementById('role_select').value; 
    const userData = {
        name: name,
        email: email,
        password: password,
        roles: [role_id=roleId]
    };
    try {
        await addUser(userData);
        $('#add_user').modal('hide');
        LoadUsers();
    } catch (error) {
        console.error('Error adding user:', error);
    }
}

async function LoadUserInfo(userId) {
     $('#add_user').modal('show');
    showLoadingDiv('loading_user_info');
    document.getElementById('user_info_form').classList.add('d-none');

    try {
        const user = await getUserById(userId);
        document.getElementById('edit_user_id').value = user.id;
        document.getElementById('user_name').value = user.name || '';
        document.getElementById('user_email').value = user.email || '';
        document.getElementById('user_password').value = ''; 
        document.getElementById('role_select').value = Array.isArray(user.roles) && user.roles.length > 0
            ? (typeof user.roles[0] === 'object' ? user.roles[0].id : user.roles[0])
            : (typeof user.roles === 'object' ? user.roles.id : user.roles) || '';

        
        if(userId == 1) {
            document.getElementById('admin_password_change').classList.remove('d-none');
            //document.getElementById('user_info').classList.add('d-none');
        }else{
            document.getElementById('user_info_form').classList.remove('d-none');
            document.getElementById('admin_password_change').classList.add('d-none');
        }
        hideLoadingDiv('loading_user_info');
        
        
    } catch (error) {
        console.error('Error loading user info:', error);
    }
    
}

async function EditUser() {
    const userId = document.getElementById('edit_user_id').value;
    const name = document.getElementById('user_name').value;
    const email = document.getElementById('user_email').value;
    let  password = document.getElementById('user_password').value;
    const roleId = document.getElementById('role_select').value; 
    if(userId == 1) {
        password = document.getElementById('admin_password').value;
    }
    const userData = {
        name: name,
        email: email,
        roles: [role_id=roleId]
    };
    if (password) {
        userData.password = password;
    }
    try {
        await editUserRequest(userId, userData);
        $('#add_user').modal('hide');
        LoadUsers();
        document.getElementById('edit_user_id').value = '';
    } catch (error) {
        console.error('Error editing user:', error);
    }
}

async function DeleteUser(userId) {
    try {
        await removeUser(userId);
        LoadUsers();
    } catch (error) {
        console.error('Error deleting user:', error);
    }
}

function hideTable() {
    document.getElementById('user_table').classList.add('d-none');
}

function showTable() {
    document.getElementById('user_table').classList.remove('d-none');
}