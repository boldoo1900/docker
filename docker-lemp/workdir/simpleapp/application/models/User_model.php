<?php

class User_model extends CI_Model {
    
    public function addUser($data){
        return $this->db->insert('users', $data);
    }

    public function getUserByEmail($email){
        $result = $this->db->get_where('users', array('email' => $email))->result_array();

        if(count($result) != 0)
            return $result[0];
        else
            return null;
    }

    public function getUserById($user_id){
        $result = $this->db->get_where('users', array('user_id' => $user_id))->result_array();

        if(count($result) != 0)
            return $result[0];
        else
            return null;
    }

    public function getHobbies(){
        return $this->db->get('hobby')->result_array();
    }

    public function getUserMapHobbies($user_id){
        return $this->db->get_where('user_hobby_map', array('user_id' => $user_id))->result_array();
    }

    public function editProfile($user_id, $data, $hobbies){
        $this->db->delete('user_hobby_map', array('user_id' => $user_id));
        
        foreach($hobbies as $row){
            $this->db->insert('user_hobby_map', array('user_id' => $user_id, "hobby_id" => $row));
        }
        
        $this->db->where('user_id', $user_id);
        return $this->db->update("users", $data);
    }
}
