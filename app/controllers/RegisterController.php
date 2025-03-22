<?php
include('../app/models/Register.php');

class RegisterController{
    private $register;
    
    public function __construct(){
        $this->register = new Register();
    }

    public function index(){
        include "../app/views/RegisterView.php";
    }
    
    public function registerUser($firstName, $lastName, $email, $birthdate, $password, $phoneNumber, $city, $country){
        $today = date("Y-m-d");
        $diff = date_diff(date_create($birthdate), date_create($today));
        if($diff->format('%y') >= 18){
            $this->register->setUser($firstName, $lastName, $birthdate, $email, $password, $phoneNumber, $city, $country);
            header("Location: index.php?page=login");
        }else{
            header("Location: index.php?page=register&minor=true");
        }
        
    }
}