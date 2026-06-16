<?php

// Database verbinding
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rally";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Verbinding mislukt: " . mysqli_connect_error());
}


// Formulier verwerken bij POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Form data ophalen
    $jaar = intval($_POST['jaar']); // integer
    $rallyauto = $_POST['rallyauto'];
    $info = $_POST['info'];
    $afbeelding = $_POST['afbeelding_url'];

    // Prepared statement voorkomt SQL-injection
    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO info (jaar, rallyauto, info, afbeelding_url)
         VALUES (?, ?, ?, ?)"
    );

    mysqli_stmt_bind_param($stmt, "isss", $jaar, $rallyauto, $info, $afbeelding);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuwe Rally Auto</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>

<div class="container">
    <h1>Nieuwe Rally Auto</h1>

    <!-- Formulier voor nieuwe auto -->
    <form method="post" class="edit-form">

        <label>Jaar</label>
        <input type="number" name="jaar" required>

        <label>Rally Auto</label>
        <input type="text" name="rallyauto" required>

        <label>Info</label>
        <textarea name="info" rows="5" required></textarea>

        <label>Afbeelding URL</label>
        <input type="text" name="afbeelding_url">

        <div class="annuleren-button">
            <button type="submit" class="btn btn-save">Opslaan</button>
            <a href="index.php" class="btn btn-cancel">Annuleren</a>
        </div>

    </form>
</div>

</body>
</html>