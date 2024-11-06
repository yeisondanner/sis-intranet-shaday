<?= header_template($data) ?>
<!-- Contenedor de Login -->
<div class="login-container">
  <h2>Iniciar Sesión</h2>
  <form id="loginForm">
    <input type="text" name="username" placeholder="Usuario" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Ingresar</button>
  </form>
</div>
<?= footer_template($data) ?>