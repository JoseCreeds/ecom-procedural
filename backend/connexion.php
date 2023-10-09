<?php
session_start();

$email= $_POST['email'];
$passwords = $_POST['passwords'];

$error = false;

require'connectDB.php';

function connectNow($dbConn, $email, $passwords){
    try{
        $query = "SELECT email, passwords FROM user WHERE email = :email";
        $statement = $dbConn->prepare($query);
        $statement->bindValue(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        //Fetch the result
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        /*foreach($result as $takeEmail){
            $_SESSION['email'] = $takeEmail['email'];
            
        } */

        if($result){

            if (password_verify($passwords, $result['passwords'])) {
                $_SESSION['email']=$result['email'];
                $_SESSION['connected']=true;
                /* echo'Connected !'; */
                header('Location: ../frontend/adminDashbord.php');
            } else {
                $_SESSION['connected']=false;

                echo "Email ou mot de passe incorrect";
            }
         
        }else{
            $_SESSION['connected']=false;

            echo "Email ou mot de passe incorrect";
        }

    }catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}
}

function checkDataConnEmpty($dbConn, $email, $passwords){
    if(empty($email) || empty($passwords)){
        
        echo "Veuillez renseigner toutes les données";
    }else{
        
       
        if($dbConn !== null){
            connectNow($dbConn, $email, $passwords);
        }
        
    }
}

/* $email="new@gmail.com";
$passwords="admin";  */

checkDataConnEmpty($dbConn, $email, $passwords);

?>