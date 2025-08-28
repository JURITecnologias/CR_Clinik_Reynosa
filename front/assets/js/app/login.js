async function login() {
    const email = $('#email').val();
    const password =$('#password').val();
    
    $('#button_login').addClass('d-none');
    $('#loading').removeClass('d-none');
    $('#alert_placeholder').addClass('d-none');
     $('#alert-message').html('');

    try {
        const response = await auth(email, password);

        console.log(response);
        if (response.user && response.token) {
            // Store user data in session storage
            sessionStorage.setItem('user', JSON.stringify(response));
            sessionStorage.setItem('token', response.token);

            window.location.href = 'auth-signin-basic.php?t='+response.token;
        } else {
            throw new Error(response.message || 'Login failed');
        }
    } catch (error) {
        //console.error('Error during login:', error);
        $('#alert-message').html(error);
        $('#alert_placeholder').removeClass('d-none');
        $('#loading').addClass('d-none');
        $('#button_login').removeClass('d-none');

    }
    // const response= await auth(email, password);
    // console.log(response);
}