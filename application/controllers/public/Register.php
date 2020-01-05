<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->data['error'] = '';
        $this->data['alert_modal'] = '';
    }

	public function mcc()
	{

		$content 		= 'mcc';
		$tables 		= $this->config->item('tables');
		$table 			= $tables['content_prefix'] . $content;
		$table_member 	= $table . $tables['members_suffix'];

		/* Validate form input */
		$this->form_validation->set_rules('tim_name', 'lang:tim_name', 'required');
		$this->form_validation->set_rules('university', 'lang:university', 'required');
		$this->form_validation->set_rules('leader_name', 'lang:leader_name', 'required');
		$this->form_validation->set_rules('leader_major', 'lang:leader_major', 'required');
		$this->form_validation->set_rules('leader_email', 'lang:leader_email', 'required|valid_email|is_unique['.$table.'.email]');
		$this->form_validation->set_rules('leader_phone', 'lang:leader_phone', 'required');
		$this->form_validation->set_rules('member_name', 'lang:member_name', 'required');
		$this->form_validation->set_rules('member_major', 'lang:member_major', 'required');
		$this->form_validation->set_rules('member_email', 'lang:member_email', 'required|valid_email');
		$this->form_validation->set_rules('member_phone', 'lang:member_phone', 'required');
		$this->form_validation->set_message('is_unique', 'Email ' . set_value('leader_email') . ' sudah terdaftar.');

		$id = FALSE;
		if ($this->form_validation->run() == TRUE) {

			$tim_data = array(
					'tim_name'		=> $this->input->post('tim_name'),
					'university'	=> $this->input->post('university'),
					'email'			=> $this->input->post('leader_email')
				);
			$id = $this->public_model->register($table, $tim_data);
			if ($id != FALSE) {
				$members_data = array(
					array(
						'tim_id'=> $id,
						'name'	=> $this->input->post('leader_name'),
						'major'	=> $this->input->post('leader_major'),
						'email'	=> $this->input->post('leader_email'),
						'phone'	=> $this->input->post('leader_phone')
					),
					array(
						'tim_id'=> $id,
						'name'	=> $this->input->post('member_name'),
						'major'	=> $this->input->post('member_major'),
						'email'	=> $this->input->post('member_email'),
						'phone'	=> $this->input->post('member_phone')
					)
				);
				if ($this->public_model->input_participant($table_member, $members_data))
				{
					$atts = array(
						'icon'		=> 'success',
						'title' 	=> 'Berhasil!',
						'text'		=> 'Anda berhasil mendaftar. Silahkan lanjutkan ke langkah berikutnya.',
						'showConfirmButton' => 'false',
						'footer'	=> anchor('upload/mcc/'.$id, 'Upload KTM')
					);
					$this->data['alert_modal'] = sweet_alert($atts);
				}
			}
		}
		else
		{
			$this->data['alert_modal'] = validation_errors(sweet_alert_open(), sweet_alert_close());
		}
        $this->template->public_form_render('public/mcc', $this->data);
	}

	public function futsal()
	{
		$content = 'futsal';
		$tables = $this->config->item('tables');
		$table  = $tables['content_prefix'] . $content;

		/* Validate form input */
		$this->form_validation->set_rules('tim_name', 'lang:tim_name', 'required');
		$this->form_validation->set_rules('player_name', 'lang:player_name', 'required');
		$this->form_validation->set_rules('grade', 'lang:grade', 'required');
		$this->form_validation->set_rules('university', 'lang:university', 'required');
		$this->form_validation->set_rules('phone', 'lang:phone', 'required');
		$this->form_validation->set_rules('email', 'lang:email', 'required|valid_email|is_unique['.$table.'.email]');
		$this->form_validation->set_rules('official', 'lang:official', 'required');
		$this->form_validation->set_rules('coach', 'lang:coach', 'required');
		$this->form_validation->set_message('is_unique', 'Email ' . set_value('email') . ' sudah terdaftar.');

		$id = FALSE;
		if ($this->form_validation->run() == TRUE) {

			$data = array(
					'tim_name'		=> $this->input->post('tim_name'),
					'player_name'	=> $this->input->post('player_name'),
					'grade'			=> $this->input->post('grade'),
					'university'	=> $this->input->post('university'),
					'phone'			=> $this->input->post('phone'),
					'email'			=> $this->input->post('email'),
					'official'		=> $this->input->post('official'),
					'coach'			=> $this->input->post('coach')
				);
			$id = $this->public_model->register($table, $data);
			if ($id != FALSE) {
				$atts = array(
					'icon'		=> 'success',
					'title' 	=> 'Berhasil!',
					'text'		=> 'Anda berhasil mendaftar. Silahkan lanjutkan ke langkah berikutnya.',
					'showConfirmButton' => 'false',
					'footer'	=> anchor('upload/futsal/'.$id, 'Upload Berkas')
				);
				$this->data['alert_modal'] = sweet_alert($atts);
			}
		}
		else
		{
			$this->data['alert_modal'] = validation_errors(sweet_alert_open(), sweet_alert_close());
		}

        $this->template->public_form_render('public/futsal', $this->data);
	}

	public function mathcomp()
	{
		$content = 'mathcomp';
		$tables = $this->config->item('tables');
		$table  = $tables['content_prefix'] . $content;

		/* Validate form input */
		$this->form_validation->set_rules('name', 'lang:name', 'required');
		$this->form_validation->set_rules('school', 'lang:school', 'required');
		$this->form_validation->set_rules('birth_place', 'lang:birth_place', 'required');
		$this->form_validation->set_rules('birth_date', 'lang:birth_date', 'required');
		$this->form_validation->set_rules('phone', 'lang:phone', 'required');
		$this->form_validation->set_rules('email', 'lang:email', 'required|valid_email|is_unique['.$table.'.email]');
		$this->form_validation->set_rules('address', 'lang:address', 'required');
		$this->form_validation->set_rules('tutor_name', 'lang:tutor_name', 'required');
		$this->form_validation->set_rules('tutor_phone', 'lang:tutor_phone', 'required');
		$this->form_validation->set_message('is_unique', 'Email ' . set_value('email') . ' sudah terdaftar.');

		$id = FALSE;
		if ($this->form_validation->run() == TRUE) {

			$data = array(
					'name'			=> $this->input->post('name'),
					'school'		=> $this->input->post('school'),
					'birth_place'	=> $this->input->post('birth_place'),
					'birth_date'	=> strtotime($this->input->post('birth_date')),
					'address'		=> $this->input->post('address'),
					'phone'			=> $this->input->post('phone'),
					'email'			=> $this->input->post('email'),
					'tutor_name'	=> $this->input->post('tutor_name'),
					'tutor_phone'	=> $this->input->post('tutor_phone')
				);
			$id = $this->public_model->register($table, $data);
			if ($id != FALSE) {
				$atts = array(
					'icon'		=> 'success',
					'title' 	=> 'Berhasil!',
					'text'		=> 'Data anda telah kami simpan. silahkan lakukan pembayaran kemudian upload melalui link dibawah',
					'showConfirmButton' => 'false',
					'footer'	=> anchor('payment/mathcomp/'.$id, 'Pembayaran')
				);
				$this->data['alert_modal'] = sweet_alert($atts);
			}
		}
		else
		{
			$this->data['alert_modal'] = validation_errors(sweet_alert_open(), sweet_alert_close());
		}

        $this->template->public_form_render('public/mathcomp', $this->data);
	}

	public function upload($content = NULL, $id = NULL)
	{
		$tables 			= $this->config->item('tables');
		$table  			= $tables['content_prefix'] . $content;
		$table_member  		= $table . $tables['members_suffix'];
		$table_member_media	= $table_member . $tables['media_suffix'];

		$content_exist = $this->public_model->check_any($tables['contents'], array('slug' => $content));

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
			$file_type = array('photo', 'ktm');


	        if ($id != '') {
	        	$this->data['show_email_form'] = FALSE;
	        	$id = (int) $id;
	        }
	        else
	        {
		        $this->form_validation->set_rules('email', 'lang:email', 'required|callback_email_exists['.$table.']');

		        if ($this->form_validation->run() == TRUE)
		        {
		        	$email = $this->input->post('email');
		        	$data = $this->public_model->get_participant($table, $email, 'email');
		        	foreach ($data as $key) {
		        		$id = $key->id;
		        	}
		        }
	        }

			if ($this->form_validation->run() == TRUE && isset($id))
			{
				if ($content_id != NULL && $id != NULL)
				{
		            if ($this->public_model->check_any($table_member, array('tim_id' => $id)))
		            {
		            	$members_data = $this->public_model->get_participant($table_member, $id, 'tim_id');
		            	foreach ($members_data as $column) {
		            		$member_id[] = $column->id;
		            	}

		            	if ($this->public_model->check_any($table_member_media, array('member_id' => $member_id[0])))
		            	{
		            		$atts = array(
								'icon'		=> 'error',
								'title' 	=> 'Terjadi kesalahan!',
								'text'		=> 'Anda sudah upload data tim!'
							);
							$this->data['alert_modal'] = sweet_alert($atts);
		            	}
		            	else
		            	{
		            		if (!empty($_FILES))
		            		{
								$file_id = $this->multiple_upload($content.'/data/', $file_type);
		            		}
		            	}
		            }
		            else
		            {
						$file_id = $this->multiple_upload($content.'/data/', $file_type);
		            	if ($file_id != FALSE)
			            {
				            $player_name = array_filter($this->input->post('name'));
				            for ($i=0; $i < count($player_name); $i++)
				            {
				            	$player_data = array(
				            		'tim_id' 		=> $id,
				            		'name'			=> $player_name[$i],
				            		'description'	=> ''
				            		);

				            	foreach ($file_type as $key => $value)
				            	{
				            		$player_file_id[$value] = $file_id[$value][$i]; 
				            	}
				            	$player_id[] = $this->public_model->input_members('futsal', $player_data, $player_file_id);
				            }

				            if ($player_id != FALSE)
				            {
								redirect('upload/futsal?status=success&id='.$id);
				            }
			            }
			            else
			            {
							$atts = array(
								'icon'		=> 'error',
								'title' 	=> 'Terjadi kesalahan!',
								'html'		=> $this->data['error']
							);
							$this->data['alert_modal'] = validation_errors(sweet_alert_open(), sweet_alert_close());
			            }
			        }
				}
			}
			$status = $this->input->get('status');
			$id = $this->input->get('id');

			if ($status == 'success'&& isset($id)) {
				$atts = array(
					'icon'		=> 'success',
					'title' 	=> 'Berhasil!',
					'text'		=> 'Data tim anda telah kami simpan. silahkan lakukan pembayaran kemudian upload melalui link dibawah',
					'showConfirmButton' => 'false',
					'footer'	=> anchor('payment/futsal/'.$id, 'Pembayaran')
				);
				$this->data['alert_modal'] = sweet_alert($atts);
			}
			else
			{
				$this->data['alert_modal'] = validation_errors(sweet_alert_open(), sweet_alert_close());
			}
        	$this->template->public_form_render('public/futsal_upload', $this->data);
		}
	}

	// public function upload_mcc($content = NULL, $id = NULL)
	// {
	// 	$content_exist = $this->public_model->check_any('contents', array('slug' => $content));
	// 	$this->table 	= 'content_mcc_sementara';

 //        if (!$content_exist){
	// 		show_404();
 //        }
 //        else
	// 	{

	//         $data_content = (array) $this->contents_common_model->get_contents($content, '*');
 //        	$this->data['header'] = $data_content['title'];
 //        	$content_id = $data_content['id'];

	// 		$this->data['page_title'] = 'Upload';
	//         $this->data['title'] = $this->data['page_title'] . ' ' . $this->data['header'] .' - ' . $this->data['title'];

 //        	$this->data['show_email_form'] = TRUE;
	// 		$id_file = FALSE;

	//         if ($id != '') {
	//         	$this->data['show_email_form'] = FALSE;
	//         	$id = (int) $id;
	//         }
	//         else
	//         {
	// 	        $this->form_validation->set_rules(
	// 		        'leader_email', 'lang:leader_email',
	// 		        array(
	// 		        	'required',
	// 					array(
	// 						'is_exist',
	// 						function($value)
	// 						{
	// 							if ($this->public_model->check_any($this->table, array('leader_email' => $value)))
	// 							{
	// 								return TRUE;
	// 							}
	// 							return FALSE;
	// 						}
	// 					)
	// 		        ),
	// 		        array(
	// 		        	'is_exist' => '{field} ' . set_value('leader_email') . ' belum terdaftar.'
	// 		        )
	// 			);

	// 	        if ($this->form_validation->run() == TRUE)
	// 	        {
	// 	        	$email = $this->input->post('leader_email');
	// 	        	$data = $this->public_model->get_participant($this->table, $email, 'leader_email');
	// 	        	foreach ($data as $key) {
	// 	        		$id = $key->id;
	// 	        	}
	// 	        }
	//         }

	// 		if (isset($id) && !empty($_FILES))
	// 		{
	// 			if ($content_id != NULL && $id != NULL)
	// 			{
	// 	            if ($this->multiple_upload('mcc/data/', 'ktm', $content_id, $id) != FALSE)
	// 	            {
	// 					redirect('upload/mcc?status=success&id='.$id);
	// 	            }
	// 	            else
	// 	            {
	// 					$atts = array(
	// 						'icon'		=> 'error',
	// 						'title' 	=> 'Terjadi kesalahan!',
	// 						'html'		=> $this->data['error']
	// 					);
	// 					$this->data['alert_modal'] = (validation_errors(sweet_alert_open(), sweet_alert_close()) ? validation_errors(sweet_alert_open(), sweet_alert_close()) : sweet_alert($atts));
	// 	            }
	// 			}
	// 		}
	// 		$status = $this->input->get('status');
	// 		$id = $this->input->get('id');

	// 		if ($status == 'success'&& isset($id)) {
	// 			$atts = array(
	// 				'icon'		=> 'success',
	// 				'title' 	=> 'Berhasil!',
	// 				'text'		=> 'Data tim anda telah kami simpan. silahkan lakukan pembayaran kemudian upload melalui link dibawah',
	// 				'showConfirmButton' => 'false',
	// 				'footer'	=> anchor('payment/mcc/'.$id, 'Pembayaran')
	// 			);
	// 			$this->data['alert_modal'] = sweet_alert($atts);
	// 		}
	// 		else
	// 		{
	// 			$this->data['alert_modal'] = validation_errors(sweet_alert_open(), sweet_alert_close());
	// 		}
 //        	$this->template->public_form_render('public/mcc_upload', $this->data);
	// 	}
	// }

	public function upload_mcc($id = NULL)
	{
		$content = 'mcc';
		$tables = $this->config->item('tables');
		$table  = $tables['content_prefix'] . $content;
		$table_member = $table . $tables['members_suffix'];
		$table_member_media	= $table_member . $tables['media_suffix'];

        $data_content = (array) $this->contents_common_model->get_contents($content, '*');
    	$this->data['header'] = $data_content['title'];
    	$content_id = $data_content['id'];

		$this->data['page_title'] = 'Upload';
        $this->data['title'] = $this->data['page_title'] . ' ' . $this->data['header'] .' - ' . $this->data['title'];

    	$this->data['show_email_form'] = TRUE;

        if ($id != '')
        {
			$id = (int) $id;
			if(!$this->public_model->check_any($table, array('id' => $id))){show_404();}
			$this->data['show_email_form'] = FALSE;
        }
        else
        {
	        $this->form_validation->set_rules('email', 'lang:email', 'required|callback_email_exists['.$table.']');

	        if ($this->form_validation->run() == TRUE)
	        {
	        	$email = $this->input->post('email');
	        	$data = $this->public_model->get_participant($table, $email, 'email');
	        	foreach ($data as $key) {
	        		$id = $key->id;
	        	}
	        }
	        else
	        {
				$this->data['alert_modal'] = validation_errors(sweet_alert_open(), sweet_alert_close());
	        }
        }

		if (isset($id) && !empty($_FILES))
		{
			if ($content_id != NULL && $id != NULL)
			{
	            if ($this->public_model->check_any($table_member, array('tim_id' => $id)))
	            {
	            	$members_data = $this->public_model->get_participant($table_member, $id, 'tim_id');
	            	foreach ($members_data as $column) {
	            		$member_id[] = $column->id;
	            	}

	            	if ($this->public_model->check_any($table_member_media, array('member_id' => $member_id[0])))
	            	{
	            		$atts = array(
							'icon'		=> 'error',
							'title' 	=> 'Terjadi kesalahan!',
							'html'		=> 'Anda sudah upload data tim!<br>Silahkan upload bukti pembayaran melalui link dibawah',
							'showConfirmButton' => 'false',
							'footer'	=> anchor('payment/mcc/'.$id, 'Pembayaran')
						);
						$this->data['alert_modal'] = sweet_alert($atts);
	            	}
	            	else
	            	{
						$file_type = 'ktm';
						$file_id = $this->multiple_upload($content.'/data/', $file_type);
			            if ($file_id != FALSE)
			            {
			            	$members_media = [];
				            for ($i=0; $i < count($member_id); $i++)
				            {
				            	$members_media_data = array(
				            		'member_id' 	=> $member_id[$i],
				            		'media_id'		=> $file_id[$i]
				            		);
					            array_push($members_media, $members_media_data);
				            }

							$this->data['all_file'] = $members_media[0];
				            if ($this->public_model->input_participant($table_member_media, $members_media))
				            {
								$atts = array(
									'icon'		=> 'success',
									'title' 	=> 'Berhasil!',
									'text'		=> 'Data tim anda telah kami simpan. silahkan lakukan pembayaran kemudian upload melalui link dibawah',
									'showConfirmButton' => 'false',
									'footer'	=> anchor('payment/mcc/'.$id, 'Pembayaran')
								);
								$this->data['alert_modal'] = sweet_alert($atts);
				            }
			            }
			            else
			            {
							$atts = array(
								'icon'		=> 'error',
								'title' 	=> 'Terjadi kesalahan!',
								'html'		=> $this->data['error']
							);
							$this->data['alert_modal'] = validation_errors(sweet_alert_open(), sweet_alert_close());
			            }
	            	}
	            }
			}
		}

    	$this->template->public_form_render('public/mcc_upload', $this->data);
	}

	public function upload_futsal($id = NULL)
	{
		$content = 'futsal';
		$tables = $this->config->item('tables');
		$table  = $tables['content_prefix'] . $content;
		$table_member  = $table . $tables['members_suffix'];
		$content_exist = $this->public_model->check_any($tables['contents'], array('slug' => $content));

		$data_content = (array) $this->contents_common_model->get_contents($content, '*');
		$this->data['header'] = $data_content['title'];
		$content_id = $data_content['id'];

		$this->data['page_title'] = 'Upload';
		$this->data['title'] = $this->data['page_title'] . ' ' . $this->data['header'] .' - ' . $this->data['title'];

		$this->data['show_email_form'] = TRUE;

		if ($id != '')
		{
			$id = (int) $id;
			if(!$this->public_model->check_any($table, array('id' => $id))){show_404();}
			$this->data['show_email_form'] = FALSE;
		}
		else
		{
		    $this->form_validation->set_rules('email', 'lang:email', 'required|callback_email_exists['.$table.']');

		    if ($this->form_validation->run() == TRUE)
		    {
		    	$email = $this->input->post('email');
		    	$data = $this->public_model->get_participant($table, $email, 'email');
		    	foreach ($data as $key) {
		    		$id = $key->id;
		    	}
		    }
		    else
		    {
				$this->data['alert_modal'] = validation_errors(sweet_alert_open(), sweet_alert_close());
		    }
		}

		if (isset($id) && !empty($_FILES))
		{
			if ($content_id != NULL && $id != NULL)
			{				
		    	if ($this->public_model->check_any($table_member, array('tim_id' => $id)))
		    	{
		    		$atts = array(
						'icon'		=> 'error',
						'title' 	=> 'Terjadi kesalahan!',
						'text'		=> 'Anda sudah upload data tim!'
					);
					$this->data['alert_modal'] = sweet_alert($atts);
		    	}
		    	else
		    	{
					$file_type = array('photo', 'ktm');
					$file_id = $this->multiple_upload('futsal/data/', $file_type);
		            
		            if ($file_id != FALSE)
		            {
			            $player_name = array_filter($this->input->post('name'));

			            for ($i=0; $i < count($player_name); $i++)
			            {
			            	$player_data = array(
			            		'tim_id' 		=> $id,
			            		'name'			=> $player_name[$i],
			            		'description'	=> ''
			            		);

			            	foreach ($file_type as $key => $value)
			            	{
			            		$player_file_id[$value] = $file_id[$value][$i]; 
			            	}
							$player_id[] = $this->public_model->input_members('futsal', $player_data, $player_file_id);
			            }

			            if ($player_id != FALSE)
			            {
							$atts = array(
								'icon'		=> 'success',
								'title' 	=> 'Berhasil!',
								'text'		=> 'Data tim anda telah kami simpan. silahkan lakukan pembayaran kemudian upload melalui link dibawah',
								'showConfirmButton' => 'false',
								'footer'	=> anchor('payment/futsal/'.$id, 'Pembayaran')
							);
							$this->data['alert_modal'] = sweet_alert($atts);
						}
		            }
		            else
		            {
						$atts = array(
							'icon'		=> 'error',
							'title' 	=> 'Terjadi kesalahan!',
							'html'		=> $this->data['error']
						);
						$this->data['alert_modal'] = sweet_alert($atts);
		            }
		    	}
			}
		}
		else
		{
			$this->data['alert_modal'] = validation_errors(sweet_alert_open(), sweet_alert_close());
		}
		$this->template->public_form_render('public/futsal_upload', $this->data);
	}

	public function payment($content = '', $id = '')
	{
		$tables 				= $this->config->item('tables');
		$table_content 			= $tables['content_prefix'] . $content;
		$table_payments_media	= $tables['payments_media'];
		$content_exist 			= $this->public_model->check_any($tables['contents'], array('slug' => $content));

        if (!$content_exist)
        {
			show_404();
        }
        else
		{
	        $data_content = (array) $this->contents_common_model->get_contents($content, '*');
        	$this->data['header'] = $data_content['title'];
        	$content_id = $data_content['id'];

			$this->data['page_title'] = 'Upload Bukti Pembayaran';
	        $this->data['title'] = $this->data['page_title'] . ' ' . $this->data['header'] .' - ' . $this->data['title'];


			$this->form_validation->set_rules('bank_name', 'lang:bank_name', 'required');
			$this->form_validation->set_rules('account_owner', 'lang:account_owner', 'required');

        	$this->data['show_email_form'] = TRUE;
			$id_file = FALSE;

			$this->config_upload($content.'/');

	        if ($id != '')
	        {
	        	$id = (int) $id;
	        	
	        	if(!$this->public_model->check_any($table_content, array('id' => $id)))
	        	{
					show_404();
	        	}
	        	$this->data['show_email_form'] = FALSE;
	        }
	        else
	        {
		        $this->form_validation->set_rules('email', 'lang:email', 'required|callback_email_exists['.$table_content.']');

		        if ($this->form_validation->run() == TRUE)
		        {
		        	$email = $this->input->post('email');
		        	$data = $this->public_model->get_participant($table_content, $email, 'email');
		        	foreach ($data as $key) {
		        		$id = $key->id;
		        	}
		        }
		        else
		        {
					$this->data['alert_modal'] = validation_errors(sweet_alert_open(), sweet_alert_close());
		        }
	        }

	        if (isset($id) && !empty($_FILES))
	        {
				if ($content_id != NULL && $id != NULL)
				{
		        	if ($this->public_model->check_any($table_payments_media, array('content_id' => $content_id, 'participant_id' => $id)))
		        	{
		        		$atts = array(
							'icon'		=> 'error',
							'title' 	=> 'Upload gagal!',
							'text'		=> 'Anda sudah upload bukti pembayaran!'
						);
						$this->data['alert_modal'] = sweet_alert($atts);
		        	}
		        	else
		        	{
			            if ($this->upload->do_upload('userfile') == TRUE)
			            {
							$image_data =   $this->upload->data();
							$payment_data = array(
								'time'			=> time(),
								'bank_name'		=> $this->input->post('bank_name'),
								'account_owner' => $this->input->post('account_owner'),
								'account_number'=> $this->input->post('account_number')
								);
							$payment_id = $this->public_model->input_payment($payment_data);

							if ($payment_id != FALSE)
							{
								$this->resize_image($image_data['full_path']);
								$file_data = array(
									'name'				=> 'payment',
									'file_name' 		=> $image_data['file_name'],
									'file_type'			=> $image_data['file_type'],
									'file_size'			=> $image_data['file_size'],
									'file_ext'			=> $image_data['file_ext']
								);

								if($this->public_model->upload_payment($file_data, $content_id, $payment_id, $id))
								{
									$atts = array(
										'icon'		=> 'success',
										'title' 	=> 'Berhasil!',
										'text'		=> 'Upload bukti pembayaran berhasil.'
									);
									$this->data['alert_modal'] = sweet_alert($atts);
								}
								else
								{
									$atts = array(
										'icon'		=> 'error',
										'title' 	=> 'Terjadi kesalahan!',
										'text'		=> 'Mohon maaf atas ketidaknyamanan anda. Harap hubungi contact person yang sudah disedikan'
									);
									$this->data['alert_modal'] = sweet_alert($atts);
								}
							}
							else
							{
									$atts = array(
										'icon'		=> 'error',
										'title' 	=> 'Terjadi kesalahan!',
										'text'		=> 'Mohon maaf atas ketidaknyamanan anda. Harap hubungi contact person yang sudah disedikan'
									);
									$this->data['alert_modal'] = sweet_alert($atts);
							}
			            }
			            else
			            {
							$atts = array(
								'icon'		=> 'error',
								'title' 	=> 'Terjadi kesalahan!',
								'html'		=> $this->upload->display_errors()
							);
							$this->data['alert_modal'] = (validation_errors(sweet_alert_open(), sweet_alert_close()) ? validation_errors(sweet_alert_open(), sweet_alert_close()) : sweet_alert($atts));
			            }
					}
				}
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
					$_FILES[$name . '_' . $i][$key] = $v;
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

		foreach ($_FILES as $name => $value)
		{
			if ($value['size'] == 0) {
				unset($_FILES[$name]);
			}
		}
	}

	function config_upload($folder)
	{

		$config['upload_path']      = './'.$this->data['upload_dir'].'/'.$folder;
        $config['allowed_types']    = 'pdf|gif|jpg|png|jpeg';
        $config['max_size']         = 2048;
        $config['file_ext_tolower'] = TRUE;
        $this->load->library('upload', $config);
	}

	function multiple_upload($folder, $name = array(), $content_name = NULL, $data = NULL)
	{
		$error = TRUE;
		$this->config_upload($folder);

        $this->re_array($name);

		foreach($_FILES as $field_name => $file)
		{
			if ($this->upload->do_upload($field_name))
			{
				$image_data =   $this->upload->data();
				$this->resize_image($image_data['full_path']);
				$file_type = explode('_', $field_name)[0];

				$data_file = array(
					'name'				=> $file_type,
					'file_name' 		=> $image_data['file_name'],
					'file_type'			=> $image_data['file_type'],
					'file_size'			=> $image_data['file_size'],
					'file_ext'			=> $image_data['file_ext']
				);

				$id = $this->public_model->upload_media($data_file);
				if (is_array($name))
				{
					$id_file[$file_type][] = $id;
				}
				else
				{
					$id_file[] = $id;
				}
				$error = FALSE;
			}
			else
			{
				$this->data['error'] = '<p>' . $file['name'] . ' : ' . $this->upload->display_errors('', '') . '</p>';
				$error = TRUE;
				break;
			}
		}

		if (!$error)
		{
			return $id_file;
		}
		return FALSE;
	}
	function email_exists($value, $table)
	{
		if ($this->public_model->check_any($table, array('email' => $value)))
		{
			return TRUE;
		}
		$this->form_validation->set_message('email_exists', 'Email '. $value . ' belum terdaftar.');
		return FALSE;
	}
}