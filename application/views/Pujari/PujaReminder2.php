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
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/Pujari/jyotishvitaran.png');?>" type="image/png">
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
            position: relative;
            /* Added for absolute positioning of reminder button */
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
            position: relative;
            /* Added for absolute positioning of reminder button */
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
            position: relative;
            /* Added for absolute positioning of reminder button */
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
            top: 2px;
            right: 10px;
            background-color: #0EDF50;
            /* Green for Online */
            color: #fff;
            border: none;
            padding: 2px 10px;
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
            top: 2px;
            right: 10px;
            background-color: #FF5733;
            /* Orange for Offline */
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
            top: 2px;
            right: 10px;
            background-color: #007BFF;
            /* Blue for Mob */
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
            /* margin-bottom: 10px; */
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
                padding: 2px 10px;
                font-size: 12px;

            }

            .reminder-btn-mob {
                position: absolute;
                top: 8px;
                right: 8px;
                padding: 5px 10px;
                font-size: 12px;
                margin-top: 267px;
            }

            .reminder-btn-online {
                position: absolute;
                top: 8px;
                right: 8px;
                padding: 2px 10px;
                font-size: 12px;
                margin-top: -4px;
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
                    <button class="btn btn-filter" onclick="showSection('online')">Online Puja</button>
                    <button class="btn btn-filter active" onclick="showSection('mob')">Mob Puja</button>
                </div>
            </div>

            <!-- Online Puja Section -->
            <div class="online-section" style="display: none;">
                <h4 class="mb-3">Today’s Schedule</h4>
                <div class="row row-cols-1 row-cols-md-2 g-4 online-today"></div>
                <h4 class="mb-3">Upcoming Schedule</h4>
                <div class="row row-cols-1 row-cols-md-2 g-4 online-upcoming"></div>
            </div>

            <!-- Mob Puja Section -->
            <div class="mob-section" style="display: block;">
                <h4 class="mb-3">Today’s Schedule</h4>
                <div class="row row-cols-1 row-cols-md-2 g-4 mob-today"></div>
                <h4 class="mb-3">Upcoming Schedule</h4>
                <div class="row row-cols-1 row-cols-md-2 g-4 mob-upcoming"></div>
            </div>
        </div>
    </div>
    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Define showSection in the global scope
        function showSection(section) {
            document.querySelector('.online-section').style.display = section === 'online' ? 'block' : 'none';
            document.querySelector('.mob-section').style.display = section === 'mob' ? 'block' : 'none';
            document.querySelectorAll('.btn-filter').forEach(btn => btn.classList.remove('active'));
            document.querySelector(`.btn-filter[onclick="showSection('${section}')"]`).classList.add('active');
        }
        const pujariId = <?php echo json_encode($pujari_id); ?>;

        async function fetchPujaSchedules() {
            try {
                const response = await fetch('<?php echo base_url('PujariController/getPujaSchedules/'); ?>'+pujariId, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });

                if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

                const result = await response.json();
                console.log("API Response:", result);

                if (result.status && result.data) {
                    renderSchedules('online-today', result.data.online.today, 'online', false);
                    renderSchedules('online-upcoming', result.data.online.upcoming, 'online', true);
                    renderSchedules('mob-today', result.data.mob.today, 'mob', false);
                    renderSchedules('mob-upcoming', result.data.mob.upcoming, 'mob', true);
                }
            } catch (error) {
                console.error("Error fetching schedules:", error);
            }
        }

        function renderSchedules(containerClass, schedules, type, showReminder) {
            const container = document.querySelector(`.${containerClass}`);
            container.innerHTML = '';

            if (!schedules || schedules.length === 0) {
                container.innerHTML = '<p>No schedules found.</p>';
                return;
            }

            schedules.forEach(schedule => {
                console.log("Schedule item:", schedule);
                const card = document.createElement('div');
                card.className = `col`;
                const idField = type === 'online' ? 'book_puja_id' : 'id';
                card.innerHTML = `
            <div class="puja-card-${type}">
                ${showReminder ? `
                    <a href="#" class="reminder-btn-${type}" 
                       data-puja-id="${schedule[idField] || 'N/A'}" 
                       data-puja-name="${schedule.puja_name || ''}"
                       data-puja-date="${schedule.puja_date || ''}"
                       data-puja-time="${schedule.puja_time || ''}"
                       data-puja-type="${type}"
                       ${type === 'online' ? `
                           data-user-name="${schedule.user_name || ''}"
                        
                       ` : `
                           data-discount-price="${schedule.discount_price || ''}"
                           data-total-attendee="${schedule.total_attendee || ''}"
                           data-original-price="${schedule.original_price || ''}"
                           data-attendee="${schedule.attendee || '0'}"
                       `}>
                        <img src="<?php echo base_url('assets/images/Pujari/Alarm Plus.png'); ?>" alt="Set Reminder" style="width: 20px; height: 20px;"> Set Reminder
                    </a>
                ` : ''}
                <img src="<?php echo base_url('assets/images/Pujari/Rectangle 5160.png'); ?>" alt="${schedule.puja_name}">
                <div class="content">
                    <h5>Puja - ${schedule.puja_name}</h5>
                    ${type === 'online' ? `
                        <p><strong>Name :</strong> ${schedule.user_name || 'N/A'}</p>
                       
                    ` : `
                        <p>
                            <span style="color:#14AE5C; margin-left: 10px;">
                                <i class="fa fa-inr"></i> <s>${schedule.original_price || 'N/A'}</s> <span style="color: green;">${schedule.discount_price || 'N/A'}</span>
                            </span>
                        </p>
                        <p style="color: #14AE5C;"><strong>Total Attendee :</strong> ${schedule.total_attendee || 'N/A'}</p>
                        <p style="color: #14AE5C;"><strong>Attendee :</strong> ${schedule.attendee || 'N/A'}</p>
                        <p><strong>Duration :</strong> ${schedule.duration || 'N/A'}</p>

                    `}
                    <p><strong>Date :</strong> ${schedule.puja_date}</p>
                    <p><strong>Time :</strong> ${schedule.puja_time}</p>
                    <p><strong>Puja Type :</strong> ${type.charAt(0).toUpperCase() + type.slice(1)} Puja</p>
                </div>
            </div>
        `;
                container.appendChild(card);
            });

            const buttons = document.querySelectorAll(`.reminder-btn-${type}`);
            buttons.forEach(btn => {
                const newBtn = btn.cloneNode(true);
                btn.parentNode.replaceChild(newBtn, btn);

                newBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const pujaData = {
                        puja_id: this.dataset.pujaId,
                        puja_name: this.dataset.pujaName,
                        puja_date: this.dataset.pujaDate,
                        puja_time: this.dataset.pujaTime,
                        puja_type: this.dataset.pujaType
                    };

                    if (pujaData.puja_type === 'online') {
                        pujaData.user_name = this.dataset.userName;
                       
                    } else {
                        pujaData.discount_price = this.dataset.discountPrice;
                        pujaData.total_attendee = this.dataset.totalAttendee;
                        pujaData.original_price = this.dataset.originalPrice; // Added
                        pujaData.attendee = this.dataset.attendee; // Added
                    }

                    setReminder(pujaData);
                });
            });
        }

        

        function setReminder(pujaData) {
            console.log("Sending pujaData:", pujaData);

            if (!pujaData.puja_id || pujaData.puja_id === 'N/A') {
                alert('Puja ID is missing!');
                return;
            }

            let formData = new URLSearchParams();
            formData.append('puja_id', pujaData.puja_id);
            formData.append('puja_name', pujaData.puja_name);
            formData.append('puja_date', pujaData.puja_date);
            formData.append('puja_time', pujaData.puja_time);
            formData.append('puja_type', pujaData.puja_type);

            if (pujaData.puja_type === 'online') {
                formData.append('user_name', pujaData.user_name);
               
            } else if (pujaData.puja_type === 'mob') {
                formData.append('discount_price', pujaData.discount_price);
                formData.append('total_attendee', pujaData.total_attendee);
                formData.append('original_price', pujaData.original_price); // Added
                formData.append('attendee', pujaData.attendee); // Added
            }

              const pujariId = <?php echo json_encode($pujari_id); ?>;

            fetch('<?php echo base_url('PujariController/setReminder/'); ?>'+pujariId, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status) {
                        alert('Reminder set successfully!');
                    } else {
                        alert('Failed to set reminder: ' + (data.message || 'Unknown error'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to set reminder');
                });
        }
        // Keep the initialization inside DOMContentLoaded
        document.addEventListener("DOMContentLoaded", function() {
            fetchPujaSchedules();
        });
    </script>
</body>

</html>