// Menú desplegable
function toggleMenu() {
    const menu = document.getElementById("sideMenu");
    const mainContent = document.querySelector(".main-content");
    
    menu.classList.toggle("menu-open");
    
    if (menu.classList.contains("menu-open")) {
        mainContent.style.marginLeft = "280px";
        document.body.style.overflow = "hidden";
    } else {
        mainContent.style.marginLeft = "0";
        document.body.style.overflow = "auto";
    }
}

function toggleMenu() {
    const menu = document.getElementById("sideMenu");
    menu.classList.toggle("menu-open");

    // Ajustar el margen del cuerpo cuando el menú está abierto
    if (menu.classList.contains("menu-open")) {
        document.body.style.marginLeft = "250px";
    } else {
        document.body.style.marginLeft = "0";
    }
}


// Inicialización
document.addEventListener("DOMContentLoaded", () => {
    showSlide(0);
    
    // Cambio automático cada 5 segundos
    setInterval(() => moveSlide(1), 5000);
    
    // Cerrar menú al hacer clic fuera
    document.addEventListener("click", (e) => {
        const menu = document.getElementById("sideMenu");
        const menuToggle = document.querySelector(".menu-toggle");
        
        if (menu.classList.contains("menu-open") && 
            !menu.contains(e.target) && 
            !menuToggle.contains(e.target)) {
            closeMenu();
        }
    });
});