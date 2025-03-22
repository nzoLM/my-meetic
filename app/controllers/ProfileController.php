<?php
include("../app/models/Profile.php");

class ProfileController{
    private $profile;

    public function __construct(){
        $this->profile = new Profile();
    }
    public function index(){
        include("../app/views/ProfileView.php");
    }
    public function setProfileDetails($id_user, $loisirArray, $gender, $description){
        $loisirList = $this->profile->getLoisirList();
        foreach($loisirList as $loisir){
            if($loisir["id"] === $loisirArray[$loisir["id"]]){
                $this->profile->setLoisir($loisir["id"], $id_user, 0);
            }else{
                $this->profile->setLoisir($loisir["id"], $id_user, 1);
            }
        }
        $this->profile->setGender($gender, $id_user);
        $this->profile->setDescription($description, $id_user);
        $this->profile->setActive($id_user);
        header("Location: index.php?page=profile");
    }
    public function updateProfileDetails($id_user, $loisirArray, $gender, $description){
        $loisirs = $this->profile->getLoisir($id_user);
        // CHANGER ça
        foreach($loisirs as $loisir){
            if(isset($loisirArray[$loisir["id_loisir"]]) && $loisir["id_loisir"] == $loisirArray[$loisir["id_loisir"]]){
                $this->profile->updateLoisir($loisir["id_loisir"], $id_user, 1);
            }else{
                $this->profile->updateLoisir($loisir["id_loisir"], $id_user, 0);
            }
        }
        $this->profile->updateDescription($description,$id_user);
        $this->profile->updateGender($gender, $id_user);
        header("Location: index.php?page=profile");
    }
    public function getProfileActive($id_user){
        $active = $this->profile->getActive($id_user);
        $_SESSION["active"] = $active;
        
    }
    public function getProfileDetails($id_user){
        $gender = $this->profile->getGender($id_user);
        $description = $this->profile->getDescription($id_user);
        $loisirs = $this->profile->getLoisir($id_user);
        $active = $this->profile->getActive($id_user);
        foreach($loisirs as $loisir){
            $_SESSION[$loisir["name"]] = $loisir;
        }
        $_SESSION['gender'] = $gender;
        $_SESSION['description'] = $description;
        $_SESSION['active'] = $active;
    }
    public function updateProfilePassword($id_user, $password, $currentPassword){
        $_SESSION["test-password"] = false;
        if(password_verify($currentPassword, $_SESSION["user"]["password"])){
            $this->profile->updatePassword(password_hash($password, PASSWORD_DEFAULT), $id_user);
            $_SESSION["test-password"] = $password;
        }
        session_destroy();
        header("Location: index.php?page=login");
    }
    public function updateProfileEmail($id_user, $email, $currentEmail){
        $_SESSION["test-mail"] = "false";
        if($currentEmail === $_SESSION['user']['email']){
            $this->profile->updateEmail($email, $id_user);
            $_SESSION["test-mail"] = true;
        }
    }
    public function deleteAccount($id_user){
        $this->profile->deleteAccount($id_user);
        session_destroy();
        header("Location: index.php?page=login");
    }

}