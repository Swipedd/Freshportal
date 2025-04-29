<?php
require_once "../Datbase/gebruiker.php";
session_start();
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $gebruiker = new Gebruiker();
        $data = $gebruiker->Login($_POST['email'], $_POST['wachtwoord']);

        if ($data) {
            $_SESSION['is_logged_in'] = true;
            $_SESSION['naam'] = $data['naam'];
            $_SESSION['achternaam'] = $data['achternaam'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['gebruikerid'] = $data['id'];
            header('Location: ../Home/Index.php');
            exit();
        } else {
            $message = "Verkeerde email of wachtwoord.";
        }
    } catch (Exception $e) {
        $message = "Error: " . htmlspecialchars($e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Login.css">
    <title>Document</title>
</head>

<body>
    <h1>Inloggen</h1>
    <form method="POST">
        <input type="email" name="email" placeholder="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
        <input type="password" name="wachtwoord" placeholder="wachtwoord" required>
        <input type="submit" name="submit" value="Inloggen">
    </form>
    <p>Geen account? <a href="Register.php">Registreer hier</a></p>
</body>

</html>