<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contents_common_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_contents($value = NULL, $result = 'id', $key = 'slug')
    {
        if ($value == NULL) {
            return $this->db->get('contents')->result();
        }
        else
        {
            $query = $this->db->select($result)
                                ->where($key, $value)
                                ->limit(1)
                                ->get('contents')
                                ->row();
            return $query;
        }
    }

    public function count_contents()
    {
        return  $this->db->count_all_results('contents') > 0;
    }
}
