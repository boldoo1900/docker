<?php

class Article_model extends CI_Model {
    
    public function getArticles($user_id){
        $this->db->select('*');
        $this->db->from('articles');
        $this->db->join("blogs", 'blogs.blog_id = articles.blog_id');
        $this->db->join("users", 'users.user_id = blogs.user_id');
        $this->db->where('users.user_id', $user_id);

        return $this->db->get()->result_array();
    }

    public function getArticlesPublic($blog_id){
        $this->db->select('*');
        $this->db->from('articles');
        $this->db->join("blogs", 'blogs.blog_id = articles.blog_id');
        $this->db->join("users", 'users.user_id = blogs.user_id');
        $this->db->where('articles.is_public', 1);
        $this->db->where('blogs.is_public', 1);
        $this->db->where('blogs.blog_id', $blog_id);

        return $this->db->get()->result_array();
    }

    public function getArticleDetail($article_id){
        $this->db->select('*');
        $this->db->from('articles');
        $this->db->join("blogs", 'blogs.blog_id = articles.blog_id');
        $this->db->join("users", 'users.user_id = blogs.user_id');
        $this->db->where('articles.is_public', 1);
        $this->db->where('blogs.is_public', 1);
        $this->db->where('articles.article_id', $article_id);

        $result = $this->db->get()->result_array();

        if(count($result) != 0)
            return $result[0];
        else
            return null;
    }

    public function getArticleById($article_id){
        $result = $this->db->get_where('articles', array('article_id' => $article_id))->result_array();

        if(count($result) != 0)
            return $result[0];
        else
            return null;
    }

    public function addArticle($data){
        return $this->db->insert('articles', $data);
    }
    
    public function editArticle($id, $data){

        $this->db->where('article_id', $id);
        return $this->db->update('articles', $data);
    }

    public function deleteArticle($id){
        return $this->db->delete('articles', array('article_id' => $id));
    }
}
