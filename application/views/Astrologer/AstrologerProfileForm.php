<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astrologer Profile Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            background-color: #f8f8f8;
            min-height: 100vh;
            width: 100%;
            font-family: 'Montserrat', serif;
            margin: 0;
            padding: 0;
        }

        .profile-container {
            background: white;
            border-radius: 10px;
            padding: 30px 90px;
            max-width: 700px;
            width: 100%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            min-height: 80vh;
            display: flex;
            flex-direction: column;
            margin: 0 auto;
        }

        .profilei {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid gold;
            margin-bottom: 25px;
            margin: auto;
        }

        .tabs {
            display: flex;
            justify-content: center;
            background: #f8f0fa;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 22px;
        }

        .tab {
            padding: 10px 40px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
        }

        .tab.active {
            border-bottom: 3px solid purple;
        }

        .form-container {
            display: none;
            text-align: left;
            flex-grow: 1;
        }

        .form-container.active {
            display: block;
        }

        .form-label {
            font-weight: bold;
            font-size: 16px;
        }

        .form-control {
            margin-bottom: 20px;
            padding: 10px;
            font-size: 14px;
        }

        .save-btn {
            background: gold;
            border: none;
            padding: 10px;
            width: 60%;
            font-weight: bold;
            border-radius: 10px;
            display: block;
            margin: auto;
            font-size: 16px;
        }

        .dropdown-container {
            position: relative;
            width: 100%;
        }

        .input-box {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            /* margin-bottom: 22px; */
            font-size: 14px;
        }

        .dropdown-content {
            display: none;
            background: #fff;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            position: absolute;
            width: 100%;
            z-index: 1000;
        }

        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .form-check-input {
            width: 18px;
            height: 18px;
            margin-right: 10px;
        }

        /* Time Picker Styling */
        .bootstrap-timepicker-widget {
            z-index: 1050 !important;
        }

        /* Custom Styling for SweetAlert */
        .swal2-popup {
            width: 320px;
            border-radius: 12px;
            font-family: 'Montserrat', sans-serif;
        }

        .swal2-title {
            font-size: 18px;
            font-weight: bold;
        }

        .swal2-html-container {
            font-size: 16px;
            color: #000;
        }

        .swal2-confirm {
            background-color: #5D40AE !important;
            color: white !important;
            padding: 10px 24px;
            font-size: 14px;
            border-radius: 8px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .profile-container {
                padding: 20px 30px;
                min-height: 90vh;
                max-width: 90vw;
            }

            .tabs {
                flex-direction: column;
                align-items: center;
                padding: 5px;
            }

            .tab {
                width: 100%;
                text-align: center;
                padding: 8px 20px;
                font-size: 14px;
            }

            .form-label {
                font-size: 14px;
            }

            .form-control {
                font-size: 13px;
                padding: 8px;
            }

            .save-btn {
                width: 80%;
                font-size: 14px;
                padding: 8px;
            }

            .profilei {
                width: 100px;
                height: 100px;
            }

            .input-box {
                font-size: 13px;
                padding: 8px;
            }

            .dropdown-content {
                font-size: 13px;
            }

            .swal2-popup {
                width: 90vw;
                max-width: 300px;
            }

            .swal2-title {
                font-size: 16px;
            }

            .swal2-html-container {
                font-size: 14px;
            }

            .swal2-confirm {
                font-size: 13px;
                padding: 8px 20px;
            }
        }

        @media (max-width: 480px) {
            .profile-container {
                padding: 15px 20px;
                max-width: 95vw;
            }

            .tab {
                font-size: 12px;
                padding: 6px 15px;
            }

            .form-label {
                font-size: 12px;
            }

            .form-control {
                font-size: 12px;
                padding: 6px;
            }

            .save-btn {
                width: 90%;
                font-size: 12px;
                padding: 6px;
            }

            .profilei {
                width: 80px;
                height: 80px;
            }

            .input-box {
                font-size: 12px;
                padding: 6px;
            }

            .dropdown-content {
                font-size: 12px;
            }

            .swal2-popup {
                width: 95vw;
                max-width: 280px;
            }

            .swal2-title {
                font-size: 14px;
            }

            .swal2-html-container {
                font-size: 12px;
            }

            .swal2-confirm {
                font-size: 12px;
                padding: 6px 16px;
            }
        }
        .mb-3 {
    margin-bottom: 1rem !important;
    margin-top: 16px;
}
    </style>
</head>

<body>
    <header>
        <?php $this->load->view('Astrologer/Include/AstrologerNav') ?>
    </header>
    <div style="min-height: 100vh;" class="py-3">
        <div style="width: 100%; display: flex; justify-content: center;">
            <div class="profile-container">
                <img src="<?php echo base_url() . 'assets/images/Pujari/Rectangle 5160 (1).png' ?>" class="profilei" alt="Profile" alt="<?php echo base_url() . 'assets/images/Pujari/logo.png' ?>">
                <div class="tabs">
                    <div class="tab active" data-target="#personal">Personal</div>
                    <div class="tab" data-target="#professional">Professional</div>
                    <div class="tab" data-target="#advanced">Advanced</div>
                </div>

                <form id="personal" class="form-container active">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" id="nameInput" placeholder="Enter your Name" required>
                        <div class="invalid-feedback">Please enter a valid name (letters and spaces only, 2-50 characters).</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contact</label>
                        <input type="number" class="form-control" id="contactInput" placeholder="Enter your Contact Number" required oninput="this.value = this.value.slice(0, 10); if (this.value < 0) this.value = '';">
                        <div class="invalid-feedback">Please enter a valid 10-digit contact number (no negative values).</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" id="emailInput" placeholder="Enter your gmail" required>
                        <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <select class="form-control" id="genderInput" required>
                            <option value="" disabled selected>Select your gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        <div class="invalid-feedback">Please select your gender.</div>
                    </div>
                    <div class="mb-3" style="position: relative;">
                        <label class="form-label">Languages</label>
                        <input type="text" class="form-control" id="languageInput" value="Hindi" placeholder="Select a language" required readonly>
                        <div id="languageDropdown" style="position: absolute; top: 100%; left: 0; width: 100%; background: #fff; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); max-height: 150px; overflow-y: auto; display: none; z-index: 1000;">
                            <div class="language-option" style="padding: 8px; cursor: pointer;" data-value="Hindi">Hindi</div>
                            <div class="language-option" style="padding: 8px; cursor: pointer;" data-value="English">English</div>
                            <div class="language-option" style="padding: 8px; cursor: pointer;" data-value="Marathi">Marathi</div>
                        </div>
                        <div class="invalid-feedback">Please select a language.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Experience</label>
                        <input type="text" class="form-control" id="experienceInput" value="23 yrs" placeholder="e.g., 23 yrs" required>
                        <div class="invalid-feedback">Please enter a valid experience (e.g., '23 yrs', between 0 and 100 years).</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Place of Birth</label>
                        <input type="text" class="form-control" id="placeOfBirth" placeholder="Enter your Place of Birth" required>
                        <div class="invalid-feedback">Please enter your place of birth (letters and spaces only).</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Current Address</label>
                        <input type="text" class="form-control" id="currentAddress" placeholder="Enter your current address" required>
                        <div class="invalid-feedback">Please enter your current address.</div>
                    </div>
                    <button type="submit" class="save-btn">Save Changes</button>
                </form>

                <form id="professional" class="form-container">
                    <div class="mb-3" style="position: relative;">
                        <label class="form-label">Astrology Services</label>
                        <input type="text" class="form-control" id="serviceInput" value="Vastu, Vedic" placeholder="Select astrology services" required readonly>
                        <div id="serviceDropdown" style="position: absolute; top: 100%; left: 0; width: 100%; background: #fff; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); max-height: 150px; overflow-y: auto; display: none; z-index: 1000;">
                            <div class="service-option" style="padding: 8px; cursor: pointer;" data-value="Vastu">Vastu</div>
                            <div class="service-option" style="padding: 8px; cursor: pointer;" data-value="Vedic">Vedic</div>
                        </div>
                        <div class="invalid-feedback">Please select at least one astrology service.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rs Per Minute</label>
                        <input type="text" class="form-control" id="rsPerMinuteInput" value="50 Rs" placeholder="e.g., 50 Rs" required>
                        <div class="invalid-feedback">Please enter a valid rate (e.g., '50 Rs', no negative values).</div>
                    </div>
                    <button type="submit" class="save-btn">Save Changes</button>
                </form>

                <form id="advanced" class="form-container p-3">
                    <div class="container p-0 m-0">
                        <label for="astrologyInput"><strong>Astrology Services</strong></label>
                        <div class="dropdown-container">
                            <div class="input-box" id="toggleDropdown">
                                <span id="astrologyServiceText">Select Astrology Service</span>
                                <span>▼</span>
                            </div>
                            <div class="dropdown-content" id="radioOptions">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="service" id="vastu">
                                    <label class="form-check-label" for="vastu">Vastu Consultation</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="service" id="palmistry">
                                    <label class="form-check-label" for="palmistry">Palmistry</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="service" id="vedic">
                                    <label class="form-check-label" for="vedic">Vedic Astrology</label>
                                </div>
                            </div>
                            <div class="invalid-feedback" id="astrologyServiceError">Please select an astrology service.</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Availability Day</label>
                        <div class="dropdown-container">
                            <div class="input-box" id="toggleAvailabilityDropdown">
                                <span id="availabilityDayText">Select Availability Days</span>
                                <span>▼</span>
                            </div>
                            <div class="dropdown-content" id="availabilityCheckboxes" style="max-height: 290px;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Monday" id="monday">
                                    <label class="form-check-label" for="monday">Monday</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Tuesday" id="tuesday">
                                    <label class="form-check-label" for="tuesday">Tuesday</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Wednesday" id="wednesday">
                                    <label class="form-check-label" for="wednesday">Wednesday</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Thursday" id="thursday">
                                    <label class="form-check-label" for="thursday">Thursday</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Friday" id="friday">
                                    <label class="form-check-label" for="friday">Friday</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Saturday" id="saturday">
                                    <label class="form-check-label" for="saturday">Saturday</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Sunday" id="sunday">
                                    <label class="form-check-label" for="sunday">Sunday</label>
                                </div>
                            </div>
                            <div class="invalid-feedback">Please select at least one availability day.</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Availability Time</label>
                        <div class="d-flex flex-column flex-md-row gap-2">
                            <div class="w-100">
                                <input type="text" class="form-control timepicker" id="startTime" value="9:30 AM" required readonly>
                                <div class="invalid-feedback">Please select a valid start time.</div>
                            </div>
                            <div class="w-100">
                                <input type="text" class="form-control timepicker" id="endTime" value="6:00 PM" required readonly>
                                <div class="invalid-feedback">Please select a valid end time.</div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="save-btn" id="submitAdvanced">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <?php $this->load->view('Astrologer/Include/AstrologerFooter') ?>
    </footer>

    <script>
        $(document).ready(function() {
            $('.tab').click(function() {
                $('.tab').removeClass('active');
                $(this).addClass('active');
                $('.form-container').removeClass('active');
                $($(this).data('target')).addClass('active');
            });
            // $('form').submit(function(e) {
            //     e.preventDefault();
            //     alert('Details saved successfully!');
            // });

            // Initialize time picker for Availability Time
            $('.timepicker').timepicker({
                showMeridian: true,
                defaultTime: false,
                showInputs: false,
                minuteStep: 15
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#toggleDropdown").click(function() {
                $("#radioOptions").slideToggle();
            });

            // Update the displayed text when a radio button is selected
            $("#radioOptions input[type='radio']").on("change", function() {
                const selectedService = $(this).siblings("label").text();
                $("#astrologyServiceText").text(selectedService);
                $("#astrologyServiceError").hide(); // Hide error when a service is selected
            });

            // Toggle Availability Day dropdown
            $("#toggleAvailabilityDropdown").click(function() {
                $("#availabilityCheckboxes").slideToggle();
            });

            // Update the displayed text when a checkbox is selected/unselected
            $("#availabilityCheckboxes input[type='checkbox']").on("change", function() {
                const selectedDays = Array.from(document.querySelectorAll('#availabilityCheckboxes .form-check-input:checked'))
                    .map(checkbox => checkbox.value);
                const displayText = selectedDays.length > 0 ? selectedDays.join(", ") : "Select Availability Days";
                $("#availabilityDayText").text(displayText);
                // Hide error when at least one day is selected
                if (selectedDays.length > 0) {
                    $("#availabilityCheckboxes").siblings(".invalid-feedback").hide();
                }
            });

            // Hide dropdown when clicking outside
            $(document).on("click", function(event) {
                if (!$("#toggleAvailabilityDropdown").is(event.target) && !$("#toggleAvailabilityDropdown").has(event.target).length &&
                    !$("#availabilityCheckboxes").is(event.target) && !$("#availabilityCheckboxes").has(event.target).length) {
                    $("#availabilityCheckboxes").slideUp();
                }
            });
        });
    </script>

    <script>
       document.getElementById('advanced').addEventListener('submit', async (e) => {
    e.preventDefault();

    const selectedService = document.querySelector('input[name="service"]:checked')?.value || null;
    const selectedDays = Array.from(document.querySelectorAll('#availabilityCheckboxes .form-check-input:checked'))
        .map(checkbox => checkbox.value);
    const startTime = document.getElementById('startTime').value;
    const endTime = document.getElementById('endTime').value;

    if (!selectedService || selectedDays.length === 0) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Please select a service and at least one availability day.'
        });
        return;
    }

    const requestData = {
        service_ids: [selectedService],
        availability_days: selectedDays,
        start_time: startTime,
        end_time: endTime
    };

    try {
        const response = await fetch('<?php echo base_url() . 'astrologer/add_service'?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(requestData)
        });

        const result = await response.json();

        Swal.fire({
            icon: result.status === 'success' ? 'success' : 'info',
            title: result.status.charAt(0).toUpperCase() + result.status.slice(1),
            text: result.message
        });
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Something went wrong. Please try again.'
        });
    }
});





    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Personal Form Validation
            const formPersonal = document.getElementById("personal");
            const nameInput = document.getElementById("nameInput");
            const contactInput = document.getElementById("contactInput");
            const emailInput = document.getElementById("emailInput");
            const genderInput = document.getElementById("genderInput");
            const languageInput = document.getElementById("languageInput");
            const languageDropdown = document.getElementById("languageDropdown");
            const languageOptions = document.querySelectorAll("#languageDropdown .language-option");
            const experienceInput = document.getElementById("experienceInput");
            const placeOfBirthInput = document.getElementById("placeOfBirth");
            const currentAddressInput = document.getElementById("currentAddress");

            // Track the selected language (single selection) for Personal form
            let selectedLanguage = languageInput.value || "";

            // Show dropdown when language input is clicked (Personal form)
            languageInput.addEventListener("click", function() {
                languageDropdown.style.display = "block";
            });

            // Handle language selection (single selection) for Personal form
            languageOptions.forEach(option => {
                option.addEventListener("click", function() {
                    const value = this.getAttribute("data-value");
                    selectedLanguage = value;
                    languageInput.value = selectedLanguage;
                    languageOptions.forEach(opt => {
                        if (opt.getAttribute("data-value") === selectedLanguage) {
                            opt.style.backgroundColor = "#e9ecef";
                        } else {
                            opt.style.backgroundColor = "#fff";
                        }
                    });
                    languageDropdown.style.display = "none";
                });

                if (option.getAttribute("data-value") === selectedLanguage) {
                    option.style.backgroundColor = "#e9ecef";
                }
            });

            // Hide dropdown when clicking outside (Personal form)
            document.addEventListener("click", function(event) {
                if (!languageInput.contains(event.target) && !languageDropdown.contains(event.target)) {
                    languageDropdown.style.display = "none";
                }
            });

            // Personal form submission validation
            formPersonal.addEventListener("submit", function(event) {
                let isValid = true;

                // Validate Name (letters and spaces only, 2-50 characters)
                const nameRegex = /^[A-Za-z\s]{2,50}$/;
                if (!nameRegex.test(nameInput.value.trim())) {
                    nameInput.classList.add("is-invalid");
                    isValid = false;
                } else {
                    nameInput.classList.remove("is-invalid");
                }

                // Validate Contact (10 digits, no negative values)
                const contactRegex = /^\d{10}$/;
                if (!contactRegex.test(contactInput.value) || contactInput.value < 0) {
                    contactInput.classList.add("is-invalid");
                    isValid = false;
                } else {
                    contactInput.classList.remove("is-invalid");
                }

                // Validate Email
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(emailInput.value)) {
                    emailInput.classList.add("is-invalid");
                    isValid = false;
                } else {
                    emailInput.classList.remove("is-invalid");
                }

                // Validate Gender
                if (!genderInput.value) {
                    genderInput.classList.add("is-invalid");
                    isValid = false;
                } else {
                    genderInput.classList.remove("is-invalid");
                }

                // Validate Language
                if (!selectedLanguage) {
                    languageInput.classList.add("is-invalid");
                    isValid = false;
                } else {
                    languageInput.classList.remove("is-invalid");
                }

                // Validate Experience (e.g., "23 yrs", between 0 and 100 years)
                const experienceRegex = /^\d+\s*yrs$/;
                const experienceValue = experienceInput.value.trim();
                const experienceNumber = parseInt(experienceValue);
                if (!experienceRegex.test(experienceValue) || experienceNumber < 0 || experienceNumber > 100 || isNaN(experienceNumber)) {
                    experienceInput.classList.add("is-invalid");
                    isValid = false;
                } else {
                    experienceInput.classList.remove("is-invalid");
                }

                // Validate Place of Birth (letters and spaces only)
                const placeRegex = /^[A-Za-z\s]{2,100}$/;
                if (!placeRegex.test(placeOfBirthInput.value.trim())) {
                    placeOfBirthInput.classList.add("is-invalid");
                    isValid = false;
                } else {
                    placeOfBirthInput.classList.remove("is-invalid");
                }

                // Validate Current Address (non-empty, allow letters, numbers, and basic punctuation)
                const addressRegex = /^[\w\s,.-]{5,200}$/;
                if (!addressRegex.test(currentAddressInput.value.trim())) {
                    currentAddressInput.classList.add("is-invalid");
                    isValid = false;
                } else {
                    currentAddressInput.classList.remove("is-invalid");
                }

                if (!isValid) {
                    event.preventDefault();
                }
            });

            // Real-time validation for Experience field (Personal form)
            experienceInput.addEventListener("input", function() {
                const value = this.value.trim();
                const numberPart = parseInt(value);
                if (value && (isNaN(numberPart) || numberPart < 0 || numberPart > 100)) {
                    this.value = "";
                }
            });

            // Real-time validation for Contact field (Personal form)
            contactInput.addEventListener("input", function() {
                if (this.value < 0) {
                    this.value = "";
                }
            });

            // Professional Form Validation
            const formProfessional = document.getElementById("professional");
            const serviceInput = document.getElementById("serviceInput");
            const serviceDropdown = document.getElementById("serviceDropdown");
            const serviceOptions = document.querySelectorAll("#serviceDropdown .service-option");
            const rsPerMinuteInput = document.getElementById("rsPerMinuteInput");

            // Track selected services (multiple selection)
            let selectedServices = serviceInput.value.split(", ").filter(service => service.trim() !== "");

            // Show service dropdown when input is clicked
            serviceInput.addEventListener("click", function() {
                serviceDropdown.style.display = "block";
            });

            // Handle service selection (multiple selection)
            serviceOptions.forEach(option => {
                option.addEventListener("click", function() {
                    const value = this.getAttribute("data-value");

                    // Toggle selection
                    if (selectedServices.includes(value)) {
                        selectedServices = selectedServices.filter(service => service !== value);
                    } else {
                        selectedServices.push(value);
                    }

                    // Update input field with selected services
                    serviceInput.value = selectedServices.join(", ");
                    if (selectedServices.length === 0) {
                        serviceInput.value = "";
                    }

                    // Update visual feedback (highlight selected options)
                    serviceOptions.forEach(opt => {
                        if (selectedServices.includes(opt.getAttribute("data-value"))) {
                            opt.style.backgroundColor = "#e9ecef";
                        } else {
                            opt.style.backgroundColor = "#fff";
                        }
                    });
                });

                // Initial visual feedback for pre-selected services
                if (selectedServices.includes(option.getAttribute("data-value"))) {
                    option.style.backgroundColor = "#e9ecef";
                }
            });

            // Hide dropdown when clicking outside (Professional form)
            document.addEventListener("click", function(event) {
                if (!serviceInput.contains(event.target) && !serviceDropdown.contains(event.target)) {
                    serviceDropdown.style.display = "none";
                }
            });

            // Professional form submission validation
            formProfessional.addEventListener("submit", function(event) {
                let isValid = true;

                // Validate Astrology Services
                if (selectedServices.length === 0) {
                    serviceInput.classList.add("is-invalid");
                    isValid = false;
                } else {
                    serviceInput.classList.remove("is-invalid");
                }

                // Validate Rs Per Minute (e.g., "50 Rs", no negative values)
                const rsPerMinuteRegex = /^\d+\s*Rs$/;
                const rsPerMinuteValue = rsPerMinuteInput.value.trim();
                const rsPerMinuteNumber = parseInt(rsPerMinuteValue);
                if (!rsPerMinuteRegex.test(rsPerMinuteValue) || rsPerMinuteNumber < 0 || isNaN(rsPerMinuteNumber)) {
                    rsPerMinuteInput.classList.add("is-invalid");
                    isValid = false;
                } else {
                    rsPerMinuteInput.classList.remove("is-invalid");
                }

                // Prevent form submission if any field is invalid
                if (!isValid) {
                    event.preventDefault();
                }
            });

            // Real-time validation for Rs Per Minute field to prevent negative values
            rsPerMinuteInput.addEventListener("input", function() {
                const value = this.value.trim();
                const numberPart = parseInt(value);
                if (value && (isNaN(numberPart) || numberPart < 0)) {
                    this.value = "";
                }
            });

            // Advanced Form Validation
            const formAdvanced = document.getElementById("advanced");
            const astrologyServiceInputs = document.querySelectorAll("#radioOptions input[type='radio']");
            const availabilityDayInput = document.getElementById("availabilityDay");
            const startTimeInput = document.getElementById("startTime");
            const endTimeInput = document.getElementById("endTime");

            formAdvanced.addEventListener("submit", function(event) {
                let isValid = true;

                // Validate Astrology Service (at least one must be selected)
                const isServiceSelected = Array.from(astrologyServiceInputs).some(input => input.checked);
                if (!isServiceSelected) {
                    document.getElementById("astrologyServiceError").style.display = "block";
                    isValid = false;
                } else {
                    document.getElementById("astrologyServiceError").style.display = "none";
                }

                // Validate Availability Day
                if (!availabilityDayInput.value) {
                    availabilityDayInput.classList.add("is-invalid");
                    isValid = false;
                } else {
                    availabilityDayInput.classList.remove("is-invalid");
                }

                // Validate Start Time
                const timeRegex = /^(1[0-2]|[1-9]):[0-5][0-9]\s*(AM|PM)$/i;
                if (!timeRegex.test(startTimeInput.value.trim())) {
                    startTimeInput.classList.add("is-invalid");
                    isValid = false;
                } else {
                    startTimeInput.classList.remove("is-invalid");
                }

                // Validate End Time
                if (!timeRegex.test(endTimeInput.value.trim())) {
                    endTimeInput.classList.add("is-invalid");
                    isValid = false;
                } else {
                    endTimeInput.classList.remove("is-invalid");
                }

                if (!isValid) {
                    event.preventDefault();
                }
            });
        });


        // api call to get services 
        document.addEventListener('DOMContentLoaded', async () => {
            const toggleDropdown = document.getElementById('toggleDropdown');
            const radioOptions = document.getElementById('radioOptions');
            const astrologyServiceText = document.getElementById('astrologyServiceText');
            const astrologyServiceError = document.getElementById('astrologyServiceError');

            try {
                const response = await fetch('<?php echo base_url() . 'astrologer/get_services' ?>');
                const data = await response.json();

                if (Array.isArray(data.services)) {
                    radioOptions.innerHTML = data.services.map(service =>
                        `<div class="form-check">
                    <input class="form-check-input" type="radio" name="service" id="${service.id}" value="${service.id}">
                    <label class="form-check-label" for="${service.id}">${service.name}</label>
                </div>`
                    ).join('');
                }
            } catch (error) {
                console.error('Error fetching services:', error);
            }



            radioOptions.addEventListener('change', (e) => {
                if (e.target.classList.contains('form-check-input')) {
                    astrologyServiceText.textContent = e.target.value;
                    radioOptions.style.display = 'none';
                    astrologyServiceError.style.display = 'none';
                }
            });
        });


        // submit the form for the service 
//         document.getElementById('advanced').addEventListener('submit', (e) => {
//             e.preventDefault();

//             // Extract selected astrology service
//             const selectedService = document.querySelector('input[name="service"]:checked')?.nextElementSibling.textContent.trim() || 'Not selected';

//             // Extract selected availability days
//             const selectedDays = Array.from(document.querySelectorAll('#availabilityCheckboxes .form-check-input:checked'))
//                 .map(checkbox => checkbox.value);

//             // Extract availability times
//             const startTime = document.getElementById('startTime').value;
//             const endTime = document.getElementById('endTime').value;

//             // Display extracted data
//             console.log({
//                 astrologyService: selectedService,
//                 availabilityDays: selectedDays.length ? selectedDays : 'Not selected',
//                 startTime,
//                 endTime
//             });

//             alert(`Astrology Service: ${selectedService}
// Availability Days: ${selectedDays.join(', ') || 'None'}
// Start Time: ${startTime}
// End Time: ${endTime}`);
//         });
    </script>
</body> 

</html>