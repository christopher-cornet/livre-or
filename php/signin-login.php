<?php

include "../classes/User.php";

session_start();

// Registration validation
if (isset($_POST['submit'])) {
    $user_login = $_POST['user_login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpwd = $_POST['confirmpassword'];

    $user = new User($email);
    $user->register($user_login, $password);

    header("location: ../index.php");
}

// Login validation
if (isset($_POST['login'])) {
    $email = $_POST['loginform-email'];
    $password = $_POST['loginform-password'];

    $user = new User($email);
    $user->connect($password);

    header("location: ../index.php");
    echo "réussi !";
}

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
    <header>
        <p><a href="https://github.com/christopher-cornet/livre-or" target="_blank" class="github">Github Repository</a></p>
        <nav>
            <ol>
                <li><a href="../index.php">Accueil</a></li>
                <li><a href="signin-login.php">Inscription - Connexion</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="livre-or.php">Livre d'or</a></li>
            </ol>
        </nav>
    </header>
    <main>
        <!-- <h1>Bienvenue <?php //if ($_SESSION['user'] == false) {echo "utilisateur Anonyme"; } else {echo $name;}?> !</h1> -->
        <form action="" method="post">
            <h1>Inscription</h1>
            <input type="text" placeholder="Nom d'utilisateur*" name="user_login" required>
            <input type="text" placeholder="Email*" name="email" required>
            <input type="password" placeholder="Mot de passe*" name="password" required>
            <input type="password" placeholder="Confirmation mot de passe*" name="confirmpassword" required>
            <input class="register" type="submit" name="submit" value="S'inscrire">
        </form>
        <form action="" method="post" class="login-form">
            <h1>Connexion</h1>
            <input type="text" placeholder="Email" name="loginform-email" required>
            <input type="password" placeholder="Mot de passe" name="loginform-password" required>
            <input class="login" type="submit" name="login" value="Se connecter">
        </form>
    </main>
</body>
</html>