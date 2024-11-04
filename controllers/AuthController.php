<?php
// controllers/AuthController.php

include_once '../models/UserModel.php';

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login($username, $password)
    {
        $user = $this->userModel->getUserByUsername($username);
        if ($password != $user['contrasena']) {
            return ["success" => false];
        }
        if ($user && $password) {
            return ["success" => true, "user_id" => $user['estudiante_id']];
        }

        return ["success" => false];
    }
}
