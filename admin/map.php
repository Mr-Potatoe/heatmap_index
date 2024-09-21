


<?php include '../php/admin_protect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'head.php'; ?> <!-- Include the head -->
</head>
<body>
<?php include 'navbar.php'; ?> <!-- Include the navbar -->

    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <header class="bg-blue-600 text-white p-4">
        <h1 class="text-2xl font-bold text-center">Zamboanga del Sur Provincial Government College Campus Map</h1>
    </header>
    <div id="map-container">
        <img id="base-map" src="../assets/map.png" alt="Campus Map">
        <canvas id="heatmap-overlay"></canvas>
    </div>
    </main>
</body>
</html>
