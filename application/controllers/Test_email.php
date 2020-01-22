<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_email extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('email');
	}

	public function index(){
		$this->email->send_email();
	}
}
