<?php

class Dashboard extends Controllers
{
	public function __construct()
	{
		parent::__construct();
		/*session_start();
						  session_regenerate_id(true);
						  if (empty($_SESSION['login'])) {
							  header('Location: ' . base_url() . '/login');
						  }
						  getPermisos(1);*/
	}

	public function dashboard()
	{
		$data['page_id'] = 2;
		$data['page_tag'] = "Dashboard - Shaday";
		$data['page_title'] = "Dashboard";
		$data['page_name'] = "Dashboard";
		$data['page_libraries'] = array(
			'css' => '/css/dashboard.css',
			"js" => '/js/Dashboard/dashboard.js'
		);
		$data['page_template'] = array(
			'head' => 'head_panel.php',
			'foot' => 'foot_panel.php'
		);
		$this->views->getView($this, "dashboard", $data);
	}

}