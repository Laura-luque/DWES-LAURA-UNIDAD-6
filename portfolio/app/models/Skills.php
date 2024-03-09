<?php
namespace App\Models;
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
    private  $usuarios_id;


    public function setID($id)
    {
        $this->id = $id;
    }

    public function setHabilidades($habilidades)
    {
        $this->habilidades = $habilidades;
    }

    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function set() {}

    public function get($id = '') {}

    public function edit() {}

    public function delete() {}

    public function getAllSkills()
    {
        $this->query = "SELECT * FROM skills";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function getSkillsPorUsuariosId($id = '')
    {
        $this->query = "SELECT * FROM skills WHERE usuarios_id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        return $this->rows;
    }

    public function anadirSkill($habilidades, $usuarios_id,$categorias_skills_categoria)
    {
        $this->query = "SELECT * FROM usuarios WHERE id = :usuarios_id";
        $this->parametros['usuarios_id'] = $usuarios_id;
        $this->get_results_from_query();
        if (count($this->rows) == 0) {
            $this->mensaje = 'Usuario no encontrado';
            return;
        }
        
        $this->query = "INSERT INTO skills (habilidades, categorias_skills_categoria, usuarios_id) VALUES (:habilidades, :categorias_skills_categoria, :usuarios_id)";
        $this->parametros['habilidades'] = $habilidades;
        $this->parametros['categorias_skills_categoria'] = $categorias_skills_categoria;
        $this->parametros['usuarios_id'] = $usuarios_id;
        $this->get_results_from_query();
        $this->mensaje = 'Skill añadida correctamente';

    }

    public function eliminarSkill($id)
    {
        $this->query = "DELETE FROM skills WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
    }

    public function ocultarSkill($id)
    {
        $this->query = "SELECT * FROM skills WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        
        if ($this->rows[0]['visible'] == 1) {
            $this->query = "UPDATE skills SET visible = 0 WHERE id = :id";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
            $this->mensaje = 'Skill ocultada';
        } else {
            $this->query = "UPDATE skills SET visible = 1 WHERE id = :id";
            $this->parametros['id'] = $id;
            $this->get_results_from_query();
            $this->mensaje = 'Skill mostrada';
        }
    }
}
