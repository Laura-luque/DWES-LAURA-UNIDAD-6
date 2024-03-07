<?php
require_once("DBAbstractModel.php");

class Trabajos extends DBAbstractModel
{
    private static $instancia;
    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    public function __clone()
    {
        trigger_error("La clonación no está permitida.", E_USER_ERROR);
    }

    private $id;
    private $titulo;
    private $descripcion;
    private $fecha_inicio;
    private $fecha_fin;
    private $logros;
    private $visible;
    private $created_at;
    private $updated_at;

    public function setID($id)
    {
        $this->id = $id;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function setFecha_ini($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
    }
    public function setFecha_fin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;
    }

    public function setLogros($logros)
    {
        $this->logros = $logros;
    }

    public function setVisible($visible)
    {
        $this->visible = $visible;
    }

    public function getMessage()
    {
        return $this->mensaje;
    }

    public function set() {
        $this->query = "INSERT INTO trabajos(titulo, descripcion, fecha_inicio, fecha_fin, logro) VALUES(:titulo,:descripcion,:fecha_inicio, :fecha_fin, :logros)";
        //$this->parametros['id']= $id;
        $this->parametros['titulo'] = $this->titulo;
        $this->parametros['descripcion'] = $this->descripcion;
        $this->parametros['fecha_inicio'] = $this->fecha_inicio;
        $this->parametros['fecha_fin'] = $this->fecha_fin;
        $this->parametros['logros'] = $this->logros;
        $this->get_results_from_query();
        //$this->execute_single_query();
        $this->mensaje = 'Usuario agregado correctamente';
    }

    public function get() {

    }

    public function edit() {

    }

    public function delete() {

    }


}



