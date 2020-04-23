<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Article_model', 'model');
		$this->load->model('Blog_model', 'modelBlog');
		$this->load->model('Comment_model', 'modelComment');

		$this->user_id = $_SESSION["userInfo"]["user_id"];

		// blog dropdown
		$blogs = $this->modelBlog->getBlogsPublic($this->user_id);
		$blogDropdown = array("" => "---");
		foreach($blogs as $row){
			$blogDropdown[$row["blog_id"]] = $row["blog_name"];
		}

		$data["blogs"] = $blogDropdown;
		$this->load->vars($data);
	}

	public function index()
	{
		$listdata = $this->model->getArticles($this->user_id);

		// $this->load->view('blog/index');
		$this->load->template("article/index", array("listdata" => $listdata));
	}

	public function online($blog_id){
		$onlineArticles = $this->model->getArticlesPublic($blog_id);

		$this->load->template("article/public", array("articles" => $onlineArticles));
	}

	public function detail($article_id){

		$article = $this->model->getArticleDetail($article_id);
		$comments = $this->modelComment->getComments($article_id);

		$this->load->template("article/detail", array("article" => $article, "comments" => $comments));
	}

	public function add(){
		$data = ["actionType" => "add", "article_id" => "",
				 "blog_id" => "", "title" => "", 
				 "body" => "", "is_public" => ""];

		$this->load->template("article/form", array("data" => $data));
	}

	public function edit($id){

		$result = $this->model->getArticleById($id);
		$result["actionType"] = "edit";

		$this->load->template("article/form", array("data" => $result));
	}

	public function delete($id){

		$this->model->deleteArticle($id);
		Message::add('s', 'Article Successfully deleted', '/article');
	}

	public function regist(){

		if($this->input->method() == "post"){
			$param = $this->input->post();

			if(isset($param["actionType"]) && $param["actionType"] == "add"){
				$data = ["blog_id" => $param["blog_id"], "title" => $param["title"],
						 "body" => $param["body"], "is_public" => $param["is_public"],
						 "created_at" => date("Y-m-d"), "updated_at" => date("Y-m-d") ];

				$result = $this->model->addArticle($data);
				if($result){
					Message::add('s', 'Article Successfully Registered', '/article');
				} else {
					Message::add('e', 'Error!!!', '/article/add');
				}
			} else {
				$data = ["blog_id" => $param["blog_id"], "title" => $param["title"],
						 "body" => $param["body"], "is_public" => $param["is_public"],
						 "updated_at" => date("Y-m-d") ];

				$result = $this->model->editArticle($param["article_id"], $data);
				if($result){
					Message::add('s', 'Article Successfully edited', '/article');
				} else {
					Message::add('e', 'Error!!!', '/article/add');
				}
			}
		}

		header("Location: /article");
	}
}
