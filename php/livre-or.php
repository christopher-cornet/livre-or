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
    <link rel="stylesheet" href="../css/livre-or.css">
    <title>Livre d'or</title>
</head>
<body>
    <?php include "../includes/header.php"; ?>
    <main>
        <h1>Bienvenue <?php if (!$_SESSION['username']) {echo "utilisateur Anonyme"; } else {echo $_SESSION['username'];}?> !</h1>
        <section>
            <article>
                Posté le jour/mois/année par <?php if (!$_SESSION['username']) {echo "utilisateur Anonyme"; } else {echo $_SESSION['username'];}?>
                <br>
                Message
            </article>
            <article>
                Posté le jour/mois/année par <?php if (!$_SESSION['username']) {echo "utilisateur Anonyme"; } else {echo $_SESSION['username'];}?>
                <br>
                Message
            </article>
            <article>
                Posté le jour/mois/année par <?php if (!$_SESSION['username']) {echo "utilisateur Anonyme"; } else {echo $_SESSION['username'];}?>
                <br>
                Message
            </article>
        </section>
    </main>
</body>
</html>