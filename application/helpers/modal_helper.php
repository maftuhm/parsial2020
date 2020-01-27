<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('sweet_alert'))
{
    function sweet_alert($data = '', $title = '')
    {
		$defaults = array(
			'icon' => is_array($data) ? '' : 'success',
			'title' => 'Success!',
			'text'=> '',
			'showCloseButton'=> 'true'
		);
		return '<script type="text/javascript">Swal.fire({'.parse_form_attributes_($data, $defaults).'})</script>';
    }
}
if ( ! function_exists('sweet_alert_open'))
{
    function sweet_alert_open($data = '')
    {
		$defaults = array(
			'icon' => 'error',
			'title' => 'Terjadi kesalahan!',
			'showCloseButton'=> 'true'
		);
		return '<script type="text/javascript">Swal.fire({'.parse_form_attributes_($data, $defaults)." html : '";
    }
}

if ( ! function_exists('sweet_alert_close'))
{
    function sweet_alert_close()
    {
		
		return "'})</script>";
    }
}

if ( ! function_exists('alert_admin_open'))
{
    function alert_admin_open($kind = 'success', $title = '')
    {
    	$header = '	<div id="alert-modal" class="modal fade modal-'.$kind.'">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">'.$title.'</h4>
								</div>
								<div class="modal-body">';
		return $header;
    }
}

if ( ! function_exists('alert_admin_close'))
{
    function alert_admin_close()
    {
    	$footer = '				</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>';
		return $footer;
    }
}

if ( ! function_exists('alert_admin'))
{
    function alert_admin($kind = 'success', $title = '', $message = '')
    {
		return alert_admin_open($kind, $title) . $message . alert_admin_close();
    }
}

if ( ! function_exists('attributes_to_string_'))
{
	function attributes_to_string_($attributes, $separator = array(':', ','), $string_value = TRUE)
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
				if ($string_value == TRUE)
				{
					$atts .= " ".$key.$separator[0]."'".$val."'".$separator[1];					
				}
				else
				{
					$atts .= " '".$key."'".$separator[0].$val.$separator[1];					
				}
			}

			return $atts;
		}

		if (is_string($attributes))
		{
			return " ".$attributes;
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
			if ($val == 'false' || $val == 'true')
			{
				$att .= $key.":".$val.", ";
			}
			else
			{
				$att .= $key.":'".$val."', ";
			}

		}

		return $att;
	}
}