<style>
    body {
        background-color: #f8f9fa;
        margin-top: 5rem;
    }

    /* Navbar Styling */
    .navbar {
        background-color: #F6CE57;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 10px 40px;
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1000;
    }

    .logo-container img {
        width: 70px;
        height: auto;
    }

    .menu-items a {
        text-decoration: none;
        color: #000;
        margin: 0 45px;
        font-weight: 500;
    }

    .menu-items a:hover {
        color: #007bff;
    }

    .navbar-right {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    /* Notification Icon */
    .notification-icon {
        font-size: 24px;
        cursor: pointer;
        position: relative;
    }

    .notification-icon i {
        color: black;
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
        right: 200px;
        background: #fff;
        width: 350px;
        max-width: 90vw; /* Added for responsiveness */
        border-radius: 10px;
        padding: 15px;
        border: 2px solid #333;
        box-shadow: 0px 4px 10px rgba(252, 251, 251, 0.1);
        z-index: 1001;
    }

    .notification-container::before {
        content: "";
        position: absolute;
        top: -10px;
        right: 20px;
        width: 15px;
        height: 15px;
        background: #fff;
        transform: rotate(45deg);
        border-left: 2px solid #333;
        border-top: 2px solid #333;
    }

    .notification-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .title {
        font-size: 18px;
        font-weight: bold;
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
        background: black;
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
        background-color: #E90505;
        color: white;
        padding: 5px 15px;
        border-radius: 4px;
        margin: 0 23px;
        font-weight: 500;
        cursor: pointer; /* Added for better UX */
    }

    .live-btn:hover {
        background-color: darkred;
        color: white;
    }

    /* Responsive Notification */
    @media (max-width: 768px) {
        .navbar {
            padding: 10px 20px; /* Added for better mobile padding */
        }

        .notification-container {
            width: 90vw; /* Updated from 80% */
            right: 5vw; /* Updated positioning */
            left: auto; /* Added for proper alignment */
            top: 60px; /* Adjusted to match navbar */
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
            background-color: white;
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
            display: block;
            padding: 10px;
            margin: 10px 0; /* Updated for better spacing */
        }

        .menu-toggle {
            display: block;
        }

        .live-btn {
            margin: 0 10px; /* Adjusted for mobile */
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
</style>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Navbar -->
<nav class="navbar d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
        <div class="logo-container">
            <!-- <img src="<?php echo base_url() . 'assets/images/Pujari/logo.png' ?>" alt="Logo"> -->
        </div>
        <div class="menu-toggle" id="menuToggle">
            <i class="bi bi-list"></i>
        </div>
    </div>

    <div class="menu-items" id="menuItems">
        <a href="<?php echo base_url() . 'AstrologerUser/AstrologerAnalyticsAndEarning2'; ?>">Earnings</a>
        <a href="<?php echo base_url() . 'AstrologerUser/AstrologerFeedBackCard'; ?>">Feedback</a>
        <a href="<?php echo base_url() . 'AstrologerUser/AstrologerChatUI'; ?>">Chat</a>
        <!-- <a href="<?php echo base_url() . 'AstrologerUser/ProductList'; ?>">Products</a> -->
        <!-- <a href="#" class="live-btn">Live</a> -->
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

        <a href="<?php echo base_url() . 'AstrologerUser/AstrologerProfileForm'; ?>">
            <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160 (1).png'; ?>"
                alt="Profile Image"
                class="profile-img rounded-circle"
                width="30px"
                height="30px">
        </a>
        <button class="live-btn" id="liveButton">Live</button> <!-- Updated to button with ID -->
    </div>
</nav>

<script>
    document.getElementById('menuToggle').addEventListener('click', function() {
        document.getElementById('menuItems').classList.toggle('show');
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

    // Live Button SweetAlert
    document.getElementById('liveButton').addEventListener('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Download The App Now',
            text: 'Would you like to download our app to go live?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#E90505',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, Download',
            cancelButtonText: 'No, Thanks'
        }).then((result) => {
            if (result.isConfirmed) {
                // Add your download link or redirect here
                window.location.href = 'your-app-download-link';
            }
        });
    });
</script>

<!-- Bootstrap Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>