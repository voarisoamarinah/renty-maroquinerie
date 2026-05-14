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
    <title>Renty | Administrateur - Gestionnaire des collections</title>
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
                <h1>Listes des collections disponible</h1>
                <a href="<?php echo base_url('GestionCollection/nouvelleCollection'); ?>">Ajouter une nouvelle collection</a>
                <?php 
                foreach ($collections as $collection) { 
                ?>
                <div class="small-container">
                    <div class="box">
                        <div class="info">
                            <img src="../media/collection/<?php echo $collection['photo']; ?>">
                            <label>
                                <b><?php echo $collection['nom_collection']; ?></b>
                                <p><?php echo $collection['description_collection']; ?></p>
                                <h6><?php echo $collection['date_crea']; ?></h6>
                            </label>

                            <label style="float: right; text-align: right;">
                                <a href="<?php echo base_url('GestionCollection/modifierCollection?id_collection=' . $collection['id_collection']); ?>">Modifier</a>    
                                <a href="<?php echo base_url('GestionCollection/supprimerCollection?id_collection=' . $collection['id_collection']); ?>">Supprimer</a>
                                <h6><a href="<?php echo base_url('GestionArticle/articlesCollection?id_collection=' . $collection['id_collection']); ?>">Voir les articles</a></h6>
                            </label>
                        </div>
                    </div>
                </div>
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