<?= header_template($data) ?>

<div class="main-content">
    <header>
        <!-- Botón de Toggle para mostrar/ocultar la Sidebar -->
        <button id="toggle-btn" class="toggle-btn">&#9776;</button>
        <h1>Bienvenido,
            <?= $_SESSION['user_type'] . ": " . $_SESSION['user_info']['nombre'] . " " . $_SESSION['user_info']['apellido'] ?>
        </h1>
        <p>Accede a la información importante desde tu panel.</p>
    </header>
    <section class="content-dashboard">
    </section>
</div>
<?= footer_template($data) ?>