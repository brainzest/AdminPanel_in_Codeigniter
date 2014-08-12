<?php

class Feedback_model extends CI_Model {


    public function __construct()
    {
    $this->load->database();
    }

    function insertRatings($data)
    {
    $insert = $this->db->insert('ratings', $data);
    return $insert;
    }
    function getAllFeedback()
    {

    $this->db->select('*');
    $this->db->from('feedback');

    $query = $this->db->get();
    return $query->result_array();
    }
}