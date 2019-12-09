<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contents extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->lang->load(array('admin/contents', 'admin/users'));

        /* Title Page :: Common */
        $this->page_title->push(lang('menu_contents'));
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_contents'), 'admin/contents');

        $this->load->model('admin/contents_model');
    }


	public function index()
	{
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            /* Get all contents */
            $this->data['contents'] = $this->contents_model->get_data('contents');

            /* Load Template */
            $this->template->admin_render('admin/contents/index', $this->data);
        }
	}

	public function page($content_name)
	{
        if ( ! $this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
        	$this->data['content_data'] = $this->contents_model->get_data('contents', $content_name, 'slug');
        	$this->data['content_name'] = $content_name;

			if($this->data['content_data'] == FALSE)
			{
				show_404();
			}
			else
			{
	            /* Breadcrumbs */
	            $this->data['breadcrumb'] = $this->breadcrumbs->show();
	            /* Get all contents */

	            $content = $this->unset_key((array)$this->contents_model->get_data('content_'.$content_name.'_sementara', NULL, NULL, FALSE));
	            $this->data['contents_keys'] = array_keys($content);
	            $this->data['contents'] = $this->contents_model->get_data('content_'.$content_name.'_sementara');
	            /* Load Template */
	            $this->template->admin_render('admin/contents/page', $this->data);
			}
        }
	}

	public function create()
	{
		if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_contents_create'), 'admin/contents/create');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

		/* Validate form input */
		$this->form_validation->set_rules('content_name', 'lang:contents_name', 'required');
		$this->form_validation->set_rules('content_title', 'lang:contents_title', 'required');
		$this->form_validation->set_rules('content_slug', 'lang:contents_slug', 'required|is_unique[contents.slug]');
		$this->form_validation->set_rules('content_n_quest', 'lang:contents_n_quest', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			$name    	= strtolower($this->input->post('content_name'));
			$title   	= $this->input->post('content_title');
			$description= $this->input->post('content_description');
			$slug    	= strtolower($this->input->post('content_slug'));
			$num_of_quest = (int) $this->input->post('content_n_quest');
		}

		if ($this->form_validation->run() == TRUE && $this->contents_model->register_content($name, $title, $description, $slug, $num_of_quest))
		{
			redirect('admin/contents/create/q/'.$slug, 'refresh');
		}
		else
		{
            $this->data['message'] = validation_errors();

			$this->data['content_name'] = array(
				'name'  => 'content_name',
				'id'    => 'content_name',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('content_name'),
			);
			$this->data['content_title'] = array(
				'name'  => 'content_title',
				'id'    => 'content_title',
				'type'  => 'text',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('content_title'),
			);
			$this->data['content_description'] = array(
				'name'  => 'content_description',
				'id'    => 'content_description',
				'type'  => 'text',
				'class' => 'form-control',
			);
			$this->data['content_slug'] = array(
				'name'  => 'content_slug',
				'id'    => 'content_slug',
				'type'  => 'text',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('content_slug'),
			);
			for ($i=0; $i < 16; $i++) { 
				$options[$i] = $i;
			}
			$this->data['content_n_quest'] = array(
				'name'  => 'content_n_quest',
				'id'    => 'content_n_quest',
				'class' => 'form-control',
				'options'=> $options,
				'selected'=> $this->form_validation->set_value('content_n_quest')
			);
            /* Load Template */
            $this->template->admin_render('admin/contents/create', $this->data);
        }
	}

	public function create_question($slug)
	{
		if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_contents_create_quest'), 'admin/contents/create');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['contents'] = $this->contents_model->get_data('contents', $slug, 'slug');
        if ($this->data['contents'] == FALSE) {
        	show_404();
        }
        else
        {
	        foreach ($this->data['contents'] as $content) {
	        	$this->data['num_of_quest'] = $content->num_of_question;
	        	$this->data['content_id']	= $content->id;
	        }

	        for ($i=0; $i < $this->data['num_of_quest']; $i++) { 
				$this->form_validation->set_rules('question_'.$i, 'lang:contents_quest', 'required');
				$this->form_validation->set_rules('question_type_'.$i, 'lang:contents_quest_type', 'required');
	        }

			if ($this->form_validation->run() == TRUE)
			{
				$question_data = [];
				for ($i=0; $i < $this->data['num_of_quest']; $i++) {
					$quest = array(
								'content_id' => $this->data['content_id'],
								'question'   => $this->input->post('question_'.$i),
								'type'		 => $this->input->post('question_type_'.$i),
								'placeholder'=> $this->input->post('question_placeholder_'.$i)
								);
					array_push($question_data, $quest);
				}
			}
			if ($this->form_validation->run() == TRUE && $this->contents_model->create_question($question_data))
			{
				redirect('admin/contents', 'refresh');
			}
			else
			{
				$option_type = array(
									'text' => 'Text',
									'phone'=> 'Phone',
									'email'=> 'Email'
								);
	            $this->data['message'] = validation_errors();
	            $this->data['questions'] = array();
	            for ($i=0; $i < $this->data['num_of_quest']; $i++) {
					$question = array(
						'name'  => 'question_'.$i,
						'placeholder'=> lang('contents_quest'),
						'type'  => 'text',
		                'class' => 'form-control',
						'value' => $this->form_validation->set_value('question_'.$i)
					);
					$question_type = array(
						'name'  => 'question_type_'.$i,
		                'class' => 'form-control',
		                'options'=> $option_type,
						'selected' => $this->form_validation->set_value('question_type_'.$i)
					);
					$question_placeholder = array(
						'name'  => 'question_placeholder_'.$i,
						'placeholder'=> lang('contents_quest'),
						'type'  => 'text',
		                'class' => 'form-control',
						'value' => $this->form_validation->set_value('question_placeholder_'.$i)
					);
					$required = array(
						'name'  => 'required_'.$i,
						'type'  => 'checkbox',
			            'checked'	=> set_checkbox('required_quest')
					);
					$question_group = array($question, $question_type, $question_placeholder, $required);
					array_push($this->data['questions'], $question_group);
	            }

	            /* Load Template */
	            $this->template->admin_render('admin/contents/create_question', $this->data);
	        }
	    }
    }

	public function delete($id = NULL)
	{
        /* Load Template */
		if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
		{
            return show_error('You must be an administrator to view this page.');
		}

        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_contents_delete'), 'admin/contents/delete');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

		/* Validate form input */
		$this->form_validation->set_rules('confirm', 'lang:delete_validation_confirm_label', 'required');
		$this->form_validation->set_rules('id', 'lang:delete_validation_user_id_label', 'required|alpha_numeric');

		$id = (int) $id;
		if ($this->form_validation->run() === FALSE)
		{
            $contents	  = $this->contents_model->get_data('contents', $id);
            foreach ($contents as $content) {
            	$this->data['contents_id']    = (int) $content->id;
            	$this->data['contents_title'] = $content->title;
            }
            $this->data['csrf']       = $this->_get_csrf_nonce();
            /* Load Template */
            $this->template->admin_render('admin/contents/delete', $this->data);
		}
		else
		{
            if ($this->input->post('confirm') == 'yes')
			{
                if ($this->_valid_csrf_nonce() === FALSE OR $id != $this->input->post('id'))
				{
                    show_error($this->lang->line('error_csrf'));
				}
				else
				{
		            $this->contents_model->delete_content($id);
				}
			}
			redirect('admin/contents', 'refresh');
		}
	}


	public function edit($id)
	{
        $id = (int) $id;

		if ( ! $this->ion_auth->logged_in() OR ( ! $this->ion_auth->is_admin() && ! ($this->ion_auth->user()->row()->id == $id)))
		{
			redirect('auth', 'refresh');
		}

        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_contents_edit'), 'admin/contents/edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
		$user          = $this->ion_auth->user($id)->row();
		$groups        = $this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_contents_groups($id)->result();

		/* Validate form input */
		$this->form_validation->set_rules('first_name', 'lang:edit_user_validation_fname_label', 'required');
		$this->form_validation->set_rules('last_name', 'lang:edit_user_validation_lname_label', 'required');
		$this->form_validation->set_rules('phone', 'lang:edit_user_validation_phone_label', 'required');
		$this->form_validation->set_rules('title', 'lang:edit_user_validation_title_label', 'required');

		if (isset($_POST) && ! empty($_POST))
		{
            if ($this->_valid_csrf_nonce() === FALSE OR $id != $this->input->post('id'))
			{
				show_error($this->lang->line('error_csrf'));
			}

            if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

			if ($this->form_validation->run() == TRUE)
			{
				$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'title'    => $this->input->post('title'),
					'phone'      => $this->input->post('phone')
				);

                if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}

                if ($this->ion_auth->is_admin())
				{
                    $groupData = $this->input->post('groups');

					if (isset($groupData) && !empty($groupData))
                    {
						$this->ion_auth->remove_from_group('', $id);

						foreach ($groupData as $grp)
                        {
							$this->ion_auth->add_to_group($grp, $id);
						}
					}
				}

                if($this->ion_auth->update($user->id, $data))
			    {
                    $this->session->set_flashdata('message', $this->ion_auth->messages());

				    if ($this->ion_auth->is_admin())
					{
						redirect('admin/contents', 'refresh');
					}
					else
					{
						redirect('admin', 'refresh');
					}
			    }
			    else
			    {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());

				    if ($this->ion_auth->is_admin())
					{
						redirect('auth', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}
			    }
			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['user']          = $user;
		$this->data['groups']        = $groups;
		$this->data['currentGroups'] = $currentGroups;

		$this->data['first_name'] = array(
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
            'class' => 'form-control',
			'value' => $this->form_validation->set_value('first_name', $user->first_name)
		);
		$this->data['last_name'] = array(
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
            'class' => 'form-control',
			'value' => $this->form_validation->set_value('last_name', $user->last_name)
		);
		$this->data['title'] = array(
			'name'  => 'title',
			'id'    => 'title',
			'type'  => 'text',
            'class' => 'form-control',
			'value' => $this->form_validation->set_value('title', $user->title)
		);
		$this->data['phone'] = array(
			'name'  => 'phone',
			'id'    => 'phone',
            'type'  => 'tel',
            'pattern' => '^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$',
            'class' => 'form-control',
			'value' => $this->form_validation->set_value('phone', $user->phone)
		);
		$this->data['password'] = array(
			'name' => 'password',
			'id'   => 'password',
            'class' => 'form-control',
			'type' => 'password'
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
            'class' => 'form-control',
			'type' => 'password'
		);


        /* Load Template */
		$this->template->admin_render('admin/contents/edit', $this->data);
	}


	function activate($id, $code = FALSE)
	{
        $id = (int) $id;

		if ($code !== FALSE)
		{
            $activation = $this->ion_auth->activate($id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($id);
		}

		if ($activation)
		{
            $this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('admin/contents', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect('auth/forgot_password', 'refresh');
		}
	}


	public function deactivate($id = NULL)
	{
		if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
		{
            return show_error('You must be an administrator to view this page.');
		}

        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_contents_deactivate'), 'admin/contents/deactivate');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

		/* Validate form input */
		$this->form_validation->set_rules('confirm', 'lang:deactivate_validation_confirm_label', 'required');
		$this->form_validation->set_rules('id', 'lang:deactivate_validation_user_id_label', 'required|alpha_numeric');

		$id = (int) $id;

		if ($this->form_validation->run() === FALSE)
		{
			$user = $this->ion_auth->user($id)->row();

            $this->data['csrf']       = $this->_get_csrf_nonce();
            $this->data['id']         = (int) $user->id;
            $this->data['firstname']  = ! empty($user->first_name) ? htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8') : NULL;
            $this->data['lastname']   = ! empty($user->last_name) ? ' '.htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8') : NULL;

            /* Load Template */
            $this->template->admin_render('admin/contents/deactivate', $this->data);
		}
		else
		{
            if ($this->input->post('confirm') == 'yes')
			{
                if ($this->_valid_csrf_nonce() === FALSE OR $id != $this->input->post('id'))
				{
                    show_error($this->lang->line('error_csrf'));
				}

                if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{
					$this->ion_auth->deactivate($id);
				}
			}

			redirect('admin/contents', 'refresh');
		}
	}


	public function profile($id)
	{
        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_contents_profile'), 'admin/groups/profile');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Data */
        $id = (int) $id;

        $this->data['user_info'] = $this->ion_auth->user($id)->result();
        foreach ($this->data['user_info'] as $k => $user)
        {
            $this->data['user_info'][$k]->groups = $this->ion_auth->get_contents_groups($user->id)->result();
        }

        /* Load Template */
		$this->template->admin_render('admin/contents/profile', $this->data);
	}


	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}


	public function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE && $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	function unset_key($data)
	{
		$unset_data = array('id', 'ip_address');
		foreach ($unset_data as $key => $value) {
			unset($data[$value]);
		}
		return $data;
	}
}

// Array(
// 	[0] => stdClass Object(
// 		[id] => 1
// 		[created_on] => 1575839259
// 		[ip_address] => ::1
// 		[tim_name] => himatika
// 		[university] => uin jakarta
// 		[leader_name] => maftuh mashuri
// 		[leader_major] => matematika
// 		[leader_email] => maftuh@gmail.com
// 		[leader_phone] => 085777455031
// 		[member_name] => lintang
// 		[member_major] => mtk
// 		[member_email] => maftuh@gmail.com
// 		[member_phone] => 90438987
// 	)
// )

// Array(
// 	[id] => 1
// 	[created_on] => 1575839259
// 	[ip_address] => ::1
// 	[tim_name] => himatika
// 	[university] => uin jakarta
// 	[leader_name] => maftuh mashuri
// 	[leader_major] => matematika
// 	[leader_email] => maftuh@gmail.com
// 	[leader_phone] => 085777455031
// 	[member_name] => lintang
// 	[member_major] => mtk
// 	[member_email] => maftuh@gmail.com
// 	[member_phone] => 90438987
// )