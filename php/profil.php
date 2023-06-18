<?php
include('../classes/Database.php');
include('../classes/User.php');

session_start();

// error_reporting(0);

if (!empty($_SESSION['user'])) {
    $name = $_SESSION['user']; 
}

if (isset($_POST['modify'])) {
    // If the 2 entries are not empty: modify the users data in the database
    if (!empty($_POST['user_login']) && !empty($_POST['password'])) {
        $user_login = $_POST['user_login'];
        $password = $_POST['password'];
        $sql = "SELECT login, password FROM user WHERE login = '$user_login' AND password = ?";
        $query = "UPDATE user SET login = '$user_login', password = '$password' WHERE login = '$user_login'";
        

        // "Select password FROM user WHERE login = '$user_login'";

        // $db->query($query);
        // $query = $db->prepare($sql);
        // $query->execute(array($user_login, $password));
    }
    // If password is empty: modify the user login in the database
    elseif (!empty($_POST['user_login']) && empty($_POST['password'])) {
        // Méthode
        $database->modify_login();
    }
    // If the user login is empty: modify the password in the database
    elseif (empty($_POST['user_login']) && !empty($_POST['password'])) {
        // Méthode
    }
    else {
        echo "Aucune information à modifier.";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profil.css">
    <title>Profil</title>
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
        <h2><?php if ($_SESSION['user'] == true) {echo $name;} else {echo "Anonyme";} ?></h2>
    </header>
    <main>
        <h1>Bienvenue <?php if ($_SESSION['user'] == false) {echo "utilisateur Anonyme"; } else {echo $name;}?> !</h1>
        <form action="" method="post">
            <input type="text" placeholder="<?php if ($_SESSION['user'] == true) {echo $name;} else {echo "Nom d'utilisateur";} ?>" name="user_login">
            <input type="password" placeholder="Mot de passe" name="password">
            <input class="modify" type="submit" name="modify" value="Modifier">
        </form>
    </main>
</body>
</html>