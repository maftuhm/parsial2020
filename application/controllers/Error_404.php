<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_404 extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index(){

    	$this->output->set_status_header('404');
    	$this->template->public_render('public/error_404', $this->data);
  }
}
