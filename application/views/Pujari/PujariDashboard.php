<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pujari Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', serif;
        }

        .dashboard-sections {
            padding: 20px;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .icon-box {
            font-size: 1.5rem;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            margin: 0 auto 10px;
            border-radius: 50%;
        }

        .icon-box.green { background-color: #d4edda; color: #155724; }
        .icon-box.purple { background-color: #e2e0f9; color: #6f42c1; }
        .icon-box.red { background-color: #f8d7da; color: #721c24; }
        .icon-box.yellow { background-color: #fff3cd; color: #856404; }

        .review-card {
            background-color: #E2960126;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 15px;
            text-align: center;
            width: 90%;
            margin: auto;
        }

        .puja-image {
            width: 100%;
            border-radius: 10px;
        }

        footer {
            background-color: white;
            color: black;
            text-align: center;
            
        }

        .stars {
            color: gold;
            text-align: center;
        }

        .card1 { min-height: 345px !important; 
        
        }

        /* Responsive Fixes */
        @media (max-width: 1158px) {
            .card2 { width: 100% !important; }
        }

        .Rectangle {
            max-width: 200px;
        }

        .pujari-content {
            min-width: 200px;
        }
       
    </style>
</head>

<body>

    <header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>

    <div style="min-height: 100vh;">
        <main>
            <section class="dashboard-sections container">
                <div class="row text-center mb-4">
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                        <div class="card py-3">
                            <div class="icon-box green">📅</div>
                            <h6>Today's Schedule</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                        <div class="card py-3">
                            <div class="icon-box purple">🕒</div>
                            <h6>Upcoming Puja's</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                        <div class="card py-3">
                            <div class="icon-box red">📜</div> 
                            <a href="<?php echo base_url() . 'PujariUser/RateChart'; ?>"><h6>Rate Chart</h6></a>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                        <div class="card py-3">
                            <div class="icon-box yellow">➕</div>
                            <a href="<?php echo base_url() . 'PujariUser/PujaForm'; ?>"><h6>Add Puja's</h6></a>
                            
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-lg-6 mt-5">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Recent Request</h5>
                            <a href="<?php echo base_url() . 'PujariUser/RecentRequest'; ?>">View All</a>
                        </div>
                        <div class="card p-3 mt-3 card1">
                            <div class="d-flex flex-column flex-md-row align-items-center">
                                <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160 (1).png' ?>" alt="User" class="Rectangle img-fluid">
                                <div class="ms-md-3 mt-3 mt-md-0 pujari-content">
                                    <h6>John Doe</h6>
                                    <p>Puja: Ghar Shanti Puja<br> Date: 12/1/2025 | Time: 10:30 AM<br> Location: Nashik</p>
                                    <p>Padit Colony Nashik</p>
                                    <button class="btn btn-success btn-sm">Accept</button>
                                    <button class="btn btn-danger btn-sm">Reject</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-5">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Puja Reminder</h5>
                            <a href="<?php echo base_url() . 'PujariUser/PujaReminder2'; ?>">View All</a>
                        </div>
                        <div class="card p-3 mt-3 card1">
                            <div class="d-flex flex-column flex-md-row align-items-center">
                                <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160 (1).png' ?>" alt="User" class="Rectangle img-fluid">
                                <div class="ms-md-3 mt-3 mt-md-0 pujari-content">
                                    <h5>Puja - Rudraabhishek Puja</h5>
                                    <p><strong>Date:</strong> 12/1/2025</p>
                                    <p><strong>Time:</strong> 10:30 AM</p>
                                    <p>
                                        <strong><img src="<?php echo base_url() . 'assets/images/Pujari/icon.png'; ?>" 
                                             alt="Languages" class="img-fluid" width="15px"></strong> 
                                        English, Hindi, Marathi
                                    </p>
                                    <p>
                                        <strong><img src="<?php echo base_url() . 'assets/images/Pujari/graduate-cap_svgrepo.com.png'; ?>" 
                                             alt="Experience" class="img-fluid" width="19px"> Exp:</strong> 23 years
                                    </p>
                                    <p><strong>Price:</strong> <span class="discount">₹710</span> ₹500</p>
                                    <p><strong>Attendees:</strong> 104</p>
                                    <p class="text-danger">
                                        <img src="<?php echo base_url() . 'assets/images/Pujari/time-filled_svgrepo.com.png'; ?>" 
                                             alt="Countdown" class="img-fluid" width="19px"> 
                                        Starts in: 1d 4h 23m
                                    </p>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container mt-5">
                    <h5 class="mb-0">User Reviews</h5>
                    <div class="review-card">
                        <img src="<?php echo base_url() . 'assets/images/Pujari/Profileimg.png' ?>" class="img-fluid">
                        <blockquote>
                            “We had the privilege of having Pandit Ji perform a Satyanarayan Puja at our home, and the experience was truly divine.”
                        </blockquote>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p class="fw-bold text-center">Jane Doe</p>
                    </div>
                </div>
            </section>
        </main>
    </div>


    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    
</body>

</html>
