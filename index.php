<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heat Index Map</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Heat Index Map - Zamboanga del Sur Provincial Government College</h1>
    </header>
    <nav>
        <ul>
            <li><a href="users/dashboard.php">Dashboard</a></li>
            <li><a href="../index.php">Map View</a></li>
            <li><a href="users/history.php">View Heat Index History</a></li>
        </ul>
    </nav>
    <div id="map-container">
        <img id="base-map" src="assets/map.png" alt="Campus Map">
        <canvas id="heatmap-overlay"></canvas>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
