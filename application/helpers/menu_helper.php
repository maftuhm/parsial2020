<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('active_link_controller'))
{
    function active_link_controller($controller)
    {
        $CI    =& get_instance();
        $class = $CI->router->fetch_class();

        return ($class == $controller) ? 'active' : NULL;
    }
}


if ( ! function_exists('active_link_function'))
{
    function active_link_function($method)
    {
        $CI    =& get_instance();
        $class = $CI->router->fetch_method();

        return ($class == $method) ? 'active' : NULL;
    }
}

if ( ! function_exists('active_link_function_paramater'))
{
    function active_link_function_paramater($object)
    {
        $CI    =& get_instance();
        $class = $CI->uri->segment(4);

        return ($class == $object) ? 'active' : NULL;
    }
}
