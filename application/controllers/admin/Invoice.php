<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->template->admin_render('admin/invoice/index', $this->data);
    }
}
