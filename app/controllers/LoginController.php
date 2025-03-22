<?php
include("../app/models/Login.php");

class LoginController{
    private $login;

    public function __construct(){
        $this->login = new Login();
    }

    public function index(){
        include("../app/views/LoginView.php");
    }

    public function loginUser($email, $password){
        $user = $this->login->getUser($email);
        if(password_verify($password, $user["password"])){
            
            $_SESSION["user"] = $user;
            
        }else{
            header("Location: index.php?page=login");
        }
    }
    public function logout(){
        session_destroy();
        header("Location: index.php?page=login");
    }
}