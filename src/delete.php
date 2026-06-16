<?php

// Database verbinding
$conn = mysqli_connect("localhost", "root", "", "rally");

if (!$conn) {
    die("Verbinding mislukt: " . mysqli_connect_error());
}

// ID ophalen uit URL en omzetten naar integer
// intval voorkomt dat iemand rare strings probeert
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Check of er een geldig id is
if ($id > 0) {

    // Delete query met prepared statement
    $stmt = mysqli_prepare($conn, "DELETE FROM info WHERE rally_id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

header("Location: index.php");
exit;