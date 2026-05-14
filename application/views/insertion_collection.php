<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">
    <script src="../assets/js/app.js" defer></script>
    <link rel="shortcut icon" href="../media/logo/Renty.svg" type="image/x-icon">
    <?php 
    if (isset($collection)) {
    ?>
        <title>Renty | Administrateur - Modification d'une collection</title>
    <?php 
    } else {
    ?>
        <title>Renty | Administrateur - Insertion d'une nouvelle collection</title>
    <?php 
    }
    ?>
</head>
<body>
<div class="container">
        <!-- <header> -->
        <header>
            <menu>
                <i class="fas fa-remove" id="close-nav"></i>    
                <a href="<?php echo base_url('Backoffice/index'); ?>" class="nav-link">Acceuil</a>
                <a href="commandes-en-attente.html" class="nav-link">Commandes</a>
                <a href="" class="nav-link">Livraisons</a>
                <a href="<?php echo base_url('GestionCollection/index'); ?>" class="nav-link">Collection</a>
                <a href="<?php echo base_url('GestionFeedback/index'); ?>" class="nav-link">Feed back</a>
                <a href="<?php echo base_url('GestionGallerie/index'); ?>" class="nav-link">Gallerie</a>
                <a href="<?php echo base_url('GestionMembre/index'); ?>" class="nav-link">Membres</a>
                <a href="<?php echo base_url('Authentification/deconnexion'); ?>" class="nav-link">Deconnexion</a>
            </menu>

            <nav>
                <i class="fas fa-bars" id="nav-btn"></i>
                <img src="../media/logo/Renty(logo principal).svg">
                <div class="user-btn">
                    <i class="fas fa-user"></i>
                </div>
            </nav>
        </header>

        <!-- <section> -->
        <section>
        <main>
            <div class="big-container">
            <?php 
            if (isset($collection)) {
            ?>
            <h2 class="titre">Modifier la collection <?php echo $collection['nom_collection'];?></h2>
                <form action="<?php echo base_url('GestionCollection/updateCollection?id_collection=' . $collection['id_collection']); ?>" method="post">
                    <label for="nom_collection">Nom de la collection:
                        <input type="text" name="nom_collection" id="nom_collection" value="<?php echo $collection['nom_collection'];?>" required>
                    </label><br>
                    <label for="photo">Couverture de la collection:
                        <input type="file" name="photo" id="photo" value="<?php echo $collection['photo'];?>" required>
                    </label><br>
                    <label for="date_crea">Date de création:
                        <input type="datetime" name="date_crea" id="date_crea" value="<?php echo $collection['date_crea'];?>" required>
                    </label><br>
                    <label for="description_collection">Description de la collection:
                        <input type="text" name="description_collection" id="description_collection" value="<?php echo $collection['description_collection'];?>" required>
                    </label><br>
                    <input type="submit" value="Modifier">
                </form>
            <?php 
            } else {
            ?>
            <h2 class="titre">Insertion d'une nouvelle collection</h2>
                <form action="<?php echo base_url('GestionCollection/insertCollection'); ?>" method="post">
                    <label for="nom_collection">Nom de la collection:
                        <input type="text" name="nom_collection" id="nom_collection" required>
                    </label><br>
                    <label for="photo">Couverture de la collection:
                        <input type="file" name="photo" id="photo" required>
                    </label><br>
                    <label for="date_crea">Date de création:
                        <input type="date" name="date_crea" id="date_crea" required>
                    </label><br>
                    <label for="description_collection">Description de la collection:
                        <input type="text" name="description_collection" id="description_collection" required>
                    </label><br>
                    <input type="submit" value="Ajouter">
                </form>
            <?php 
            }
            ?>
            </div>
        </main>
        </section>

        <!-- <footer> -->
        <footer>
            <p>&copy; Renty 2024</p>
        </footer>
    </div>
</body>
</html>