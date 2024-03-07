<?php
require_once("DBAbstractModel.php");

class Usuarios extends DBAbstractModel
{
    //Singleton
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
    private $nombre;
    private $email;
    private $password;
    private $created_at;
    private $updated_at;

    public function setID($id)
    {
        $this->id = $id;
    }
    
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getMessage()
    {
        return $this->mensaje;
    }

    public function set()
    {
        $this->query = "INSERT INTO usuarios(nombre, email, password) VALUES(:nombre,:email,:password)";
        //$this->parametros['id']= $id;
        $this->parametros['nombre'] = $this->nombre;
        $this->parametros['email'] = $this->email;
        $this->parametros['password'] = $this->password;
        $this->get_results_from_query();
        //$this->execute_single_query();
        $this->mensaje = 'Usuario agregado correctamente';
    }

    public function get($id = "")
    {
        $this->query = "SELECT nombre,email FROM usuarios WHERE id=(:id)";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        return $this->rows;
    }
    public function edit()
    {
        $this->query = "UPDATE usuarios SET nombre=:nombre WHERE id=:id";
        $this->parametros['id'] = $this->id;
        $this->parametros['nombre']=$this->nombre;
        var_dump($this->parametros);
        $this->get_results_from_query();
    }

    public function delete()
    {
        
    }


}


