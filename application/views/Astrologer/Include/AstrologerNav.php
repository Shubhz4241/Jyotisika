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
            top:0;
            z-index:1000;
        }

        .logo-container img {
            width: 70px; /* Reduced logo size */
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
        .notification-wrapper {
            position: relative;
        }

        .notification-icon {
            font-size: 1.5rem;
            color: #6c757d;
            cursor: pointer;
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .notification-icon .badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: red;
            color: white;
            font-size: 0.8rem;
            border-radius: 50%;
            padding: 0.2em 0.5em;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* Notification Dropdown */
        .notification-dropdown {
            position: absolute;
            top: 50px;
            right: 0;
            width: 300px;
            background-color: white;
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            z-index: 1000;
            display: none;
        }

        .notification-header {
            padding: 10px 15px;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .notification-item {
            padding: 10px 15px;
            border-bottom: 1px solid #f1f1f1;
        }

        .notification-item:last-child {
            border-bottom: none;
        }

        .notification-footer {
            padding: 10px 15px;
            text-align: center;
        }

        .notification-footer a {
            color: #007bff;
            text-decoration: none;
        }

        .notification-footer a:hover {
            text-decoration: underline;
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
            <img src="<?php echo base_url() .'assets/images/Pujari/logo.png'?>" alt="Logo">
        </div>
        <div class="menu-toggle" id="menuToggle">
            <i class="bi bi-list"></i>
        </div>
    </div>

    <div class="menu-items" id="menuItems">
        <a href="<?php echo base_url() . 'PujariUser/PujariDashboard'; ?>">Home</a>
        <a href="<?php echo base_url() . 'PujariUser/List'; ?>">Requests</a>
        <a href="<?php echo base_url() . 'PujariUser/AnalyticsandEarning'; ?>">Analytics</a>
        <a href="<?php echo base_url() . 'PujariUser/AnalyticsandEarning2   '; ?>">Earnings</a>
    </div>

    <div class="navbar-right">
        <div class="notification-wrapper">
            <div class="notification-icon" id="notificationIcon">
                <i class="bi bi-bell"></i>
                <span class="badge">3</span>
            </div>
            <div class="notification-dropdown" id="notificationDropdown">
                <div class="notification-header">
                    Notifications
                </div>
                <div class="notification-item">
                    <div><strong>Admin:</strong> Your interview has been scheduled.</div>
                    <div class="text-muted small">2 hrs ago</div>
                </div>
                <div class="notification-item">
                    <div><strong>Admin:</strong> Your interview has been scheduled.</div>
                    <div class="text-muted small">4 hrs ago</div>
                </div>
                <div class="notification-item">
                    <div><strong>Admin:</strong> Your interview has been scheduled.</div>
                    <div class="text-muted small">1 day ago</div>
                </div>
                <div class="notification-footer">
                    <a href="#">View All Notifications</a>
                </div>
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

<!-- JavaScript for Menu & Notification -->
<script>
    document.getElementById('menuToggle').addEventListener('click', function () {
        document.getElementById('menuItems').classList.toggle('show');
    });

    const notificationIcon = document.getElementById('notificationIcon');
    const notificationDropdown = document.getElementById('notificationDropdown');

    notificationIcon.addEventListener('click', () => {
        notificationDropdown.style.display =
            notificationDropdown.style.display === 'block' ? 'none' : 'block';
    });

    window.addEventListener('click', (e) => {
        if (!notificationIcon.contains(e.target) && !notificationDropdown.contains(e.target)) {
            notificationDropdown.style.display = 'none';
        }
    });
</script>

<!-- Bootstrap Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>