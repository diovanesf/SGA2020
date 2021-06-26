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
|	https://codeigniter.com/user_guide/general/routing.html
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





$route['default_controller'] = 'authentication';
$route['authentication/register'] = 'authentication/register';


$route['usuarios'] = 'gerenciarusuarios/list';
$route['usuarios/criar'] = 'gerenciarusuarios/new';
$route['usuarios/editar/(:num)'] = 'gerenciarusuarios/edit/$1';
$route['usuarios/update/(:num)'] = 'gerenciarusuarios/update/$1';
$route['usuarios/insert'] = 'gerenciarusuarios/insert';
$route['usuarios/delete/(:num)'] = 'gerenciarusuarios/delete/$1';
$route['amostras/editar/midias/(:num)'] = "amostra/editar_midias/$1";

$route['amostras'] = 'amostra/list';
$route['amostras/criar'] = 'amostra/new';
$route['amostras/editar/(:num)'] = 'amostra/edit/$1';
$route['amostras/delete/(:num)'] = 'amostra/delete/$1';
$route['amostras/update/(:num)'] = 'amostra/update/$1';
$route['amostras/insert'] = 'amostra/insert';

$route['proprietarios'] = 'proprietario/list';
$route['proprietario/criar'] = 'proprietario/new';
$route['proprietario/editar/(:num)'] = 'proprietario/edit/$1';
$route['proprietario/view/(:num)'] = 'proprietario/view/$1';
$route['proprietario/delete/(:num)'] = 'proprietario/delete/$1';
$route['proprietario/update/(:num)'] = 'proprietario/update/$1';
$route['proprietario/insert'] = 'proprietario/insert';
$route['recuperar_senha'] = 'admin/reset_user_password';

$route['exames/(:num)'] = 'amostra/listExame/$1';
$route['exame/criar/(:num)'] = 'amostra/newExame/$1';
$route['exame/editar/(:num)'] = 'amostra/editExame/$1';
$route['exame/delete/(:num)'] = 'amostra/deleteExame/$1';
$route['exame/update/(:num)'] = 'amostra/updateExame/$1';
$route['exame/insert/(:num)'] = 'amostra/insertExame/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

