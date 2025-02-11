<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pooja Reminder</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .pooja-card {
            display: flex;
            align-items: center;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-bottom: 20px;
        }
        .pooja-card img {
            width: 150px;
            height: 150px;
            border-radius: 10px;
            object-fit: cover;
            margin-right: 15px;
        }
        .countdown {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center">Pooja Reminder</h2>
        <div class="d-flex justify-content-center gap-3 my-3">
            <button class="btn btn-outline-primary filter-btn" data-type="online">Online Puja</button>
            <button class="btn btn-outline-secondary filter-btn" data-type="offline">Offline Puja</button>
            <button class="btn btn-outline-danger filter-btn" data-type="mob">Mob Puja</button>
        </div>

        <h4>Today's Schedule</h4>
        <div class="row" id="todaySchedule"></div>

        <h4>Upcoming Schedule</h4>
        <div class="row" id="upcomingSchedule"></div>
    </div>

    <script>
        const pujas = [
            { id: 1, type: 'online', image: 'https://via.placeholder.com/150', name: 'Rudraabhishek Puja', date: '2025-12-01T10:30:00', languages: 'English, Hindi, Marathi', experience: 23, price: 500, oldPrice: 710, attendees: 104 },
            { id: 2, type: 'offline', image: 'https://via.placeholder.com/150', name: 'Maha Shivratri Puja', date: '2025-12-01T15:00:00', languages: 'Hindi, Marathi', experience: 15, price: 700, oldPrice: 900, attendees: 250 },
            { id: 3, type: 'mob', image: 'https://via.placeholder.com/150', name: 'Navratri Puja', date: '2025-12-05T08:00:00', languages: 'Sanskrit, Hindi', experience: 30, price: 1000, oldPrice: 1200, attendees: 500 },
            { id: 4, type: 'online', image: 'https://via.placeholder.com/150', name: 'Ganesh Puja', date: '2025-12-10T10:00:00', languages: 'Hindi, Marathi, English', experience: 12, price: 600, oldPrice: 800, attendees: 320 },
            { id: 5, type: 'offline', image: 'https://via.placeholder.com/150', name: 'Kali Puja', date: '2025-12-15T18:00:00', languages: 'Bengali, Hindi', experience: 20, price: 900, oldPrice: 1100, attendees: 220 }
        ];

        function generateCards() {
            const today = new Date();
            let todayHTML = '', upcomingHTML = '';
            
            pujas.forEach(puja => {
                const pujaDate = new Date(puja.date);
                const countdown = getCountdown(pujaDate);
                let card = `
                    <div class="col-md-6">
                        <div class="pooja-card">
                            <img src="${puja.image}" alt="${puja.name}">
                            <div>
                                <h5>${puja.name}</h5>
                                <p>Date: ${pujaDate.toLocaleDateString()}</p>
                                <p>Time: ${pujaDate.toLocaleTimeString()}</p>
                                <p>Languages: ${puja.languages}</p>
                                <p>Experience: ${puja.experience} years</p>
                                <p>Price: <strong>&#8377; ${puja.price}</strong> <del>${puja.oldPrice}</del></p>
                                <p>Attendees: ${puja.attendees}</p>
                                <p class="countdown">Starts in: ${countdown}</p>
                            </div>
                        </div>
                    </div>`;
                
                if (pujaDate.toDateString() === today.toDateString()) {
                    todayHTML += card;
                } else {
                    upcomingHTML += card;
                }
            });

            document.getElementById('todaySchedule').innerHTML = todayHTML || '<p>No poojas today.</p>';
            document.getElementById('upcomingSchedule').innerHTML = upcomingHTML || '<p>No upcoming poojas.</p>';
        }

        function getCountdown(date) {
            const now = new Date();
            const diff = date - now;
            if (diff <= 0) return 'Started';
            
            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            return `${days}d ${hours}h ${minutes}m`;
        }

        generateCards();
        setInterval(generateCards, 60000); // Update every minute
    </script>
</body>
</html>
