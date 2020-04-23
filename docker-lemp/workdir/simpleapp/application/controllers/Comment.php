<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		Auth::isLoggedin();

		$this->load->model('Comment_model', 'model');

		$this->user_id = $_SESSION["userInfo"]["user_id"];
	}

	public function index()
	{
		die;
	}

	public function addAjax(){
		$param = $this->input->post();
		$user_id = $_SESSION["userInfo"]["user_id"];

		$created_at = date("Y-m-d h:i");
		$data = ["article_id" => $param["article_id"], "posted_user_id" => $user_id, 
				 "comment" => $param["body"], "created_at" => $created_at  ];

		$result = $this->model->addComment($data);
		if($result){
			echo json_encode(["status" => "SUCCESS", "created_at" => $created_at ]);
			exit();
		} else {
			echo json_encode(["status" => "FAIL"]);
		}
	}	
}