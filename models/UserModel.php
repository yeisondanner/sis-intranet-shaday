<?php
require_once '../config/config.php';
// models/UserModel.php

class UserModel extends Database
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->getConnection();
    }

    public function getUserByUsername($username)
    {
        // Prepara la consulta para evitar inyecciones SQL
        $stmt = $this->pdo->prepare("SELECT e.estudiante_id,e.nombre,e.apellido,e.contrasena FROM estudiante AS e WHERE e.usuario=:username;");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        // Ejecuta la consulta y obtiene el usuario
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
