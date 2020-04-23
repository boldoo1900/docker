<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Blog_model', 'model');
		
		$this->user_id = $_SESSION["userInfo"]["user_id"];
	}

	public function index()
	{
		$blogs = $this->model->getBlogsPublic();
		$this->load->template("dashboard/dashboard", array("blogs" => $blogs));
	}
}
