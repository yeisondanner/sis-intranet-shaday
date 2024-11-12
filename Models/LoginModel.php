<?php

class LoginModel extends Mysql
{
	private $usuario;
	private $contrasena;

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Funcion consulta a la base de datos si existe el usuario
	 */
	public function selectUser($user, $password)
	{
		$this->usuario = $user;
		$this->contrasena = $password;
		$arrData = array(
			$this->usuario,
			$this->contrasena
		);
		$sql = "SELECT e.estudiante_id,e.nombre,e.apellido,e.dni,e.usuario,e.estado FROM estudiante AS e WHERE e.usuario=?  AND e.contrasena=?;";
		$request = $this->select($sql, $arrData);
		return $request;
	}
}

