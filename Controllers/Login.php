<?php

class Login extends Controllers
{
	public function __construct()
	{
		session_start();
		if (isset($_SESSION['login'])) {
			header('Location: ' . base_url() . '/dashboard');
		}
		parent::__construct();
	}

	public function login()
	{
		$data['page_id'] = 1;
		$data['page_tag'] = "Login - Shaday";
		$data['page_title'] = "Shaday";
		$data['page_name'] = "login";
		$data['page_libraries'] = array(
			'css' => '/css/login.css',
			"js" => '/js/Login/login.js'
		);
		$data['page_template'] = array(
			'head' => 'head_login.php',
			'foot' => 'foot_login.php'
		);
		$this->views->getView($this, "login", $data);
	}

	public function isLogin()
	{
		if (!$_POST) {
			require_once './Error.php';
			die();
		}
		$user = strClean($_POST["txtUser"]);
		$password = strClean($_POST["txtPassword"]);
		if ($user == "" || $password == "") {
			echo toJson([
				'status' => false,
				'type' => 'error',
				'title' => 'Ocurrio un error inesperado',
				'message' => 'Revisa'
			]);
			die();
		}
		
	}
}
