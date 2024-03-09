<?php
namespace App\Models;
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
    private  $nombre;

    private $descripcion;
    private $tecnologias;
    private $created_at;
    private $updated_at;
    private  $usuarios_id;


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

    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function set() {}

    public function get($id = '') {}

    public function edit() {}

    public function delete() {}

    public function getAllProyectos()
    {
        $this->query = "SELECT * FROM proyectos";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getProyectosPorUsuariosId($id = '')
    {
        $this->query = "SELECT * FROM proyectos WHERE usuarios_id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function anadirProyecto($titulo, $descripcion, $usuarios_id)
    {
        $this->query = "SELECT * FROM usuarios WHERE id = :usuarios_id";
        $this->parametros['usuarios_id'] = $usuarios_id;
        $this->get_results_from_query();
        if (count($this->rows) == 0) {
            $this->mensaje = 'Usuario no encontrado';
            return;
        }
        
        
        $this->query = "INSERT INTO proyectos (titulo, descripcion, usuarios_id) VALUES (:titulo, :descripcion, :usuarios_id)";
        $this->parametros['titulo'] = $titulo;
        $this->parametros['descripcion'] = $descripcion;
        $this->parametros['usuarios_id'] = $usuarios_id;
        $this->get_results_from_query();
    }

    public function eliminarProyecto($id)
    {
        $this->query = "DELETE FROM proyectos WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
    }

    public function ocultarProyecto($id)
    {
        $this->query = "SELECT * FROM proyectos WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        
        if ($this->rows[0]['visible'] == 1) {
            $this->query = "UPDATE proyectos SET visible = 0 WHERE id = :id";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
            $this->mensaje = 'Proyecto ocultado';
        } else {
            $this->query = "UPDATE proyectos SET visible = 1 WHERE id = :id";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
            $this->mensaje = 'Proyecto mostrado';
        }
    }
}
