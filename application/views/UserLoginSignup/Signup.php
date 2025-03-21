<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:View More</title>

    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">



</head>

<body>


    <style>
        /* Custom scrollbar styles */
        ::-webkit-scrollbar {
            width: 15px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background-color: var(--yellow);
            border-radius: 2px;
            border: 3px solid #f1f1f1;
        }
    </style>

    <div class="container-fluid min-vh-100">
        <div class="row g-0 min-vh-100">
            <!-- Left Section: Why Sign Up -->
            <div class="col-md-6 p-4 order-2 order-md-1 d-flex flex-column justify-content-center align-items-center"
                style="background: linear-gradient(135deg, #FDFBDF, #FFE085);">
                <div style="max-width: 450px;">
                    <h3 class="fw-bold mb-4" style="color: #333; font-size: 1.5rem;">Why Sign Up?</h3>
                    <div class="benefits-list" style="font-size: 1rem; line-height: 2;">
                        <p class="d-flex align-items-start mb-1">
                            <span class="me-3" style="font-size: 1.5rem; color: #F7C548;">✔</span>
                            Get personalized information
                        </p>
                        <p class="d-flex align-items-start mb-1">
                            <span class="me-3" style="font-size: 1.5rem; color: #F7C548;">✔</span>
                            Save charts (Kundli) on cloud
                        </p>
                        <p class="d-flex align-items-start mb-1">
                            <span class="me-3" style="font-size: 1.5rem; color: #F7C548;">✔</span>
                            Write notes & comments
                        </p>
                        <p class="d-flex align-items-start">
                            <span class="me-3" style="font-size: 1.5rem; color: #F7C548;">✔</span>
                            Access anywhere: mobile & web
                        </p>
                    </div>
                    <img src="<?php echo base_url('assets/images/ShreeGanesh.jpg'); ?>" alt="Benefits"
                        class="img-fluid mt-2 rounded" style="max-width: 280px;">
                </div>
            </div>

            <!-- Right Section: Login Form -->
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center p-5 order-1 order-md-2"
                style="background: #FFF;">
                <h5 class="text-center fw-bold mb-4" style="color: #444; font-size: 1.6rem;">SignUp to Continue</h5>

                <form id="loginForm" method="POST" style="width: 100%; max-width: 420px;"
                    action="<?php echo base_url("UserLoginSignup/register_user") ?>">
                    <!--  Mobile Number -->
                    <div id="mobileStep" class="mb-4">
                        <div class="mb-3">
                            <input type="tel" class="form-control shadow-none form-control-lg rounded-2"
                                id="mobileNumber" name="user_mobilenumber" placeholder="Enter Mobile Number"
                                maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                pattern="[0-9]{10}" title="Please enter a valid 10-digit mobile number" required
                                style="padding: 0.5rem; border: 1px solid #ddd; font-size:1.1rem">
                            <div id="mobileError" class="text-danger small"></div>
                        </div>
                        <button type="button" id="getOtpBtn" class="btn w-100 fw-bold"
                            style="background: #F2DC51; border-radius: 10px; font-size: 1.2rem; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);">
                            Get OTP
                        </button>
                    </div>

                    <!-- OTP Verification -->
                    <div id="otpStep" class="mb-4" style="display: none;">
                        <div class="mb-3">
                            <input type="text" name="user_otp"
                                class="form-control shadow-none form-control-lg rounded-2" id="otpInput"
                                placeholder="Enter OTP" maxlength="4" minlength="4" pattern="[0-9]{4}"
                                style="padding: 0.5rem; border: 1px solid #ddd; font-size:1.1rem">
                            <div id="otpError" class="text-danger small"></div>
                            <div id="timerDisplay" class="mt-2">
                                Time remaining: <span id="timer">60</span> seconds
                            </div>
                            <button type="button" id="resendOtpBtn" class="btn btn-link" style="display: none;">
                                Resend OTP
                            </button>
                        </div>
                        <button type="button" id="verifyOtpBtn" class="btn w-100 fw-bold"
                            style="background: #F2DC51; border-radius: 10px; font-size: 1.2rem; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);">
                            Verify OTP
                        </button>
                    </div>
                    <!--User Details -->
                    <div id="userDetailsStep" class="mb-4" style="display: none;">
                        <div class="mb-3">
                            <label for="fullName">Full Name:</label>
                            <input type="text" name="user_name"
                                class="form-control shadow-none form-control-lg rounded-2" id="fullName"
                                placeholder="Full Name" pattern="^[A-Za-z\s]{3,50}$"
                                title="Name must be 3-50 characters long, containing only letters and spaces." required
                                oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')"
                                style="padding: 0.5rem; border: 1px solid #ddd; font-size:1.1rem">

                            <div id="nameError" class="text-danger small"></div>
                        </div>
                        <div class="mb-3">
                            <label for="gender">Gender:</label>
                            <select class="form-control shadow-none form-control-lg rounded-2" id="gender" required
                                name="user_gender" style="padding: 0.5rem; border: 1px solid #ddd; font-size:1.1rem">
                                <option value="" disabled selected>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>

                            </select>
                            <div id="genderError" class="text-danger small"></div>
                        </div>
                        <div class="mb-3">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" class="form-control shadow-none form-control-lg rounded-2" id="dob"
                                name="user_dob" required max="<?php echo date('Y-m-d'); ?>"
                                style="padding: 0.5rem; border: 1px solid #ddd; font-size:1.1rem">
                            <div id="dobError" class="text-danger small"></div>
                        </div>
                        <button type="submit" class="btn w-100 fw-bold"
                            style="background: #F2DC51; border-radius: 10px; font-size: 1.2rem; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);">
                            Complete Registration
                        </button>
                    </div>

                    <!-- SweetAlert Cdn -->

                </form>

                <p class="mt-4 text-center">Already have an account?
                    <a href="<?php echo base_url('Login'); ?>" class="text-decoration-none text-dark"
                        style=" font-weight: 600;">Log in</a>
                </p>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let timerInterval;

        function startOtpTimer() {
            let timeLeft = 60;
            const timerDisplay = document.getElementById('timer');
            const resendBtn = document.getElementById('resendOtpBtn');

            resendBtn.style.display = 'none';

            timerInterval = setInterval(() => {
                timeLeft--;
                timerDisplay.textContent = timeLeft;

                if (timeLeft <= 0) {
                    clearInterval(timerInterval);
                    document.getElementById('timerDisplay').style.display = 'none';
                    resendBtn.style.display = 'block';
                }
            }, 1000);
        }

        // Modify your existing getOtpBtn click handler
        document.getElementById('getOtpBtn').addEventListener('click', function () {
            const mobile = mobileNumber.value.trim();
            if (mobile.length !== 10 || !/^\d+$/.test(mobile)) {
                document.getElementById('mobileError').innerText = 'Please enter a valid 10-digit mobile number';
                return;
            }
            mobileStep.style.display = 'none';
            otpStep.style.display = 'block';
            startOtpTimer();
        });

        // Add resend OTP button 
        document.getElementById('resendOtpBtn').addEventListener('click', function () {
            document.getElementById('timerDisplay').style.display = 'block';
            startOtpTimer();
        });
    </script>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function (e) {
            e.preventDefault();

            let isValid = true;

            // Clear previous error messages
            document.getElementById('nameError').innerText = '';
            document.getElementById('genderError').innerText = '';
            document.getElementById('dobError').innerText = '';

            // Validate Name
            const name = document.getElementById('fullName').value.trim();
            if (!/^[A-Za-z\s.'`-]{3,50}$/.test(name)) {
                document.getElementById('nameError').innerText = 'Please enter a valid name';
                isValid = false;
            }

            // Validate Gender
            const gender = document.getElementById('gender').value;
            if (!gender) {
                document.getElementById('genderError').innerText = 'Please select gender';
                isValid = false;
            }

            // Validate Date of Birth
            const dob = document.getElementById('dob').value;
            if (!dob || new Date(dob) > new Date()) {
                document.getElementById('dobError').innerText = 'Please enter a valid date of birth';
                isValid = false;
            }

            // Submit the form if all validations pass
            if (isValid) {
                this.submit(); // Submit the form
            }
        });

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mobileStep = document.getElementById('mobileStep');
            const otpStep = document.getElementById('otpStep');
            const userDetailsStep = document.getElementById('userDetailsStep');
            const mobileNumber = document.getElementById('mobileNumber');
            const getOtpBtn = document.getElementById('getOtpBtn');
            const otpInput = document.getElementById('otpInput');
            const verifyOtpBtn = document.getElementById('verifyOtpBtn');

            // Mobile number validation
            getOtpBtn.addEventListener('click', function () {
                const mobile = mobileNumber.value.trim();
                if (mobile.length !== 10 || !/^\d+$/.test(mobile)) {
                    document.getElementById('mobileError').innerText = 'Please enter a valid 10-digit mobile number';
                    return;
                }
                mobileStep.style.display = 'none';
                otpStep.style.display = 'block';
            });

            // OTP validation
            verifyOtpBtn.addEventListener('click', function () {
                const otp = otpInput.value.trim();
                if (otp.length !== 4 || !/^\d+$/.test(otp)) {
                    document.getElementById('otpError').innerText = 'Please enter a valid 4-digit OTP';
                    return;
                }
                otpStep.style.display = 'none';
                userDetailsStep.style.display = 'block';
            });

            // Form submission
            // document.getElementById('loginForm').addEventListener('submit', function (e) {
            //     e.preventDefault();
            //     const formData = {
            //         name: document.getElementById('fullName').value,
            //         gender: document.getElementById('gender').value,
            //         dob: document.getElementById('dob').value
            //     };
            //     console.log(formData);
            // });
        });
    </script>


    <script>
        document.getElementById("chatlink").addEventListener("click", function (event) {
            event.preventDefault(); // Prevent default redirection

            <?php if (!$this->session->userdata('usermobilenumberexit')): ?>
            Swal.fire({
                title: "Login Required",
                text: "usermobilenumberexit",
                icon: "warning",

            });

            <?php endif ?>
        });


    </script>


   


        <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity = "sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin = "anonymous" ></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            <?php if ($this->session->flashdata('usermobilenumberexit')): ?>
            Swal.fire({
                icon: 'warning',

                text: '<?php echo $this->session->flashdata('usermobilenumberexit'); ?>',
                confirmButtonText: 'OK'
            });
     
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            Swal.fire({
                icon: 'warning',

                text: '<?php echo $this->session->flashdata('error'); ?>',
                confirmButtonText: 'OK'
            });

        <?php endif; ?>

        <?php if ($this->session->flashdata('dbqueryerror')): ?>
            Swal.fire({
                icon: 'warning',

                text: '<?php echo $this->session->flashdata('dbqueryerror'); ?>',
                confirmButtonText: 'OK'
            });

        <?php endif; ?>


        <?php if ($this->session->flashdata('sessionnotset')): ?>
            Swal.fire({
                icon: 'warning',

                text: '<?php echo $this->session->flashdata('sessionnotset'); ?>',
                confirmButtonText: 'OK'
            });

        <?php endif; ?>

    });
 </script>



</body>

</html>