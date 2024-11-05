// Simula un tiempo de carga y luego muestra la pantalla de login
window.addEventListener('load', () => {
    setTimeout(() => {
        document.querySelector('.loader').style.display = 'none';
        document.querySelector('.login-container').style.display = 'block';
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
