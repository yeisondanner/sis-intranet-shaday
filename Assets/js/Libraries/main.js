// Simula un tiempo de carga y luego muestra la pantalla de login
window.addEventListener('load', () => {
    setTimeout(() => {
        sideBar();
        loginContainer();
        document.querySelector('.loader').style.display = 'none';

    }, 2000); // 2 segundos de carga
});

function sideBar() {
    if (document.getElementById("toggle-btn") && document.getElementById("sidebar")) {
        const toggleBtn = document.getElementById("toggle-btn");
        const sidebar = document.getElementById("sidebar");
        // Evento para mostrar/ocultar la sidebar
        toggleBtn.addEventListener("click", function () {
            sidebar.classList.toggle("active");
        });
    }

}
function loginContainer() {
    if (document.querySelector('.login-container')) {
        document.querySelector('.login-container').style.display = 'block';
    }
}