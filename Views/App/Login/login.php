<?= header_template($data) ?>
<!-- Contenedor de Login -->
<div class="login-container">
  <h2>Iniciar Sesión</h2>
  <form id="loginForm" autocomplete="off">
    <input type="text" name="txtUser" placeholder="Usuario" required>
    <input type="password" name="txtPassword" placeholder="Contraseña" autocomplete="off" required>
    <button type="submit">Ingresar</button>
  </form>
</div>
<div id="alert-container"></div>
<?= footer_template($data) ?>