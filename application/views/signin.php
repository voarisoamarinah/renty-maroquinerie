<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../media/logo/Renty.svg" type="image/x-icon">
    <title>Renty | Inscription</title>
</head>
<body>
    <?php 
    if (isset($infos)) {
    ?>
    <form action="<?php echo base_url('Authentification/insertion'); ?>" method="post">
        <h3>Créer un compte</h3>
        <label for="nom">Nom :
            <input type="text" name="nom" id="nom" value="<?php echo $infos['nom'];?>" required>
        </label><br><br>
        <label for="prenom">Prénom :
            <input type="text" name="prenom" id="prenom" value="<?php echo $infos['prenom'];?>" required>
        </label><br><br>
        <label for="email">Email :
            <input type="email" name="email" id="email" value="<?php echo $infos['email'];?>" required>
        </label><br><br>
        <label for="genre">
            <?php 
            foreach ($genre as $g) {
                if ($g['id_genre'] == $infos['id_genre']) {
            ?>
                <input type="radio" name="genre" id="genre" value="<?php echo $g['id_genre'];?>" checked><?php echo $g['nom_genre'];?>
            <?php } else { ?>
                <input type="radio" name="genre" id="genre" value="<?php echo $g['id_genre'];?>"><?php echo $g['nom_genre'];?>
            <?php  
                }
            }
            ?>
        </label><br><br>
        <label for="location">Pays :
            <select name="location" id="location" required>
            <?php 
            foreach ($pays as $p) {
                if ($p['id_pays'] == $infos['id_pays']) {
            ?>
                <option value="<?php echo $p['id_pays'];?>" selected><?php echo $p['nom_pays'];?></option>
            <?php } else { ?>
                <option value="<?php echo $p['id_pays'];?>"><?php echo $p['nom_pays'];?></option>
            <?php 
                }
            }
            ?>
            </select>
        </label><br><br>
        <label for="photo">Photo :
            <input type="file" name="photo" id="photo" required>
        </label><br><br>
        <label for="mdp">Mot de passe <br>
            <p style="color: red;">Veuilez vérifier votre mot de passe</p>
            Créer un mot de passe :<input type="text" name="mdp1" id="mdp1" value="<?php echo $infos['mot_de_passe'];?>" required><br>
            Confirmer votre mot de passe :<input type="text" name="mdp2" id="mdp2" required>
        </label><br><br>
        <label for="numtel">Numero de télephone :
            <input type="tel" name="numtel" id="numtel" value="<?php echo $infos['contact'];?>" required>
        </label><br><br>
        <input type="submit" value="S'inscrire">
    </form><br>
    <?php 
    } else {
    ?>
    <form action="<?php echo base_url('Authentification/insertion'); ?>" method="post">
        <h3>Créer un compte</h3>
        <label for="nom">Nom :
            <input type="text" name="nom" id="nom" required>
        </label><br><br>
        <label for="prenom">Prénom :
            <input type="text" name="prenom" id="prenom" required>
        </label><br><br>
        <label for="email">Email :
            <input type="email" name="email" id="email" required>
        </label><br><br>
        <label for="genre">
            <?php 
            foreach ($genre as $g) {
            ?>
            <input type="radio" name="genre" id="genre" value="<?php echo $g['id_genre'];?>" required><?php echo $g['nom_genre'];?>
            <?php 
            }
            ?>
        </label><br><br>
        <label for="location">Pays :
            <select name="location" id="location" required>
            <?php 
            foreach ($pays as $p) {
            ?>
                <option value="<?php echo $p['id_pays'];?>"><?php echo $p['nom_pays'];?></option>
            <?php 
            }
            ?>
            </select>
        </label><br><br>
        <label for="photo">Photo :
            <input type="file" name="photo" id="photo">
        </label><br><br>
        <label for="mdp">Mot de passe <br>
            Créer un mot de passe :<input type="text" name="mdp1" id="mdp1" required><br>
            Confirmer votre mot de passe :<input type="text" name="mdp2" id="mdp2" required>
        </label><br><br>
        <label for="numtel">Numero télephone :
            <input type="tel" name="numtel" id="numtel" required>
        </label><br><br>
        <input type="submit" value="S'inscrire">
    </form><br>
    <?php 
    }
    ?>
    <div class="">
        <a href="<?php echo base_url('Authentification/index'); ?>">Se connecter</a>
    </div>
</body>
</html>