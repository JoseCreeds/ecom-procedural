<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style1.css">
        <title>Inscription</title>
    </head>
    <body>

        <?php require('header.php'); ?>

        <form action="../backend/inscription.php" method="post" >

            <h1>Inscription</h1>

            <fieldset>
                <legend><span class="number">1</span>Identification</legend>
                <label for="name">Nom</label>
                <input type="text" name="nom" id="nom">

                <label for="name">Prénom</label>
                <input type="text" name="prenom" id="prenom">

                <label for="email">Email</label>
                <input type="email" name="email" id="email">

                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" id="adresse">

                <label for="tel">Téléphone</label>
                <input type="text" name="tel" id="tel">

                <label for="password">Mot de passe</label>
                <input type="password" name="passwords" id="passwords">
                
            </fieldset>
        
            <fieldset>
                <legend><span class="number">2</span>Profil</legend>


                <label for="titre">Titre</label>
                <select name="titre" id="titre">
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

                <input  type="checkbox" name="social" id="Facebook">
                <label class="light" for="sport">Facebook</label>

                <input type="checkbox" name="social" id="Instagram">
                <label class="light" for="insta">Instagram</label>
                
                <input type="checkbox" name="social" id="Twitter">
                <label class="light" for="twitter">Twitter</label>
            </fieldset>

            <button type="submit">Inscrire</button>

        </form>

        <?php require('footer.php'); ?>

    </body>
</html>