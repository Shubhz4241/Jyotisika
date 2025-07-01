
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/style.css' ?>">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts (Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        /* Apply Inter font */
        * {
            font-family: 'Inter', sans-serif !important;
        }

        /* Headers and table fonts */
        h1, h4 {
            font-weight: 700;
        }

        p, td, th {
            font-weight: 400;
            font-size: 1rem;
        }

        /* Table header */
        .table thead th {
            font-weight: 600;
            background-color: #f8f9fa;
        }

        /* Buttons */
        .btn {
            font-weight: 500;
            font-size: 0.9rem;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .main {
                margin-top: 0 !important;
            }

            .card-dashboard {
                margin-bottom: 1rem;
            }

            .table-responsive {
                font-size: 0.8rem;
            }

            .table td, .table th {
                padding: 0.5rem;
            }

            .btn-sm {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }

            .table-responsive-stack tr {
                display: flex;
                flex-direction: column;
                margin-bottom: 1rem;
                border-bottom: 1px solid #eee;
            }

            .table-responsive-stack td {
                display: block;
                text-align: right;
            }

            .table-responsive-stack td:before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
            }
        }

        /* Mobile-friendly See All button */
        @media (max-width: 768px) {
            .card-footer .btn {
                margin-top: 10px;
                padding: 10px 15px;
                font-size: 0.9rem;
            }
        }

        @media (min-width: 769px) {
            .card-footer .btn {
                max-width: 250px;
            }
        }

        .fixed-right-btn {
            position: fixed;
            right: 20px;
            z-index: 1;
        }

        @media (max-width: 768px) {
            .fixed-right-btn {
                width: 100%;
                position: initial;
            }
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table-responsive::-webkit-scrollbar {
            height: 8px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background-color: #ccc;
            border-radius: 4px;
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            background-color: #999;
        }

        .fixed-right-btn {
            position: relative;
        }

        @media (max-width: 768px) {
            .fixed-right-btn {
                position: relative;
                margin-left: 40px;
            }

            h3.text-center {
                font-size: 1.5rem;
            }
        }

        /* Form Styling */
        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px 15px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        /* Profile Image */
        #profileImage {
            border: 3px solid #ddd;
            transition: all 0.3s ease;
        }

        #profileImage:hover {
            opacity: 0.8;
        }

        /* Input Fields */
        .form-label {
            font-size: 1rem;
            font-weight: 500;
            color: #333;
        }

        .form-control {
            border-radius: 5px;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ddd;
            transition: border 0.2s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.2);
        }

        /* Buttons */
        button.w-100 {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 5px;
            background-color: #0c768a;
            color: white;
            border: none;
            transition: background-color 0.3s ease;
        }

        button.w-100:hover:not(:disabled) {
            background-color: #095e6e;
            cursor: pointer;
        }

        button.w-100:disabled {
            background-color: #b3b3b3;
            cursor: not-allowed;
            opacity: 0.7;
        }

        /* Error Styling */
        .text-danger {
            font-size: 0.9rem;
            color: red;
            padding-top: 5px;
        }

        /* Spacing */
        .mb-3, .mb-4 {
            margin-bottom: 1rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            form {
                padding: 20px;
            }
        }

        /* Password Toggle Icon */
        .input-group-text {
            cursor: pointer;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
        }

        /* Navigation Buttons */
        .nav-buttons .btn {
            font-size: 0.9rem;
            padding: 8px 15px;
            transition: background-color 0.3s ease;
        }

        .nav-buttons .btn.active {
            background-color: #095e6e;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <?php $this->load->view('IncludeAdmin/CommanSidebar'); ?>
        <!-- SIDEBAR END -->

        <!-- Main Component -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('IncludeAdmin/CommanNavbar'); ?>
            <!-- Navbar End -->

            <div class="container-fluid profile-container d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="profile-form shadow p-3 mb-5 bg-body rounded">
                        <div class="nav-buttons text-center mb-3">
                            <button type="button" class="btn text-white mx-2 active" onclick="showForm('settingsForm')" style="background-color: #0c768a;">Admin Profile Settings</button>
                            <button type="button" class="btn text-white mx-2" onclick="showForm('passwordSettingsForm')" style="background-color: #0c768a;">Password & Privacy</button>
                        </div>

                        <!-- Admin Profile Settings Form -->
                        <div id="settingsForm" class="form-container active">
                            <form class="w-100" id="account_info" onsubmit="return false;">
                                <!-- Profile Image Section -->
                                <div class="text-center position-relative mb-4">
                                    <label for="profileUpload" class="position-relative d-inline-block">
                                        <img id="profileImage" src="<?php echo base_url() . 'assets/images/astrologer.png'; ?>" class="rounded-circle" width="120" height="120" alt="Profile Image">
                                        <span class="position-absolute bottom-0 end-0 p-2 bg-white border rounded-circle shadow-sm" style="cursor: pointer; transition: transform 0.3s ease-in-out;">
                                            <i class="bi bi-pencil-fill"></i>
                                        </span>
                                    </label>
                                    <input type="file" id="profileUpload" accept="image/*" class="d-none" onchange="previewProfileImage(event)">
                                </div>

                                <!-- Email Section -->
                                <div class="mb-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" disabled>
                                    <div id="emailError" class="text-danger"></div>
                                </div>

                                <!-- Contact Section -->
                                <div class="mb-4">
                                    <label for="contact" class="form-label">Contact</label>
                                    <input type="text" id="contact" name="contactno" class="form-control" placeholder="Enter your contact" maxlength="10" disabled>
                                    <div id="contactError" class="text-danger"></div>
                                </div>

                                <!-- Edit and Submit Buttons -->
                                <div class="text-center">
                                    <button type="button" class="btn w-100 mb-2" id="editProfileButton" style="background-color: #0c768a;">Edit Profile</button>
                                    <button type="submit" class="btn w-100" id="submitAccountButton" style="background-color: #0c768a;" disabled>Update Profile</button>
                                </div>
                            </form>
                        </div>

                        <!-- Password & Privacy Form -->
                        <div id="passwordSettingsForm" class="form-container" style="display: none;">
                            <form class="w-100" id="password_form" onsubmit="return false;">
                                <!-- Old Password Section -->
                                <div class="mb-4">
                                    <label for="oldPassword" class="form-label">Old Password</label>
                                    <div class="input-group">
                                        <input type="password" id="oldPassword" class="form-control" placeholder="Enter your old password" autocomplete="off" required>
                                        <span class="input-group-text" onclick="togglePassword('oldPassword', this)">
                                            <i class="bi bi-eye-slash"></i>
                                        </span>
                                    </div>
                                    <div class="password-error-msg text-danger"></div>
                                </div>

                                <!-- New Password Section -->
                                <div class="mb-4">
                                    <label for="newPassword" class="form-label">New Password</label>
                                    <div class="input-group">
                                        <input type="password" id="newPassword" class="form-control" placeholder="Enter your new password" autocomplete="off" required>
                                        <span class="input-group-text" onclick="togglePassword('newPassword', this)">
                                            <i class="bi bi-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>

                                <!-- Confirm Password Section -->
                                <div class="mb-4">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm your new password" autocomplete="off" required>
                                        <span class="input-group-text" onclick="togglePassword('confirmPassword', this)">
                                            <i class="bi bi-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="text-center">
                                    <button type="submit" class="btn w-100" id="updatePasswordBtn" style="background-color: #0c768a;" disabled>Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Toggle Sidebar
        const toggler = document.querySelector(".toggler-btn");
        const closeBtn = document.querySelector(".close-sidebar");
        const sidebar = document.querySelector("#sidebar");

        if (toggler) {
            toggler.addEventListener("click", function() {
                sidebar.classList.toggle("collapsed");
            });
        }

        if (closeBtn) {
            closeBtn.addEventListener("click", function() {
                sidebar.classList.remove("collapsed");
            });
        }

        // Toggle Form Visibility
        function showForm(formId) {
            const forms = document.querySelectorAll('.form-container');
            forms.forEach(form => form.style.display = 'none');

            const activeForm = document.getElementById(formId);
            if (activeForm) activeForm.style.display = 'block';

            const buttons = document.querySelectorAll('.nav-buttons .btn');
            buttons.forEach(btn => btn.classList.remove('active'));
            const activeBtn = document.querySelector(`.nav-buttons .btn[onclick="showForm('${formId}')"]`);
            if (activeBtn) activeBtn.classList.add('active');
        }

        // Toggle Password Visibility
        function togglePassword(inputId, toggleElement) {
            const input = document.getElementById(inputId);
            const icon = toggleElement.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            } else {
                input.type = 'password';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            }
        }

        // Profile Image Preview
        function previewProfileImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profileImage').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }

        // Account Info Validation and Update
        document.addEventListener("DOMContentLoaded", function() {
            const emailInput = document.getElementById("email");
            const contactInput = document.getElementById("contact");
            const submitAccountButton = document.getElementById("submitAccountButton");
            const editProfileButton = document.getElementById("editProfileButton");
            let originalEmail = "";
            let originalContact = "";

            function showError(elementId, message) {
                const errorElement = document.getElementById(elementId);
                if (errorElement) {
                    errorElement.textContent = message;
                    errorElement.style.display = 'block';
                }
            }

            function hideError(elementId) {
                const errorElement = document.getElementById(elementId);
                if (errorElement) {
                    errorElement.textContent = '';
                    errorElement.style.display = 'none';
                }
            }

            async function checkEmailExists(email, errorElementId) {
                if (!document.getElementById(errorElementId)) return false;

                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    showError(errorElementId, "Please enter a valid email address.");
                    return false;
                }

                try {
                    const formData = new FormData();
                    formData.append("email", email);
                    const response = await fetch("<?php echo base_url('SuperAdminLogin/checkEmailExists'); ?>", {
                        method: 'POST',
                        body: formData
                    });
                    const result = await response.json();
                    if (result.status === "exists") {
                        showError(errorElementId, "This email is already registered.");
                        return false;
                    } else {
                        hideError(errorElementId);
                        return true;
                    }
                } catch (error) {
                    showError(errorElementId, "Error checking email.");
                    return false;
                }
            }

            async function checkMobileExists(mobile, errorElementId) {
                if (!document.getElementById(errorElementId)) return false;

                const mobileRegex = /^[0-9]{10}$/;
                if (!mobileRegex.test(mobile)) {
                    showError(errorElementId, "Please enter a valid 10-digit mobile number.");
                    return false;
                }

                try {
                    const formData = new FormData();
                    formData.append("mobile_number", mobile);
                    const response = await fetch("<?php echo base_url('SuperAdminLogin/checkMobileExists'); ?>", {
                        method: 'POST',
                        body: formData
                    });
                    const result = await response.json();
                    if (result.status === "exists") {
                        showError(errorElementId, "This mobile number is already registered.");
                        return false;
                    } else {
                        hideError(errorElementId);
                        return true;
                    }
                } catch (error) {
                    showError(errorElementId, "Error checking mobile.");
                    return false;
                }
            }

            async function validateAccountForm() {
                if (!emailInput || !contactInput || !submitAccountButton) return;

                const email = emailInput.value.trim();
                const contact = contactInput.value.trim();

                const emailChanged = email !== originalEmail;
                const contactChanged = contact !== originalContact;

                let isEmailValid = true;
                let isContactValid = true;

                if (emailChanged) {
                    isEmailValid = await checkEmailExists(email, 'emailError');
                } else {
                    isEmailValid = true;
                    hideError('emailError');
                }

                if (contactChanged) {
                    isContactValid = await checkMobileExists(contact, 'contactError');
                } else {
                    isContactValid = true;
                    hideError('contactError');
                }

                submitAccountButton.disabled = !(
                    (emailChanged || contactChanged) &&
                    isEmailValid &&
                    isContactValid
                );
            }

            if (editProfileButton) {
                editProfileButton.addEventListener("click", function() {
                    emailInput.removeAttribute("disabled");
                    contactInput.removeAttribute("disabled");
                    emailInput.focus();
                });
            }

            fetch("<?php echo base_url('SuperAdminLogin/getSuperAdminData'); ?>")
                .then(response => response.json())
                .then(data => {
                    if (data.status === "success") {
                        if (emailInput) {
                            emailInput.value = data.email || '';
                            originalEmail = data.email ? data.email.trim() : '';
                        }
                        if (contactInput) {
                            contactInput.value = data.contact_no || '';
                            originalContact = data.contact_no ? data.contact_no.trim() : '';
                        }
                        emailInput.addEventListener("input", validateAccountForm);
                        contactInput.addEventListener("input", function() {
                            this.value = this.value.replace(/[^0-9]/g, '');
                            validateAccountForm();
                        });
                    }
                })
                .catch(error => console.error("Error fetching admin data:", error));

            document.getElementById("account_info").addEventListener("submit", function(event) {
                event.preventDefault();
                const email = emailInput.value.trim();
                const contact = contactInput.value.trim();

                if (!email || !contact) {
                    if (!email) showError('emailError', "Email is required.");
                    if (!contact) showError('contactError', "Contact number is required.");
                    return;
                }

                const formData = new FormData();
                formData.append("email", email);
                formData.append("contact_no", contact);
                const profileImageFile = document.getElementById("profileUpload").files[0];
                if (profileImageFile) {
                    formData.append("profile_image", profileImageFile);
                }

                fetch("<?php echo base_url('SuperAdminLogin/updateAccountInfo'); ?>", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    Swal.fire({
                        title: data.status === "success" ? "Success!" : "Error!",
                        text: data.message || "Failed to update profile.",
                        icon: data.status === "success" ? "success" : "error"
                    }).then(() => {
                        if (data.status === "success") {
                            location.reload();
                        }
                    });
                })
                .catch(error => {
                    Swal.fire("Error!", "Failed to update profile.", "error");
                    console.error("Error updating account info:", error);
                });
            });
        });

        // Password Validation and Update
        document.addEventListener("DOMContentLoaded", function() {
            const updatePasswordBtn = document.getElementById('updatePasswordBtn');
            const oldPasswordInput = document.getElementById('oldPassword');
            const newPasswordInput = document.getElementById('newPassword');
            const confirmPasswordInput = document.getElementById('confirmPassword');

            let oldPasswordValid = false;
            let passwordsMatch = false;

            function validateButtonState() {
                updatePasswordBtn.disabled = !(oldPasswordValid && passwordsMatch);
            }

            if (!updatePasswordBtn || !oldPasswordInput || !newPasswordInput || !confirmPasswordInput) {
                console.error("One or more password form elements not found.");
                return;
            }

            updatePasswordBtn.disabled = true;

            const passwordGroup = oldPasswordInput.closest(".mb-4");
            let passwordErrorMsg = passwordGroup.querySelector(".password-error-msg");
            if (!passwordErrorMsg) {
                passwordErrorMsg = document.createElement("div");
                passwordErrorMsg.className = "password-error-msg";
                passwordErrorMsg.style.color = "red";
                passwordErrorMsg.style.fontSize = "0.9rem";
                passwordErrorMsg.style.paddingTop = "5px";
                passwordGroup.appendChild(passwordErrorMsg);
            }

            let timeout = null;

            oldPasswordInput.addEventListener("input", function() {
                clearTimeout(timeout);
                const oldPassword = oldPasswordInput.value.trim();
                passwordErrorMsg.textContent = "";
                oldPasswordValid = false;
                validateButtonState();

                if (oldPassword.length < 4) {
                    return;
                }

                timeout = setTimeout(() => {
                    fetch("<?php echo base_url('SuperAdminLogin/verifyOldPassword'); ?>", {
                        method: "POST",
                        headers: { "Content-Type": "application/x-www-form-urlencoded" },
                        body: `old_password=${encodeURIComponent(oldPassword)}`
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === "success") {
                            passwordErrorMsg.textContent = "Old password is correct";
                            passwordErrorMsg.style.color = "green";
                            oldPasswordValid = true;
                        } else {
                            passwordErrorMsg.textContent = data.message || "Old password is incorrect";
                            passwordErrorMsg.style.color = "red";
                            oldPasswordValid = false;
                        }
                        validateButtonState();
                    })
                    .catch(error => {
                        passwordErrorMsg.textContent = "Error checking password";
                        passwordErrorMsg.style.color = "red";
                        oldPasswordValid = false;
                        validateButtonState();
                        console.error("Error verifying old password:", error);
                    });
                }, 500);
            });

            [newPasswordInput, confirmPasswordInput].forEach(input => {
                input.addEventListener("input", function() {
                    passwordsMatch = newPasswordInput.value.trim() && confirmPasswordInput.value.trim() && newPasswordInput.value === confirmPasswordInput.value;
                    validateButtonState();
                });
            });

            document.getElementById("password_form").addEventListener("submit", function(event) {
                event.preventDefault();

                const oldPassword = oldPasswordInput.value.trim();
                const newPassword = newPasswordInput.value.trim();
                const confirmPassword = confirmPasswordInput.value.trim();

                if (!oldPassword || !newPassword || !confirmPassword) {
                    Swal.fire("Error!", "All fields are required.", "error");
                    return;
                }

                if (newPassword !== confirmPassword) {
                    Swal.fire("Error!", "New password and confirm password do not match.", "error");
                    return;
                }

                const formData = new URLSearchParams();
                formData.append('old_password', oldPassword);
                formData.append('new_password', newPassword);
                formData.append('confirm_password', confirmPassword);

                fetch("<?php echo base_url('SuperAdminLogin/updatePassword'); ?>", {
                    method: "POST",
                    headers: { "Content-Type": "application/x-www-form-urlencoded" },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    Swal.fire({
                        title: data.status === "success" ? "Success!" : "Error!",
                        text: data.message || data.error,
                        icon: data.status === "success" ? "success" : "error"
                    }).then(() => {
                        if (data.status === "success") {
                            oldPasswordInput.value = "";
                            newPasswordInput.value = "";
                            confirmPasswordInput.value = "";
                            location.reload();
                        }
                    });
                })
                .catch(error => {
                    Swal.fire("Error!", "Failed to update password.", "error");
                    console.error("Error updating password:", error);
                });
            });
        });
    </script>
</body>
</html>
