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
    <title>Renty | Administrateur - Gestionnaire des galleries</title>
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
                    <h1>Listes des collages</h1>
                    <a href="<?php echo base_url('GestionGallerie/nouvelleGallerie'); ?>">Ajouter une nouvelle collage</a>
                    <?php 
                    foreach ($galleries as $gallerie) { 
                    ?>
                    <div class="small-container">
                        <div class="box">
                            <div class="info">
                                <img src="../media/gallerie/<?php echo $gallerie['gallerie_photo']; ?>" width="400px" height="250px">
                                <label>
                                <p>Usage recommandés : 
                                    <ul>
                                        <?php foreach (json_decode($gallerie['usage_recommande'], true) as $usage): ?>
                                            <li><?php echo $usage; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </p>
                                </label>

                                <label style="float: right; text-align: right;">    
                                    <a href="<?php echo base_url('GestionGallerie/supprimerGallerie?id_gallerie=' . $gallerie['id_gallerie']); ?>">Supprimer</a>
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