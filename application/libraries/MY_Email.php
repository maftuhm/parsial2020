<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Email extends CI_Email {

	public function __construct($config = array())
	{
		parent::__construct($config);
	}
	public function send_email($subject, $message, $to = 'otenk203@gmail.com', $from = 'parsialhimatika.uinjkt@gmail.com', $name = 'PARSIAL HIMATIKA 2020')
	{
		$config['mailtype'] = 'html';
		$this->initialize($config);
		$this->to($to);
		$this->from($from, $name);
		$this->message($message);
		$this->subject($subject);
		$this->send();
	}
	// public function htmlmail()
	// {
	// 	$config = Array(    
	// 		'protocol' => 'sendmail',
	// 		'smtp_host' => 'your domain SMTP host',
	// 		'smtp_port' => 25,
	// 		'smtp_user' => 'SMTP Username',
	// 		'smtp_pass' => 'SMTP Password',
	// 		'smtp_timeout' => '4',
	// 		'mailtype' => 'html',
	// 		'charset' => 'iso-8859-1'
	// 	);

	// 	$this->load->library('email', $config);
	// 	$this->email->set_newline("\r\n");
	// 	$this->email->from('your mail id', 'Anil Labs');

	// 	$data = array(
	// 		'name'=> 'Manoj Patil',
	// 		'URL'=> 'http://manojpatial.com/login',
	// 		'user_name'=> 'manojpatil',
	// 		'password'=> 'welcome',

	// 	);

	// 	$this->email->to($user_email);
	// 	$this->email->subject($subject);

	// 	$this->email->message($message); 
	// 	$this->email->send();

	// }
}