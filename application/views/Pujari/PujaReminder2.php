<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pooja Reminder - Mob Puja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', serif;
            background-color: #fff;
            margin: 0;
            /* padding: 20px; */
        }

        @media (min-width: 768px) {
            .puja-card-online img {
                width: 200px;
                height: 134px;
                margin-right: 15px;
                margin-bottom: 0;
                border-radius: 62%;
            }
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
            font-weight: 600;
            margin-bottom: 15px;
        }

        .btn-filter {
            background-color: #e0e0e0;
            border: none;
            border-radius: 20px;
            padding: 8px 16px;
            font-size: 14px;
            margin: 0 5px;
        }

        .btn-filter.active {
            background-color: #e0aaff;
            color: #000;
        }

        /* Base styles for all puja cards */
        .puja-card-online,
        .puja-card-offline,
        .puja-card-mob {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border: 2px solid #ff9f00;
            display: flex;
            flex-direction: column;
            align-items: center;
            /* padding: 10px; */
            margin-bottom: 15px;
        }

        /* Specific styles for each puja type */
        .puja-card-online img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .puja-card-offline img {
            width: 30%;
            height: 100px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .puja-card-mob img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* margin-bottom: 10px; */
        }

        .puja-card-online .content,
        .puja-card-offline .content,
        .puja-card-mob .content {
            text-align: center;
            padding: 0;
            width: 100%;
        }

        .puja-card-online h5,
        .puja-card-offline h5,
        .puja-card-mob h5 {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .puja-card-online p,
        .puja-card-offline p,
        .puja-card-mob p {
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
            padding: 8px 12px;
            font-size: 14px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease-in-out;
            margin-top: 10px;
        }

        .reminder-btn img {
            width: 20px;
            height: 20px;
            margin-right: 8px;
        }

        .reminder-btn:hover {
            background-color: #0056b3;
            color: #fff;
        }

        /* Responsive Design for each puja type */
        @media (min-width: 768px) {

            .puja-card-online,
            .puja-card-offline,
            .puja-card-mob {
                flex-direction: row;
                align-items: center;

            }

            .puja-card-mob img {
                width: 200px;
                /* height: 100%; */
                /* margin-right: 15px; */
                margin-bottom: 0;
            }

            .puja-card-online img {
                width: 200px;
                height: 200px;
                margin-right: 15px;
                margin-bottom: 0;
                padding: 30px 0;
                margin-left: 3%;
            }

            .puja-card-offline img {
                width: 200px;
                height: 200px;
                margin-right: 15px;
                margin-bottom: 0;
                padding: 30px 0;
                margin-left: 3%;
            }

            .puja-card-online .content,
            .puja-card-offline .content,
            .puja-card-mob .content {
                text-align: left;
                flex-grow: 1;
            }

            .row-cols-md-2>* {
                flex: 0 0 auto;
                width: 50%;
            }
        }

        @media (max-width: 767px) {

            .puja-card-mob img {
                width: 100%;
                height: auto;
            }

             .puja-card-online img {
                width: 200px;
                height: 150px;
                margin-right: 0px;
                margin-bottom: 0;
                border-radius: 62%;
            }

            .puja-card-online {
                flex-direction: row;
                align-items: center;

            }

            .puja-card-offline img {
                width: 100%;
                height: auto;
            }

            .puja-card-mob img {
                width: 200px;
                height: 100%;
                /* margin-right: 15px; */
                margin-bottom: 0;
            }

            .puja-card-online,
            .puja-card-offline {
                padding: 10px;
            }

            .reminder-btn {
                font-size: 12px;
                padding: 6px 10px;
            }

            .reminder-btn img {
                width: 18px;
                height: 18px;
                margin-right: 6px;
            }
        }

        @media (min-width: 768px) {
            .puja-card-offline img {
                width: 100px;
                height: 140px;
                margin-right: 15px;
                margin-bottom: 0;
                border-radius: 68%;
            }
        }

        @media(max-width:1020px) {
            .puja-card-mob {
                flex-direction: row;
                align-items: center;
            }
        }


        @media(max-width:767px) {
            .puja-card-mob {
                flex-direction: row;
                align-items: center;
            }
        }

        @media(max-width:500px) {
            .puja-card-mob {
                flex-direction: row;
                align-items: center;
            }

            .puja-card-mob img {
                /* width: 100%; */
                /* height: 300px; */
                object-fit: contain;
                margin: 0;
            }
        }

        @media (min-width: 768px) {

            .container,
            .container-md,
            .container-sm {
                max-width: 1100px;
            }
        }
    </style>
</head>

<body>
    <header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>
    <div style="min-height: 100vh;" class="py-3">

        <div class="container">
            <div class="header">
                <h2>Pooja Reminder</h2>
                <div class="d-flex justify-content-center gap-2 mt-3">
                    <button class="btn btn-filter" data-type="offline">Offline Puja</button>
                    <button class="btn btn-filter" data-type="online">Online Puja</button>
                    <button class="btn btn-filter active" data-type="mob">Mob Puja</button>
                </div>
            </div>

            <h4 class="mb-3">Today’s Schedule</h4>
            <div class="row row-cols-1 row-cols-md-2 g-4" id="pujaContainer"></div>

            <div class="d-flex justify-content-between align-items-center mt-5">
                <h4 class="mb-3">Upcoming Schedule</h4>
                <a href="#" class="reminder-btn text-decoration-none">
                    <img src="<?php echo base_url() . 'assets/images/Pujari/Alarm Plus.png' ?>" alt="Set Reminder Icon">
                    Set Reminder
                </a>
            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4" id="upcomingPujaContainer"></div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const pujaData = {
                    online: [{
                            name: "Rudraabhishek Puja",
                            date: "12/03/2025",
                            time: "10:30 am",
                            type: "Online",
                            img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>"
                        },
                        {
                            name: "Rudraabhishek Puja",
                            date: "12/03/2025",
                            time: "10:30 am",
                            type: "Online",
                            img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>"
                        },
                        {
                            name: "Rudraabhishek Puja",
                            date: "12/03/2025",
                            time: "10:30 am",
                            type: "Online",
                            img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>"
                        },
                        {
                            name: "Rudraabhishek Puja",
                            date: "12/03/2025",
                            time: "10:30 am",
                            type: "Online",
                            img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>"
                        }
                    ],
                    offline: [{
                            name: "Rudraabhishek Puja",
                            date: "12/03/2025",
                            time: "10:30 am",
                            location: "XYZ road, ABC colony, Nashik, Maharashtra",
                            distance: "2.5 Kms Away",
                            type: "Offline",
                            img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>"
                        },
                        {
                            name: "Rudraabhishek Puja",
                            date: "12/03/2025",
                            time: "10:30 am",
                            location: "XYZ road, ABC colony, Nashik, Maharashtra",
                            distance: "2.5 Kms Away",
                            type: "Offline",
                            img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>"
                        }
                    ],
                    mob: [{
                            name: "Rudraabhishek Puja",
                            date: "12/03/2025",
                            time: "10:30 am",
                            languages: "English, Hindi, Marathi",
                            experience: "23 years",
                            fee: "500",
                            attendees: "104",
                            countdown: "Starts in: 1d 4h 23m",
                            type: "Mob Puja",
                            img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>"
                        },
                        {
                            name: "Rudraabhishek Puja",
                            date: "12/03/2025",
                            time: "10:30 am",
                            languages: "English, Hindi, Marathi",
                            experience: "23 years",
                            fee: "500",
                            attendees: "104",
                            countdown: "Starts in: 1d 4h 23m",
                            type: "Mob Puja",
                            img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>"
                        }
                    ],
                    upcoming: {
                        online: [{
                                name: "Rudraabhishek Puja",
                                date: "12/03/2025",
                                time: "10:30 am",
                                type: "Online",
                                img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>"
                            },
                            {
                                name: "Rudraabhishek Puja",
                                date: "12/03/2025",
                                time: "10:30 am",
                                type: "Online",
                                img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>"
                            }
                        ],
                        offline: [{
                                name: "Rudraabhishek Puja",
                                date: "12/03/2025",
                                time: "10:30 am",
                                location: "XYZ road, ABC colony, Nashik, Maharashtra",
                                distance: "2.5 Kms Away",
                                type: "Offline",
                                img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>"
                            },
                            {
                                name: "Rudraabhishek Puja",
                                date: "12/03/2025",
                                time: "10:30 am",
                                location: "XYZ road, ABC colony, Nashik, Maharashtra",
                                distance: "2.5 Kms Away",
                                type: "Offline",
                                img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>"
                            }
                        ],
                        mob: [{
                                name: "Rudraabhishek Puja",
                                date: "12/03/2025",
                                time: "10:30 am",
                                languages: "English, Hindi, Marathi",
                                experience: "23 years",
                                fee: "500",
                                attendees: "104",
                                countdown: "Starts in: 1d 4h 23m",
                                type: "Mob Puja",
                                img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>"
                            },
                            {
                                name: "Rudraabhishek Puja",
                                date: "12/03/2025",
                                time: "10:30 am",
                                languages: "English, Hindi, Marathi",
                                experience: "23 years",
                                fee: "500",
                                attendees: "104",
                                countdown: "Starts in: 1d 4h 23m",
                                type: "Mob Puja",
                                img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>"
                            }
                        ]
                    }
                };

                function updatePujaCards(type, containerId, scheduleType = 'pujaData') {
                    const container = document.getElementById(containerId);
                    container.innerHTML = "";

                    const data = scheduleType === 'upcoming' ? pujaData.upcoming[type] : pujaData[type];

                    if (data) {
                        data.forEach(puja => {
                            // Determine the class based on the puja type
                            let cardClass = '';
                            if (type === "online") {
                                cardClass = 'puja-card-online';
                            } else if (type === "offline") {
                                cardClass = 'puja-card-offline';
                            } else if (type === "mob") {
                                cardClass = 'puja-card-mob';
                            }

                            let pujaCard = `
                            <div class="col">
                                <div class="${cardClass}">
                                    <img src="${puja.img}" alt="${puja.name}">
                                    <div class="content px-3">
                                        <h5>${puja.name}</h5>
                                        <p><strong>Date:</strong> ${puja.date}</p>
                                        <p><strong>Time:</strong> ${puja.time}</p>
                        `;

                            if (type === "mob") {
                                pujaCard += `
                                <p><img style="width:20px !important; height:20px !important;" src="<?php echo base_url() . 'assets/images/Pujari/icon.png' ?>" class="icon" alt="Languages">${puja.languages}</p>
                                <p><img style="width:20px !important; height:20px !important;" src="<?php echo base_url() . 'assets/images/Pujari/graduate-cap_svgrepo.com.png' ?>" class="icon" alt="Experience"> <strong>Exp:</strong> ${puja.experience}</p>
                                <p><img src="https://example.com/rupee-icon.png" class="icon" alt="Fee" style="width:20px !important; height:20px !important;"> ${puja.fee}</p>
                                <p><strong>Attendee :</strong> ${puja.attendees}</p>
                                <p style="color:Red"><img style="width:20px !important; height:20px !important;" src="<?php echo base_url() . 'assets/images/Pujari/time-filled_svgrepo.com.png' ?>" class="icon" alt="Countdown"> ${puja.countdown}</p>
                            `;
                            } else if (type === "offline") {
                                pujaCard += `
                                <p>${puja.location}</p>
                                <p><img src="https://example.com/location-icon.png" class="icon" alt="Distance"> ${puja.distance}</p>
                            `;
                            } else if (type === "online") {
                                // No additional fields for Online Puja, just the type
                            }

                            pujaCard += `
                                        <p><strong>Puja Type:</strong> ${puja.type}</p>
                                    </div>
                                </div>
                            </div>
                        `;
                            container.innerHTML += pujaCard;
                        });
                    }
                }

                document.querySelectorAll(".btn-filter").forEach(button => {
                    button.addEventListener("click", function() {
                        document.querySelectorAll(".btn-filter").forEach(btn => btn.classList.remove("active"));
                        this.classList.add("active");
                        const type = this.getAttribute("data-type");
                        updatePujaCards(type, "pujaContainer");
                        updatePujaCards(type, "upcomingPujaContainer", 'upcoming');
                    });
                });

                // Default to "Mob Puja" as shown in the image
                updatePujaCards("mob", "pujaContainer");
                updatePujaCards("mob", "upcomingPujaContainer", 'upcoming');
            });
        </script>
    </div>
    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>
</body>

</html>