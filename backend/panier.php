<?php

    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['panier'])){
        $_SESSION['panier'] = array();
    }

    if(isset($_GET['idPro'])){
        $idPro = $_GET['idPro'];
    }

    require'connectDB.php';
    $findProduct ="SELECT * FROM produit WHERE idPro =($idPro)";
    $statement = $dbConn->prepare($findProduct);
    $statement->execute();

    $productFound = $statement->fetchAll(PDO::FETCH_ASSOC);

    if(sizeof($productFound)===0){
        die("Ce produit n'existe pas");
    }

    if (isset($_SESSION['panier'][$idPro])) {
        $_SESSION['panier'][$idPro]++;
    } else {
        $_SESSION['panier'][$idPro] = 1;
    }
    
    header('Location: ../frontend/acceuil.php');

?>