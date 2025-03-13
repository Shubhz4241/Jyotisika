<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astrologer Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        .dashboard-sections {
            padding: 20px;
        }

        .card-wrapper {
            display: flex;
            gap: 20px;
            /* Adds space between cards */
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 30px;
            /* Space before cards */
        }

        .card {
            border-radius: 10px;
            transition: all 0.3s ease;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            width: 48%;
            /* Ensures two cards fit in one row */
        }

        .card:hover {
            transform: scale(1.02);
        }

        .image-container img {
            width: 101%;
            height: 100%;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        @media (max-width: 992px) {
            .card {
                width: 100%;
                /* Makes cards full width on smaller screens */
            }
        }

        @media (max-width: 768px) {
            .d-flex.flex-md-row {
                flex-direction: column !important;
            }

            .image-container img {
                border-radius: 10px 10px 0 0;
            }
        }

        .mt-5 {
            margin-top: 9rem !important;
        }
    </style>
</head>

<body>
    <header>
        <?php $this->load->view('Astrologer/Include/AstrologerNav') ?>
    </header>
    <div style="min-height: 100vh;">
        <div class="container mt-5">
            <div class="card-wrapper">
                <!-- Dynamic Cards -->
                <?php for ($i = 0; $i < 2; $i++): ?>
                    <div class="card">
                        <div class="d-flex flex-column flex-md-row h-100">
                            <div class="image-container">
                                <img src="<?php echo base_url('assets/images/Pujari/Rectangle 5160 (1).png'); ?>" alt="User">
                            </div>
                            <div class="ms-md-3 p-3 flex-grow-1">
                                <h6>John Doe</h6>
                                <p>Puja: Ghar Shanti Puja<br> Date: 12/1/2025 | Time: 10:30 AM<br> Location: Nashik</p>
                                <p>Padit Colony Nashik</p>
                                <button class="btn btn-success btn-sm video-call-btn">Video Call</button>
                                <button class="btn btn-danger btn-sm audio-call-btn">Audio Call</button>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".video-call-btn").forEach(button => {
                button.addEventListener("click", function() {
                    Swal.fire({
                        title: "Start Video Call?",
                        text: "Do you want to initiate a video call?",
                        icon: "info",
                        showCancelButton: true,
                        confirmButtonColor: "#28a745",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, Start Video!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire("Video Call Started!", "Connecting...", "success");
                        }
                    });
                });
            });

            document.querySelectorAll(".audio-call-btn").forEach(button => {
                button.addEventListener("click", function() {
                    Swal.fire({
                        title: "Start Audio Call?",
                        text: "Do you want to initiate an audio call?",
                        icon: "info",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#28a745",
                        confirmButtonText: "Yes, Start Audio!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire("Audio Call Started!", "Connecting...", "success");
                        }
                    });
                });
            });
        });
    </script>

    <footer>
        <?php $this->load->view('Astrologer/Include/AstrologerFooter') ?>
    </footer>
</body>

</html>