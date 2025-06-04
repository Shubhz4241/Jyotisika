<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Pujari Role</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', serif;
            background-image: url('<?php echo base_url("assets/images/Pujari/OTPVarificationForm.png"); ?>');
            background-position: center bottom;
            background-size: 100% auto;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            margin-bottom: 50px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-custom {
            background-color: #ff8000;
            color: white;
            width: 200px;
            display: block;
            margin: 0 auto;
        }

        .btn-custom:hover {
            background-color: #e06c00;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-container img {
            width: 180px;
        }

        .error {
            color: red;
            font-size: 12px;
            display: none;
        }

        hr {
            border: 0;
            height: 6px;
            background-color: #ddd;
            margin-bottom: 20px;
            color: #99AFCD;
            width: 90px;
            border-radius: 14px;
        }

        #fileList {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .file-item {
            background: #f8f9fa;
            border-radius: 5px;
            padding: 6px;
            font-size: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 100%;
            border: 1px solid #ddd;
        }

        .remove-file {
            background: none;
            border: none;
            font-size: 14px;
            cursor: pointer;
        }

        .dropdown-menu {
            min-width: 100%;
        }

        .dropdown-item {
            padding: 5px 10px;
        }

        #specialtiesDropdown {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            text-align: left;
        }

        /* Styles for Mobile, OTP, and Success Forms */
        #mobile-form,
        #otp-form,
        #success-message {
            display: none;
        }

        #success-message {
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
    </style>
</head>

<body>
    <div class="container">
        <div class="logo-container">
            <img src="assets/images/Pujari/logo.png" alt="Jyotisika Logo">
        </div>
        <h4 class="text-center">Apply for Astrologer Role</h4>
        <hr>

        <!-- Registration Form -->
        <form id="pujariForm" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="name" required placeholder="Enter your name" pattern="^[a-zA-Z\s]+$" title="Only letters and spaces are allowed.">
                    <div class="error" id="nameError"></div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Contact</label>
                    <input type="text" class="form-control" id="contact" maxlength="10" required placeholder="Enter your contact number" pattern="\d{10}" title="Must be a 10-digit number.">
                    <div class="error" id="contactError"></div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="email" required placeholder="Enter your email">
                    <div class="error" id="emailError"></div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Gender</label>
                    <select class="form-control" id="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <div class="error" id="genderError"></div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" id="address" required minlength="5" placeholder="Enter your Address">
                    <div class="error" id="addressError"></div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Languages Known</label>
                    <div class="form-group">
                        <div class="form-control" id="languages">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="languages[]" value="Hindi" id="hindi">
                                <label class="form-check-label" for="hindi">Hindi</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="languages[]" value="Sanskrit" id="sanskrit">
                                <label class="form-check-label" for="sanskrit">Sanskrit</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="languages[]" value="English" id="english">
                                <label class="form-check-label" for="english">English</label>
                            </div>
                        </div>
                    </div>
                    <div class="error" id="languagesError"></div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Specialties</label>
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle form-control" type="button" id="specialtiesDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Select Specialties
                        </button>
                        <ul class="dropdown-menu" id="specialtiesList" aria-labelledby="specialtiesDropdown"></ul>
                        <input type="hidden" id="specialtiesHidden" name="specialtiesHidden" required>
                    </div>

                    <script>
                        async function fetchSpecialties() {
                            try {
                                const response = await fetch('<?php echo base_url('astrologer/get_services'); ?>');
                                const data = await response.json();

                                const specialties = data?.services || [];
                                if (!specialties.length) throw new Error('Invalid data format');

                                const specialtiesList = document.getElementById('specialtiesList');
                                specialtiesList.innerHTML = '';

                                specialties.forEach(service => {
                                    const listItem = document.createElement('li');
                                    listItem.innerHTML = `
                                <label class="dropdown-item">
                                    <input type="checkbox" name="specialties" value="${service.name}"> 
                                    ${service.name}
                                </label>
                            `;
                                    specialtiesList.appendChild(listItem);
                                });

                                const button = document.getElementById('specialtiesDropdown');
                                document.querySelectorAll('input[name="specialties"]').forEach(checkbox => {
                                    checkbox.addEventListener('change', () => {
                                        const selectedValues = Array.from(document.querySelectorAll('input[name="specialties"]:checked'))
                                            .map(checkbox => checkbox.value);
                                        document.getElementById('specialtiesHidden').value = selectedValues.join(',');

                                        const selectedNames = Array.from(document.querySelectorAll('input[name="specialties"]:checked'))
                                            .map(checkbox => checkbox.parentElement.textContent.trim());
                                        button.textContent = selectedNames.length ?
                                            selectedNames.join(', ') :
                                            'Select Specialties';
                                    });
                                });
                            } catch (error) {
                                console.error('Error fetching specialties:', error);
                            }
                        }

                        document.addEventListener('DOMContentLoaded', fetchSpecialties);
                    </script>

                    <div class="error" id="specialtiesError"></div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Aadhaar Card</label>
                    <input type="file" class="form-control" id="aadhaarCard" accept=".pdf,.jpg,.png" required>
                    <div class="error" id="aadhaarCardError"></div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Experience (in years)</label>
                    <input type="number" class="form-control" id="experience" required min="0" max="50" placeholder="Enter experience in years">
                    <div class="error" id="experienceError"></div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Certificates (optional)</label>
                    <input type="file" class="form-control" id="certificates" accept=".pdf,.jpg,.png" multiple>
                    <div id="fileList" class="mt-2"></div>
                    <div class="error" id="certificatesError"></div>
                </div>
            </div>
            <button type="submit" class="btn btn-custom mt-3">Submit</button>
        </form>

        <!-- Mobile Number Form -->
        <div id="mobile-form">
            <form>
                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile No</label>
                    <input type="tel" class="form-control" id="mobile" placeholder="Enter Mobile Number" maxlength="10" required oninput="validateMobileNumber(this)">
                    <button type="button" id="getOtpBtn" class="btn btn-custom mt-3 w-100" style="display: none;">Get OTP</button>
                </div>
            </form>
        </div>

        <!-- OTP Form -->
        <div id="otp-form">
            <div id="otpSentMessage"></div>
            <p class="text-center" id="otpMessage"></p>
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
        <div id="success-message">
            <img src="<?php echo base_url() . 'assets/images/Pujari/ApplicationSubmited.gif' ?>" alt="Success">
            <p>Registration Completed Successfully!</p>
            <small>Thank you for your submission! Our team is reviewing your application.</small>
            <small>Note: You will receive an update within 48 hours. If you have any queries, feel free to contact our support team.</small>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Contact input restriction to numbers only
        document.getElementById("contact").addEventListener("input", function(event) {
            this.value = this.value.replace(/\D/g, '');
        });


        // Form validation and submission
        const pujariForm = document.getElementById("pujariForm");
        const mobileForm = document.getElementById("mobile-form");
        const otpForm = document.getElementById("otp-form");
        const successMessage = document.getElementById("success-message");

        pujariForm.addEventListener("submit", function(event) {
            event.preventDefault();
            document.querySelectorAll('.error').forEach(error => error.style.display = 'none');
            let isValid = true;

            const name = document.getElementById("name").value.trim();
            if (!name || !/^[a-zA-Z\s]+$/.test(name)) {
                document.getElementById("nameError").textContent = name ? "Only letters and spaces are allowed." : "Name is required.";
                document.getElementById("nameError").style.display = "block";
                isValid = false;
            }

            const contact = document.getElementById("contact").value.trim();
            if (!contact || !/^\d{10}$/.test(contact)) {
                document.getElementById("contactError").textContent = contact ? "Must be a 10-digit number." : "Contact number is required.";
                document.getElementById("contactError").style.display = "block";
                isValid = false;
            }

            const email = document.getElementById("email").value.trim();
            if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                document.getElementById("emailError").textContent = email ? "Please enter a valid email address." : "Email is required.";
                document.getElementById("emailError").style.display = "block";
                isValid = false;
            }

            const gender = document.getElementById("gender").value;
            if (!gender) {
                document.getElementById("genderError").textContent = "Please select a gender.";
                document.getElementById("genderError").style.display = "block";
                isValid = false;
            }

            const address = document.getElementById("address").value.trim();
            if (!address || address.length < 5) {
                document.getElementById("addressError").textContent = address ? "Address must be at least 5 characters long." : "Address is required.";
                document.getElementById("addressError").style.display = "block";
                isValid = false;
            }

            const languages = Array.from(document.querySelectorAll('input[name="languages[]"]:checked')).map(cb => cb.value);
            if (languages.length === 0) {
                document.getElementById("languagesError").textContent = "Please select at least one language.";
                document.getElementById("languagesError").style.display = "block";
                isValid = false;
            }

            const specialtiesCheckboxes = document.querySelectorAll('input[name="specialties"]:checked');
            const specialties = Array.from(specialtiesCheckboxes).map(cb => cb.value);
            if (specialties.length === 0) {
                document.getElementById("specialtiesError").textContent = "Please select at least one specialty.";
                document.getElementById("specialtiesError").style.display = "block";
                isValid = false;
            }

            const aadhaarCard = document.getElementById("aadhaarCard").files[0];
            if (!aadhaarCard) {
                document.getElementById("aadhaarCardError").textContent = "Aadhaar card is required.";
                document.getElementById("aadhaarCardError").style.display = "block";
                isValid = false;
            } else {
                const validTypes = ['application/pdf', 'image/jpeg', 'image/png'];
                if (!validTypes.includes(aadhaarCard.type) || aadhaarCard.size > 5 * 1024 * 1024) {
                    document.getElementById("aadhaarCardError").textContent = !validTypes.includes(aadhaarCard.type) ? "Only PDF, JPG, or PNG files are allowed." : "File size must be less than 5MB.";
                    document.getElementById("aadhaarCardError").style.display = "block";
                    isValid = false;
                }
            }

            const experience = document.getElementById("experience").value;
            if (experience === "" || experience < 0 || experience > 50) {
                document.getElementById("experienceError").textContent = experience === "" ? "Experience is required." : "Experience must be between 0 and 50 years.";
                document.getElementById("experienceError").style.display = "block";
                isValid = false;
            }

            const certificates = document.getElementById("certificates").files;
            if (certificates.length > 0) {
                const validTypes = ['application/pdf', 'image/jpeg', 'image/png'];
                for (let file of certificates) {
                    if (!validTypes.includes(file.type) || file.size > 5 * 1024 * 1024) {
                        document.getElementById("certificatesError").textContent = !validTypes.includes(file.type) ? "Only PDF, JPG, or PNG files are allowed." : "Each file must be less than 5MB.";
                        document.getElementById("certificatesError").style.display = "block";
                        isValid = false;
                        break;
                    }
                }
            }

            if (isValid) {
                const formData = new FormData();
                formData.append("name", name);
                formData.append("contact",contact);
                formData.append("email", email);
                languages.forEach(lang => formData.append("languages[]", lang));
                formData.append("gender", gender);
                formData.append("address", address);
                specialties.forEach(specialty => formData.append("specialties[]", specialty));
                if (aadhaarCard) formData.append("aadhaar_card", aadhaarCard);
                formData.append("experience", experience);
                Array.from(certificates).forEach((file, index) => formData.append(`certificates[${index}]`, file));


                fetch("<?php echo base_url('astrologer/register'); ?>", {
                        method: "POST",
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log("Success:", data);
                        if (data.status == 'success' && data.try == true) {
                            pujariForm.style.display = "none";
                            mobileForm.style.display = "none";
                            otpForm.style.display = "block";

                            let firstTwo = contact.substring(0, 2);
                            let lastTwo = contact.substring(8, 10);
                            otpMessage.innerHTML = `We have sent the code to +91 ${firstTwo}******${lastTwo}`;
                            document.getElementById('otpSentMessage').innerHTML = `An OTP has been sent to +91 ${firstTwo}******${lastTwo}. Please enter the OTP below to verify your phone.`;

                            startCountdown();
                        } else {
                            alert("Form submission failed: " + (data.message || "Unknown error"));
                        }
                    })

                    .catch(error => {
                        console.error("Error:", error);
                        alert("There was an error submitting the form.");
                    });
            }
        });

        // Certificates file handling
        let selectedFiles = [];
        document.getElementById("certificates").addEventListener("change", function(event) {
            let newFiles = Array.from(event.target.files);
            selectedFiles = [...selectedFiles, ...newFiles];
            displayFiles();
        });

        function displayFiles() {
            const fileList = document.getElementById("fileList");
            fileList.innerHTML = "";
            selectedFiles.forEach((file, index) => {
                const fileItem = document.createElement("div");
                fileItem.classList.add("file-item");
                fileItem.innerHTML = `
                    <span>${file.name}</span>
                    <button type="button" class="remove-file" data-index="${index}">❌</button>
                `;
                fileList.appendChild(fileItem);
            });
            attachRemoveEvents();
        }

        function attachRemoveEvents() {
            document.querySelectorAll(".remove-file").forEach(button => {
                button.addEventListener("click", function() {
                    removeFile(button.getAttribute("data-index"));
                });
            });
        }

        function removeFile(index) {
            selectedFiles.splice(index, 1);
            displayFiles();
        }

        // Mobile Number and OTP Handling
        const mobileInput = document.getElementById('mobile');
        const getOtpBtn = document.getElementById('getOtpBtn');
        const verifyOtpBtn = document.getElementById('verifyOtpBtn');
        const otpMessage = document.getElementById('otpMessage');
        const countdownElement = document.getElementById('countdown');
        const resendOtpBtn = document.getElementById('resendOtpBtn');
        const otpInputs = document.querySelectorAll('.otp-input');
        let countdown;

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
                if (input.value.length === 1) {
                    const nextInput = input.nextElementSibling;
                    if (nextInput && nextInput.classList.contains('otp-input')) nextInput.focus();
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
                let firstTwo = mobileInput.value.substring(0, 2);
                let lastTwo = mobileInput.value.substring(8, 10);
                otpMessage.innerHTML = `We have sent the code to +91 ${firstTwo}******${lastTwo}`;
                document.getElementById('otpSentMessage').innerHTML = `A OTP has been sent to +91 ${firstTwo}******${lastTwo}. Please enter the OTP below to verify your phone.`;
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
            if (!validateOtpForm()) return;
            otpForm.style.display = 'none';
            successMessage.style.display = 'block';
            setTimeout(() => {
                window.location.href = '<?php echo base_url("AstrologerAnalyticsAndEarning2"); ?>';
            }, 3000);
        });
    </script>
</body>

</html>