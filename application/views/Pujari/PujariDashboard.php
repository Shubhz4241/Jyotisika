<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pujari Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    
    <style>
        .dashboard-sections {
            padding: 20px;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            transform: scale(1.02);
            transition: all 0.3s ease;
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

        .icon-box.green {
            background-color: #d4edda;
            color: #155724;
        }

        .icon-box.purple {
            background-color: #e2e0f9;
            color: #6f42c1;
        }

        .icon-box.red {
            background-color: #f8d7da;
            color: #721c24;
        }

        .icon-box.yellow {
            background-color: #fff3cd;
            color: #856404;
        }

        .review-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 15px;
        }

        footer {
            background-color:white;
            color: black;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>

    <main>
        <section class="dashboard-sections container">
            <div class="row text-center mb-4">
                <div class="col-md-3">
                    <div class="card py-3">
                        <div class="icon-box green">📅</div>
                        <h6>Today's Schedule</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card py-3">
                        <div class="icon-box purple">🕒</div>
                        <h6>Upcoming Puja's</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card py-3">
                        <div class="icon-box red">📜</div>
                        <h6>Rate Chart</h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card py-3">
                        <div class="icon-box yellow">➕</div>
                        <h6>Add Puja's</h6>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h5>Recent Request</h5>
                    <div class="card p-3">
                        <div class="d-flex">
                        <img src="<?php echo base_url() .'assets/images/Pujari/Rectangle 5160 (1).png'?>" alt="<?php echo base_url() .'assets/images/Pujari/Rectangle 5160 (1).png'?>"  alt="User" class="Rectangle" width="200px">
                            <div class="ms-3">
                                <h6>John Doe</h6>
                                <p>Puja: Ghar Shanti Puja<br> Date: 12/1/2025 | Time: 10:30 AM<br> Location: Nashik</p>
                                <button class="btn btn-success btn-sm">Accept</button>
                                <button class="btn btn-danger btn-sm">Reject</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5>Puja Reminder</h5>
                    <div class="card p-3">
                        <h6>Puja - Ghar Shanti Puja</h6>
                        <p>Date: 12/1/2025<br>Time: 10:30 AM<br>Attendees: 104<br><strong>Starts in:</strong> 1d 2h 30m</p>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
        <div class="d-flex justify-content-center align-items-center position-relative">
            <!-- Left Arrow Button -->
            <button class="arrow-btn arrow-left">
                <i class="bi bi-arrow-left-circle"></i>
            </button>

            <!-- Review Card -->
            <div class="review-card">
                <img src="https://via.placeholder.com/100" alt="User Image">
                <blockquote>
                    “We had the privilege of having Pandit Ji perform a Satyanarayan Puja at our home, and the experience was truly divine. 
                    He explained every step of the rituals with great clarity and patience, ensuring we understood their significance. 
                    The arrangements were seamless, and his chants created a serene and spiritual atmosphere. 
                    Highly professional, punctual, and knowledgeable—Pandit Ji made the ceremony memorable for our family.”
                </blockquote>
                <div class="stars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                </div>
                <p class="fw-bold">Jane Doe</p>
            </div>

            <!-- Right Arrow Button -->
            <button class="arrow-btn arrow-right">
                <i class="bi bi-arrow-right-circle"></i>
            </button>
        </div>
    </div>
        </section>
    </main>

    <footer>
    <?php $this->load->view('Pujari/Include/PujariFooter') ?>  
    </footer>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
     <!-- Bootstrap Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>

</html>
