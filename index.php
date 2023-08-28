<?php

session_start();

error_reporting(0);

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
                <li><a href="php/profile.php">Profil</a></li>
                <li><a href="php/livre-or.php">Livre d'or</a></li>
                <?php if ($_SESSION['username']) {echo "<li><a href='./php/comments.php'>Commenter</a></li>";} else {echo '';} ?>
                <?php if ($_SESSION['username']) {echo '<a href="./php/logout.php" class="logout">Se déconnecter</a><br>';} else {echo "";}?>
            </ol>
        </nav>
    </header>
    <h1>Bienvenue <?php if (!$_SESSION['username']) {echo "utilisateur Anonyme"; } else {echo $_SESSION['username'];}?> !</h1>
</body>
</html>