<?php
require_once "../Datbase/gebruiker.php";


$melding = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naam = $_POST['naam'] ?? '';
    $achternaam = $_POST['achternaam'] ?? '';
    $email = $_POST['email'] ?? '';
    $wachtwoord = $_POST['wachtwoord'] ?? '';

    $gebruiker = new gebruiker();
    $gelukt = $gebruiker->Register($naam, $achternaam, $email, $wachtwoord);

    if ($gelukt) {
        $melding = "Account succesvol aangemaakt!";
        header("Location: Login.php");
        exit;
    } else {
        $melding = "Er is iets misgegaan bij het aanmaken van het account.";
    }
}
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Registreren</title>
    <link rel="stylesheet" href="../CSS/Register.css">
</head>

<body>
    <h1>Account aanmaken</h1>

    <?php if ($melding): ?>
        <p><?= htmlspecialchars($melding) ?></p>
    <?php endif; ?>

    <form method="POST">
        <label for="naam">Naam:</label>
        <input type="text" name="naam" placeholder="naam" value="<?= htmlspecialchars($_POST['naam'] ?? '') ?>" required>

        <label for="achternaam">Achternaam:</label>
        <input type="text" name="achternaam" placeholder="achternaam" value="<?= htmlspecialchars($_POST['achternaam'] ?? '') ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>

        <label for="wachtwoord">Wachtwoord:</label>
        <input type="password" name="wachtwoord" placeholder="wachtwoord" required>

        <input type="submit" value="Account aanmaken">
    </form>
</body>

</html>