<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astrologer Profile</title>
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
    <!-- <script src="<?php echo base_url() . 'assets/js/main.js' ?>"></script> -->
    <link rel="icon" type="image/png" href="<?php echo base_url() . 'assets/images/PNG image.png' ?>">
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
                <img src=""
                    class="profilei"
                    id="profile1"
                   
                    alt="profile"
                    onclick="document.getElementById('imageInput').click()">

                <input type="file" id="imageInput" style="display: none;" accept="image/*" onchange="uploadImage()">
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
                        <input type="number" class="form-control" id="contactInput" placeholder="Enter your Contact Number" required oninput="this.value = this.value.slice(0, 10); if (this.value < 0) this.value = '';" disabled>
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
                        <div class="form-control" id="languageInput" style="cursor: pointer;">Select languages</div>
                        <div id="languageDropdown" style="position: absolute; top: 100%; left: 0; width: 100%; background: #fff; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); max-height: 150px; overflow-y: auto; display: none; z-index: 1000;">
                            <div style="padding: 8px;">
                                <input type="checkbox" id="hindi" value="Hindi"> <label for="hindi">Hindi</label>
                            </div>
                            <div style="padding: 8px;">
                                <input type="checkbox" id="english" value="English"> <label for="english">English</label>
                            </div>
                            <div style="padding: 8px;">
                                <input type="checkbox" id="marathi" value="Marathi"> <label for="marathi">Marathi</label>
                            </div>
                            <div style="padding: 8px;">
                                <input type="checkbox" id="sanskrit" value="Sanskrit"> <label for="sanskrit">Sanskrit</label>
                            </div>
                        </div>
                        <div class="invalid-feedback">Please select a language.</div>
                    </div>

                    <script>
                        const languageInput = document.getElementById('languageInput');
                        const languageDropdown = document.getElementById('languageDropdown');
                        const checkboxes = document.querySelectorAll('#languageDropdown input[type="checkbox"]');

                        languageInput.addEventListener('click', () => {
                            languageDropdown.style.display = languageDropdown.style.display === 'none' ? 'block' : 'none';
                        });

                        checkboxes.forEach(checkbox => {
                            checkbox.addEventListener('change', () => {
                                const selectedLanguages = Array.from(checkboxes)
                                    .filter(checkbox => checkbox.checked)
                                    .map(checkbox => checkbox.value);
                                languageInput.textContent = selectedLanguages.length ? selectedLanguages.join(', ') : 'Select languages';
                            });
                        });

                        document.addEventListener('click', (e) => {
                            if (!languageInput.contains(e.target) && !languageDropdown.contains(e.target)) {
                                languageDropdown.style.display = 'none';
                            }
                        });
                    </script>

                    <div class="mb-3">
                        <label class="form-label">Experience</label>
                        <input type="text" class="form-control" id="experienceInput" value="23 yrs" placeholder="e.g., 23 yrs" required>
                        <div class="invalid-feedback">Please enter a valid experience (e.g., '23 yrs', between 0 and 100 years).</div>
                    </div>
                    <!-- <div class="mb-3">
                        <label class="form-label">Place of Birth</label>
                        <input type="text" class="form-control" id="placeOfBirth" placeholder="Enter your Place of Birth" required>
                        <div class="invalid-feedback">Please enter your place of birth (letters and spaces only).</div>
                    </div> -->
                    <div class="mb-3">
                        <label class="form-label">Current Address</label>
                        <input type="text" class="form-control" id="currentAddress" placeholder="Enter your current address" required>
                        <div class="invalid-feedback">Please enter your current address.</div>
                    </div>
                    <button type="submit" class="save-btn" id="submitpersonal">Save Changes</button>
                </form>

                <form id="professional" class="form-container">
                    <div class="mb-3">
                        <label class="form-label">Astrology Services</label>
                        <select class="form-control" id="serviceDropdown" required onchange="updateFields()"></select>
                        <div class="invalid-feedback">Please select a service.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Available Days</label>
                        <div id="availableDaysInput">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="monday" value="Monday">
                                <label class="form-check-label" for="monday">Monday</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="tuesday" value="Tuesday">
                                <label class="form-check-label" for="tuesday">Tuesday</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wednesday" value="Wednesday">
                                <label class="form-check-label" for="wednesday">Wednesday</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="thursday" value="Thursday">
                                <label class="form-check-label" for="thursday">Thursday</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="friday" value="Friday">
                                <label class="form-check-label" for="friday">Friday</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="saturday" value="Saturday">
                                <label class="form-check-label" for="saturday">Saturday</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sunday" value="Sunday">
                                <label class="form-check-label" for="sunday">Sunday</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Start Time</label>
                        <input type="text" class="form-control timepicker" id="startTimeInput">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">End Time</label>
                        <input type="text" class="form-control timepicker" id="endTimeInput">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Rs Per Minute</label>
                        <input type="text" class="form-control" id="rsPerMinuteInput" readonly>
                    </div>

                    <button type="submit" class="save-btn" id="submitprofessional">Save Changes</button>
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
                                <!-- <div class="form-check">
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
                                </div> -->
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
        document.addEventListener("DOMContentLoaded", function() {
            const formper = document.getElementById("personal"); // Change to your form's ID
            const submitButton = document.getElementById("submitpersonal");

            // Initially disable the button
            submitButton.disabled = true;

            // Detect changes in the form
            formper.addEventListener("input", function() {
                submitButton.disabled = false; // Enable button when form changes
            });
        });

        $(document).ready(function() {
            $('.tab').click(function() {
                $('.tab').removeClass('active');
                $(this).addClass('active');
                $('.form-container').removeClass('active');
                $($(this).data('target')).addClass('active');
            });
           

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
        window.addEventListener('load', () => {
            fetch('<?php echo base_url('astrologer/get_logged_in_user'); ?>')
                .then(response => response.json())
                .then(data => {
                    if (data.status !== 'success') {
                        window.location.href = '<?php echo base_url("AstrologerMobileNumberAndOTPForm"); ?>';
                    }
                })
                .catch(error => console.error('Error:', error));
        });
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
                availability_days: available_days,
                start_time: startTime,
                end_time: endTime
            };
            console.log('requestdata',requestData)

            try {
                const response = await fetch('<?php echo base_url() . 'astrologer/add_service' ?>', {
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
            //const placeOfBirthInput = document.getElementById("placeOfBirth");
            const currentAddressInput = document.getElementById("currentAddress");

            // Professional Form Validation
            const formProfessional = document.getElementById("professional");
            //const serviceInput = document.getElementById("serviceInput");
            const serviceDropdown = document.getElementById("serviceDropdown");
            const serviceOptions = document.querySelectorAll("#serviceDropdown .service-option");
            const rsPerMinuteInput = document.getElementById("rsPerMinuteInput");

            // Professional form submission validation
            document.getElementById('professional').addEventListener('submit', function(e) {
                e.preventDefault();

                const selectedServiceId = document.getElementById('serviceDropdown').value;
                const availableDays = Array.from(document.querySelectorAll('#availableDaysInput .form-check-input:checked'))
                    .map(checkbox => checkbox.value);

                const startTime = document.getElementById('startTimeInput').value.trim();
                const endTime = document.getElementById('endTimeInput').value.trim();

                // Validation
                if (!selectedServiceId) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Please select a service.',
                    });
                    return;
                }

                if (availableDays.length === 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Please select at least one available day.',
                    });
                    return;
                }

                const timeFormat = /^(0?[1-9]|1[0-2]):[0-5][0-9] (AM|PM)$/;

                if (!timeFormat.test(startTime)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Please enter a valid start time in the format HH:MM AM/PM.',
                    });
                    return;
                }

                if (!timeFormat.test(endTime)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Please enter a valid end time in the format HH:MM AM/PM.',
                    });
                    return;
                }

                const formData = new FormData();
                formData.append('service_id', selectedServiceId);
                formData.append('available_days', availableDays.join(','));
                formData.append('start_time', startTime);
                formData.append('end_time', endTime);


                fetch('<?= base_url('astrologer/update_avaliability') ?>', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {

                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: data.message,
                            }).then(() => {
                                location.reload(); // Reloads only after the user clicks "OK"
                            });

                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: data.message,
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Something went wrong. Please try again later.',
                        });
                    });
            });

            // Advanced Form Validation
            const formAdvanced = document.getElementById("advanced");
            const astrologyServiceInputs = document.querySelectorAll("#radioOptions input[type='radio']");
            const availabilityDayInput = document.getElementById("availabilityDayText");
            const startTimeInput = document.getElementById("startTime");
            const endTimeInput = document.getElementById("endTime");

            formAdvanced.addEventListener("submit", function(event) {
                let isValid = true;

                // Validate Astrology Service (at least one must be selected)
                const isServiceSelected = Array.from(astrologyServiceInputs).some(input => input.checked);
                if (!isServiceSelected) {
                    //  document.getElementById("astrologyServiceError").style.display = "block";
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
                 const selectedLabel = document.querySelector(`label[for="${e.target.id}"]`);
                  astrologyServiceText.textContent = selectedLabel.textContent; // show name
                  radioOptions.style.display = 'none';
                 astrologyServiceError.style.display = 'none';
                }
            });

        });



        window.onload = function() {
            fetch('<?php echo base_url() . 'astrologer/profile_astrologer' ?>')
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        userdetails = data.user_details;
                        document.getElementById('nameInput').value = userdetails.name;
                        document.getElementById('contactInput').value = userdetails.contact;
                        document.getElementById('emailInput').value = userdetails.email;
                        document.getElementById('genderInput').value = userdetails.gender;
                        document.getElementById('profile1').src = "<?php echo base_url(); ?>" + userdetails.profile_data;


                     //   console.log(userdetails)
                        const userLanguages = userdetails.languages.split(',');

                        checkboxes.forEach(checkbox => {
                            if (userLanguages.includes(checkbox.value)) {
                                checkbox.checked = true;
                            }
                        });

                        languageInput.textContent = userLanguages.join(', ') || 'Select languages';

                        document.getElementById('currentAddress').value = userdetails.address;
                        document.getElementById('experienceInput').value = userdetails.experience;
                        document.getElementById('rsPerMinuteInput').value = userdetails.price_per_minute;
                      //  console.log(userdetails)
                    } else {
                        console.log('Request failed');
                    }
                })
                .catch(error => console.error('Error:', error));
        };
    </script>

    <!-- get the approved services  -->

    <script>
        let servicesData = [];
        let astrologerServices = [];

        document.addEventListener('DOMContentLoaded', function() {
            fetch('<?php echo base_url() . 'astrologer/get_approved_services' ?>')
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        servicesData = data.data;
                        astrologerServices = data.astrologer_services;

                        const serviceDropdown = document.getElementById('serviceDropdown');
                        servicesData.forEach(service => {
                            const option = document.createElement('option');
                            option.value = service.id;
                            option.textContent = service.name;
                            serviceDropdown.appendChild(option);
                        });

                        updateFields()
                    } else {
                       // console.log('Request failed');
                    }
                })
                .catch(error => console.error('Error:', error));
        });


        function updateFields() {
            const selectedServiceId = document.getElementById('serviceDropdown').value;
            const selectedService = servicesData.find(service => service.id === selectedServiceId);
            const selectedAstroService = astrologerServices.find(service => service.service_id === selectedServiceId);

            if (selectedService && selectedAstroService) {
                const availableDays = selectedAstroService.day.split(',');

                // Manage checkboxes for available days
                document.querySelectorAll('#availableDaysInput .form-check-input').forEach(checkbox => {
                    checkbox.checked = availableDays.includes(checkbox.value);
                });

                document.getElementById('startTimeInput').value = selectedAstroService.start_time;
                document.getElementById('endTimeInput').value = selectedAstroService.end_time;
            }
        }



        // submit the form for the updation


        const formPersonal = document.getElementById("personal");
        const nameInput = document.getElementById("nameInput");
        const contactInput = document.getElementById("contactInput");
        const emailInput = document.getElementById("emailInput");
        const genderInput = document.getElementById("genderInput");
        const languageOptions = document.querySelectorAll("#languageDropdown .language-option");
        const experienceInput = document.getElementById("experienceInput");
        const currentAddressInput = document.getElementById("currentAddress");
        formPersonal.addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form refresh
            let isValid = true;

            // Name Validation
            const nameRegex = /^[A-Za-z\s]{2,50}$/;
            if (!nameRegex.test(nameInput.value.trim())) {
                nameInput.classList.add("is-invalid");
                isValid = false;
            } else {
                nameInput.classList.remove("is-invalid");
            }

            // Contact Validation
            const contactRegex = /^\d{10}$/;
            if (!contactRegex.test(contactInput.value.trim())) {
                contactInput.classList.add("is-invalid");
                isValid = false;
            } else {
                contactInput.classList.remove("is-invalid");
            }

            // Email Validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailInput.value.trim())) {
                emailInput.classList.add("is-invalid");
                isValid = false;
            } else {
                emailInput.classList.remove("is-invalid");
            }

            // Gender Validation
            if (!genderInput.value) {
                genderInput.classList.add("is-invalid");
                isValid = false;
            } else {
                genderInput.classList.remove("is-invalid");
            }

            // Language Validation
            const selectedLanguages = Array.from(checkboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.value);
            if (selectedLanguages.length === 0) {
                languageInput.classList.add("is-invalid");
                isValid = false;
            } else {
                languageInput.classList.remove("is-invalid");
            }

            // Experience Validation
            const experienceValue = experienceInput.value.trim();
            const experienceNumber = parseInt(experienceValue);
            if (experienceNumber < 0 || experienceNumber > 100 || isNaN(experienceNumber)) {
                experienceInput.classList.add("is-invalid");
                isValid = false;
            } else {
                experienceInput.classList.remove("is-invalid");
            }

            // Address Validation
            const addressRegex = /^[\w\s,.-]{5,200}$/;
            if (!addressRegex.test(currentAddressInput.value.trim())) {
                currentAddressInput.classList.add("is-invalid");
                isValid = false;
            } else {
                currentAddressInput.classList.remove("is-invalid");
            }

            if (!isValid) {
                event.preventDefault();
            } else {
                const formData = {
                    name: nameInput.value.trim(),
                    email: emailInput.value.trim(),
                    gender: genderInput.value,
                    languages: selectedLanguages,
                    experience: experienceInput.value.trim(),
                    address: currentAddressInput.value.trim()
                };

                fetch("<?php echo base_url() . 'astrologer/update_profile' ?>", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(formData)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === "success") {
                            Swal.fire({
                                icon: "success",
                                title: "Success!",
                                text: data.message
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Error!",
                                text: data.message
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: "error",
                            title: "Error!",
                            text: "Error submitting form. Please try again."
                        });
                    });
            }
        });


        // api call to change the user image of the user 
        function uploadImage() {
            const fileInput = document.getElementById('imageInput');
            const imageElement = document.getElementById('profile1');

            if (fileInput.files && fileInput.files[0]) {
                const formData = new FormData();
                formData.append('profile_image', fileInput.files[0]);

                fetch('<?php echo base_url() . 'astrologer/profile_image' ?>', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            imageElement.src = URL.createObjectURL(fileInput.files[0]);
                            Swal.fire({
                                icon: 'success',
                                title: 'Profile image updated successfully',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            alert('Failed to update image.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error uploading image.');
                    });
            }
        }
    </script>
</body>

</html>