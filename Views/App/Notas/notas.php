<?= header_template($data) ?>

<div class="main-content">
    <header>
        <!-- Botón de Toggle para mostrar/ocultar la Sidebar -->
        <button id="toggle-btn" class="toggle-btn">&#9776;</button>
        <h1>Bienvenido, <?= $_SESSION['user_type'].": ". $_SESSION['user_info']['nombre'] . " " . $_SESSION['user_info']['apellido'] ?></h1>
        <p>Accede a la información importante desde tu panel.</p>
    </header>
    <!--Historial notas-->
    <div class="grades-container">
        <h1 class="grades-title">Historial de Notas</h1>
        <div class="history-information" id="history-information">
            <!--  <div class="accordion-container">
                <h2>Computacion e Informatica: Historial de Módulos</h2>
                <div class="accordion" onclick="toggleAccordion('moduleI')">
                    <h3>Módulo I</h3>
                </div>
                <div id="moduleI" class="accordion-content">
                    <div class="grades-table">
                        <div class="grades-row">
                            <div class="grades-cell"><strong>Parcial 1</strong></div>
                            <div class="grades-cell">82</div>
                            <div class="grades-cell"><button class="btn-detail" onclick="openModal('modalDetailI')">Ver
                                    Detalle</button></div>
                            <div class="grades-cell"><button class="btn-print"
                                    onclick="openModal('modalPrintI')">Imprimir</button></div>
                        </div>
                    </div>
                </div>
                <div class="accordion" onclick="toggleAccordion('moduleII')">
                    <h3>Módulo II</h3>
                </div>
                <div id="moduleII" class="accordion-content">
                    <div class="grades-table">
                        <div class="grades-row">
                            <div class="grades-cell"><strong>Parcial 1</strong></div>
                            <div class="grades-cell">78</div>
                            <div class="grades-cell"><button class="btn-detail" onclick="openModal('modalDetailII')">Ver
                                    Detalle</button></div>
                            <div class="grades-cell"><button class="btn-print"
                                    onclick="openModal('modalPrintII')">Imprimir</button></div>
                        </div>
                    </div>
                </div>
                <div class="accordion" onclick="toggleAccordion('moduleIV')">
                    <h3>Módulo IV</h3>
                </div>
                <div id="moduleIV" class="accordion-content">
                    <div class="grades-table">
                        <div class="grades-row">
                            <div class="grades-cell"><strong>Parcial 1</strong></div>
                            <div class="grades-cell">88</div>
                            <div class="grades-cell"><button class="btn-detail" onclick="openModal('modalDetailIV')">Ver
                                    Detalle</button></div>
                            <div class="grades-cell"><button class="btn-print"
                                    onclick="openModal('modalPrintIV')">Imprimir</button></div>
                        </div>
                    </div>
                </div>
                Agregar más módulos como sea necesario 
            </div>-->
        </div>
    </div>

    <!-- Modal Detail for Current Module -->
    <div id="modalDetailCurrent" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modalDetailCurrent')">&times;</span>
            <h2>Detalles del Módulo Actual</h2>
            <p>Aquí van los detalles de las notas del módulo actual.</p>
        </div>
    </div>

    <!-- Modal Print for Current Module -->
    <div id="modalPrintCurrent" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modalPrintCurrent')">&times;</span>
            <h2>Imprimir Módulo Actual</h2>
            <p>Opciones de impresión para el módulo actual.</p>
        </div>
    </div>

    <!-- Modal Detail for Module I -->
    <div id="modalDetailI" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modalDetailI')">&times;</span>
            <h2>Detalles de Módulo I</h2>
            <p>Aquí van los detalles de las notas del Módulo I.</p>
        </div>
    </div>

    <!-- Modal Print for Module I -->
    <div id="modalPrintI" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modalPrintI')">&times;</span>
            <h2>Imprimir Módulo I</h2>
            <p>Opciones de impresión para el Módulo I.</p>
        </div>
    </div>

    <!-- Modal Detail for Module II -->
    <div id="modalDetailII" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modalDetailII')">&times;</span>
            <h2>Detalles de Módulo II</h2>
            <p>Aquí van los detalles de las notas del Módulo II.</p>
        </div>
    </div>

    <!-- Modal Print for Module II -->
    <div id="modalPrintII" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modalPrintII')">&times;</span>
            <h2>Imprimir Módulo II</h2>
            <p>Opciones de impresión para el Módulo II.</p>
        </div>
    </div>

    <!-- Modal Detail for Module IV -->
    <div id="modalDetailIV" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modalDetailIV')">&times;</span>
            <h2>Detalles de Módulo IV</h2>
            <p>Aquí van los detalles de las notas del Módulo IV.</p>
        </div>
    </div>

    <!-- Modal Print for Module IV -->
    <div id="modalPrintIV" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modalPrintIV')">&times;</span>
            <h2>Imprimir Módulo IV</h2>
            <p>Opciones de impresión para el Módulo IV.</p>
        </div>
    </div>
</div>
<?= footer_template($data) ?>