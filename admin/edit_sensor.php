<?php include '../php/admin_protect.php'; ?>
<?php include '../php/db.php'; ?>

<?php
if (isset($_GET['id'])) {
    $sensor_id = $_GET['id'];
    $sql = "SELECT * FROM Sensors WHERE sensor_id = $sensor_id";
    $result = $conn->query($sql);
    $sensor = $result->fetch_assoc();
} else {
    header('Location: manage_sensors.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'; ?> <!-- Include the head -->
</head>
<body class="flex bg-gray-100">
    <?php include 'navbar.php'; ?> <!-- Include the navbar -->

    <main id="main-content" class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 transition-all duration-300 ease-in-out">

    <header class="bg-blue-600 text-white p-4">
        <h1 class="text-xl font-bold text-center">Edit Sensor</h1>
    </header>

    <section class="bg-white p-4 md:p-6 max-w-6xl mx-auto w-full mt-6">
        <h2 class="text-2xl font-semibold mb-4">Update Sensor Information</h2>
        <form action="../php/update_sensor.php" method="POST" class="space-y-4">
            <input type="hidden" name="sensor_id" value="<?php echo $sensor['sensor_id']; ?>">
            
            <div>
                <label for="sensor_name" class="block text-sm font-medium text-gray-700">Sensor Name:</label>
                <input type="text" id="sensor_name" name="sensor_name" value="<?php echo $sensor['sensor_name']; ?>" required class="mt-1 p-2 border border-gray-300 rounded w-full" />
            </div>
            <div>
                <label for="location" class="block text-sm font-medium text-gray-700">Location:</label>
                <input type="text" id="location" name="location" value="<?php echo $sensor['location']; ?>" required class="mt-1 p-2 border border-gray-300 rounded w-full" />
            </div>
            <div>
                <label for="latitude" class="block text-sm font-medium text-gray-700">Latitude:</label>
                <input type="text" id="latitude" name="latitude" value="<?php echo $sensor['latitude']; ?>" required class="mt-1 p-2 border border-gray-300 rounded w-full" />
            </div>
            <div>
                <label for="longitude" class="block text-sm font-medium text-gray-700">Longitude:</label>
                <input type="text" id="longitude" name="longitude" value="<?php echo $sensor['longitude']; ?>" required class="mt-1 p-2 border border-gray-300 rounded w-full" />
            </div>

            <div class="flex mt-4">
                <button type="submit" class="bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Update Sensor</button>
                <button type="button" onclick="window.location.href='manage_sensors.php';" class="bg-gray-400 text-white p-2 ml-2 rounded hover:bg-gray-500">Cancel</button>
            </div>
        </form>
    </section>

    </main>
</body>
</html>
