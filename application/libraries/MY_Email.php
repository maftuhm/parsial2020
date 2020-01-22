<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Email extends CI_Email {

	public function __construct($config = array())
	{
		parent::__construct($config);
	}
	public function send_email($email = 'otenk203@gmail.com', $name = 'Maftuh Mashuri')
	{
		$this->from('maftuhsafii@gmail.com');
		$this->to($email);
		$this->subject('Email Test');
		$this->message('Testing the email class.');

		$this->send();
	}
}