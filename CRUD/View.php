<?php
session_start();
require "../Datbase/lijst.php";

if (!isset($_SESSION['gebruikerid'])) {
    header('Location: ../Authenticatie/Logout.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/View.css">
    <title>Product Overzicht</title>
</head>

<body>
    <h2>Lijst Overzicht</h2>
    <a href="../Home/Index.php">Home</a>
    <a href="Insert.php">Toevoegen</a>
    <a href="Update.php">Bewerken</a>
    <a href='../Authenticatie/Login.php'>Logout</a>

    <br><br>
    <form>
        <label for="prioriteit">Prioriteit:</label>
        <select name="prioriteit" id="prioriteit">
            <option value="0">Laag</option>
            <option value="1">Middel</option>
            <option value="2">Hoog</option>
        </select>
        <button type="submit">Filter</button>
    </form>
    <table>
        <tr>
            <th>id</th>
            <th>naam</th>
            <th>omschrijving</th>
            <th colspan="2">Actie</th>
        </tr>
        <?php
        $lijst = new Lijst();
        $lijsts = $lijst->SelectList($_SESSION['gebruikerid'], $_GET['prioriteit'] ?? null);

        if (is_array($lijsts) && count($lijsts) > 0) {
            foreach ($lijsts as $item) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($item['id']) . "</td>";
                echo "<td>" . htmlspecialchars($item['naam']) . "</td>";
                echo "<td>" . htmlspecialchars($item['omschrijving']) . "</td>";
                echo "<td><a class='btn btn-primary' href='Update.php?id=" . $item['id'] . "'>Edit</a></td>";
                echo "<td><a class='btn btn-danger' href='Delete.php?id=" . $item['id'] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Geen producten gevonden.</td></tr>";
        }
        ?>
    </table>
</body>

</html>