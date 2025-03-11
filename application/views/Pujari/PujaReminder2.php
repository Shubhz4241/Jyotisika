<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pooja Reminder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Montserrat', serif;
            background-color: #fff;
            margin: 0;
        }

        .header {
            background-color: #fff5e6;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
        }

        .header h2 {
            color: #333;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .btn-filter {
            background-color: #e0e0e0;
            border: none;
            border-radius: 20px;
            padding: 8px 16px;
            font-size: 14px;
            margin: 0 5px;
            cursor: pointer;
        }

        .btn-filter.active {
            background-color: #e0aaff;
            color: #000;
        }

        /* Online Puja Card Styling */
        .puja-card-online {
            background: #fff;
            border: 2px solid #ff9f00;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            padding: 10px;
            background-color: #fff9e6;
            position: relative; /* Added for absolute positioning of reminder button */
        }

        .puja-card-online img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 15px;
        }

        /* Offline Puja Card Styling */
        .puja-card-offline {
            background: #fff;
            border: 2px solid #ff9f00;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            padding: 10px;
            background-color: #f0f8ff;
            position: relative; /* Added for absolute positioning of reminder button */
        }

        .puja-card-offline img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            margin-right: 15px;
        }

        /* Mob Puja Card Styling */
        .puja-card-mob {
            background: #fff;
            border: 2px solid #ff9f00;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            /* padding: 10px; */
            background-color: #f5f5f5;
            position: relative; /* Added for absolute positioning of reminder button */
        }

        .puja-card-mob p {
            margin: 0;
        }

        .puja-card-mob img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 15px;
        }

        .puja-card-online .content,
        .puja-card-offline .content,
        .puja-card-mob .content {
            flex-grow: 1;
            text-align: left;
            margin-bottom: 15px;
        }

        .puja-card h5 {
            font-size: 16px;
            /* font-weight: 400; */
            color: #333;
            margin-bottom: 5px;
        }

        .puja-card p {
            font-size: 14px;
            color: #666;
            margin-bottom: 3px;
        }

        .icon {
            width: 16px;
            height: 16px;
            vertical-align: middle;
            margin-right: 5px;
        }

        .reminder-btn {
            background-color: #0EDF50;
            color: #000;
            border: none;
            padding: 5px 10px;
            font-size: 12px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            margin-left: 10px;
        }

        .reminder-btn img {
            width: 18px;
            height: 18px;
            margin-right: 6px;
        }

        .reminder-btn:hover {
            background-color: #0056b3;
            color: #fff;
        }

        /* Reminder Button Styling (Top-Right Corner) */
        .reminder-btn-online {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #0EDF50; /* Green for Online */
            color: #fff;
            border: none;
            padding: 5px 10px;
            font-size: 12px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .reminder-btn-online img {
            width: 18px;
            height: 18px;
            margin-right: 6px;
        }

        .reminder-btn-online:hover {
            background-color: #0CBE40;
            color: #fff;
        }

        .reminder-btn-offline {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #FF5733; /* Orange for Offline */
            color: #fff;
            border: none;
            padding: 5px 10px;
            font-size: 12px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .reminder-btn-offline img {
            width: 18px;
            height: 18px;
            margin-right: 6px;
        }

        .reminder-btn-offline:hover {
            background-color: #E04E2D;
            color: #fff;
        }

        .reminder-btn-mob {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #007BFF; /* Blue for Mob */
            color: #fff;
            border: none;
            padding: 5px 10px;
            font-size: 12px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .reminder-btn-mob img {
            width: 18px;
            height: 18px;
            margin-right: 6px;
        }

        .reminder-btn-mob:hover {
            background-color: #0056b3;
            color: #fff;
        }

        /* Responsive Design */
        .puja-card-offline img {
            width: 100px;
            height: 100px;
        }

        .puja-card-online img {
            width: 150px;
            height: 150px;
            margin-bottom: 10px;
        }

        .puja-card-mob img {
            width: 200px;
            height: 100%;
            margin-bottom: 10px;
        }

        .puja-card-online,
        .puja-card-offline {
            padding: 15px;
        }

        .reminder-btn {
            padding: 8px 12px;
            font-size: 14px;
        }

        .reminder-btn img {
            width: 20px;
            height: 20px;
        }

        @media(max-width:1092px) {
            .puja-card-mob {
                flex-direction: column;
            }
        }

        @media (max-width: 767px) {
            .puja-card-online,
            .puja-card-offline,
            .puja-card-mob {
                flex-direction: column;
                text-align: center;
            }

            .puja-card-online img,
            .puja-card-offline img,
            .puja-card-mob img {
                margin-right: 0;
                margin-bottom: 10px;
            }

            .reminder-btn-online,
            .reminder-btn-offline,
            .reminder-btn-mob {
                position: absolute;
                top: 8px;
                right: 8px;
                padding: 5px 10px;
                font-size: 12px;
            }

            .reminder-btn-online img,
            .reminder-btn-offline img,
            .reminder-btn-mob img {
                width: 18px;
                height: 18px;
                margin-right: 6px;
            }
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .puja-card-mob {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .reminder-btn1 {
            position: none;
            top: 19px;
            right: 10px;
            background: #FF5733;
            /* Orange color */
            color: white;
            padding: 10px 10px;
            font-size: 12px;
            border-radius: 5px;
            text-decoration: none;
            /* display: flex; */
            align-items: center;
            margin-left: 178px;
        }

        .reminder-btn1 img {
            width: 15px;
            height: 15px;
            margin-right: 5px;
        }

        .h5,
        h5 {
            font-size: 1.25rem;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>
    <div style="min-height: 100vh;">
        <div class="container">
            <div class="header">
                <h2>Pooja Reminder</h2>
                <div class="d-flex justify-content-center gap-2 mt-3">
                    <button class="btn btn-filter" onclick="document.querySelector('.online-section').style.display='block'; document.querySelector('.offline-section').style.display='none'; document.querySelector('.mob-section').style.display='none'; this.classList.add('active'); this.nextElementSibling.classList.remove('active'); this.nextElementSibling.nextElementSibling.classList.remove('active');">Online Puja</button>
                    <button class="btn btn-filter" onclick="document.querySelector('.online-section').style.display='none'; document.querySelector('.offline-section').style.display='block'; document.querySelector('.mob-section').style.display='none'; this.classList.add('active'); this.previousElementSibling.classList.remove('active'); this.nextElementSibling.classList.remove('active');">Offline Puja</button>
                    <button class="btn btn-filter active" onclick="document.querySelector('.online-section').style.display='none'; document.querySelector('.offline-section').style.display='none'; document.querySelector('.mob-section').style.display='block'; this.classList.add('active'); this.previousElementSibling.classList.remove('active'); this.previousElementSibling.previousElementSibling.classList.remove('active');">Mob Puja</button>
                </div>
            </div>

            <!-- Online Puja Section -->
            <div class="online-section" style="display: none;">
                <h4 class="mb-3">Today’s Schedule</h4>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <div class="col">
                        <div class="puja-card-online">
                            <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>" alt="Rudraabhishek Puja">
                            <div class="content">
                                <h5>Puja - Rudraabhishek Puja</h5>
                                <p><strong>Date :</strong> 12/1/2025</p>
                                <p><strong>Time :</strong> 10:30 am</p>
                                <p><strong>Puja Type -</strong> Online</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="puja-card-online">
                            <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>" alt="Rudraabhishek Puja">
                            <div class="content">
                                <h5>Puja - Rudraabhishek Puja</h5>
                                <p><strong>Date :</strong> 12/1/2025</p>
                                <p><strong>Time :</strong> 10:30 am</p>
                                <p><strong>Puja Type -</strong> Online</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="mb-3">Upcoming Schedule</h4>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <div class="col">
                        <div class="puja-card-online">
                            <a href="#" class="reminder-btn-online">
                                <img src="<?php echo base_url() . 'assets/images/Pujari/Alarm Plus.png' ?>" alt="Set Reminder" style="width: 20px; height: 20px;"> Set Reminder
                            </a>
                            <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>" alt="Rudraabhishek Puja">
                            <div class="content">
                                <h5>Puja - Rudraabhishek Puja</h5>
                                <p><strong>Date :</strong> 12/1/2025</p>
                                <p><strong>Time :</strong> 10:30 am</p>
                                <p><strong>Puja Type -</strong> Online</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="puja-card-online">
                            <a href="#" class="reminder-btn-online">
                                <img src="<?php echo base_url() . 'assets/images/Pujari/Alarm Plus.png' ?>" alt="Set Reminder" style="width: 20px; height: 20px;"> Set Reminder
                            </a>
                            <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>" alt="Rudraabhishek Puja">
                            <div class="content">
                                <h5>Puja - Rudraabhishek Puja</h5>
                                <p><strong>Date :</strong> 12/1/2025</p>
                                <p><strong>Time :</strong> 10:30 am</p>
                                <p><strong>Puja Type -</strong> Online</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Offline Puja Section -->
            <div class="offline-section" style="display: none;">
                <h4 class="mb-3">Today’s Schedule</h4>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <div class="col">
                        <div class="puja-card-offline">
                            <div>
                                <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>" alt="Rudraabhishek Puja" class="rounded-pill">
                                <div>
                                    <h5>Puja - Rudraabhishek Puja</h5>
                                    <p><strong>Date :</strong> 12/1/2025</p>
                                    <p><strong>Time :</strong> 10:30 am</p>
                                    <p>XYZ road, ABC colony, Nashik, Maharashtra</p>
                                    <p><strong>Puja Type -</strong> Offline</p>
                                </div>
                            </div>
                            <div class="content">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d103890.03043756072!2d73.72090668337974!3d19.991105261292613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddd290b09914b3%3A0xcb07845d9d28215c!2sNashik%2C%20Maharashtra!5e1!3m2!1sen!2sin!4v1741608602489!5m2!1sen!2sin" width="200" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <p class="text-center">szfsdzf</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="puja-card-offline">
                            <div>
                                <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>" alt="Rudraabhishek Puja" class="rounded-pill">
                                <div>
                                    <h5>Puja - Rudraabhishek Puja</h5>
                                    <p><strong>Date :</strong> 12/1/2025</p>
                                    <p><strong>Time :</strong> 10:30 am</p>
                                    <p>XYZ road, ABC colony, Nashik, Maharashtra</p>
                                    <p><strong>Puja Type -</strong> Offline</p>
                                </div>
                            </div>
                            <div class="content">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d103890.03043756072!2d73.72090668337974!3d19.991105261292613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddd290b09914b3%3A0xcb07845d9d28215c!2sNashik%2C%20Maharashtra!5e1!3m2!1sen!2sin!4v1741608602489!5m2!1sen!2sin" width="200" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <p class="text-center">szfsdzf</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="mb-3">Upcoming Schedule</h4>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <div class="col">
                        <div class="puja-card-offline">
                            <a href="#" class="reminder-btn-offline">
                                <img src="<?php echo base_url() . 'assets/images/Pujari/Alarm Plus.png' ?>" alt="Set Reminder" style="width: 20px; height: 20px;"> Set Reminder
                            </a>
                            <div>
                                <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>" alt="Rudraabhishek Puja" class="rounded-pill">
                                <div>
                                    <h5>Puja - Rudraabhishek Puja</h5>
                                    <p><strong>Date :</strong> 12/1/2025</p>
                                    <p><strong>Time :</strong> 10:30 am</p>
                                    <p>XYZ road, ABC colony, Nashik, Maharashtra</p>
                                    <p><strong>Puja Type -</strong> Offline</p>
                                </div>
                            </div>
                            <div class="content">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d103890.03043756072!2d73.72090668337974!3d19.991105261292613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddd290b09914b3%3A0xcb07845d9d28215c!2sNashik%2C%20Maharashtra!5e1!3m2!1sen!2sin!4v1741608602489!5m2!1sen!2sin" width="200" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <p class="text-end w-50">szfsdzf</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="puja-card-offline">
                            <a href="#" class="reminder-btn-offline">
                                <img src="<?php echo base_url() . 'assets/images/Pujari/Alarm Plus.png' ?>" alt="Set Reminder" style="width: 20px; height: 20px;"> Set Reminder
                            </a>
                            <div>
                                <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>" alt="Rudraabhishek Puja" class="rounded-pill">
                                <div>
                                    <h5>Puja - Rudraabhishek Puja</h5>
                                    <p><strong>Date :</strong> 12/1/2025</p>
                                    <p><strong>Time :</strong> 10:30 am</p>
                                    <p>XYZ road, ABC colony, Nashik, Maharashtra</p>
                                    <p><strong>Puja Type -</strong> Offline</p>
                                </div>
                            </div>
                            <div class="content">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d103890.03043756072!2d73.72090668337974!3d19.991105261292613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddd290b09914b3%3A0xcb07845d9d28215c!2sNashik%2C%20Maharashtra!5e1!3m2!1sen!2sin!4v1741608602489!5m2!1sen!2sin" width="200" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <p class="text-end w-50">szfsdzf</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mob Puja Section -->
            <div class="mob-section">
                <h4 class="mb-3">Today’s Schedule</h4>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <div class="col">
                        <div class="puja-card-mob">
                            <img src="<?php echo base_url() . 'assets/images/Pujari/RudraPuja.png' ?>" alt="Rudraabhishek Puja">
                            <div class="content">
                                <h5>Puja - Rudraabhishek Puja</h5>
                                <p><strong>Date :</strong> 12/1/2025</p>
                                <p><strong>Time :</strong> 10:30 am</p>
                                <p>
                                    <img src="<?php echo base_url() . 'assets/images/Pujari/icon.png' ?>"
                                        class="icon" alt="Languages" style="width: 20px; height: 20px;">
                                    English, Hindi, Marathi
                                </p>
                                <p>
                                    <img src="<?php echo base_url() . 'assets/images/Pujari/graduate-cap_svgrepo.com.png' ?>"
                                        class="icon" alt="Languages" style="width: 20px; height: 20px; vertical-align: middle;">
                                    <strong>Exp :</strong> 23 years
                                    <span style="color:#14AE5C; margin-left: 10px;">
                                        <i class="fa fa-inr"></i> <s>500</s> <span style="color: green;">710</span>
                                    </span>
                                </p>
                                <p style="color: #14AE5C;">
                                    <strong>Attendee :</strong> 104
                                </p>
                                <p style="color: red">
                                    <img src="<?php echo base_url() . 'assets/images/Pujari/time-filled_svgrepo.com.png' ?>"
                                        class="icon" alt="Countdown" style="width: 20px; height: 20px;">Starts in : 1d 4h 23m
                                </p>
                                <p><strong>Puja Type -</strong> Mob Puja</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="puja-card-mob">
                            <img src="<?php echo base_url() . 'assets/images/Pujari/RudraPuja.png' ?>" alt="Rudraabhishek Puja">
                            <div class="content">
                                <h5>Puja - Rudraabhishek Puja</h5>
                                <p><strong>Date :</strong> 12/1/2025</p>
                                <p><strong>Time :</strong> 10:30 am</p>
                                <p>
                                    <img src="<?php echo base_url() . 'assets/images/Pujari/icon.png' ?>"
                                        class="icon" alt="Languages" style="width: 20px; height: 20px;">
                                    English, Hindi, Marathi
                                </p>
                                <p>
                                    <img src="<?php echo base_url() . 'assets/images/Pujari/graduate-cap_svgrepo.com.png' ?>"
                                        class="icon" alt="Languages" style="width: 20px; height: 20px; vertical-align: middle;">
                                    <strong>Exp :</strong> 23 years
                                    <span style="color:#14AE5C; margin-left: 10px;">
                                        <i class="fa fa-inr"></i> <s>500</s> <span style="color: green;">710</span>
                                    </span>
                                </p>
                                <p style="color: #14AE5C;">
                                    <strong>Attendee :</strong> 104
                                </p>
                                <p style="color: red">
                                    <img src="<?php echo base_url() . 'assets/images/Pujari/time-filled_svgrepo.com.png' ?>"
                                        class="icon" alt="Countdown" style="width: 20px; height: 20px;">Starts in : 1d 4h 23m
                                </p>
                                <p><strong>Puja Type -</strong> Mob Puja</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="mb-3">Upcoming Schedule</h4>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <div class="col">
                        <div class="puja-card-mob">
                            <a href="#" class="reminder-btn-mob">
                                <img src="<?php echo base_url() . 'assets/images/Pujari/Alarm Plus.png' ?>" alt="Set Reminder" style="width: 20px; height: 20px;"> Set Reminder
                            </a>
                            <img src="<?php echo base_url() . 'assets/images/Pujari/RudraPuja.png' ?>" alt="Rudraabhishek Puja">
                            <div class="content">
                                <h5>Puja - Rudraabhishek Puja</h5>
                                <p><strong>Date :</strong> 12/1/2025</p>
                                <p><strong>Time :</strong> 10:30 am</p>
                                <p>
                                    <img src="<?php echo base_url() . 'assets/images/Pujari/icon.png' ?>"
                                        class="icon" alt="Languages" style="width: 20px; height: 20px;">
                                    English, Hindi, Marathi
                                </p>
                                <p>
                                    <img src="<?php echo base_url() . 'assets/images/Pujari/graduate-cap_svgrepo.com.png' ?>"
                                        class="icon" alt="Languages" style="width: 20px; height: 20px; vertical-align: middle;">
                                    <strong>Exp :</strong> 23 years
                                    <span style="color:#14AE5C; margin-left: 10px;">
                                        <i class="fa fa-inr"></i> <s>500</s> <span style="color: green;">710</span>
                                    </span>
                                </p>
                                <p style="color: #14AE5C;">
                                    <strong>Attendee :</strong> 104
                                </p>
                                <p style="color: red">
                                    <img src="<?php echo base_url() . 'assets/images/Pujari/time-filled_svgrepo.com.png' ?>"
                                        class="icon" alt="Countdown" style="width: 20px; height: 20px;">Starts in : 1d 4h 23m
                                </p>
                                <p><strong>Puja Type -</strong> Mob Puja</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="puja-card-mob">
                            <a href="#" class="reminder-btn-mob">
                                <img src="<?php echo base_url() . 'assets/images/Pujari/Alarm Plus.png' ?>" alt="Set Reminder" style="width: 20px; height: 20px;"> Set Reminder
                            </a>
                            <img src="<?php echo base_url() . 'assets/images/Pujari/RudraPuja.png' ?>" alt="Rudraabhishek Puja">
                            <div class="content">
                                <h5>Puja - Rudraabhishek Puja</h5>
                                <p><strong>Date :</strong> 12/1/2025</p>
                                <p><strong>Time :</strong> 10:30 am</p>
                                <p>
                                    <img src="<?php echo base_url() . 'assets/images/Pujari/icon.png' ?>"
                                        class="icon" alt="Languages" style="width: 20px; height: 20px;">
                                    English, Hindi, Marathi
                                </p>
                                <p>
                                    <img src="<?php echo base_url() . 'assets/images/Pujari/graduate-cap_svgrepo.com.png' ?>"
                                        class="icon" alt="Languages" style="width: 20px; height: 20px; vertical-align: middle;">
                                    <strong>Exp :</strong> 23 years
                                    <span style="color:#14AE5C; margin-left: 10px;">
                                        <i class="fa fa-inr"></i> <s>500</s> <span style="color: green;">710</span>
                                    </span>
                                </p>
                                <p style="color: #14AE5C;">
                                    <strong>Attendee :</strong> 104
                                </p>
                                <p style="color: red">
                                    <img src="<?php echo base_url() . 'assets/images/Pujari/time-filled_svgrepo.com.png' ?>"
                                        class="icon" alt="Countdown" style="width: 20px; height: 20px;">Starts in : 1d 4h 23m
                                </p>
                                <p><strong>Puja Type -</strong> Mob Puja</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>
</body>

</html>