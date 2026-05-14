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
    <title>Renty | Administrateur - Gestionnaire des membres</title>
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
                <h1>Détails de l'utilisateur</h1>
                <a href="<?php echo base_url('GestionMembre/index'); ?> ">Retour</a>
                <div class="small-container">
                    <div class="box">
                        <div class="info">
                            <img src="../media/utilisateur/<?php echo $utilisateur['photo']; ?>">
                            <label>
                                <b><?php echo $utilisateur['nom'].' '.$utilisateur['prenom']; ?></b>
                                <p><?php echo $utilisateur['email']; ?></p>
                                <p><?php echo $utilisateur['nom_genre']; ?></p>
                                <p><?php echo $utilisateur['contact']; ?></p>
                                <p><?php echo $utilisateur['nom_pays']; ?></p>
                                <h6><?php echo $utilisateur['date_crea']; ?></h6>
                            </label>

                            <label style="float: right; text-align: right;">
                                <a href="<?php echo base_url('GestionMembre/detailsMembre?id_utilisateur=' . $utilisateur['id_utilisateur']); ?>">Voir détails</a>
                                <a href="<?php echo base_url('GestionMembre/supprimerMembre?id_utilisateur=' . $utilisateur['id_utilisateur']); ?>">Supprimer</a>
                            </label>
                        </div>
                    </div>
                </div>
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