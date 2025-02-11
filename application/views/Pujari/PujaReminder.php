<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pooja Reminder</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: "Montserrat", serif;
        }

        .main-title {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 2rem;
        }

        .filter-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-bottom: 20px;
        }

        .filter-buttons button {
            font-size: 1rem;
            border-radius: 20px;
            font-weight: bold;
            transition: 0.3s ease-in-out;
            padding: 10px 20px;
        }

        .filter-buttons button.active {
            background-color: #ff9fe0;
            color: white;
        }

        .custom-card {
            display: flex;
            align-items: center;
            background: white;
            border: 1px solid #ddd;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 20px;
        }

        .custom-card img {
            width: 200px;
            height: 300px;
            object-fit: cover;
        }

        .custom-card .card-content {
            padding: 15px;
            flex-grow: 1;
        }

        .custom-card h5 {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .custom-card p {
            margin: 0;
            font-size: 0.9rem;
            color: #555;
        }

        .btn-set-reminder {
            background-color: #28a745;
            color: white;
            font-size: 0.9rem;
            font-weight: bold;
            border-radius: 20px;
            margin-top: 10px;
        }

        .btn-set-reminder:hover {
            background-color: #218838;
        }

        @media (max-width: 768px) {
            .filter-buttons {
                justify-content: center;
                flex-wrap: wrap;
            }

            .custom-card {
                flex-direction: column;
                align-items: flex-start;
            }

            .custom-card img {
                width: 100%;
                height: auto;
            }

            .custom-card .card-content {
                padding-left: 0;
            }
        }
    </style>
</head>

<body >
<header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>
    <div class="container py-5">
        <!-- Title -->
        <h2 class="main-title">Pooja Reminder</h2>

        <!-- Filter Buttons -->
        <div class="filter-buttons">
            <button class="btn btn-outline-primary active">Online Puja</button>
            <button class="btn btn-outline-primary">Offline Puja</button>
            <button class="btn btn-outline-primary">Mob Puja</button>
        </div>

        <!-- Today's Reminder -->
        <h4 class="mb-4">Today's Reminder</h4>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="custom-card">
                    <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>" alt="Puja Image">
                    <div class="card-content">
                        <h5>Puja - Ghar Shanti Puja</h5>
                        <p>
                            <strong>Date:</strong> 12/1/2025<br>
                            <strong>Time:</strong> 10:30 AM<br>
                            XYZ road, ABC colony,<br>
                            Nashik, Maharashtra
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="custom-card">
                    <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>" alt="Puja Image">
                    <div class="card-content">
                        <h5>Puja - Ganesh Chaturthi Puja</h5>
                        <p>
                            <strong>Date:</strong> 15/1/2025<br>
                            <strong>Time:</strong> 2:00 PM<br>
                            Community Hall,<br>
                            Nashik, Maharashtra
                        </p>
                    </div>
                </div>                                            
            </div>
        </div>

        <!-- Upcoming Schedule -->
        <div class="d-flex justify-content-between align-items-center mt-5 mb-4">
            <h4>Upcoming Schedule</h4>
            <button class="btn btn-set-reminder"> <img src="<?php echo base_url() . 'assets/images/Pujari/Alarm Plus.png' ?>" alt="Puja Image">
            SetReminder</button>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="custom-card">
                    <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>" alt="Puja Image">
                    <div class="card-content">
                        <h5>Puja - Diwali Lakshmi Puja</h5>
                        <p>
                            <strong>Date:</strong> 20/1/2025<br>
                            <strong>Time:</strong> 6:00 PM<br>
                            XYZ Temple,<br>
                            Pune, Maharashtra
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="custom-card">
                    <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>" alt="Puja Image">
                    <div class="card-content">
                        <h5>Puja - Navratri Durga Puja</h5>
                        <p>
                            <strong>Date:</strong> 25/1/2025<br>
                            <strong>Time:</strong> 7:00 PM<br>
                            ABC Community Hall,<br>
                            Mumbai, Maharashtra
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
