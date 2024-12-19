<?php
session_start();

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
    // Vérifier si le login et mot de passe sont corrects
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Requête SQL (sans protection, pour des tests)
    $result = $conn->query("SELECT * FROM utilisateurs WHERE username = '$username' AND password = '$password'");

    if ($result->num_rows > 0) {
        // Connexion réussie
        $_SESSION['username'] = $username;  
        $userData = $result->fetch_assoc();
        setcookie("token", $userData['token'], time() + 3600, "/"); 
        if ($username === 'admin' && $userData['token'] == "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjEiLCJuYW1lIjoiYWRtaW4iLCJyb2xlIjoiYWRtaW4ifQ.yB-57BIUYqYLNfNO1NBAPGU7hE37SDlU_Djog5MGg4M") {
            header("Location: admin.php");
        } else {
            header("Location: index.php");
        }
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST">
        <label>Username: </label><input type="text" name="username" required><br>
        <label>Password: </label><input type="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
