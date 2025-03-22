<?php

try{
    $dbh = new PDO('mysql:dbname=my_meetic;host=127.0.0.1', 'enzo', "Sombrero2112");
}catch(Exception $error){
    echo($error);
}