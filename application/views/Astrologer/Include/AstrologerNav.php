<style>
    body {
        background-color: #f8f9fa;
        margin-top: 5rem;
    }

    /* Navbar Styling */
    .navbar {
        background-color: #0C768A;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 1px 40px;
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1000;
    }

    .logo-container img {
        width: 70px;
        height: auto;
        margin: 2px;
    }

    .menu-items {
        display: flex;
        align-items: center;
    }

    .menu-items a {
        text-decoration: none;
        color: white;
        margin: 0 23px;
        font-weight: 500;
    }

    .menu-items a:hover {
        color: #007bff;
    }

    .navbar-right {
        display: flex;
        align-items: center;
        /* gap: 20px; */
    }

    /* Notification Icon */
    .notification-icon {
        font-size: 24px;
        cursor: pointer;
        position: relative;
    }

    .notification-icon i {
        color: white;
        transition: color 0.3s ease;
    }

    .notification-icon i:hover {
        color: #0A6DFF;
    }

    /* Notification Container (Dropdown) */
    .notification-container {
        display: none;
        position: absolute;
        top: 65px;
        right: 179px;
        background: #fff;
        width: 350px;
        max-width: 90vw; /* Added for responsiveness */
        border-radius: 10px;
        padding: 15px;
        /* border: 2px solid #333; */
        box-shadow: 0px 4px 10px rgba(252, 251, 251, 0.1);
        z-index: 1001;
    }

    .notification-container::before {
        content: "";
        position: absolute;
        right: 20px;
        width: 15px;
        height: 15px;
       
        transform: rotate(45deg);
       
    }

    .notification-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .title {
        font-size: 18px;
        /* font-weight: bold; */
    }

    .close-btn {
        background: none;
        border: none;
        font-size: 20px;
        cursor: pointer;
    }

    .notification-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
        flex-wrap: wrap; /* Added for responsiveness */
        gap: 10px; /* Added for responsiveness */
    }

    .tabs a {
        text-decoration: none;
        color: #0A6DFF;
        font-weight: 500;
        border-bottom: 2px solid blue;
        padding-bottom: 3px;
    }

    .mark-read {
        color: #0A6DFF;
        text-decoration: none;
        font-weight: 500;
    }

    .clear-all {
        color: red;
        text-decoration: none;
        font-weight: 500;
        margin-left: 10px;
    }

    .notification-list {
        margin-top: 15px;
        max-height: 250px;
        overflow-y: auto;
    }

    .notification-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #ddd;
    }

    .vertical-line {
        width: 3px;
        height: 35px;
        background: gray;
        margin-right: 10px;
    }

    .notification-item strong {
        font-size: 16px;
    }

    .notification-item p {
        font-size: 14px;
        color: gray;
        margin: 0;
    }

    .time {
        font-size: 12px;
        color: gray;
    }

    .previous-notifications {
        text-align: center;
        margin-top: 15px;
    }

    .previous-notifications a {
        color: #0A6DFF;
        font-weight: 500;
        text-decoration: none;
    }

    .live-btn {
        text-decoration: none;
        background-color: white; /* Changed to white background */
        color: red; /* Changed text color to red */
        padding: 5px 15px;
        border: 1px solid red; /* Added red border */
        border-radius: 4px;
        margin: 0 23px;
        font-weight: 500;
        cursor: pointer;
        display: flex; /* Added to align dot and text */
        align-items: center; /* Center vertically */
        gap: 5px; /* Space between dot and text */
    }

    /* Adding the red dot before the LIVE text using ::before pseudo-element */
    .live-btn::before {
        content: '';
        width: 8px; /* Size of the dot */
        height: 8px;
        background-color: red; /* Red dot */
        border-radius: 50%; /* Make it circular */
    }

    .live-btn:hover {
        background-color: white; /* Keep white background on hover */
        color: darkred; /* Slightly darker red text on hover */
        border-color: darkred; /* Slightly darker red border on hover */
    }

    .live-btn:hover::before {
        background-color: darkred; /* Slightly darker red dot on hover */
    }

    /* Toggle Switch Styling */
    .status-toggle {
        display: flex;
        align-items: center;
        margin-left: 15px; /* Gap between Chat and toggle switch */
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: 0.4s;
        border-radius: 24px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 2px;
        bottom: 2px;
        background-color: white;
        transition: 0.4s;
        border-radius: 50%;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:checked + .slider:before {
        transform: translateX(26px);
    }

    /* Responsive Notification */
    @media (max-width: 768px) {
        .navbar {
            padding: 3px 20px; /* Added for better mobile padding */
        }

        .notification-container {
            width: 58vw; /* Updated from 80% */
            right: 18vw; /* Updated positioning */
            left: auto; /* Added for proper alignment */
            top: 66px; /* Adjusted to match navbar */
            margin-top: 0; /* Removed margin-top: 2px */
        }

        .notification-container::before {
            right: 15px; /* Adjusted arrow position */
        }
    }

    /* Responsive Menu */
    .menu-toggle {
        display: none;
        font-size: 24px;
        cursor: pointer;
    }

    @media (max-width: 768px) {
        .menu-items {
            display: none;
            flex-direction: column;
            background-color: #0C768A;
            position: absolute;
            top: 60px;
            left: 0;
            width: 100%;
            text-align: center;
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .menu-items.show {
            display: flex;
        }

        .menu-items a {
            display: white;
            padding: 10px;
            margin: 10px 0; /* Updated for better spacing */
        }

        .menu-toggle {
            display: block;
        }

        .live-btn {
            margin: 0 10px; /* Adjusted for mobile */
        }

        /* Adjust toggle switch for mobile */
        .status-toggle {
            margin: 10px 0;
            margin-left: 0; /* Reset margin-left for mobile */
        }
    }

    /* Additional responsiveness for very small screens */
    @media (max-width: 480px) {
        .notification-container {
            width: 95vw;
            right: 2.5vw;
        }

        .notification-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 5px;
        }

        .time {
            align-self: flex-end;
        }
    }
    div:where(.swal2-container) div:where(.swal2-popup) {
        width: 303px;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Navbar -->
<nav class="navbar d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
        <div class="logo-container">
            <img src="<?php echo base_url() . 'assets/images/Pujari/logo.png' ?>" alt="Logo">
        </div>
        <div class="menu-toggle" id="menuToggle">
            <i class="bi bi-list"></i>
        </div>
    </div>

    <div class="menu-items" id="menuItems">
        <a href="<?php echo base_url() . 'AstrologerUser/AstrologerAnalyticsAndEarning2'; ?>" class="menu-link">Earnings</a>
        <a href="<?php echo base_url() . 'AstrologerUser/AstrologerFeedBackCard'; ?>" class="menu-link">Feedback</a>
        <a href="<?php echo base_url() . 'AstrologerUser/AstrologerChatUI'; ?>" class="menu-link">Chat</a>
        <!-- Toggle Switch for Online/Offline Status -->
        <div class="status-toggle">
            <label class="switch">
                <input type="checkbox" id="statusToggle">
                <span class="slider"></span>
            </label>
        </div>
    </div>

    <div class="navbar-right">
        <!-- Notification Icon -->
        <div class="notification-icon" id="notificationIcon">
            <i class="bi bi-bell-fill"></i>
        </div>

        <!-- Notification Dropdown (Initially Hidden) -->
        <div class="notification-container" id="notificationDropdown" style="display: none;">
            <div class="notification-header d-flex justify-content-between align-items-center">
                <h3 class="title">Notification</h3>
                <button class="close-btn" id="closeNotification">×</button>
            </div>

            <!-- Notification Actions -->
            <div class="notification-actions d-flex justify-content-between">
                <div class="tabs">
                    <a href="#" class="active">Today</a>
                </div>
                <div>
                    <a href="#" class="mark-read"><i class="fas fa-check"></i> Mark as Read</a>
                    <a href="#" class="clear-all">Clear All</a>
                </div>
            </div>

            <hr>

            <!-- Notification List -->
            <div class="notification-list">
                <div class="notification-item d-flex justify-content-between align-items-center">
                    <div class="d-flex">
                        <div class="vertical-line"></div>
                        <div>
                            <strong>Admin</strong>
                            <p>Your interview has been scheduled</p>
                        </div>
                    </div>
                    <span class="time">2hr ago</span>
                </div>
            </div>
            <!-- Notification List -->
            <div class="notification-list">
                <div class="notification-item d-flex justify-content-between align-items-center">
                    <div class="d-flex">
                        <div class="vertical-line"></div>
                        <div>
                            <strong>Admin</strong>
                            <p>Your interview has been scheduled</p>
                        </div>
                    </div>
                    <span class="time">2hr ago</span>
                </div>
            </div>

            <hr>

            <!-- View Previous Notifications -->
            <div class="previous-notifications">
                <a href="#">View previous Notifications</a>
            </div>
        </div>

       
        <button class="live-btn" id="liveButton">Live</button> <!-- Updated to button with ID -->
        <a href="<?php echo base_url() . 'AstrologerUser/AstrologerProfileForm'; ?>">
            <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160 (1).png'; ?>"
                alt="Profile Image"
                class="profile-img rounded-circle"
                width="30px"
                height="30px">
        </a>
    </div>
</nav>

<script>
    document.getElementById('menuToggle').addEventListener('click', function() {
        document.getElementById('menuItems').classList.toggle('show');
    });

    // Prevent navbar movement on menu item click
    document.querySelectorAll('.menu-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = this.getAttribute('href'); // Navigate without jumping
        });
    });

    // Notification Toggle
    const notificationIcon = document.getElementById('notificationIcon');
    const notificationDropdown = document.getElementById('notificationDropdown');
    const closeNotification = document.getElementById('closeNotification');

    notificationIcon.addEventListener('click', (event) => {
        event.stopPropagation();
        notificationDropdown.style.display =
            notificationDropdown.style.display === 'block' ? 'none' : 'block';
    });

    closeNotification.addEventListener('click', () => {
        notificationDropdown.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (!notificationIcon.contains(event.target) && !notificationDropdown.contains(event.target)) {
            notificationDropdown.style.display = 'none';
        }
    });

    // Live Button SweetAlert with PlayStore Image
    document.getElementById('liveButton').addEventListener('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Download the App now',
            html: `
                <img src="https://play.google.com/intl/en_us/badges/static/images/badges/en_badge_web_generic.png" alt="Get it on Google Play" style="width: 120px; margin-top: 10px; display: block; margin-left: auto; margin-right: auto;">
            `,
            icon: 'info',
            confirmButtonText: 'OK',
            customClass: {
                popup: 'live-swal-popup',
                title: 'live-swal-title',
                htmlContainer: 'live-swal-content',
                confirmButton: 'live-swal-confirm'
            },
            buttonsStyling: false
        });
    });

    // Online/Offline Status Toggle with SweetAlert
    let isOnline = false; // Initial status is Offline
    const statusToggle = document.getElementById('statusToggle');

    // Check if there's a saved status in localStorage
    const savedStatus = localStorage.getItem('isOnline');
    if (savedStatus !== null) {
        isOnline = savedStatus === 'true';
        statusToggle.checked = isOnline;
    }

    statusToggle.addEventListener('change', function() {
        isOnline = statusToggle.checked; // Update status based on toggle state
        localStorage.setItem('isOnline', isOnline); // Save the status to localStorage

        Swal.fire({
            title: `You are now ${isOnline ? 'Online' : 'Offline'}!`,
            text: isOnline ? 'You are now available for users.' : 'You are now unavailable for users.',
            icon: isOnline ? 'success' : 'info',
            confirmButtonText: 'OK',
            customClass: {
                popup: 'custom-swal-popup',
                title: 'custom-swal-title',
                content: 'custom-swal-content',
                confirmButton: 'custom-swal-confirm'
            },
            buttonsStyling: false
        });
    });

    // Custom CSS for SweetAlert (injected via JavaScript)
    const style = document.createElement('style');
    style.innerHTML = `
        /* Styles for Online/Offline SweetAlert */
        .custom-swal-popup {
            border-radius: 15px;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            
        }
        .custom-swal-title {
            font-size: 24px;
            color: #333;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .custom-swal-content {
            font-size: 16px;
            color: #555;
            line-height: 1.5;
        }
        .custom-swal-confirm {
            background-color: #E90505;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }
        .custom-swal-confirm:hover {
            background-color: darkreds;
        }
        .custom-swal-cancel {
            background-color: #6c757d;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }
        .custom-swal-cancel:hover {
            background-color: #5a6268;
        }

        /* Styles for Live Button SweetAlert */
        .live-swal-popup {
            width: 280px; /* Small size */
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
            overflow: hidden; /* Prevent scrollbars */
        }
        .live-swal-title {
            font-size: 18px;
            color: #333;
            font-weight: bold;
            margin-bottom: 10px;
            line-height: 1.2;
        }
        .live-swal-content {
            font-size: 14px;
            color: #555;
            line-height: 1.4;
            margin: 0;
            padding: 0;
        }
        .live-swal-confirm {
            background-color: #E90505;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            border: none;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }
        .live-swal-confirm:hover {
            background-color: darkred;
        }
    `;
    document.head.appendChild(style);
</script>

<!-- Bootstrap Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>