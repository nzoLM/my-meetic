<?php

class Register {

    private $db;

    public function __construct()
    {
        include("../config/database.php");
        $this->db = $dbh;
    }

    public function setUser($firstName, $lastName, $birthdate, $email, $password, $phoneNumber, $city, $country){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = $this->db->prepare("INSERT INTO user (firstname, lastname, email, birthdate, password, phone_number, city, country)
        VALUES (:firstname, :lastname, :email, :birthdate, :password, :phone_number, :city, :country);");
        $query->bindParam(":firstname", $firstName);
        $query->bindParam(":lastname", $lastName);
        $query->bindParam(":email", $email);
        $query->bindParam(":birthdate", $birthdate);
        $query->bindParam(":password", $password);
        $query->bindParam(":phone_number", $phoneNumber, );
        $query->bindParam(":city", $city);
        $query->bindParam(":country", $country);
        $query->execute();
    }

}