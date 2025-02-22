<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Pujari Role</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 700px;
            position: relative;
            z-index: 2;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn-custom {
            background-color: #ff8000;
            color: white;
            width: 100%;
        }
        .btn-custom:hover {
            background-color: #e06c00;
        }
        .background-container {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 50vh;
            background-image: url('assets/images/Pujari/OTPVarificationForm.png');
            background-size: cover;
            background-position: center;
            z-index: -1;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo-container img {
            width: 150px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="assets/images/Pujari/logo.png" alt="Jyotisika Logo">
        </div>
        <h4 class="text-center">Apply for Pujari Role</h4>
        <form id="pujariForm">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="name" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Contact</label>
                    <input type="tel" class="form-control" id="contact" maxlength="10" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Gender</label>
                    <select class="form-control" id="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" id="address" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Languages Known</label>
                    <select class="form-control" id="languages" required>
                        <option value="">Select languages</option>
                        <option value="Hindi">Hindi</option>
                        <option value="Sanskrit">Sanskrit</option>
                        <option value="English">English</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>Specialties</label>
                    <input type="text" class="form-control" id="specialties" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Aadhaar Card</label>
                    <select class="form-control" id="aadhaar" required>
                        <option value="">Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div class="col-md-12 form-group">
                    <label>Certificates (optional)</label>
                    <input type="file" class="form-control" id="certificates">
                </div>
            </div>
            <button type="submit" class="btn btn-custom mt-3">Submit</button>
        </form>
    </div>
    <div class="background-container"></div>

    <script>
        document.getElementById("pujariForm").addEventListener("submit", function(event) {
            let name = document.getElementById("name").value.trim();
            let contact = document.getElementById("contact").value.trim();
            let email = document.getElementById("email").value.trim();
            let address = document.getElementById("address").value.trim();
            let specialties = document.getElementById("specialties").value.trim();
            let aadhaar = document.getElementById("aadhaar").value;

            // Name validation (Only alphabets and spaces allowed)
            if (!/^[a-zA-Z\s]+$/.test(name)) {
                alert("Name can only contain letters and spaces.");
                event.preventDefault();
                return;
            }

            // Contact validation (Only numbers, 10 digits required)
            if (!/^\d{10}$/.test(contact)) {
                alert("Contact must be exactly 10 digits.");
                event.preventDefault();
                return;
            }

            // Email validation (standard email format)
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert("Enter a valid email address.");
                event.preventDefault();
                return;
            }

            // Address validation (cannot be empty)
            if (address.length < 5) {
                alert("Address must be at least 5 characters long.");
                event.preventDefault();
                return;
            }

            // Specialties validation (cannot be empty)
            if (specialties.length < 3) {
                alert("Specialties must be at least 3 characters long.");
                event.preventDefault();
                return;
            }

            // Aadhaar validation (must select)
            if (aadhaar === "") {
                alert("Please select Aadhaar card option.");
                event.preventDefault();
                return;
            }
        });
    </script>
</body>
</html>
