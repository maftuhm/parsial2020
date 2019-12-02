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

	public function upload($content = '')
	{
		$table 	= 'content_mcc_sementara';
		$this->form_validation->set_rules('leader_email', 'lang:leader_email', 'required|valid_email');
		$this->form_validation->set_rules('leader_name', 'lang:leader_name', 'required');

	}
    public function payment($content = '')
	{
		$content_exist = $this->public_model->check_any('contents', array('slug' => $content));

        if (!$content_exist){
			show_404();
        }
        else
        {
        	// $data_content = $this->public_model->get_data('contents', $content, 'slug');
        	// foreach ($data_content as $key) {
        	// 	$title = $key->title;
        	// 	$id_content = $key->id;
        	// }
	        $this->data['header'] = $this->contents_common_model->get_contents($content, 'title');
			$this->data['page_title'] = 'Konfirmasi Pembayaran';
			//$this->data['header'] = $this->data['content_title'][$content];
	        $this->data['title'] = $this->data['page_title'] . ' ' . $this->data['header'] .' - ' . $this->data['title'];
	        // $this->data['sk_url'] = $this->sk_url[$content];
	        //$this->data['tes'] = $data_content;
	        // $this->data['show_filedrag'] = TRUE;
	        // if ($this->data['tes']) {
	        // 	$this->data['tes'] = '122';
	        // }
	        /* Conf */
	        $config['upload_path']      = './upload/'.$content.'/';
	        $config['allowed_types']    = 'pdf|gif|jpg|png|jpeg';
	        $config['max_size']         = 4096;
	        $config['max_width']        = 4096;
	        $config['max_height']       = 4096;
	        $config['file_ext_tolower'] = TRUE;

	        $this->load->library('upload', $config);
			
			// $this->table_content = $this->table[$content];
			$this->form_validation->set_rules('name', 'lang:fullname', 'required');
			$this->form_validation->set_rules(
		        'email', 'lang:email',
		        array(
		        	'required',
					array(
						'is_exist',
						function($value)
						{
							if ($this->public_model->check($this->table_content, $value) == FALSE) {
								return FALSE;
							}
							else
							{
								return TRUE;
							}
						}
					),
					array(
						'has_uploaded',
						function($value)
						{
							if ($this->public_model->check($this->table['payment'], $value, $this->table_content)) {
								return FALSE;
							}
							else
							{
								return TRUE;
							}
						}
					)
		        ),
		        array(
		        	'is_exist' => '{field} ' . set_value('email') . ' belum terdaftar.',
		        	'has_uploaded' => '{field} ' . set_value('email') . ' sudah upload bukti pembayaran.'
		        )
			);
			$email 				= strtolower($this->input->post('email'));
			// $is_exist 			= $this->public_model->check($this->table_content, $email);
			// $has_uploaded 		= $this->public_model->check($this->table['payment'], $email, $this->table_content);
			
			$upload = FALSE;

			if ($this->form_validation->run() == TRUE)
			{
				$email_value = $this->form_validation->set_value('email');
				// if ($is_exist == FALSE) {
				// 	$this->data['message'] = '<p>Email '. $email_value.' belum terdaftar.</p>';
				// }
				// else
				// {
					// if ($has_uploaded) {
					// 	$this->data['message'] = '<p>Email '. $email_value.' sudah upload bukti pembayaran.</p>';
					// }
					// else
					// {
			            $upload = $this->upload->do_upload('userfile');						
					// }
				// }
			}
			else
			{
				$this->data['message'] = validation_errors('<p>', '</p>');
			}
			
			if ($upload == TRUE)
			{

				if ($this->public_model->set_payment($this->table_content))
				{
					$this->form_validation->reset_validation();
					// if ($content == 'tryout') {
					// 	$add_message = ' Terima kasih atas konfirmasi pembayaran anda, kami akan segera memeriksanya. Jika pembayaran Anda sudah masuk ke rekening bank kami, kami akan kirimkan link download kartu peserta melalui email nomor handphone anda.';
					// 	$this->data['modal_success'] = modal_success('Konfirmasi Pembayaran', $this->data['header'] , base_url('tryout/print')/*$this->content_url['print_tryout']*/, base_url('tryout/print'), 'Cetak Kartu Peserta', $add_message);
					// }
					// else
					// {
					// 	$this->data['modal_success'] = modal_success('Konfirmasi Pembayaran', $this->data['header']);
					// }
				}
				else
				{
					$this->data['message'] =  validation_errors('<p>', '</p>');
				}

			}
			else
			{
				$this->data['error'] = $this->upload->display_errors();
			}
			$this->template->public_form_render('public/payment', $this->data);
		}
	}

	function rolekey_exists($key)
	{
		$this->roles_model->role_exists($key);
	}
}

