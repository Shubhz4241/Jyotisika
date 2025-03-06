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
            font-family: "Montserrat", sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 20px;
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

        .puja-card {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border: 2px solid #ff9f00;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
            margin-bottom: 15px;
        }

        .puja-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .puja-card .content {
            text-align: center;
            padding: 0;
            width: 100%;
        }

        .puja-card h5 {
            font-size: 16px;
            font-weight: 600;
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

        /* Responsive Design */
        @media (min-width: 768px) {
            .puja-card {
                flex-direction: row;
                align-items: center;
                padding: 15px;
            }

            .puja-card img {
                width: 200px;
                height: 200px;
                margin-right: 15px;
                margin-bottom: 0;
            }

            .puja-card .content {
                text-align: left;
                flex-grow: 1;
            }

            .row-cols-md-2 > * {
                flex: 0 0 auto;
                width: 50%;
            }
        }

        @media (max-width: 767px) {
            .puja-card img {
                width: 100%;
                height: auto;
            }

            .puja-card {
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
    </style>
</head>

<body>
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
        </div>
        <div class="row row-cols-1 row-cols-md-2 g-4" id="upcomingPujaContainer"></div>
    </div>
    <style>
              .puja-imgg {
    border-radius: 50%; /* Ensures a circular shape */
    width: 300px; /* Default size for large screens */
    height: 150px !important; /* Height must match width for a perfect circle */
    object-fit: cover; /* Ensures the image fills the shape without distortion */
    display: block; /* Prevents inline spacing issues */
    margin: auto; /* Centers the image */
}

/* Responsive styling for mobile */
@media (max-width: 767px) {
    .puja-imgg {
        width: 35% !important; /* Smaller size for mobile */
        height: 120px; /* Match width for a circle */
    }
}

                </style>
    <script>
       document.addEventListener("DOMContentLoaded", function() {
    const pujaData = {
        online: [
            { name: "Rudraabhishek Puja", date: "12/03/2025", time: "10:30 am", type: "Online", img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png'; ?>" },
            { name: "Rudraabhishek Puja", date: "12/03/2025", time: "10:30 am", type: "Online", img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png'; ?>" },
            { name: "Rudraabhishek Puja", date: "12/03/2025", time: "10:30 am", type: "Online", img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png'; ?>" },
            { name: "Rudraabhishek Puja", date: "12/03/2025", time: "10:30 am", type: "Online", img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png'; ?>" }
        ],
        offline: [
            { name: "Rudraabhishek Puja", date: "12/03/2025", time: "10:30 am", location: "XYZ road, ABC colony, Nashik, Maharashtra", distance: "2.5 Kms Away", type: "Offline", img: "<?php echo base_url() . 'assets/images/Pujari/Tick Circle.png'; ?>" },
            { name: "Rudraabhishek Puja", date: "12/03/2025", time: "10:30 am", location: "XYZ road, ABC colony, Nashik, Maharashtra", distance: "2.5 Kms Away", type: "Offline", img: "<?php echo base_url() . 'assets/images/Pujari/Tick Circle.png'; ?>" }
        ],
        mob: [
            { name: "Rudraabhishek Puja", date: "12/03/2025", time: "10:30 am", languages: "English, Hindi, Marathi", experience: "23 years", fee: "500", attendees: "104", countdown: "Starts in: 1d 4h 23m", type: "Mob Puja", img: "<?php echo base_url() . 'assets/images/Pujari/Tick Circle.png'; ?>" },
            { name: "Rudraabhishek Puja", date: "12/03/2025", time: "10:30 am", languages: "English, Hindi, Marathi", experience: "23 years", fee: "500", attendees: "104", countdown: "Starts in: 1d 4h 23m", type: "Mob Puja", img: "<?php echo base_url() . 'assets/images/Pujari/Tick Circle.png'; ?>" }
        ],
        upcoming: {
            online: [
                { name: "Rudraabhishek Puja", date: "12/03/2025", time: "10:30 am", type: "Online", img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png'; ?>" },
                { name: "Rudraabhishek Puja", date: "12/03/2025", time: "10:30 am", type: "Online", img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png'; ?>" }
            ],
            offline: [
                { name: "Rudraabhishek Puja", date: "12/03/2025", time: "10:30 am", location: "XYZ road, ABC colony, Nashik, Maharashtra", distance: "2.5 Kms Away", type: "Offline", img: "<?php echo base_url() . 'assets/images/Pujari/Tick Circle.png'; ?>" },
                { name: "Rudraabhishek Puja", date: "12/03/2025", time: "10:30 am", location: "XYZ road, ABC colony, Nashik, Maharashtra", distance: "2.5 Kms Away", type: "Offline", img: "<?php echo base_url() . 'assets/images/Pujari/Tick Circle.png'; ?>" }
            ],
            mob: [
                { name: "Rudraabhishek Puja", date: "12/03/2025", time: "10:30 am", languages: "English, Hindi, Marathi", experience: "23 years", fee: "500", attendees: "104", countdown: "Starts in: 1d 4h 23m", type: "Mob Puja", img: "<?php echo base_url() . 'assets/images/Pujari/Tick Circle.png'; ?>" },
                { name: "Rudraabhishek Puja", date: "12/03/2025", time: "10:30 am", languages: "English, Hindi, Marathi", experience: "23 years", fee: "500", attendees: "104", countdown: "Starts in: 1d 4h 23m", type: "Mob Puja", img: "<?php echo base_url() . 'assets/images/Pujari/Tick Circle.png'; ?>" }
            ]
        }
    };

    function updatePujaCards(type, containerId, scheduleType = 'pujaData') {
    const container = document.getElementById(containerId);
    container.innerHTML = "";

    const data = scheduleType === 'upcoming' ? pujaData.upcoming[type] : pujaData[type];

    if (data) {
        data.forEach(puja => {
            let pujaCard = `
                <div class="col">
                    <div class="puja-card">
                        <img src="${puja.img}" alt="${puja.name}" class="puja-imgg">
                        <div class="content">
                            <h5>${puja.name}</h5>
                            <p><strong>Date:</strong> ${puja.date}</p>
                            <p><strong>Time:</strong> ${puja.time}</p>
            `;

            if (type === "mob") {
                pujaCard += `
                    <p><strong>Languages:</strong> ${puja.languages}</p>
                    <p><strong>Exp:</strong> ${puja.experience}</p>
                    <p><strong>Fee:</strong> ${puja.fee}</p>
                    <p><strong>Attendees:</strong> ${puja.attendees}</p>
                    <p style="color: #ff0000;"><strong>Countdown:</strong> ${puja.countdown}</p>
                `;
            } else if (type === "offline") {
                pujaCard += `
                    <p><strong>Location:</strong> ${puja.location}</p>
                    <p><strong>Distance:</strong> ${puja.distance}</p>
                `;
            }

            pujaCard += `<p><strong>Puja Type:</strong> ${puja.type}</p>`;

            // ✅ Add "Set Reminder" button ONLY for upcoming pujas
            if (scheduleType === "upcoming") {
                pujaCard += `<a href="#" class="reminder-btn">🔔 Set Reminder</a>`;
            }

            pujaCard += `
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

    // Default selection
    updatePujaCards("mob", "pujaContainer");
    updatePujaCards("mob", "upcomingPujaContainer", 'upcoming');
});

    </script>
</body>

</html>