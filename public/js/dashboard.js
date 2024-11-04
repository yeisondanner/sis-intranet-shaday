/**
 * Funcion que se ejecuta cuando se carga el DOM
 */
document.addEventListener('DOMContentLoaded', function () {
    initDashboard();
    setTimeout(() => {
        logOut();
    }, 1000);
});

/**
 * Funcion que cierra la sesion del usuario
 */
function logOut() {
    let logout = document.getElementById("logout");
    logout.addEventListener("click", function () {
        //abrir una ventana con alert de confirmacion
        if (confirm("¿Estás seguro que deseas cerrar sesión?")) {
            url = "http://localhost/sis-intranet-shaday/api/logout.php";
            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText + " - " + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        window.location.href = "http://localhost/sis-intranet-shaday/public/index.html";
                    }
                })
                .catch(error => {
                    console.error('There has been a problem with your fetch operation: ', error);
                });
        }
    });
}


// Simular datos de notas y pagos
const notas = [
    {
        modulo: "Módulo I",
        nota1: 16.00,
        nota2: 18.50,
        nota3: 17.00,
        nota4: 15.50
    },
    {
        modulo: "Módulo II",
        nota1: 14.00,
        nota2: 15.50,
        nota3: 13.00,
        nota4: 17.00
    }
];

const pagos = [
    {
        fecha: "2024-11-01",
        monto: 100.00,
        estado: "pagado"
    },
    {
        fecha: "2024-12-01",
        monto: 100.00,
        estado: "pendiente"
    }
];

// Cargar las notas en la tabla
function cargarNotas() {
    const notasTable = document.getElementById('notasTable').getElementsByTagName('tbody')[0];

    notas.forEach(nota => {
        const promedio = ((nota.nota1 + nota.nota2 + nota.nota3 + nota.nota4) / 4).toFixed(2);
        const row = notasTable.insertRow();
        row.innerHTML = `
            <td>${nota.modulo}</td>
            <td>${nota.nota1}</td>
            <td>${nota.nota2}</td>
            <td>${nota.nota3}</td>
            <td>${nota.nota4}</td>
            <td>${promedio}</td>
            <td><button class="detail-button" data-nota='${JSON.stringify(nota)}'>Detalles</button></td>
        `;
    });
}

// Cargar los pagos en la tabla
function cargarPagos() {
    const pagosTable = document.getElementById('pagosTable').getElementsByTagName('tbody')[0];

    pagos.forEach(pago => {
        const row = pagosTable.insertRow();
        row.innerHTML = `
            <td>${pago.fecha}</td>
            <td>${pago.monto.toFixed(2)}</td>
            <td>${pago.estado}</td>
            <td><button class="detail-button" data-pago='${JSON.stringify(pago)}'>Detalles</button></td>
        `;
    });
}

// Mostrar detalles en el modal
function mostrarDetalles(data) {
    const modalText = document.getElementById('modal-text');
    modalText.innerHTML = JSON.stringify(data, null, 2).replace(/\n/g, '<br>');
    document.getElementById('modal').style.display = "block";
}

// Cerrar el modal
function cerrarModal() {
    document.getElementById('modal').style.display = "none";
}

// Inicializar el panel
function initDashboard() {
    cargarNotas();
    cargarPagos();

    // Manejar los clics en los botones de detalles
    document.querySelectorAll('.detail-button').forEach(button => {
        button.addEventListener('click', function () {
            if (this.dataset.nota) {
                mostrarDetalles(JSON.parse(this.dataset.nota));
            } else if (this.dataset.pago) {
                mostrarDetalles(JSON.parse(this.dataset.pago));
            }
        });
    });
}
// Cerrar el modal al hacer clic en la 'X'
document.querySelector('.close').addEventListener('click', cerrarModal);

// Cerrar el modal al hacer clic fuera del contenido
window.onclick = function (event) {
    if (event.target == document.getElementById('modal')) {
        cerrarModal();
    }
};


