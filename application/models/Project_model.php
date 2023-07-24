<?php

// Se define la clase Project_model que extiende la clase CI_Model del framework CodeIgniter
class Project_model extends CI_Model{

    // Constructor de la clase
	public function __construct(){
		// Carga la biblioteca de la base de datos para utilizarla en la clase
		$this->load->database();
		// Carga el helper URL para trabajar con URLs de manera más sencilla base_url()
		$this->load->helper('url');
	}
 
    // Método para obtener todos los proyectos con estado activo (status = 1)
   // Método para obtener todos los proyectos con estado activo (status = 1) junto con sus áreas y supervisores
   public function get_all()
   {
       // Selecciona los campos deseados de la tabla projects y los campos 'name' de las tablas areas y supervisors
       $this->db->select('projects.*, area.name as area_name, supervisor.name as supervisor_name');
       // Define una condición para la consulta: obtener solo proyectos con 'status' igual a 1 (activo)
       $this->db->where('projects.status', 1);
       // Realiza el LEFT JOIN con la tabla 'areas' usando la clave foránea 'area_id'
       $this->db->join('area AS area', 'area.id = projects.area_id', 'left');
       // Realiza el LEFT JOIN con la tabla 'supervisors' usando la clave foránea 'supervisor_id'
       $this->db->join('supervisor AS supervisor', 'supervisor.id = projects.supervisor_id', 'left');
       // Realiza la consulta a la tabla 'projects' y obtiene los resultados como un array de objetos
       $projects = $this->db->get("projects")->result();
       // Devuelve el array de proyectos obtenidos
       return $projects;
   }


    // Método para guardar un nuevo proyecto en la base de datos
	public function store($data)
	{
		// Inserta los datos del nuevo proyecto en la tabla 'projects' de la base de datos
		$result = $this->db->insert('projects', $data);
		// Devuelve el resultado de la operación de inserción (true o false)
		return $result;
	}

    // Método para obtener un proyecto específico por su ID
	public function get($id)
    {
        // Realiza una consulta a la tabla 'projects' buscando un proyecto con el ID especificado
        $project = $this->db->get_where('projects', ['id' => $id])->row();
        // Devuelve el resultado de la consulta (un solo objeto representando el proyecto encontrado)
        return $project;
    }

    public function get_project($id)
    {
        // Selecciona los campos deseados de la tabla projects y los campos 'name' de las tablas areas y supervisors
        $this->db->select('projects.*, area.name as area_name, supervisor.name as supervisor_name');
        // Realiza el LEFT JOIN con la tabla 'areas' usando la clave foránea 'area_id'
        $this->db->join('area', 'area.id = projects.area_id', 'left');
        // Realiza el LEFT JOIN con la tabla 'supervisors' usando la clave foránea 'supervisor_id'
        $this->db->join('supervisor', 'supervisor.id = projects.supervisor_id', 'left');
        // Realiza una consulta a la tabla 'projects' buscando un proyecto con el ID especificado
        $project = $this->db->get_where('projects', ['projects.id' => $id])->row();
        // Devuelve el resultado de la consulta (un solo objeto representando el proyecto encontrado)
        return $project;
    }

    // Método para actualizar un proyecto existente en la base de datos por su ID
	public function update($id,$data) 
    { 
        // Actualiza los datos del proyecto en la tabla 'projects' basándose en el ID proporcionado
        $result = $this->db->where('id', $id)->update('projects', $data);
        // Devuelve el resultado de la operación de actualización (true o false)
        return $result;        
    }

    // Método para "eliminar" un proyecto cambiando su estado a inactivo (status = 0)
	public function delete($id)
    {
        // Define el nuevo estado del proyecto (inactivo) a través de un array
		$data = [
            'status' => '0'
        ];
        // Actualiza el estado del proyecto en la tabla 'projects' basándose en el ID proporcionado
        $result = $this->db->where('id', $id)->update('projects', $data);
        // Devuelve el resultado de la operación de actualización (true o false)
        return $result;
    }
}
