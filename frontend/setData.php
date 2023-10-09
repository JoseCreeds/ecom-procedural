<?php
session_start();

/* if(!isset($_SESSION['connected']) || (isset($_SESSION['connected']) && $_SESSION['connected']===false )){
    header('Location: ../frontend/connexion.php');

} */
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style1.css">
        <title>setData</title>
    </head>
    <body>

        <?php require('header.php'); ?>

        <form action="../backend/setData.php" method="post" >

            <h1>Modofier informations</h1>

            <?php 

                require'../backend/connectDB.php';
                if($dbConn !==null){
                    $email = $_SESSION['email'];
                    $query ="SELECT * FROM user WHERE email = '$email'";
                    $stmt=$dbConn->prepare($query);
                    
                    $stmt->execute();
            
                    $results=$stmt->fetchAll(PDO::FETCH_ASSOC);

                    if($results){
                        foreach($results as $result){ ?>

                            <fieldset>
                                <legend><span class="number">1</span>Informations
                            </legend>
                                <label for="name">Nom</label>
                                <input type="text" name="nom" id="nom" placeholder="<?= $result['nom']; ?>">

                                <label for="name">Prénom</label>
                                <input type="text" name="prenom" id="prenom" placeholder="<?= $result['prenom']; ?>">

                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="<?= $result['email']; ?>">

                                <label for="adresse">Adresse</label>
                                <input type="text" name="adresse" id="adresse" placeholder="<?= $result['adresse']; ?>">

                                <label for="tel">Téléphone</label>
                                <input type="text" name="tel" id="tel" placeholder="<?= $result['tel']; ?>">
                            
                            </fieldset>
                            <fieldset>
                                <legend><span class="number">2</span>Profil</legend>


                                <label for="titre">Titre</label>
                                <select name="titre" id="titre">
                                    <optgroup label="defaut">
                                        <option value="<?= $result['titre']; ?>"><?= $result['titre']; ?></option>
                                    </optgroup>
                                    <optgroup label="Business">
                                        <option value="entreprise">Entreprise</option>
                                        <option value="particulier">Particulier</option>
                                        <option value="free-lance">Free-lance</option>
                                    </optgroup>
                                    <optgroup label="Web">
                                        <option value="Frontend">Frontend</option>
                                        <option value="Backend">Backend</option>
                                        <option value="Php">PHP</option>
                                    </optgroup>
                                    <optgroup label="Mobile">
                                        <option value="Android">Android</option>
                                        <option value="IOS">IOS</option>
                                    </optgroup>
                                    <optgroup label="Design">
                                        <option value="Web-design">Web-design</option>
                                        <option value="Graphisme">Graphisme</option>
                                    </optgroup>
                                </select>
                                
                                <label for="social">Social</label>

                                <?php
                                if($result['social'] === "Facebook"){ ?> 
                                    <input  type="checkbox" name="social" id="Facebook" value="Facebook" checked>
                                    <label class="light" for="sport">Facebook</label>
                                <?php }else{ ?> 
                                    <input  type="checkbox" name="social" id="Facebook" value="Facebook">
                                    <label class="light" for="sport">Facebook</label>
                                <?php } 
                                if($result['social'] === "Instagram"){ ?> 
                                    <input type="checkbox" name="social" id="Instagram" checked value="Instagram">
                                <label class="light" for="insta">Instagram</label>
                                
                                <?php }else{ ?> 
                                    <input type="checkbox" name="social" id="Instagram" value="Instagram">
                                <label class="light" for="insta">Instagram</label>
                                
                                <?php } 
                                if($result['social'] === "Twitter"){ ?> 
                                    <input type="checkbox" name="social" id="Twitter" checked value="Twitter">
                                <label class="light" for="twitter">Twitter</label>
                                <?php }else{ ?> 
                                    <input type="checkbox" name="social" id="Twitter" value="Twitter">
                                <label class="light" for="twitter">Twitter</label>
                                <?php } ?>


                            </fieldset>
                        
            <?php } 
                }else{
                    echo"une erreur est survenue!";
                }
            }

            ?>

            <button type="submit">Modifier</button>

        </form>

        <?php require('footer.php'); ?>

    </body>
</html>