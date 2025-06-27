<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin:Astrologer List</title>
    <!-- Bootstrap CSS for styling and layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets\css\style.css' ?>">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        /* Apply Inter font globally */
        * {
            font-family: 'Inter', sans-serif !important;
        }

        /* Ensure smooth layout */
        html,
        body {
            overflow-x: hidden;
        }

        /* Table responsiveness */
        .table-responsive {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }

        /* Grid layout for cards */
        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            /* Auto-fit for responsiveness */
            gap: 20px;
            justify-content: center;
        }

        /* Card styling */
        .card {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 250px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .card img {
            width: 100%;
            height: 80%;
            object-fit: cover;
        }

        .card-name {
            height: 20%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            background: #f8f9fa;
        }

        /* Sidebar adjustments for mobile */
        @media (max-width: 768px) {
            .side-nav {
                width: 80px;
                padding: 15px 10px;
            }

            .side-nav:hover {
                width: 180px;
            }

            .side-nav img {
                width: 25px;
            }

            .side-nav .user h2 {
                font-size: 12px;
            }
        }

        /* Mobile adjustments */
        @media (max-width: 576px) {
            .main {
                padding: 10px;
            }

            .table-responsive {
                font-size: 0.85rem;
            }

            .btn {
                font-size: 0.8rem;
                padding: 8px;
            }

            .cards-container {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            }

            .card {
                height: 220px;
            }

            .card img {
                height: 75%;
            }
        }

        .cards-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            /* Adjust space between cards */
            justify-content: center;
        }

        .card {
            width: 220px;
            /* Keep the original card size */
            height: 280px;
            /* Maintain height */
            overflow: hidden;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #fff;
            transition: all 0.2s ease-in-out;
        }

        .card img {
            width: 100%;
            height: 160px;
            /* Maintain consistent image size */
            object-fit: cover;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .card-name {
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        .card:hover {
            transform: scale(1.02);
            /* Slight hover effect without expanding too much */
        }

        .card:focus {
            outline: none;
            transform: none;
            /* Prevents search focus from changing size */
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <?php $this->load->view('IncludeAdmin/CommanSidebar'); ?>
        <!-- SIDEBAR END -->


        <!-- Main Component -->
        <div class="main ">
            <!-- Navbar -->
            <?php $this->load->view('IncludeAdmin/CommanNavbar'); ?>
            <!-- Navbar End -->

            <main class="p-3">
                <!-- Search Input Field -->
                <input type="text" id="searchField" class="form-control mb-3" placeholder="Search astrologer by name..." onkeyup="filterCards()">

                <div class="cards-container">
                    <a href="<?php echo base_url() . 'astrologerreview'; ?>" class="text-decoration-none card-link">
                        <div class="card">
                            <img src="assets/images/astrologerimg.png" alt="Card Image">
                            <div class="card-name">Astrologer Jane Doe</div>
                        </div>
                    </a>
                    <a href="<?php echo base_url() . 'astrologerreview'; ?>" class="text-decoration-none card-link">
                        <div class="card">
                            <img src="assets/images/astrologerimg.png" alt="Card Image">
                            <div class="card-name">Astrologer John Doe</div>
                        </div>
                    </a>
                    <a href="<?php echo base_url() . 'astrologerreview'; ?>" class="text-decoration-none card-link">
                        <div class="card">
                            <img src="assets/images/astrologerimg.png" alt="Card Image">
                            <div class="card-name">Astrologer Emily Smith</div>
                        </div>
                    </a>
                    <a href="<?php echo base_url() . 'astrologerreview'; ?>" class="text-decoration-none card-link">
                        <div class="card">
                            <img src="assets/images/astrologerimg.png" alt="Card Image">
                            <div class="card-name">Astrologer Michael Brown</div>
                        </div>
                    </a>
                    <a href="<?php echo base_url() . 'astrologerreview'; ?>" class="text-decoration-none card-link">
                        <div class="card">
                            <img src="assets/images/astrologerimg.png" alt="Card Image">
                            <div class="card-name">Astrologer Michael Brown</div>
                        </div>
                    </a>
                    <a href="<?php echo base_url() . 'astrologerreview'; ?>" class="text-decoration-none card-link">
                        <div class="card">
                            <img src="assets/images/astrologerimg.png" alt="Card Image">
                            <div class="card-name">Astrologer Michael Brown</div>
                        </div>
                    </a>
                </div>
            </main>
            <!-- Main Component End -->
        </div>

    </div>
    </div>

    <!-- JavaScript for Search Functionality -->
    <script>
        function filterCards() {
            let input = document.getElementById("searchField").value.toLowerCase();
            let cards = document.querySelectorAll(".card");

            cards.forEach(card => {
                let name = card.querySelector(".card-name").textContent.toLowerCase();
                if (name.includes(input)) {
                    card.parentElement.style.display = "block";
                } else {
                    card.parentElement.style.display = "none";
                }
            });
        }
    </script>
    <!-- Script Toggle Sidebar -->
    <script>
        const toggler = document.querySelector(".toggler-btn");
        const closeBtn = document.querySelector(".close-sidebar");
        const sidebar = document.querySelector("#sidebar");

        toggler.addEventListener("click", function() {
            sidebar.classList.toggle("collapsed");
        });

        closeBtn.addEventListener("click", function() {
            sidebar.classList.remove("collapsed");
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>