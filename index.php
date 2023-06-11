<?php
session_start();

error_reporting(0);

if (!empty($_SESSION['user'])) {
    $name = $_SESSION['user'];
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Accueil</title>
</head>
<body>
    <header>
        <p><a href="https://github.com/christopher-cornet/livre-or" target="_blank" class="github">Github Repository</a></p>
        <nav>
            <ol>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="php/signin-login.php">Inscription - Connexion</a></li>
                <li><a href="php/profil.php">Profil</a></li>
                <li><a href="php/livre-or.php">Livre d'or</a></li>
                <li><a href="php/commentaire.php">Commentaire</a></li>
            </ol>
        </nav>
        <h2><?php if ($_SESSION['user'] == true) {echo $name;} else {echo "Anonyme";} ?></h2>
    </header>
    <h1>Bienvenue <?php if ($_SESSION['user'] == false) {echo "utilisateur Anonyme"; } else {echo $name;}?> !</h1>
</body>
</html>