<?php
session_start();
    require('../backend/connectDB.php');

    //delete product
    //if var del exist
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
    <title>Panier</title>
    <link rel="stylesheet" href="styleAcceuil.css">
</head>
<body class="show_panier">
    <a href="../frontend/acceuil.php" class="link">Boutique</a>
    <section>
        <table>
            <tr>
                <th></th>
                <th>Libellé</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Action</th>
            </tr>
            
            <?php
            
                $total = 0;

                //Prodoct's list
                //Recover the key from the table session
                $ids = array_keys($_SESSION['panier']);
                //Check if there is no key
                if(empty($ids)){
                    //if not
                    echo'Votre panier est vide';
                }else{
                    //if there is...
                    $prodoct_added ="SELECT * FROM produit WHERE idPro IN (".implode(',', $ids) .")";
                    $statement=$dbConn->prepare($prodoct_added);
                    $statement->execute();

                    foreach($statement->fetchAll(PDO::FETCH_ASSOC) as $product){
                        //calculer total (prix unitaire * quantité)
                        $total += $product['prix'] * $_SESSION['panier'][$product['idPro']];
                        echo'<tr>
                                <td><img src="../assets/uploads/'.$product['images'] . '" alt="Image " width="50px" height=""50px ></td>
                                <td>' . $product['libellePro'] .'</td> 
                                <td>' . $product['prix'] .' €</td>
                                <td>'. $_SESSION['panier'][$product['idPro']] /*Qantity*/.'</td> 
                                <td><a href="../frontend/panier.php?del='.$product['idPro'].'"><img src="../assets/panier/Delete.png" height="20px" widht="auto" ></a></td>
                            </tr>';
                               
                        }

                }

            ?>

            <tr class="total">
                <th>Total: <?= $total ?>€</th>
            </tr>
        </table>
    </section>
</body>
</html>