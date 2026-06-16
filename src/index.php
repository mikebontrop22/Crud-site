<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rally";

// Maak verbinding met MySQL
$conn = mysqli_connect($servername, $username, $password, $dbname);

// controle of verbinding gelukt is
if (!$conn) {
    die("Verbinding mislukt: " . mysqli_connect_error());
}

// Alle rally jaren ophalen
$stmt = mysqli_prepare($conn, "SELECT DISTINCT jaar FROM info ORDER BY jaar ASC");
mysqli_stmt_execute($stmt);

// Resultaat ophalen
$jaarResult = mysqli_stmt_get_result($stmt);

// Array voor de jaren
$jaarArray = [];

while ($row = mysqli_fetch_assoc($jaarResult)) {
    $jaarArray[] = $row['jaar'];
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Rally Auto's</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>

<!-- Navigatiebalk -->
<nav class="navbar">
    <div class="nav-inner">
        <a href="index.php" class="nav-logo">Rally</a>

        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="create.php">Create</a>
        </div>
    </div>
</nav>


<!-- Hoofdcontainer -->
<div class="container index-layout">

    <!-- Lijst met jaartallen -->
    <ul class="jaartallen">

        <?php foreach ($jaarArray as $jaar): ?>

            <li>
                <a 
                    href="details.php?jaar=<?= htmlspecialchars($jaar) ?>"
                    class="jaar-link"
                    data-jaar="<?= htmlspecialchars($jaar) ?>"
                >
                    <?= htmlspecialchars($jaar) ?>
                </a>
            </li>

        <?php endforeach; ?>

    </ul>


    <!-- preview foto's -->
    <div class="preview-area" id="preview-area">
        <span style="color: #888;">
            Hover over een jaar om de foto's te zien
        </span>
    </div>

</div>


<script>

// Preview container
const previewArea = document.getElementById('preview-area');

let interval;
let currentIndex = 0;


// Voor elke jaar een hover event
document.querySelectorAll('.jaar-link').forEach(link => {

    // Wanneer je met je muis op een jaar gaat
    link.addEventListener('mouseenter', async () => {

        const jaar = link.dataset.jaar;

        // Haal foto's op
        const response = await fetch(`get_photos.php?jaar=${jaar}`);
        const data = await response.json();

        // Geen foto's gevonden
        if (!data.length) {
            previewArea.innerHTML =
                '<span style="color:#888;">Geen foto\'s gevonden voor dit jaar</span>';
            return;
        }

        // Preview area leeg maken
        previewArea.innerHTML = '';

        // Images toevoegen aan preview
        data.forEach((url, i) => {

            const img = document.createElement('img');
            img.src = url;

            // Eerste afbeelding zichtbaar maken
            if (i === 0) img.classList.add('active');

            previewArea.appendChild(img);
        });

        const images = previewArea.querySelectorAll('img');

        currentIndex = 0;

        clearInterval(interval);

        // Elke 2 seconden volgende afbeelding
        interval = setInterval(() => {

            images[currentIndex].classList.remove('active');

            currentIndex = (currentIndex + 1) % images.length;

            images[currentIndex].classList.add('active');

        }, 2000);

    });


    // Wanneer muis weg gaat
    link.addEventListener('mouseleave', () => {

        clearInterval(interval);

        previewArea.innerHTML =
            '<span style="color: #888;">Hover over een jaar om de foto\'s te zien</span>';

    });

});

</script>

</body>
</html>