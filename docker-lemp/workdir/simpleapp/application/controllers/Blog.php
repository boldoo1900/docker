<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		Auth::isLoggedin();

		$this->load->model('Blog_model', 'model');

		$this->user_id = $_SESSION["userInfo"]["user_id"];
	}

	public function index()
	{
		$listdata = $this->model->getBlogs($this->user_id);

		// $this->load->view('blog/index');
		$this->load->template("blog/index", array("listdata" => $listdata));
	}

	public function add(){
		$data = ["actionType" => "add",
				 "blog_id" => "", "blog_name" => "", 
				 "sub_title" => "", "is_public" => "", "header_image" => ""];

		$this->load->template("blog/form", array("data" => $data));
	}

	public function edit($id){

		$result = $this->model->getBlogById($id);
		$result["actionType"] = "edit";

		$this->load->template("blog/form", array("data" => $result));
	}

	public function delete($id){

		$this->model->deleteBlog($id);
		Message::add('s', 'Blog Successfully deleted', '/blog');
	}

	public function regist(){

		if($this->input->method() == "post"){
			$param = $this->input->post();

			$uploadOk = 0;
			$header_image = $param["header_image"];
			if(!empty($_FILES["header_image"]["tmp_name"])){
				$check = getimagesize($_FILES["header_image"]["tmp_name"]);
				if($check !== false) {
					$uploadOk = 1;
				} else {
					$uploadOk = 0;
				}
			}

			if($uploadOk){
				if(!empty($header_image)){
					$oldFilePath = BASEPATH."../assets/uploads/blogs/".$header_image;
					if (file_exists($oldFilePath)) {
						unlink($oldFilePath);
					 }
				}

				$ext = strtolower(pathinfo(basename($_FILES["header_image"]["name"]),PATHINFO_EXTENSION));
				$header_image = time() . "." . $ext;
				$target = BASEPATH . "../assets/uploads/blogs/". $header_image;

				move_uploaded_file($_FILES["header_image"]["tmp_name"], $target);
			}

			if(isset($param["actionType"]) && $param["actionType"] == "add"){
				$data = ["user_id" => $_SESSION["userInfo"]["user_id"],
						 "blog_name" => $param["blog_name"],
						 "sub_title" => $param["sub_title"],
						 "header_image" => $header_image, "is_public" => $param["is_public"]  ];

				$result = $this->model->addBlog($data);
				if($result){
					Message::add('s', 'Blog Successfully Registered', '/blog');
				} else {
					Message::add('e', 'Error!!!', '/blog/add');
				}
			} else {
				$data = ["blog_name" => $param["blog_name"],
						 "sub_title" => $param["sub_title"],
						 "header_image" => $header_image, "is_public" => $param["is_public"]  ];

				$result = $this->model->editBlog($param["blog_id"], $data);
				if($result){
					Message::add('s', 'Blog Successfully edited', '/blog');
				} else {
					Message::add('e', 'Error!!!', '/blog/add');
				}
			}
		}

		header("Location: /blog");
	}
}
