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
                    <h3 class="fw-bold mb-4" style="color: #333; font-size: 1.5rem;">  <?php echo $this->lang->line('why_signup') ? $this->lang->line('why_signup') : ' Why Sign Up?'; ?> </h3>
                    <div class="benefits-list" style="font-size: 1rem; line-height: 2;">
                        <p class="d-flex align-items-start mb-1">
                            <span class="me-3" style="font-size: 1.5rem; color: #F7C548;">✔</span>
                            <?php echo $this->lang->line('get_personalized_info') ? $this->lang->line('get_personalized_info') : 'Get personalized information'; ?>
                        </p>
                        <p class="d-flex align-items-start mb-1">
                            <span class="me-3" style="font-size: 1.5rem; color: #F7C548;">✔</span>
                            <?php echo $this->lang->line('save_kundli_on_cloud') ? $this->lang->line('save_kundli_on_cloud') : 'Save charts (Kundli) on cloud'; ?> 
                        </p>
                        <p class="d-flex align-items-start mb-1">
                            <span class="me-3" style="font-size: 1.5rem; color: #F7C548;">✔</span>
                            <?php echo $this->lang->line('write_notes_comments') ? $this->lang->line('write_notes_comments') : 'Write notes & comments'; ?> 
                        </p>
                        <p class="d-flex align-items-start">
                            <span class="me-3" style="font-size: 1.5rem; color: #F7C548;">✔</span>
                            <?php echo $this->lang->line('access_anywhere') ? $this->lang->line('access_anywhere') : 'Access anywhere: mobile & web'; ?>  
                        </p>
                    </div>
                    <img src="<?php echo base_url('assets/images/ShreeGanesh.jpg'); ?>" alt="Benefits"
                        class="img-fluid mt-2 rounded" style="max-width: 280px;">
                </div>
            </div>

            <!-- Right Section: Login Form -->
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center p-5 order-1 order-md-2"
                style="background: #FFF;">
                <h5 class="text-center fw-bold mb-4" style="color: #444; font-size: 1.6rem;">  <?php echo $this->lang->line('signup_to_continue') ? $this->lang->line('signup_to_continue') : 'SignUp to Continue'; ?>  </h5>

                <!-- <form id="loginForm" method="POST" style="width: 100%; max-width: 420px;"
                    action="<?php echo base_url("UserLoginSignup/register_user") ?>"> -->

                <form id="loginForm" style="width: 100%; max-width: 420px;">
                    <!-- Mobile Number -->
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
                             <?php echo $this->lang->line('get_otp') ? $this->lang->line('get_otp') : 'Get OTP'; ?>  
                        </button>
                    </div>

                    <!-- OTP Verification -->
                    <div id="otpStep" class="mb-4" style="display: none;">
                        <div class="mb-3">
                            <input type="text" name="user_otp"
                                class="form-control shadow-none form-control-lg rounded-2" id="otpInput"
                                placeholder="Enter OTP" maxlength="6" minlength="6" pattern="[0-9]{6}"
                                style="padding: 0.5rem; border: 1px solid #ddd; font-size:1.1rem">
                            <div id="otpError" class="text-danger small"></div>
                            <div id="timerDisplay" class="mt-2">
                                   <?php echo $this->lang->line('time_remaining') ? $this->lang->line('time_remaining') : 'Time remaining:'; ?> <span id="timer">60</span><?php echo $this->lang->line('seconds') ? $this->lang->line('seconds') : 'Seconds:'; ?>
                            </div>
                            <button type="button" id="resendOtpBtn" class="btn btn-link" style="display: none;">
                                <?php echo $this->lang->line('resend_otp') ? $this->lang->line('resend_otp') : ' Resend OTP'; ?>   
                            </button>
                        </div>
                        <button type="button" id="verifyOtpBtn" class="btn w-100 fw-bold"
                            style="background: #F2DC51; border-radius: 10px; font-size: 1.2rem; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);">
                            <?php echo $this->lang->line('verify_otp') ? $this->lang->line('verify_otp') : 'Verify OTP'; ?> 
                        </button>
                    </div>
                    <!--User Details -->
                    <div id="userDetailsStep" class="mb-4" style="display: none;">
                        <div class="mb-3">
                            <label for="fullName"><?php echo $this->lang->line('full_name') ? $this->lang->line('full_name') : 'Full Name'; ?> </label>
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
                                <option value="male"><?php echo $this->lang->line('male') ? $this->lang->line('male') : 'Male'; ?> </option>
                                <option value="female"><?php echo $this->lang->line('female') ? $this->lang->line('female') : 'Female'; ?></option>

                            </select>
                            <div id="genderError" class="text-danger small"></div>
                        </div>
                        <div class="mb-3">
                            <label for="dob"><?php echo $this->lang->line('dob') ? $this->lang->line('dob') : 'Date of Birth:'; ?></label>
                            <input type="date" class="form-control shadow-none form-control-lg rounded-2" id="dob"
                                name="user_dob" required max="<?php echo date('Y-m-d'); ?>"
                                style="padding: 0.5rem; border: 1px solid #ddd; font-size:1.1rem">
                            <div id="dobError" class="text-danger small"></div>
                        </div>
                        <button type="submit" class="btn w-100 fw-bold"
                            style="background: #F2DC51; border-radius: 10px; font-size: 1.2rem; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);">
                        <?php echo $this->lang->line('complete_registration') ? $this->lang->line('complete_registration') : ' Complete Registration'; ?>   
                        </button>
                    </div>

                    <!-- SweetAlert Cdn -->

                </form>

                <p class="mt-4 text-center"> <?php echo $this->lang->line('dont_have_account') ? $this->lang->line('dont_have_account') : ' Dont have a Account?'; ?> 
                    <a href="<?php echo base_url('Login'); ?>" class="text-decoration-none text-dark"
                        style=" font-weight: 600;"> <?php echo $this->lang->line('login') ? $this->lang->line('login') : 'Log in'; ?></a>
                </p>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <!-- <script>
        document.getElementById('loginForm').addEventListener('submit', function (e) {
            e.preventDefault();
            let isValid = true;

           
            document.getElementById('nameError').innerText = '';
            document.getElementById('genderError').innerText = '';
            document.getElementById('dobError').innerText = '';

          
            const name = document.getElementById('fullName').value.trim();
            if (!/^[A-Za-z\s.'`-]{3,50}$/.test(name)) {
                document.getElementById('nameError').innerText = 'Please enter a valid name';
                isValid = false;
            }

            
            const gender = document.getElementById('gender').value;
            if (!gender) {
                document.getElementById('genderError').innerText = 'Please select gender';
                isValid = false;
            }

          
            const dob = document.getElementById('dob').value;
            if (!dob || new Date(dob) > new Date()) {
                document.getElementById('dobError').innerText = 'Please enter a valid date of birth';
                isValid = false;
            }

          
            if (isValid) {
                this.submit(); 
            }
        });

    </script>
 -->


    <!-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mobileStep = document.getElementById('mobileStep');
            const otpStep = document.getElementById('otpStep');
            const userDetailsStep = document.getElementById('userDetailsStep');
            const mobileNumber = document.getElementById('mobileNumber');
            const getOtpBtn = document.getElementById('getOtpBtn');
            const otpInput = document.getElementById('otpInput');
            const verifyOtpBtn = document.getElementById('verifyOtpBtn');

              otpStep.style.display = 'none';
              userDetailsStep.style.display = 'block';

           
            getOtpBtn.addEventListener('click', function () {
                const mobile = mobileNumber.value.trim();
                if (mobile.length !== 10 || !/^\d+$/.test(mobile)) {
                    document.getElementById('mobileError').innerText = 'Please enter a valid 10-digit mobile number';
                    return;
                }
                mobileStep.style.display = 'none';
                otpStep.style.display = 'block';
            });

          
            verifyOtpBtn.addEventListener('click', function () {
                const otp = otpInput.value.trim();
                if (otp.length !== 6 || !/^\d+$/.test(otp)) {
                    document.getElementById('otpError').innerText = 'Please enter a valid 6-digit OTP';
                    return;
                }
                otpStep.style.display = 'none';
                userDetailsStep.style.display = 'block';
            });

            Form submission
            document.getElementById('loginForm').addEventListener('submit', function (e) {
                e.preventDefault();
                const formData = {
                    name: document.getElementById('fullName').value,
                    gender: document.getElementById('gender').value,
                    dob: document.getElementById('dob').value
                };
                console.log(formData);
            });
        });
    </script> -->

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


        document.getElementById('getOtpBtn').addEventListener('click', function () {
            const mobile = mobileNumber.value.trim();
            if (mobile.length !== 10 || !/^\d+$/.test(mobile)) {
                document.getElementById('mobileError').innerText = 'Please enter a valid 10-digit mobile number';
                return;
            }

        });




    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>


        document.addEventListener("DOMContentLoaded", function () {


            const getOtpBtn = document.getElementById("getOtpBtn");
            const mobileNumberInput = document.getElementById("mobileNumber");

            function sendOtp() {
                let phoneNumber = mobileNumberInput.value.trim();


                getOtpBtn.disabled = true;
                getOtpBtn.innerText = "Sending...";
                // Validate mobile number
                if (!phoneNumber) {
                    Swal.fire({
                        icon: "warning",
                        title: "Phone Number Required",
                        text: "Please enter your mobile number before requesting OTP.",
                    });
                    return;
                }

                if (!/^\d{10}$/.test(phoneNumber)) {
                    Swal.fire({
                        icon: "error",
                        title: "Invalid Number",
                        text: "Please enter a valid 10-digit mobile number.",
                    });
                    return;
                }

                // Show a loading alert while sending OTP
                Swal.fire({
                    title: "Sending OTP...",
                    text: "Please wait while we send OTP to your mobile number.",
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                fetch("<?php echo base_url('User_Api_Controller/sendOtpmobile'); ?>", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ mobile_number: phoneNumber, action: "signin" })
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log("API Response:", data);

                        if (data.status === "success") {
                            Swal.fire({
                                icon: "success",
                                title: "OTP Sent!",
                                text: "An OTP has been sent to your mobile number.",
                                timer: 2000,
                                showConfirmButton: false
                            }).then(() => {
                                document.getElementById("mobileStep").style.display = "none";
                                document.getElementById("otpStep").style.display = "block";
                                startOtpTimer(); // Start OTP timer
                            });
                        } else if (data.status === "notregistered") {
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
                                title: "Failed to Send OTP",
                                text: data.error || "Something went wrong. Please try again.",
                            });
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        Swal.fire({
                            icon: "error",
                            title: "Oops!",
                            text: "Something went wrong! Please try again later.",
                        });
                    }).finally(() => {
                        // Enable the button again after response or failure
                        getOtpBtn.disabled = false;
                        getOtpBtn.innerText = "Get OTP";
                    });
            }

            // Attach event listener to the Get OTP button
            getOtpBtn.addEventListener("click", sendOtp);

            // Allow OTP request on pressing 'Enter'
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


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const verifyOtpBtn = document.getElementById("verifyOtpBtn");
            const otpInput = document.getElementById("otpInput");
            const mobileNumberInput = document.getElementById("mobileNumber");

            function verifyOtp() {
                let phoneNumber = mobileNumberInput.value;
                let otp = otpInput.value;

                if (!otp) {
                    Swal.fire({
                        icon: "warning",
                        title: "OTP Required",
                        text: "Please enter the OTP before verifying.",
                    });
                    return;
                }

                // Show a loading alert while verifying OTP
                Swal.fire({
                    title: "Verifying OTP...",
                    text: "Please wait while we verify your OTP.",
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });


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
                                title: "OTP Verified!",
                                text: "Redirecting you to your screen...",
                                timer: 2000,
                                showConfirmButton: false
                            }).then(() => {
                                window.location.href = "<?php echo base_url('User/home'); ?>";
                            });
                        } else if (data.status === "otpmatchreg") {
                            Swal.fire({
                                icon: "info",
                                title: "OTP Matched",
                                text: "Please complete your registration.",
                            }).then(() => {

                                document.getElementById("otpStep").innerHTML = ""; // Clears OTP step before registration

                                document.getElementById("userDetailsStep").style.display = "block";
                            });
                        } else if (data.status === "userresticted") {
                            Swal.fire({
                                icon: "warning",
                                title: "Access Denied",
                                text: "Your account has been banned. Please contact support for assistance.",
                            });

                        } else {
                            Swal.fire({
                                icon: "warning",
                                title: "Verification Failed",
                                text: data.message || "Invalid OTP, please try again.",
                            });
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        Swal.fire({
                            icon: "error",
                            title: "Oops!",
                            text: "Something went wrong! Please try again later.",
                        });
                    });
            }

            // Attach event listener to the Verify OTP button
            verifyOtpBtn.addEventListener("click", verifyOtp);

            // Allow OTP verification on pressing 'Enter'
            otpInput.addEventListener("keypress", function (event) {
                if (event.key === "Enter") {
                    event.preventDefault();
                    verifyOtp();
                }
            });
        });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const registrationForm = document.getElementById("loginForm");

            registrationForm.addEventListener("submit", function (event) {
                event.preventDefault();

                const formData = {
                    mobile_number: document.getElementById("mobileNumber").value,

                    user_name: document.getElementById("fullName").value,
                    user_gender: document.getElementById("gender").value,
                    user_dob: document.getElementById("dob").value
                };

                // Show a loading alert
                Swal.fire({
                    title: "Processing...",
                    text: "Please wait while we register your account.",
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                fetch("<?php echo base_url('User_Api_Controller/reg_user'); ?>", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(formData)
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log("API Response:", data);

                        if (data.status === "success") {
                            Swal.fire({
                                icon: "success",
                                title: "Registration Successful!",
                                text: "Welcome to our platform!",
                                confirmButtonText: "Go to Dashboard"
                            }).then(() => {
                                window.location.href = "<?php echo base_url('User/home'); ?>";
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Registration Failed",
                                text: data.message || "Something went wrong, please try again.",
                            });
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        Swal.fire({
                            icon: "error",
                            title: "Oops!",
                            text: "Something went wrong! Please try again later.",
                        });
                    });
            });
        });
    </script>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>





</body>

</html>