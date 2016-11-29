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
$route['default_controller'] = 'Welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/** CEDENTES */
$route['cedentes'] = "CedenteController";
$route['cedentes/add'] = "CedenteController/add";
$route['cedentes/create'] = "CedenteController/create";
$route['cedentes/edit/(:num)'] = "CedenteController/edit/$1";
$route['cedentes/update'] = "CedenteController/update";
$route['cedentes/delete/(:num)'] = "CedenteController/delete/$1";
$route['cedentes/show/(:num)'] = "CedenteController/show/$1";

/** FREQUENCIA */
$route['frequency'] = 'FrequencyController';
$route['frequency/add'] = 'FrequencyController/add';
$route['frequency/create'] = 'FrequencyController/create';
$route['frequency/edit/(:num)'] = 'FrequencyController/edit/$1';
$route['frequency/update/(:num)'] = 'FrequencyController/update/$1';
$route['frequency/delete/(:num)'] = 'FrequencyController/delete/$1';

/** BANCOS */
$route['banks'] = "BanksController";
$route['banks/add'] = "BanksController/add";
$route['banks/create'] = "BanksController/create";
$route['banks/delete/(:num)'] = "BanksController/delete/$1";
$route['banks/update/(:num)'] = "BanksController/update/$1";
$route['banks/edit/(:num)'] = "BanksController/edit/$1";

/** ASSOCIADOS */
$route['associated'] = "AssociatedController";
$route['associated/(:num)'] = "AssociatedController/index/$1";
$route['associated-detail/(:num)'] = "AssociatedController/detailedAssociate/$1";
$route['associated/new'] = "AssociatedController/newAssociate";
$route['associated/create'] = "AssociatedController/createAssociate";
$route['associated/edit/(:num)'] = "AssociatedController/editAssociate/$1";
$route['associated/update'] = "AssociatedController/updateAssociate";
$route['associated/delete/(:num)'] = "AssociatedController/deleteAssociate/$1";
$route['associated/inactive/(:num)'] = "AssociatedController/inactiveAssociate/$1";

$route['associated/(:num)/collections'] = "CollectionsController/index/$1";
/** Fim Associados */

/** CARTEIRAS */
$route['carteiras'] = "CarteiraController";
$route['carteiras/add'] = "CarteiraController/add";
$route['carteiras/create'] = "CarteiraController/create";
$route['carteiras/edit/(:num)'] = 'CarteirasController/update/$1';
$route['carteiras/delete/(:num)'] = 'CarteirasController/delete/$1';
/** FIM CARTEIRAS */
