<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->data['message'] = '';
        $this->data['error'] = '';

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

		if ($this->form_validation->run() == TRUE) {

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

			$id = $this->public_model->register($table, $data);
			if ($id != FALSE) {
				redirect('upload/mcc/'.$id, 'refresh');
			}
		}
		else
		{
			$this->data['message'] = validation_errors();
		}
    
        $this->template->public_form_render('public/mcc', $this->data);
	}

	public function upload($content = '', $id = '')
	{
		$content_exist = $this->public_model->check_any('contents', array('slug' => $content));
		$this->table 	= 'content_mcc_sementara';
		// $this->data['content_id'] = '';
		// $this->data['id'] = '';
		// $this->data['id_file'] = 'tes';

        if (!$content_exist){
			show_404();
        }
        else
		{

	        $data_content = (array) $this->contents_common_model->get_contents($content, '*');
        	$this->data['header'] = $data_content['title'];
        	$content_id = $data_content['id'];

			$this->data['page_title'] = 'Upload';
	        $this->data['title'] = $this->data['page_title'] . ' ' . $this->data['header'] .' - ' . $this->data['title'];

        	$this->data['show_email_form'] = TRUE;
			$id_file = FALSE;

	        if ($id != '') {
	        	$id = (int) $id;
	        	$this->data['show_email_form'] = FALSE;
	        }
	        else
	        {
		        $this->form_validation->set_rules(
			        'leader_email', 'lang:leader_email',
			        array(
			        	'required',
						array(
							'is_exist',
							function($value)
							{
								if ($this->public_model->check_any($this->table, array('leader_email' => $value)))
								{
									return TRUE;
								}
								return FALSE;
							}
						)
			        ),
			        array(
			        	'is_exist' => '{field} ' . set_value('leader_email') . ' belum terdaftar.'
			        )
				);

		        if ($this->form_validation->run() == TRUE)
		        {
		        	$email = $this->input->post('leader_email');
		        	$data = $this->public_model->get_participant($this->table, $email, 'leader_email');
		        	foreach ($data as $key) {
		        		$id = $key->id;
		        	}
		        }
	        }

			if ($this->form_validation->run() == TRUE && !empty($_FILES))
			{
				if ($content_id != NULL && $id != NULL)
				{
		            if ($this->multiple_upload($content.'/data/', 'ktm', $content_id, $id) != FALSE)
		            {
		            	
		            }
				}
			}
			else
			{
				$this->data['message'] = validation_errors('<p>', '</p>');
			}

        	$this->template->public_form_render('public/mcc_upload', $this->data);
		}
	}

	function resize_image($path)
	{
		$this->load->library('image_lib');

		$config['image_library'] = 'gd2';
		$config['source_image'] = $path;
		$config['maintain_ratio'] = TRUE;
		$config['width']         = 600;
		$config['height']       = 600;

		$this->image_lib->clear();
	    $this->image_lib->initialize($config);
		$this->image_lib->resize();
	}

	function re_array($unset = array('photo', 'ktm'))
	{
		foreach ($_FILES as $name => $array)
		{
			foreach($array as $key => $val)
			{
				$i = 1;
				foreach($val as $v)
				{
					$field_name = $name . '_' . $i;
					$_FILES[$field_name][$key] = $v;
					$i++;
				}
			}
		}
		if(is_array($unset))
		{
			foreach ($unset as $key => $value) {
				unset($_FILES[$value]);
			}
		}
		else
		{
			unset($_FILES[$unset]);
		}
	}
	function multiple_upload($folder, $name = array(), $content_id = NULL, $participant_id = NULL)
	{
		$error = TRUE;
		$config['upload_path']      = './'.$this->data['upload_dir'].'/'.$folder;
        $config['allowed_types']    = 'pdf|gif|jpg|png|jpeg';
        $config['max_size']         = 2048;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        $this->re_array($name);
		foreach($_FILES as $field_name => $file)
		{
			if ($this->upload->do_upload($field_name))
			{
				$image_data =   $this->upload->data();
				$this->resize_image($image_data['full_path']);
				$data_file = array(
					'file_name' 		=> $image_data['file_name'],
					'file_type'			=> $image_data['file_type'],
					'file_size'			=> $image_data['file_size'],
					'file_ext'			=> $image_data['file_ext']
				);

				$id_file = $this->public_model->upload($data_file, $content_id, $participant_id);
				$error = FALSE;
			}
			else
			{
				$this->data['error'] = '<p>' . $file['name'] . ' : ' . $this->upload->display_errors('', '') . '</p>';
				$error = TRUE;
				break;
			}
		}
		if (!$error) {
			return $id_file;
		}
		return FALSE;
	}
}

