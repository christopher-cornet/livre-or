<?php

session_start();

error_reporting(0);

include "../classes/User.php";

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/comments.css">
    <title>Envoyer un message</title>
</head>
<body>
    <?php include "../includes/header.php"; ?>
    <main>
        <!-- <h1>Bienvenue <?php if ($_SESSION['user'] == false) {echo "utilisateur Anonyme"; } else {echo $name;}?> !</h1> -->
        <form action="" method="post">
            <input type="text" placeholder="Commentaire" name="comment" required>
            <input class="send" type="submit" name="send" value="Valider">
            <?php
            // Comment validation
            if (isset($_POST['send'])) {
                // If the User is logged in, send the Comment
                if (!empty($_SESSION["username"])) {
                    $comment = $_POST['comment'];

                    // If the Comment is not empty, send the Comment. Else, throw a message error
                    if (!empty($comment)) {
                        $user = new User($_SESSION["email"]);
                        $user->addComment($comment, $_SESSION["username"]);
                    }
                    else {
                        echo "<b>Erreur.</b><br>Votre commentaire est vide.";
                    }
                }
            }
            ?>
        </form>
    </main>
</body>
</html>