<?php

// Verifica que el script se esté ejecutando desde CodeIgniter y evita el acceso directo al archivo
defined('BASEPATH') OR exit('No direct script access allowed');

// Se define la clase Project que extiende la clase CI_Controller del framework CodeIgniter
class Area extends CI_Controller{

	// Constructor de la clase
	public function __construct(){
		// Se invoca el constructor de la clase padre (CI_Controller)
		parent::__construct();
		// Carga la biblioteca de validación de formularios para realizar validaciones de datos
		$this->load->library('form_validation');
		// Carga la biblioteca de sesiones para trabajar con sesiones de usuario
		$this->load->library('session');
		// Carga el modelo 'Project_model' utilizando el alias 'area' para poder acceder a sus métodos
		$this->load->model('Area_model', 'area');
	}

	// Método para mostrar la página principal que lista todos los proyectos
	public function index(){
		// Obtiene todos los proyectos activos (status = 1) desde el modelo y los almacena en el array $data['areas']
		$data['areas'] = $this->area->get_all();
		// Define el título de la página
		$data['title'] = "First area";
		
		// Carga la vista 'header' que contiene la parte superior de la página
		$this->load->view('project/header');

		// Carga la vista 'index' que muestra la lista de proyectos y pasa los datos del array $data
		$this->load->view('area/index', $data);

		// Carga la vista 'footer' que contiene la parte inferior de la página
		$this->load->view('project/footer');
	}

	// Método para mostrar la página de creación de un nuevo proyecto
	public function create()
	{
		// Define el título de la página
		$data['title'] = "Create Area";
		// Carga la vista 'header'
		$this->load->view('project/header');
		// Carga la vista 'create' que muestra el formulario de creación de proyectos y pasa los datos del array $data
		$this->load->view('area/create', $data);
		// Carga la vista 'footer'
		$this->load->view('project/footer');
	}

	// Método para guardar los datos del nuevo proyecto en la base de datos
	public function store()
	{
		// Define las reglas de validación para los campos 'name' y 'description' del formulario
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('department', 'Department', 'required');
   
		// Verifica si las reglas de validación se cumplen o no
		if (!$this->form_validation->run())
		{
			// Si la validación falla, establece un mensaje de error en la sesión y redirecciona a la página de creación de proyectos
			$this->session->set_flashdata('errors', validation_errors());
			redirect(base_url('area/create'));
		}
		else
		{
			// Si la validación es exitosa, guarda los datos del nuevo proyecto utilizando el método 'store' del modelo 'Project_model'
			$this->area->store();
			// Establece un mensaje de éxito en la sesión y redirecciona a la página principal de proyectos
			$this->session->set_flashdata('success', "Saved Successfully!");
			redirect(base_url('area'));
		}
	}

	// Método para mostrar la página de edición de un proyecto existente
	public function edit($id)
	{
		// Obtiene los datos del proyecto con el ID especificado utilizando el método 'get' del modelo 'Project_model'
		$data['area'] = $this->area->get($id);
		// Define el título de la página
		$data['title'] = "Edit Area";
		// Carga la vista 'header'
		$this->load->view('project/header');
		// Carga la vista 'edit' que muestra el formulario de edición de proyectos y pasa los datos del array $data
		$this->load->view('area/edit', $data);
		// Carga la vista 'footer'
		$this->load->view('project/footer');
	}

	// Método para actualizar los datos de un proyecto existente en la base de datos
	public function update($id)
	{
		// Define las reglas de validación para los campos 'name' y 'description' del formulario
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('department', 'Department', 'required');

		// Verifica si las reglas de validación se cumplen o no
		if (!$this->form_validation->run()) {
			// Si la validación falla, establece un mensaje de error en la sesión y redirecciona a la página de edición del proyecto
			$this->session->set_flashdata('errors', validation_errors());
			redirect(base_url('area/edit/' . $id));
		} else {
			// Si la validación es exitosa, actualiza los datos del proyecto utilizando el método 'update' del modelo 'Project_model'
			$this->area->update($id);
			// Establece un mensaje de éxito en la sesión y redirecciona a la página principal de proyectos
			$this->session->set_flashdata('success', "Updated Successfully!");
			redirect(base_url('area'));
		}
	}

	// Método para "eliminar" un proyecto cambiando su estado a inactivo (status = 0)
	public function delete($id)
	{
		// Llama al método 'delete' del modelo 'Project_model' para "eliminar" el proyecto (cambiando su estado a inactivo)
		$item = $this->area->delete($id);
		// Establece un mensaje de éxito en la sesión y redirecciona a la página principal de proyectos
		$this->session->set_flashdata('success', "Deleted Successfully!");
		redirect(base_url('area'));
	}

	// Método para mostrar los detalles de un proyecto específico
	public function show($id)
	{
		// Obtiene los datos del proyecto con el ID especificado utilizando el método 'get' del modelo 'Project_model'
		$data['area'] = $this->area->get($id);
		// Define el título de la página
		$data['title'] = "Show Area";
		// Carga la vista 'header'
		$this->load->view('project/header');
		// Carga la vista 'show' que muestra los detalles del proyecto y pasa los datos del array $data
		$this->load->view('area/show', $data);
		// Carga la vista 'footer'
		$this->load->view('project/footer'); 
	}
}
