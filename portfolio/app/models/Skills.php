<?php
require_once("DBAbstractModel.php");

class Skills extends DBAbstractModel
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
    private $habilidades;
    private $created_at;
    private $updated_at;

    public function setID($id)
    {
        $this->id = $id;
    }

    public function setHabilidades($habilidades)
    {
        $this->habilidades = $habilidades;
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