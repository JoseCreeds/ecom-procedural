<?php

    require'connectDB.php'; //To connect the database

    //Check if a session exist
    if(!isset($_SESSION)){
        //Otherwise, start it
        session_start();
    }
    //create the session
    if(!isset($_SESSION['panier'])){
        //If a session doesn't exist, let's create one and put into it an array
        $_SESSION['panier'] = array();
    }

    //Get the ID in the link
    if(isset($_GET['idPro'])) {   //chek if the ID is well got
        $idPro = $_GET['idPro'];

        //check if the product exist in the data base with the ID
        $query ="SELECT * FROM produit WHERE idPro= $idPro";
        $statement=$dbConn->prepare($query);
        $statement->execute();
        if(sizeof($statement->fetchAll(PDO::FETCH_ASSOC))==0){
            //if the product exist
            die("Ce produit n'existe pas!");
        }

        //add product into the basket
        if(isset($_SESSION['panier'][$idPro])){ //if the product is already into the basket
            $_SESSION['panier'][$idPro]++; //Represente the quantity

        }else{
            //otherwise add it
            $_SESSION['panier'][$idPro]=1;
        }
        //redirection to page acceuil.php
        header("Location:../frontend/acceuil.php");
    }
?>