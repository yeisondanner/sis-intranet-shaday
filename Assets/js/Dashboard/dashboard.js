document.addEventListener('DOMContentLoaded', function () {
    LogOut();
});

function LogOut() {
    let logOut = document.getElementById('logOut');
    logOut.addEventListener('click', function (e) {
        e.preventDefault();
        showConfirmAlert("error", "Atención", "¿Estás seguro de que deseas cerrar sesión?");
    });
}

function confirmAction(isConfirmed, button) {
    const alertBox = button.parentElement.parentElement;
    if (isConfirmed) {
        showAlert("success", "Correcto", "Cerrando sesión...");
        setTimeout(() => {
            window.location.href = base_url + "logout";
        }, 2000);
    } else {
        showAlert("info", "Atención", "Has cancelado el cierre de sesión.");
    }
    alertBox.remove();
}