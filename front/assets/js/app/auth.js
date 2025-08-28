async function auth(email, password) {
    const response = await fetch(apiHost+apiPath+'/login', {
        method: 'POST',
        headers: headersRequest,
        body: JSON.stringify({ email:email, password:   password })
    });

    if (!response.ok) {
        throw new Error('Login failed: ' + response.statusText);
    }

    return await response.json();
}

async function getUserProfile() {
    const response = await fetch(apiHost+apiPath+'/profile', {
        method: 'GET',
        headers: headersRequest
    });
    if (!response.ok) {
        throw new Error('Failed to fetch user profile: ' + response.statusText);
    }
    return await response.json();
}