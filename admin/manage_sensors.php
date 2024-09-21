<?php include '../php/admin_protect.php'; ?>
<?php include '../php/db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'; ?> <!-- Include the head -->
    <script>
        function toggleForm() {
            const form = document.getElementById('add-sensor-form');
            form.classList.toggle('hidden');
        }
    </script>
</head>
<body class="bg-gray-100">
<?php include 'navbar.php'; ?> <!-- Include the navbar -->
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <header class="bg-blue-600 text-white p-4">
        <h1 class="text-xl font-bold text-center">Manage Sensors</h1>
    </header>



    <section class="bg-white p-4 md:p-6 max-w-6xl mx-auto w-full mt-6">
        <button onclick="toggleForm()" class="bg-blue-600 text-white p-2 rounded hover:bg-blue-700">
            Add New Sensor
        </button>

        <div id="add-sensor-form" class="hidden mt-4">
            <h2 class="text-2xl font-semibold mb-4">Add New Sensor</h2>
            <form action="../php/add_sensor.php" method="POST" class="space-y-4">
                <div>
                    <label for="sensor_name" class="block text-sm font-medium text-gray-700">Sensor Name:</label>
                    <input type="text" id="sensor_name" name="sensor_name" required class="mt-1 p-2 border border-gray-300 rounded w-full" />
                </div>
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700">Location:</label>
                    <input type="text" id="location" name="location" required class="mt-1 p-2 border border-gray-300 rounded w-full" />
                </div>
                <div>
                    <label for="latitude" class="block text-sm font-medium text-gray-700">Latitude:</label>
                    <input type="text" id="latitude" name="latitude" required class="mt-1 p-2 border border-gray-300 rounded w-full" />
                </div>
                <div>
                    <label for="longitude" class="block text-sm font-medium text-gray-700">Longitude:</label>
                    <input type="text" id="longitude" name="longitude" required class="mt-1 p-2 border border-gray-300 rounded w-full" />
                </div>
                <button type="submit" class="mt-4 bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Add Sensor</button>
            </form>
        </div>

        <h2 class="text-2xl font-semibold mt-8">Current Sensors</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 mt-4 rounded">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border">Sensor ID</th>
                        <th class="py-2 px-4 border">Sensor Name</th>
                        <th class="py-2 px-4 border">Location</th>
                        <th class="py-2 px-4 border">Latitude</th>
                        <th class="py-2 px-4 border">Longitude</th>
                        <th class="py-2 px-4 border">Status</th>
                        <th class="py-2 px-4 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM sensors";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr class='bg-white hover:bg-gray-100 transition-colors duration-200'>";
                            echo "<td class='py-2 px-4 border'>" . $row['sensor_id'] . "</td>";
                            echo "<td class='py-2 px-4 border'>" . $row['sensor_name'] . "</td>";
                            echo "<td class='py-2 px-4 border'>" . $row['location'] . "</td>";
                            echo "<td class='py-2 px-4 border'>" . $row['latitude'] . "</td>";
                            echo "<td class='py-2 px-4 border'>" . $row['longitude'] . "</td>";
                            echo "<td class='py-2 px-4 border'>" . $row['status'] . "</td>";
                            echo "<td class='py-2 px-4 border flex space-x-2'>
                                    <a href='edit_sensor.php?id=" . $row['sensor_id'] . "' class='bg-blue-600 text-white py-1 px-3 rounded hover:bg-blue-700 transition'>Edit</a>
                                     <button onclick='confirmDelete(" . $row['sensor_id'] . ")' class='bg-red-600 text-white py-1 px-3 rounded hover:bg-red-700 transition'>Delete</button>
                                 </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='py-2 px-4 border text-center'>No sensors found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    </main>
</body>
</html>
