<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Profile</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/style.css' ?>">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rokkitt:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="<?= base_url('assets/images/admin/logo.png.png'); ?>" type="image/png">

    <style>
        * {
            font-family: 'Inter', serif;
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
            grid-template-columns: repeat(auto-fit, minmax(370px, 1fr));
            gap: 20px;
            padding: 20px;
            justify-content: center;
        }

        .profile-card {
            border-radius: 90px;
            text-align: center;
            padding: 10px;
            width: 100%;
            height: 350px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;

        }

        .profile-card img {
            width: 100%;
            height: 85%;
            object-fit: cover;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;

        }

        .profile-card .name {
            font-size: 18px;
            font-weight: bold;
            background-color: #0C768A;
            padding: 18px;
            width: 100%;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
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
        <?php $this->load->view('IncludeAdmin/CommanSideBar'); ?>


        <!-- Main Content -->
        <div class="main w-100">
            <!-- Navbar -->
            <?php $this->load->view('IncludeAdmin/CommanNavBar'); ?>

            <div class="container">
                <!-- Search and Filter Bar -->
                <div class="search-filter-container">
                    <div class="search-input-container">
                        <img src="<?php echo base_url('assets/images/HRside/search.png'); ?>" alt="Search" class="search-icon">
                        <input type="text" class="search-input" placeholder="Search By name">
                    </div>
                    <button class="filter-button">
                        <img class="filter-icon" src="<?php echo base_url('assets/images/HRside/filter.png') ?>" alt="Filter icon">
                        <span>Filter</span>
                    </button>
                </div>

                <!-- Profile Grid -->

                <div id="astrologer-list" class="card-container">
                    <?php foreach ($Astro as $row): ?>
                        <div class="card-container">
                            <a href="<?php echo base_url() . 'astrologerreviewe/' . $row['id']; ?>" class="text-decoration-none text-dark">
                                <div class="profile-card">
                                    <img src="<?php echo base_url('uploads/astrologer/' . $row['profile_image']); ?>" alt="Astrologer <?php echo htmlspecialchars($row['name']); ?>">
                                    <div class="name Astrologer">Astrologer <?php echo htmlspecialchars($row['name']); ?></div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>





            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch("<?php echo base_url('admin/getAstrologersByStatus?status=Approved'); ?>")
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        let astrologers = data.data;
                        let astrologerContainer = document.getElementById("astrologer-list");

                        astrologerContainer.innerHTML = ""; // Clear existing content

                        astrologers.forEach(astrologer => {
                            let profileImage = astrologer.profile_image ?
                                "<?php echo base_url(); ?>" + 'uploads/Astrologer/' + astrologer.profile_image :
                                "<?php echo base_url('assets/images/admin/rectangle 5185.png'); ?>";

                            let profileLink = "<?php echo base_url('viewastrologerprofile/'); ?>" + astrologer.id;

                            let card = `
                        <a href="${profileLink}" class="profile-link">
                            <div class="profile-card">
                                <img src="${profileImage}" alt="${astrologer.name}">
                                <div class="name Astrologer">${astrologer.name}</div>
                            </div>
                        </a>
                    `;
                            astrologerContainer.innerHTML += card;
                        });
                    } else {
                        document.getElementById("astrologer-list").innerHTML = "<p>No astrologers found.</p>";
                    }
                })
                .catch(error => console.error("Error fetching astrologers:", error));
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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

