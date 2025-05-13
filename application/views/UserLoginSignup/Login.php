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

<b>


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
                <h5 class="fw-bold mb-4" style="color: #444; font-size: 1.6rem;">LogIn to Continue</h5>

                <!-- <form id="loginForm" method="POST" action="<?php echo base_url("UserLoginSignup/login_user"); ?>"
                    style="width: 100%; max-width: 420px;"> -->

                <form id="loginForm" style="width: 100%; max-width: 420px;">



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
                                placeholder="Enter OTP" maxlength="6"
                                style="padding: 0.5rem; border: 1px solid #ddd; font-size:1.1rem">
                            <div id="otpError" class="text-danger small"></div>
                            <div id="timerDisplay" class="mt-2">
                                Time remaining: <span id="timer">60</span> seconds
                            </div>
                            <button type="button" id="resendOtpBtn" class="btn btn-link" style="display: none;">
                                Resend OTP
                            </button>
                        </div>
                        <!-- <button type="submit" id="verifyOtpBtn" class="btn w-100 fw-bold"
                            style="background: #F2DC51; border-radius: 10px; font-size: 1.2rem; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);">
                            Verify OTP
                        </button> -->

                        <button type="submit" id="verifyOtpBtn" class="btn w-100 fw-bold"
                            style="background: #F2DC51; border-radius: 10px; font-size: 1.2rem; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);">
                            Verify OTP
                        </button>
                    </div>
                </form>

                <p class="mt-4 text-center">Don't have a Account? <a href="<?php echo base_url('Signup'); ?>"
                        class="text-decoration-none text-dark" style=" font-weight: 900;">Sign Up</a></p>
            </div>
        </div>
    </div>

    <script>
        let timerInterval;

        function startOtpTimer() {
            let timeLeft = 60;
            const timerDisplay = document.getElementById('timer');
            const resendBtn = document.getElementById('resendOtpBtn');

            resendBtn.style.display = 'none';
            document.getElementById('timerDisplay').style.display = 'block';

            clearInterval(timerInterval);
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

        document.getElementById('getOtpBtn').addEventListener('click', function () {
            const mobile = document.getElementById('mobileNumber').value.trim();
            if (mobile.length !== 10 || !/^\d+$/.test(mobile)) {
                document.getElementById('mobileError').innerText = 'Please enter a valid 10-digit mobile number';
                return;
            }
            // document.getElementById('mobileStep').style.display = 'none';
            // document.getElementById('otpStep').style.display = 'block';
            // startOtpTimer();
        });

      

    </script>




    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const getOtpBtn = document.getElementById("getOtpBtn");
            const mobileNumberInput = document.getElementById("mobileNumber");
            const mobileError = document.getElementById("mobileError");

            function sendOtp() {
                let phoneNumber = mobileNumberInput.value.trim();

                // Validate mobile number
                if (phoneNumber.length !== 10 || !/^\d+$/.test(phoneNumber)) {
                    mobileError.innerText = "Please enter a valid 10-digit mobile number";
                    return;
                }
                mobileError.innerText = ""; // Clear error if valid

                fetch("<?php echo base_url('User_Api_Controller/sendOtpmobile'); ?>", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ mobile_number: phoneNumber })
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log("API Response:", data);
                        if (data.status === "success") {
                            Swal.fire({
                                icon: "success",
                                title: "OTP Sent!",
                                text: "Check your mobile for the OTP.",
                            });

                            document.getElementById("mobileStep").style.display = "none";
                            document.getElementById("otpStep").style.display = "block";
                            startOtpTimer();
                        }else if (data.status === "notregistered") {
                            Swal.fire({
                                icon: "warning",
                                title: "User not found",
                                text: "Please sign up to continue."
                            })


                            // document.getElementById("mobileStep").style.display = "none";
                            // document.getElementById("otpStep").style.display = "block";
                            // startOtpTimer();
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: data.error || "Failed to send OTP. Please try again.",
                            });
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "Something went wrong!",
                        });
                    });
            }

            getOtpBtn.addEventListener("click", sendOtp);

            mobileNumberInput.addEventListener("keypress", function (event) {
                if (event.key === "Enter") {
                    event.preventDefault();
                    sendOtp();
                }
            });

            
        document.getElementById('resendOtpBtn').addEventListener('click', function () {
            document.getElementById('timerDisplay').style.display = 'block';
            sendOtp();
            startOtpTimer();
        });
        });
    </script>

    <script>
        document.getElementById("verifyOtpBtn").addEventListener("click", function (event) {
            event.preventDefault(); // Prevent default form submission

            let phoneNumber = document.getElementById("mobileNumber").value.trim();
            let otp = document.getElementById("otpInput").value.trim();

            if (!otp) {
                Swal.fire({
                    icon: "warning",
                    title: "Empty OTP",
                    text: "Please enter the OTP!",
                });
                return;
            }

            fetch("<?php echo base_url('User_Api_Controller/VerifyOtp'); ?>", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ mobile_number: phoneNumber, otp: otp })
            })
                .then(response => response.json())
                .then(data => {
                    console.log("API Response:", data);

                    if (data.status === "success") {
                        Swal.fire({
                            icon: "success",
                            title: "OTP Verified",
                            text: "Verification successful! Redirecting...",
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.href = "<?php echo base_url('User/home'); ?>";
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Verification Failed",
                            text: data.message || "Invalid OTP. Please try again!",
                        });
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Something went wrong! Please try again.",
                    });
                });
        });

    </script>



    <!-- <script>
        document.getElementById('loginForm').addEventListener('submit', function (e) {
            e.preventDefault();

            let isValid = true;

           

            
            if (isValid) {
                this.submit(); 
            }
        });

    </script> -->



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            <?php if ($this->session->flashdata('otp_failed')): ?>
                Swal.fire({
                    icon: 'warning',

                    text: '<?php echo $this->session->flashdata('otp_failed'); ?>',
                    confirmButtonText: 'OK'
                });
            <?php endif; ?>

            <?php if ($this->session->flashdata('usernotexit')): ?>
                Swal.fire({
                    icon: 'warning',

                    text: '<?php echo $this->session->flashdata('usernotexit'); ?>',
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

            <?php if ($this->session->flashdata('dberror')): ?>
                Swal.fire({
                    icon: 'warning',

                    text: '<?php echo $this->session->flashdata('dberror'); ?>',
                    confirmButtonText: 'OK'
                });
            <?php endif; ?>


        });
    </script>



    <!-- SweetAlert Cdn -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    </body>

</html>