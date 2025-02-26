<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: white;
            min-height: 100vh;
            margin: 0;
            padding: 0px;
            width: 100%;
            font-family: "Montserrat", serif;
        }

        /* Registration Form Styles */
        #registration-form {
            background-color: #D9D9D952;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 420px;
            margin: 20px auto;
            height: 100%;
        }

        /* OTP Form Styles */
        #otp-form {
            background-color: #e0e0e0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
            background-color: #D9D9D952;

        }

        .btn-continue {
            background-color: #ff8000;
            color: white;
        }

        .btn-continue:hover {
            background-color: #e06c00;
        }

        .form-check-label a {
            text-decoration: none;
            color: #007bff;
        }

        .form-check-label a:hover {
            text-decoration: underline;
        }

        .logo-container img {
            width: 150px;
            display: block;
            margin: 0 auto 20px;
        }

        .input-group input {
            /* border-right: none; */
            border-radius: 0.375rem !important;
        }

        .input-group button {
            border: none;
            background-color: transparent;
            color: #87CEEB;
            padding: 0 10px;
            border-radius: 0 0.375rem 0.375rem 0;
            font-size: 1rem;
        }

        .input-group button:hover {
            color: #6495ED;
        }

        .input-group input:focus,
        .input-group button:focus {
            box-shadow: none;
        }

        /* Responsive Styles */
        @media (max-width: 480px) {
            #otp-form {
                padding: 15px;
                margin: 20px;
            }

            .logo-container img {
                width: 120px;
            }
        }
    </style>
</head>

<body>

    <!-- Registration Form -->

    <div id="registration-form">
        <div class="logo-container">
            <img src="<?php echo base_url() . 'assets/images/Pujari/logo.png' ?>" alt="Logo">
        </div>
        <form id="regForm">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required>
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile No</label>
                <div class="input-group">
                    <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="+919565489676" required oninput="validatePhoneNumber(this)">
                    <button id="getOtpBtn" type="button" style="display: none;">Get OTP</button>
                </div>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Select Gender</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
            </div>
            <div class="mb-3">
                <label for="experience" class="form-label">Experience</label>
                <textarea class="form-control" id="experience" name="experience" placeholder="Enter your experience" rows="3" required></textarea>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                <label class="form-check-label" for="terms">
                    By ticking the box you agree to <a href="#">our terms and conditions</a> and <a href="#">privacy and policy</a>
                </label>
            </div>
            <button type="submit" class="btn btn-continue w-100">Continue</button>
        </form>
    </div>

    <!-- OTP Form -->
    <div id="otp-form" style="display: none;">
        <div class="logo-container">
            <img src="<?php echo base_url() . 'assets/images/Pujari/logo.png' ?>" alt="Logo">
        </div>
        <p class="text-center mt-2">We have sent the code to +91**********</p>
        <form id="otpForm">
            <div class="d-flex justify-content-between mb-3 center">
                <input type="text" class="form-control text-center me-2" maxlength="1" required>
                <input type="text" class="form-control text-center me-2" maxlength="1" required>
                <input type="text" class="form-control text-center me-2" maxlength="1" required>
                <input type="text" class="form-control text-center" maxlength="1" required>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <a href="#" id="resendOtp" class="text-primary">Resend OTP</a>
                <span id="otpTimer">00:30</span>
            </div>
            <button type="button" class="btn btn-continue w-100" id="verifyOtp">Continue</button>
        </form>
    </div>

    <script>
        const regForm = document.getElementById('registration-form');
        const otpForm = document.getElementById('otp-form');
        const mobileInput = document.getElementById('mobile');
        const getOtpBtn = document.getElementById('getOtpBtn');
        const verifyOtpBtn = document.getElementById('verifyOtp');
        const resendOtp = document.getElementById('resendOtp');

        // Show 'Get OTP' button when mobile number is entered
        mobileInput.addEventListener('input', () => {
            getOtpBtn.style.display = mobileInput.value.length >= 10 ? 'inline-block' : 'none';
        });

        // Show OTP form on clicking 'Get OTP'
        getOtpBtn.addEventListener('click', () => {
            regForm.style.display = 'none';
            otpForm.style.display = 'block';
        });

        // Simulate resend OTP functionality
        resendOtp.addEventListener('click', (e) => {
            e.preventDefault();
            alert('OTP Resent!');
            otpForm.reset();
        });

        // Return to registration form after OTP verification
        verifyOtpBtn.addEventListener('click', () => {
            otpForm.style.display = 'none';
            regForm.style.display = 'block';
        });

        function validatePhoneNumber(input) {
            input.value = input.value.replace(/[^0-9]/g, '');
            getOtpBtn.style.display = input.value.length >= 10 ? 'inline-block' : 'none';
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>