<?php
class NotasModel extends Mysql
{
    private $idEstudiante;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectCarreras(int $idEstudiante)
    {
        $sql = "SELECT c.carrera_id,c.nombre FROM estuidante_docente_modulo AS edm
                INNER JOIN modulo AS m ON m.modulo_id=edm.modulo_id
                INNER JOIN carrera AS c ON c.carrera_id = m.carrera_id
                INNER JOIN estudiante AS e ON e.estudiante_id =edm.estudiante_id
                WHERE e.estudiante_id=?
                GROUP BY c.carrera_id;";
        $this->idEstudiante = $idEstudiante;
        $arrData = array($this->idEstudiante);
        $request = $this->select_all($sql, $arrData);
        return $request;
    }
}