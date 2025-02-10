<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Number and OTP Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: white;
            min-height: 100vh;
            margin: 0;
            padding: 0px;
            width: 100%;
            font-family: "Montserrat", serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #form-container {
            background-color: #D9D9D952;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 420px;
        }

        .btn-custom {
            background-color: #ff8000;
            color: white;
        }

        .btn-custom:hover {
            background-color: #e06c00;
        }

        .logo-container img {
            width: 150px;
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
            width: 100px;
            margin-bottom: 20px;
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
    <!-- Mobile Number Form -->
    <div id="form-container">
        <div id="mobile-form">
            <div class="logo-container">
                <img src="<?php echo base_url() . 'assets/images/Pujari/logo.png' ?>" alt="Logo">
            </div>
            <form>
                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile Number</label>
                    <input type="tel" class="form-control" id="mobile" placeholder="Enter Mobile Number" maxlength="10" required oninput="validateMobileNumber(this)">
                    <button type="button" id="getOtpBtn" class="btn btn-custom mt-3 w-100" style="display: none;">Get OTP</button>
                </div>
            </form>
        </div>

        <!-- OTP Form -->
        <div id="otp-form" style="display: none;">
            <div class="logo-container">
                <img src="<?php echo base_url() . 'assets/images/Pujari/logo.png' ?>" alt="Logo">
            </div>
            <p class="text-center">We have sent an OTP to your mobile number</p>
            <form>
                <div class="d-flex justify-content-between mb-3">
                    <input type="text" class="form-control text-center me-2" maxlength="1" required>
                    <input type="text" class="form-control text-center me-2" maxlength="1" required>
                    <input type="text" class="form-control text-center me-2" maxlength="1" required>
                    <input type="text" class="form-control text-center" maxlength="1" required>
                </div>
                <button type="button" id="verifyOtpBtn" class="btn btn-custom w-100">Verify OTP</button>
            </form>
        </div>

        <!-- Success Message -->
        <div id="success-message">
            <img src="<?php echo base_url() . 'assets/images/Pujari/logo.png' ?>" alt="Logo">
            <div class="checkmark">
            <img src="<?php echo base_url() . 'assets/images/Pujari/Tick Circle.png' ?>" alt="Logo">
            </div>
            <p>Yay! Registration completed successfully</p>
            <small>Note: After reviewing your profile we will schedule an interview to proceed further.</small>
        </div>
    </div>

    <script>
        const mobileForm = document.getElementById('mobile-form');
        const otpForm = document.getElementById('otp-form');
        const successMessage = document.getElementById('success-message');
        const mobileInput = document.getElementById('mobile');
        const getOtpBtn = document.getElementById('getOtpBtn');
        const verifyOtpBtn = document.getElementById('verifyOtpBtn');

        // Validate and display 'Get OTP' button
        function validateMobileNumber(input) {
            input.value = input.value.replace(/[^0-9]/g, ''); // Allow only numbers
            getOtpBtn.style.display = input.value.length === 10 ? 'block' : 'none';
        }

        // Show OTP form when 'Get OTP' is clicked
        getOtpBtn.addEventListener('click', () => {
            mobileForm.style.display = 'none';
            otpForm.style.display = 'block';
        });

        // Show success message when 'Verify OTP' is clicked
        verifyOtpBtn.addEventListener('click', () => {
            otpForm.style.display = 'none';
            successMessage.style.display = 'block';
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
