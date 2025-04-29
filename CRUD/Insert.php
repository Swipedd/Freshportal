<?php
session_start();
require_once '../Datbase/lijst.php';

if (!isset($_SESSION['is_logged_in'])) {
    header('Location: Login.php');
    exit();
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naam = $_POST['naam'] ?? '';
    $omschrijving = $_POST['omschrijving'] ?? '';

    $lijst = new Lijst();
    $gelukt = $lijst->InsertList($naam, $omschrijving, $_SESSION['gebruikerid']);

    if ($gelukt) {
        header("Location: View.php?lijstid=" . $_SESSION['gebruikerid']);
        exit;
    } else {
        $message = "Er is iets misgegaan bij het toevoegen van de taak.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Taak Toevoegen</title>
    <link rel="stylesheet" href="../CSS/Insert.css">
</head>

<body>
    <h1>Taak Toevoegen</h1>
    <p><?= htmlspecialchars($message) ?></p>
    <form method="POST">
        <input type="text" name="naam" placeholder="Taak naam" required>
        <textarea name="omschrijving" placeholder="Taak omschrijving"></textarea>
        <input type="submit" value="Taak Toevoegen">
    </form>
</body>

</html>