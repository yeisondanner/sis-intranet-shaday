<?php
class Notas extends Controllers
{
    function __construct()
    {
        parent::__construct();
        isLogin();
    }
    /**
     * Summary of notas
     * @return void
     */
    public function notas()
    {
        if ($_SESSION['user_type'] != "estudiante") {
            require_once "./Views/App/Errors/error.php";
            exit;
        }
        $data['page_id'] = 3;
        $data['page_tag'] = "Notas - Shaday";
        $data['page_title'] = "Notas";
        $data['page_name'] = "Notas";
        $data['page_libraries'] = array(
            'css' => '/css/notas.css',
            "js" => '/js/Notas/notas.js'
        );
        $data['page_template'] = array(
            'head' => 'head_panel.php',
            'foot' => 'foot_panel.php'
        );

        $this->views->getView($this, "notas", $data);
    }
    public function set()
    {
        if ($_SESSION['user_type'] != "docente") {
            require_once "./Views/App/Errors/error.php";
            exit;
        }
        $data['page_id'] = 4;
        $data['page_tag'] = "Ingreso de Notas - Shaday";
        $data['page_title'] = "Notas";
        $data['page_name'] = "Notas";
        $data['page_dataCarrerasDocente'] = $this->getCarrerasDocente();
        $data['page_libraries'] = array(
            'css' => '/css/setNotas.css',
            "js" => '/js/Notas/notas.js'
        );
        $data['page_template'] = array(
            'head' => 'head_panel.php',
            'foot' => 'foot_panel.php'
        );
        $this->views->getView($this, "set", $data);
    }

    /**
     * Funcion que las carreras del estudiante que este estudiando y logeado
     */
    function getCarreras()
    {
        $idEstudiante = $_SESSION['user_info']['estudiante_id'];
        $dataCarreras = $this->model->selectCarrerasByIdEstudiante($idEstudiante);
        foreach ($dataCarreras as $key => $value) {
            $dataModulos = $this->model->selectModuloByIdCarreras($idEstudiante, $value["carrera_id"]);
            foreach ($dataModulos as $ky => $val) {
                $dataModulos[$ky]["notas"] = $this->model->selectNotasModuloCarreraByIdModulo($idEstudiante, $val["modulo_id"]);
            }
            $dataCarreras[$key]["modulos"] = $dataModulos;
        }
        echo toJson($dataCarreras);
    }
    /**
     * Funcion que obtiene las carreras asignadas al docente que esta logeado
     */
    function getCarrerasDocente()
    {
        $idDocente = $_SESSION['user_info']['docente_id'];
        $dataCarreras = $this->model->selectCarreraModulobyDocente($idDocente);
        return $dataCarreras;
    }

}