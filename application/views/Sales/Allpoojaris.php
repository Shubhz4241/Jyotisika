<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Home</title>
    <!-- Bootstrap CSS for styling and layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="styles.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="assets/images/admin/logo.png" type="image/png">

    <style>
        * {
            font-family: 'Rokkitt', serif;
        }



        .container {
            max-width: 1300px;
            margin: 30px auto 0;
        }






        /* Search and Filter Bar */
        .search-filter-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 20px;
            width: 100%;
            color: white;

        }

        .search-input-container {
            position: relative;
            flex-grow: 1;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            width: 18px;
            height: 18px;
            color: white;

        }

        .search-input {
            width: 70%;
            height: 40px;
            padding: 0 15px 0 45px;
            border-radius: 5px;
            border: 1px solid #0C768A;
            background-color: rgb(71, 139, 153);
            color: white;
            font-size: 15px;
            outline: none;
        }

        .search-input::placeholder {
            color: white;
            opacity: 1;

        }

        .filter-button {
            background-color: rgb(71, 139, 153);
            color: #000;
            border: 1px solid #0C768A;
            border-radius: 5px;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            height: 40px;
            color: white;

        }

        .filter-icon {
            width: 16px;
            height: 16px;
            color: white;

        }

        /* Card Layout */
        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
            justify-content: center;
        }

        .profile-card {
            border-radius: 20px;
            text-align: center;
            padding: 0;
            width: 100%;
            height: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .profile-card img {
            width: 100%;
            height: 85%;
            object-fit: cover;
        }

        .profile-card .name {
            font-size: 18px;
            font-weight: bold;
            background-color: #0C768A;
            padding: 18px;
            width: 100%;
            color: white;
        }


        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .card-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .search-filter-container {
                flex-direction: column;
                align-items: stretch;
            }

            .card-container {
                grid-template-columns: repeat(1, 1fr);
            }

            .search-input {
                width: 100%;
            }
        }
    </style>
</head>

<body style="background-color:rgb(228, 236, 241);">
    <div class="d-flex">
        <!-- Sidebar -->
        <?php $this->load->view('Sales/SalesSidebar'); ?>

        <!-- SIDEBAR END -->

        <!-- Main Component -->
        <div class="main ">
            <!-- Navbar -->
            <?php $this->load->view('Sales/SalesNavbar'); ?>

            <!-- Navbar End -->

            <main class="p-1">
                <div class="container">
                    <!-- Search and Filter Bar -->
                    <div class="search-filter-container">
                        <div class="search-input-container">
                            <img src="<?php echo base_url('assets/images/HRside/search.png'); ?>" alt="Search" class="search-icon ">
                            <input type="text" class="search-input" id="searchInput" placeholder="Search By name">

                        </div>
                        <button class="filter-button">
                            <img class="filter-icon" src="<?php echo base_url('assets/images/HRside/filter.png') ?>" alt="Filter icon">
                            <span>Filter</span>
                        </button>
                    </div>

                    <!-- Profile Grid -->

                    <!-- Profile Grid using Bootstrap row/col -->
                    <div class="container">
                        <div class="row g-4" id="astrologer-list">
                            <div class="col-md-4 col-sm-6 astrologer-card">
                                <a href="<?php echo site_url('viewastrologerprofile'); ?>" class="text-decoration-none text-dark">
                                    <div class="profile-card">
                                        <img src="<?php echo base_url('assets/images/HRside/Rectangle 5185.png'); ?>" alt="Astrologer Jane Doe">
                                        <div class="name">Astrologer Jane Doe</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-6 astrologer-card">
                                <a href="<?php echo site_url('viewastrologerprofile'); ?>" class="text-decoration-none text-dark">
                                    <div class="profile-card">
                                        <img src="<?php echo base_url('assets/images/HRside/Rectangle 5185.png'); ?>" alt="Astrologer John Smith">
                                        <div class="name">Astrologer John Smith</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-6 astrologer-card">
                                <a href="<?php echo site_url('viewastrologerprofile'); ?>" class="text-decoration-none text-dark">
                                    <div class="profile-card">
                                        <img src="<?php echo base_url('assets/images/HRside/Rectangle 5185.png'); ?>" alt="Astrologer Sarah Lee">
                                        <div class="name">Astrologer Sarah Lee</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-6 astrologer-card">
                                <a href="<?php echo site_url('viewastrologerprofile'); ?>" class="text-decoration-none text-dark">
                                    <div class="profile-card">
                                        <img src="<?php echo base_url('assets/images/HRside/Rectangle 5185.png'); ?>" alt="Astrologer Mark Evan">
                                        <div class="name">Astrologer Mark Evan</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-6 astrologer-card">
                                <a href="<?php echo site_url('viewastrologerprofile'); ?>" class="text-decoration-none text-dark">
                                    <div class="profile-card">
                                        <img src="<?php echo base_url('assets/images/HRside/Rectangle 5185.png'); ?>" alt="Astrologer Lily Brown">
                                        <div class="name">Astrologer Lily Brown</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-6 astrologer-card">
                                <a href="<?php echo site_url('viewastrologerprofile'); ?>" class="text-decoration-none text-dark">
                                    <div class="profile-card">
                                        <img src="<?php echo base_url('assets/images/HRside/Rectangle 5185.png'); ?>" alt="Astrologer Jane Doe">
                                        <div class="name">Astrologer Jane Doe</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("searchInput");
            const cards = document.querySelectorAll(".astrologer-card");

            searchInput.addEventListener("input", function() {
                const query = searchInput.value.toLowerCase();
                cards.forEach(card => {
                    const name = card.querySelector(".name").textContent.toLowerCase();
                    card.style.display = name.includes(query) ? "block" : "none";
                });
            });
        });
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
</body>

</html>