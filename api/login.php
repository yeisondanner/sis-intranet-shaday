<?php
// api/login.php

include_once '../controllers/AuthController.php';

if (!$_POST) {
    echo json_encode(["success" => false, "message" => "Método no permitido"]);
    exit;
}
$username = $_POST['txtUser'];
$password = $_POST['txtPassword'];
if (!empty($username) && !empty($password)) {
    $auth = new AuthController();
    $result = $auth->login($username, $password);

    if ($result['success']) {
        session_start();
        $_SESSION['user_id'] = $result['user_id'];
        echo json_encode(["success" => true, "message" => "Inicio de sesión exitoso"]);
    } else {
        echo json_encode(["success" => false, "message" => "Usuario o contraseña incorrectos"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Faltan datos"]);
}
