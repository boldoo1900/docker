<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model', 'model');
    }

    public function index()
	{
        die;
		$this->load->view('');
    }

    public function profile()
    {
        $user_id = $_SESSION["userInfo"]["user_id"];
        $result = $this->model->getUserById($user_id);

        $hobbies = $this->model->getHobbies();
        $hobbyDropdown = array();
        foreach($hobbies as $row){
            $hobbyDropdown[$row["hobby_id"]] = $row["hobby"];
        }

        $userMapHobbies = $this->model->getUserMapHobbies($user_id);        
        $userMapHobbiesDropdown = array();
        foreach($userMapHobbies as $row){
            array_push($userMapHobbiesDropdown, $row["hobby_id"]);
        }
        $result["hobby_ids"] = $userMapHobbiesDropdown;
        
        $this->load->template("user/form", array("data" => $result, "hobbies" => $hobbyDropdown));
    }

    public function editprofile(){

        if($this->input->post('nickname') && $this->input->method() == "post"){
            $param = $this->input->post();
            $user_id = $_SESSION["userInfo"]["user_id"];

            $data = ["email" => $param["email"], "nickname" => $param["nickname"], "birth_date" => $param["birth_date"]];
            if(!empty($param["password"])){
                $data["password"] = md5($param["password"]);
            }

            $result = $this->model->editProfile($user_id, $data, $param["hobby_ids"]);
            if($result){
                Message::add('s', 'Profile Successfully updated', '/profile');
            } else {
                Message::add('e', 'ERROR!!!', '/profile');
            }
        }
    }

    public function register()
    {   
        // $param = $this->request->getPost();
        $param = $this->input->post();

        // if ($this->request->getMethod() == "post") {
        if ($this->input->post('email') && $this->input->method() == "post") {
            $data = ["email" => $param["email"],
                     "nickname" => $param["nickname"],
                     "password" => md5($param["password"]),
                     "birth_date" => $param["birth_date"],
                     "gender" => $param["gender"]   ];

            // $result = $this->users->addUser($data);
            $result = $this->model->addUser($data);
            if($result){
                Message::add('s', 'Successfully Registered', '/login');
            } else {
                Message::add('e', 'ERROR!!!', '/register');
            }
        }

        $this->load->view('user/register');
        // return view('register');
    }

    public function login()
    {
        // var_dump($_SESSION);

        $param = $this->input->post();

        if($this->input->method() == "post"){
            if(empty($param["email"]) || empty($param["password"])){
                Message::add('e', 'username or password is incorrect');
                return $this->load->view('user/login');
            }

            $result = $this->model->getUserByEmail($param["email"]);
            if(empty($result)){
                Message::add('e', 'username or password is incorrect');
                return $this->load->view('user/login');
            }

            if($result["password"] != md5($param["password"])){
                Message::add('e', 'username or password is incorrect');
                return $this->load->view('user/login');
            }

            $_SESSION["userInfo"] = ["user_id" => $result["user_id"], "email" => $result["email"], 
                                                          "nickname" => $result["nickname"]];
            header("Location: /dashboard");
        }

        $this->load->view('user/login');
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        header("location:/login");
    }
}
