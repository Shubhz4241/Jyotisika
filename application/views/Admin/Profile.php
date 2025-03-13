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


        /* General Form Styling */
        form {
            max-width: 500px;
            /* Adjusted for a more compact form */
            margin: 0 auto;
            /* Centered form */
            padding: 20px 15px;
            background-color: #fff;
            /* Clean white background */
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            /* Light shadow for subtle depth */
        }

        /* Profile Image Section */
        #profileImage {
            border: 3px solid #ddd;
            /* Lighter border for simplicity */
            transition: all 0.3s ease;
        }

        #profileImage:hover {
            opacity: 0.8;
        }

        /* Input Field Styling */
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
            /* Light border color */
            transition: border 0.2s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            /* Highlight on focus */
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.2);
            /* Soft shadow on focus */
        }

        /* Button Styling */
        button.w-100 {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            border: none;
            transition: background-color 0.3s ease;
        }

        button.w-100:hover {
            background-color: #0056b3;
            /* Darker shade on hover */
            cursor: pointer;
        }

        /* Error Styling */
        .text-danger {
            font-size: 0.9rem;
            color: red;
            padding-top: 5px;
        }

        /* Spacing Between Input Fields */
        .mb-3 {
            margin-bottom: 1rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            form {
                padding: 20px;
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
                            <button type="button" class="btn btn text-white mx-2" onclick="showForm('settingsForm')" style="background-color: #0c768a;">Admin Profile Settings</button>
                            <button type="button" class="btn btn text-white mx-2" onclick="showForm('passwordSettingsForm')" style="background-color: #0c768a;">Password & Privacy</button>
                        </div>

                        <!-- Admin Profile Settings Form -->
                        <div id="settingsForm" class="form-container active">
                            <form class="w-100" onsubmit="return validateFormProfile(event)">
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
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required oninput="(function(element) { element.value = element.value.toLowerCase().replace(/[^a-z0-9@.]/g, ''); })(this)"
                                        pattern="^[a-z0-9]+@[a-z0-9]+\.[a-z]{2,}$">
                                    <div id="emailError" class="text-danger" style="display: none;"></div>
                                </div>

                                <!-- Contact Section -->
                                <div class="mb-4">
                                    <label for="contact" class="form-label">Contact</label>
                                    <input type="text" id="contact" name="contactno" class="form-control" placeholder="Enter your contact" maxlength="10" autocomplete="off" required oninput="validateContactInput(this)">
                                    <div id="contactError" class="text-danger" style="display: none;">Only numbers are allowed.</div>
                                </div>

                                <!-- Submit Button -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn w-100" style="background-color: #0c768a;">Update Profile</button>
                                </div>
                            </form>

                            <script>
                                // Function to preview the uploaded profile image
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

                                // Function to validate contact input
                                function validateContactInput(input) {
                                    const contactError = document.getElementById('contactError');
                                    input.value = input.value.replace(/[^0-9]/g, '');
                                    contactError.style.display = /^\d*$/.test(input.value) ? 'none' : 'block';
                                }
                            </script>

                            <script>
                                // Function to preview the uploaded profile image
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

                                // Function to validate contact input
                                function validateContactInput(input) {
                                    const contactError = document.getElementById('contactError');
                                    input.value = input.value.replace(/[^0-9]/g, '');
                                    contactError.style.display = /^\d*$/.test(input.value) ? 'none' : 'block';
                                }
                            </script>

                            <!-- FontAwesome for Pen Icon -->
                            <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

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
                                <!-- Old Password Section -->
                                <div class="mb-4">
                                    <label for="oldPassword" class="form-label">Old Password</label>
                                    <div class="input-group">
                                        <input type="password" id="oldPassword" name="oldpassword" class="form-control" placeholder="Enter your old password" autocomplete="off" required oninput="this.value = this.value.replace(/^\s+/g, '')">
                                        <span class="input-group-text" onclick="togglePassword('oldPassword', this)" style="cursor: pointer;">
                                            <i class="bi bi-eye-slash"></i>
                                        </span>
                                    </div>

                                </div>

                                <!-- New Password Section -->
                                <div class="mb-4">
                                    <label for="newPassword" class="form-label">New Password</label>
                                    <div class="input-group">
                                        <input type="password" id="newPassword" name="password" class="form-control" placeholder="Enter your new password" autocomplete="off" required oninput="this.value = this.value.replace(/^\s+/g, '')">
                                        <span class="input-group-text" onclick="togglePassword('newPassword', this)" style="cursor: pointer;">
                                            <i class="bi bi-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>

                                <!-- Confirm Password Section -->
                                <div class="mb-4">
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm your new password" autocomplete="off" required oninput="this.value = this.value.replace(/^\s+/g, '')">
                                        <span class="input-group-text" onclick="togglePassword('confirmPassword', this)" style="cursor: pointer;">
                                            <i class="bi bi-eye-slash"></i>
                                        </span>
                                    </div>
                                </div>

                                <div id="passwordError" class="text-danger" style="display: none;"></div>

                                <!-- Submit Button -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary w-100" style="background-color: #0c768a;">Submit</button>
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