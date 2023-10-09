<?php
session_start();
if(!isset($_SESSION['connected'])){
    header('Location: ../frontend/connexion.php');
    exit();
}
if(isset($_SESSION['connected']) && ($_SESSION['connected']==false)){
    header('Location: ../frontend/connexion.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adminDashbord</title>
</head>
<body>
    <div>I'm the mastermind</div>
</body>
</html>