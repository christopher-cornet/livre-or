<?php

include "../classes/User.php";

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signin-login.css">
    <title>Inscription - Connexion</title>
</head>
<body>
    <?php include "../includes/header.php"; ?>
    <main>
        <form action="" method="post">
            <h1>Inscription</h1>
            <input type="text" placeholder="Nom d'utilisateur*" name="user_login" required>
            <input type="text" placeholder="Email*" name="email" required>
            <input type="password" placeholder="Mot de passe*" name="password" required>
            <input type="password" placeholder="Confirmation mot de passe*" name="confirmpassword" required>
            <input class="register" type="submit" name="submit" value="S'inscrire">
            <?php
            // Registration validation
            if (isset($_POST['submit'])) {
                $user_login = $_POST['user_login'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $confirmpwd = $_POST['confirmpassword'];

                // If the password is the same in the two inputs Register the User
                if ($password === $confirmpwd) {
                    $user = new User($email);
                    $user->register($user_login, $password);
                    echo "<br><b>Vous êtes inscrit.</b>";
                }
                elseif ($password !== $confirmpwd) {
                    echo "<br>Veuillez vérifier votre mot de passe.";
                }
            }
            ?>
        </form>
        <form action="" method="post" class="login-form">
            <h1>Connexion</h1>
            <input type="text" placeholder="Email" name="loginform-email" required>
            <input type="password" placeholder="Mot de passe" name="loginform-password" required>
            <input class="login" type="submit" name="login" value="Se connecter">
            <br>
            <?php
            // Login validation
            if (isset($_POST['login'])) {
                $email = $_POST['loginform-email'];
                $password = $_POST['loginform-password'];

                $user = new User($email);
                $user->connect($password);
                
                // Verify if the User can Log In
                if (!empty($_SESSION["email"]) && !empty($_SESSION["username"])) {
                    header("location: ../index.php");
                }
                elseif (empty($_SESSION["email"]) && empty($_SESSION["username"])) {
                    echo "<br> <b>La connexion a échoué. <br> Veuillez vérifier votre email et votre mot de passe.</b>";
                }
            }
            ?>
        </form>
    </main>
</body>
</html>