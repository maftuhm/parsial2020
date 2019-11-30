<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends Public_Controller {

    public function __construct()
    {
        parent::__construct();

    }

	public function mcc()
	{

		$table 	= 'content_mcc_sementara';
		/* Validate form input */
		$this->form_validation->set_rules('tim_name', 'lang:tim_name', 'required');
		$this->form_validation->set_rules('university', 'lang:university', 'required');
		$this->form_validation->set_rules('leader_name', 'lang:leader_name', 'required');
		$this->form_validation->set_rules('leader_major', 'lang:leader_major', 'required');
		$this->form_validation->set_rules('leader_email', 'lang:leader_email', 'required|valid_email|is_unique['.$table.'.leader_email]');
		$this->form_validation->set_rules('leader_phone', 'lang:leader_phone', 'required');
		$this->form_validation->set_rules('member_name', 'lang:member_name', 'required');
		$this->form_validation->set_rules('member_major', 'lang:member_major', 'required');
		$this->form_validation->set_rules('member_email', 'lang:member_email', 'required|valid_email|is_unique['.$table.'.member_email]');
		$this->form_validation->set_rules('member_phone', 'lang:member_phone', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			$data = array(
					'tim_name'		=> $this->input->post('tim_name'),
					'university'	=> $this->input->post('university'),
					'leader_name'	=> $this->input->post('leader_name'),
					'leader_major'	=> $this->input->post('leader_major'),
					'leader_email'	=> $this->input->post('leader_email'),
					'leader_phone'	=> $this->input->post('leader_phone'),
					'member_name'	=> $this->input->post('member_name'),
					'member_major'	=> $this->input->post('member_major'),
					'member_email'	=> $this->input->post('member_email'),
					'member_phone'	=> $this->input->post('member_phone')
				);

			$register = $this->public_model->register($table, $data);
		}

        $this->template->public_form_render('public/mcc', $this->data);
	}
}

