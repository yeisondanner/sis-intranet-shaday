<?php
class Estudiante extends Controllers
{
    function __construct()
    {
        parent::__construct();
        isLogin();
    }
    public function set()
    {
        if ($_SESSION['user_type'] != "docente") {
            require_once "./Views/App/Errors/error.php";
            exit;
        }
        $data['page_id'] = 5;
        $data['page_tag'] = "Registro de Estudiantes - Shaday";
        $data['page_title'] = "Registro de Estudiantes";
        $data['page_name'] = "Registro de Estudiantes";
        $data['page_libraries'] = array(
            'css' => '/css/setEstudiante.css',
            "js" => '/js/Estudiante/estudiante.js'
        );
        $data['page_template'] = array(
            'head' => 'head_panel.php',
            'foot' => 'foot_panel.php'
        );

        $this->views->getView($this, "set", $data);
    }
}