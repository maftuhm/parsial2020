<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('sweet_alert'))
{
    function sweet_alert($data = 'success', $title = '')
    {
		$defaults = array(
			'icon' => is_array($data) ? '' : $data,
			'title' => $title,
			'text'=> '',
			'showCloseButton'=> 'true'
		);
		return '<script type="text/javascript">Swal.fire({'.parse_form_attributes_($data, $defaults).'})</script>';
    }
}

if ( ! function_exists('attributes_to_string_'))
{
	function attributes_to_string_($attributes)
	{
		if (empty($attributes))
		{
			return '';
		}

		if (is_object($attributes))
		{
			$attributes = (array) $attributes;
		}

		if (is_array($attributes))
		{
			$atts = '';

			foreach ($attributes as $key => $val)
			{
				$atts .= ' '.$key.':"'.$val.'",';
			}

			return $atts;
		}

		if (is_string($attributes))
		{
			return ' '.$attributes;
		}

		return FALSE;
	}
}

if ( ! function_exists('parse_form_attributes_'))
{
	function parse_form_attributes_($attributes, $default)
	{
		if (is_array($attributes))
		{
			foreach ($default as $key => $val)
			{
				if (isset($attributes[$key]))
				{
					$default[$key] = $attributes[$key];
					unset($attributes[$key]);
				}
			}

			if (count($attributes) > 0)
			{
				$default = array_merge($default, $attributes);
			}
		}

		$att = '';

		foreach ($default as $key => $val)
		{
			if ($key === 'value')
			{
				$val = html_escape($val);
			}
			elseif ($key === 'name' && ! strlen($default['name']))
			{
				continue;
			}

			$att .= $key.':"'.$val.'", ';
		}

		return $att;
	}
}