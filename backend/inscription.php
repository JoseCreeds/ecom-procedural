<?php
session_start();

/* $email="test@gmail.com";
$nom="Password";
$prenom="Hashed";
$titre="Cryptage";
$adresse="paris 155";
$tel="0785458596";
$social="facebook";
$passwords="testpass";  */

$email= $_POST['email'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$titre=$_POST['titre'];
$adresse=$_POST['adresse'];
$tel=$_POST['tel'];
$social=$_POST['social'];
$passwords=$_POST['passwords'];

$error = false;
$results = '';

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
$hashedPassword = password_hash($passwords, PASSWORD_BCRYPT);
$_SESSION['hashedPassword']=$hashedPassword;

function insertData($dbConn, $email, $nom, $prenom, $titre, $adresse, $tel, $social, $hashedPassword){

    try{
        $sql = "INSERT INTO user(email, nom, prenom, titre, adresse, tel, social, passwords) values (:email, :nom, :prenom, :titre, :adresse, :tel, :social, :hashedPassword)";
        $stmt=$dbConn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':tel', $tel);
        $stmt->bindParam(':social', $social);
        $stmt->bindParam(':hashedPassword', $hashedPassword);

        $stmt->execute();
        echo "Données insérées avec succès.";  
    }catch (PDOException $e){
        echo "Erreur lors de l'insertion des données.";
        $e->getMessage();
    }

}



function checkDataEmpty($dbConn, $email, $nom, $prenom, $titre, $adresse, $tel, $social, $hashedPassword){

    
    if(empty($email) || empty($nom) || empty($prenom) || empty($titre) || empty($adresse) || empty($tel) || empty($social) || empty($hashedPassword)){
        $error = true;
        echo "Aucun champs vide";
    }else{
        $error = false;
        
        //Exemple d'utilisation
       

        if($dbConn !==null){

            insertData($dbConn, $email, $nom, $prenom, $titre, $adresse, $tel, $social, $hashedPassword);
        }
    } 

}

function inscriptionvalide($dbConn, $email,  $nom, $prenom, $titre, $adresse, $tel, $social, $hashedPassword){
   try {
    $query = "SELECT email FROM user WHERE email = :email";
    $statement = $dbConn->prepare($query);
    $statement->bindValue(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    
    // Fetch the results
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    if(sizeof($results)!==0){
       echo "User already registred!";
    }else{
        checkDataEmpty($dbConn, $email, $nom, $prenom, $titre, $adresse, $tel, $social, $hashedPassword);
    }
    
   
} catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}
}

inscriptionvalide($dbConn, $email,  $nom, $prenom, $titre, $adresse, $tel, $social, $hashedPassword);

?>