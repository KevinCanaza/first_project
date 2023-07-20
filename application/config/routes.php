<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/



// Define el controlador y método por defecto cuando no se especifica una ruta en la URL.
$route['default_controller'] = 'project/index';

// Permite establecer una ruta personalizada para manejar las páginas de error 404 (páginas no encontradas).
$route['404_override'] = '';

// Controla cómo CodeIgniter interpreta las guiones en las rutas.
$route['translate_uri_dashes'] = FALSE;

// Ruta personalizada para acceder al método 'index' del controlador 'project'.
$route['project'] = "project/index";

// Ruta personalizada para acceder al método 'create' del controlador 'project'.
$route['project/create'] = "project/create"; 

// Ruta personalizada para acceder al método 'store' del controlador 'project' utilizando el verbo HTTP POST.
$route['project/store']['post'] = "project/store";

// Ruta personalizada para acceder al método 'edit' del controlador 'project' con un parámetro numérico (ID) en la URL.
$route['project/edit/(:num)'] = "project/edit/$1";

// Ruta personalizada para acceder al método 'update' del controlador 'project' utilizando el verbo HTTP PUT y con un parámetro numérico (ID) en la URL.
$route['project/update/(:num)']['put'] = "project/update/$1";

// Ruta personalizada para acceder al método 'delete' del controlador 'project' utilizando el verbo HTTP DELETE y con un parámetro numérico (ID) en la URL.
$route['project/delete/(:num)']['delete'] = "project/delete/$1";

// Ruta personalizada para acceder al método 'show' del controlador 'project' con un parámetro numérico (ID) en la URL.
$route['project/show/(:num)'] = "project/show/$1";

