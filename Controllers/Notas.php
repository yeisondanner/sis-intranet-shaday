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

    /**
     * Funcion que las carreras del estudiante que este estudiando y logeado
     */
    function getCarreras()
    {
        $idEstudiante = $_SESSION['user_info']['estudiante_id'];
        $dataCarreras = $this->model->selectCarrerasByIdEstudiante($idEstudiante);
        foreach ($dataCarreras as $key => $value) {
            $dataModulos = $this->model->selectCarrerasByIdCarrera($idEstudiante, $value["carrera_id"]);
            foreach ($dataModulos as $key => $value) {
                echo $value["modulo_id"];
                $dataModulos[$key]["notas"] = $this->model->selectNotasModuloCarreraByIdModulo($idEstudiante, $value["modulo_id"]);
            }
            $dataCarreras[$key]["modulos"] = $dataModulos;
        }
        echo toJson($dataCarreras);
    }

}