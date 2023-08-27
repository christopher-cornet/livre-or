<?php

session_start();

error_reporting(0);

?>

<header>
    <p><a href="https://github.com/christopher-cornet/livre-or" target="_blank" class="github">Github Repository</a></p>
    <nav>
        <ol>
            <li><a href="../index.php">Accueil</a></li>
            <li><a href="signin-login.php">Inscription - Connexion</a></li>
            <li><a href="profile.php">Profil</a></li>
            <li><a href="livre-or.php">Livre d'or</a></li>
            <?php if ($_SESSION['username']) {echo "<li><a href='comments.php'>Commenter</a></li>";} else {echo '';} ?>
        </ol>
    </nav>
</header>