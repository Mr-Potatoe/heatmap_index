<?php include '../php/admin_protect.php'; ?>
<?php include '../php/db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php'; ?> <!-- Include the head -->
</head>
<body class="bg-gray-100">
    <?php include 'navbar.php'; ?> <!-- Include the navbar -->
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
    <header class="bg-blue-600 text-white p-4">
        <h1 class="text-2xl font-bold text-center">Alerts Management</h1>
    </header>

    <section class="max-w-6xl mx-auto p-6 bg-white rounded shadow-md mt-6">
        <h2 class="text-xl font-semibold">Active Alerts</h2>

        <div class="flex justify-between mb-4">
            <a href="alerts_history.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">View Alerts History</a>
        </div>

        <table class="min-w-full bg-white border border-gray-300 mt-4 rounded">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border">Alert ID</th>
                    <th class="py-2 px-4 border">Message</th>
                    <th class="py-2 px-4 border">Timestamp</th>
                    <th class="py-2 px-4 border">Status</th>
                    <th class="py-2 px-4 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Pagination logic
                $limit = 10; // Number of results per page
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $offset = ($page - 1) * $limit;

                // Query to count total unresolved alerts
                $count_query = "SELECT COUNT(*) AS total FROM alerts WHERE resolved = 0";
                $count_result = $conn->query($count_query);
                $total_alerts = $count_result->fetch_assoc()['total'];
                $total_pages = ceil($total_alerts / $limit);

                // Fetch unresolved alerts with limit and offset
                $alerts_query = "SELECT * FROM alerts WHERE resolved = 0 ORDER BY timestamp DESC LIMIT $limit OFFSET $offset";
                $alerts_result = $conn->query($alerts_query);

                if ($alerts_result->num_rows > 0) {
                    while ($row = $alerts_result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='py-2 px-4 border'>" . $row['alert_id'] . "</td>";
                        echo "<td class='py-2 px-4 border'>" . $row['message'] . "</td>";
                        echo "<td class='py-2 px-4 border'>" . $row['timestamp'] . "</td>";
                        echo "<td class='py-2 px-4 border'>" . ($row['resolved'] ? 'Resolved' : 'Active') . "</td>";
                        echo "<td class='py-2 px-4 border'>
                                <a href='../php/resolve_alert.php?id=" . $row['alert_id'] . "' class='text-green-600 hover:underline'>Resolve</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='py-2 px-4 border text-center'>No active alerts found.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4 flex justify-center items-center">
            <nav>
                <ul class="flex items-center">
                    <!-- Previous Button -->
                    <li>
                        <a href="?page=<?php echo max(1, $page - 1); ?>" class="px-3 py-1 rounded <?php echo $page <= 1 ? 'bg-gray-300 cursor-not-allowed' : 'bg-blue-600 text-white'; ?>" <?php echo $page <= 1 ? 'disabled' : ''; ?>>Previous</a>
                    </li>

                    <?php
                    // Calculate range for pagination buttons
                    $start = max(1, $page - 1);
                    $end = min($total_pages, $page + 1);

                    // Display pagination buttons
                    for ($i = $start; $i <= $end; $i++): ?>
                        <li class="mx-1">
                            <a href="?page=<?php echo $i; ?>" class="px-3 py-1 rounded <?php echo ($i == $page) ? 'bg-blue-600 text-white' : 'bg-gray-200'; ?>">
                                <?php echo $i; ?>
                            </a>
                        </li>
                    <?php endfor; ?>

                    <!-- Next Button -->
                    <li>
                        <a href="?page=<?php echo min($total_pages, $page + 1); ?>" class="px-3 py-1 rounded <?php echo $page >= $total_pages ? 'bg-gray-300 cursor-not-allowed' : 'bg-blue-600 text-white'; ?>" <?php echo $page >= $total_pages ? 'disabled' : ''; ?>>Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    
    </main>
</body>
</html>
