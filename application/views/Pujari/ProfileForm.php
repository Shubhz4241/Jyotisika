<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pujari Profile Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/Pujari/jyotishvitaran.png'); ?>" type="image/png">
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
            overflow-y: auto;
            margin: 0 auto;
        }

        .profilei {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid gold;
            cursor: pointer;
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
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>
    <div style="min-height: 100vh;" class="py-3">
        <div style="width: 100%; display: flex; justify-content: center;">
            <div class="profile-container">
                <input type="file" id="profileImageInput" accept="image/png, image/jpeg, image/jpg" style="display: none;">
                <img src="<?php echo isset($userDetails->profile_image) && !empty($userDetails->profile_image)
                                ? base_url() . $userDetails->profile_image
                                : base_url() . 'assets/images/Pujari/Rectangle 5160 (1).png' ?>"
                    class="profilei" id="profileImage" alt="Profile" title="Click to update profile image">
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
                        <input type="number" class="form-control" id="contactInput" placeholder="Enter your Contact Number" required readonly oninput="this.value = this.value.slice(0, 10); if (this.value < 0) this.value = '';">
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
                        <div id="languageInput" class="form-control" style="height: auto; min-height: 38px; cursor: pointer;" onclick="toggleDropdown()">
                            Select languages
                        </div>
                        <div id="languageDropdown" style="position: absolute; top: 100%; left: 0; width: 100%; background: #fff; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); max-height: 150px; overflow-y: auto; display: none; z-index: 1000; padding: 10px;">
                            <label><input type="checkbox" class="language-option" value="Hindi"> Hindi</label><br>
                            <label><input type="checkbox" class="language-option" value="English"> English</label><br>
                            <label><input type="checkbox" class="language-option" value="Sanskrit"> Sanskrit</label><br>
                            <label><input type="checkbox" class="language-option" value="Marathi"> Marathi</label>
                        </div>
                        <div class="invalid-feedback">Please select at least one language.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Experience</label>
                        <input type="text" class="form-control" id="experienceInput" placeholder="e.g., 23 yrs" required>
                        <div class="invalid-feedback">Please enter a valid experience (e.g., '23 yrs', between 0 and 100 years).</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Current Address</label>
                        <input type="text" class="form-control" id="currentAddress" placeholder="Enter your current address" required>
                        <div class="invalid-feedback">Please enter your current address.</div>
                    </div>
                    <button type="submit" class="save-btn">Save Changes</button>
                </form>

                <form id="professional" class="form-container">
                    <div class="mb-3">
                        <label class="form-label">Pujari Services</label>
                        <select class="form-control" id="serviceDropdown" required onchange="updateFields()">
                        </select>
                        <div class="invalid-feedback">Please select a service.</div>
                    </div>

                    <!-- <div class="mb-3">
                        <label class="form-label">Available Days</label>
                        <input type="text" class="form-control" id="availableDaysInput">
                    </div> -->

                    <div class="mb-3" style="position: relative;">
                        <label class="form-label">Available Days</label>
                        <input type="text" id="profSelectedDays" class="form-control mb-2" placeholder="Select days" readonly onclick="toggleProfDayDropdown()">
                        <div id="profDayDropdown" class="d-flex flex-column border p-3 rounded" style="position: absolute; top: 100%; left: 0; width: 100%; background: #fff; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); max-height: 150px; overflow-y: auto; display: none; z-index: 1000; visibility: hidden;">
                            <label><input type="checkbox" id="profSelectAll" onclick="profSelectAllDays()"> All Days</label>
                            <label><input type="checkbox" class="prof-day-option" value="Monday" onclick="updateProfSelectedDays()"> Monday</label>
                            <label><input type="checkbox" class="prof-day-option" value="Tuesday" onclick="updateProfSelectedDays()"> Tuesday</label>
                            <label><input type="checkbox" class="prof-day-option" value="Wednesday" onclick="updateProfSelectedDays()"> Wednesday</label>
                            <label><input type="checkbox" class="prof-day-option" value="Thursday" onclick="updateProfSelectedDays()"> Thursday</label>
                            <label><input type="checkbox" class="prof-day-option" value="Friday" onclick="updateProfSelectedDays()"> Friday</label>
                            <label><input type="checkbox" class="prof-day-option" value="Saturday" onclick="updateProfSelectedDays()"> Saturday</label>
                            <label><input type="checkbox" class="prof-day-option" value="Sunday" onclick="updateProfSelectedDays()"> Sunday</label>
                        </div>
                        <div class="invalid-feedback">Please select at least one day.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Start Time</label>
                        <input type="time" class="form-control" id="startTimeInput">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">End Time</label>
                        <input type="time" class="form-control" id="endTimeInput">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Rs Per Minute</label>
                        <input type="text" class="form-control" id="rsPerMinuteInput" readonly>
                    </div>

                    <button type="submit" class="save-btn">Save Changes</button>
                </form>

                <form id="advanced" class="form-container p-3">
                    <div class="container p-0 m-0">
                        <label for="astrologyServiceDropdown"><strong>Pujari Services</strong></label>
                        <select class="form-control" id="astrologyServiceDropdown" required>
                            <option value="" disabled selected>Select Pujari Service</option>
                            <!-- Options will be dynamically added via JavaScript -->
                        </select>
                        <div class="invalid-feedback" id="astrologyServiceError">Please select a Pujari service.</div>
                    </div>
                </div>

                    <div class="mb-3" style="position: relative;">
                        <label class="form-label fw-bold">Availability Day</label>
                        <input type="text" id="selectedDays" class="form-control mb-2" placeholder="Select days" readonly onclick="toggleDropdown()">
                        <div id="dayDropdown" class="d-flex flex-column border p-3 rounded" style="position: absolute; top: 100%; left: 0; width: 100%; background: #fff; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); max-height: 150px; overflow-y: auto; display: none; z-index: 1000; visibility: hidden;">
                            <label><input type="checkbox" id="selectAll" onclick="selectAllDays()"> All Days</label>
                            <label><input type="checkbox" class="day-option" value="Monday" onclick="updateSelectedDays()"> Monday</label>
                            <label><input type="checkbox" class="day-option" value="Tuesday" onclick="updateSelectedDays()"> Tuesday</label>
                            <label><input type="checkbox" class="day-option" value="Wednesday" onclick="updateSelectedDays()"> Wednesday</label>
                            <label><input type="checkbox" class="day-option" value="Thursday" onclick="updateSelectedDays()"> Thursday</label>
                            <label><input type="checkbox" class="day-option" value="Friday" onclick="updateSelectedDays()"> Friday</label>
                            <label><input type="checkbox" class="day-option" value="Saturday" onclick="updateSelectedDays()"> Saturday</label>
                            <label><input type="checkbox" class="day-option" value="Sunday" onclick="updateSelectedDays()"> Sunday</label>
                        </div>
                        <div class="invalid-feedback">Please select at least one day.</div>
                    </div>

                    <script>
                        function toggleDropdown() {
                            var dropdown = document.getElementById("dayDropdown");
                            if (dropdown.style.visibility === "hidden") {
                                dropdown.style.visibility = "visible";
                                dropdown.style.display = "block";
                            } else {
                                dropdown.style.visibility = "hidden";
                                dropdown.style.display = "none";
                            }
                        }

                        document.addEventListener("click", function(event) {
                            var dropdown = document.getElementById("dayDropdown");
                            var input = document.getElementById("selectedDays");
                            if (!input.contains(event.target) && !dropdown.contains(event.target)) {
                                dropdown.style.visibility = "hidden";
                                dropdown.style.display = "none";
                            }
                        });

                        function updateSelectedDays() {
                            var checkboxes = document.querySelectorAll(".day-option");
                            var selectedDays = Array.from(checkboxes)
                                .filter(cb => cb.checked)
                                .map(cb => cb.value)
                                .join(", ");
                            document.getElementById("selectedDays").value = selectedDays || "Select days";
                            document.getElementById("selectAll").checked = checkboxes.length === document.querySelectorAll(".day-option:checked").length;
                        }

                        function selectAllDays() {
                            var checkboxes = document.querySelectorAll(".day-option");
                            var selectAll = document.getElementById("selectAll").checked;
                            checkboxes.forEach(cb => cb.checked = selectAll);
                            updateSelectedDays();
                        }

                        // Professional Form dropdown functions
                        function toggleProfDayDropdown() {
                            var dropdown = document.getElementById("profDayDropdown");
                            if (dropdown.style.visibility === "hidden") {
                                dropdown.style.visibility = "visible";
                                dropdown.style.display = "block";
                            } else {
                                dropdown.style.visibility = "hidden";
                                dropdown.style.display = "none";
                            }
                        }

                        document.addEventListener("click", function(event) {
                            var dropdown = document.getElementById("profDayDropdown");
                            var input = document.getElementById("profSelectedDays");
                            if (!input.contains(event.target) && !dropdown.contains(event.target)) {
                                dropdown.style.visibility = "hidden";
                                dropdown.style.display = "none";
                            }
                        });

                        function updateProfSelectedDays() {
                            var checkboxes = document.querySelectorAll(".prof-day-option");
                            var selectedDays = Array.from(checkboxes)
                                .filter(cb => cb.checked)
                                .map(cb => cb.value)
                                .join(", ");
                            document.getElementById("profSelectedDays").value = selectedDays || "Select days";
                            document.getElementById("profSelectAll").checked = checkboxes.length === document.querySelectorAll(".prof-day-option:checked").length;
                        }

                        function profSelectAllDays() {
                            var checkboxes = document.querySelectorAll(".prof-day-option");
                            var selectAll = document.getElementById("profSelectAll").checked;
                            checkboxes.forEach(cb => cb.checked = selectAll);
                            updateProfSelectedDays();
                        }
                    </script>


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
                </div>

                    <div class="text-center">
                        <button type="submit" class="save-btn" id="submitAdvanced">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // Handle profile image update
            const profileImage = document.getElementById("profileImage");
            const profileImageInput = document.getElementById("profileImageInput");

            // Trigger file input when profile image is clicked
            profileImage.addEventListener("click", function() {
                profileImageInput.click();
            });

            profileImageInput.addEventListener("change", function(event) {
                const file = event.target.files[0];
                if (file) {
                    // Validate file type
                    const validImageTypes = ["image/png", "image/jpeg", "image/jpg"];
                    if (!validImageTypes.includes(file.type)) {
                        Swal.fire({
                            icon: "error",
                            title: "Invalid File Type",
                            html: "Please upload a PNG, JPEG, or JPG image.",
                            confirmButtonText: "OK",
                            customClass: {
                                popup: 'swal2-popup',
                                title: 'swal2-title',
                                htmlContainer: 'swal2-html-container',
                                confirmButton: 'swal2-confirm'
                            }
                        });
                        profileImageInput.value = "";
                        return;
                    }

                    // Validate file size (max 5MB)
                    const maxSize = 5 * 1024 * 1024; // 5MB in bytes
                    if (file.size > maxSize) {
                        Swal.fire({
                            icon: "error",
                            title: "File Too Large",
                            html: "The image size should not exceed 5MB.",
                            confirmButtonText: "OK",
                            customClass: {
                                popup: 'swal2-popup',
                                title: 'swal2-title',
                                htmlContainer: 'swal2-html-container',
                                confirmButton: 'swal2-confirm'
                            }
                        });
                        profileImageInput.value = "";
                        return;
                    }

                    // Preview the image
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        profileImage.src = e.target.result;
                    };
                    reader.readAsDataURL(file);

                    // Upload the image to the server
                    const formData = new FormData();
                    formData.append("profile_image", file);
                    const pujariId = <?php echo json_encode($pujari_id); ?>;
                    fetch('<?php echo base_url() . 'PujariController/updatePujariProfileImage/'; ?>' + pujariId, {
                            method: "POST",
                            body: formData
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(`HTTP error! status: ${response.status}`);
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.status === "success") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Success",
                                    html: data.message || "Profile image updated successfully!",
                                    confirmButtonText: "OK",
                                    customClass: {
                                        popup: 'swal2-popup',
                                        title: 'swal2-title',
                                        htmlContainer: 'swal2-html-container',
                                        confirmButton: 'swal2-confirm'
                                    }
                                });
                                // Update the image source with the new URL from the server
                                if (data.profile_image_url) {
                                    profileImage.src = data.profile_image_url;
                                }
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Error",
                                    html: data.message || "Failed to update profile image.",
                                    confirmButtonText: "OK",
                                    customClass: {
                                        popup: 'swal2-popup',
                                        title: 'swal2-title',
                                        htmlContainer: 'swal2-html-container',
                                        confirmButton: 'swal2-confirm'
                                    }
                                });
                                // Revert to original image on failure
                                profileImage.src = '<?php echo isset($userDetails->profile_image) && !empty($userDetails->profile_image)
                                                        ? base_url() . $userDetails->profile_image
                                                        : base_url() . 'assets/images/Pujari/Rectangle 5160 (1).png' ?>';
                            }
                        })
                        .catch(error => {
                            console.error("Error uploading profile image:", error);
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                html: "An error occurred while uploading the image.",
                                confirmButtonText: "OK",
                                customClass: {
                                    popup: 'swal2-popup',
                                    title: 'swal2-title',
                                    htmlContainer: 'swal2-html-container',
                                    confirmButton: 'swal2-confirm'
                                }
                            });
                            // Revert to original image on error
                            profileImage.src = '<?php echo isset($userDetails->profile_image) && !empty($userDetails->profile_image)
                                                    ? base_url() . $userDetails->profile_image
                                                    : base_url() . 'assets/images/Pujari/Rectangle 5160 (1).png' ?>';
                        });
                }
            });
            // Function to fetch Pujari details from the API
            function fetchPujariDetails() {
                const pujariId = <?php echo json_encode($pujari_id); ?>;
                fetch('<?php echo base_url() . 'PujariController/getPujariDetails/'; ?>' + pujariId)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {

                        console.log("Received data:", data);
                        if (data.status === "success") {
                            populateFormFields(data.user_details);
                        } else {
                            alert(data.message || "Failed to fetch details.");
                        }
                    })
                    .catch(error => {
                        console.error("Error fetching Pujari details:", error);
                    });
            }

            // Function to populate form fields with API response
            function populateFormFields(userDetails) {
                const nameInput = document.getElementById("nameInput");
                const contactInput = document.getElementById("contactInput");
                const emailInput = document.getElementById("emailInput");
                const genderInput = document.getElementById("genderInput");
                const languageInput = document.getElementById("languageInput");
                const experienceInput = document.getElementById("experienceInput");
                const currentAddressInput = document.getElementById("currentAddress");

                if (nameInput) nameInput.value = userDetails.name || "";
                if (contactInput) contactInput.value = userDetails.contact || "";
                if (emailInput) emailInput.value = userDetails.email || "";
                if (genderInput) genderInput.value = userDetails.gender || "";
                if (experienceInput) experienceInput.value = userDetails.experience || "";
                if (currentAddressInput) currentAddressInput.value = userDetails.address || "";

                // Handle languages
                if (languageInput && userDetails.languages) {
                    const languagesArray = userDetails.languages.split(",").map(lang => lang.trim());
                    document.querySelectorAll(".language-option").forEach(checkbox => {
                        checkbox.checked = languagesArray.includes(checkbox.value);
                    });
                    languageInput.textContent = languagesArray.length > 0 ? languagesArray.join(", ") : "Select languages";
                }
                const profileImage = document.querySelector('.profilei');
                if (profileImage && userDetails.profile_pic) {
                    profileImage.src = '<?php echo base_url('uploads/pujari/profile/') ?>' + userDetails.profile_pic;
                } else if (profileImage) {
                    profileImage.src = '<?php echo base_url() ?>assets/images/Pujari/Rectangle 5160 (1).png';
                }
            }

            // Toggle dropdown visibility
            function toggleDropdown() {
                var dropdown = document.getElementById("languageDropdown");
                dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
            }

            // Close dropdown when clicking outside
            document.addEventListener("click", function(event) {
                var dropdown = document.getElementById("languageDropdown");
                var languageInput = document.getElementById("languageInput");
                if (!languageInput.contains(event.target) && !dropdown.contains(event.target)) {
                    dropdown.style.display = "none";
                }
            });

            // Update display when checkboxes change
            document.querySelectorAll(".language-option").forEach(function(checkbox) {
                checkbox.addEventListener("change", function() {
                    var selectedLanguages = Array.from(document.querySelectorAll(".language-option:checked"))
                        .map(cb => cb.value)
                        .join(", ");
                    var languageInput = document.getElementById("languageInput");
                    languageInput.textContent = selectedLanguages || "Select languages";
                });
            });

            // Fetch details on page load
            fetchPujariDetails();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Function to update Pujari details via API
            function updatePujariDetails() {
                const updatedData = {
                    name: document.getElementById("nameInput").value,
                    contact: document.getElementById("contactInput").value,
                    email: document.getElementById("emailInput").value,
                    gender: document.getElementById("genderInput").value,
                    address: document.getElementById("currentAddress").value,
                    languages: Array.from(document.querySelectorAll(".language-option:checked"))
                        .map(cb => cb.value)
                        .join(", "),
                    experience: document.getElementById("experienceInput").value
                };

                const pujariId = <?php echo json_encode($pujari_id); ?>;

                fetch('<?php echo base_url() . 'PujariController/updatePujariDetails/'; ?>' + pujariId, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(updatedData)
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.status === "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: data.message || "Details updated successfully!",
                                confirmButtonColor: '#3085d6'
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Failed',
                                text: data.message || "Failed to update details.",
                                confirmButtonColor: '#d33'
                            });
                        }
                    })
                    .catch(error => {
                        console.error("Error updating Pujari details:", error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops!',
                            text: "An error occurred while updating details.",
                            confirmButtonColor: '#d33'
                        });
                    });
            }

            // Event listener for the save button
            document.querySelector(".save-btn").addEventListener("click", function(event) {
                event.preventDefault(); // Prevent default form submission
                updatePujariDetails(); // Call the function to update details
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function fetchServices() {
                fetch('<?php echo base_url() . 'PujariController/getPujariServices'; ?>')
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.status === "success") {
                            populateDropdown(data.services);
                        } else {
                            alert(data.message || "Failed to fetch services.");
                        }
                    })
                    .catch(error => {
                        console.error("Error fetching services:", error);
                        alert("An error occurred while fetching services.");
                    });
            }

            function populateDropdown(services) {
                const dropdown = document.getElementById("astrologyServiceDropdown");
                dropdown.innerHTML = '<option value="" disabled selected>Select Pujari Service</option>';

                services.forEach(service => {
                    const option = document.createElement("option");
                    option.value = service.name;
                    option.textContent = service.name;
                    dropdown.appendChild(option);
                });
            }

            // Function to reset the form
            function resetForm() {
                // Reset the service dropdown to the default option
                const dropdown = document.getElementById("astrologyServiceDropdown");
                dropdown.selectedIndex = 0; // Selects the first option ("Select Pujari Service")

                // Uncheck all day checkboxes and "Select All"
                document.querySelectorAll(".day-option").forEach(checkbox => {
                    checkbox.checked = false;
                });
                document.getElementById("selectAll").checked = false;

                // Reset the selected days display
                document.getElementById("selectedDays").value = "Select days";

                // Reset the time inputs to default values
                document.getElementById("startTime").value = "9:30 AM";
                document.getElementById("endTime").value = "6:00 PM";

                // Hide the dropdown if it's visible
                const dayDropdown = document.getElementById("dayDropdown");
                dayDropdown.style.visibility = "hidden";
                dayDropdown.style.display = "none";
            }

            // Function to submit the Pujari service request
            function submitPujariServiceRequest() {
                const data = {
                    specialties: document.getElementById("astrologyServiceDropdown").value, // was service_id
                    availability_days: Array.from(document.querySelectorAll(".day-option:checked"))
                        .map(cb => cb.value)
                        .join(", "),
                    start_time: document.getElementById("startTime").value,
                    end_time: document.getElementById("endTime").value
                };

                const pujariId = <?php echo json_encode($pujari_id); ?>;

                fetch('<?php echo base_url() . 'PujariController/addPujariServiceRequest/'; ?>' + pujariId, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => {
                        if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
                        return response.json();
                    })
                    .then(data => {
                        if (data.status) {
                            alert(data.message || "Service request submitted successfully!");
                            resetForm(); // Reset the form on success
                        } else {
                            alert(data.message || "Failed to submit request.");
                        }
                    })
                    .catch(error => {
                        console.error("Error submitting request:", error);
                        alert("An error occurred while submitting the request.");
                    });
            }

            // Event Listener for Submit Button
            document.getElementById("submitAdvanced").addEventListener("click", function(event) {
                event.preventDefault();
                submitPujariServiceRequest();
            });

            // Fetch services on page load
            fetchServices();
        });
    </script>

    <script>
        let servicesData = [];
        let pujariServices = [];

        document.addEventListener('DOMContentLoaded', function() {
            const pujariId = <?php echo json_encode($pujari_id); ?>;
            fetch('<?php echo base_url() . 'PujariController/getLoggedInPujariServices/'; ?>' + pujariId)
                .then(response => response.json())
                .then(data => {
                    console.log('API Response:', data);
                    if (data.status === 'success') {
                        servicesData = data.pujari_services; // List of services for dropdown
                        pujariServices = data.pujari_services; // Full details for fields

                        const serviceDropdown = document.getElementById('serviceDropdown');
                        serviceDropdown.innerHTML = '<option value="" disabled selected>Select Pujari Service</option>';
                        servicesData.forEach(service => {
                            const option = document.createElement('option');
                            option.value = service.id;
                            option.textContent = service.specialties;
                            serviceDropdown.appendChild(option);
                        });

                        updateFields(); // Populate fields with the first service (if any)
                    } else {
                        console.log('Request failed:', data.message);
                    }
                })
                .catch(error => console.error('Error:', error));

            // Event listener for form submission
            document.getElementById('professional').addEventListener('submit', function(event) {
                event.preventDefault();
                saveChanges();
            });
        });



        function updateFields() {
            const selectedServiceId = document.getElementById('serviceDropdown').value;
            const selectedService = servicesData.find(service => service.id == selectedServiceId);
            const selectedPujariService = pujariServices.find(service => service.id == selectedServiceId);

            if (selectedService && selectedPujariService) {

                const days = (selectedPujariService.available_day || '').split(',').map(d => d.trim());
                const checkboxes = document.querySelectorAll('.prof-day-option');
                checkboxes.forEach(cb => {
                    cb.checked = days.includes(cb.value);
                });

                updateProfSelectedDays();

                document.getElementById('startTimeInput').value = selectedPujariService.start_time || '';
                document.getElementById('endTimeInput').value = selectedPujariService.end_time || '';
                document.getElementById('rsPerMinuteInput').value = selectedPujariService.puja_charges || '';
            } else {
                document.querySelectorAll('.prof-day-option').forEach(cb => cb.checked = false);
                updateProfSelectedDays();

                document.getElementById('startTimeInput').value = '';
                document.getElementById('endTimeInput').value = '';
                document.getElementById('rsPerMinuteInput').value = '';
            }
        }


        function saveChanges() {
            const data = {
                service_id: document.getElementById('serviceDropdown').value,
                availability_days: Array.from(document.querySelectorAll('.prof-day-option'))
                    .filter(cb => cb.checked)
                    .map(cb => cb.value)
                    .join(', '),
                start_time: document.getElementById('startTimeInput').value,
                end_time: document.getElementById('endTimeInput').value,
                charge_per_minute: parseFloat(document.getElementById('rsPerMinuteInput').value) || 0
            };
            const pujariId = <?php echo json_encode($pujari_id); ?>;
            fetch('<?php echo base_url() . 'PujariController/updateLoggedInPujariService/'; ?>' + pujariId, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => {
                    if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
                    return response.json();
                })
                .then(data => {
                    if (data.status === 'success') {
                        alert(data.message || 'Service updated successfully!');
                        // Optionally refresh the services list
                        fetch('<?php echo base_url() . 'PujariController/getLoggedInPujariServices' ?>')
                            .then(response => response.json())
                            .then(data => {
                                if (data.status === 'success') {
                                    servicesData = data.pujari_services;
                                    pujariServices = data.pujari_services;
                                    updateFields();
                                }
                            });
                    } else {
                        alert(data.message || 'Failed to update service.');
                    }
                })
                .catch(error => {
                    console.error('Error updating service:', error);
                    alert('An error occurred while updating the service.');
                });
        }
    </script>

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

            let selectedLanguage = languageInput.value || "";

            languageInput.addEventListener("click", function() {
                languageDropdown.style.display = "block";
            });

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

            document.addEventListener("click", function(event) {
                if (!languageInput.contains(event.target) && !languageDropdown.contains(event.target)) {
                    languageDropdown.style.display = "none";
                }
            });

            formPersonal.addEventListener("submit", function(event) {
                let isValid = true;

                const nameRegex = /^[A-Za-z\s]{2,50}$/;
                if (!nameRegex.test(nameInput.value.trim())) {
                    nameInput.classList.add("is-invalid");
                    isValid = false;
                } else {
                    nameInput.classList.remove("is-invalid");
                }

                const contactRegex = /^\d{10}$/;
                if (!contactRegex.test(contactInput.value) || contactInput.value < 0) {
                    contactInput.classList.add("is-invalid");
                    isValid = false;
                } else {
                    contactInput.classList.remove("is-invalid");
                }

                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(emailInput.value)) {
                    emailInput.classList.add("is-invalid");
                    isValid = false;
                } else {
                    emailInput.classList.remove("is-invalid");
                }

                if (!genderInput.value) {
                    genderInput.classList.add("is-invalid");
                    isValid = false;
                } else {
                    genderInput.classList.remove("is-invalid");
                }

                if (!selectedLanguage) {
                    languageInput.classList.add("is-invalid");
                    isValid = false;
                } else {
                    languageInput.classList.remove("is-invalid");
                }

                const experienceRegex = /^\d+\s*yrs$/;
                const experienceValue = experienceInput.value.trim();
                const experienceNumber = parseInt(experienceValue);
                if (!experienceRegex.test(experienceValue) || experienceNumber < 0 || experienceNumber > 100 || isNaN(experienceNumber)) {
                    experienceInput.classList.add("is-invalid");
                    isValid = false;
                } else {
                    experienceInput.classList.remove("is-invalid");
                }

                const placeRegex = /^[A-Za-z\s]{2,100}$/;
                if (!placeRegex.test(placeOfBirthInput.value.trim())) {
                    placeOfBirthInput.classList.add("is-invalid");
                    isValid = false;
                } else {
                    placeOfBirthInput.classList.remove("is-invalid");
                }

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

            experienceInput.addEventListener("input", function() {
                const value = this.value.trim();
                const numberPart = parseInt(value);
                if (value && (isNaN(numberPart) || numberPart < 0 || numberPart > 100)) {
                    this.value = "";
                }
            });

            contactInput.addEventListener("input", function() {
                if (this.value < 0) {
                    this.value = "";
                }
            });

            const formProfessional = document.getElementById("professional");
            const serviceInput = document.getElementById("serviceInput");
            const serviceDropdown = document.getElementById("serviceDropdown");
            const serviceOptions = document.querySelectorAll("#serviceDropdown .service-option");
            const rsPerMinuteInput = document.getElementById("rsPerMinuteInput");

            let selectedServices = serviceInput.value.split(", ").filter(service => service.trim() !== "");

            serviceInput.addEventListener("click", function() {
                serviceDropdown.style.display = "block";
            });

            serviceOptions.forEach(option => {
                option.addEventListener("click", function() {
                    const value = this.getAttribute("data-value");

                    if (selectedServices.includes(value)) {
                        selectedServices = selectedServices.filter(service => service !== value);
                    } else {
                        selectedServices.push(value);
                    }

                    serviceInput.value = selectedServices.join(", ");
                    if (selectedServices.length === 0) {
                        serviceInput.value = "";
                    }

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
    </script>
    <script>
        (function() {
            // Run when the page is fully loaded
            window.addEventListener('load', function() {
                // Check URL for tab parameter
                const urlParams = new URLSearchParams(window.location.search);
                const tab = urlParams.get('tab');

                // If tab is 'advanced', switch to the Advanced tab
                if (tab === 'advanced') {
                    // Use jQuery to update the active tab
                    jQuery('.tab').removeClass('active');
                    jQuery('.form-container').removeClass('active');
                    jQuery('.tab[data-target="#advanced"]').addClass('active');
                    jQuery('#advanced').addClass('active');
                }
            });
        })();
    </script>
    </script>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function () {
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
        languageInput.addEventListener("click", function () {
            languageDropdown.style.display = "block";
        });

        // Handle language selection (single selection) for Personal form
        languageOptions.forEach(option => {
            option.addEventListener("click", function () {
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
        document.addEventListener("click", function (event) {
            if (!languageInput.contains(event.target) && !languageDropdown.contains(event.target)) {
                languageDropdown.style.display = "none";
            }
        });

        // Personal form submission validation
        formPersonal.addEventListener("submit", function (event) {
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
        experienceInput.addEventListener("input", function () {
            const value = this.value.trim();
            const numberPart = parseInt(value);
            if (value && (isNaN(numberPart) || numberPart < 0 || numberPart > 100)) {
                this.value = "";
            }
        });

        // Real-time validation for Contact field (Personal form)
        contactInput.addEventListener("input", function () {
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
        serviceInput.addEventListener("click", function () {
            serviceDropdown.style.display = "block";
        });

        // Handle service selection (multiple selection)
        serviceOptions.forEach(option => {
            option.addEventListener("click", function () {
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
        document.addEventListener("click", function (event) {
            if (!serviceInput.contains(event.target) && !serviceDropdown.contains(event.target)) {
                serviceDropdown.style.display = "none";
            }
        });

        // Professional form submission validation
        formProfessional.addEventListener("submit", function (event) {
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
        rsPerMinuteInput.addEventListener("input", function () {
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

        formAdvanced.addEventListener("submit", function (event) {
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
</script>
<script>
    (function() {
        // Run when the page is fully loaded
        window.addEventListener('load', function() {
            // Check URL for tab parameter
            const urlParams = new URLSearchParams(window.location.search);
            const tab = urlParams.get('tab');

            // If tab is 'advanced', switch to the Advanced tab
            if (tab === 'advanced') {
                // Use jQuery to update the active tab
                jQuery('.tab').removeClass('active');
                jQuery('.form-container').removeClass('active');
                jQuery('.tab[data-target="#advanced"]').addClass('active');
                jQuery('#advanced').addClass('active');
            }
        });
    })();
</script>
</body>
</html>