<?php
session_start();

$email= $_POST['email'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$titre=$_POST['titre'];
$adresse=$_POST['adresse'];
$tel=$_POST['tel'];
$social=$_POST['social'];

    require 'connectDB.php';

    $email = $_SESSION['email'];

    function setData($dbConn, $email, $nom, $prenom, $titre, $adresse, $tel, $social){


        try {
            if(isset($_POST['submit'])){
                die("Update failed");

            }else{
                if(!(empty($email) || empty($nom) || empty($prenom) || empty($titre) || empty($adresse) || empty($tel) || empty($social))){
                    $query="UPDATE user SET email=:email, nom=:nom, prenom=:prenom, titre=:titre, adresse=:adresse, tel=:tel, social=:social WHERE email = '$email'";
                    $statement=$dbConn->prepare($query);
                    $statement->bindValue(":email", $email);
                    $statement->bindValue(":nom", $nom);
                    $statement->bindValue(":prenom", $prenom);
                    $statement->bindValue(":titre", $titre);
                    $statement->bindValue(":adresse", $adresse);
                    $statement->bindValue(":tel", $tel);
                    $statement->bindValue(":social", $social);
                    $statement->execute();
                }else{
                    die("Veuillez renseigner tous les champs!");
                }
            } 
        } catch (PDOException $e) {
            echo"Pleas insert valide data" .$e->getMessage();
        }
    }

    setData($dbConn, $email, $nom, $prenom, $titre, $adresse, $tel, $social);

    header('Location: ../frontend/setData.php');
    


?>