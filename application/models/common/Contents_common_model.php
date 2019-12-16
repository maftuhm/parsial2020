<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contents_common_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->tables = $this->config->item('tables');
    }

    public function get_contents($value = NULL, $result = 'id', $key = 'slug')
    {
        if ($value == NULL) {
            return $this->db->get($this->tables['contents'])->result();
        }
        else
        {
            $query = $this->db->select($result)
                                ->where($key, $value)
                                ->limit(1)
                                ->get($this->tables['contents'])
                                ->row();
            return $query;
        }
    }

    public function count_contents()
    {
        return  $this->db->count_all_results($this->tables['contents']) > 0;
    }
}
