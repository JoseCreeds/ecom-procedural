<?php

function connectMe(){
    $pdo = 'mysql:host=localhost; dbname=local_ecom';   
    $username = 'root';
    $password = ''; 

    try{
        $dbConn = new PDO($pdo, $username, $password);
        //Configurer les options PDo si nécessaire
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConn;
    }catch (PDOException $e){
        echo "Erreur de connexion";
        $e->getMessage();
        return null;

    }
}

$dbConn = connectMe();

?>