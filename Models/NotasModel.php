<?php
class NotasModel extends Mysql
{
    private $idEstudiante;
    private $idCarrera;
    private $idModulo;
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Summary of selectCarreras
     * @param int $idEstudiante
     * @return array
     * 
     */
    public function selectCarrerasByIdEstudiante(int $idEstudiante)
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
    /*
     * Summary of selectCarrerasByIdCarrera
     * @param int $idEstudiante
     * @param int $idCarrera
     * @return array
     */
    public function selectCarrerasByIdCarrera(int $idEstudiante, int $idCarrera)
    {
        $sql = "SELECT m.modulo_id,m.nombre FROM estuidante_docente_modulo AS edm
                INNER JOIN modulo AS m ON m.modulo_id=edm.modulo_id
                INNER JOIN estudiante AS e ON e.estudiante_id =edm.estudiante_id
                WHERE e.estudiante_id=? AND m.carrera_id=?
                GROUP BY m.modulo_id;";
        $this->idCarrera = $idCarrera;
        $this->idEstudiante = $idEstudiante;
        $arrData = array($this->idEstudiante, $this->idCarrera);
        $request = $this->select_all($sql, $arrData);
        return $request;
    }

    public function selectNotasModuloCarreraByIdModulo(int $idEstudiante, int $idModulo)
    {
        $sql = "SELECT n.* FROM estuidante_docente_modulo AS edm
                INNER JOIN estudiante AS e ON e.estudiante_id =edm.estudiante_id
                LEFT JOIN notas AS n ON n.estuidante_docente_modulo_id=edm.estuidante_docente_modulo_id
                WHERE e.estudiante_id=? AND edm.modulo_id=?;";
        $this->idModulo = $idModulo;
        $this->idEstudiante = $idEstudiante;
        $arrData = array($this->idEstudiante, $this->idModulo);
        $request = $this->select_all($sql, $arrData);
        return $request;
    }
}