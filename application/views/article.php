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
                <h1>Collection : <?php echo $collection['nom_collection']; ?></h1>
                <a href="<?php echo base_url('GestionCollection/index'); ?>">Retour</a>
                <?php 
                foreach ($articles as $article) {
                ?>
                <div class="small-container">
                    <div class="box">
                        <div class="info">
                            <img src="../media/article/<?php echo $article['photo']; ?>">
                            <label>
                                <b><?php echo $article['nom_article']; ?></b>
                                <p><?php echo $article['description_article']; ?></p>
                                <ul>
                                    <?php $dimensions = json_decode($article['dimensions']); ?>
                                    <li><p>Largeur : <?php echo $dimensions->largeur; ?></p></li>
                                    <li><p>Hauteur : <?php echo $dimensions->hauteur; ?></p></li>
                                    <li><p>Profondeur : <?php echo $dimensions->profondeur; ?></p></li>
                                </ul>
                                <p>Matériaux :
                                <ul>
                                    <?php foreach (json_decode($article['matieres'], true) as $matiere): ?>
                                        <li><p><?php echo $matiere; ?></p></li>
                                    <?php endforeach; ?>
                                </ul>
                                </p>
                                <h6><?php echo $article['prix']; ?> MGA</h6>
                            </label>

                            <label style="float: right; text-align: right;">
                                <a href="<?php echo base_url('GestionArticle/supprimerArticle?id_article=' . $article['id_article'] . '&id_collection='. $collection['id_collection']); ?>">Supprimer</a>
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