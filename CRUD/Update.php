<?php
require "../Datbase/lijst.php";
$lijst = new Lijst();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($lijst->UpdateList($_GET['id'], $_POST['naam'], $_POST['omschrijving'])) {
        header('location:View.php');
    } else {
        echo "Sorry, het bestand is niet geüpload. Probeer het opnieuw!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Insert.css">
    <title>Document</title>
</head>

<body>
    <h2>Product editen</h2>
    <form action="" method="POST">
        <input type="text" name="naam" placeholder="naam">
        <input type="text" name="omschrijving" placeholder="omschrijving">
        <input type="submit" value="Bewerk taak" name="submit" />
    </form>
    <div class="uitloggen">
        <a class="btn btn-danger" href="uitloggen.php">Uitloggen</a>
    </div>
</body>

</html>