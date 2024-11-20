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
            let historyCarreras = document.getElementById("history-information");
            let content = ""
            data.forEach(element => {
                content += `                
                <div class="accordion-container">
                <h2>${element.nombre}: Historial de Módulos</h2>`
                const arrModules = element.modulos;
                //ordenar por nombre de módulo
                arrModules.sort((b, a) => a.nombre.localeCompare(b.nombre));
                arrModules.forEach(module => {
                    let name = module.nombre;
                    let id = module.modulo_id;
                    let idName = name.replace(/\s+/g, '') + id;
                    let arrNotas = module.notas[0];
                    let badgeEstado = module.estado == "Finalizado" ? "badge-green" : "badge-red";
                    content += `
                    <div class="accordion" onclick="toggleAccordion('${idName}')">
                        <h3>${name}</h3>
                        <span class="badge ${badgeEstado}">${module.estado}</span>
                    </div>
                    <div id="${idName}" class="accordion-content">
                        <div class="grades-table">
                            <div class="grades-row">
                                <div class="grades-cell"><strong>Parcial 1</strong></div>
                                <div class="grades-cell">${arrNotas.nota1}</div>
                                <div class="grades-cell"><button class="btn-detail" onclick="openModal('modalDetailI')">Ver
                                        Detalle</button></div>
                                <div class="grades-cell"><button class="btn-print"
                                        onclick="openModal('modalPrintI')">Imprimir</button></div>
                            </div>
                             <div class="grades-row">
                                <div class="grades-cell"><strong>Parcial 2</strong></div>
                                <div class="grades-cell">${arrNotas.nota2}</div>
                                <div class="grades-cell"><button class="btn-detail" onclick="openModal('modalDetailI')">Ver
                                        Detalle</button></div>
                                <div class="grades-cell"><button class="btn-print"
                                        onclick="openModal('modalPrintI')">Imprimir</button></div>
                            </div>
                            <div class="grades-row">
                                <div class="grades-cell"><strong>Parcial 3</strong></div>
                                <div class="grades-cell">${arrNotas.nota3}</div>
                                <div class="grades-cell"><button class="btn-detail" onclick="openModal('modalDetailI')">Ver
                                        Detalle</button></div>
                                <div class="grades-cell"><button class="btn-print"
                                        onclick="openModal('modalPrintI')">Imprimir</button></div>
                            </div>
                            <div class="grades-row">
                                <div class="grades-cell"><strong>Parcial 4</strong></div>
                                <div class="grades-cell">${arrNotas.nota4}</div>
                                <div class="grades-cell"><button class="btn-detail" onclick="openModal('modalDetailI')">Ver
                                        Detalle</button></div>
                                <div class="grades-cell"><button class="btn-print"
                                        onclick="openModal('modalPrintI')">Imprimir</button></div>
                            </div>
                            <div class="grades-row">
                                <div class="grades-cell"><strong>Pomedio Final</strong></div>
                                <div class="grades-cell">${arrNotas.promedio}</div>
                                <div class="grades-cell"><button class="btn-detail" onclick="openModal('modalDetailI')">Ver
                                        Detalle</button></div>
                                <div class="grades-cell"><button class="btn-print"
                                        onclick="openModal('modalPrintI')">Imprimir</button></div>
                            </div>
                        </div>
                    </div>          
                    `
                });
                content += `
                </div>
                `
            });
            historyCarreras.innerHTML = content;
        })
}

