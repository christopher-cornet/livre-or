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
    <link rel="stylesheet" href="../css/commentaire.css">
    <title>Commentaires</title>
</head>
<body>
    <?php include "../includes/header.php"; ?>
    <main>
        <?php
        // Comment validation
        if (isset($_POST['send'])) {
            $comment = $_POST['comment'];

            $user = new User($_SESSION["email"]);
            $user->addComment($comment, $_SESSION["username"]);
            
            // Verify if the User can Log In
            if (!empty($_SESSION["email"]) && !empty($_SESSION["username"])) {
                header("location: ../index.php");
            }
            elseif (empty($_SESSION["email"]) && empty($_SESSION["username"])) {
                echo "<br> <b>La connexion a échoué. <br> Veuillez vérifier votre email et votre mot de passe.</b>";
            }
        }
        ?>
        <!-- <h1>Bienvenue <?php if ($_SESSION['user'] == false) {echo "utilisateur Anonyme"; } else {echo $name;}?> !</h1> -->
        <form action="" method="post">
            <input type="text" placeholder="Commentaire" name="comment" required>
            <input class="send" type="submit" name="send" value="Valider">
        </form>
    </main>
</body>
</html>