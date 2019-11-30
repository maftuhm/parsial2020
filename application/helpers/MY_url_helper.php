<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('is_url_exist'))
{
    function is_url_exist($url = NULL)
    {
        if ( ! empty($url) && filter_var($url, FILTER_VALIDATE_URL))
        {
            if (function_exists('curl_version'))
            {
                $ch = curl_init($url);    

                curl_setopt($ch, CURLOPT_NOBODY, TRUE);
                curl_exec($ch);

                $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                if ($code == 200)
                {
                    $status = TRUE;
                }
                else
                {
                    $status = FALSE;
                }

                curl_close($ch);

                return $status;
            }
            else
            {
                $headers = @get_headers($url);

                return stripos($headers[0], '200 OK') ? TRUE : FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }
}

if ( ! function_exists('force_ssl'))
{
    function force_ssl()
    {
        $CI =& get_instance();
        if ( ! $CI->input->server('HTTPS'))
        {
            $CI->config->config['base_url'] = $CI->config->config['base_url_absolute_ssl'];
            redirect($CI->uri->uri_string());
        }
    }
}
 
if ( ! function_exists('remove_ssl'))
{
    function remove_ssl()
    {
        $CI =& get_instance();
        if ($CI->input->server('HTTPS'))
        {
            $CI =& get_instance();
            $CI->config->config['base_url'] = $CI->config->config['base_url_absolute'];
            redirect($CI->uri->uri_string());
        }
    }
}