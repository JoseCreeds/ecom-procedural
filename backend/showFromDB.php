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

function showFromDB($dbConn){

    try {
        $query ="SELECT * FROM user ";
        $stmt=$dbConn->prepare($query);
        $stmt->execute();

        $users=$stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($users as $user){
            echo
                $user['email'] ."\n",
                $user['nom'] ."\n",
                $user['prenom'] ."\n",
                $user['titre'] ."\n",
                $user['adresse'] ."\n",
                $user['tel'] ."\n",
                $user['social'] ."\n",
                $user['passwords'] ."\n\n";
            
            

            
        }
    } catch (PDOException $e) {
        echo'ERROR' .$e->getMessage();
    }
}

showFromDB($dbConn);

?>