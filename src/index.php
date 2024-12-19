<?php
// Connexion à la base de données
$host = 'mysql';
$user = 'root';
$password = 'root';
$dbname = 'ctf_db';
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contenu = $_POST['contenu'];

    // Insérer le commentaire dans la base de données
    $query = "INSERT INTO commentaires (contenu) VALUES ('$contenu')";
    $conn->query($query);
}

// Récupérer les commentaires
$result = $conn->query("SELECT * FROM commentaires");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaires</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Commentaires</h1>
        <form method="POST">
            <textarea name="contenu" placeholder="Votre commentaire ici..." required></textarea>
            <button type="submit">Envoyer</button>
        </form>

        <h2>Historique des commentaires :</h2>
        <div class="comment-box">
            <?php 
            // Afficher les commentaires avec XSS vulnérabilité
            while ($row = $result->fetch_assoc()): 
                // Utiliser echo() pour afficher le contenu malicieux injecté
                echo "<div class='comment'>" . $row['contenu'] . "</div>";
            endwhile;
            ?>
        </div>
    </div>
</body>
</html>
