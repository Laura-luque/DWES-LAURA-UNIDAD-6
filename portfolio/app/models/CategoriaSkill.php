<?php
require_once("DBAbstractModel.php");

class CategoriaSkill extends DBAbstractModel
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

    private $categoria;
    
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
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