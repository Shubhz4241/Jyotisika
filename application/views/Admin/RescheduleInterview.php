<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Profile</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rokkitt:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        * {
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
        }

        body {
            background-color: rgb(228, 236, 241);
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 5px;
        }

        .search-filter-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 40px 0;
            width: 100%;
        }

        .search-input-container {
            position: relative;
            flex-grow: 1;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            width: 18px;
            height: 18px;
        }

        .search-input {
            width: 70%;
            height: 40px;
            padding: 0 15px 0 45px;
            border-radius: 8px;
            border: 1px solid #7c7c77;
            background-color: rgba(124, 124, 124, 0.24);
            color: #000;
            font-size: 15px;
            outline: none;
        }

        .search-input::placeholder {
            color: #000;
            opacity: 1;
        }

        .dropdown-container {
            position: relative;
        }

        .dropdown-select {
            height: 40px;
            padding: 0 15px;
            border-radius: 5px;
            border: 1px solid #7c7c77;
            background-color: rgba(124, 124, 124, 0.24);
            color: #000;
            font-size: 15px;
            outline: none;
            width: 200px;
            cursor: pointer;
        }

        .tab-container {
            margin-top: 20px;
        }

        .nav-tabs {
            border-bottom: 2px solid #0C768A;
        }

        .nav-link {
            color: #333;
            font-weight: 700;
            padding: 10px 20px;
            border-radius: 5px 5px 0 0;
            background-color: #e0e0e0;
        }

        .nav-link.active {
            background: #0C768A;
            color: #333;
            border-bottom: none;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-top: 20px;
            border: 1px solid #e0e0e0;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        thead {
            background: #0C768A;
            color: #333;
            letter-spacing: 0.5px;
        }

        th {
            padding: 15px 20px;
            text-align: center;
            font-size: 1rem;
            color: white;
            border-bottom: 1px solid #eee;
        }

        td {
            padding: 15px 20px;
            text-align: center;
            font-size: 1rem;
            color: black;
            border-bottom: 1px solid #eee;
        }

        th {
            font-weight: 700;
            text-align: center;
            font-size: 1.1rem;
        }

        td {
            vertical-align: middle;
        }

        tbody tr:nth-child(odd) {
            background-color: #fafafa;
        }

        tbody tr:nth-child(even) {
            background-color: #ffffff;
        }

        tbody tr:hover {
            background-color: #f1f5f9;
            transition: background-color 0.3s ease;
        }

        .action-button {
            background-color: #0C768A;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 500;
            transition: background-color 0.3s ease, transform 0.2s ease;
            min-width: 100px;
            text-align: center;
        }

        .action-button:hover {
            background-color: #0C768A;
            transform: translateY(-2px);
        }

        .approve-btn {
            background-color: #8BC24A;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-right: 5px;
        }

        .approve-btn:hover {
            background-color: #7aa73f;
            transform: translateY(-2px);
        }

        .reject-btn {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .reject-btn:hover {
            background-color: #c82333;
            transform: translateY(-2px);
        }

        .availability-cell {
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            position: relative;
            cursor: pointer;
        }

        .availability-cell:hover .availability-tooltip {
            display: block;
        }

        .availability-tooltip {
            display: none;
            position: absolute;
            background-color: #333;
            color: #fff;
            padding: 8px;
            border-radius: 4px;
            font-size: 0.9rem;
            z-index: 10;
            top: -100%;
            left: 50%;
            transform: translateX(-50%);
            white-space: normal;
            max-width: 300px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        tbody tr {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            border: 3px solid #0C768A;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .popup-content h3 {
            margin: 0 0 20px;
            font-size: 1.5rem;
            text-align: center;
            color: #000;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 1.2rem;
            color: #000;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #7c7c77;
            background-color: rgba(124, 124, 119, 0.24);
            border-radius: 5px;
            font-size: 1rem;
            outline: none;
        }

        .form-group input:focus {
            border-color: #0C768A;
        }

        .error-message {
            color: red;
            font-size: 0.9rem;
            margin-top: 5px;
            display: none;
            border: 3px solid #0C768A;
        }

        .popup-buttons {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 20px;
        }

        .popup-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        .submit-btn {
            background-color: #0C768A;
            color: #fff;
        }

        .cancel-btn {
            background-color: #e0e0e0;
            color: #000;
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px 0;
            gap: 5px;
        }

        .pagination-button {
            background-color: #e0e0e0;
            border: 1px solid #ccc;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 14px;
            color: #000;
            line-height: 1;
        }

        .pagination-button.disabled {
            background-color: #e0e0e0;
            cursor: not-allowed;
            opacity: 0.5;
        }

        .pagination-info {
            font-size: 14px;
            color: #000;
            margin: 0 10px;
        }

        @media (max-width: 768px) {
            .search-filter-container {
                flex-direction: column;
                align-items: stretch;
            }

            .search-input {
                width: 100%;
            }

            .dropdown-select {
                width: 100%;
            }

            th,
            td {
                font-size: 0.85rem;
                padding: 12px 10px;
            }

            .action-button,
            .approve-btn,
            .reject-btn {
                padding: 6px 12px;
                font-size: 0.8rem;
                min-width: 80px;
            }

            .popup-content {
                width: 95%;
                padding: 15px;
            }

            .popup-content h3 {
                font-size: 1.2rem;
            }

            .form-group input {
                font-size: 0.9rem;
            }

            .popup-buttons button {
                font-size: 0.9rem;
                padding: 8px 15px;
            }

            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            .availability-cell {
                max-width: 150px;
            }

            .availability-tooltip {
                top: -120%;
                left: 0;
                transform: none;
                max-width: 200px;
            }
        }
    </style>
</head>

<body style="background-color:rgb(228, 236, 241);">
    <div class="d-flex">
        <?php $this->load->view('IncludeAdmin/CommanSideBar'); ?>

        <!-- Main Content -->
        <div class="main w-100">
            <!-- Navbar (Placeholder) -->
            <?php $this->load->view('IncludeAdmin/CommanNavBar'); ?>

            <div class="container">
                <!-- Search and Dropdown Bar -->
                <div class="search-filter-container">
                    <div class="search-input-container">
                        <img src="<?php echo base_url('assets/images/HRside/search.png') ?>" alt="Search" class="search-icon">
                        <input type="text" class="search-input" placeholder="Search By name" id="searchInput">
                    </div>
                    <div class="dropdown-container">
                        <select class="dropdown-select" id="userTypeFilter">
                            <option value="all">All</option>
                            <option value="astrologer">Astrologer</option>
                            <option value="pujari">Pujari</option>
                        </select>
                    </div>
                </div>

                <!-- Tabs -->
                <div class="tab-container">
                    <ul class="nav nav-tabs" id="requestTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="true">Pending Requests</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="scheduled-tab" data-bs-toggle="tab" data-bs-target="#scheduled" type="button" role="tab" aria-controls="scheduled" aria-selected="false">Scheduled Requests</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="requestTabContent">
                        <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Sr. no.</th>
                                            <th>Name</th>
                                            <th>Contact No</th>
                                            <th>Available Days & Time</th>
                                            <th>Date</th>
                                            <th>User Type</th>
                                            <th>New Service Requested</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="pendingTableBody">
                                        <?php
                                        $sr = 1;
                                        foreach ($services as $service) :
                                            if (strtolower($service['status']) === 'pending') :
                                        ?>
                                                <tr>
                                                    <td><?php echo $sr++; ?></td>
                                                    <td><?php echo $service['name']; ?></td>
                                                    <td><?php echo $service['contact']; ?></td>
                                                    <td><?php echo $service['available_day']; ?> - <?php echo $service['date']; ?></td>
                                                    <td><?php echo $service['date']; ?></td>
                                                    <td><?php echo $service['user_type']; ?></td>
                                                    <td><?php echo $service['status']; ?></td>
                                                    <td>
                                                        <button onclick="rescheduleInterview(<?php echo $service['id']; ?>, '<?php echo $service['user_type']; ?>')" class="action-button" title="Reschedule">Reschedule</button>
                                                    </td>
                                                </tr>
                                        <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                            <div class="pagination-container">
                                <button id="prevBtn" class="btn btn-sm" onclick="previousPage('pending')" style="background-color: #0c786a;">Previous</button>
                                <div id="pageNumbers" class="btn-group"></div>
                                <button id="nextBtn" class="btn btn-sm" onclick="nextPage('pending')" style="background-color: #0c786a;">Next</button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="scheduled" role="tabpanel" aria-labelledby="scheduled-tab">
                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Sr. no.</th>
                                            <th>Name</th>
                                            <th>Contact No</th>
                                            <th>Date</th>
                                            <th>User Type</th>
                                            <th>New Service Requested</th>
                                            <th>Meeting Link</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="scheduledTableBody">
                                        <!-- Data will be populated by JavaScript -->
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination-container" id="pagination">
                                <button class="btn btn-sm" id="prevScheduledPage" onclick="previousPage('scheduled')" style="background-color: #0c786a;">Previous</button>
                                <button class="btn btn-sm" id="nextScheduledPage" onclick="nextPage('scheduled')" style="background-color: #0c786a;">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Popup -->
            <div class="popup-overlay" id="reschedulePopup" style="display: none;">
                <div class="popup-content">
                    <h3>Schedule Meeting</h3>
                    <form id="rescheduleForm">
                        <input type="hidden" id="selectedServiceId" name="selectedServiceId">
                        <input type="hidden" id="userType" name="userType">
                        <div class="form-group">
                            <label for="meetingDate">Date</label>
                            <input type="date" id="meetingDate" name="meetingDate" required>
                            <div class="error-message" id="dateError"></div>
                        </div>
                        <div class="form-group">
                            <label for="meetingTime">Time</label>
                            <input type="time" id="meetingTime" name="meetingTime" required>
                            <div class="error-message" id="timeError">Please select a valid time.</div>
                        </div>
                        <div class="form-group">
                            <label for="meetingLink">Meeting Link</label>
                            <input type="url" id="meetingLink" name="meetingLink" placeholder="https://example.com" required>
                            <div class="error-message" id="linkError">Please enter a valid URL.</div>
                        </div>
                        <div class="popup-buttons">
                            <button type="button" class="cancel-btn" onclick="closePopup()">Cancel</button>
                            <button type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let selectedUserId = null;
        let isModalOpen = false;
        let scheduledPage = 1;
        const rowsPerPage = 10;

        // Function to open the reschedule popup
        function rescheduleInterview(serviceId = null, userType = null) {
            selectedUserId = serviceId;
            document.getElementById("selectedServiceId").value = serviceId || '';
            document.getElementById("userType").value = userType || '';
            document.getElementById("reschedulePopup").style.display = "flex";
            isModalOpen = true;
        }

        // Function to close the popup
        function closePopup() {
            document.getElementById("reschedulePopup").style.display = "none";
            isModalOpen = false;
            // Reset form
            document.getElementById("rescheduleForm").reset();
            selectedUserId = null;
        }

        // Form submission handler
        document.getElementById("rescheduleForm").addEventListener("submit", function(event) {
            event.preventDefault();

            const serviceId = document.getElementById("selectedServiceId").value;
            const meetingDate = document.getElementById("meetingDate").value;
            const meetingTime = document.getElementById("meetingTime").value;
            const meetingLink = document.getElementById("meetingLink").value;
            const userType = document.getElementById("userType").value;

            if (!meetingDate || !meetingTime || !meetingLink || !serviceId || !userType) {
                Swal.fire({
                    icon: "error",
                    title: "Validation Error",
                    text: "Please fill in all fields!"
                });
                return;
            }

            function isValidURL(str) {
                return /^(https?:\/\/)[^\s$.?#].[^\s]*$/.test(str);
            }

            if (!isValidURL(meetingLink)) {
                Swal.fire({
                    icon: "error",
                    title: "Invalid URL",
                    text: "Please enter a valid meeting link!"
                });
                return;
            }

            // Prepare data for API call
            const formData = {
                service_id: serviceId,
                meeting_date: meetingDate,
                meeting_time: meetingTime,
                meeting_link: meetingLink,
                user_type: userType,
                status: 'Rescheduled'
            };

            // Make API call to reschedule interview
            fetch('<?php echo base_url("Admin_API/RescheduleInterview"); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: "Interview scheduled successfully!"
                        }).then(() => {
                            closePopup();
                            location.reload(); // Reload page to reflect changes
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: data.message || "Failed to schedule interview!"
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "An error occurred while scheduling the interview!"
                    });
                });
        });

        // Function to populate scheduled table
        // Step 1: First check if basic elements exist
        function checkElements() {
            console.log("=== CHECKING ELEMENTS ===");

            const scheduledTableBody = document.getElementById("scheduledTableBody");
            const userTypeFilter = document.getElementById("userTypeFilter");
            const searchInput = document.getElementById("searchInput");
            const scheduledTab = document.getElementById("scheduled-tab");

            console.log("scheduledTableBody exists:", !!scheduledTableBody);
            console.log("userTypeFilter exists:", !!userTypeFilter);
            console.log("searchInput exists:", !!searchInput);
            console.log("scheduledTab exists:", !!scheduledTab);

            if (scheduledTableBody) {
                console.log("Table body HTML:", scheduledTableBody.innerHTML);
            }
        }

        // Step 2: Check if variables are defined
        function checkVariables() {
            console.log("=== CHECKING VARIABLES ===");
            console.log("scheduledPage:", typeof scheduledPage !== 'undefined' ? scheduledPage : 'undefined');
            console.log("rowsPerPage:", typeof rowsPerPage !== 'undefined' ? rowsPerPage : 'undefined');
        }

        // Step 3: Test API with detailed logging
        function testAPI() {
            console.log("=== TESTING API ===");
            console.log("API URL:", '<?php echo base_url("Admin_API/GetRescheduledServices"); ?>');

            fetch('<?php echo base_url("Admin_API/GetRescheduledServices"); ?>', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => {
                    console.log("API Response Status:", response.status);
                    console.log("API Response OK:", response.ok);
                    return response.text();
                })
                .then(text => {
                    console.log("API Raw Response:", text);
                    try {
                        const data = JSON.parse(text);
                        console.log("API Parsed Data:", data);
                    } catch (e) {
                        console.error("JSON Parse Error:", e);
                    }
                })
                .catch(error => {
                    console.error("API Fetch Error:", error);
                });
        }

        // Step 4: Simple test function to add data manually
        function testTablePopulation() {
            console.log("=== TESTING TABLE POPULATION ===");

            const scheduledTableBody = document.getElementById("scheduledTableBody");
            if (!scheduledTableBody) {
                console.error("Table body not found!");
                return;
            }

            // Clear existing content
            scheduledTableBody.innerHTML = '';


            testData.forEach((service, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
            <td>${index + 1}</td>
            <td>${service.name}</td>
            <td>${service.contact}</td>
            <td>${service.date}</td>
            <td>${service.user_type}</td>
            <td>${service.status}</td>
            <td><a href="${service.meeting_link}" target="_blank">Join Meeting</a></td>
            <td>
                <button onclick="rescheduleInterview(${service.id}, '${service.user_type}')" class="action-button">
                    Reschedule
                </button>
            </td>
        `;
                scheduledTableBody.appendChild(row);
            });

            console.log("Test data added to table");
        }

        // Step 5: Fixed populateScheduledTable with extensive logging
        function populateScheduledTable() {
            console.log("=== POPULATE SCHEDULED TABLE CALLED ===");

            const scheduledTableBody = document.getElementById("scheduledTableBody");
            if (!scheduledTableBody) {
                console.error("scheduledTableBody element not found!");
                return;
            }

            const userTypeFilter = document.getElementById("userTypeFilter").value;
            const searchQuery = document.getElementById("searchInput").value.toLowerCase();

            // Show loading
            scheduledTableBody.innerHTML = '<tr><td colspan="8" style="text-align: center;">Loading...</td></tr>';

            const apiUrl = '<?php echo base_url("Admin_API/GetRescheduledServices"); ?>';

            fetch(apiUrl, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    scheduledTableBody.innerHTML = '';

                    let services = [];
                    if (data && data.services && Array.isArray(data.services)) {
                        services = data.services;
                    } else if (data && data.data && Array.isArray(data.data)) {
                        services = data.data;
                    } else if (Array.isArray(data)) {
                        services = data;
                    }

                    if (services.length > 0) {
                        let filteredServices = services;

                        // Apply filters
                        if (userTypeFilter !== 'all') {
                            filteredServices = filteredServices.filter(service =>
                                service.user_type && service.user_type.toLowerCase() === userTypeFilter.toLowerCase()
                            );
                        }

                        if (searchQuery) {
                            filteredServices = filteredServices.filter(service =>
                                service.name && service.name.toLowerCase().includes(searchQuery)
                            );
                        }

                        // Pagination
                        const start = (scheduledPage - 1) * rowsPerPage;
                        const end = start + rowsPerPage;
                        const paginatedServices = filteredServices.slice(start, end);

                        paginatedServices.forEach((service, index) => {
                            const row = document.createElement('tr');

                            // Determine current status styling
                            let statusBadge = '';
                            if (service.status === 'Approved') {
                                statusBadge = '<span style="background: #28a745; color: white; padding: 4px 8px; border-radius: 4px; font-size: 12px;">Approved</span>';
                            } else if (service.status === 'Rejected') {
                                statusBadge = '<span style="background: #dc3545; color: white; padding: 4px 8px; border-radius: 4px; font-size: 12px;">Rejected</span>';
                            } else {
                                statusBadge = '<span style="background: #ffc107; color: black; padding: 4px 8px; border-radius: 4px; font-size: 12px;">Pending</span>';
                            }

                            row.innerHTML = `
                    <td>${start + index + 1}</td>
                    <td>${service.name || 'N/A'}</td>
                    <td>${service.contact || service.phone || 'N/A'}</td>
                    <td>${service.date || service.meeting_date || 'N/A'}</td>
                    <td>${service.user_type || 'N/A'}</td>
                    <td>${statusBadge}</td>
                    <td>
                        ${service.meeting_link ? 
                            `<a href="${service.meeting_link}" target="_blank" rel="noopener noreferrer" 
                               style="background: #007bff; color: white; padding: 6px 12px; border-radius: 4px; 
                                      text-decoration: none; font-size: 12px; display: inline-block;">
                                📹 Join Meeting
                            </a>` : 
                            '<span style="color: #6c757d;">No Link</span>'
                        }
                    </td>
                    <td>
                        <div style="display: flex; gap: 5px; align-items: center;">
                            ${service.status !== 'Approved' ? 
                                `<button onclick="updateServiceStatus(${service.id || service.service_id}, 'Approved', '${service.user_type || ''}')" 
                                        class="action-btn approve-btn" title="Approve" 
                                        style="background: #28a745; color: white; border: none; padding: 6px 8px; border-radius: 4px; cursor: pointer;">
                                    ✓
                                </button>` : ''
                            }
                            ${service.status !== 'Rejected' ? 
                                `<button onclick="updateServiceStatus(${service.id || service.service_id}, 'Rejected', '${service.user_type || ''}')" 
                                        class="action-btn reject-btn" title="Reject"
                                        style="background: #dc3545; color: white; border: none; padding: 6px 8px; border-radius: 4px; cursor: pointer;">
                                    ✗
                                </button>` : ''
                            }
                            
                        </div>
                    </td>
                `;
                            scheduledTableBody.appendChild(row);
                        });
                        // <button onclick="rescheduleInterview(${service.id || service.service_id}, '${service.user_type || ''}')" 
                        //                         class="action-btn reschedule-btn" title="Reschedule"
                        //                         style="background: #17a2b8; color: white; border: none; padding: 6px 8px; border-radius: 4px; cursor: pointer;">
                        //                     📅
                        //                 </button>
                        // Update pagination
                        updatePagination(filteredServices.length, 'scheduled');
                    } else {
                        scheduledTableBody.innerHTML = '<tr><td colspan="8" style="text-align: center;">No data found</td></tr>';
                        updatePagination(0, 'scheduled');
                    }
                })
                .catch(error => {
                    console.error("Error in populateScheduledTable:", error);
                    scheduledTableBody.innerHTML = `<tr><td colspan="8" style="text-align: center; color: red;">Error: ${error.message}</td></tr>`;
                });
        }

        // New function to update service status
        function updateServiceStatus(serviceId, status, userType) {
            console.log('Updating service status:', serviceId, status, userType);

            // Show confirmation dialog
            const confirmMessage = status === 'Approved' ?
                'Are you sure you want to approve this service?' :
                'Are you sure you want to reject this service?';

            Swal.fire({
                title: 'Confirm Action',
                text: confirmMessage,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: status === 'Approved' ? '#28a745' : '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: status === 'Approved' ? 'Yes, Approve' : 'Yes, Reject',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Prepare data for API call
                    const formData = {
                        service_id: serviceId,
                        status: status,
                        user_type: userType
                    };

                    // Make API call to update status
                    fetch('<?php echo base_url("Admin_API/UpdateServiceStatus"); ?>', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(formData)
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log('Update response:', data);

                            if (data.success || data.status === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: `Service ${status.toLowerCase()} successfully!`,
                                    timer: 2000,
                                    showConfirmButton: false
                                }).then(() => {
                                    // Refresh the table
                                    populateScheduledTable();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: data.message || `Failed to ${status.toLowerCase()} service!`
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Error updating status:', error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'An error occurred while updating the service status!'
                            });
                        });
                }
            });
        }

        // Add CSS styles for better button appearance
        const actionButtonStyles = `
<style>
.action-btn {
    font-size: 14px;
    font-weight: bold;
    transition: all 0.3s ease;
    min-width: 30px;
    height: 30px;
}

.action-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

.approve-btn:hover {
    background: #218838 !important;
}

.reject-btn:hover {
    background: #c82333 !important;
}

.reschedule-btn:hover {
    background: #138496 !important;
}

/* Meeting link button styles */
a[href*="meet"], a[href*="zoom"], a[href*="teams"] {
    transition: all 0.3s ease;
}

a[href*="meet"]:hover, a[href*="zoom"]:hover, a[href*="teams"]:hover {
    background: #0056b3 !important;
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
}
</style>
`;

        // Inject styles
        document.head.insertAdjacentHTML('beforeend', actionButtonStyles);
        // Step 6: Enhanced DOMContentLoaded with debugging
        document.addEventListener("DOMContentLoaded", function() {
            console.log("=== DOM CONTENT LOADED ===");

            // Run all checks
            checkElements();
            checkVariables();

            // Add click event to scheduled tab to trigger population
            const scheduledTab = document.getElementById("scheduled-tab");
            if (scheduledTab) {
                scheduledTab.addEventListener("click", function() {
                    console.log("Scheduled tab clicked");
                    setTimeout(() => {
                        populateScheduledTable();
                    }, 100);
                });
            }

            // Also try to populate immediately if scheduled tab is active
            setTimeout(() => {
                const scheduledPane = document.getElementById("scheduled");
                if (scheduledPane && scheduledPane.classList.contains("active")) {
                    console.log("Scheduled pane is active, populating table");
                    populateScheduledTable();
                }
            }, 500);

            console.log("Event listeners added");
        });

        // Step 7: Manual trigger functions (call these from console)
        function manualTest() {
            console.log("=== MANUAL TEST STARTED ===");
            checkElements();
            checkVariables();
            testAPI();
            testTablePopulation();
        }

        function forcePopulate() {
            console.log("=== FORCE POPULATE ===");
            populateScheduledTable();
        }

        // Also add this function to check if the API is working
        function testAPI() {
            fetch('<?php echo base_url("Admin_API/GetRescheduledServices"); ?>', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => {
                    console.log('Test API Response Status:', response.status);
                    return response.text(); // Get as text first to see raw response
                })
                .then(text => {
                    console.log('Test API Raw Response:', text);
                    try {
                        const data = JSON.parse(text);
                        console.log('Test API Parsed Data:', data);
                    } catch (e) {
                        console.error('Failed to parse JSON:', e);
                    }
                })
                .catch(error => {
                    console.error('Test API Error:', error);
                });
        }

        // Call this function to test your API
        // testAPI();
        // Function to update pagination
        function updatePagination(totalItems, tab) {
            const pageNumbers = document.getElementById('pageNumbers');
            const prevBtn = document.getElementById(tab === 'pending' ? 'prevBtn' : 'prevScheduledPage');
            const nextBtn = document.getElementById(tab === 'pending' ? 'nextBtn' : 'nextScheduledPage');
            const totalPages = Math.ceil(totalItems / rowsPerPage);

            pageNumbers.innerHTML = '';
            for (let i = 1; i <= totalPages; i++) {
                const btn = document.createElement('button');
                btn.className = 'btn btn-sm' + (i === (tab === 'pending' ? pendingPage : scheduledPage) ? ' active' : '');
                btn.textContent = i;
                btn.onclick = () => {
                    if (tab === 'pending') pendingPage = i;
                    else scheduledPage = i;
                    if (tab === 'pending') populatePendingTable();
                    else populateScheduledTable();
                };
                pageNumbers.appendChild(btn);
            }

            prevBtn.disabled = (tab === 'pending' ? pendingPage : scheduledPage) === 1;
            nextBtn.disabled = (tab === 'pending' ? pendingPage : scheduledPage) === totalPages;
        }

        // Pagination navigation
        function previousPage(tab) {
            if (tab === 'pending' && pendingPage > 1) {
                pendingPage--;
                populatePendingTable();
            } else if (tab === 'scheduled' && scheduledPage > 1) {
                scheduledPage--;
                populateScheduledTable();
            }
        }

        function nextPage(tab) {
            if (tab === 'pending') {
                pendingPage++;
                populatePendingTable();
            } else if (tab === 'scheduled') {
                scheduledPage++;
                populateScheduledTable();
            }
        }

        function updateInterviewStatus(interviewId, status, serviceId, userType) {
            Swal.fire({
                icon: "success",
                title: "Success",
                text: "Interview status updated successfully!"
            }).then(() => {
                populatePendingTable();
            });
        }

        document.addEventListener("DOMContentLoaded", () => {
            populatePendingTable();
            populateScheduledTable();

            const filterElement = document.getElementById("userTypeFilter");
            if (filterElement) {
                filterElement.addEventListener("change", () => {
                    pendingPage = 1;
                    scheduledPage = 1;
                    populatePendingTable();
                    populateScheduledTable();
                });
            }

            const searchInput = document.getElementById("searchInput");
            if (searchInput) {
                searchInput.addEventListener("input", () => {
                    pendingPage = 1;
                    scheduledPage = 1;
                    populatePendingTable();
                    populateScheduledTable();
                });
            }
        });

        const toggler = document.querySelector(".toggler-btn");
        const closeBtn = document.querySelector(".close-sidebar");
        const sidebar = document.querySelector("#sidebar");

        if (toggler) {
            toggler.addEventListener("click", function() {
                sidebar.classList.toggle("collapsed");
            });
        }

        if (closeBtn) {
            closeBtn.addEventListener("click", function() {
                sidebar.classList.remove("collapsed");
            });
        }
    </script>

    <style>
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .popup-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .popup-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        .cancel-btn {
            background: #6c757d;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .popup-buttons button[type="submit"] {
            background: #0c786a;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }

        .btn-group .btn {
            margin: 0 5px;
        }

        .btn-group .btn.active {
            background-color: #0c786a;
            color: white;
        }
    </style>
</body>

</html>