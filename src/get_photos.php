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


// Jaar ophalen uit URL
// intval voorkomt ongewenste input
$jaar = isset($_GET['jaar']) ? intval($_GET['jaar']) : 0;


// Haal alle afbeelding URL's op voor dit jaar
// Alleen niet-lege URLs
$stmt = mysqli_prepare(
    $conn,
    "SELECT afbeelding_url 
     FROM info 
     WHERE jaar = ? AND afbeelding_url != ''"
);

mysqli_stmt_bind_param($stmt, "i", $jaar);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$urls = [];
while ($row = mysqli_fetch_assoc($result)) {
    $urls[] = $row['afbeelding_url'];
}

// JSON output voor JS
header('Content-Type: application/json');
echo json_encode($urls);

// Sluit connectie
mysqli_close($conn);