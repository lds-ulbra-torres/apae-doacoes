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

/** DASHBOARD */
$route['donations'] = "DashboardController";
$route['donations/filter'] = "DashboardController/filter";
$route['donations/edit-collection/(:num)'] = "DashboardController/editCollection/$1";
/** FIM DASHBOARD */

/** TERMS  */
$route['terms/banco-brasil/(:num)'] = "TermsController/bancoBrasil/$1";
$route['terms/banrisul/(:num)'] = "TermsController/banrisul/$1";
/** FIM TERMS */

/** CEDENTES */
$route['cedentes'] = "CedenteController";
$route['cedentes/add'] = "CedenteController/add";
$route['cedentes/create'] = "CedenteController/create";
$route['cedentes/edit/(:num)'] = "CedenteController/edit/$1";
$route['cedentes/update'] = "CedenteController/update";
$route['cedentes/delete/(:num)'] = "CedenteController/delete/$1";
$route['cedentes/show/(:num)'] = "CedenteController/show/$1";
/** FIM CEDENTES */

/** FREQUENCIA */
$route['frequency'] = 'FrequencyController';
$route['frequency/add'] = 'FrequencyController/add';
$route['frequency/create'] = 'FrequencyController/create';
$route['frequency/edit/(:num)'] = 'FrequencyController/edit/$1';
$route['frequency/update/(:num)'] = 'FrequencyController/update/$1';
$route['frequency/delete/(:num)'] = 'FrequencyController/delete/$1';
/** FIM FREQUENCIA */

/** BANCOS */
$route['banks'] = "BanksController";
$route['banks/add'] = "BanksController/add";
$route['banks/create'] = "BanksController/create";
$route['banks/delete/(:num)'] = "BanksController/delete/$1";
$route['banks/update/(:num)'] = "BanksController/update/$1";
$route['banks/edit/(:num)'] = "BanksController/edit/$1";
/** FIM BANCOS */

/** CATEGORIAS */
$route['category'] = 'CategoryController';
$route['category/add'] = 'CategoryController/add';
$route['category/create'] = 'CategoryController/create';
$route['category/edit/(:num)'] = 'CategoryController/edit/$1';
$route['category/update/(:num)'] = 'CategoryController/update/$1';
$route['category/delete/(:num)'] = '/CategoryController/delete/$1';
/** FIM CATEGORIAS */

/** ASSOCIADOS */
$route['associated'] = "AssociatedController";
$route['associated/search'] = "AssociatedController/search";
$route['associated/(:num)'] = "AssociatedController/index/$1";
$route['associated-detail/(:num)'] = "AssociatedController/detailedAssociate/$1";
$route['associated/new'] = "AssociatedController/newAssociate";
$route['associated/create'] = "AssociatedController/createAssociate";
$route['associated/edit/(:num)'] = "AssociatedController/editAssociate/$1";
$route['associated/update'] = "AssociatedController/updateAssociate";
$route['associated/delete/(:num)'] = "AssociatedController/deleteAssociate/$1";
$route['associated/inactive/(:num)'] = "AssociatedController/inactiveAssociate/$1";
$route['associated/active/(:num)'] = "AssociatedController/activeAssociate/$1";

$route['associated/(:num)/collections'] = "CollectionsController/index/$1";
$route['associated/(:num)/collections/(:num)/edit'] = "CollectionsController/editCollection/$2";
$route['associated/(:num)/collections/update'] = "CollectionsController/updateCollection";
$route['associated/(:num)/collections/(:num)'] = "CollectionsController/detailCollection/$2";
$route['associated/(:num)/collections/new'] = "CollectionsController/newCollection";
$route['associated/(:num)/collections/create'] = "CollectionsController/createCollection";
$route['associated/(:num)/collections/delete/(:num)'] = "CollectionsController/deleteCollection/$2";
$route['associated/(:num)/collections/renew'] = "CollectionsController/renewCollection/$1";
/** Fim Associados */

/** Parceiros */
$route['partner'] = "PartnerController";
$route['partner/search'] = "PartnerController/search";
$route['partner/new'] = "PartnerController/newPartner";
$route['partner/create'] = "PartnerController/createPartner";
$route['partner/edit/(:num)'] = "PartnerController/editPartner/$1";
$route['partner/update'] = "PartnerController/updatePartner";
$route['partner/delete/(:num)'] = "PartnerController/deletePartner/$1";
$route['partner/partner-detail/(:num)'] = "PartnerController/detailPartner/$1";
/** FIM Parceiros */

/** Notificacoes */
//New Partner
$route['newPartners'] = "NotificationController/newPartners";
$route['detailPartner/(:num)'] = "NotificationController/detailPartner/$1";
$route['became-partner/(:num)'] = "NotificationController/becamePartner/$1";
$route['refused-partner/(:num)'] = "NotificationController/refusedPartner/$1";
$route['api/pre_partner'] = "NotificationApiController/postPrePartner";
//New Associated
$route['newAssociateds'] = "NotificationController/newAssociateds";
$route['detailAssociated/(:num)'] = "NotificationController/detailAssociated/$1";
$route['became-associated/(:num)'] = "NotificationController/becameAssociated/$1";
$route['refused-associated/(:num)'] = "NotificationController/refusedAssociated/$1";
$route['api/pre_associated'] = "NotificationApiController/postPreAssociated";
/** FIM Notificacoes */

/** CARTEIRAS */
$route['carteiras'] = "CarteiraController";
$route['carteiras/add'] = "CarteiraController/add";
$route['carteiras/create'] = "CarteiraController/create";
$route['carteiras/edit/(:num)'] = 'CarteirasController/update/$1';
$route['carteiras/delete/(:num)'] = 'CarteirasController/delete/$1';
/** FIM CARTEIRAS */

/** Ion Auth */
$route['login'] = 'auth/login';
$route['edit_user/(:num)'] = 'auth/edit_user/$1';
$route['change_password'] = 'auth/change_password';
$route['users'] = 'auth';
/** FIM Ion Auth */

/** API */
$route['api/partner/(:num)'] = "PartnerApiController/getPartnersByIdAPI/$1";
$route['api/category'] = "CategoryApiController/getCategories";
$route['api/partnerByCategory/(:num)'] = "PartnerApiController/getPartnersByCategoryAPI/$1";
//Version 2
$route['api/v2/partnerByCategory/(:num)'] = "PartnerApiController/getPartnersByCategoryAPI_V2/$1";
$route['api/v2/partner/(:num)'] = "PartnerApiController/getPartnersByIdAPI_V2/$1";
/**FIM API */


/** Testes */
$route['tests'] = 'tests/TestsController';
$route['tests/associated'] = 'tests/AssociatedTestController';
