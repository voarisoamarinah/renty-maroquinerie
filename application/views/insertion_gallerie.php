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
    <title>Renty | Administrateur - Gestionnaire de la gallerie d'inspiration</title>
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
                <form action="<?php echo base_url('GestionGallerie/insertGallerie'); ?>" method="post">
                    <label for="photo">Collage:
                        <input type="file" name="photo" id="photo" required>
                    </label><br>
                    <label for="id_article">Article:
                        <select name="id_article" id="id_article" required>
                            <?php foreach ($articles as $article): ?>
                                <option value="<?php echo $article['id_article']; ?>"><?php echo $article['nom_article']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label><br>
                    <label for="usage_recommande">Usage recommandés:
                        <input type="text" name="usage_recommande1" id="usage_recommande1" placeholder="Usage recommandé" required>
                        <input type="text" name="usage_recommande2" id="usage_recommande2" placeholder="Usage recommandé">
                        <input type="text" name="usage_recommande3" id="usage_recommande3" placeholder="Usage recommandé">
                        <input type="text" name="usage_recommande4" id="usage_recommande4" placeholder="Usage recommandé">
                        <input type="text" name="usage_recommande5" id="usage_recommande5" placeholder="Usage recommandé">
                    </label><br>
                    <input type="submit" value="Ajouter">
                </form>
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