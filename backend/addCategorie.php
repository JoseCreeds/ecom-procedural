<?php

$idCat = $_POST['idCat'];
$libelleCat = $_POST['libelleCat'];

    function connectMe(){

        $pdo ='mysql:host=localhost; dbname=local_ecom';
        $username ='root';
        $password ='';

        try {
            $dbConn = new PDO($pdo, $username, $password);
            $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $dbConn;
        } catch (PDOException $e) {
            echo"Connexion failed" .$e->getMessage();

            return null;
        }
    }

    $dbConn = connectMe();

    function addCategorie($dbConn, $idCat, $libelleCat){

        try {

            if(!empty($idCat) && !empty($libelleCat)){

                $query ="SELECT idCat, libelleCat FROM categorie WHERE libelleCat=:libelleCat";
                $statement= $dbConn->prepare($query);
                $statement->bindValue(":libelleCat", $libelleCat, PDO::PARAM_STR);
                $statement->execute();
        
                $categorieAvailable = $statement->fetchAll(PDO::PARAM_STR);
        
                if (sizeof($categorieAvailable)!==0) {
                    echo"Categorie already registred";
                } else {
                    if($dbConn!==null){
                        $sql ="INSERT INTO categorie(idCat, libelleCat) VALUES (:idCat, :libelleCat)";
                        $stmt= $dbConn->prepare($sql);
                        $stmt->bindParam(":idCat", $idCat);
                        $stmt->bindParam(":libelleCat", $libelleCat);
        
                        $stmt->execute();
        
                        echo"You added new categorie";
                    }
                }
            }else{
                echo"No empty fields";
            }
            
        } catch (PDOException $e) {
            echo"Insertion failed" .$e->getMessage();
            
        }
    }

/*     $idCat = "534";
    $libelleCat = "jeux video"; */
    addCategorie($dbConn, $idCat, $libelleCat);

?>