<?php

// Database verbinding
$conn = mysqli_connect("localhost", "root", "", "rally");

if (!$conn) {
    die("Verbinding mislukt: " . mysqli_connect_error());
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $auto = $_POST['rallyauto'];
    $info = $_POST['info'];
    $img  = $_POST['afbeelding_url'];

    // Prepared statement
    $stmt = mysqli_prepare(
        $conn,
        "UPDATE info 
         SET rallyauto = ?, info = ?, afbeelding_url = ?
         WHERE rally_id = ?"
    );

    mysqli_stmt_bind_param($stmt, "sssi", $auto, $info, $img, $id);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    // Terug naar home pagina na opslaan
    header("Location: index.php");
    exit;
}

// Data ophalen van de auto
$stmt = mysqli_prepare($conn, "SELECT * FROM info WHERE rally_id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);
?>

<!DOCTYPE html>
<html lang="nl">

<head>
<meta charset="UTF-8">
<title>Bewerk Auto</title>
<link rel="stylesheet" href="../style/style.css">
</head>

<body>

<div class="container">

<h1>Bewerk Rally Auto</h1>

<form method="post" class="edit-form">

<label>Auto</label>
<input 
    type="text"
    name="rallyauto"
    value="<?= htmlspecialchars($data['rallyauto']) ?>"
    required
>

<label>Info</label>
<textarea 
    name="info"
    rows="5"
    required
><?= htmlspecialchars($data['info']) ?></textarea>

<label>Afbeelding URL</label>
<input 
    type="text"
    name="afbeelding_url"
    value="<?= htmlspecialchars($data['afbeelding_url']) ?>"
>

<div class="annuleren-button">
<button type="submit" class="btn btn-save">Opslaan</button>
<a href="index.php" class="btn btn-cancel">Annuleren</a>
</div>

</form>

</div>

</body>
</html>