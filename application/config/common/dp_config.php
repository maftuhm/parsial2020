<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Base Site URL
|--------------------------------------------------------------------------
|
*/
// Possible hosts locally. You can add some if needed.
$config['host_dev'] = array('localhost', '127.0.0.1', '::1');

// Fill in the file of your project here when you develop locally.
$host_dev = 'parsial2020';

// Fill in the domain name here when your project is online.
// Example : www.johndoe.com
//           johndoe.com
$host_prod = 'www.parsialhimatika.com';

// WARNING: Do not modify the lines below
$domain = (in_array($_SERVER['HTTP_HOST'], $config['host_dev'], TRUE)) ? $_SERVER['HTTP_HOST'] . '/' . $host_dev : $host_prod;

$config['base_url'] = ( ! empty($_SERVER['HTTPS'])) ? 'https://' . $domain : 'http://' . $domain;

$config['base_url_absolute']	= 'http:'.$domain;
$config['base_url_absolute_ssl']	= 'https://'.$domain; 

/*
|--------------------------------------------------------------------------
| Index File
|--------------------------------------------------------------------------
|
*/
$config['index_page'] = '';

/*
|--------------------------------------------------------------------------
| Assets
|--------------------------------------------------------------------------
|
*/
$config['assets_dir']     = 'assets';
$config['frameworks_dir'] = $config['assets_dir'] . '/frameworks';
$config['plugins_dir']    = $config['assets_dir'] . '/plugins';
$config['templates_dir']    = $config['assets_dir'] . '/templates';


/*
|--------------------------------------------------------------------------
| Upload
|--------------------------------------------------------------------------
|
*/
$config['upload_dir']     = 'upload';
$config['avatar_dir']     = $config['upload_dir'] . '/avatar';
