<?= header_template($data) ?>

<!-- Contenedor de Login -->
<div class="login-container">
  <div class="login-header">
    <button class="item-header item-header-active" id="lEst">Login Estudiantes</button>
    <button class="item-header" id="lTea">Login Docentes</button>
  </div>
  <div class="login-box">
    <div class="login-box student">
      <h2>Iniciar Sesión - Estudiantes</h2>
      <form id="loginFormStudent" autocomplete="off">
        <input type="text" name="txtUser" placeholder="Usuario" required>
        <input type="password" name="txtPassword" placeholder="Contraseña" autocomplete="off" required>
        <button type="submit">Ingresar</button>
      </form>
    </div>
    <div class="login-box teacher hidden">
      <h2>Iniciar Sesión - Docentes</h2>
      <form id="loginFormTeacher" autocomplete="off">
        <input type="text" name="txtUser" placeholder="Usuario" required>
        <input type="password" name="txtPassword" placeholder="Contraseña" autocomplete="off" required>
        <button type="submit">Ingresar</button>
      </form>
    </div>
  </div>
</div>

<?= footer_template($data) ?>