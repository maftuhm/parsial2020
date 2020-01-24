<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contents_data extends Admin_controller {

	private $content_title = '';
	private $content_slug  = '';
    public function __construct()
    {
        parent::__construct();
        $this->lang->load(array('admin/contents', 'admin/users'));

        $this->load->model('admin/contents_model');

        /* Table name */
		$this->tables = $this->config->item('tables');
    }

	public function page($content_slug)
	{
        if ( ! $this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
        	$this->data['content_details'] = $this->contents_model->get_data('contents', $content_slug, 'slug', FALSE);
        	$this->data['content_slug'] = $content_slug;

			if($this->data['content_details'] == FALSE)
			{
				show_404();
			}
			else
			{
				$contents_title = ((array)$this->data['content_details'])['title'];
		        /* Title Page :: Common */
		        $this->page_title->push($contents_title);
		        $this->data['pagetitle'] = $this->page_title->show();

	            /* Breadcrumbs */
		        $this->breadcrumbs->unshift(1, $contents_title, 'admin/contents/p/'.$content_slug);
	            $this->data['breadcrumb'] = $this->breadcrumbs->show();

	            /* Get all contents */
	            $table_name = $this->_table_name($content_slug);
	            $content = $this->unset_key((array)$this->contents_model->get_data($table_name, NULL, NULL, FALSE));
	            $this->data['content_keys'] = array_keys($content);
	            $this->data['content_data'] = $this->contents_model->get_data($table_name);

	            /* Load Template */
	            $this->template->admin_render('admin/contents/page', $this->data);
			}
        }
	}

	public function details($content_slug, $id)
	{
        if ( ! $this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
        	$this->data['content_details'] = $this->contents_model->get_data('contents', $content_slug, 'slug', FALSE);
        	$this->data['content_slug'] = $content_slug;
        	$this->data['uploaded'] = FALSE;
        	$this->data['inputed_members'] = FALSE;
        	$this->data['paid'] = FALSE;
        	$this->data['all_keys'] = array();
        	$this->data['upload_dir'] .= '/'.$content_slug.'/';

			if($this->data['content_details'] == FALSE)
			{
				show_404();
			}
			else
			{
				$contents_title = ((array)$this->data['content_details'])['title'];
				$contents_id = ((array)$this->data['content_details'])['id'];
				$this->data['content_team_group'] = ((array)$this->data['content_details'])['team_group'];

		        /* Title Page :: Common */
		        $this->page_title->push($contents_title);
		        $this->data['pagetitle'] = $this->page_title->show();

	            /* Breadcrumbs */
		        $this->breadcrumbs->unshift(1, $contents_title, 'admin/contents/p/'.$content_slug);
		        $this->breadcrumbs->unshift(2, lang('menu_users_profile'), 'admin/contents/p/'.$content_slug.'/details');
	            $this->data['breadcrumb'] = $this->breadcrumbs->show();

	            /* Get all contents */
	            $table_name = $this->_table_name($content_slug);

	            if(!$this->data['is_admin'])
	            {
	            	$unset = array('id', 'ip_address');
	            }
	            else
	            {
	            	$unset = 'id';
	            }

	            $this->data['participant_data'] = $this->unset_key((array)$this->contents_model->get_data($table_name, $id, 'id', FALSE), $unset);
	            $this->data['participant_id'] 	= $id;

	            if ($this->data['content_team_group'] == TRUE) 
	            {
		            $this->data['members_data']		= $this->contents_model->get_members_data($content_slug, $id);
		            
		            if ($this->data['members_data'] != FALSE)
		            {
		            	$this->data['members_keys'] 	= $this->unset_key(array_keys($this->data['members_data'][0]), array(0, 1));

				        foreach ($this->data['members_data'] as $k => $member)
				        {
				            $this->data['members_data'][$k]['media_details'] = $this->contents_model->get_members_media($content_slug, $member['id']);
					        
					        if ($this->data['members_data'][$k]['media_details'] != FALSE)
					        {
						        foreach ($this->data['members_data'][$k]['media_details'] as $media => $value)
						        {
							        $this->data['members_data'][$k][$value['name']] = $value['file_name'];
						        }
						        $this->data['uploaded'] = TRUE;			        	
					        }
				        }

				        if ($this->data['uploaded'])
				        {			        	
					        foreach ($this->data['members_data'][0]['media_details'] as $media => $value)
					        {
					        	$this->data['media_keys'][] = $value['name'];
					        }
					        $this->data['upload_data_dir'] = $this->data['upload_dir'].'/data/';
					        $this->data['all_keys'] = array_merge($this->data['members_keys'], $this->data['media_keys']);
				        }
				        else
				        {
				        	$this->data['all_keys'] = $this->data['members_keys'];
				        }
				        $this->data['inputed_members'] = TRUE;
		            }
	            }

	            $this->data['participant_payment'] = $this->contents_model->get_participant_payment($contents_id, $id);
	            $this->data['tes_payment'] = $this->data['participant_payment'];
            	$this->data['payment_keys'] = array('upload_time', 'bank_name', 'account_owner', 'account_number');
            	// $this->data['query'] = $this->contents_model->delete_payment($content_slug, $id);
	            if ($this->data['participant_payment'] != FALSE)
	            {
	            	$this->data['participant_payment'] = $this->data['participant_payment'][0];

	            	/* === remove key time === */
	            	$this->data['participant_payment']['upload_time'] = $this->data['participant_payment']['time'];
					unset($this->data['participant_payment']['time']);

	            	$this->data['paid'] = TRUE;
	            }
	            else
	            {
		        	$this->data['participant_payment']['file_name'] = 'default-thumbnail.jpg';
	            }
	            /* Load Template */
	            $this->template->admin_render('admin/contents/details', $this->data);
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

	public function delete($content_slug, $id = NULL)
	{
		if ( ! $this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}
		else
		{
			if (!isset($id) OR $id == NULL)
			{
				redirect('admin/contents/p/'.$content_slug, 'refresh');
			}
			else
			{
				$id = (int) $id;
	        	$content_id = (int)((array)$this->contents_model->get_data('contents', $content_slug, 'slug', FALSE))['id'];
	            if($this->contents_model->delete_payment($content_id, $id))
	            {
	            	redirect('admin/contents/p/'.$content_slug, 'refresh');
	            }
	        }
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

	function unset_key($data, $unset_data = array('id', 'ip_address'))
	{
		if (is_array($unset_data))
		{
			foreach ($unset_data as $key => $value)
			{
				unset($data[$value]);
			}
		}
		else
		{
			unset($data[$unset_data]);
		}
		return $data;
	}

	public function _table_name($content_name, $type = '')
	{
		$table = $this->tables['content_prefix'] . $content_name;
		if ($type == 'members' || $type == 'media') 
		{
			$table .= $this->tables['members_suffix'];
			
			if ($type == 'media')
			{
				$table .= $this->tables[$type.'_suffix'];
			}
		}
		return $table;
	}

	// function object_to_array($object)
	// {
	// 	if (is_array($object))
	// 	{
	// 		foreach ($object as $key => $value)
	// 		{
	// 			$object[$key] = (array)$value;
	// 		}
	// 	}
	// 	else
	// 	{
	// 		$object = (array)$object[0];
	// 	}
	// 	return (array)$object;
	// }
}

