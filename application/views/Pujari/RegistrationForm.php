<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Pujari Role</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            padding: 0.375rem 0.75rem;
            background-color: #fff;
            text-align: left;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
        }

        form#pujariForm label {
            font-weight: 600;
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
    <div class="container">
        <div class="logo-container">
        <img src="assets/images/Pujari/logo.png" alt="Jyotisika Logo">
        </div>
        <h4 class="text-center">Apply for Pujari Role</h4>
        <hr>
       <form id="pujariForm">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="name" name="name" required placeholder="Enter your name" pattern="^[a-zA-Z\s]+$" title="Only letters and spaces are allowed.">
                    <div class="error" id="nameError"></div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Contact</label>
                    <input type="text" class="form-control" id="contact" name="contact" maxlength="10" required placeholder="Enter your contact number" pattern="\d{10}" title="Must be a 10-digit number.">
                    <div class="error" id="contactError"></div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email">
                    <div class="error" id="emailError"></div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Gender</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <div class="error" id="genderError"></div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" id="address" name="address" required minlength="5" placeholder="Enter your Address">
                    <div class="error" id="addressError"></div>
                </div>
                <div class="col-md-6 form-group" style="position: relative;">
                    <label class="form-label">Languages Known</label>
                    <input type="text" id="selectedLanguages" class="form-control mb-2" placeholder="Select languages" readonly onclick="toggleLanguageDropdown()">
                    <span class="caret" style="position: absolute; right: 25px; top: 50%; ">▾</span>
                    <div id="languageDropdown" class="d-flex flex-column border p-3 rounded" style="position: absolute; top: 100%; left: 0; width: 100%; background: #fff; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); max-height: 150px; overflow-y: auto; display: none; z-index: 1000; visibility: hidden;">
                        <label><input type="checkbox" class="language-option" value="Hindi" onclick="updateSelectedLanguages()"> Hindi</label>
                        <label><input type="checkbox" class="language-option" value="Sanskrit" onclick="updateSelectedLanguages()"> Sanskrit</label>
                        <label><input type="checkbox" class="language-option" value="English" onclick="updateSelectedLanguages()"> English</label>
                        <label><input type="checkbox" class="language-option" value="Marathi" onclick="updateSelectedLanguages()"> Marathi</label>
                    </div>
                    <div class="invalid-feedback">Please select at least one language.</div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Specialties</label>
                    <div class="dropdown">
                        <button class="btn form-control d-flex justify-content-between align-items-center" type="button" id="specialtiesDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <span>Select Specialties</span>
                            <span class="caret">▾</span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="specialtiesDropdown">
                            <!-- Specialties will be populated dynamically via JavaScript -->
                        </ul>
                        <input type="hidden" id="specialtiesHidden" name="specialties" required>
                    </div>
                    <div class="error" id="specialtiesError"></div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Aadhaar Card</label>
                    <input type="file" class="form-control" id="aadhaarCard" name="aadharcard" accept=".pdf,.jpg,.png" required>
                    <div class="error" id="aadhaarCardError"></div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Profile Image</label>
                    <input type="file" class="form-control" id="profileImage" name="profileImage" accept=".jpg,.png" required>
                    <div class="error" id="profileImageError"></div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Experience (in years)</label>
                    <input type="number" class="form-control" id="experience" name="experience" required min="0" max="50" placeholder="Enter experience in years">
                    <div class="error" id="experienceError"></div>
                </div>
                <div class="col-md-6 form-group">
                    <label>Certificates (optional)</label>
                    <input type="file" class="form-control" id="certificates" name="certificates[]" accept=".pdf,.jpg,.png" multiple>
                    <div id="fileList" class="mt-2"></div>
                    <div class="error" id="certificatesError"></div>
                </div>
                <label for="showTerms" class="text-primary fw-semibold" style="cursor: pointer;">
                    <input type="checkbox" class="d-none" id="showTerms" onchange="toggleTerms()">
                    <i class="bi bi-eye me-1"></i> See Terms and Conditions
                </label>
                <div id="terms" class="border rounded p-4 mt-3 bg-light shadow-sm" style="display: none; transition: all 0.3s ease;">
                    <h5 class="text-center text-dark mb-3"><i class="bi bi-file-earmark-text me-2"></i>Terms and Conditions</h5>
                    <ul class="list-unstyled ps-2">
                        <li class="mb-2">
                            <strong>1. Minimum Working Hours:</strong> You must work for at least <b>8 hours/day</b>.
                        </li>
                        <li class="mb-2">
                            <strong>2. Confidentiality:</strong> Sharing personal contact details is <span class="text-danger fw-bold">strictly prohibited</span>.
                            Violation incurs a <b>₹51,000 fine</b>.
                        </li>
                        <li class="mb-2">
                            <strong>3. Exclusivity:</strong> You are not allowed to work with other astrology platforms while registered here.
                        </li>
                    </ul>
                    <p class="text-danger text-center mt-4 mb-0 fw-bold">
                        <i class="bi bi-exclamation-triangle-fill me-1"></i>
                        By registering, you agree to these terms and conditions.
                    </p>
                </div>
            </div>
            <button type="submit" class="btn btn-custom mt-3">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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

        function toggleTerms() {
            const termsDiv = document.getElementById("terms");
            termsDiv.style.display = document.getElementById("showTerms").checked ? "block" : "none";
        }

        async function fetchPujariServices() {
            try {
                const response = await fetch('<?php echo base_url('PujariController/getPujariServices'); ?>', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }

                const data = await response.json();

                if (data.status === 'success') {
                    console.log('Services fetched successfully:', data.services);
                    populateDropdown(data.services);
                } else {
                    console.error('Error from API:', data.message);
                    document.getElementById('specialtiesError').textContent = data.message || 'Failed to load services.';
                }
            } catch (error) {
                console.error('Fetch error:', error.message);
                document.getElementById('specialtiesError').textContent = 'An error occurred while fetching services.';
            }
        }

        function populateDropdown(services) {
            const dropdownMenu = document.querySelector('.dropdown-menu');
            const dropdownButton = document.getElementById('specialtiesDropdown');
            dropdownMenu.innerHTML = '';

            services.forEach(service => {
                const li = document.createElement('li');
                const label = document.createElement('label');
                label.className = 'dropdown-item';

                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.name = 'specialties';
                checkbox.value = service.name;
                checkbox.dataset.serviceId = service.id;
                checkbox.dataset.price = service.price || 0;

                label.appendChild(checkbox);
                label.appendChild(document.createTextNode(` ${service.name}`));
                li.appendChild(label);
                dropdownMenu.appendChild(li);
            });

            const checkboxes = document.querySelectorAll('input[name="specialties"]');
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', () => {
                    const selected = Array.from(checkboxes)
                        .filter(cb => cb.checked)
                        .map(cb => ({
                            id: cb.dataset.serviceId,
                            name: cb.value,
                            price: parseFloat(cb.dataset.price)
                        }));
                    dropdownButton.textContent = selected.length > 0 ? selected.map(s => s.name).join(', ') : 'Select Specialties';
                    document.getElementById('specialtiesHidden').value = JSON.stringify(selected);
                });
            });
        }

        function toggleLanguageDropdown() {
            var dropdown = document.getElementById("languageDropdown");
            if (dropdown.style.visibility === "hidden") {
                dropdown.style.visibility = "visible";
                dropdown.style.display = "block";
            } else {
                dropdown.style.visibility = "hidden";
                dropdown.style.display = "none";
            }
        }

        document.addEventListener("click", function(event) {
            var dropdown = document.getElementById("languageDropdown");
            var input = document.getElementById("selectedLanguages");
            if (!input.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.style.visibility = "hidden";
                dropdown.style.display = "none";
            }
        });

        function updateSelectedLanguages() {
            var checkboxes = document.querySelectorAll(".language-option");
            var selectedLanguages = Array.from(checkboxes)
                .filter(cb => cb.checked)
                .map(cb => cb.value);

            document.getElementById("selectedLanguages").value = selectedLanguages.join(", ") || "Select languages";

            var hiddenLanguagesInput = document.getElementById("languagesHidden");
            if (!hiddenLanguagesInput) {
                hiddenLanguagesInput = document.createElement("input");
                hiddenLanguagesInput.type = "hidden";
                hiddenLanguagesInput.id = "languagesHidden";
                hiddenLanguagesInput.name = "languages";
                document.getElementById("pujariForm").appendChild(hiddenLanguagesInput);
            }
            hiddenLanguagesInput.value = JSON.stringify(selectedLanguages);
        }

        document.getElementById("contact").addEventListener("input", function(event) {
            this.value = this.value.replace(/\D/g, '');
        });

        document.getElementById("pujariForm").addEventListener("submit", async function(event) {
            event.preventDefault();

            const dropdownButton = document.getElementById('specialtiesDropdown');
            const selectedSpecialties = Array.from(document.querySelectorAll('input[name="specialties"]'))
                .filter(cb => cb.checked)
                .map(cb => ({
                    id: cb.dataset.serviceId,
                    name: cb.value,
                    price: parseFloat(cb.dataset.price) 
                }));
            document.getElementById('specialtiesHidden').value = JSON.stringify(selectedSpecialties);

            const languageCheckboxes = document.querySelectorAll(".language-option");
            const selectedLanguages = Array.from(languageCheckboxes)
                .filter(cb => cb.checked)
                .map(cb => cb.value);
            const hiddenLanguagesInput = document.getElementById("languagesHidden");
            hiddenLanguagesInput.value = JSON.stringify(selectedLanguages);

            const formData = new FormData(this);
            const loader = showLoader();

            try {
                let response = await fetch('<?php echo base_url('PujariController/registerPujari'); ?>', {
                    method: "POST",
                    body: formData
                });

                let result = await response.json();
                hideLoader(loader);

                if (result.status) {
                    Swal.fire({
                        title: "Application Submitted!",
                        html: `
                            <div style="text-align: center;">
                                <img src="<?php echo base_url() . 'assets/images/Pujari/ApplicationSubmited.gif'; ?>" alt="Logo" style="width: 100px; height: 100px;"><br>
                                <p>Thank you for your submission! Our team is reviewing your application.</p>
                                <small>Note: You will receive an update within 48 hours. If you have any queries, feel free to contact our support team.</small>
                            </div>
                        `,
                        icon: "success",
                        showConfirmButton: false,
                        timer: 4000
                    });

                    setTimeout(() => {
                        window.location.href = '<?php echo base_url('MobileNumberAndOTPForm'); ?>';
                    }, 4000);
                } else if (result.message === "Mobile number already registered") {
                    Swal.fire({
                        title: "Registration Failed!",
                        text: "This mobile number is already registered. Please use another number.",
                        icon: "warning",
                        confirmButtonText: "OK"
                    });
                } else if (result.message === "Email already registered") {
                    Swal.fire({
                        title: "Registration Failed!",
                        text: "This email is already registered. Please use another email address.",
                        icon: "warning",
                        confirmButtonText: "OK"
                    });
                } else {
                    Swal.fire({
                        title: "Error!",
                        text: result.message,
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                }
            } catch (error) {
                hideLoader(loader);
                console.error("Fetch error:", error);
                Swal.fire({
                    title: "Error!",
                    text: "Error submitting form. Please try again.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
            }
        });

        let selectedFiles = [];

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
            const certificatesInput = document.getElementById("certificates");
            const dataTransfer = new DataTransfer();
            selectedFiles.forEach(file => dataTransfer.items.add(file));
            certificatesInput.files = dataTransfer.files;
        }

        document.addEventListener('DOMContentLoaded', () => {
            fetchPujariServices();
        });
    </script>
</body>

</html>