<?php
// api/logout.php
session_start();

// Destruye todas las variables de sesión
session_unset();
session_destroy();

// Devuelve una respuesta JSON indicando éxito
echo json_encode(['success' => true]);
