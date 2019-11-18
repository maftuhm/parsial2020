<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contents_common_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_contents()
    {
        return $this->db->get('contents')->result();
    }
    public function count_contents()
    {
        $this->db->limit(1);
        return  $this->db->count_all_results('contents') > 0;
    }
}
