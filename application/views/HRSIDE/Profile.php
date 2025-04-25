<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Profile</title>
    <!-- Bootstrap CSS for styling and layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Rokkitt Font -->
    <link href="https://fonts.googleapis.com/css2?family=Rokkitt:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
        }

        body {
            background-color: rgb(228, 236, 241);
            margin: 0;
        }

        .main {
            padding: 20px;
            width: 100%;
        }

        /* Header Section (Admin Profile and Tabs in One Line) */
        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header-section h4 {
            margin: 50px;
            font-size: 24px;
            font-weight: 700;
        }

        .tabs {
            display: flex;
            gap: 10px;
        }

        .tab-btn {
            border: 1px solid #A9C2DB;
            padding: 8px 15px;
            border-radius: 5px;
            background: #D4E2F0;
            font-size: 14px;
            cursor: pointer;
        }

        .tab-btn.active {
            background: white;
            border-color: #A9C2DB;
            color: black;
        }

        .profile-container {
            max-width: 1000px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            height: auto;
            min-height: 400px;
        }

        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            display: block;
            margin: 0 auto;
        }

        .edit-profile {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
            font-size: 20px;
            color: black;
            font-weight: bold;
            border: none;
            background-color: transparent;
        }

        .edit-profile i {
            margin-left: 5px;
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            background-color: #F1F3F5;
            border: 1px solid #ccc;
            height: 50px;
            margin-top: 5px;
            font-size: 16px;
            width: 100%;
        }

        .form-control:focus {
            background-color: #F1F3F5;
            outline: none;
            box-shadow: none;
            border-color: #bbb;
        }

        .submit-btn {
            color: white;
            border: none;
            width: 50%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: auto;
            margin-right: auto;
            background-color: #0C768A;

        }

        .submit-btn:disabled {
            background-color:rgb(99, 144, 154);
            cursor: not-allowed;
        }

        .submit-btn:hover {
            background-color: #0C768A;
        }

        .label {
            font-size: 24px;
            font-weight: bold;
            color: black;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        /* Privacy & Security Form Styling */
        .privacy-form-container {
            display: none;
        }

        .privacy-form-container h5 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .privacy-form-group {
            margin-bottom: 15px;
        }

        .privacy-form-group label {
            font-size: 16px;
            font-weight: 500;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }

        .privacy-form-group input {
            width: 100%;
            height: 40px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 8px;
            font-size: 14px;
            background-color: #f9f9f9;
        }

        .privacy-form-group input:focus {
            outline: none;
            border-color: #bbb;
            box-shadow: none;
        }

        .privacy-submit-btn {
            background-color: #737373;
            color: white;
            border: none;
            width: 50%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: auto;
            margin-right: auto;
        }

        .privacy-submit-btn:disabled {
            background-color: #b3b3b3;
            cursor: not-allowed;
            opacity: 0.7;
        }

        .privacy-submit-btn:hover {
            background-color: #7C7C7C;
        }

        .error-message {
            color: red;
            font-size: 12px;
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper input[type="password"],
        .password-wrapper input[type="text"] {
            width: 100%;
            padding-right: 40px;
            box-sizing: border-box;
        }

        .toggle-password-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #888;
            font-size: 16px;
            transition: color 0.2s;
        }

        .toggle-password-icon:hover {
            color: #333;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .main {
                padding: 15px;
            }

            .header-section {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
                margin-bottom: 15px;
            }

            .header-section h4 {
                font-size: 20px;
            }

            .tabs {
                flex-wrap: wrap;
                justify-content: flex-start;
            }

            .tab-btn {
                font-size: 18px;
                padding: 6px 12px;
            }

            .profile-container {
                max-width: 90%;
                padding: 15px;
            }

            .profile-image {
                width: 120px;
                height: 120px;
            }

            .edit-profile {
                font-size: 16px;
                margin-top: 8px;
            }

            .form-control {
                height: 40px;
                font-size: 14px;
                margin-top: 3px;
            }

            .submit-btn {
                width: 70%;
                font-size: 14px;
                padding: 8px;
                margin-top: 10px;
            }

            .label {
                font-size: 14px;
                margin-top: 3px;
                margin-bottom: 3px;
            }

            .privacy-form-container h5 {
                font-size: 16px;
                margin-bottom: 10px;
            }

            .privacy-form-group label {
                font-size: 14px;
            }

            .privacy-form-group input {
                height: 35px;
                font-size: 12px;
            }

            .privacy-submit-btn {
                font-size: 14px;
                padding: 8px;
                margin-top: 10px;
            }
        }

        @media (max-width: 576px) {
            .main {
                padding: 10px;
            }

            .header-section {
                margin-bottom: 10px;
            }

            .header-section h4 {
                font-size: 18px;
            }

            .tabs {
                gap: 5px;
            }

            .tab-btn {
                font-size: 10px;
                padding: 5px 10px;
            }

            .profile-container {
                padding: 10px;
            }

            .profile-image {
                width: 100px;
                height: 100px;
            }

            .edit-profile {
                font-size: 14px;
                margin-top: 5px;
            }

            .form-control {
                height: 35px;
                font-size: 12px;
                margin-top: 2px;
            }

            .submit-btn {
                width: 80%;
                font-size: 12px;
                padding: 6px;
                margin-top: 8px;
            }

            .label {
                font-size: 12px;
                margin-top: 2px;
                margin-bottom: 2px;
            }

            .privacy-form-container h5 {
                font-size: 14px;
                margin-bottom: 8px;
            }

            .privacy-form-group label {
                font-size: 12px;
            }

            .privacy-form-group input {
                height: 30px;
                font-size: 10px;
            }

            .privacy-submit-btn {
                font-size: 12px;
                padding: 6px;
                margin-top: 8px;
            }
        }
    </style>
</head>

<body>
    <div class="d-flex">
    <?php $this->load->view('IncludeHR/SideBarHR'); ?>


        <!-- Main Component -->
        <div class="main">
            <!-- Navbar (Placeholder) -->
            <?php $this->load->view('IncludeAdmin/CommanNavBar'); ?>


            <div class="container">
                <!-- Header Section (Admin Profile and Tabs in One Line) -->
                <div class="header-section">
                    <h4>Admin Profile</h4>
                    <div class="tabs">
                        <button class="tab-btn active" onclick="switchTab('account')">Account Info</button>
                        <button class="tab-btn" onclick="switchTab('privacy')">Privacy & Security</button>
                    </div>
                </div>

                <!-- Profile Box -->
                <div class="profile-container">
                    <!-- Account Info Tab Content -->
                    <div id="account-tab" class="tab-content">
                        <div class="text-center">
                            <img src="<?php echo base_url('assets/images/HRside/profile1.png')?>" alt="Profile Image" class="profile-image">
                            <button class="edit-btn edit-profile">
                                Edit Profile <i class="fas fa-edit edit-profile-i"></i>
                            </button>
                        </div>

                        <!-- Form -->
                        <form id="account_info">
                            <div class="form-group">
                                <label class="label">Email</label>
                                <input type="email" id="email" class="form-control" value="admin@gmail.com" disabled>
                                <div class="error-message" id="emailError" style="display: none; color: red;"></div>
                            </div>
                            <div class="form-group">
                                <label class="label">Contact No</label>
                                <input type="text" id="contact_no" class="form-control" value="+919999999999" disabled>
                                <div class="error-message" id="mobileError" style="display: none; color: red;">Please enter a valid 10-digit mobile number.</div>
                            </div>
                            <button type="submit" class="submit-btn" id="submitAccountButton" disabled>Submit</button>
                        </form>
                    </div>

                    <!-- Privacy & Security Tab Content (Password Reset Form) -->
                    <div id="privacy-tab" class="tab-content privacy-form-container">
                        <h5>Privacy & Security</h5>
                        <form id="password_form">
                            <div class="privacy-form-group">
                                <label>Old Password</label>
                                <div class="password-wrapper">
                                    <input type="password" id="old_password">
                                    <i class="fas fa-eye toggle-password-icon" onclick="togglePassword('old_password', this)"></i>
                                </div>
                            </div>
                            <div class="privacy-form-group">
                                <label>New Password</label>
                                <div class="password-wrapper">
                                    <input type="password" id="new_password">
                                    <i class="fas fa-eye toggle-password-icon" onclick="togglePassword('new_password', this)"></i>
                                </div>
                            </div>
                            <div class="privacy-form-group">
                                <label>Confirm Password</label>
                                <div class="password-wrapper">
                                    <input type="password" id="confirm_password">
                                    <i class="fas fa-eye toggle-password-icon" onclick="togglePassword('confirm_password', this)"></i>
                                </div>
                            </div>
                            <button type="submit" id="updatePasswordBtn" class="privacy-submit-btn" disabled>Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPT FOR HIDE AND VIEW PASSWORD -->
    <script>
        function togglePassword(inputId, toggleIcon) {
            const input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
    </script>

    <!-- SCRIPT FOR TOGGLING TABS -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function switchTab(tab) {
                const accountTab = document.getElementById('account-tab');
                const privacyTab = document.getElementById('privacy-tab');
                const accountBtn = document.querySelector('.tab-btn[onclick="switchTab(\'account\')"]');
                const privacyBtn = document.querySelector('.tab-btn[onclick="switchTab(\'privacy\')"]');

                if (!accountTab || !privacyTab || !accountBtn || !privacyBtn) {
                    console.error("One or more elements not found in switchTab function.");
                    return;
                }

                // Hide all tab content
                accountTab.style.display = 'none';
                privacyTab.style.display = 'none';

                // Remove active class from all tabs
                accountBtn.classList.remove('active');
                privacyBtn.classList.remove('active');

                // Show the selected tab content and add active class to the clicked tab
                if (tab === 'account') {
                    accountTab.style.display = 'block';
                    accountBtn.classList.add('active');
                } else if (tab === 'privacy') {
                    privacyTab.style.display = 'block';
                    privacyBtn.classList.add('active');
                }
            }

            window.switchTab = switchTab; // Make function globally accessible
        });
    </script>

    <!-- SCRIPT FOR ENABLING/DISABLING SUBMIT BUTTONS -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const emailInput = document.getElementById("email");
            const contactInput = document.getElementById("contact_no");
            const submitAccountButton = document.getElementById("submitAccountButton");
            const editProfileButton = document.querySelector(".edit-profile");

            let originalEmail = "admin@gmail.com";
            let originalContact = "+919999999999";

            if (submitAccountButton) {
                submitAccountButton.disabled = true;
            }

            function validateAccountForm() {
                if (!emailInput || !contactInput || !submitAccountButton) return;

                const email = emailInput.value.trim();
                const contact = contactInput.value.trim();

                const emailChanged = email !== originalEmail;
                const contactChanged = contact !== originalContact;

                submitAccountButton.disabled = !(emailChanged || contactChanged);
            }

            if (editProfileButton) {
                editProfileButton.addEventListener("click", function(event) {
                    event.preventDefault();
                    emailInput.removeAttribute("disabled");
                    contactInput.removeAttribute("disabled");
                    emailInput.focus();
                });
            }

            emailInput.addEventListener("input", validateAccountForm);
            contactInput.addEventListener("input", validateAccountForm);

            const updatePasswordBtn = document.getElementById('updatePasswordBtn');
            const oldPasswordInput = document.getElementById('old_password');
            const newPasswordInput = document.getElementById('new_password');
            const confirmPasswordInput = document.getElementById('confirm_password');

            let oldPasswordValid = false;
            let passwordsMatch = false;

            function validateButtonState() {
                updatePasswordBtn.disabled = !(oldPasswordValid && passwordsMatch);
            }

            if (!updatePasswordBtn || !oldPasswordInput || !newPasswordInput || !confirmPasswordInput) {
                console.error("One or more elements not found. Check the IDs.");
                return;
            }

            updatePasswordBtn.disabled = true; // Start as disabled

            oldPasswordInput.addEventListener("input", function() {
                const oldPassword = oldPasswordInput.value.trim();
                if (oldPassword.length >= 4) {
                    oldPasswordValid = true;
                } else {
                    oldPasswordValid = false;
                }
                validateButtonState();
            });

            [newPasswordInput, confirmPasswordInput].forEach(input => {
                input.addEventListener("input", function() {
                    passwordsMatch =
                        newPasswordInput.value.trim() &&
                        confirmPasswordInput.value.trim() &&
                        newPasswordInput.value === confirmPasswordInput.value;

                    validateButtonState();
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
