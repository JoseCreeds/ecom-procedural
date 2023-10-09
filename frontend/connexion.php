
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>

    <?php require('header.php'); ?>

    <form action="../backend/connexion.php" method="post" class="connexion">
        <fieldset>
            <h1>Connexion</h1>

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email">

            <label for="password">Mot de passe</label>
            <input type="password" name="passwords" id="password">

            <p>Avez-vous déjà un compte?   <a href="./inscription.php">Créer un compte</a></p>

            <button type="submit">Connexion</button>
        </fieldset>
    </form>

    <?php require('footer.php'); ?>

</body>
</html>