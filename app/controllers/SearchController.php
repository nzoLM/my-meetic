<?php
include("../app/models/Search.php");

class SearchController{
    private $search;

    public function __construct(){
        $this->search = new Search();
    }

    public function index(){
        include("../app/views/SearchView.php");
    }
    public function searchUsers($loisirs, $genders, $minAge, $maxAge, $city)
    {   
        if($loisirs === ""){
            $loisirList = false;
        }else{
            if(!is_array($loisirs)){
            $loisirs = [$loisirs];
            }else{
                $loisirList = "(";
                $i = 0;
                foreach($loisirs as $loisir){
                    $i++;
                    $loisirList .= $loisir;
                    if($i == count($loisirs)){
                        $loisirList .= ")";
                    }else{
                        $loisirList .= ",";
                    }
                    
                }
            }
        }

        if($genders === ""){
            $genderList = false;
        }else{
            if(!is_array($genders)){
                $genders = [$genders];
            }else{
                $genderList = "(";
                $i = 0;
                foreach($genders as $gender){
                    $i++;
                    $genderList .= $gender;
                    if($i == count($genders)){
                        $genderList .= ")";
                    }else{
                        $genderList .= ",";
                    }
                    
                }
            }
        }
        
        $userList = $this->search->searchUsers($loisirList, $genderList, $minAge, $maxAge, $city);
        $_SESSION["userList"] = $userList;
    }
}
