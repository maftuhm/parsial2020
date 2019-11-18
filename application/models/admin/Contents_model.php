<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contents_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_data($table, $value = NULL, $get_by = 'id')
    {
    	if ($value === NULL)
    	{
	      	$query = $this->db->get($table);
    	}
    	else
    	{
    		if (!is_array($get_by)) {
    			$get_by = array($get_by => $value);
    		}
    		$query = $this->db->get_where($table, $get_by);
    	}
		return $query->result();
	}
    public function register_contents($name, $slug)
    {
        $table = 'contents';
        $data = array(
            'created_on'    => time(),
            'name'          => $this->input->post('content_name'),
            'title'         => $this->input->post('content_title'),
            'slug'          => $this->input->post('content_slug'),
            'description'   => $this->input->post('content_description')
        );

        $this->db->insert($table, $data);
        $id = $this->db->insert_id($table . '_id_seq');
    }
}
