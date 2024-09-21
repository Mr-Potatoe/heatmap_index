<!-- head.php -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo isset($page_title) ? $page_title : 'Admin Panel'; ?></title>
<link rel="stylesheet" href="../css/style.css">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        @media (max-width: 767px) {
            #sidebar {
                position: fixed;
                left: -100%;
                top: 0;
                bottom: 0;
                z-index: 50;
                transition: left 0.3s ease-in-out;
            }
            #sidebar.open {
                left: 0;
            }
            #main-content {
                margin-left: 0;
            }
        }
        @media (min-width: 768px) {
            #sidebar {
                position: fixed;
                left: 0;
                top: 0;
                bottom: 0;
            }
            #main-content {
                margin-left: 0; /* 64px */
            }
        }
        /* Add these styles to ensure proper centering */
        .content-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 1200px; /* Adjust as needed */
            margin: 0 auto;
            padding: 0 1rem;
        }
        .full-width {
            width: 100%;
        }
    </style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
        function toggleForm() {
            const form = document.getElementById('add-sensor-form');
            form.classList.toggle('hidden');
        }

        // SweetAlert confirmation for deleting
        function confirmDelete(sensorId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../php/delete_sensor.php?id=' + sensorId;
                }
            });
        }
    </script>


