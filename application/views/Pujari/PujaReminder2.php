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
    <style>
        body {
            font-family: "Montserrat", sans-serif;
        }

        .puja-card {
            background: #f8f9fa;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        
        .puja-card img {
            width: 100%;
            height: 200px;
            object-fit: fill;
        }

        .puja-card .content {
            padding: 15px;
            flex-grow: 1;
        }

        .btn-filter.active {
            background: #e0aaff;
            color: black;
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

        @media (min-width: 768px) {
            .puja-card {
                flex-direction: row;
            }

            .puja-card img {
                width: 40%;
                height: auto;
            }

            .puja-card .content {
                width: 60%;
            }
        }

        .icon-small {
            width: 21px !important;
            /* Adjust size as needed */
            height: 19px !important;
            vertical-align: middle;
            /* Aligns the icon with the text */
            margin-right: 5px;
            /* Adds spacing between the icon and the text */

        }

        .reminder-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #0EDF50;
            color: black;
            border: none;
            padding: 10px 13px;        
            font-size: 16px;
            /* font-weight: bold; */
            border-radius: 10px;
            transition: 0.3s ease-in-out;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }

        .reminder-btn img {
            width: 20px;
            height: 20px;
            margin-right: 8px;
        }

        .reminder-btn:hover {
            background-color: #0056b3;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .reminder-btn {
                font-size: 14px;
                padding: 8px 12px;
            }

            .reminder-btn img {
                width: 18px;
                height: 18px;
                margin-right: 6px;
            }
        }
    </style>
</head>

<body>
    <header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>
    <div style="min-height: 100vh;">
        <div class="container mt-4">
            <h2 class="text-center mb-4">Pooja Reminder</h2>

            <div class="d-flex flex-wrap justify-content-end gap-1 mb-4">
                <button class="btn btn-outline-secondary btn-filter active" data-type="offline">Offline Puja</button>
                <button class="btn btn-outline-secondary btn-filter" data-type="online">Online Puja</button>
                <button class="btn btn-outline-secondary btn-filter" data-type="mob">Mob Puja</button>
            </div>

            <h4 class="mb-3">Today’s Schedule</h4>
            <div class="row row-cols-1 row-cols-md-2 g-2" id="pujaContainer"></div>

            <div class="d-flex justify-content-between align-items-center mt-5">
                <h4 class="mb-3">Upcoming Schedule</h4>
                <a href="<?php echo base_url() . 'PujariUser/PujariDashboard'; ?>" class="reminder-btn text-decoration-none">
                    <img src="<?php echo base_url() . 'assets/images/Pujari/Alarm Plus.png'; ?>" alt="Caret Icon">
                    Set Reminder
                </a>

            </div>
            <div class="row row-cols-1 row-cols-md-2 g-4" id="upcomingPujaContainer"></div>
        </div>

    </div>
    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const pujaData = {
                offline: [{
                        name: "Rudraabhishek Puja",
                        date: "12/1/2025",
                        time: "10:30 AM",
                        location: "XYZ Road, Nashik",
                        img: "<?php echo base_url() . 'assets/images/Pujari/RudraPuja.png' ?>"
                    },
                    {
                        name: "Maha Laxmi Puja",
                        date: "13/1/2025",
                        time: "9:00 AM",
                        location: "Temple, Pune",
                        img: "<?php echo base_url() . 'assets/images/Pujari/RudraPuja.png' ?>"
                    }
                ],
                online: [{
                        name: "Online Rudraabhishek",
                        date: "20/2/2025",
                        time: "2:00 PM",
                        location: "Online via Zoom",
                        img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>"
                    },
                    {
                        name: "Online Rudraabhishek",
                        date: "20/2/2025",
                        time: "2:00 PM",
                        location: "Online via Zoom",
                        img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>"
                    }

                ],
                mob: [{
                        name: "Maha Mrityunjaya Jaap",
                        date: "14/1/2025",
                        time: "7:00 AM",
                        languages: `<img src="<?php echo base_url() . 'assets/images/Pujari/icon.png'; ?>" class="icon-small" alt="Language"> Sanskrit, Hindi`,
                        experience: `<img src="<?php echo base_url() . 'assets/images/Pujari/graduate-cap_svgrepo.com.png'; ?>" class="icon-small" alt="Experience"> 18 years`,
                        fee: "700",
                        discount: "850",
                        attendees: "88",
                        countdown: `<img src="<?php echo base_url() . 'assets/images/Pujari/time-filled_svgrepo.com.png'; ?>" class="icon-small" alt="Experience" width="15px" > Starts in: 2 d 6h`,
                        img: "<?php echo base_url() . 'assets/images/Pujari/RudraPuja.png'; ?>"
                    },

                    {
                        name: "Maha Mrityunjaya Jaap",
                        date: "14/1/2025",
                        time: "7:00 AM",
                        languages: `<img src="<?php echo base_url() . 'assets/images/Pujari/icon.png'; ?>" class="icon-small" alt="Language"> Sanskrit, Hindi`,
                        experience: `<img src="<?php echo base_url() . 'assets/images/Pujari/graduate-cap_svgrepo.com.png'; ?>" class="icon-small" alt="Experience"> 18 years`,
                        fee: "700",
                        discount: "850",
                        attendees: "88",
                        countdown: `<img src="<?php echo base_url() . 'assets/images/Pujari/time-filled_svgrepo.com.png'; ?>" class="icon-small" alt="Experience" width="10px" > Starts in: 2 d 6h`,
                        img: "<?php echo base_url() . 'assets/images/Pujari/RudraPuja.png'; ?>"
                    }



                ],
                upcoming: {
                    offline: [{
                            name: "Chandi Homam",
                            date: "25/2/2025",
                            time: "6:30 AM",
                            location: "Kashi Temple",
                            img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>"
                        },
                        {
                            name: "Chandi Homam",
                            date: "25/2/2025",
                            time: "6:30 AM",
                            location: "Kashi Temple",
                            img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>"
                        }
                    ],
                    online: [{
                            name: "Online Navratri Puja",
                            date: "28/2/2025",
                            time: "5:30 PM",
                            location: "Zoom",
                            img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>"
                        },
                        {
                            name: "Online Navratri Puja",
                            date: "28/2/2025",
                            time: "5:30 PM",
                            location: "Zoom",
                            img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>"
                        }

                    ],
                    mob: [{
                            name: "Graha Shanti",
                            date: "29/2/2025",
                            time: "7:00 AM",
                            languages: `<span class="icon-container"><img src="<?php echo base_url() . 'assets/images/Pujari/icon.png'; ?>" class="icon-small" alt="Language"> Hindi, Marathi</span>`,
                            experience: `<span class="icon-container"><img src="<?php echo base_url() . 'assets/images/Pujari/graduate-cap_svgrepo.com.png'; ?>" class="icon-small" alt="Experience"> 15 years</span>`,
                            fee: "800",
                            discount: "950",
                            attendees: "78",
                            countdown: `<span class="icon-container"><img src="<?php echo base_url() . 'assets/images/Pujari/time-filled_svgrepo.com.png'; ?>" class="icon-small" alt="Countdown"> Starts in: 10d 5h</span>`,
                            img: "<?php echo base_url() . 'assets/images/Pujari/RudraPuja.png'; ?>"
                        },
                        {
                            name: "Graha Shanti",
                            date: "29/2/2025",
                            time: "7:00 AM",
                            languages: `<span class="icon-container"><img src="<?php echo base_url() . 'assets/images/Pujari/icon.png'; ?>" class="icon-small" alt="Language"> Hindi, Marathi</span>`,
                            experience: `<span class="icon-container"><img src="<?php echo base_url() . 'assets/images/Pujari/graduate-cap_svgrepo.com.png'; ?>" class="icon-small" alt="Experience"> 15 years</span>`,
                            fee: "800",
                            discount: "950",
                            attendees: "78",
                            countdown: `<span class="icon-container"><img src="<?php echo base_url() . 'assets/images/Pujari/time-filled_svgrepo.com.png'; ?>" class="icon-small" alt="Countdown"> Starts in: 10d 5h</span>`,
                            img: "<?php echo base_url() . 'assets/images/Pujari/RudraPuja.png'; ?>"
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
                        const pujaCard = `
                    <div class="col">
                        <div class="puja-card">
                            <img src="${puja.img}" alt="${puja.name}">
                            <div class="content">
                                <h5>${puja.name}</h5>
                                <p><strong>Date:</strong> ${puja.date}</p>
                                <p><strong>Time:</strong> ${puja.time}</p>
                                ${type === "mob" ? `
                                <p><strong>Languages:</strong> ${puja.languages}</p>
                                <p><strong>Experience:</strong> ${puja.experience}</p>
                                <p><strong>Fee:</strong> ₹${puja.fee}</p>
                                <p><strong>Discounted:</strong> ₹${puja.discount}</p>
                                <p><strong>Attendees:</strong> ${puja.attendees}</p>
                                <p><strong>${puja.countdown}</strong></p>
                                ` : `<p><strong>Location:</strong> ${puja.location}</p>`}
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

            updatePujaCards("offline", "pujaContainer");
            updatePujaCards("offline", "upcomingPujaContainer", 'upcoming');
        });
    </script>
</body>

</html>