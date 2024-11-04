<?php
// api/login.php

header("Content-Type: application/json");
include_once '../config/config.php';
include_once '../controllers/AuthController.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->username) && !empty($data->password)) {
    $auth = new AuthController();
    $result = $auth->login($data->username, $data->password);

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
