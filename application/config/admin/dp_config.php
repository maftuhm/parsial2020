<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['title']      = 'PARSIAL 2020';
$config['title_mini'] = 'P20';
$config['title_lg']   = 'PARSIAL2020';



/* Display panel login */
$config['auth_social_network'] = FALSE;
$config['forgot_password']     = FALSE;
$config['new_membership']      = FALSE;



/*
 * **********************
 * AdminLTE
 * **********************
 */
/* Page Title */
$config['pagetitle_open']     = '<h1>';
$config['pagetitle_close']    = '</h1>';
$config['pagetitle_el_open']  = '<small>';
$config['pagetitle_el_close'] = '</small>';

/* Breadcrumbs */
$config['breadcrumb_open']     = '<ol class="breadcrumb">';
$config['breadcrumb_close']    = '</ol>';
$config['breadcrumb_el_open']  = '<li>';
$config['breadcrumb_el_close'] = '</li>';
$config['breadcrumb_el_first'] = '<i class="fa fa-dashboard"></i>';
$config['breadcrumb_el_last']  = '<li class="active">';

$config['datatable_attributes'] = array(
	'scrollX' => 'true', 
	'paging' => 'true', 
	'lengthChange' => 
	'true', 'searching' => 'false', 
	'ordering'=> 'true', 
	'info' => 'true', 
	'autoWidth' => 'false'
);


