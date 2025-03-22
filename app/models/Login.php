<?php

class Login {
    
    private $db;
    
    public function __construct()
    {
        include("../config/database.php");
        $this->db = $dbh;
    }
    
    public function getUser($email){
        $query = $this->db->prepare("SELECT * FROM user WHERE email = :email;");
        $query->bindParam(":email", $email);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    

}

