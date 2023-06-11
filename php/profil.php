<?php
session_start();

error_reporting(0);

if (!empty($_SESSION['user'])) {
    $name = $_SESSION['user']; 
}

if (isset($_POST['modify'])) {
    if (!empty($_POST['user_login']) && !empty($_POST['password'])) {
        $user_login = $_POST['user_login'];
        $password = $_POST['password'];
        $query = "UPDATE user SET login = '$user_login', password = '$password' WHERE login = '$name' AND password = 'test'";
        $db->query($query);
        $query = $db->prepare($sql);
        $query->execute(array($user_login, $password));
        $row = $query->rowCount();
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
                <li><a href="commentaire.php">Commentaire</a></li>
                <?php if ($_SESSION['user'] == true && $_SESSION['user'] == 'admin') {echo '<li><a href="admin.php">Admin</a></li>';}?>
            </ol>
        </nav>
        <h2><?php if ($_SESSION['user'] == true) {echo $name;} else {echo "Anonyme";} ?></h2>
    </header>
    <main>
        <h1>Bienvenue <?php if ($_SESSION['user'] == false) {echo "utilisateur Anonyme"; } else {echo $name;}?> !</h1>
        <form action="" method="post">
            <input type="text" placeholder="Nom d'utilisateur" name="user_login" required>
            <input type="password" placeholder="Mot de passe" name="password" required>
            <input class="modify" type="submit" name="modify" value="Modifier">
        </form>
    </main>
</body>
</html>