<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <?php require('header.php'); ?>
    
    <div class="container">

        <form action="../backend/addProduit.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend style="text-align: center;" > Ajouter un produit</legend>

                <label for="Idpro">ID Produit</label>
                <input type="text" name="idPro" id="idpro">

                <label for="categorie">Catégorie</label>

                <?php 
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
                ?>
                <select name="idCat" id="idCat">
                    <?php 

                        $query ="SELECT * FROM categorie /* WHERE idCat in (SELECT idCat FROM categorie) */" ;
                        $statement=$dbConn->prepare($query);
                        $statement->execute();

                        $results = $statement->fetchAll(PDO::PARAM_STR);

                        foreach($results as $result){  
                    
                        echo'<option value="' . $result['idCat'] .'">' . $result['libelleCat'] . '</option> ';

                        };
                    ?>
                    
                </select>

                <label for="Libelle">Libellé</label>
                <input type="text" name="libellePro" id="libellePro">

                <label for="image">Image</label>
                <input type="file" name="images" id="images">
                <!-- <input type="submit" value="Upload Image" name="submit"> -->

                <label for="Prix">Prix</label>
                <input type="money_format" name="prix" id="prix">


                <button type="submit"  name="submit" >Ajouter</button>

            </fieldset>
        </form>
    </div>

    <?php require('footer.php'); ?>

    <!-- <script type="text/javascript" src="../assets/script.js"></script> -->
</body>
</html>