document.addEventListener("DOMContentLoaded", function () {
    const registerBtn = document.querySelector(".btn-secondary"); // Botón de "Registrarse"
    const modal = document.getElementById("registerModal"); // Modal de registro
    const closeModal = document.querySelector(".close"); // Botón de cerrar (X)

    // Evento para abrir el modal al hacer clic en "Registrarse"
    registerBtn.addEventListener("click", function (event) {
        event.preventDefault(); // Evita que el enlace cambie de página
        modal.style.display = "flex"; // Muestra el modal
    });

    // Evento para cerrar el modal al hacer clic en la "X"
    closeModal.addEventListener("click", function () {
        modal.style.display = "none"; // Oculta el modal
    });

    // Evento para cerrar el modal si el usuario hace clic fuera del contenido
    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none"; // Oculta el modal si se hace clic afuera
        }
    });
});



document.addEventListener("DOMContentLoaded", function () {
    // Evento para abrir el modal de contraseña
    document.getElementById('admin-link').addEventListener('click', function (e) {
        e.preventDefault(); // Evita la redirección
        const myModal = new bootstrap.Modal(document.getElementById('passwordModal'));
        myModal.show(); // Muestra el modal
    });

    // Evento para manejar el formulario de contraseña
    document.getElementById('password-form').addEventListener('submit', function (event) {
        event.preventDefault();

        const passwordInput = document.getElementById('password');
        const password = passwordInput.value.trim();
        const errorMessage = document.getElementById('error-message');

        const correctPassword = "123456"; // Contraseña correcta

        if (password === correctPassword) {
            alert("Acceso correcto. Bienvenido a la administración.");
            window.location.href = '/administracion'; // Redirige a la página de administración
        } else {
            errorMessage.style.display = 'block'; // Muestra el mensaje de error
            passwordInput.classList.add('is-invalid'); // Agrega la clase de error al campo
        }
    });
});