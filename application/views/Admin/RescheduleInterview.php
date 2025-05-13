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
            border-bottom: 2px solid  #0C768A;
        }

        .nav-link {
            color: #333;
            font-weight: 700;
            padding: 10px 20px;
            border-radius: 5px 5px 0 0;
            background-color: #e0e0e0;
        }

        .nav-link.active {
            background:  #0C768A;
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
            background:  #0C768A;
            color: #333;
            letter-spacing: 0.5px;
        }

        th
     {
            padding: 15px 20px;
            text-align: center;
            font-size: 1rem;
            color: white;
            border-bottom: 1px solid #eee;
        }
td{
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
            background-color:  #0C768A;
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
            background-color:  #0C768A;
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
            border: 3px solid  #0C768A;
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
            border-color:  #0C768A;
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
            background-color:  #0C768A;
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
                        <img src="<?php echo base_url('assets/images/HRside/search.png')?>" alt="Search" class="search-icon">
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
                                        <!-- Static Data -->
                                        <tr>
                                            <td>John Doe</td>
                                            <td>1234567890</td>
                                            <td>Mon, Tue, Wed</td>
                                            <td>2023-10-01</td>
                                            <td>Astrologer</td>
                                            <td>New Service</td>
                                            <td>
                                                <button onclick="rescheduleInterview('1', 'astrologer', '1')" class="btn btn-primary" title="Reschedule">Reschedule</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jane Smith</td>
                                            <td>0987654321</td>
                                            <td>Thu, Fri, Sat</td>
                                            <td>2023-10-02</td>
                                            <td>Pujari</td>
                                            <td>New Service</td>
                                            <td>
                                                <button onclick="rescheduleInterview('2', 'pujari', '2')" class="btn btn-primary" title="Reschedule">Reschedule</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination-container">
                                <button id="prevBtn" class="btn btn-sm" onclick="previousPage()" style="background-color: #0c786a;">Previous</button>
                                <div id="pageNumbers" class="btn-group"></div>
                                <button id="nextBtn" class="btn btn-sm" onclick="nextPage()" style="background-color: #0c786a;">Next</button>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="scheduled" role="tabpanel" aria-labelledby="scheduled-tab">
                            <div class="table-container">
                                <table>
                                    <thead>
                                        <tr>
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
                                        <!-- Static Data -->
                                        <tr>
                                            <td>John Doe</td>
                                            <td>1234567890</td>
                                            <td>2023-10-03</td>
                                            <td>Astrologer</td>
                                            <td>New Service</td>
                                            <td>
                                                <a href="https://example.com" target="_blank" class="btn btn-info">Join Meeting</a>
                                            </td>
                                            <td>
                                                <button onclick="updateInterviewStatus('1', 'approved', '1', 'astrologer')" class="btn icon-btn" title="Approve">✅</button>
                                                <button onclick="updateInterviewStatus('1', 'rejected', '1', 'astrologer')" class="btn icon-btn" title="Reject">❌</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jane Smith</td>
                                            <td>0987654321</td>
                                            <td>2023-10-04</td>
                                            <td>Pujari</td>
                                            <td>New Service</td>
                                            <td>
                                                <a href="https://example.com" target="_blank" class="btn btn-info">Join Meeting</a>
                                            </td>
                                            <td>
                                                <button onclick="updateInterviewStatus('2', 'approved', '2', 'pujari')" class="btn icon-btn" title="Approve">✅</button>
                                                <button onclick="updateInterviewStatus('2', 'rejected', '2', 'pujari')" class="btn icon-btn" title="Reject">❌</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination-container" id="pagination">
                                <button class="btn btn-sm" id="prevScheduledPage" onclick="previousPage('scheduled')" style="background-color: #0c786a;">
                                    Previous </button>
                                <button class="btn btn-sm" id="nextScheduledPage" onclick="nextPage('scheduled')" style="background-color: #0c786a;">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Popup -->
            <div class="popup-overlay" id="reschedulePopup">
                <div class="popup-content">
                    <h3>Schedule Meeting</h3>
                    <form id="rescheduleForm">
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
        let pendingPage = 1;
        let scheduledPage = 1;
        let rowsPerPage = 5;

        function populatePendingTable() {
            const tableBody = document.getElementById("pendingTableBody");
            tableBody.innerHTML = "";

            const staticData = [
                { name: "John Doe", contact: "1234567890", availability: "Mon, Tue, Wed", date: "2023-10-01", userType: "Astrologer", newServiceRequested: "New Service", id: "1", service_id: "1" },
                { name: "Jane Smith", contact: "0987654321", availability: "Thu, Fri, Sat", date: "2023-10-02", userType: "Pujari", newServiceRequested: "New Service", id: "2", service_id: "2" }
            ];

            let start = (pendingPage - 1) * rowsPerPage;
            let end = start + rowsPerPage;
            let paginatedData = staticData.slice(start, end);

            paginatedData.forEach((item) => {
                const row = `
                <tr>
                    <td>${item.name}</td>
                    <td>${item.contact}</td>
                    <td>${item.availability}</td>
                    <td>${item.date}</td>
                    <td>${item.userType}</td>
                    <td>${item.newServiceRequested}</td>
                    <td>
                        <button onclick="rescheduleInterview('${item.id}', '${item.userType}', '${item.service_id}')" class="btn btn-primary" title="Reschedule">Reschedule</button>
                    </td>
                </tr>`;
                tableBody.innerHTML += row;
            });

            updatePagination('pending', staticData.length);
        }

        function populateScheduledTable() {
            const tableBody = document.getElementById("scheduledTableBody");
            tableBody.innerHTML = "";

            const staticData = [
                { name: "John Doe", contact: "1234567890", date: "2023-10-03", userType: "Astrologer", newServiceRequested: "New Service", meetingLink: "https://example.com", id: "1", service_id: "1" },
                { name: "Jane Smith", contact: "0987654321", date: "2023-10-04", userType: "Pujari", newServiceRequested: "New Service", meetingLink: "https://example.com", id: "2", service_id: "2" }
            ];

            let start = (scheduledPage - 1) * rowsPerPage;
            let end = start + rowsPerPage;
            let paginatedData = staticData.slice(start, end);

            paginatedData.forEach((item) => {
                const row = `
                <tr>
                    <td>${item.name}</td>
                    <td>${item.contact}</td>
                    <td>${item.date}</td>
                    <td>${item.userType}</td>
                    <td>${item.newServiceRequested}</td>
                    <td>
                        <a href="${item.meetingLink}" target="_blank" class="btn btn-info">Join Meeting</a>
                    </td>
                    <td>
                        <button onclick="updateInterviewStatus('${item.id}', 'approved', '${item.service_id}', '${item.userType}')" class="btn icon-btn" title="Approve">✅</button>
                        <button onclick="updateInterviewStatus('${item.id}', 'rejected', '${item.service_id}', '${item.userType}')" class="btn icon-btn" title="Reject">❌</button>
                    </td>
                </tr>`;
                tableBody.innerHTML += row;
            });

            updatePagination('scheduled', staticData.length);
        }

        function updatePagination(type, totalRows) {
            const prevBtn = document.getElementById(type === 'pending' ? "prevBtn" : "prevScheduledPage");
            const nextBtn = document.getElementById(type === 'pending' ? "nextBtn" : "nextScheduledPage");
            const paginationInfo = document.getElementById(type === 'pending' ? "pageNumbers" : "scheduledPaginationInfo");

            let totalPages = Math.ceil(totalRows / rowsPerPage);
            let currentPage = type === 'pending' ? pendingPage : scheduledPage;

            paginationInfo.innerHTML = `Page ${currentPage} of ${totalPages}`;

            prevBtn.disabled = currentPage <= 1;
            nextBtn.disabled = currentPage >= totalPages || totalPages === 0;
        }

        function previousPage(type) {
            if (type === 'pending' && pendingPage > 1) {
                pendingPage--;
                populatePendingTable();
            } else if (type === 'scheduled' && scheduledPage > 1) {
                scheduledPage--;
                populateScheduledTable();
            }
        }

        function nextPage(type) {
            let totalPages = Math.ceil((type === 'pending' ? pendingData.length : scheduledData.length) / rowsPerPage);

            if (type === 'pending' && pendingPage < totalPages) {
                pendingPage++;
                populatePendingTable();
            } else if (type === 'scheduled' && scheduledPage < totalPages) {
                scheduledPage++;
                populateScheduledTable();
            }
        }

        let selectedUserType = null;
        let selectedUserId = null;
        let selectedServiceId = null;

        let isModalOpen = false;

        function rescheduleInterview(id, userType, serviceId) {
            if (isModalOpen) return; // Prevent opening if the modal is already open

            if (!id || !userType || !serviceId) {
                console.warn("Invalid reschedule data", {
                    id,
                    userType,
                    serviceId
                });
                return;
            }

            selectedUserType = userType;
            selectedUserId = id;
            selectedServiceId = serviceId;

            isModalOpen = true;
            document.getElementById("reschedulePopup").style.display = "flex";
        }

        function closePopup() {
            document.getElementById("reschedulePopup").style.display = "none";
            isModalOpen = false; // Reset modal state
        }

        document.addEventListener("DOMContentLoaded", () => {
            populatePendingTable();
            populateScheduledTable();

            const filterElement = document.getElementById("userTypeFilter");
            if (filterElement) {
                filterElement.addEventListener("change", () => {
                    // Reload and re-filter data
                    populatePendingTable();
                    populateScheduledTable();
                });
            }
        });
    </script>

    <script>
        document.getElementById("rescheduleForm").addEventListener("submit", function(event) {
            event.preventDefault();

            const meetingDate = document.getElementById("meetingDate").value;
            const meetingTime = document.getElementById("meetingTime").value;
            const meetingLink = document.getElementById("meetingLink").value;

            const scheduledAt = `${meetingDate} ${meetingTime}`;

            if (!meetingDate || !meetingTime || !meetingLink || !selectedUserId) {
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

            Swal.fire({
                icon: "success",
                title: "Success",
                text: "Interview scheduled successfully!"
            }).then(() => {
                closePopup();
                populatePendingTable();
            });
        });

        function updateInterviewStatus(interviewId, status, serviceId, userType) {
            Swal.fire({
                icon: "success",
                title: "Success",
                text: "Interview status updated successfully!"
            }).then(() => {
                populatePendingTable();
            });
        }
    </script>
<script>
        const toggler = document.querySelector(".toggler-btn");
        const closeBtn = document.querySelector(".close-sidebar");
        const sidebar = document.querySelector("#sidebar");

        toggler.addEventListener("click", function() {
            sidebar.classList.toggle("collapsed");
        });

        closeBtn.addEventListener("click", function() {
            sidebar.classList.remove("collapsed");
        });
    </script>
</body>

</html>
