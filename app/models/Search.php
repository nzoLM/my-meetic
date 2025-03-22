<?php

class Search {

    private $db;

    public function __construct(){
        include("../config/database.php");
        $this->db = $dbh; 
    }

    public function searchUsers($loisirList, $genderList, $minAge, $maxAge, $city){
        if(!$loisirList){
            $loisirFilter = "";
        }else{
            $loisirFilter = " AND loisir_user.id_loisir IN " .$loisirList;
        }
        if(!$genderList){
            $genderFilter = "";
        }else{
            $genderFilter = " AND gender.gender IN " . $genderList;
        }
        $cityFilter = " AND city LIKE '%". $city ."%' ";
        $query = $this->db->prepare('SELECT firstname, lastname, TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) AS "age", city, user.id AS "id", description FROM user
        JOIN gender ON gender.id_user = user.id
        JOIN loisir_user ON loisir_user.id_user = user.id
        JOIN loisir ON loisir.id = loisir_user.id_loisir
        JOIN description ON description.id_user = user.id
        WHERE TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) >= :minAge AND TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) <= :maxAge
        '. $genderFilter . $loisirFilter . $cityFilter . ' GROUP BY user.id;');
        $query->bindParam(":maxAge", $maxAge);
        $query->bindParam(":minAge", $minAge);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}