<?php
session_start();

if (!isset($_SESSION['username']) || !isset($_COOKIE['token'])) {
    header("Location: login.php");
    exit();
}


$flag = "FLAG{ST3AL_Th3_T0k3N}";
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin</title>
</head>
<body>
    <h1>Page Admin</h1>
    <h2>Voici le flag : <?php echo $flag; ?></h2>
</body>
</html>
