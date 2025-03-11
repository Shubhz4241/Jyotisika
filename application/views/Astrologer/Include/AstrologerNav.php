<style>
    body {
        background-color: #f8f9fa;
        margin-top: 5rem;
    }

    /* Navbar Styling */
    .navbar {
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 10px 40px;
        position: fixed;
        width: 100%;
        top: 0;
        z-index: 1000;
    }

    .logo-container img {
        width: 70px;
        /* Reduced logo size */
        height: auto;
    }

    .menu-items a {
        text-decoration: none;
        color: #000;
        margin: 0 23px;
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
        /* White icon */
        transition: color 0.3s ease;
        
    }

    .notification-icon i:hover {
        color: #0A6DFF
            /* Blue hover effect */
    }

    /* Notification Container (Dropdown) */
    .notification-container {
        display: none;
        /* Initially hidden */
        position: absolute;
        top: 50px;
        right: 70px;
        /* Adjusted to prevent overflow near profile image */
        background: #fff;
        width: 350px;
        border-radius: 10px;
        padding: 15px;
        border: 2px solid #333;
        /* Light black border */
        box-shadow: 0px 4px 10px rgba(252, 251, 251, 0.1);
        z-index: 1001;
    }

    /* Prevent Overflow on Profile Image */
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

    /* Header */
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

    /* Notification Actions */
    .notification-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
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

    /* Notifications List */
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

    /* Previous Notification Link */
    .previous-notifications {
        text-align: center;
        margin-top: 15px;
    }

    .previous-notifications a {
        color: #0A6DFF;
        font-weight: 500;
        text-decoration: none;
    }

    /* Responsive Notification */
    @media (max-width: 768px) {
        .notification-container {
            width: 80%;
            /* right: 5%; */
            margin-top: 27px;
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
        }

        .menu-toggle {
            display: block;
        }
    }
</style>

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
    <a href="<?php echo base_url() . 'AstrologerUser/AstrologerDashboard'; ?>">Home</a>
        <a href="<?php echo base_url() . 'AstrologerUser/AstrologerRecentRequest'; ?>">Requests</a>
        <!-- <a href="<?php echo base_url() . 'AstrologerUser/AstrologerAnalyticsandEarning1'; ?>">Analytics</a> -->
        <a href="<?php echo base_url() . 'AstrologerUser/AstrologerAnalyticsAndEarning2'; ?>">Earnings</a>

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
                <button class="close-btn" id="closeNotification">&times;</button>
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

        <a href="<?php echo base_url() . 'PujariUser/ProfileForm'; ?>">
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

    // Notification Toggle
    const notificationIcon = document.getElementById('notificationIcon');
    const notificationDropdown = document.getElementById('notificationDropdown');
    const closeNotification = document.getElementById('closeNotification');

    notificationIcon.addEventListener('click', (event) => {
        event.stopPropagation(); // Prevents the click from closing immediately
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
</script>


<!-- Bootstrap Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>