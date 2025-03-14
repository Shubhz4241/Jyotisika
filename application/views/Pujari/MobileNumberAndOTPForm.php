<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Number and OTP Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
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

        /* Background image only covers bottom 50% */
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
    </style>
</head>

<body>

    <!-- Background Image (Covers bottom half) -->
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
                    <input type="tel" class="form-control" id="mobile" placeholder="Enter Mobile Number" maxlength="10" required oninput="validateMobileNumber(this)">
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
            <p class="text-center">We have Sent the code on +91************95</p>
            <form>
                <div class="d-flex justify-content-between mb-3">
                    <input type="text" class="form-control text-center me-2" maxlength="1" required>
                    <input type="text" class="form-control text-center me-2" maxlength="1" required>
                    <input type="text" class="form-control text-center me-2" maxlength="1" required>
                    <input type="text" class="form-control text-center" maxlength="1" required>
                </div>

                <button type="button" id="verifyOtpBtn" class="btn btn-custom w-100">Verify OTP</button>
                <!-- Resend OTP Timer Section -->
                <div class="text-center mb-3">
                    <span id="resendTimer">Resend OTP in <span id="countdown">00:30</span></span>
                    <button type="button" id="resendOtpBtn" class="btn btn-link p-1" style="display: none;">Resend OTP</button>
                </div>
            </form>
        </div>

        <!-- Success Message -->
        <div id="success-message">
            <div class="checkmark">
                <img src="<?php echo base_url() . 'assets/images/Pujari/ApplicationSubmited.gif' ?>" alt="Logo">
            </div>
            <p>Application Submitted Successfully!</p>
            <small>Thank you for your submission! Our team is reviewing your application. </small>
            <small>Note:- You will receive an update within 48 hours. If you have any queries, feel free to contact our support team."</small>
        </div>
    </div>

    <script>
        const mobileForm = document.getElementById('mobile-form');
        const otpForm = document.getElementById('otp-form');
        const successMessage = document.getElementById('success-message');
        const mobileInput = document.getElementById('mobile');
        const getOtpBtn = document.getElementById('getOtpBtn');
        const verifyOtpBtn = document.getElementById('verifyOtpBtn');
        const otpMessage = document.querySelector('#otp-form p');
        const countdownElement = document.getElementById('countdown');
        const resendOtpBtn = document.getElementById('resendOtpBtn');
        let countdown;

        function validateMobileNumber(input) {
            input.value = input.value.replace(/[^0-9]/g, ''); // Allow only numbers
            getOtpBtn.style.display = input.value.length === 10 ? 'block' : 'none';
        }

        getOtpBtn.addEventListener('click', () => {
            if (mobileInput.value.length === 10) {
                let firstTwo = mobileInput.value.substring(0, 2);
                let lastTwo = mobileInput.value.substring(8, 10);
                otpMessage.innerHTML = `We have Sent the code on +91 ${firstTwo}******${lastTwo}`;
                mobileForm.style.display = 'none';
                otpForm.style.display = 'block';
                startCountdown();
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
            resendOtpBtn.style.display = 'none';
            document.getElementById('resendTimer').style.display = 'block';
            startCountdown();
        });

        verifyOtpBtn.addEventListener('click', () => {
            otpForm.style.display = 'none';
            successMessage.style.display = 'block';
            // Redirect to PujariDashboard after 2 seconds
            setTimeout(() => {
                window.location.href = '<?php echo base_url("PujariDashboard"); ?>';
            }, 2000);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const urlParams = new URLSearchParams(window.location.search);
        const successParam = urlParams.get("success");

        if (successParam === "true") {
            document.getElementById('mobile-form').style.display = 'none';
            document.getElementById('otp-form').style.display = 'none';
            document.getElementById('success-message').style.display = 'block';
            // Redirect to PujariDashboard after 2 seconds
            setTimeout(() => {
                window.location.href = '<?php echo base_url("PujariDashboard"); ?>';
            }, 2000);
        }
    });
</script>

</body>

</html>