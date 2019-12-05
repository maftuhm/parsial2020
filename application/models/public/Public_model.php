<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
		$this->load->database();
		$this->load->helper('cookie');
		$this->load->helper('date');
    }

    public function input_participant($table, $data)
    {

    	return $this->db->insert($table, $data);
    }
    
    public function get_data($table, $email = NULL)
    {
    	if ($email === NULL)
    	{
	      	$query = $this->db->get($table);
    	}
    	else
    	{
    		$query = $this->db->get_where($table, array('email' => $email));
    	}
		return $query->result();
	}

	public function get_id_group($name)
	{
		$group = $this->db->get_where($this->table['par_groups'], array('name' => $name), 1)->row();
 		$id = $group->id;
 		return $id;
	}


	public function set_payment($table)
	{
		$email = $this->input->post('email');

		$query = $this->db->get_where($table, array('email' => $email))->row();
 		$id = $query->id;
		$data = array(
						'time'				=> time(),
						'participant_id'	=> $id,
						'payment_type'		=> $table,
						'account_owner'		=> $this->input->post('name'),
						'email'				=> $email,
						'file_name' 		=> $this->upload->data('file_name'),
    					'file_type'			=> $this->upload->data('file_type'),
    					'file_size'			=> $this->upload->data('file_size'),
    					'file_ext'			=> $this->upload->data('file_ext')
					);
		return $this->db->insert($this->table['payment'], $data);
	}

	public function upload($data, $content_id = NULL, $participant_id = NULL)
	{
		$this->db->insert('media', $data);
		$id = $this->db->insert_id('media' . '_id_seq');

		if ($content_id != NULL && $participant_id != NULL)
		{
			if (isset($id)) {
				$data_groups = array(
					'content_id' 		=> $content_id, 
					'participant_id' 	=> $participant_id, 
					'media_id'			=> $id);
				$this->db->insert('participants_media', $data_groups);
			}
		}

		return (isset($id)) ? $id : FALSE;
	}

    public function get_participant($table, $value = NULL, $get_by = 'id')
    {
        $result = $this->db->get_where($table, array($get_by => $value))->result();
		return isset($result) ? $result : FALSE;
	}

	public function register($table, $additional_data = array())
	{
		// if ($this->check($table, $email))
		// {	
		// 	$this->set_error('account_creation_duplicate_email');
		// 	return FALSE;
		// }

		$ip_address = $this->_prepare_ip($this->input->ip_address());
		$data = array(
					'ip_address'	=> $ip_address,
		    		'created_on'	=> time()
				);
		$user_data = array_merge($this->_filter_data($table, $additional_data), $data);
		$this->db->insert($table, $user_data);

		$id = $this->db->insert_id($table . '_id_seq');

		return (isset($id)) ? $id : FALSE;
	}

	public function check($table, $email, $payment_type = NULL)
	{
		if ($payment_type != NULL) 
		{
			$this->db->where('payment_type', $payment_type);
		}		
		$this->db->where('email', $email);
		$this->db->limit(1);
		return  $this->db->count_all_results($table) > 0;
	}

	public function check_any($table, $array)
    {

		$this->db->where($array);
		$this->db->limit(1);
		return  $this->db->count_all_results($table) > 0;
	}

	public function set_error($error)
	{
		$this->errors[] = $error;
		return $error;
	}

	protected function _filter_data($table, $data)
	{
		$filtered_data = array();
		$columns = $this->db->list_fields($table);

		if (is_array($data))
		{
			foreach ($columns as $column)
			{
				if (array_key_exists($column, $data))
					$filtered_data[$column] = $data[$column];
			}
		}

		return $filtered_data;
	}
	protected function _prepare_ip($ip_address) {
		return $ip_address;
	}
}




