<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('trigger_https'))
{
	function trigger_https()
	{
		// do nothing for these urls
		$exclude_url_list = array();
		//$exclude_url_list[] = '/(.*)js$/';
		foreach ($exclude_url_list as $exclude_url) {
			if(preg_match($exclude_url, uri_string()))
			{
				return;
			}
		}
	 
		// switch to HTTPS for these urls
		$ssl_url_list = array();
		$ssl_url_list[] = '/(.*)contact(.*)$/';
	 
		foreach ($ssl_url_list as $ssl_url) {
			if(preg_match($ssl_url, uri_string()))
			{
				force_ssl();
				return;
			}
		}
	 
		// still here? switch to HTTP (if necessary)
		remove_ssl();
	}
}