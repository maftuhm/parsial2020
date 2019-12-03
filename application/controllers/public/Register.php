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
		$this->data['id_file'] = 'tes';
		$this->data['id'] = 'id';
		/* Validate form input */
		$this->form_validation->set_rules('tim_name', 'lang:tim_name', 'required');
		$this->form_validation->set_rules('university', 'lang:university', 'required');
		$this->form_validation->set_rules('leader_name', 'lang:leader_name', 'required');
		$this->form_validation->set_rules('leader_major', 'lang:leader_major', 'required');
		$this->form_validation->set_rules('leader_email', 'lang:leader_email', 'required|valid_email'/*|is_unique['.$table.'.leader_email]*/);
		$this->form_validation->set_rules('leader_phone', 'lang:leader_phone', 'required');
		$this->form_validation->set_rules('member_name', 'lang:member_name', 'required');
		$this->form_validation->set_rules('member_major', 'lang:member_major', 'required');
		$this->form_validation->set_rules('member_email', 'lang:member_email', 'required|valid_email'/*|is_unique['.$table.'.member_email]*/);
		$this->form_validation->set_rules('member_phone', 'lang:member_phone', 'required');

        if(!empty($_FILES)){

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

				$this->data['id'] = $this->public_model->register($table, $data);

				$this->data['id_file'] = $this->multiple_upload('./upload/mcc/data/');

				// if ($this->public_model->check_any($this->table['par'], array('id_team'=>$id_team, 'id_content'=> 3))) {
				// 	$this->data['error'] = 'Anda sudah upload data pemain';
				// }
				// else
				// {
					$id_file = $this->multiple_upload('./upload/mcc/data/');
					// if ($id_file != FALSE) {
					// 	$count = count($id_file)/2;
					// 	foreach ($this->input->post('name') as $key => $value) {
					// 		$data = array(
					// 					'name' 	  => $value,
					// 					'id_team' => $id_team,
					// 					'id_content'=> 3,
					// 					'id_photo'=> $id_file[$key],
					// 					'id_card' => $id_file[$key+$count]
					// 				);

					// 		if (!$this->common_model->register_one($data)) {
								
					// 			$this->data['error'] = '<p>Terjadi kesalahan dalam input data pemain</p>';
					// 			break;
					// 		}else{
					// 			$this->data['modal_success'] = modal_success('', $this->data['header'], base_url('futsal/payment')/*$this->content_url['payment_futsal']*/, base_url('futsal/payment'));
					// 		}
					// 	}
					// }
				// }
			}

        }

        $this->template->public_form_render('public/mcc', $this->data);
	}

    public function payment($content = '')
	{
		$content_exist = $this->public_model->check_any('contents', array('slug' => $content));

        if (!$content_exist){
			show_404();
        }
        else
        {

	        $this->data['header'] = $this->contents_common_model->get_contents($content, 'title');
			$this->data['page_title'] = 'Konfirmasi Pembayaran';
	        $this->data['title'] = $this->data['page_title'] . ' ' . $this->data['header'] .' - ' . $this->data['title'];
	        /* Conf */
	        $config['upload_path']      = './upload/'.$content.'/';
	        $config['allowed_types']    = 'pdf|gif|jpg|png|jpeg';
	        $config['max_size']         = 4096;
	        $config['max_width']        = 4096;
	        $config['max_height']       = 4096;
	        $config['file_ext_tolower'] = TRUE;

	        $this->load->library('upload', $config);
			
			$upload = FALSE;

			if ($this->form_validation->run() == TRUE)
			{
				$email_value = $this->form_validation->set_value('email');
	            $upload = $this->upload->do_upload('bukti_pembayaran');
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
	function multiple_upload($path)
	{
		$error = TRUE;
		$config['upload_path']      = $path;
        $config['allowed_types']    = 'pdf|gif|jpg|png|jpeg';
        $config['max_size']         = 2048;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);

        $this->re_array('ktm');
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
				$id_file[] = $this->public_model->upload($data_file);
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

	function rolekey_exists($key)
	{
		$this->roles_model->role_exists($key);
	}
}

// Array(
// 	[ktm] => Array(
// 				[name] => Array(
// 						[0] => FormatFactoryexponent_capture_2067377937.jpg
// 						[1] => foto.jpeg
// 					)
// 				[type] => Array(
// 						[0] => image/jpeg
// 						[1] => image/jpeg)
// 				[tmp_name] => Array(
// 					[0] => C:\xampp\tmp\php1346.tmp
// 					[1] => C:\xampp\tmp\php1356.tmp)
// 				[error] => Array(
// 					[0] => 0
// 					[1] => 0)
// 				[size] => Array(
// 					[0] => 230539
// 					[1] => 88011
// 				)
// 			)
// )

// Array(
// 	[ktm_1] => Array(
// 		[name] => FormatFactoryexponent_capture_2067377937.jpg
// 		[type] => image/jpeg
// 		[tmp_name] => C:\xampp\tmp\phpB8E8.tmp
// 		[error] => 0
// 		[size] => 230539)
// 	[ktm_2] => Array(
// 		[name] => foto.jpeg
// 		[type] => image/jpeg
// 		[tmp_name] => C:\xampp\tmp\phpB8E9.tmp[error] => 0
// 		[size] => 88011
// 	)
// )