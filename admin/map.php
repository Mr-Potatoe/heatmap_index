


<?php include '../php/admin_protect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'head.php'; ?> <!-- Include the head -->
</head>
<body>
    <!-- ======= Header ======= -->
    <?php include 'header.php'; ?>

      <!-- ======= Sidebar ======= -->
      <?php include 'sidebar.php'; ?>


    <main id="main" class="main">
        <header class="bg-primary text-white p-4">
            <h1 class="text-2xl font-bold text-center">Zamboanga del Sur Provincial Government College Campus Map</h1>
        </header>
        
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="position-relative">
                        <img id="base-map" class="img-fluid rounded" src="../assets/zdspgc_map.png" alt="Campus Map">
                        <canvas id="heatmap-overlay" class="position-absolute top-0 start-0 w-100 h-100"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- footer and scroll to top -->
    <?php include 'footer.php'; ?>
    <!-- include scripts -->
    <?php include 'scripts.php'; ?>
</body>
</html>
