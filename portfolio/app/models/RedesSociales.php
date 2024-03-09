<?php
namespace App\Models;
require_once("DBAbstractModel.php");

class RedesSociales extends DBAbstractModel
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
    private $url;
    private $created_at;
    private $updated_at;
    private  $usuarios_id;


    public function setID($id)
    {
        $this->id = $id;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function set() {}

    public function get($id = '') {}

    public function edit() {}

    public function delete() {}

    public function getAllRedesSociales()
    {
        $this->query = "SELECT * FROM redes_sociales";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getRedesSocialesPorUsuariosId($id = '')
    {
        $this->query = "SELECT * FROM redes_sociales WHERE usuarios_id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function anadirRedSocial($url, $usuarios_id)
    {
        $this->query = "INSERT INTO redes_sociales (url, usuarios_id) VALUES (:url, :usuarios_id)";
        $this->parametros['url'] = $url;
        $this->parametros['usuarios_id'] = $usuarios_id;
        $this->get_results_from_query();
    }

    public function eliminarRedSocial($id)
    {
        $this->query = "DELETE FROM redes_sociales WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
    }

    public function ocultarRedSocial($id)
    {
        $this->query = "SELECT * FROM redes_sociales WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        
        if ($this->rows[0]['visible'] == 1) {
            $this->query = "UPDATE redes_sociales SET visible = 0 WHERE id = :id";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
            $this->mensaje = 'Red social ocultada';
        } else {
            $this->query = "UPDATE redes_sociales SET visible = 1 WHERE id = :id";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
            $this->mensaje = 'Red social mostrada';
        }
    }

}
