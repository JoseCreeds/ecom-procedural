<?php
session_start();

function connectMe(){
    $pdo='mysql:host=localhost; dbname=local_ecom';
    $username='root';
    $password='';

    try {
        $dbConn = new PDO($pdo, $username, $password);
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /* echo"Connected"; */
        return $dbConn;
    } catch (PDOException $e) {
        echo"Connexion échouée" .$e->getMessage();
        return null;
    }
}

$dbConn = connectMe();

function setPassword($dbConn, $passwords, $newpasswords){

    try {
        
/*         $query='SELECT email FROM user WHERE (email = :email )';
        $statement=$dbConn->prepare($query);
        $statement->bindValue(':email', $email, PDO::PARAM_STR);

        $statement->execute(); 
        $request=$statement->fetchAll(PDO::FETCH_ASSOC);

        foreach($request as $showMe){

            $show = $showMe['email']; 
        } */
/* ********************************************Régler***************************************** */
        /* if (sizeof($request)!==0) { */

            $show = $_SESSION['email'];
            $queryPass="SELECT passwords FROM user WHERE (email = '$show')";
            $statement=$dbConn->prepare($queryPass);
            /* $statement->bindValue(':passwords', $passwords, PDO::PARAM_STR ); */
       
            $statement->execute(); 
            $requestPass=$statement->fetch(PDO::FETCH_ASSOC);

            if ($requestPass) {

                if (password_verify($passwords, $requestPass['passwords'])) {
                    $querySet="UPDATE user SET passwords = :newpasswords WHERE (email = '$show')";
                    $statement=$dbConn->prepare($querySet);
                    $statement->bindParam(':newpasswords', $newpasswords, PDO::PARAM_STR );
                
                    $statement->execute(); 
                    echo"Password changed!";
                } else {
                    echo"Anccien mot de passe incorrect";
                    
                }
                                
            } else {
                echo"Anccien mot de passe incorrect";
            }
/*         } else {
            echo"Votre email ne correspond à aucun compte";
        } */
        
    } catch (PDOException $e) {
        echo"ERROR" .$e->getMessage();
    }
}


$passwords="newpass";
$newpasswords="admin";

/* $email="new@gmail.com";
$passwords="newpass"; */
setPassword($dbConn,$passwords, $newpasswords);

?>