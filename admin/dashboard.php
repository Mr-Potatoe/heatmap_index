<?php include '../php/admin_protect.php'; ?>
<?php include '../php/db.php'; ?>
<?php
$recent_activity_query = "SELECT * FROM logs ORDER BY timestamp DESC LIMIT 5";
$recent_activity_result = $conn->query($recent_activity_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">
    <?php include 'navbar.php'; ?>
    <header class="bg-blue-600 text-white p-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold">Dashboard</h1>
       

<!-- Quick Actions Dropdown -->
<div class="relative">
    <button id="quickActionsButton" class="flex items-center bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 focus:outline-none transition duration-200">
        Quick Actions
        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
    </button>
    <div id="quickActionsDropdown" class="absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-lg hidden z-20 transition duration-200 transform scale-95 origin-top-right">
        <ul class="py-1">
            <li>
                <a href="add_sensor.php" class="block px-4 py-2 text-gray-800 hover:bg-blue-100 transition duration-150">Add New Sensor</a>
            </li>
            <li>
                <a href="view_logs.php" class="block px-4 py-2 text-gray-800 hover:bg-blue-100 transition duration-150">View Logs</a>
            </li>
        </ul>
    </div>
</div>

    </header>

    <section class="max-w-6xl mx-auto p-6 bg-white rounded shadow-md mt-6">
        <h2 class="text-xl font-semibold">Heat Index Management</h2>
        <p class="text-gray-600">This is the admin panel where you can manage sensor data and view logs.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-6">
            <!-- Overview Cards -->
            <?php
            // Fetch total sensors
            $total_sensors_query = "SELECT COUNT(*) as total FROM Sensors";
            $total_result = $conn->query($total_sensors_query);
            $total_sensors = $total_result->fetch_assoc()['total'];

            // Fetch active sensors
            $active_sensors_query = "SELECT COUNT(*) as active FROM Sensors WHERE status = 'active'";
            $active_result = $conn->query($active_sensors_query);
            $active_sensors = $active_result->fetch_assoc()['active'];

            // Fetch recent heat index
            $recent_heat_index_query = "SELECT heat_index FROM heatindexdata ORDER BY timestamp DESC LIMIT 1";
            $heat_index_result = $conn->query($recent_heat_index_query);
            $recent_heat_index = $heat_index_result->num_rows > 0 ? $heat_index_result->fetch_assoc()['heat_index'] . '°F' : 'N/A';

            // Fetch alerts
            $alerts_query = "SELECT COUNT(*) as alerts FROM alerts WHERE resolved = 0";
            $alerts_result = $conn->query($alerts_query);
            $alerts_count = $alerts_result->fetch_assoc()['alerts'];
            ?>

            <div class="bg-blue-100 p-4 rounded shadow">
                <h3 class="font-bold text-lg">Total Sensors</h3>
                <p class="text-3xl font-bold"><?php echo $total_sensors; ?></p>
            </div>
            <div class="bg-green-100 p-4 rounded shadow">
                <h3 class="font-bold text-lg">Active Sensors</h3>
                <p class="text-3xl font-bold"><?php echo $active_sensors; ?></p>
            </div>
            <div class="bg-yellow-100 p-4 rounded shadow">
                <h3 class="font-bold text-lg">Recent Heat Index</h3>
                <p class="text-3xl font-bold"><?php echo $recent_heat_index; ?></p>
            </div>
            <div class="bg-red-100 p-4 rounded shadow">
                <h3 class="font-bold text-lg">Active Alerts</h3>
                <p class="text-3xl font-bold"><?php echo $alerts_count; ?></p>
            </div>
        </div>

        <!-- Heat Index Chart -->
        <div class="mt-8">
    <h3 class="font-bold text-lg">Heat Index Trends</h3>
    <div class="mt-4 space-x-2">
    <button id="hourlyButton" class="chart-button bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-200" onclick="updateChart('hourly', this)">Hourly</button>
    <button id="dailyButton" class="chart-button bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-200" onclick="updateChart('daily', this)">Daily</button>
    <button id="weeklyButton" class="chart-button bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-200" onclick="updateChart('weekly', this)">Weekly</button>
    <button id="monthlyButton" class="chart-button bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-200" onclick="updateChart('monthly', this)">Monthly</button>
    <button id="yearlyButton" class="chart-button bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-200" onclick="updateChart('yearly', this)">Yearly</button>
</div>



    <canvas id="heatIndexChart"></canvas>
</div>


        <!-- Recent Activity Log -->
        <div class="mt-8">
            <h3 class="font-bold text-lg">Recent Activity</h3>
            <ul class="bg-gray-100 p-4 rounded">
                <?php
                if ($recent_activity_result->num_rows > 0) {
                    while ($row = $recent_activity_result->fetch_assoc()) {
                        echo "<li>{$row['action']} - <em>{$row['timestamp']}</em></li>";
                    }
                } else {
                    echo "<li>No recent activity found.</li>";
                }
                ?>
            </ul>
            <a href="view_logs.php" class="mt-2 inline-block bg-blue-600 text-white p-2 rounded hover:bg-blue-700">View All Logs</a>
        </div>
    </section>

    <script>
        const ctx = document.getElementById('heatIndexChart').getContext('2d');
const heatIndexChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [], // Initial empty labels
        datasets: [{
            label: 'Heat Index',
            data: [], // Initial empty data
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
            fill: true
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

function updateChart(range, button) {
    // Fetch the new data for the selected range
    fetch(`../php/fetch_heat_index_data.php?range=${range}`)
        .then(response => response.json())
        .then(data => {
            const labels = data.map(point => point.timestamp);
            const heatIndexData = data.map(point => point.heat_index);

            heatIndexChart.data.labels = labels;
            heatIndexChart.data.datasets[0].data = heatIndexData;
            heatIndexChart.update();
        })
        .catch(error => console.error('Error fetching data:', error));

    // Update the active button
    document.querySelectorAll('.chart-button').forEach(btn => {
        btn.classList.remove('bg-blue-800', 'active'); // Remove active class from all buttons
        btn.classList.add('bg-blue-600'); // Reset non-active buttons' colors
    });

    // Set the clicked button as active
    button.classList.remove('bg-blue-600');
    button.classList.add('bg-blue-800', 'active'); // Make it darker to show it's active
}

// Show the hourly data and make the hourly button active by default
document.addEventListener('DOMContentLoaded', function() {
    updateChart('hourly', document.getElementById('hourlyButton'));
});

</script>


</body>
</html>
