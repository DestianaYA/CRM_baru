function togglePassword(inputId) {
    const passwordInput = document.getElementById(inputId);
    const togglePasswordIcon = document.getElementById('togglePasswordIcon' + (inputId === 'password' ? '1' : '2'));

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        togglePasswordIcon.classList.remove("fa-eye");
        togglePasswordIcon.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
        togglePasswordIcon.classList.remove("fa-eye-slash");
        togglePasswordIcon.classList.add("fa-eye");
    }
}
