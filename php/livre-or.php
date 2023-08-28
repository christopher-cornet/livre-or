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
    <link rel="stylesheet" href="../css/livre-or.css">
    <title>Livre d'or</title>
</head>
<body>
    <?php include "../includes/header.php"; ?>
    <main>
        <section>
            <?php
            $pdo = new PDO ("mysql:host=localhost; dbname=livreor", "root", "");
            
            $sql = "SELECT * FROM comments ORDER BY date DESC";

            $result = $pdo->query ($sql);

            while ($row = $result->fetch (PDO::FETCH_ASSOC)) {
                // Extraction des données de la ligne courante
                $id = $row ['id'];
                $comment = $row ['comment'];
                $username = $row ['username'];
                $date = $row ['date'];

                // Formatage de la date selon le format français
                $date = date ("d/m/Y à H:i:s", strtotime ($date));

                // Affichage des données dans un article
                echo "<article>";
                echo "Posté le $date par ";
                // Si le nom d'utilisateur est vide, on affiche "utilisateur anonyme"
                if (empty ($username)) {
                    echo "utilisateur anonyme";
                } else {
                    echo "<p>$username</p>";
                }
                echo "<br>";
                echo "<br>";
                echo $comment;
                echo "</article>";
            }
            ?>
        </section>
        <!-- Fetch dynamically the Comments of the Database -->
    </main>
</body>
</html>