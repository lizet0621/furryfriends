document.addEventListener("DOMContentLoaded", function () {
    // Modal de contraseña para administración
    const adminLink = document.getElementById('admin-link'); // El enlace para abrir el modal
    const passwordModalElement = document.getElementById('passwordModal'); // Modal de contraseña
    const passwordForm = document.getElementById('password-form'); // Formulario de contraseña
    const errorMessage = document.getElementById('error-message'); // Mensaje de error

    if (adminLink && passwordModalElement && passwordForm) {
        const passwordModal = new bootstrap.Modal(passwordModalElement); // Inicializa el modal de Bootstrap

        // Mostrar el modal de contraseña cuando se hace clic en "Administración"
        adminLink.addEventListener('click', function (e) {
            e.preventDefault(); // Evita la redirección
            passwordModal.show(); // Muestra el modal
        });

        // Manejo del formulario de contraseña
        passwordForm.addEventListener('submit', function (e) {
            e.preventDefault(); // Evita el envío del formulario

            // Obtener la contraseña ingresada
            const password = document.getElementById('password').value;

            // Validación de la contraseña
            if (password === 'admin123') { // Cambia 'admin123' por la contraseña correcta
                alert("Acceso correcto. Bienvenido a la administración.");
                window.location.href = '/administracion'; // Redirige a la página de administración
            } else {
                // Mostrar mensaje de error si la contraseña es incorrecta
                errorMessage.style.display = 'block';
            }
        });
    } else {
        console.error("No se encontraron los elementos necesarios para el modal de contraseña.");
    }
});