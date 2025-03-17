<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Cards</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            font-family: 'Montserrat', serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .feedback-card {
            background: white;
            border: 2px solid #D3D3D3;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease;
            position: relative;
            min-height: 200px;
        }

        .feedback-card:hover {
            transform: translateY(-5px);
        }

        .user-info {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin-top: 10px;
        }

        .user-details {
            display: flex;
            align-items: center;
        }

        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
        }

        .stars {
            color: gold;
            margin-left: 10px;
        }

        .delete-icon {
            color: gray;
            cursor: pointer;
            position: absolute;
            bottom: 10px;
            right: 10px;
            font-size: 18px;
            width: 20px;
            height: 20px;
            background-color: #f0f0f0; /* Subtle highlight background */
            border-radius: 50%; /* Circular highlight */
            padding: 2px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .delete-icon:hover {
            color: red;
            background-color: #e0e0e0; /* Darker highlight on hover */
        }

        .delete-icon svg {
            width: 100%;
            height: 100%;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .feedback-card {
                min-height: auto;
            }

            .col-md-4 {
                flex: 0 0 50%;
                max-width: 50%;
            }
        }

        @media (max-width: 768px) {
            .feedback-card {
                padding: 15px;
            }

            .user-info {
                flex-direction: column;
                align-items: flex-start;
            }

            .user-details,
            .stars {
                margin: 5px 0;
            }

            .delete-icon {
                bottom: 5px;
                right: 5px;
                width: 18px;
                height: 18px;
            }

            .col-md-4 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }

        @media (max-width: 576px) {
            h2 {
                font-size: 1.5rem;
            }

            .feedback-card {
                margin-bottom: 15px;
            }

            .user-info img {
                width: 35px;
                height: 35px;
            }

            .delete-icon {
                width: 16px;
                height: 16px;
                padding: 1px;
            }
        }
    </style>
</head>

<body>
    <header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>
    <div style="min-height: 100vh;">
        <div class="container mt-5">
            <h2>Feedbacks</h2>
            <div class="row">
                <!-- Card 1 -->
                <div class="col-md-4">
                    <div class="feedback-card">
                        <p>"This Pujari provided incredible insights into my life and personality. Their predictions about my career path were spot-on, and their guidance helped me make better decisions. Highly recommend for anyone seeking clarity!"</p>
                        <div class="user-info">
                            <div class="user-details">
                                <img src="<?php echo base_url('assets/images/Pujari/Rectangle 5160 (1).png'); ?>" alt="User">
                                <div>
                                    <strong>Jane Doe</strong><br>
                                    <small>3 days ago</small>
                                </div>
                            </div>
                            <div class="stars">
                                ★ ★ ★ ★ ★
                            </div>
                        </div>
                        <span class="delete-icon" data-id="1">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 6h18M8 6V4c0-1.1.9-2 2-2h4c1.1 0 2 .9 2 2v2M10 11v6M14 11v6M4 6l1 16h14l1-16M9 6h6"/>
                            </svg>
                        </span>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-4">
                    <div class="feedback-card">
                        <p>"This Pujari provided incredible insights into my life and personality. Their predictions about my career path were spot-on, and their guidance helped me make better decisions. Highly recommend for anyone seeking clarity!"</p>
                        <div class="user-info">
                            <div class="user-details">
                                <img src="<?php echo base_url('assets/images/Pujari/Rectangle 5160 (1).png'); ?>" alt="User">
                                <div>
                                    <strong>Jane Doe</strong><br>
                                    <small>3 days ago</small>
                                </div>
                            </div>
                            <div class="stars">
                                ★ ★ ★ ★ ★
                            </div>
                        </div>
                        <span class="delete-icon" data-id="2">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 6h18M8 6V4c0-1.1.9-2 2-2h4c1.1 0 2 .9 2 2v2M10 11v6M14 11v6M4 6l1 16h14l1-16M9 6h6"/>
                            </svg>
                        </span>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-4">
                    <div class="feedback-card">
                        <p>"This Pujari provided incredible insights into my life and personality. Their predictions about my career path were spot-on, and their guidance helped me make better decisions. Highly recommend for anyone seeking clarity!"</p>
                        <div class="user-info">
                            <div class="user-details">
                                <img src="<?php echo base_url('assets/images/Pujari/Rectangle 5160 (1).png'); ?>" alt="User">
                                <div>
                                    <strong>Jane Doe</strong><br>
                                    <small>3 days ago</small>
                                </div>
                            </div>
                            <div class="stars">
                                ★ ★ ★ ★ ★
                            </div>
                        </div>
                        <span class="delete-icon" data-id="3">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 6h18M8 6V4c0-1.1.9-2 2-2h4c1.1 0 2 .9 2 2v2M10 11v6M14 11v6M4 6l1 16h14l1-16M9 6h6"/>
                            </svg>
                        </span>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-md-4">
                    <div class="feedback-card">
                        <p>"This Pujari provided incredible insights into my life and personality. Their predictions about my career path were spot-on, and their guidance helped me make better decisions. Highly recommend for anyone seeking clarity!"</p>
                        <div class="user-info">
                            <div class="user-details">
                                <img src="<?php echo base_url('assets/images/Pujari/Rectangle 5160 (1).png'); ?>" alt="User">
                                <div>
                                    <strong>Jane Doe</strong><br>
                                    <small>3 days ago</small>
                                </div>
                            </div>
                            <div class="stars">
                                ★ ★ ★ ★ ★
                            </div>
                        </div>
                        <span class="delete-icon" data-id="4">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 6h18M8 6V4c0-1.1.9-2 2-2h4c1.1 0 2 .9 2 2v2M10 11v6M14 11v6M4 6l1 16h14l1-16M9 6h6"/>
                            </svg>
                        </span>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="col-md-4">
                    <div class="feedback-card">
                        <p>"This Pujari provided incredible insights into my life and personality. Their predictions about my career path were spot-on, and their guidance helped me make better decisions. Highly recommend for anyone seeking clarity!"</p>
                        <div class="user-info">
                            <div class="user-details">
                                <img src="<?php echo base_url('assets/images/Pujari/Rectangle 5160 (1).png'); ?>" alt="User">
                                <div>
                                    <strong>Jane Doe</strong><br>
                                    <small>3 days ago</small>
                                </div>
                            </div>
                            <div class="stars">
                                ★ ★ ★ ★ ★
                            </div>
                        </div>
                        <span class="delete-icon" data-id="5">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 6h18M8 6V4c0-1.1.9-2 2-2h4c1.1 0 2 .9 2 2v2M10 11v6M14 11v6M4 6l1 16h14l1-16M9 6h6"/>
                            </svg>
                        </span>
                    </div>
                </div>

                <!-- Card 6 -->
                <div class="col-md-4">
                    <div class="feedback-card">
                        <p>"This Pujari provided incredible insights into my life and personality. Their predictions about my career path were spot-on, and their guidance helped me make better decisions. Highly recommend for anyone seeking clarity!"</p>
                        <div class="user-info">
                            <div class="user-details">
                                <img src="<?php echo base_url('assets/images/Pujari/Rectangle 5160 (1).png'); ?>" alt="User">
                                <div>
                                    <strong>Jane Doe</strong><br>
                                    <small>3 days ago</small>
                                </div>
                            </div>
                            <div class="stars">
                                ★ ★ ★ ★ ★
                            </div>
                        </div>
                        <span class="delete-icon" data-id="6">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 6h18M8 6V4c0-1.1.9-2 2-2h4c1.1 0 2 .9 2 2v2M10 11v6M14 11v6M4 6l1 16h14l1-16M9 6h6"/>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>

    <script>
        // Delete functionality with SweetAlert2
        document.querySelectorAll('.delete-icon').forEach(icon => {
            icon.addEventListener('click', function() {
                const feedbackId = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#E90505',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, keep it',
                    customClass: {
                        popup: 'animated fadeInDown'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Validation and deletion logic (replace with your backend call)
                        Swal.fire({
                            title: 'Deleted!',
                            text: `Feedback ID ${feedbackId} has been deleted.`,
                            icon: 'success',
                            confirmButtonColor: '#E90505',
                            customClass: {
                                popup: 'animated fadeInDown'
                            }
                        }).then(() => {
                            // Remove the card from the DOM (for demo purposes)
                            this.closest('.feedback-card').remove();
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>