// Simula un tiempo de carga y luego muestra la pantalla de login
window.addEventListener('load', () => {
    setTimeout(() => {
        document.querySelector('.loader').style.display = 'none';
        cargarHistorialCarreras();
    }, 2000); // 2 segundos de carga
});
// js/dashboard.js
document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("toggle-btn");
    const sidebar = document.getElementById("sidebar");

    // Evento para mostrar/ocultar la sidebar
    toggleBtn.addEventListener("click", function () {
        sidebar.classList.toggle("active");
    });
});


function openModal(modalId) {
    document.getElementById(modalId).style.display = "block";
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";
}

// Cerrar modal al hacer clic fuera de él
window.onclick = function (event) {
    const modals = document.getElementsByClassName("modal");
    for (let i = 0; i < modals.length; i++) {
        if (event.target == modals[i]) {
            modals[i].style.display = "none";
        }
    }
}

// Función para mostrar/ocultar el contenido del acordeón
function toggleAccordion(moduleId) {
    const content = document.getElementById(moduleId);
    content.style.display = (content.style.display === "block") ? "none" : "block";
}

/**
 * Funcion que carga el historial de carreras
 */
function cargarHistorialCarreras() {
    const config = {
        method: "POST"
    }
    const url = base_url + "notas/getCarreras";

    fetchData(url, config)
        .then(data => {
            console.log(data);
        })
}

