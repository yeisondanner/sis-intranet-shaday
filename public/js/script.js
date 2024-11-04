// public/js/script.js

function login() {
    // Obtiene los valores de usuario y contraseña del formulario
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    // Verifica que los campos no estén vacíos
    if (username === "" || password === "") {
        alert("Por favor, complete todos los campos.");
        return;
    }

    // Prepara la solicitud al servidor
    fetch('../api/login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ username, password })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Si la autenticación es exitosa, redirige al dashboard
                window.location.href = "dashboard.html";
            } else {
                // Muestra un mensaje de error en caso de fallo
                alert(data.message);
            }
        })
        .catch(error => {
            console.error("Error en la solicitud de inicio de sesión:", error);
            alert("Error en la conexión con el servidor.");
        });
}

// Función para cerrar sesión
function logout() {
    fetch('../api/logout.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirige al usuario a la página de inicio de sesión
                window.location.href = 'index.html';
            } else {
                alert("Error al cerrar sesión.");
            }
        })
        .catch(error => console.error("Error al cerrar sesión:", error));
}

