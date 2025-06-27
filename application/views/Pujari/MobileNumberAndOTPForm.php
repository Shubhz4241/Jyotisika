<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pujari Login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/Pujari/jyotishvitaran.png');?>" type="image/png">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: "Montserrat", sans-serif;
            flex-direction: column;
            position: relative;
        }

        .background-container {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 50vh;
            background-image: url('<?php echo base_url("assets/images/Pujari/OTPVarificationForm.png"); ?>');
            background-size: cover;
            background-position: center;
            z-index: -1;
        }

        #form-container {
            background-color: white;
            padding: 40px 25px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            position: relative;
            z-index: 1;
        }

        .btn-custom {
            background-color: #ff8000;
            color: white;
        }

        .btn-custom:hover {
            background-color: #e06c00;
        }

        .logo-container img {
            width: 170px;
            display: block;
            margin: 0 auto 20px;
        }

        @media (max-width: 480px) {
            .logo-container img {
                width: 120px;
            }
        }

        #success-message {
            display: none;
            text-align: center;
        }

        #success-message img {
            width: 200px;
            margin-bottom: 15px;
        }

        #success-message p {
            font-size: 18px;
            font-weight: bold;
            color: #28a745;
        }

        #success-message small {
            display: block;
            margin-top: 10px;
            color: #6c757d;
        }

        .invalid-input {
            border-color: #dc3545 !important;
        }

        #otpSentMessage {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            font-size: 14px;
            text-align: center;
        }

        /* Loader styles */
        .loader-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loader-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #ff9900;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto 10px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>

<body>
    <div class="background-container"></div>

    <div id="form-container">
        <!-- Mobile Number Form -->
        <div id="mobile-form">
            <div class="logo-container">
                <img src="<?php echo base_url() . 'assets/images/Pujari/logo.png' ?>" alt="Logo">
            </div>
            <form>
                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile No</label>
                    <input type="tel" class="form-control" id="mobile" name="mobile_number" placeholder="Enter Mobile Number" maxlength="10" required oninput="validateMobileNumber(this)">
                    <button type="button" id="getOtpBtn" class="btn btn-custom mt-3 w-100" style="display: none;">Get OTP</button>
                </div>
            </form>
            <div class="text-center mt-3">
                <p>Don’t have an account?
                    <a href="<?php echo base_url('RegistrationForm'); ?>" class="text-primary">Register now</a>
                </p>
            </div>
        </div>

        <!-- OTP Form -->
        <div id="otp-form" style="display: none;">
            <div class="logo-container">
                <img src="<?php echo base_url() . 'assets/images/Pujari/logo.png' ?>" alt="Logo">
            </div>
            <div id="otpSentMessage"></div>
            <p class="text-center" id="otpMessage">We have Sent the code on +91************95</p>
            <form>
                <div class="d-flex justify-content-between mb-3">
                    <input type="text" class="form-control text-center me-2 otp-input" maxlength="1" required oninput="validateOtpInput(this)">
                    <input type="text" class="form-control text-center me-2 otp-input" maxlength="1" required oninput="validateOtpInput(this)">
                    <input type="text" class="form-control text-center me-2 otp-input" maxlength="1" required oninput="validateOtpInput(this)">
                    <input type="text" class="form-control text-center otp-input" maxlength="1" required oninput="validateOtpInput(this)">
                </div>
                <button type="button" id="verifyOtpBtn" class="btn btn-custom w-100">Verify OTP</button>
                <div class="text-center mb-3">
                    <span id="resendTimer">Resend OTP in <span id="countdown">00:30</span></span>
                    <button type="button" id="resendOtpBtn" class="btn btn-link p-1" style="display: none;">Resend OTP</button>
                </div>
            </form>
        </div>

        <!-- Success Message -->
        <div id="success-message" style="display: none;">
            <div class="checkmark">
                <img src="<?php echo base_url() . 'assets/images/Pujari/ApplicationSubmited.gif' ?>" alt="Logo">
            </div>
            <p>Login Successfully!</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const mobileForm = document.getElementById('mobile-form');
        const otpForm = document.getElementById('otp-form');
        const successMessage = document.getElementById('success-message');
        const mobileInput = document.getElementById('mobile');
        const getOtpBtn = document.getElementById('getOtpBtn');
        const verifyOtpBtn = document.getElementById('verifyOtpBtn');
        const otpMessage = document.getElementById('otpMessage');
        const countdownElement = document.getElementById('countdown');
        const resendOtpBtn = document.getElementById('resendOtpBtn');
        const otpInputs = document.querySelectorAll('.otp-input');
        let countdown;

        function showLoader() {
            const loader = document.createElement('div');
            loader.className = 'loader-overlay';
            loader.innerHTML = `
                <div class="loader-container">
                    <div class="spinner"></div>
                    <p>Processing request...</p>
                </div>
            `;
            document.body.appendChild(loader);
            return loader;
        }

        function hideLoader(loader) {
            if (loader && loader.parentNode) {
                document.body.removeChild(loader);
            }
        }

        function validateMobileNumber(input) {
            input.value = input.value.replace(/[^0-9]/g, '');
            getOtpBtn.style.display = input.value.length === 10 ? 'block' : 'none';
        }

        function validateOtpInput(input) {
            input.value = input.value.replace(/[^0-9]/g, '');
            if (input.value === '' || isNaN(input.value)) {
                input.classList.add('invalid-input');
            } else {
                input.classList.remove('invalid-input');
            }
            if (input.value.length === 1) {
                const nextInput = input.nextElementSibling;
                if (nextInput && nextInput.classList.contains('otp-input')) {
                    nextInput.focus();
                }
            }
        }

        function validateOtpForm() {
            let isValid = true;
            otpInputs.forEach(input => {
                if (input.value === '' || isNaN(input.value)) {
                    input.classList.add('invalid-input');
                    isValid = false;
                } else {
                    input.classList.remove('invalid-input');
                }
            });
            return isValid;
        }

        getOtpBtn.addEventListener('click', () => {
            if (mobileInput.value.length === 10) {
                const loader = showLoader();
                fetch('<?php echo base_url() . 'PujariController/sendOtp'; ?>', {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: `mobile_number=${encodeURIComponent(mobileInput.value)}`
                })
                .then(response => response.json())
                .then(data => {
                    hideLoader(loader);
                    if (data.status === "success") {
                        let firstTwo = mobileInput.value.substring(0, 2);
                        let lastTwo = mobileInput.value.substring(8, 10);
                        otpMessage.innerHTML = `We have sent the code on +91 ${firstTwo}******${lastTwo}`;
                        document.getElementById('otpSentMessage').innerHTML = `A OTP (One Time Passcode) has been sent to +91 ${firstTwo}******${lastTwo}. Please enter the OTP in the field below to verify your phone.`;
                        mobileForm.style.display = 'none';
                        otpForm.style.display = 'block';
                        startCountdown();
                    } else if (data.status === "pending") {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Application in Process',
                            text: 'Your application is still under review. Please wait for admin approval.',
                            confirmButtonColor: '#ff8000'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: data.message || 'Failed to process your request. Please try again.',
                            confirmButtonColor: '#ff8000'
                        });
                    }
                })
                .catch(error => {
                    hideLoader(loader);
                    console.error("Error:", error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong. Please try again later.',
                        confirmButtonColor: '#ff8000'
                    });
                });
            }
        });

        function startCountdown() {
            let timeLeft = 30;
            resendOtpBtn.style.display = 'none';
            countdownElement.textContent = `00:${timeLeft < 10 ? '0' + timeLeft : timeLeft}`;

            countdown = setInterval(() => {
                timeLeft--;
                countdownElement.textContent = `00:${timeLeft < 10 ? '0' + timeLeft : timeLeft}`;
                if (timeLeft <= 0) {
                    clearInterval(countdown);
                    document.getElementById('resendTimer').style.display = 'none';
                    resendOtpBtn.style.display = 'block';
                }
            }, 1000);
        }

        resendOtpBtn.addEventListener('click', () => {
            const loader = showLoader();
            fetch('<?php echo base_url() . 'PujariController/resendOtp'; ?>', {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `mobile_number=${encodeURIComponent(mobileInput.value)}`
            })
            .then(response => response.json())
            .then(data => {
                hideLoader(loader);
                if (data.status === "success") {
                    let firstTwo = mobileInput.value.substring(0, 2);
                    let lastTwo = mobileInput.value.substring(8, 10);
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'OTP Resent',
                        text: `New OTP has been sent to +91 ${firstTwo}******${lastTwo}`,
                        timer: 3000,
                        showConfirmButton: false
                    });
                    
                    resendOtpBtn.style.display = 'none';
                    document.getElementById('resendTimer').style.display = 'block';
                    startCountdown();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message || 'Failed to resend OTP. Please try again.',
                        confirmButtonColor: '#ff8000'
                    });
                }
            })
            .catch(error => {
                hideLoader(loader);
                console.error("Error:", error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Something went wrong. Please try again later.',
                    confirmButtonColor: '#ff8000'
                });
            });
        });

        verifyOtpBtn.addEventListener('click', () => {
            if (!validateOtpForm()) {
                return;
            }

            let otp = "";
            otpInputs.forEach(input => otp += input.value);

            fetch('<?php echo base_url() . 'PujariController/verifyOtp'; ?>', {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: `mobile_number=${encodeURIComponent(mobileInput.value)}&otp=${encodeURIComponent(otp)}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    otpForm.style.display = 'none';
                    successMessage.style.display = 'block';
                    setTimeout(() => {
                        window.location.href = '<?php echo base_url("PujariDashboard"); ?>';
                    }, 3000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid OTP',
                        text: 'The OTP entered is incorrect. Please try again.',
                        confirmButtonColor: '#ff8000'
                    });
                }
            })
            .catch(error => {
                console.error("Error:", error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Something went wrong. Please try again later.',
                    confirmButtonColor: '#ff8000'
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const urlParams = new URLSearchParams(window.location.search);
            const contact = urlParams.get("contact");
            if (contact && contact.length === 10) {
                mobileInput.value = contact;
                validateMobileNumber(mobileInput);
            }
        });
    </script>
</body>

</html>