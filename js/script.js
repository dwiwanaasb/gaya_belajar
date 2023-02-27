$(document).ready(function () {
    const togglePassword = $('#togglePassword');
    const password = $('#id_password');
    const toggleCPassword = $('#toggleCPassword');
    const cpassword = $('#id_cpassword');

    if (togglePassword) {
        togglePassword.on('click', function (e) {
            const type = password.attr('type') === 'password' ? 'text' : 'password';
            password.attr('type', type);
            $(this).toggleClass('fa-eye-slash');
        });
    }
    if (toggleCPassword) {
        toggleCPassword.on('click', function () {
            const type = cpassword.attr('type') === 'password' ? 'text' : 'password';
            cpassword.attr('type', type);
            $(this).toggleClass('fa-eye-slash');
        });
    }
});
