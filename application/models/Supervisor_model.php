<?php

// Se define la clase Supervisor_model que extiende la clase CI_Model del framework CodeIgniter
class Supervisor_model extends CI_Model{

    // Constructor de la clase
	public function __construct(){
		// Carga la biblioteca de la base de datos para utilizarla en la clase
		$this->load->database();
		// Carga el helper URL para trabajar con URLs de manera más sencilla base_url()
		$this->load->helper('url');
	}

    // Método para obtener todos los proyectos con estado activo (status = 1)
	public function get_all(){
		// Define una condición para la consulta: obtener solo proyectos con 'status' igual a 1 (activo)
		$this->db->where('status', 1);
		// Realiza la consulta a la tabla 'supervisors' y obtiene los resultados como un array de objetos
		$supervisors = $this->db->get("supervisor")->result();
		// Devuelve el array de supervisores obtenidos
		return $supervisors;
	}

    // Método para guardar un nuevo supervisor en la base de datos
	public function store()
	{
		// Obtiene los datos del nuevo supervisor desde el formulario enviado a través del método POST
		$data = [
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
			'department' => $this->input->post('department'),
		];

		// Inserta los datos del nuevo supervisor en la tabla 'supervisors' de la base de datos
		$result = $this->db->insert('supervisor', $data);
		// Devuelve el resultado de la operación de inserción (true o false)
		return $result;
	}

    // Método para obtener un supervisor específico por su ID
	public function get($id)
    {
        // Realiza una consulta a la tabla 'supervisors' buscando un supervisor con el ID especificado
        $supervisor = $this->db->get_where('supervisor', ['id' => $id])->row();
        // Devuelve el resultado de la consulta (un solo objeto representando el supervisor encontrado)
        return $supervisor;
    }

    // Método para actualizar un supervisor existente en la base de datos por su ID
	public function update($id) 
    {
        // Obtiene los nuevos datos del supervisor desde el formulario enviado a través del método POST
		$data = [
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
			'department' => $this->input->post('department'),
		];
 
        // Actualiza los datos del supervisor en la tabla 'supervisors' basándose en el ID proporcionado
        $result = $this->db->where('id', $id)->update('supervisor', $data);
        // Devuelve el resultado de la operación de actualización (true o false)
        return $result;        
    }

    // Método para "eliminar" un supervisor cambiando su estado a inactivo (status = 0)
	public function delete($id)
    {
        // Define el nuevo estado del supervisor (inactivo) a través de un array
		$data = [
            'status' => '0'
        ];
        // Actualiza el estado del supervisor en la tabla 'supervisors' basándose en el ID proporcionado
        $result = $this->db->where('id', $id)->update('supervisor', $data);
        // Devuelve el resultado de la operación de actualización (true o false)
        return $result;
    }
}
