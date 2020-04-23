<?php

class Blog_model extends CI_Model {
    
    public function getBlogs($user_id){
        return $this->db->get_where('blogs', array('user_id' => $user_id))->result_array();
    }

    public function getBlogsPublic(){
        return $this->db->get_where('blogs', array('is_public' => 1))->result_array();
    }

    public function getBlogsDropdown($user_id){
        return $this->db->get_where('blogs', array('is_public' => 1, "user_id" => $user_id))->result_array();
    }

    public function getBlogById($blog_id){
        $result = $this->db->get_where('blogs', array('blog_id' => $blog_id))->result_array();

        if(count($result) != 0)
            return $result[0];
        else
            return null;
    }

    public function addBlog($data){
        return $this->db->insert('blogs', $data);
    }
    
    public function editBlog($id, $data){

        $this->db->where('blog_id', $id);
        return $this->db->update('blogs', $data);
    }

    public function deleteBlog($id){
        return $this->db->delete('blogs', array('blog_id' => $id));
    }
}
