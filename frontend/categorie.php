<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégorie</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>

    <?php require('header.php'); ?>
    
    <div class="container">
        <form action="../backend/addCategorie.php" method="post">
            <fieldset>
                <legend style="text-align: center;" > Ajouter une catégorie</legend>

                <label for="IdCat">ID</label>
                <input type="text" name="idCat" id="idCat">

                <label for="Libelle">Libellé</label>
                <input type="text" name="libelleCat" id="libelleCat">

                <button type="submit">Ajouter</button>

            </fieldset>
        </form>
    </div>

    <?php require('footer.php'); ?>

</body>
</html>