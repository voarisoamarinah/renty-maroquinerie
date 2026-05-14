<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../media/logo/Renty.svg" type="image/x-icon">
    <title>Renty | Se connecter</title>
</head>
<body>
    <form action="<?php echo base_url('Authentification/authentification'); ?>" method="post">
        Email: <input type="email" name="email" id="email" required>
        Mot de passe: <input type="password" name="mdp" id="mdp" required>
        <input type="submit" value="Se connecter">
    </form>
    <a href="<?php echo base_url('Authentification/inscription'); ?>">S'inscrire</a>
</body>
</html>