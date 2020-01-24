<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contents_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->tables = $this->config->item('tables');
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

    public function get_members_data($content_slug, $tim_id)
    {
        $table_member = $this->_table_name($content_slug, 'members');        

        $this->db->select('*');
        $this->db->from($table_member);
        $this->db->where('tim_id', $tim_id);
        return $this->db->get()->result('array');
    }

    public function get_members_media($content_slug, $member_id)
    {
        $table_media = $this->tables['media'];
        $table_member_media = $this->_table_name($content_slug, 'media');

        $this->db->select('*');
        $this->db->from($table_member_media);
        $this->db->join($table_media, $table_media.'.id = '.$table_member_media.'.media_id');
        $this->db->where('member_id', $member_id);
        return $this->db->get()->result('array');
    }

    public function get_participant_payment($content_id, $participant_id)
    {
        $this->db->select('*');
        $this->db->from($this->tables['payments_media']);
        $this->db->join($this->tables['payments'], $this->tables['payments'].'.id = '.$this->tables['payments_media'].'.payment_id');
        $this->db->join($this->tables['media'], $this->tables['media'].'.id = '. $this->tables['payments_media'].'.media_id');
        $this->db->where(array('participant_id'=> $participant_id, 'content_id' => $content_id));
        return $this->db->get()->result('array');
    }

    public function get_count_members($content_slug, $tim_id)
    {
        $table_media = $this->tables['media'];
        $table_member = $this->_table_name($content_slug, 'members');

        $this->db->where(array('tim_id'=> $tim_id));
        return  $this->db->count_all_results($table_member);
    }

    public function register_content($name, $title, $description, $slug, $num_of_question)
    {
        $data = array(
            'created_on'    => time(),
            'name'          => $name,
            'title'         => $title,
            'description'   => $description,
            'slug'          => $slug,
            'num_of_question'=> $num_of_question
        );
        $this->db->insert($this->tables['contents'], $data);
        $id = $this->db->insert_id($this->tables['contents'] . '_id_seq');
        return (isset($id)) ? $id : FALSE;
    }

    public function create_question($data)
    {
        return $this->db->insert_batch($this->tables['forms'], $data); 
    }

    public function delete_content($id)
    {
        $this->db->trans_begin();

        $this->delete_forms($id);

        $this->db->delete($this->tables['contents'], array('id' => $id));

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

    public function delete_members($content_slug, $participant_id, $members_id = array())
    {
    	// $this->db->trans_begin();
		if(is_array($members_id))
		{
			$this->db->where_in('id', $members_id);
		}
		else
		{
			$this->db->where('id', $members_id);
		}
		$this->db->where('tim_id', $participant_id);

   //  	if (!is_array($members_id))
   //  	{
			// $this->db->where($this->tables['payments'].'.id', $payment_data[0]['payment_id']);
			// $this->db->delete($this->tables['payments']);
			// if ($this->db->trans_status() === FALSE)
			// {
			// 	$this->db->trans_rollback();
			// }
			// else
			// {
			// 	$this->db->trans_commit();
			// 	$this->db->where($this->tables['media'].'.id', $payment_data[0]['media_id']);
			// 	$this->db->delete($this->tables['media']);

			// 	if ($this->db->trans_status() === FALSE)
			// 	{
			// 		$this->db->trans_rollback();
			// 	}
			// 	else
			// 	{
			// 		$this->db->trans_commit();
			// 		$this->db->where($this->tables['payments_media'].'.participant_id', $payment_data[0]['participant_id']);
			// 		$this->db->where($this->tables['payments_media'].'.content_id', $payment_data[0]['content_id']);
			// 		$this->db->delete($this->tables['payments_media']);
			// 		if ($this->db->trans_status() === FALSE)
			// 		{
			// 			$this->db->trans_rollback();
			// 		}
			// 		else
			// 		{
			// 			$this->db->trans_commit();
			// 			return TRUE;

			// 		}
			// 	}
			// }
			// return FALSE;
   //  	}
    	return $this->db->last_query();
    }

    public function delete_payment($content_slug, $participant_id)
    {
    	$payment_data = $this->get_participant_payment($content_slug, $participant_id);
    	if (!empty($payment_data))
    	{
	        $this->db->trans_begin();
			$this->db->where($this->tables['payments'].'.id', $payment_data[0]['payment_id']);
			$this->db->delete($this->tables['payments']);
			if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
			}
			else
			{
				$this->db->trans_commit();
				$this->db->where($this->tables['media'].'.id', $payment_data[0]['media_id']);
				$this->db->delete($this->tables['media']);

				if ($this->db->trans_status() === FALSE)
				{
					$this->db->trans_rollback();
				}
				else
				{
					$this->db->trans_commit();
					$this->db->where($this->tables['payments_media'].'.participant_id', $payment_data[0]['participant_id']);
					$this->db->where($this->tables['payments_media'].'.content_id', $payment_data[0]['content_id']);
					$this->db->delete($this->tables['payments_media']);
					if ($this->db->trans_status() === FALSE)
					{
						$this->db->trans_rollback();
					}
					else
					{
						$this->db->trans_commit();
						return TRUE;

					}
				}
			}
			return FALSE;
    	}
    	return TRUE;
    }

    public function delete_participant($content_id, $participant_id, $tim = TRUE)
    {
        $this->db->trans_begin();

        $this->delete_members($id);

        $this->db->delete($this->tables['contents'], array('id' => $id));

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            return FALSE;
        }
        $this->db->trans_commit();
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
}
