


<?php include '../php/admin_protect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'head.php'; ?> <!-- Include the head -->
</head>
<body>
<?php include 'navbar.php'; ?> <!-- Include the navbar -->
<header>
        <h1>Heat Index Map - Zamboanga del Sur Provincial Government College</h1>
    </header>
  
    <div id="map-container">
        <img id="base-map" src="../assets/map.png" alt="Campus Map">
        <canvas id="heatmap-overlay"></canvas>
    </div>
</body>
</html>
