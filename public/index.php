<?php

include("../app/controllers/RegisterController.php");
include("../app/controllers/LoginController.php");
include("../app/controllers/ProfileController.php");
include("../app/controllers/SearchController.php");

$registerController = new RegisterController();
$loginController = new LoginController();
$profileController = new ProfileController();
$searchController = new SearchController();

session_start();

if(isset($_GET["page"])){
    if(!isset($_GET["page"]) || $_GET["page"] === "register"){
        $registerController->index();
        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["email"])){
            $registerController->registerUser($_POST["firstname"],$_POST["lastname"], $_POST["email"], $_POST["birthdate"],  $_POST["password"], $_POST["phone"], $_POST["city"], $_POST["country"]);
        }
    }else if( $_GET["page"] === "login"){
        $loginController->index();
    }else if($_GET["page"] === "logout"){
        $loginController->logout();
    }else if($_GET["page"] === "profile"){
        if(isset($_POST["email"], $_POST["password"])){
            $loginController->loginUser($_POST["email"], $_POST["password"]);
            $profileController->getProfileActive($_SESSION["user"]["id"]);
            if(isset($_SESSION["active"]["active"])){
                $profileController->getProfileDetails($_SESSION["user"]["id"]);
            }
        }
        if(isset($_POST) && isset($_POST["delete"])){
            $profileController->deleteAccount($_SESSION["user"]["id"]);
        }
        // revoir les requêtes pour les informations de l'utilisateur
        
        if(!isset($_SESSION["active"]["active"]) && $_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["loisir"], $_POST["gender"], $_POST["description"])){
            $profileController->setProfileDetails($_SESSION["user"]["id"], $_POST["loisir"], $_POST["gender"], $_POST["description"]);
            $profileController->getProfileDetails($_SESSION["user"]["id"]);
            $profileController->getProfileActive($_SESSION["user"]["id"]);
        }
        $profileController->index();
        if(isset($_SESSION["active"]["active"])){
            $profileController->getProfileDetails($_SESSION["user"]["id"]);
            // FAIRE UN UPDATE A LA PLACE DU INSERT
            if($_SERVER["REQUEST_METHOD"] === "POST" && (isset($_POST["loisir"]) || isset($_POST["gender"]) || isset($_POST["description"]))){
                $profileController->updateProfileDetails($_SESSION["user"]["id"], $_POST["loisir"], $_POST["gender"], $_POST["description"]);
                $profileController->getProfileDetails($_SESSION["user"]["id"]);
            }else if($_SERVER["REQUEST_METHOD"] === "POST" && (isset($_POST["email"], $_POST["newemail"]))){
                $profileController->updateProfileEmail($_SESSION["user"]["id"], $_POST["newemail"], $_POST["email"]);
            }else if($_SERVER["REQUEST_METHOD"] === "POST" && (isset($_POST["password"], $_POST["newpassword"]))){
                $profileController->updateProfilePassword($_SESSION["user"]["id"], $_POST["newpassword"], $_POST["password"]);
                $profileController->getProfileDetails($_SESSION["user"]["id"]);
            }
        }
    }else if($_GET["page"] === "explorer"){
        $searchController->index();
        
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $loisirs = isset($_POST["loisir"]) ? $_POST["loisir"] : "";
            $genders = isset($_POST["gender"]) ? $_POST["gender"] : "";
            $minAge = isset($_POST["minAge"]) ? $_POST["minAge"] : null;
            $maxAge = isset($_POST["maxAge"]) ? $_POST["maxAge"] : null;
            $city = isset($_POST["city"]) ? $_POST["city"] : "'%%'";
            $_SESSION["loisirFilter"] = $loisirs;
            $_SESSION["genderFilter"] = $genders;
            $_SESSION["minAgeFilter"] = $minAge;
            $_SESSION["maxAgeFilter"] = $maxAge;
            $_SESSION["cityFilter"] = $city;
            $searchController->searchUsers($loisirs, $genders, $minAge, $maxAge, $city);
            
        }else{
            $searchController->searchUsers("", "", 18, 25, "");

        }
    }
}else{
    $registerController->index();
    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["email"])){
        $registerController->registerUser($_POST["firstname"],$_POST["lastname"], $_POST["email"], $_POST["birthdate"],  $_POST["password"], $_POST["phone"], $_POST["city"], $_POST["country"]);
    }
}