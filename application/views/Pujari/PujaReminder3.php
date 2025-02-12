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
                <h5>Puja - Rudraabhishek Puja</h5>
                        <p><strong>Date :</strong> <span class="puja-date">12/1/2025</span></p>
                        <p><strong>Time :</strong> <span class="puja-time">10:30 AM</span></p>
                        <p><i class="fas fa-language"></i> English, Hindi, Marathi</p>
                        <p><i class="fas fa-graduation-cap"></i> Exp: 23 years</p>
                        <p><strong>₹ <span class="puja-price">500</span></strong> <del>710</del></p>
                        <p><strong>Attendee :</strong> <span class="puja-attendees">104</span></p>
                        <p class="countdown"><i class="fas fa-clock"></i> Starts in: <span class="puja-countdown" data-date="2025-12-01T10:30:00"></span></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="puja-card">
            <img src="<?php echo base_url() . 'assets/images/Pujari/RudraPuja.png' ?>"alt="Maha Laxmi Puja">
                <div class="content">
                <h5>Puja - Hanuman Chalisa Path</h5>
                        <p><strong>Date :</strong> <span class="puja-date">12/1/2025</span></p>
                        <p><strong>Time :</strong> <span class="puja-time">4:00 PM</span></p>
                        <p><i class="fas fa-language"></i> Hindi, Marathi</p>
                        <p><i class="fas fa-graduation-cap"></i> Exp: 15 years</p>
                        <p><strong>₹ <span class="puja-price">300</span></strong> <del>450</del></p>
                        <p><strong>Attendee :</strong> <span class="puja-attendees">80</span></p>
                        <p class="countdown"><i class="fas fa-clock"></i> Starts in: <span class="puja-countdown" data-date="2025-12-01T16:00:00"></span></p>
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
                <h5>Puja - Ganesh Aarti</h5>
                        <p><strong>Date :</strong> <span class="puja-date">13/1/2025</span></p>
                        <p><strong>Time :</strong> <span class="puja-time">7:00 AM</span></p>
                        <p><i class="fas fa-language"></i> Sanskrit, Hindi</p>
                        <p><i class="fas fa-graduation-cap"></i> Exp: 10 years</p>
                        <p><strong>₹ <span class="puja-price">200</span></strong> <del>350</del></p>
                        <p><strong>Attendee :</strong> <span class="puja-attendees">50</span></p>
                        <p class="countdown"><i class="fas fa-clock"></i> Starts in: <span class="puja-countdown" data-date="2025-12-02T07:00:00"></span></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="puja-card">
            <img src="<?php echo base_url() . 'assets/images/Pujari/RudraPuja.png' ?>"alt="Hanuman Jayanti">
                <div class="content">
                <h5>Puja - Krishna Janmashtami</h5>
                        <p><strong>Date :</strong> <span class="puja-date">15/1/2025</span></p>
                        <p><strong>Time :</strong> <span class="puja-time">8:00 PM</span></p>
                        <p><i class="fas fa-language"></i> Hindi, Marathi, Gujarati</p>
                        <p><i class="fas fa-graduation-cap"></i> Exp: 18 years</p>
                        <p><strong>₹ <span class="puja-price">600</span></strong> <del>900</del></p>
                        <p><strong>Attendee :</strong> <span class="puja-attendees">120</span></p>
                        <p class="countdown"><i class="fas fa-clock"></i> Starts in: <span class="puja-countdown" data-date="2025-12-04T20:00:00"></span></p>
                    </div>
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
        { 
            name: "Maganesh godsea", 
            date: "12/1/2025", 
            time: "10:30 AM", 
            location: "XYZ Road, Nashik", 
            img: "RudraPuja.png",
            languages: ["English", "Hindi", "Marathi"],
            experience: "23 years",
            price: 500,
            originalPrice: 710,
            attendees: 104
        },
        { 
            name: "Maha Laxmi Puja", 
            date: "13/1/2025", 
            time: "9:00 AM", 
            location: "Temple, Pune", 
            img: "RudraPuja.png",
            languages: ["Hindi", "Marathi"],
            experience: "15 years",
            price: 600,
            originalPrice: 800,
            attendees: 95
        }
    ],
    
};


function updatePujaCards(type) {
    const baseUrl = "<?php echo base_url().'assets/images/Pujari/' ?>";
    const pujaContainer = document.querySelector(".row.row-cols-1.row-cols-md-2.g-4");
    pujaContainer.innerHTML = ""; // Clear existing puja cards

    pujaData[type].forEach(puja => {
        const pujaCard = `
            <div class="col">
                <div class="puja-card">
                    <img src="${baseUrl}${puja.img}" alt="${puja.name}">
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
