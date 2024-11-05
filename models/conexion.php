<?php
require_once "config/config.php";
class Conexion
{
    private $conexion;
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "db_prueba";
    private $port = "3306";
    private $charset = "utf8";
    function __construct()
    {
        try {
            //Conexion PDO
            $this->conexion = new PDO("mysql:host=$this->host;dbname=$this->db;charset=$this->charset", $this->user, $this->pass);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $th) {
            $data = array(
                "status" => false,
                "title" => "Ocurrio un error inesperado",
                "message" => "Ocurrio un error inesperado, por favor contacte al administrador: " + $th->getMessage(),
                "icon" => "error"
            );
            echo get_json($data);
        }

    }
    protected function getConexion()
    {
        return $this->conexion;
    }
}