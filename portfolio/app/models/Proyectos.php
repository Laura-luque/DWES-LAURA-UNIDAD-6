<?php
require_once("DBAbstractModel.php");

class Proyectos extends DBAbstractModel
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
    private $tecnologias;
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

    public function setTecnologias($tecnologias)
    {
        $this->tecnologias = $tecnologias;
    }

    public function getMessage()
    {
        return $this->mensaje;
    }

    public function set() {

    }

    public function get() {

    }

    public function edit() {

    }

    public function delete() {

    }


}



?>