<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../media/logo/Renty.svg" type="image/x-icon">
    <?php 
    if (isset($article)) {
    ?>
        <title>Renty | Administrateur - Modification d'une article</title>
    <?php 
    } else {
    ?>
        <title>Renty | Administrateur - Insertion d'une nouvelle article</title>
    <?php 
    }
    ?>
</head>
<body>
    <h2 class="titre">Insertion d'une article dans la collection <?php echo $collection['nom_collection'];?></h2>
    <form action="<?php echo base_url('GestionArticle/insertArticle?id_collection=' . $collection['id_collection']); ?>" method="post">
        <label for="nom_article">Nom de l'article:
            <input type="text" name="nom_article" id="nom_article" required>
        </label><br>
        <label for="photo">Photo de l'article:
            <input type="file" name="photo" id="photo" required>
        </label><br>
        <label for="date_crea">Date de création:
            <input type="date" name="date_crea" id="date_crea" required>
        </label><br>
        <label for="prix">Prix:
            <input type="number" name="prix" id="prix" required>
        </label><br>
        <label for="dimensions">Dimensions:
            <input type="number" name="largeur" id="largeur" placeholder="largeur" required>
            <input type="number" name="hauteur" id="hauteur" placeholder="hauteur" required>
            <input type="number" name="profondeur" id="profondeur" placeholder="profondeur" required>
        </label><br>
        <label for="matieres">Matières:
            <input type="text" name="matiere1" id="matiere1" placeholder="Matiere" required>
            <input type="text" name="matiere2" id="matiere2" placeholder="Matiere">
            <input type="text" name="matiere3" id="matiere3" placeholder="Matiere">
            <input type="text" name="matiere4" id="matiere4" placeholder="Matiere">
            <input type="text" name="matiere5" id="matiere5" placeholder="Matiere">
        </label><br>
        <label for="description_article">Description de l'article:
            <input type="text" name="description_article" id="description_article" required>
        </label><br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>