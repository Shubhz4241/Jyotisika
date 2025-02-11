<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pooja Reminder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
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
            height: 180px;
            object-fit: cover;
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
    </style>
</head>
<body>
<header>
    <?php $this->load->view('Pujari/Include/PujariNav') ?>
</header>

<div class="container mt-4">
    <h2 class="text-center mb-4">Pooja Reminder</h2>

    <!-- Puja Category Filter Buttons -->
    <div class="d-flex flex-wrap justify-content-end gap-2 mb-4">
        <button class="btn btn-outline-secondary btn-filter active" data-type="offline">Offline Puja</button>
        <button class="btn btn-outline-secondary btn-filter" data-type="online">Online Puja</button>
        <button class="btn btn-outline-secondary btn-filter" data-type="mob">Mob Puja</button>
    </div>

    <!-- Today's Schedule -->
    <h4 class="mb-3">Today's Schedule</h4>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="puja-card">
            <img src="<?php echo base_url() . 'assets/images/Pujari/RudraPuja.png' ?>"alt="Rudraabhishek Puja">
                <div class="content">
                    <h5>Rudraabhishek Puja</h5>
                    <p><strong>Date:</strong> 12/1/2025</p>
                    <p><strong>Time:</strong> 10:30 AM</p>
                    <p><strong>Location:</strong> XYZ Road, Nashik</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="puja-card">
            <img src="<?php echo base_url() . 'assets/images/Pujari/RudraPuja.png' ?>"alt="Maha Laxmi Puja">
                <div class="content">
                    <h5>Maha Laxmi Puja</h5>
                    <p><strong>Date:</strong> 13/1/2025</p>
                    <p><strong>Time:</strong> 9:00 AM</p>
                    <p><strong>Location:</strong> Temple, Pune</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Upcoming Schedule -->
    <div class="d-flex justify-content-between align-items-center mt-4">
        <h4>Upcoming Schedule</h4>
        <button class="btn btn-set-reminder">
            <img src="<?php echo base_url() . 'assets/images/Pujari/Alarm Plus.png' ?>" alt="Reminder Icon" width="25">
            Set Reminder
        </button>
    </div>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="puja-card">
            <img src="<?php echo base_url() . 'assets/images/Pujari/RudraPuja.png' ?>" alt="Ganesh Pooja">
                <div class="content">
                    <h5>Ganesh Pooja</h5>
                    <p><strong>Date:</strong> 14/1/2025</p>
                    <p><strong>Time:</strong> 6:00 PM</p>
                    <p><strong>Location:</strong> Shrine, Mumbai</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="puja-card">
            <img src="<?php echo base_url() . 'assets/images/Pujari/RudraPuja.png' ?>"alt="Hanuman Jayanti">
                <div class="content">
                    <h5>Hanuman Jayanti</h5>
                    <p><strong>Date:</strong> 15/1/2025</p>
                    <p><strong>Time:</strong> 7:30 AM</p>
                    <p><strong>Location:</strong> Ram Mandir, Nagpur</p>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <?php $this->load->view('Pujari/Include/PujariFooter') ?>
</footer>

<script>
   document.addEventListener("DOMContentLoaded", function () {
    const pujaData = {
        offline: [
            { name: "Rudraabhishek Puja", date: "12/1/2025", time: "10:30 AM", location: "XYZ Road, Nashik", img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>" },
            { name: "Maha Laxmi Puja", date: "13/1/2025", time: "9:00 AM", location: "Temple, Pune", img: "<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160.png' ?>" }
        ],
        online: [
            { name: "Online Puja 1", date: "20/2/2025", time: "2:00 PM", location: "Online via Zoom", img: "<?php echo base_url() . 'assets/images/Pujari/OnlinePuja1.png' ?>" },
            { name: "Online Puja 2", date: "21/2/2025", time: "4:00 PM", location: "YouTube Live", img: "<?php echo base_url() . 'assets/images/Pujari/OnlinePuja2.png' ?>" }
        ],
        mob: [
            { name: "Mobile Puja 1", date: "25/2/2025", time: "8:00 AM", location: "Video Call", img: "<?php echo base_url() . 'assets/images/Pujari/MobPuja1.png' ?>" },
            { name: "Mobile Puja 2", date: "26/2/2025", time: "6:45 PM", location: "WhatsApp Call", img: "<?php echo base_url() . 'assets/images/Pujari/MobPuja2.png' ?>" }
        ]
    };

    function updatePujaCards(type) {
        const pujaContainer = document.querySelector(".row.row-cols-1.row-cols-md-2.g-4");
        pujaContainer.innerHTML = ""; // Clear existing puja cards
        pujaData[type].forEach(puja => {
            const pujaCard = `
                <div class="col">
                    <div class="puja-card">
                        <img src="${puja.img}" alt="${puja.name}">
                        <div class="content">
                            <h5>${puja.name}</h5>
                            <p><strong>Date:</strong> ${puja.date}</p>
                            <p><strong>Time:</strong> ${puja.time}</p>
                            <p><strong>Location:</strong> ${puja.location}</p>
                        </div>
                    </div>
                </div>
            `;
            pujaContainer.innerHTML += pujaCard;
        });
    }

    // Add event listeners to filter buttons
    document.querySelectorAll(".btn-filter").forEach(button => {
        button.addEventListener("click", function () {
            document.querySelectorAll(".btn-filter").forEach(btn => btn.classList.remove("active"));
            this.classList.add("active");
            updatePujaCards(this.getAttribute("data-type"));
        });
    });

    // Load default category (Offline Puja)
    updatePujaCards("offline");
});

</script>


</body>
</html>
