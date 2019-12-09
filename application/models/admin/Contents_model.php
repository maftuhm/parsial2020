<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contents_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->table = 'contents';
    }

    public function get_data($table, $value = NULL, $get_by = 'id', $object = TRUE)
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
        if ($object) {
            $result = $query->result();
        }
        else
        {
            $result = $query->row();
        }
		return isset($result) ? $result : FALSE;
	}

    public function register_content($name, $title, $description, $slug, $num_of_question)
    {
        $table = 'contents';
        $data = array(
            'created_on'    => time(),
            'name'          => $name,
            'title'         => $title,
            'description'   => $description,
            'slug'          => $slug,
            'num_of_question'=> $num_of_question
        );
        $this->db->insert($table, $data);
        $id = $this->db->insert_id($table . '_id_seq');
        return (isset($id)) ? $id : FALSE;
    }

    public function create_question($data)
    {
        $table = 'contents_form';
        return $this->db->insert_batch($table, $data); 
    }

    public function delete_content($id)
    {
        $this->db->trans_begin();

        $this->delete_forms($id);

        $this->db->delete($this->table, array('id' => $id));

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            return FALSE;
        }
        $this->db->trans_commit();
    }
    public function delete_forms($content_id)
    {
        $table = 'contents_form';

        if (empty($content_id)) {
            return FALSE;
        }

        return $this->db->delete($table, array('content_id' => $content_id));

    }
}
