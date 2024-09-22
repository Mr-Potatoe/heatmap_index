<?php
include '../php/admin_protect.php';
include '../php/db.php';

// Pagination setup
$limit = 5; // Number of logs per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Get total number of logs
$total_sql = "SELECT COUNT(*) as total FROM Logs";
$total_result = $conn->query($total_sql);
$total_row = $total_result->fetch_assoc();
$total_logs = $total_row['total'];
$total_pages = ceil($total_logs / $limit);

// Get logs for the current page
$sql = "SELECT * FROM Logs ORDER BY timestamp DESC LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'head.php'; ?> <!-- Include the head -->
</head>
<body class="flex bg-gray-100">
<?php include 'navbar.php'; ?> <!-- Include the navbar -->
<main id="main-content" class="flex-1 overflow-x-auto overflow-y-auto bg-gray-100 transition-all duration-300 ease-in-out">


<header class="bg-blue-600 text-white p-4">
        <h1 class="text-2xl font-bold text-center">View Logs</h1>
    </header>

<section class="p-4 bg-white md:p-6 max-w-6xl mx-auto w-full mt-6">
    <table class="min-w-full bg-white border border-gray-300 mt-8 rounded">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4 border">Log ID</th>
                <th class="py-2 px-4 border">Action</th>
                <th class="py-2 px-4 border">Timestamp</th>
                <th class="py-2 px-4 border">Admin Username</th>
                <th class="py-2 px-4 border">Details</th>
                <th class="py-2 px-4 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='py-2 px-4 border'>" . $row['log_id'] . "</td>";
                    echo "<td class='py-2 px-4 border'>" . $row['action'] . "</td>";
                    echo "<td class='py-2 px-4 border'>" . $row['timestamp'] . "</td>";
                    echo "<td class='py-2 px-4 border'>" . $row['admin_username'] . "</td>";
                    echo "<td class='py-2 px-4 border'>" . $row['details'] . "</td>";
                    echo "<td class='py-2 px-4 border'>
                            <a href='../php/delete_log.php?id=" . $row['log_id'] . "' class='text-red-600 hover:underline' onclick='return confirm(\"Are you sure you want to delete this log?\");'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='py-2 px-4 border text-center'>No logs found.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-4">
        <nav class="flex justify-between">
            <div>
                <?php if ($page > 1): ?>
                    <a href="?page=<?php echo $page - 1; ?>" class="bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Previous</a>
                <?php endif; ?>
            </div>
            <div>
                <?php if ($page < $total_pages): ?>
                    <a href="?page=<?php echo $page + 1; ?>" class="bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Next</a>
                <?php endif; ?>
            </div>
        </nav>
        <div class="text-center mt-2">
            Page <?php echo $page; ?> of <?php echo $total_pages; ?>
        </div>
    </div>
</section>

</main>

</body>
</html>
