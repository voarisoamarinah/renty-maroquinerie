<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/appa.css">
    <link rel="stylesheet" href="../assets/css/colors.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/fontawesome.min.css">
    <script src="../assets/js/app.js" defer></script>
    <link rel="shortcut icon" href="../media/logo/Renty.svg" type="image/x-icon">
    <title>Renty | Résultat du recherche</title>
</head>
<body>
    <!-- <a href="<?php //echo base_url('Authentification/index'); ?>">Se connecter</a><br> -->
    <!-- <a href="<?php //echo base_url('Authentification/deconnexion'); ?>">Se déconnecter</a> -->
    <div class="container">
        <nav>
            <form action="<?php echo base_url('Frontoffice/recherche'); ?>" method="get">
                <a href="<?php echo base_url('Frontoffice/index'); ?>">Acceuil</a>
                <a href="#">Gallerie</a>
                <label>
                    <input type="search" name="recherche" id="recherche" placeholder="Recherchez">
                    <button type="submit" name="search-btn" id="search-btn"><i class="fas fa-search"></i></button>
                </label>
            </form>

            <div class="logo">
                <img src="../media/logo/Renty.svg" alt="LOGORenty">
            </div>

            <div class="nav-icons">
                <a href="panier.html"><i class="fas fa-bag-shopping"></i></a>
                <a href="favori.html"><i class="fas fa-star"></i></a>
                <a href="compte.html"><i class="fas fa-user"></i></a>
                <i class="fas fa-bars" id="menu-btn"></i>
            </div>
            <div class="nav-wrapper">
                <a href="#vogue">Collection <i class="fas fa-arrow-right"></i></a>
                <a href="#">Board <i class="fas fa-arrow-right"></i></a>
                <a href="#">Guide d'entretien <i class="fas fa-arrow-right"></i></a>
            </div>
        </nav>

        <div class="vogue" id="vogue">
            <h1 class="titre">Résultat du recherche</h1>
            <?php 
            if ($collections != null) { 
            ?>
                <?php 
                foreach ($collections as $collection) { 
                ?>
                <form class="vogue-box" method="post">
                    <img src="../media/collection/<?php echo $collection['photo']; ?>" style="width: 100%;height:100%;object-fit:cover;">
                    <div class="icons">
                        <button type="submit" name="add-fav"><i class="fas fa-star"></i></button>
                        <button type="submit" name="add-cart"><i class="fas fa-bag-shopping"></i></button>
                    </div>
                    <a href="<?php echo base_url('Frontoffice/articlesParCollection?id_collection='.$collection['id_collection']); ?>">Voir la collection <i class="fas fa-eye"></i></a>
                </form>
            <?php  
                }
            }
            ?>
        </div>

        <!-- <div class="recommandations"> -->
            <?php 
            if ($articles != null) { 
            ?>
            <h3 class="titre">Article(s)</h3>
                <?php 
                foreach ($articles as $article) { 
                ?>
                <form class="vogue-box" method="post" style="width: 500px;height:700px;object-fit:cover;">
                    <img src="../media/article/poster/<?php echo $article['photo']; ?>" style="width: 100%;height:100%;object-fit:cover;">
                    <div class="icons">
                        <button type="submit" name="add-fav"><i class="fas fa-star"></i></button>
                        <button type="submit" name="add-cart"><i class="fas fa-bag-shopping"></i></button>
                    </div>
                    <a href="<?php echo base_url('Frontoffice/catalogue?id_article='.$article['id_article']); ?>">Détails <i class="fas fa-eye"></i></a>
                </form>
            <?php  
                }
            }
            ?>
        <!-- </div> -->

        <!-- FOOTER  -->
        <footer>
            <label>
                <h1>Contact</h1>
                <p><i class="fab fa-instagram"></i>renty.mg</p>
                <p><i class="fab fa-whatsapp"></i>+020 22 256 65</p>
                <p><i class="fab fa-facebook"></i>Renty Maroquinerie</p>
            </label>
            <label>
                <h1>Links</h1>
                <p style="color: grey;"><a href="<?php echo base_url('Authentification/index'); ?>" style="color: grey;">Contact us</a></p>
                <p style="color: grey;"><a href="#" style="color: grey;">About us</a></p>
                <p style="color: grey;"><a href="#" style="color: grey;">Term of use</a></p>
            </label>
            <label>
                <br><h1 style="color: grey;">&copy; Renty 2026</h1>
            </label>
        </footer>
    </div>
</body>
</html>