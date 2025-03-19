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
        /* Your existing styles remain unchanged */
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

        .text-center {
            text-align: start !important;
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

        .form-check-input {
            margin-right: 5px;
        }

        #specialtiesDropdown {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo-container">
        <img src="assets/images/Astrologer/Rectangle 5201.png" alt="Jyotisika Logo">
        </div>
        <h4 class="text-center">Apply for Pujari Role</h4>
        <hr>
        <form id="pujariForm">
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
                    <select class="form-control" id="languages" required>
                        <option value="">Select languages</option>
                        <option value="Hindi">Hindi</option>
                        <option value="Sanskrit">Sanskrit</option>
                        <option value="English">English</option>
                    </select>
                    <div class="error" id="languagesError"></div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Specialties</label>
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle form-control" type="button" id="specialtiesDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Select Specialties
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="specialtiesDropdown">
                            <li><label class="dropdown-item"><input type="checkbox" name="specialties" value="Vedic Astrology"> Vedic Astrology</label></li>
                            <li><label class="dropdown-item"><input type="checkbox" name="specialties" value="Numerology"> Numerology</label></li>
                            <li><label class="dropdown-item"><input type="checkbox" name="specialties" value="Palmistry"> Palmistry</label></li>
                            <li><label class="dropdown-item"><input type="checkbox" name="specialties" value="Tarot Reading"> Tarot Reading</label></li>
                            <li><label class="dropdown-item"><input type="checkbox" name="specialties" value="Vastu Shastra"> Vastu Shastra</label></li>
                        </ul>
                        <input type="hidden" id="specialtiesHidden" name="specialtiesHidden" required>
                    </div>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById("contact").addEventListener("input", function(event) {
            this.value = this.value.replace(/\D/g, '');
        });
    </script>
    <script>
        // Form validation and submission
        document.getElementById("pujariForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent actual form submission

            // Reset all error messages
            document.querySelectorAll('.error').forEach(error => error.style.display = 'none');

            let isValid = true;

            // Name validation
            const name = document.getElementById("name").value.trim();
            if (!name) {
                document.getElementById("nameError").textContent = "Name is required.";
                document.getElementById("nameError").style.display = "block";
                isValid = false;
            } else if (!/^[a-zA-Z\s]+$/.test(name)) {
                document.getElementById("nameError").textContent = "Only letters and spaces are allowed.";
                document.getElementById("nameError").style.display = "block";
                isValid = false;
            } else if (name.length < 2) {
                document.getElementById("nameError").textContent = "Name must be at least 2 characters long.";
                document.getElementById("nameError").style.display = "block";
                isValid = false;
            }

            // Contact validation
            const contact = document.getElementById("contact").value.trim();
            if (!contact) {
                document.getElementById("contactError").textContent = "Contact number is required.";
                document.getElementById("contactError").style.display = "block";
                isValid = false;
            } else if (!/^\d{10}$/.test(contact)) {
                document.getElementById("contactError").textContent = "Must be a 10-digit number.";
                document.getElementById("contactError").style.display = "block";
                isValid = false;
            }

            // Email validation
            const email = document.getElementById("email").value.trim();
            if (!email) {
                document.getElementById("emailError").textContent = "Email is required.";
                document.getElementById("emailError").style.display = "block";
                isValid = false;
            } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                document.getElementById("emailError").textContent = "Please enter a valid email address.";
                document.getElementById("emailError").style.display = "block";
                isValid = false;
            }

            // Gender validation
            const gender = document.getElementById("gender").value;
            if (!gender) {
                document.getElementById("genderError").textContent = "Please select a gender.";
                document.getElementById("genderError").style.display = "block";
                isValid = false;
            }

            // Address validation
            const address = document.getElementById("address").value.trim();
            if (!address) {
                document.getElementById("addressError").textContent = "Address is required.";
                document.getElementById("addressError").style.display = "block";
                isValid = false;
            } else if (address.length < 5) {
                document.getElementById("addressError").textContent = "Address must be at least 5 characters long.";
                document.getElementById("addressError").style.display = "block";
                isValid = false;
            }

            // Languages validation
            const languages = document.getElementById("languages").value;
            if (!languages) {
                document.getElementById("languagesError").textContent = "Please select a language.";
                document.getElementById("languagesError").style.display = "block";
                isValid = false;
            }

            // Specialties validation
            const specialtiesCheckboxes = document.querySelectorAll('input[name="specialties"]:checked');
            const specialties = Array.from(specialtiesCheckboxes).map(cb => cb.value);
            if (specialties.length === 0) {
                document.getElementById("specialtiesError").textContent = "Please select at least one specialty.";
                document.getElementById("specialtiesError").style.display = "block";
                isValid = false;
            } else {
                // Store specialties as JSON key-value pair
                const specialtiesObj = {};
                specialties.forEach((specialty, index) => {
                    specialtiesObj[`specialty${index + 1}`] = specialty;
                });
                document.getElementById("specialtiesHidden").value = JSON.stringify(specialtiesObj);
            }

            // Aadhaar Card validation
            const aadhaarCard = document.getElementById("aadhaarCard").files[0];
            if (!aadhaarCard) {
                document.getElementById("aadhaarCardError").textContent = "Aadhaar card is required.";
                document.getElementById("aadhaarCardError").style.display = "block";
                isValid = false;
            } else {
                const validTypes = ['application/pdf', 'image/jpeg', 'image/png'];
                if (!validTypes.includes(aadhaarCard.type)) {
                    document.getElementById("aadhaarCardError").textContent = "Only PDF, JPG, or PNG files are allowed.";
                    document.getElementById("aadhaarCardError").style.display = "block";
                    isValid = false;
                } else if (aadhaarCard.size > 5 * 1024 * 1024) { // 5MB limit
                    document.getElementById("aadhaarCardError").textContent = "File size must be less than 5MB.";
                    document.getElementById("aadhaarCardError").style.display = "block";
                    isValid = false;
                }
            }

            // Experience validation
            const experience = document.getElementById("experience").value;
            if (experience === "") {
                document.getElementById("experienceError").textContent = "Experience is required.";
                document.getElementById("experienceError").style.display = "block";
                isValid = false;
            } else if (experience < 0 || experience > 50) {
                document.getElementById("experienceError").textContent = "Experience must be between 0 and 50 years.";
                document.getElementById("experienceError").style.display = "block";
                isValid = false;
            }

            // Certificates validation (optional)
            const certificates = document.getElementById("certificates").files;
            if (certificates.length > 0) {
                const validTypes = ['application/pdf', 'image/jpeg', 'image/png'];
                for (let file of certificates) {
                    if (!validTypes.includes(file.type)) {
                        document.getElementById("certificatesError").textContent = "Only PDF, JPG, or PNG files are allowed.";
                        document.getElementById("certificatesError").style.display = "block";
                        isValid = false;
                        break;
                    }
                    if (file.size > 5 * 1024 * 1024) { // 5MB limit per file
                        document.getElementById("certificatesError").textContent = "Each file must be less than 5MB.";
                        document.getElementById("certificatesError").style.display = "block";
                        isValid = false;
                        break;
                    }
                }
            }

            // If all validations pass, proceed with form submission
            if (isValid) {
                const contact = document.getElementById("contact").value;
                window.location.href = "<?php echo base_url('AstrologerMobileNumberAndOTPForm'); ?>?contact=" + encodeURIComponent(contact);
            }
        });

        // Specialties dropdown handling
        const checkboxes = document.querySelectorAll('input[name="specialties"]');
        const dropdownButton = document.getElementById('specialtiesDropdown');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const selected = Array.from(checkboxes)
                    .filter(cb => cb.checked)
                    .map(cb => cb.value);
                dropdownButton.textContent = selected.length > 0 ? selected.join(', ') : 'Select Specialties';
            });
        });
    </script>
    <script>
        let selectedFiles = []; // Store selected files

        document.getElementById("certificates").addEventListener("change", function(event) {
            let newFiles = Array.from(event.target.files);
            selectedFiles = [...selectedFiles, ...newFiles];
            displayFiles();
        });

        function displayFiles() {
            const fileList = document.getElementById("fileList");
            fileList.innerHTML = "";
            const row = document.createElement("div");
            row.classList.add("row", "gx-2");

            selectedFiles.forEach((file, index) => {
                const fileItem = document.createElement("div");
                fileItem.classList.add("col-4", "p-1");
                fileItem.innerHTML = `
                    <div class="file-item d-flex justify-content-between align-items-center">
                        <span class="text-truncate">${file.name}</span>
                        <button type="button" class="text-danger remove-file" data-index="${index}" title="Remove">❌</button>
                    </div>
                `;
                row.appendChild(fileItem);
            });

            fileList.appendChild(row);
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
    </script>
</body>

</html>