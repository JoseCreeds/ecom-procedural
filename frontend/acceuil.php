<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>acceuil</title>
    <link rel="stylesheet" href="styleAcceuil.css">
</head>
<body>
    <?php require('header.php'); ?>
    
    <div class="container">
    
        <?php

            require'../backend/connectDB.php';

            $query ="SELECT * FROM produit ORDER BY RAND() ";
            $statement = $dbConn->prepare($query);
            $statement->execute();

            $allProducts = $statement->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION['allProducts'] = $allProducts;

            $allProductsChunks = array_chunk($allProducts, 3); 


            //show the number of the product into the basket
            if(sizeof($_SESSION['panier'])<1){
                echo'<a href="../frontend/panier.php" class="panier">Panier<span>0</span> </a>';

            }else{
                echo'<a href="../frontend/panier.php" class="panier">Panier<span>'.  array_sum($_SESSION['panier'])  .'</span> </a>';
            }
            echo'<div class="products_container">';


            foreach($allProductsChunks as $allProducts){
                echo'<div class="products_row">';

                foreach($allProducts as $product){

                    echo'<form acton="#" class="product">
                            <div class="image_product">
                                <img src="../assets/uploads/'.$product['images'] . '" alt="Image ">
                            </div>
                            <div class="content">
                                <h2 class="libellePro">' . $product['libellePro'] .'</h2>
                                <p class="prix">' . $product['prix'] .' €</p>
                                <a href="../backend/panier.php?idPro='. $product['idPro'] .'" class="btn_add_product">Ajouter au panier</a>
                            </div>
                        </form>';  

                        
                }
                echo'</div>';
            }
            echo'</div>';



            ?>         
            
    </div>

    <?php require('footer.php'); ?>
     
</body>
</html>