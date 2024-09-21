<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- Include Font Awesome (Add in <head> if not already included) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

<!-- Responsive Navbar -->
<nav class="bg-gray-800 shadow-md">
    <div class="container mx-auto flex items-center justify-between p-4">
        <!-- Logo Section -->
        <div class="text-white text-xl font-bold">
            <a href="dashboard.php">Welcome, <?php echo $_SESSION['admin_username']; ?></a>
        </div>

        <!-- Mobile Menu Button -->
        <button id="menu-btn" class="text-gray-300 md:hidden focus:outline-none focus:text-white transition-transform transform hover:scale-110">
            <i class="fas fa-bars text-xl"></i>
        </button>

        <!-- Menu Links -->
        <ul id="menu" class="hidden md:flex space-x-6">
            <?php 
            $menu_items = [
                ['link' => 'dashboard.php', 'icon' => 'home', 'label' => 'Dashboard'],
                ['link' => 'map.php', 'icon' => 'map-marked-alt', 'label' => 'Heat Index Map'],
                ['link' => 'manage_sensors.php', 'icon' => 'tools', 'label' => 'Manage Sensors'],
                ['link' => 'history.php', 'icon' => 'history', 'label' => 'Heat Index History'],
                ['link' => 'alerts.php', 'icon' => 'exclamation-triangle', 'label' => 'Alerts'],
                ['link' => 'view_logs.php', 'icon' => 'file-alt', 'label' => 'View Logs'],
            ];

            foreach ($menu_items as $item): ?>
                <li>
                    <a href="<?php echo $item['link']; ?>" class="flex items-center space-x-2 <?php echo $current_page == $item['link'] ? 'text-white font-bold' : 'text-gray-300'; ?> hover:text-white transition-colors duration-300">
                        <i class="fas fa-<?php echo $item['icon']; ?>"></i>
                        <span><?php echo $item['label']; ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
            <li>
                <a href="#" onclick="confirmLogout(event)" class="flex items-center space-x-2 text-gray-300 hover:text-white transition-colors duration-300">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<script>
    function confirmLogout(event) {
        event.preventDefault(); // Prevent the default link action
        Swal.fire({
            title: 'Are you sure?',
            text: "You will be logged out of your account.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, logout!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to logout.php if confirmed
                window.location.href = '../php/logout.php';
            }
        });
    }
</script>

<!-- JavaScript to Toggle Menu on Mobile -->
<script>
    const menuBtn = document.getElementById('menu-btn');
    const menu = document.getElementById('menu');

    menuBtn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>

<style>
    /* Additional styles for modern UI/UX */
    nav {
        border-bottom: 2px solid #1f2937; /* Adds a subtle separation */
    }

    .hover\:scale-110:hover {
        transform: scale(1.1);
    }

    .transition-colors {
        transition: color 0.3s ease;
    }
</style>
