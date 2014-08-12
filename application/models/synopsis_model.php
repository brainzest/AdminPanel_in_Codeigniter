<?php

class Synopsis_model extends CI_Model {


    public function __construct()
    {
        $this->load->database();
    }

    function insertSynopsis($data)
    {
        $insert = $this->db->insert('synopsis', $data);
        return $insert;
    }
    function getAllSynopsis()
    {

        $this->db->select('*');
        $this->db->from('synopsis');

        $query = $this->db->get();
        return $query->result_array();
    }
}