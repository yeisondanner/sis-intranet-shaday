document.addEventListener('DOMContentLoaded', function () {
    setTimeout(() => {
        login();
    }, 1000);
});
function login() {
    let formLogin = document.getElementById('loginForm');
    formLogin.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevenir el envío del formulario
        const data = new FormData(formLogin);
        const headers = new Headers();
        const config = {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: data,
            headers: headers
        }
        //estas url deben ser cargadas desde un archivo de configuracion, corregir esto
        const url = "http://localhost/sis-intranet-shaday/api/login.php";
        fetch(url, config)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la solicitud ' + response.status + "-" + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    window.location.href = "dashboard.html";
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.log(error);
            });
    });
}

