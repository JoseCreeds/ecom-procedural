<?php

$idPro = $_POST['idPro'];
$idCat = $_POST['idCat'];
$libellePro = $_POST['libellePro'];
$image = $_FILES['images']['name'];
$prix = $_POST['prix'];


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

    function addProduit($dbConn, $idPro, $idCat, $libellePro, $image, $prix){

        

        try {

            
            if(!empty($idPro) && !empty($idCat) && !empty($libellePro) && isset($image) && !empty($prix)){

                $query ="SELECT libellePro FROM produit WHERE idPro=:idPro";
                $statement= $dbConn->prepare($query);
                $statement->bindValue(":idPro", $idPro, PDO::PARAM_STR);
                $statement->execute();
        
                $produitAvailable = $statement->fetchAll(PDO::PARAM_STR);
        
                if (sizeof($produitAvailable)!==0) {
                    echo"Product already registred! Would you like to update informations about it?";
                } else {
                    if($dbConn!==null){
                        $sql ="INSERT INTO produit(idPro,idCat, libellePro, images, prix) VALUES (:idPro, :idCat, :libellePro, :images, :prix)";
                        $stmt= $dbConn->prepare($sql);
                        $stmt->bindParam(":idPro", $idPro);
                        $stmt->bindParam(":idCat", $idCat);
                        $stmt->bindParam(":libellePro", $libellePro);
                        $stmt->bindParam(":images", $image);
                        $stmt->bindParam(":prix", $prix);
        
                        $stmt->execute();
        
                        echo"You added new product!";
                    }
                }

            }else{
                echo"No empty fields";
            }
            
        } catch (PDOException $e) {
            echo"Insertion failed" .$e->getMessage();
            
        }
    }

    require_once 'upload.php';
    

    addProduit($dbConn, $idPro, $idCat, $libellePro, $image, $prix);

?>