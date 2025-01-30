<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin:Profile</title>
    <!-- Bootstrap CSS for styling and layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets\css\style.css' ?>">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        /* Apply Inter font to the entire page */
        * {
            font-family: 'Inter', sans-serif !important;
        }

        /* Customize headers and table fonts for better readability */
        h1,
        h4 {
            font-weight: 700;
        }

        p,
        td,
        th {
            font-weight: 400;
            font-size: 1rem;
        }

        /* Enhance table header appearance */
        .table thead th {
            font-weight: 600;
            background-color: #f8f9fa;
        }

        /* Adjust buttons for better aesthetics */
        .btn {
            font-weight: 500;
            font-size: 0.9rem;
        }

        /* Mobile Responsiveness Improvements */
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

            .table td,
            .table th {
                padding: 0.5rem;
            }

            .btn-sm {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }

            /* Responsive table */
            .table-responsive-stack tr {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
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
            /* Keeps button aligned */
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
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <?php $this->load->view('IncludeAdmin/CommanSidebar'); ?>
        <!-- SIDEBAR END -->


        <!-- Main Component -->
        <div class="main ">
            <!-- Navbar -->
            <?php $this->load->view('IncludeAdmin/CommanNavbar'); ?>
            <!-- Navbar End -->

            <div class="container-fluid profile-container d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="profile-form shadow p-3 mb-5 bg-body rounded">
                        <div class="nav-buttons text-center mb-3">
                            <button type="button" class="btn btn-outline-primary mx-2" onclick="showForm('settingsForm')">Admin Profile Settings</button>
                            <button type="button" class="btn btn-outline-primary mx-2" onclick="showForm('passwordSettingsForm')">Password & Privacy</button>
                        </div>

                        <!-- Admin Profile Settings Form -->
                        <div id="settingsForm" class="form-container active">
                            <form class="w-100" onsubmit="return validateFormProfile(event)">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                                    <div id="emailError" class="text-danger" style="display: none;"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="contact" class="form-label">Contact</label>
                                    <input
                                        type="text"
                                        id="contact"
                                        name="contactno"
                                        class="form-control"
                                        placeholder="Enter your contact"
                                        maxlength="10"
                                        autocomplete="off"
                                        required
                                        oninput="validateContactInput(this)">
                                    <div id="contactError" class="text-danger" style="display: none;">Only numbers are allowed.</div>
                                </div>

                                <script>
                                    // Function to validate contact input
                                    function validateContactInput(input) {
                                        const contactError = document.getElementById('contactError');

                                        // Remove any non-numeric characters
                                        input.value = input.value.replace(/[^0-9]/g, '');

                                        // Show error if the value is not numeric
                                        if (!/^\d*$/.test(input.value)) {
                                            contactError.style.display = 'block';
                                        } else {
                                            contactError.style.display = 'none';
                                        }
                                    }
                                </script>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                </div>
                            </form>
                        </div>

                        <!-- Include SweetAlert2 library -->
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                        <script>
                            // Function to validate form and show SweetAlert on success
                            function validateFormProfile(event) {
                                event.preventDefault(); // Prevent the default form submission

                                const email = document.getElementById('email').value.trim();
                                const contact = document.getElementById('contact').value.trim();

                                // Basic validation
                                if (!email || !contact) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Please fill out all fields correctly.',
                                    });
                                    return false;
                                }

                                // Clear any existing error messages
                                document.getElementById('emailError').style.display = 'none';
                                document.getElementById('contactError').style.display = 'none';

                                // Assume the profile is updated successfully (simulate a success scenario)
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Profile Updated Successfully!',
                                    text: 'Your profile has been updated.',
                                    confirmButtonText: 'OK',
                                });

                                // Optionally reset the form
                                event.target.reset();
                                return true;
                            }
                        </script>


                        <!-- Password & Privacy Form -->
                        <div id="passwordSettingsForm" class="form-container" style="display: none;">
                            <form class="w-100" id="passwordForm" onsubmit="return validatePasswordForm(event)">
                                <div class="mb-3">
                                    <label for="oldPassword" class="form-label">Old Password</label>
                                    <div class="input-group">
                                        <input type="password" id="oldPassword" name="oldpassword" class="form-control" placeholder="Enter your old password" autocomplete="off" required>
                                        <span class="input-group-text" onclick="togglePassword('oldPassword', this)" style="cursor: pointer;">
                                            <i class="bi bi-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="newPassword" class="form-label">New Password</label>
                                    <div class="input-group">
                                        <input type="password" id="newPassword" name="password" class="form-control" placeholder="Enter your new password" autocomplete="off" required>
                                        <span class="input-group-text" onclick="togglePassword('newPassword', this)" style="cursor: pointer;">
                                            <i class="bi bi-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm your new password" autocomplete="off" required>
                                        <span class="input-group-text" onclick="togglePassword('confirmPassword', this)" style="cursor: pointer;">
                                            <i class="bi bi-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>
                                <div id="passwordError" class="text-danger" style="display: none;"></div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>

                        <!-- Include SweetAlert2 -->
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                        <script>
                            // Function to toggle password visibility
                            function togglePassword(inputId, icon) {
                                const input = document.getElementById(inputId);
                                if (input.type === "password") {
                                    input.type = "text";
                                    icon.innerHTML = '<i class="bi bi-eye"></i>';
                                } else {
                                    input.type = "password";
                                    icon.innerHTML = '<i class="bi bi-eye-slash"></i>';
                                }
                            }

                            // Function to validate the password form and show SweetAlert
                            function validatePasswordForm(event) {
                                event.preventDefault(); // Prevent the default form submission

                                const oldPassword = document.getElementById('oldPassword').value.trim();
                                const newPassword = document.getElementById('newPassword').value.trim();
                                const confirmPassword = document.getElementById('confirmPassword').value.trim();

                                // Basic validation
                                if (!oldPassword || !newPassword || !confirmPassword) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'All fields are required!',
                                    });
                                    return false;
                                }

                                if (newPassword !== confirmPassword) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Passwords Do Not Match',
                                        text: 'Please make sure the new password and confirmation match.',
                                    });
                                    return false;
                                }

                                // Assume password update is successful
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Password Updated Successfully!',
                                    text: 'Your password has been updated.',
                                    confirmButtonText: 'OK',
                                });

                                // Optionally reset the form
                                document.getElementById('passwordForm').reset();
                                return true;
                            }
                        </script>

                    </div>
                </div>
            </div>

            <script>
                // Function to toggle the visibility of forms
                function showForm(formId) {
                    // Hide all form containers
                    const forms = document.querySelectorAll('.form-container');
                    forms.forEach(form => {
                        form.style.display = 'none';
                    });

                    // Show the selected form
                    const activeForm = document.getElementById(formId);
                    if (activeForm) {
                        activeForm.style.display = 'block';
                    }
                }

                // Optional: Password visibility toggle
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
            </script>


        </div>

    </div>
    </div>
    <script>
        function ws(name) {
            var inputField = document.getElementById(name);
            inputField.value = inputField.value.replace(/^\s+/, ''); // Trim leading whitespace
        }

        // function validateForm() {
        //     const newPassword = document.getElementById('newPassword').value;
        //     const confirmPassword = document.getElementById('confirmPassword').value;
        //     const errorMessage = document.getElementById('passwordError');

        //     errorMessage.style.display = 'none';
        //     document.getElementById('confirmPassword').style.borderColor = '#dee2e6';
        //     document.getElementById('newPassword').style.borderColor = '#dee2e6';

        //     if (newPassword !== confirmPassword) {
        //         errorMessage.style.display = 'block';
        //         errorMessage.innerText = 'New password does not match with confirm password.';
        //         document.getElementById('confirmPassword').style.borderColor = 'red';
        //         document.getElementById('newPassword').style.borderColor = 'red';
        //         return false;
        //     }

        //     return true;
        // }
        // cofirm and new password
        document.getElementById('passwordForm').onsubmit = function(event) {
            event.preventDefault();

            const newPassword = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            // Check if the new password and confirm password match
            if (newPassword !== confirmPassword) {
                openFlashMessageModal('Password Mismatch', 'New Password and Confirm Password do not match.');
                return;
            }

            // If everything is correct, manually submit the form
            this.submit();
        };
    </script>
    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script End -->

    <!-- Script Toggle Sidebar -->
    <script>
        const toggler = document.querySelector(".toggler-btn");
        const closeBtn = document.querySelector(".close-sidebar");
        const sidebar = document.querySelector("#sidebar");

        toggler.addEventListener("click", function() {
            sidebar.classList.toggle("collapsed");
        });

        closeBtn.addEventListener("click", function() {
            sidebar.classList.remove("collapsed");
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>