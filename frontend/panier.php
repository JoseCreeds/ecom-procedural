<?php
session_start();

    if(isset($_GET['del'])){
        $id_del = $_GET['del'];
        unset($_SESSION['panier'][$id_del]);

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>panier</title>
    <link rel="stylesheet" href="styleAcceuil.css">
</head>
<body class="show_panier">
    <a href="../frontend/acceuil.php" class="link">Boutique</a>
    <section>
        <table>
            <tr>
                <th></th>
                <th>Description</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Action</th>
            </tr>

            <?php
                require'../backend/connectDB.php';
                
                $total = 0;

                $ids = array_keys($_SESSION['panier']);

                if (sizeof($ids)<1) {
                    echo"Votre panier est vide";
                } else {
                    $inClause = implode(',', $ids);
                    $product_added ="SELECT * FROM produit WHERE idPro IN ($inClause)";
                    $statement = $dbConn->prepare($product_added);
                    $statement->execute();

                    foreach($statement->fetchAll(PDO::FETCH_ASSOC) as $addedToBasket ){ 
                        
                        $total += $addedToBasket['prix']*$_SESSION['panier'][$addedToBasket['idPro']];
                        
                        ?>


                        <tr>
                            <td><img src="../assets/uploads/<?= $addedToBasket['images'] ?>" height="auto" width="50px"></td>
                            <td><?= $addedToBasket['libellePro'] ?></td>
                            <td><?= $addedToBasket['prix'] ?></td>
                            <td><?= $_SESSION['panier'][$addedToBasket['idPro']] ?></td>
                            <td><a href="../frontend/panier.php?del=<?= $addedToBasket['idPro'] ?>"><img src="../assets/panier/Delete.png" alt="" width="20px" height="auto" srcset=""> </a> </td>
                        </tr>

                    <?php  }
                }
                

            ?>
            <tr class="total">
                <th>Total : <?= $total ?> €</th>
            </tr>
        </table>
    </section>
</body>
</html>