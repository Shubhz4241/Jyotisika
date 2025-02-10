<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            font-family: "Montserrat", serif;
        }

        .form-container {
            background-color: #D9D9D985;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 15px;
        }

        .logo-container img {
            width: 120px;
            height: auto;
        }

        .success-icon {
            position: absolute;
            right: 10px;
            top: 80%;
            transform: translateY(-50%);
            color: green;
            font-size: 1.5rem;
            display: none;
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .form-container {
                padding: 15px;
            }

            .logo-container img {
                width: 100px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="form-container mx-auto">
            <div class="logo-container">
                <img src="<?php echo base_url() . 'assets/images/Pujari/logo.png' ?>" alt="Logo">
            </div>

            <form id="registrationForm" method="POST">
                <div class="mb-2">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required>
                </div>

                <div class="mb-2 position-relative">
                    <label class="form-label">Mobile No</label>
                    <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="+919565489676" required oninput="validatePhoneNumber(this)">
                    <span class="success-icon" id="successIcon">&#10004;</span>
                </div>

                <div class="mb-2">
                    <label class="form-label">Select Gender</label>
                    <select class="form-select" id="gender" name="gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="mb-2">
                    <label class="form-label">Speciality</label>
                    <select class="form-select" id="speciality" name="speciality" required>
                        <option value="Ghar Shanti Puja">Ghar Shanti Puja</option>
                        <option value="Vastu Shanti">Vastu Shanti</option>
                        <option value="Graha Dosh Puja">Graha Dosh Puja</option>
                    </select>
                </div>

                <div class="mb-2">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                </div>

                <div class="mb-2">
                    <label class="form-label">Experience</label>
                    <textarea class="form-control" id="experience" name="experience" placeholder="Enter your experience" rows="3" required></textarea>
                </div>

                <div class="form-check mb-2">
                    <input type="checkbox" class="form-check-input" id="terms" name="terms">
                    <label class="form-check-label">
                        By ticking the box you agree to <a href="#">our terms and conditions</a> and <a href="#">privacy and policy</a>
                    </label>
                </div>

                <button type="submit" class="btn btn-warning w-100">Register</button>
            </form>
        </div>
    </div>

    <script>
        function validatePhoneNumber(input) {
            input.value = input.value.replace(/[^0-9]/g, '');
            let successIcon = document.getElementById('successIcon');
            if (input.value.length === 10) {
                successIcon.style.display = 'inline-block';
            } else {
                successIcon.style.display = 'none';
            }
        }

        document.getElementById("registrationForm").addEventListener("submit", function(event) {
            event.preventDefault();

            let name = document.getElementById("name").value.trim();
            let mobile = document.getElementById("mobile").value.trim();
            let gender = document.getElementById("gender").value;
            let speciality = document.getElementById("speciality").value;
            let address = document.getElementById("address").value.trim();
            let experience = document.getElementById("experience").value.trim();
            let terms = document.getElementById("terms").checked;

            if (!name || !mobile || !gender || !speciality || !address || !experience) {
                alert("All fields are required!");
                return;
            }

            if (mobile.length !== 10) {
                alert("Please enter a valid 10-digit mobile number.");
                return;
            }

            if (!terms) {
                alert("You must accept the terms and conditions!");
                return;
            }

            document.querySelector(".form-container").innerHTML = `
                <div class="text-center">
                    <img src="<?php echo base_url() . 'assets/images/Pujari/Tick Circle.png' ?>" alt="Success" width="100">
                    <h2 class="mt-3">Registration Successful!</h2>
                    <p>After reviewing your profile, we will schedule an interview.</p>
                </div>
            `;
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>