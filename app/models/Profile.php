<?php

class Profile {
    
    private $db;

    public function __construct(){
        include("../config/database.php");
        $this->db = $dbh;
    }

    public function setGender($gender, $id_user){
        $query = $this->db->prepare('INSERT INTO gender (gender, id_user) VALUES (:gender, :id_user);');
        $query->bindParam(":gender", $gender);
        $query->bindParam(":id_user", $id_user);
        $query->execute();
    }
    public function setLoisir($loisir, $id_user, $active){
        
        $query = $this->db->prepare("INSERT INTO loisir_user(id_user,id_loisir, active) VALUES (:id_user,:loisir, :active);");
        $query->bindParam(":loisir",$loisir);
        $query->bindParam(":id_user", $id_user);
        $query->bindParam(":active", $active);
        $query->execute();
    }
    public function setActive($id_user){
        $query = $this->db->prepare("INSERT INTO user_log (id_user, active) VALUES (:id_user, 1);");
        $query->bindParam(":id_user", $id_user);
        $query->execute();
    }
    public function setDescription($description, $id_user){
        $query = $this->db->prepare('INSERT INTO description (id_user, description) VALUES (:id_user, :description);');
        $query->bindParam(":id_user", $id_user);
        $query->bindParam(":description", $description);
        $query->execute();
    }
    public function getLoisirList(){
        $query = $this->db->prepare('SELECT id FROM loisir;');
        $query->execute();
        return $query->fetchAll();
    }
    public function getLoisir($id_user){
        $query = $this->db->prepare('SELECT loisir_user.id_loisir, loisir.name, active FROM loisir_user
        JOIN loisir ON loisir.id = loisir_user.id_loisir
        WHERE loisir_user.id_user = :id_user;');
        $query->bindParam(":id_user", $id_user);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getDescription($id_user){
        $query = $this->db->prepare('SELECT * FROM description WHERE id_user = :id_user;');
        $query->bindParam(":id_user", $id_user);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function getGender($id_user){
        $query = $this->db->prepare('SELECT * FROM gender WHERE id_user = :id_user;');
        $query->bindParam(":id_user", $id_user);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getActive($id_user){
        $query = $this->db->prepare('SELECT active FROM user_log WHERE id_user = :id_user;');
        $query->bindParam(":id_user", $id_user);
        $query->execute();
        return $query->fetch();
    }
    
    public function updateGender($gender, $id_user){
        if($gender !== null){
            $query = $this->db->prepare('UPDATE gender SET gender = :gender WHERE id_user = :id_user;');
            $query->bindParam(":id_user", $id_user);
            $query->bindParam(":gender", $gender);
            $query->execute();
        }
    }

    public function updateLoisir($loisir, $id_user, $active){
        $query = $this->db->prepare('UPDATE loisir_user SET active = :active WHERE id_loisir = :loisir AND id_user = :id_user;');
        $query->bindParam(':loisir', $loisir);
        $query->bindParam(':id_user', $id_user);
        $query->bindParam(':active', $active);
        $query->execute();
    }
    public function updateDescription($description, $id_user){
        if($description !== null){
            $query = $this->db->prepare('UPDATE description SET description = :description WHERE id_user = :id_user;');
            $query->bindParam(":id_user", $id_user);
            $query->bindParam(":description", $description);
            $query->execute();
        }
    }
    public function updatePassword($password, $id_user){
        $query = $this->db->prepare('UPDATE user SET password = :password WHERE id = :id_user;');
        $query->bindParam(':id_user', $id_user);
        $query->bindParam(':password', $password);
        $query->execute();
    }
    public function updateEmail($email, $id_user){
        $query = $this->db->prepare('UPDATE user SET email = :email WHERE id = :id_user;');
        $query->bindParam(':id_user', $id_user);
        $query->bindParam(':email', $email);
        $query->execute();
    }
    public function deleteAccount($id_user){
        $query = $this->db->prepare('UPDATE user_log SET active = 0 WHERE id_user = :id_user;');
        $query->bindParam(':id_user', $id_user);
        $query->execute();
    }
}