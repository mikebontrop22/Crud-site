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


// Jaar ophalen uit URL (GET)
// intval voorkomt SQL-injection via deze parameter
$jaar = isset($_GET['jaar']) ? intval($_GET['jaar']) : 0;


// Haal alle rally auto gegevens op voor dit jaar
$stmt = mysqli_prepare(
    $conn,
    "SELECT rally_id, rallyauto, info, afbeelding_url 
     FROM info 
     WHERE jaar = ?"
);

mysqli_stmt_bind_param($stmt, "i", $jaar);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Rally Auto's - <?= htmlspecialchars($jaar) ?></title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>

<div class="container">

    <h1>Rally Auto's van <?= htmlspecialchars($jaar) ?></h1>

    <a href="index.php" class="back-link">← Terug</a>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="auto-card">

            <?php if (!empty($row['afbeelding_url'])): ?>
                <img src="<?= htmlspecialchars($row['afbeelding_url']) ?>" alt="<?= htmlspecialchars($row['rallyauto']) ?>">
            <?php endif; ?>

            <div class="auto-info">
                <h2><?= htmlspecialchars($row['rallyauto']) ?></h2>
                <p><?= htmlspecialchars($row['info']) ?></p>
            </div>

            <div class="card-actions">
                <a href="edit.php?id=<?= $row['rally_id'] ?>" class="edit-btn">Bewerk</a>
                <a 
                    href="delete.php?id=<?= $row['rally_id'] ?>" 
                    class="delete-btn"
                    onclick="return confirm('Weet je zeker dat je deze auto wilt verwijderen?');"
                >
                    Verwijder
                </a>
            </div>

        </div>
    <?php endwhile; ?>

</div>

<?php
mysqli_close($conn);
?>

</body>
</html>