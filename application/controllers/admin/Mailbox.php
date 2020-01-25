<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mailbox extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
    }

	public function compose()
	{
        if ( ! $this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Load Template */
            $this->template->admin_render('admin/mailbox/compose', $this->data);
        }
	}
}
