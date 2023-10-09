<?php

session_start();

session_destroy(); // Détruit toutes les sessions en cours

header('Location: ../frontend/connexion.php'); //Redirection sur la page de connexions

exit();

?>