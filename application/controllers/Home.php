<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->helper('number');
    }

	public function index()
	{
        $this->template->public_render('public/home', $this->data);
	}
}
