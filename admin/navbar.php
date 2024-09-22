<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- Responsive Navbar -->
<nav id="navbar" class="bg-gray-800 text-white transition-all duration-300 ease-in-out overflow-hidden">
    <div class="flex flex-col h-full">
        <!-- Logo and Toggle Button Section -->
        <div class="flex items-center justify-between p-4">
            <a href="dashboard.php" id="navbar-logo" class="text-xl font-bold truncate">Welcome, <?php echo $_SESSION['admin_username']; ?></a>
            <button id="navbar-toggle" class="text-gray-300 hover:text-white focus:outline-none">
                <i class="fas fa-bars text-lg"></i>
            </button>
        </div>

        <!-- Menu Links -->
        <ul id="navbar-menu" class="flex-grow flex flex-col space-y-2 p-4">
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
                    <a href="<?php echo $item['link']; ?>" class="flex items-center space-x-2 p-2 rounded <?php echo $current_page == $item['link'] ? 'bg-gray-700 text-white' : 'text-gray-300'; ?> hover:bg-gray-700 hover:text-white transition-colors duration-300">
                        <i class="fas fa-<?php echo $item['icon']; ?> w-6 text-center"></i>
                        <span class="navbar-item-label"><?php echo $item['label']; ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
            <li>
                <a href="#" onclick="confirmLogout(event)" class="flex items-center space-x-2 p-2 rounded text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-300">
                    <i class="fas fa-sign-out-alt w-6 text-center"></i>
                    <span class="navbar-item-label">Logout</span>
                </a>
            </li>
        </ul>

        <!-- Optional Footer/Bottom Section -->
        <div class="p-4 mt-auto">
            <p class="text-gray-400 text-sm">&copy; 2024 Heat Index Monitor</p>
        </div>
    </div>
</nav>

<script>
    const navbarToggle = document.getElementById('navbar-toggle');
    const navbar = document.getElementById('navbar');
    const navbarMenu = document.getElementById('navbar-menu');
    const navbarLogo = document.getElementById('navbar-logo');
    const mainContent = document.querySelector('.flex-1');

    let isExpanded = true;

    function toggleNavbar() {
        if (window.innerWidth < 768) {
            // Mobile behavior
            navbarMenu.classList.toggle('hidden');
        } else {
            // Desktop behavior
            isExpanded = !isExpanded;
            if (isExpanded) {
                navbar.classList.remove('w-20');
                navbar.classList.add('w-64');
                mainContent.classList.remove('ml-20');
                mainContent.classList.add('ml-64');
                document.querySelectorAll('.navbar-item-label').forEach(el => el.classList.remove('hidden'));
                navbarLogo.classList.remove('hidden');
            } else {
                navbar.classList.remove('w-64');
                navbar.classList.add('w-20');
                mainContent.classList.remove('ml-64');
                mainContent.classList.add('ml-20');
                document.querySelectorAll('.navbar-item-label').forEach(el => el.classList.add('hidden'));
                navbarLogo.classList.add('hidden');
            }
        }
    }

    navbarToggle.addEventListener('click', toggleNavbar);

    // Handle window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            navbarMenu.classList.remove('hidden');
            navbar.classList.remove('w-full');
            navbar.classList.add(isExpanded ? 'w-64' : 'w-20');
            mainContent.classList.add(isExpanded ? 'ml-64' : 'ml-20');
        } else {
            navbarMenu.classList.add('hidden');
            navbar.classList.remove('w-64', 'w-20');
            navbar.classList.add('w-full');
            mainContent.classList.remove('ml-64', 'ml-20');
        }
    });

    // Initialize navbar state on page load
    window.addEventListener('load', () => {
        if (window.innerWidth < 768) {
            navbar.classList.add('w-full');
            mainContent.classList.remove('ml-64', 'ml-20');
        } else {
            navbar.classList.add('w-64');
            mainContent.classList.add('ml-64');
        }
    });

    function confirmLogout(event) {
        event.preventDefault();
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
                window.location.href = '../php/logout.php';
            }
        });
    }
</script>

<style>
    @media (max-width: 767px) {
        #navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            height: auto;
        }
        #navbar-menu {
            background-color: #1f2937;
        }
        .flex-1 {
            margin-top: 60px; /* Adjust based on your navbar height */
        }
    }
    @media (min-width: 768px) {
        #navbar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 16rem;
            transition: width 0.3s ease-in-out;
        }
        .flex-1 {
            margin-left: 16rem;
            transition: margin-left 0.3s ease-in-out;
        }
        #navbar.w-20 {
            width: 5rem;
        }
        .flex-1.ml-20 {
            margin-left: 5rem;
        }
    }
</style>