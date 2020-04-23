<?php

class Comment_model extends CI_Model {
    
    public function getComments($article_id){
        $this->db->select('*');
        $this->db->from('comments');
        $this->db->join("users", 'comments.posted_user_id = users.user_id');
        $this->db->where('comments.article_id', $article_id);

        return $this->db->get()->result_array();
    }

    public function addComment($data){
        return $this->db->insert('comments', $data);
    }
}
