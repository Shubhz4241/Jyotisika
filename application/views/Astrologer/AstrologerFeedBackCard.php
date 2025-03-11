<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feedback Cards</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        body{
            font-family: 'Montserrat', serif;

        }
        .feedback-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .feedback-card:hover {
            transform: translateY(-5px);
        }

        .user-info {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .stars {
            color: gold;
        }

        .delete-icon {
            color: gray;
            cursor: pointer;
        }

        .delete-icon:hover {
            color: red;
        }
    </style>
</head>

<body>
<header>
        <?php $this->load->view('Astrologer/Include/AstrologerNav') ?>
    </header>
    <div style="min-height: 100vh;">
        <div class="container mt-5">
            <h2 class="text-center mb-4">Feedbacks</h2>
            <div class="row">
                <!-- Card 1 -->
                <div class="col-md-4">
                    <div class="feedback-card">
                        <p>"This Astrologer provided incredible insights into my life and personality. Their predictions about my career path were spot-on, and their guidance helped me make better decisions. Highly recommend for anyone seeking clarity!"</p>
                        <div class="user-info">
                            <img src="<?php echo base_url('assets/images/Pujari/Rectangle 5160 (1).png'); ?>"
                                alt="User" class="img-fluid rounded-circle"
                                style="width: 40px; height: 40px; object-fit: cover;">


                            <div>
                                <strong>Jane Doe</strong> <br>
                                <small>3 days ago</small>
                            </div>
                            <span class="ms-auto delete-icon"><i class="fas fa-trash"></i></span>
                        </div>
                        <div class="stars mt-2">
                            ★ ★ ★ ★ ★
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-4">
                    <div class="feedback-card">
                        <p>"This Astrologer provided incredible insights into my life and personality. Their predictions about my career path were spot-on, and their guidance helped me make better decisions. Highly recommend for anyone seeking clarity!"</p>
                        <div class="user-info">
                            <img src="<?php echo base_url('assets/images/Pujari/Rectangle 5160 (1).png'); ?>"
                                alt="User" class="img-fluid rounded-circle"
                                style="width: 40px; height: 40px; object-fit: cover;">

                            <div>
                                <strong>Jane Doe</strong> <br>
                                <small>3 days ago</small>
                            </div>
                            <span class="ms-auto delete-icon"><i class="fas fa-trash"></i></span>
                        </div>
                        <div class="stars mt-2">
                            ★ ★ ★ ★ ★
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-4">
                    <div class="feedback-card">
                        <p>"This Astrologer provided incredible insights into my life and personality. Their predictions about my career path were spot-on, and their guidance helped me make better decisions. Highly recommend for anyone seeking clarity!"</p>
                        <div class="user-info">
                            <img src="<?php echo base_url('assets/images/Pujari/Rectangle 5160 (1).png'); ?>"
                                alt="User" class="img-fluid rounded-circle"
                                style="width: 40px; height: 40px; object-fit: cover;">

                            <div>
                                <strong>Jane Doe</strong> <br>
                                <small>3 days ago</small>
                            </div>
                            <span class="ms-auto delete-icon"><i class="fas fa-trash"></i></span>
                        </div>
                        <div class="stars mt-2">
                            ★ ★ ★ ★ ★
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Card 1 -->
                <div class="col-md-4">
                    <div class="feedback-card">
                        <p>"This Astrologer provided incredible insights into my life and personality. Their predictions about my career path were spot-on, and their guidance helped me make better decisions. Highly recommend for anyone seeking clarity!"</p>
                        <div class="user-info">
                            <img src="<?php echo base_url('assets/images/Pujari/Rectangle 5160 (1).png'); ?>"
                                alt="User" class="img-fluid rounded-circle"
                                style="width: 40px; height: 40px; object-fit: cover;">


                            <div>
                                <strong>Jane Doe</strong> <br>
                                <small>3 days ago</small>
                            </div>
                            <span class="ms-auto delete-icon"><i class="fas fa-trash"></i></span>
                        </div>
                        <div class="stars mt-2">
                            ★ ★ ★ ★ ★
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-4">
                    <div class="feedback-card">
                        <p>"This Astrologer provided incredible insights into my life and personality. Their predictions about my career path were spot-on, and their guidance helped me make better decisions. Highly recommend for anyone seeking clarity!"</p>
                        <div class="user-info">
                            <img src="<?php echo base_url('assets/images/Pujari/Rectangle 5160 (1).png'); ?>"
                                alt="User" class="img-fluid rounded-circle"
                                style="width: 40px; height: 40px; object-fit: cover;">

                            <div>
                                <strong>Jane Doe</strong> <br>
                                <small>3 days ago</small>
                            </div>
                            <span class="ms-auto delete-icon"><i class="fas fa-trash"></i></span>
                        </div>
                        <div class="stars mt-2">
                            ★ ★ ★ ★ ★
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-4">
                    <div class="feedback-card">
                        <p>"This Astrologer provided incredible insights into my life and personality. Their predictions about my career path were spot-on, and their guidance helped me make better decisions. Highly recommend for anyone seeking clarity!"</p>
                        <div class="user-info">
                            <img src="<?php echo base_url('assets/images/Pujari/Rectangle 5160 (1).png'); ?>"
                                alt="User" class="img-fluid rounded-circle"
                                style="width: 40px; height: 40px; object-fit: cover;">

                            <div>
                                <strong>Jane Doe</strong> <br>
                                <small>3 days ago</small>
                            </div>
                            <span class="ms-auto delete-icon"><i class="fas fa-trash"></i></span>
                        </div>
                        <div class="stars mt-2">
                            ★ ★ ★ ★ ★
                        </div>
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