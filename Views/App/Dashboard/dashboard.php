<?= header_template($data) ?>

<div class="main-content">
  <header>
    <!-- Botón de Toggle para mostrar/ocultar la Sidebar -->
    <button id="toggle-btn" class="toggle-btn">&#9776;</button>
    <h1>Bienvenido, <?= $_SESSION['user_info']['nombre'] . " " . $_SESSION['user_info']['apellido'] ?></h1>
    <p>Accede a la información importante desde tu panel.</p>
  </header>
  <section class="content-dashboard">
    <!-- Contenido dinámico -->

    <div class="card">
      <div class="card-header"><?= $_SESSION['user_info']['nombre'] . " " . $_SESSION['user_info']['apellido'] ?></div>
        <!-- <div class="card-body">
        <p><span class="label">Módulo actual:</span> <span class="value">II</span></p>
        <p><span class="label">Carrera:</span> <span class="value">Ingeniería de Software</span></p>
      </div>-->
    </div>
    <!--  <div class="card">
      <h3>Resumen Académico</h3>
      <p>Accede a tus notas, tareas y desempeño general.</p>
    </div>
    <div class="card">
      <h3>Noticias Institucionales</h3>
      <p>Mantente informado de las novedades y comunicados.</p>
    </div>
    <div class="card">
      <h3>Calendario de Actividades</h3>
      <p>Consulta las próximas actividades y eventos.</p>
    </div>Contenido dinámico -->
  </section>
</div>
<?= footer_template($data) ?>