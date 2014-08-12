<?php
class Storyboard_model extends CI_Model {
 

    public function __construct()
    {
        $this->load->database();
    }

    public function get_story_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('storyboard');
		$this->db->where('story_id', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
    public function get_story_by_synopsis($id)
    {
        $this->db->select('*');
        $this->db->from('storyboard');
        $this->db->where('synopsis_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAllStory()
    {
        $this->db->select('*');
        $this->db->from('storyboard');

        $query = $this->db->get();
        return $query->result_array();
    }

    function insertStory($data)
    {
		$insert = $this->db->insert('storyboard', $data);
	    return $insert;
	}

   
	function delete_story($id){
		$this->db->where('story_id', $id);
		$this->db->delete('storyboard'); 
	}
 
}
?>	
