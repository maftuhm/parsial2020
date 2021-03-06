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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] 	= 'home';
$route['404_override'] 			= 'error_404';
$route['translate_uri_dashes'] 	= FALSE;

$route['email'] 				= 'test_email';

/* ===== ADMIN ROUTES ===== */
$route['admin'] 							= 'admin/dashboard';
$route['admin/prefs/interfaces/(:any)'] 	= 'admin/prefs/interfaces/$1';
$route['admin/contents/create/q/(:any)'] 	= 'admin/contents/create_question/$1';
$route['admin/contents/p/(:any)']			= 'admin/contents_data/page/$1';
$route['admin/contents/p/(:any)/(:any)/(:any)']	= 'admin/contents_data/$2/$1/$3';
$route['admin/contents/p/(:any)/(:any)/(:any)/(:any)']	= 'admin/contents_data/$2/$1/$3/$4';

/* ===== PUBLIC ROUTES ===== */
$route['coming-soon'] 			= 'public/coming_soon';
$route['(:any)'] 				= 'public/register/$1';
$route['upload/mcc/penyisihan'] = 'public/register/penyisihan_mcc';
$route['upload/mcc/penyisihan/(:any)'] = 'public/register/penyisihan_mcc/$1';
$route['upload/mcc'] 			= 'public/register/upload_mcc';
$route['upload/mcc/(:any)'] 	= 'public/register/upload_mcc/$1';
$route['upload/futsal'] 		= 'public/register/upload_futsal';
$route['upload/futsal/(:any)'] 	= 'public/register/upload_futsal/$1';

// $route['upload/(:any)'] 		= 'public/register/upload/$1';
// $route['upload/(:any)/(:any)'] 	= 'public/register/upload/$1/$2';
$route['payment/(:any)'] 		= 'public/register/payment/$1';
$route['payment/(:any)/(:any)'] = 'public/register/payment/$1/$2';
