<?php
include '../php/admin_protect.php';
include '../php/db.php'; // Include your DB connection script

// Function to determine heat index category based on PAGASA standards
function getHeatIndexCategory($heat_index) {
    if ($heat_index < 26) {
        return 'No Danger (Below 26°C)';
    } elseif ($heat_index < 33) {
        return 'Caution (26-32°C)';
    } elseif ($heat_index < 39) {
        return 'Extreme Caution (33-38°C)';
    } elseif ($heat_index < 42) {
        return 'Danger (39-41°C)';
    } else {
        return 'Extreme Danger (Above 42°C)';
    }
}

// Fetch average heat index data
$timeframes = ['hourly', 'daily', 'weekly', 'monthly', 'yearly'];
$data = [];

foreach ($timeframes as $range) {
    switch ($range) {
        case 'hourly':
            $query = "SELECT DATE_FORMAT(timestamp, '%Y-%m-%d %H:00:00') as period, AVG(heat_index) as avg_heat_index
                      FROM heatindexdata
                      GROUP BY period
                      ORDER BY period DESC";
            break;
        case 'daily':
            $query = "SELECT DATE_FORMAT(timestamp, '%Y-%m-%d') as period, AVG(heat_index) as avg_heat_index
                      FROM heatindexdata
                      GROUP BY period
                      ORDER BY period DESC";
            break;
        case 'weekly':
            $query = "SELECT DATE_FORMAT(timestamp, '%Y-%u') as period, AVG(heat_index) as avg_heat_index
                      FROM heatindexdata
                      GROUP BY period
                      ORDER BY period DESC";
            break;
        case 'monthly':
            $query = "SELECT DATE_FORMAT(timestamp, '%Y-%m') as period, AVG(heat_index) as avg_heat_index
                      FROM heatindexdata
                      GROUP BY period
                      ORDER BY period DESC";
            break;
        case 'yearly':
            $query = "SELECT DATE_FORMAT(timestamp, '%Y') as period, AVG(heat_index) as avg_heat_index
                      FROM heatindexdata
                      GROUP BY period
                      ORDER BY period DESC";
            break;
    }

    $result = $conn->query($query);
    $data[$range] = $result->fetch_all(MYSQLI_ASSOC);
}
$current_range = 'hourly'; // Set default range for active button tracking
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" />
</head>
<body class="bg-gray-100">
    <?php include 'navbar.php'; ?>

    <section class="max-w-6xl mx-auto p-6 bg-white rounded shadow-md mt-6">
        <h2 class="text-xl font-semibold mb-4">Average Heat Index (Heatmap)</h2>

        <div class="tabs flex space-x-4 mb-4">
            <?php foreach ($timeframes as $range): ?>
                <button class="tab-button px-4 py-2 bg-blue-600 text-white rounded" onclick="showTable('<?php echo $range; ?>')"><?php echo ucfirst($range); ?></button>
            <?php endforeach; ?>
        </div>

        <div id="heatmap-table" class="overflow-x-auto">
            <?php foreach ($data as $range => $values): ?>
                <table id="<?php echo $range; ?>" class="hidden w-full text-left border-collapse border border-gray-300 mb-4">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 px-4 py-2">Period</th>
                            <th class="border border-gray-300 px-4 py-2">Average Heat Index (°C)</th>
                            <th class="border border-gray-300 px-4 py-2">Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($values as $row): 
                            $category = getHeatIndexCategory($row['avg_heat_index']);
                        ?>
                            <tr class="<?php echo $category == 'Caution (26-32°C)' ? 'bg-yellow-100' : ($category == 'Extreme Caution (33-38°C)' ? 'bg-orange-100' : ($category == 'Danger (39-41°C)' ? 'bg-red-100' : 'bg-purple-100')); ?>">
                                <td class="border border-gray-300 px-4 py-2"><?php echo $row['period']; ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo round($row['avg_heat_index'], 2); ?></td>
                                <td class="border border-gray-300 px-4 py-2"><?php echo $category; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endforeach; ?>
        </div>

        <!-- Legend -->
        <div class="mt-4">
            <h3 class="font-bold">Heat Index Legend</h3>
            <div class="flex space-x-4">
                <div class="flex items-center">
                    <div class="w-4 h-4 bg-yellow-100 border border-gray-300 mr-1"></div>
                    <span>Caution (26-32°C)</span>
                </div>
                <div class="flex items-center">
                    <div class="w-4 h-4 bg-orange-100 border border-gray-300 mr-1"></div>
                    <span>Extreme Caution (33-38°C)</span>
                </div>
                <div class="flex items-center">
                    <div class="w-4 h-4 bg-red-100 border border-gray-300 mr-1"></div>
                    <span>Danger (39-41°C)</span>
                </div>
                <div class="flex items-center">
                    <div class="w-4 h-4 bg-purple-100 border border-gray-300 mr-1"></div>
                    <span>Extreme Danger (Above 42°C)</span>
                </div>
            </div>
        </div>
    </section>

    <script>
        function showTable(range) {
            const tables = document.querySelectorAll('table');
            tables.forEach(table => {
                table.classList.add('hidden');
            });
            document.getElementById(range).classList.remove('hidden');
            
            // Update active button
            const buttons = document.querySelectorAll('.tab-button');
            buttons.forEach(button => {
                if (button.textContent.toLowerCase() === range) {
                    button.classList.add('bg-blue-700');
                    button.classList.remove('bg-blue-600');
                } else {
                    button.classList.remove('bg-blue-700');
                    button.classList.add('bg-blue-600');
                }
            });
        }

        // Show the hourly table by default
        document.addEventListener('DOMContentLoaded', function() {
            showTable('<?php echo $current_range; ?>');
        });
    </script>

</body>
</html>
