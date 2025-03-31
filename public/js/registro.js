document.addEventListener("DOMContentLoaded", function () {
    const btnFisico = document.getElementById("btnFisico");
    const btnVirtual = document.getElementById("btnVirtual");
    const camposFisico = document.getElementById("campos_fisico");
    const form = document.querySelector("form");
    const inputsFisicos = camposFisico.querySelectorAll("input, textarea");
    const tipoRefugioInput = document.getElementById("tipo_refugio"); // Captura el input oculto

    let tipoRefugio = "natural"; // Valor por defecto

    // Alternar visibilidad de los campos de refugio físico
    btnFisico.addEventListener("click", function () {
        const isHidden = camposFisico.style.display === "none" || camposFisico.style.display === "";
        camposFisico.style.display = isHidden ? "block" : "none";
        
        if (isHidden) {
            tipoRefugio = "fisico";
            inputsFisicos.forEach(input => input.setAttribute("required", "required"));
            setTimeout(() => {
                camposFisico.scrollIntoView({ behavior: "smooth", block: "start" });
            }, 200);
        } else {
            tipoRefugio = "natural";
            inputsFisicos.forEach(input => input.removeAttribute("required"));
        }

        tipoRefugioInput.value = tipoRefugio; // Actualizar el input oculto
    });

    // Ocultar los campos de refugio físico cuando se elige refugio persona natural
    btnVirtual.addEventListener("click", function () {
        camposFisico.style.display = "none";
        tipoRefugio = "natural";
        inputsFisicos.forEach(input => input.removeAttribute("required"));
        tipoRefugioInput.value = tipoRefugio; // Actualizar el input oculto
    });

    // Validar antes de enviar el formulario
    form.addEventListener("submit", function (event) {
        if (tipoRefugio === "fisico") {
            let camposVacios = Array.from(inputsFisicos).some(input => input.value.trim() === "");
            if (camposVacios) {
                event.preventDefault();
                alert("Por favor, completa todos los campos requeridos para un Refugio Físico.");
            }
        }
    });
});