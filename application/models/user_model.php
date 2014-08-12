<?php
/**
 * Created by PhpStorm.
 * User: neha
 * Date: 25/7/14
 * Time: 10:50 PM
 */

class User_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }


    public  function createUsers()
    {

        $this->db->where('username', $this->input->post('username'));
        $query = $this->db->get('user');

        if($query->num_rows > 0)
        {
            echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>';
            echo "Username already taken";
            echo '</strong></div>';
        }

        else
        {

            $arrData = array(
                 'description' => $this->input->post('description'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
                 );

            $insert = $this->db->insert('user', $arrData);
            return $insert;
        }

    }

    public function getUsers()
    {
        $this->db->select('*');
       $this->db->from('user');
        $query = $this->db->get();
        
        return $query->result_array();  
    }

    function validate($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('user');

        if($query->num_rows == 1)
        {
            return true;
        }
    }
}


   /* function get_db_session_data()
    {
        $query = $this->db->select('user_data')->get('ci_sessions');
        $user = array();
        foreach ($query->result() as $row)
        {
            $udata = unserialize($row->user_data);

            $user['user_name'] = $udata['user_name'];
            $user['is_logged_in'] = $udata['is_logged_in'];
        }
        return $user;
    }

}
