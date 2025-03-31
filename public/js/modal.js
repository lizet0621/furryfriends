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