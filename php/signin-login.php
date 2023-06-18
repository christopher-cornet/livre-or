<?php
session_start();

error_reporting(0);

// if (!empty($_SESSION['user'])) {
//     $name = $_SESSION['user']; 
// }

$db = new PDO ('mysql:host=localhost; dbname=livreor', 'root', '');

if (isset($_POST['register'])) {
    if (!empty($_POST['user_login']) && !empty($_POST['password']) && !empty($_POST['confirmpassword'])) {
        $user_login = $_POST['user_login'];
        $password = $_POST['password'];
        $query = "INSERT INTO user (id, login, password) VALUES ('', '$user_login', '$password')";
        $db->query($query);
    }
}

if (isset($_POST['login'])) {
    if (!empty($_POST['loginform-user_login']) && !empty($_POST['loginform-password'])) {
        $user_login = $_POST['loginform-user_login'];
        $password = $_POST['loginform-password'];
        $sql = "SELECT * FROM user WHERE login=? AND password=? ";
        $query = $db->prepare($sql);
        $query->execute(array($user_login, $password));
        $row = $query->rowCount();
        if($row > 0) {
            $_SESSION['user'] = $user_login;
            header("location: ../index.php");
        }
        else {
            echo "User can't login";
        }
    }
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
            <input type="password" placeholder="Mot de passe*" name="password" required>
            <input type="password" placeholder="Confirmation mot de passe*" name="confirmpassword" required>
            <input class="register" type="submit" name="register" value="S'inscrire">
        </form>
        <form action="" method="post" class="login-form">
            <h1>Connexion</h1>
            <input type="text" placeholder="Nom d'utilisateur" name="loginform-user_login" required>
            <input type="password" placeholder="Mot de passe" name="loginform-password" required>
            <input class="login" type="submit" name="login" value="Se connecter">
        </form>
    </main>
</body>
</html>