<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
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
            width: 230px;
            height: auto;
            margin-top: 230px;
        }
        .input-group {
            display: flex;
            align-items: center;
        }
        .input-group input {
            border-right: none;
            border-radius: 0.375rem 0 0 0.375rem;
        }
        .input-group button {
            border: none;
            background-color: transparent;
            color: #87CEEB;
            margin: 0;
            padding: 0 10px;
            border-radius: 0 0.375rem 0.375rem 0;
            font-size: 1rem;
        }
        .input-group button:hover {
            background-color: transparent;
            color: #6495ED;
        }
        .input-group input:focus,
        .input-group button:focus {
            box-shadow: none;
        }
    </style>
</head>
<body>
    <div class="logo-container " >
    <img src="<?php echo base_url() .'assets/images/Pujari/logo.png'?>" alt="<?php echo base_url() .'assets/images/Pujari/logo.png'?>">
        </div>
    <!-- Registration Form -->
    <div id="registration-form" class="form-container">
        <form id="regForm">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required>
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile No</label>
                <div class="input-group">
                    <input 
                        type="tel" 
                        class="form-control" 
                        id="mobile" 
                        name="mobile" 
                        placeholder="+919565489676" 
                        required 
                        oninput="validatePhoneNumber(this)">
                    <button 
                        id="getOtpBtn" 
                        type="button" 
                        style="display: none;">Get OTP</button>
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
    <div id="otp-form" class="form-container" style="display: none;">
        <p class="text-center">We have sent the code to +91**********</p>
        <form id="otpForm">
            <div class="d-flex justify-content-between mb-3">
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
            alert('OTP Resent!'); // Temporary action
            otpForm.reset(); // Reset form fields
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
