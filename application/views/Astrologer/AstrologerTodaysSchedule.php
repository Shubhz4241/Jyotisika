<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's Schedule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Montserrat', sans-serif;
        }

        .header {
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .schedule-card {
            background: white;
            border-radius: 12px;
            padding:30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            margin: auto;
        }

        .user-info {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .user-info img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 12px;
        }

        .pooja-details {
            font-size: 14px;
            color: #444;
            line-height: 30px;
        }

        .pooja-details span {
            font-weight: bold;
            color: #000;
        }

        .location {
            color: #007bff;
            text-decoration: none;
        }

        .map-container {
            width: 120px;
            border-radius: 8px;
            overflow: hidden;
        }

        .map-container img {
            width: 100%;
            border-radius: 8px;
        }

        .distance {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
            display: flex;
            align-items: center;
        }

        .distance::before {
            content: "📍";
            margin-right: 5px;
        }

        .status-label {
            font-size: 14px;
            font-weight: bold;
            margin-top: 10px;
        }

        .form-select {
            font-size: 14px;
            padding: 8px;
        }

        @media (max-width: 768px) {
            .schedule-card {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>

<header>
    <?php $this->load->view('Astrologer/Include/AstrologerNav') ?>
</header>
<div style="min-height: 100vh;">
<div class="container mt-4">
    <div class="header">
        <a class="text-decoration-none text-dark" href="<?php echo base_url('AstrologerUser/AstrologerDashboard'); ?>">
            <img src="<?php echo base_url('assets/images/Pujari/arrow_back.png'); ?>" alt="Back">
            Today's Schedule
        </a>
    </div>

    <!-- Cards Container -->
    <div class="row justify-content-center">
        <!-- First Card -->
        <div class="col-md-6 col-lg-5 mb-4">
            <div class="schedule-card">
               
                <div class="d-flex justify-content-between align-items-start mt-3" style="gap:0;">
                <div class="pooja-details">
                <div class="user-info">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User">
                    <div>
                        <div class="user-name">Jane Doe</div>
                        <div class="pooja-details">12/1/2025</div>
                    </div>
                </div>
                    <div>Pooja: <span>Ghar Shanti Pooja</span></div>
                    <div>Date: <span>25/1/2025</span></div>
                    <div>Time: <span>10:00 AM</span></div>
                    <div><a href="#" class="location">XYZ road, ABC colony, Nashik, Maharashtra</a></div>
                </div>
                <div class="map-container" style="width:200px; height:220px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12984.900287497107!2d73.78259668116257!3d20.00751401393697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddea54b213a9d7%3A0xc2f9ac85ac767a9d!2sPanchavati%2C%20Nashik%2C%20Maharashtra!5e1!3m2!1sen!2sin!4v1740395506425!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center " style="height: 10px;">
                    <div>

                    </div>
                    <div class="distance">2.5 Kms Away</div>
                </div>

                <div class="status-label mt-3">Pooja Status</div>
                <select class="form-select">
                    <option>In progress</option>
                    <option>Completed</option>
                </select>
            </div>
        </div>

        <!-- Second Card -->
        <div class="col-md-6 col-lg-5 mb-4">
            <div class="schedule-card">
               
                    
                    <div class="d-flex justify-content-between align-items-start mt-3" style="gap:0;">
                <div class="pooja-details">
                <div class="user-info">
                    <img src="https://randomuser.me/api/portraits/men/50.jpg" alt="User">
                    <div>
                        <div class="user-name">Aman Tiwari</div>
                        <div class="pooja-details">12/1/2025</div>
                    </div>
                </div>
                    <div>Pooja: <span>Ghar Shanti Pooja</span></div>
                    <div>Date: <span>25/1/2025</span></div>
                    <div>Time: <span>10:00 AM</span></div>
                    <div><a href="#" class="location">XYZ road, ABC colony, Nashik, Maharashtra</a></div>
                </div>
                <div class="map-container" style="width:200px; height:220px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12984.900287497107!2d73.78259668116257!3d20.00751401393697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddea54b213a9d7%3A0xc2f9ac85ac767a9d!2sPanchavati%2C%20Nashik%2C%20Maharashtra!5e1!3m2!1sen!2sin!4v1740395506425!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    </div>

                <div class="d-flex justify-content-between align-items-center " style="height: 10px;">
                    <div>

                    </div>
                    <div class="distance">2.5 Kms Away</div>
                </div>

                <div class="status-label mt-3">Pooja Status</div>
                <select class="form-select">
                    <option>In progress</option>
                    <option>Completed</option>
                </select>
            </div>
        </div>
    </div>
</div>
</div>
<footer>
    <?php $this->load->view('Astrologer/Include/AstrologerFooter') ?>
</footer>

</body>
</html>
