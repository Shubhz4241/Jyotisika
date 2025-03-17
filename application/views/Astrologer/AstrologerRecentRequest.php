<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astrologer Recent Request</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.6/sweetalert2.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: "Montserrat", serif;
            overflow: visible !important;
        }
        .table th {
            background-color: #8BC24A;
            color: white;
            text-align: center;
            border: 1px solid #ddd;
        }
        .table td {
            vertical-align: middle;
            border: 1px solid #ddd;
        }
        .filter-btn {
            display: flex;
            justify-content: end;
            margin-bottom: 15px;
        }
        .approve-btn .bi-check-lg {
            color: #6c757d; /* Default gray color */
        }
        .approve-btn.approved .bi-check-lg {
            color: #28a745; /* Green color for approved tick */
        }
        .approve-btn.approved {
            border: 2px solid #28a745; /* Thicker green border for approved */
            background-color: rgba(40, 167, 69, 0.1); /* Light green background */
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5); /* Subtle green shadow */
        }
        .status-col {
            display: none; /* Hidden by default */
        }
        .status-filter-active .status-col {
            display: table-cell; /* Show when status filter is active */
        }
        .action-col {
            display: table-cell; /* Always show action column unless overridden by JS */
        }
        .dropdown-menu {
            min-width: 200px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .filter-section {
            margin-bottom: 10px;
        }
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch; /* Smooth scrolling on mobile */
        }
        @media (max-width: 768px) {
            .table {
                font-size: 14px;
            }
            .btn-sm {
                padding: 4px 8px;
                font-size: 12px;
            }
            .dropdown-menu {
                min-width: 180px;
            }
            .filter-btn {
                justify-content: center;
            }
        }
        @media (max-width: 576px) {
            .table {
                font-size: 12px;
            }
            .dropdown-menu {
                min-width: 160px;
            }
            .filter-btn {
                justify-content: center;
            }
            .btn-sm {
                padding: 2px 6px;
                font-size: 10px;
            }
        }
    </style>
</head>

<body>
<header>
    <?php $this->load->view('Astrologer/Include/AstrologerNav') ?>
</header>
<div style="min-height: 100vh;">
<div class="container mt-5">
    <div class="d-flex justify-content-between pt-4 flex-column flex-md-row">
        <h5 class="mb-4">Recent Request</h5>
        <div class="filter-btn">
            <button class="btn btn-outline-secondary">
                <i class="bi bi-funnel"></i> Filter By
            </button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="puja-table">
            <thead id="puja-table-header">
                <tr>
                    <th>Name</th>
                    <th>Consultation</th>
                    <th>Mode</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Address</th>
                    <th class="action-col">Action</th>
                    <th class="status-col">Status</th>
                </tr>
            </thead>
            <tbody id="puja-table-body"></tbody>
        </table>
    </div>

    <!-- Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center" id="pagination"></ul>
    </nav>
</div>
</div>
<footer>
    <?php $this->load->view('Astrologer/Include/AstrologerFooter') ?>  
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.6/sweetalert2.all.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const tableHeader = document.querySelector("#puja-table-header");
        const tableBody = document.querySelector("#puja-table-body");
        const paginationContainer = document.querySelector("#pagination");
        const filterButton = document.querySelector(".filter-btn button");
        let currentPage = 1;
        const itemsPerPage = 10;
        let filterDropdown;
        let selectedModes = [];
        let selectedStatuses = [];
        let selectedConsultations = [];

        // Validation: Check if table elements exist
        if (!tableHeader || !tableBody || !paginationContainer || !filterButton) {
            console.error("Error: One or more table elements are missing.");
            return;
        }

        // Load dummy data with corrected Consultation values
        function loadDummyData() {
            const dummyData = [
                { name: "Rahul Sharma", Consultation: "Vedic", Mode: "Online", date: "2025-03-01", time: "09:00 AM", address: "Viman Nagar, Pune", status: "Pending" },
                { name: "Sneha Gupta", Consultation: "Vedic", Mode: "Online", date: "2025-03-02", time: "10:30 AM", address: "Andheri, Mumbai", status: "Pending" },
                { name: "Anita Rao", Consultation: "Vastu", Mode: "Offline", date: "2025-03-16", time: "09:00 AM", address: "Shivaji Nagar, Pune", status: "Pending" },
                { name: "Ajay Verma", Consultation: "Kundli", Mode: "Online", date: "2025-03-31", time: "09:00 AM", address: "Pune", status: "Pending" },
                { name: "Shalini Gupta", Consultation: "Kundli", Mode: "Online", date: "2025-04-15", time: "09:00 AM", address: "Pune", status: "Pending" },
                { name: "Manoj Desai", Consultation: "Vedic", Mode: "Online", date: "2025-03-05", time: "11:00 AM", address: "Borivali, Mumbai", status: "Pending" },
                { name: "Meena Khanna", Consultation: "Vastu", Mode: "Offline", date: "2025-03-07", time: "03:00 PM", address: "Kothrud, Pune", status: "Pending" },
                { name: "Ramesh Iyer", Consultation: "Kundli", Mode: "Online", date: "2025-03-10", time: "01:30 PM", address: "Nashik", status: "Pending" },
                { name: "Priya Jain", Consultation: "Vastu", Mode: "Offline", date: "2025-03-12", time: "04:00 PM", address: "Dadar, Mumbai", status: "Pending" },
                { name: "Suresh Kumar", Consultation: "Kundli", Mode: "Online", date: "2025-03-18", time: "10:00 AM", address: "Pune", status: "Pending" },
                { name: "Pooja Nair", Consultation: "Vedic", Mode: "Offline", date: "2025-03-20", time: "02:00 PM", address: "Thane", status: "Pending" },
                { name: "Vikas Malhotra", Consultation: "Vastu", Mode: "Online", date: "2025-03-22", time: "09:30 AM", address: "Aurangabad", status: "Pending" },
                { name: "Amit Sharma", Consultation: "Kundli", Mode: "Offline", date: "2025-03-25", time: "12:00 PM", address: "Colaba, Mumbai", status: "Pending" },
                { name: "Ritika Das", Consultation: "Vastu", Mode: "Online", date: "2025-03-28", time: "08:30 AM", address: "Bandra, Mumbai", status: "Pending" },
                { name: "Nitin Tiwari", Consultation: "Vedic", Mode: "Offline", date: "2025-04-01", time: "11:30 AM", address: "Mulund, Mumbai", status: "Pending" },
                { name: "Kavita Rao", Consultation: "Kundli", Mode: "Online", date: "2025-04-05", time: "05:00 PM", address: "Nagpur", status: "Pending" },
                { name: "Rohan Patil", Consultation: "Vedic", Mode: "Offline", date: "2025-04-07", time: "07:00 PM", address: "Pimpri-Chinchwad", status: "Pending" },
                { name: "Sonali Mehta", Consultation: "Vastu", Mode: "Online", date: "2025-04-09", time: "06:30 PM", address: "Hyderabad", status: "Pending" },
                { name: "Sameer Joshi", Consultation: "Kundli", Mode: "Offline", date: "2025-04-12", time: "03:45 PM", address: "Chennai", status: "Pending" },
                { name: "Deepak Agarwal", Consultation: "Vastu", Mode: "Online", date: "2025-04-15", time: "10:15 AM", address: "Kolkata", status: "Pending" },
                { name: "Neha Singh", Consultation: "Vedic", Mode: "Online", date: "2025-04-18", time: "02:00 PM", address: "Delhi", status: "Pending" },
                { name: "Vivek Patel", Consultation: "Kundli", Mode: "Offline", date: "2025-04-20", time: "11:00 AM", address: "Ahmedabad", status: "Pending" },
                { name: "Lakshmi Menon", Consultation: "Vastu", Mode: "Online", date: "2025-04-22", time: "09:00 AM", address: "Bangalore", status: "Pending" },
                { name: "Arjun Reddy", Consultation: "Vedic", Mode: "Offline", date: "2025-04-25", time: "03:30 PM", address: "Hyderabad", status: "Pending" },
                { name: "Divya Kapoor", Consultation: "Kundli", Mode: "Online", date: "2025-04-28", time: "10:00 AM", address: "Jaipur", status: "Pending" },
                { name: "Sanjay Bhatt", Consultation: "Vastu", Mode: "Offline", date: "2025-05-01", time: "04:00 PM", address: "Surat", status: "Pending" },
                { name: "Kiran Joshi", Consultation: "Vedic", Mode: "Online", date: "2025-05-03", time: "08:30 AM", address: "Lucknow", status: "Pending" },
                { name: "Riya Sen", Consultation: "Kundli", Mode: "Offline", date: "2025-05-05", time: "01:00 PM", address: "Kanpur", status: "Pending" },
                { name: "Vikram Oberoi", Consultation: "Vastu", Mode: "Online", date: "2025-05-07", time: "11:30 AM", address: "Chandigarh", status: "Pending" },
                { name: "Pallavi Dutta", Consultation: "Vedic", Mode: "Offline", date: "2025-05-10", time: "02:45 PM", address: "Guwahati", status: "Pending" }
            ];
            // Reset localStorage to avoid persistent approval
            localStorage.removeItem("pujaRequests");
            if (!localStorage.getItem("pujaRequests")) {
                localStorage.setItem("pujaRequests", JSON.stringify(dummyData));
            } else if (!Array.isArray(JSON.parse(localStorage.getItem("pujaRequests")))) {
                console.error("Error: Stored data is not an array.");
                localStorage.setItem("pujaRequests", JSON.stringify(dummyData));
            }
        }

        // Load table with pagination and filters
        function loadTable(page) {
            const storedData = JSON.parse(localStorage.getItem("pujaRequests")) || [];
            if (!Array.isArray(storedData)) {
                console.error("Error: Stored data is not an array.");
                return;
            }

            let filteredData = [...storedData]; // Create a copy to avoid mutating original data

            // Apply combined filters
            if (selectedModes.length > 0 || selectedStatuses.length > 0 || selectedConsultations.length > 0) {
                filteredData = filteredData.filter(data => {
                    const modeMatch = selectedModes.length === 0 || selectedModes.includes(data.Mode.toLowerCase());
                    const statusMatch = selectedStatuses.length === 0 || selectedStatuses.includes(data.status.toLowerCase());
                    const consultationMatch = selectedConsultations.length === 0 || 
                        selectedConsultations.some(consult => data.Consultation.toLowerCase().includes(consult));
                    return modeMatch && statusMatch && consultationMatch;
                });
            }

            // Dynamically update table header based on filter
            let headerHTML = `
                <tr>
                    <th>Name</th>
                    <th>Consultation</th>
                    <th>Mode</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Address</th>`;
            if (selectedStatuses.length === 0 || selectedStatuses.length > 1) {
                headerHTML += `<th class="action-col">Action</th>`;
            }
            headerHTML += `<th class="status-col">Status</th>
                </tr>`;
            tableHeader.innerHTML = headerHTML;

            // Toggle table class based on status filter
            tableHeader.parentElement.className = filteredData.length > 0 ? 
                (selectedStatuses.length > 0 ? "table table-bordered status-filter-active" : "table table-bordered") : 
                "table table-bordered";

            // Load table body
            tableBody.innerHTML = "";
            let start = (page - 1) * itemsPerPage;
            let end = start + itemsPerPage;
            let paginatedItems = filteredData.slice(start, end);

            if (paginatedItems.length === 0 && filteredData.length > 0) {
                console.warn("Warning: No items on this page. Adjusting page number.");
                currentPage = Math.max(1, Math.ceil(filteredData.length / itemsPerPage));
                loadTable(currentPage);
                return;
            }

            paginatedItems.forEach((data, index) => {
                let globalIndex = storedData.indexOf(data);
                let row = `<tr class="clickable-row" data-index="${globalIndex}">
                    <td>${data.name}</td>
                    <td>${data.Consultation || 'N/A'}</td>
                    <td>${data.Mode}</td>
                    <td>${data.date}</td>
                    <td>${data.time}</td>
                    <td>${data.address}</td>`;
                // Include Action column only if no single status filter is applied
                if (selectedStatuses.length === 0 || selectedStatuses.length > 1) {
                    row += `<td class="action-col">
                        <button class="btn btn-outline-success btn-sm approve-btn ${data.status === 'Approved' ? 'approved' : ''}" data-index="${globalIndex}">
                            <i class="bi bi-check-lg"></i>
                        </button>
                        <button class="btn btn-outline-danger btn-sm delete-btn" data-index="${globalIndex}">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </td>`;
                }
                row += `<td class="status-col">${data.status}</td>
                </tr>`;
                tableBody.innerHTML += row;
            });

            // Add click event to rows
            document.querySelectorAll(".clickable-row").forEach(row => {
                row.addEventListener("click", function (e) {
                    if (!e.target.closest(".approve-btn") && !e.target.closest(".delete-btn")) {
                        const index = this.dataset.index;
                        const selectedData = storedData[index];
                        if (selectedData) {
                            localStorage.setItem("selectedChatUser", JSON.stringify(selectedData));
                            window.location.href = "AstrologerChatUI"; // Adjust the URL as per your file structure
                        } else {
                            console.error("Error: Selected data is undefined.");
                        }
                    }
                });
            });

            updatePagination(page, filteredData.length);
        }

        // Update pagination
        function updatePagination(activePage, totalItems) {
            let totalPages = Math.ceil(totalItems / itemsPerPage);
            paginationContainer.innerHTML = `
                <li class="page-item ${activePage === 1 ? "disabled" : ""}">
                    <a class="page-link" href="#" id="prevPage">Previous</a>
                </li>`;

            for (let i = 1; i <= totalPages; i++) {
                if (i <= 2 || i > totalPages - 2 || i === activePage) {
                    paginationContainer.innerHTML += `
                        <li class="page-item ${i === activePage ? "active" : ""}">
                            <a class="page-link page-number" href="#" data-page="${i}">${i}</a>
                        </li>`;
                } else if (i === 3 && activePage < 3) {
                    paginationContainer.innerHTML += `
                        <li class="page-item"><a class="page-link" href="#">...</a></li>`;
                }
            }

            paginationContainer.innerHTML += `
                <li class="page-item ${activePage === totalPages ? "disabled" : ""}">
                    <a class="page-link" href="#" id="nextPage">Next</a>
                </li>`;

            attachPaginationListeners();
        }

        function attachPaginationListeners() {
            document.querySelectorAll(".page-number").forEach(pageBtn => {
                pageBtn.addEventListener("click", function (event) {
                    event.preventDefault();
                    currentPage = parseInt(this.dataset.page);
                    loadTable(currentPage);
                });
            });

            document.getElementById("prevPage")?.addEventListener("click", function (event) {
                event.preventDefault();
                if (currentPage > 1) {
                    currentPage--;
                    loadTable(currentPage);
                }
            });

            document.getElementById("nextPage")?.addEventListener("click", function (event) {
                event.preventDefault();
                const storedData = JSON.parse(localStorage.getItem("pujaRequests")) || [];
                let filteredData = [...storedData];

                if (selectedModes.length > 0 || selectedStatuses.length > 0 || selectedConsultations.length > 0) {
                    filteredData = filteredData.filter(data => {
                        const modeMatch = selectedModes.length === 0 || selectedModes.includes(data.Mode.toLowerCase());
                        const statusMatch = selectedStatuses.length === 0 || selectedStatuses.includes(data.status.toLowerCase());
                        const consultationMatch = selectedConsultations.length === 0 || 
                            selectedConsultations.some(consult => data.Consultation.toLowerCase().includes(consult));
                        return modeMatch && statusMatch && consultationMatch;
                    });
                }

                if ((currentPage * itemsPerPage) < filteredData.length) {
                    currentPage++;
                    loadTable(currentPage);
                }
            });
        }

        // Approve and Delete functionality
        tableBody.addEventListener("click", function (event) {
            if (event.target.closest(".approve-btn")) {
                const indexToApprove = event.target.closest(".approve-btn").dataset.index;
                let storedData = JSON.parse(localStorage.getItem("pujaRequests")) || [];
                if (indexToApprove >= 0 && indexToApprove < storedData.length) {
                    // Check if already approved
                    if (storedData[indexToApprove].status === "Approved") {
                        Swal.fire({
                            title: "Already Accepted!",
                            text: "This request has already been accepted.",
                            icon: "info",
                            confirmButtonColor: "#28a745"
                        });
                        return;
                    }
                    // Check if already rejected
                    if (storedData[indexToApprove].status === "Rejected") {
                        Swal.fire({
                            title: "Cannot Approve!",
                            text: "This request has already been rejected.",
                            icon: "error",
                            confirmButtonColor: "#d33"
                        });
                        return;
                    }
                    // Approve the request
                    storedData[indexToApprove].status = "Approved";
                    localStorage.setItem("pujaRequests", JSON.stringify(storedData));
                    event.target.closest(".approve-btn").classList.add("approved");
                    Swal.fire({
                        title: "Approved!",
                        text: "The request has been approved successfully.",
                        icon: "success",
                        confirmButtonColor: "#28a745"
                    });
                    loadTable(currentPage); // Refresh table to reflect changes
                } else {
                    console.error("Error: Invalid index for approval.");
                }
            }

            if (event.target.closest(".delete-btn")) {
                const indexToDelete = event.target.closest(".delete-btn").dataset.index;
                let storedData = JSON.parse(localStorage.getItem("pujaRequests")) || [];
                if (indexToDelete >= 0 && indexToDelete < storedData.length) {
                    // Check if already rejected
                    if (storedData[indexToDelete].status === "Rejected") {
                        Swal.fire({
                            title: "Already Rejected!",
                            text: "This request has already been rejected.",
                            icon: "info",
                            confirmButtonColor: "#d33"
                        });
                        return;
                    }
                    // Check if already approved
                    if (storedData[indexToDelete].status === "Approved") {
                        Swal.fire({
                            title: "Cannot Reject!",
                            text: "This request has already been approved.",
                            icon: "error",
                            confirmButtonColor: "#28a745"
                        });
                        return;
                    }
                    // Reject the request
                    Swal.fire({
                        title: "Are you sure?",
                        text: "Do you want to reject this request?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#6c757d",
                        confirmButtonText: "Yes, Reject"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            storedData[indexToDelete].status = "Rejected";
                            localStorage.setItem("pujaRequests", JSON.stringify(storedData));
                            Swal.fire({
                                title: "Rejected!",
                                text: "The request has been rejected successfully.",
                                icon: "error",
                                confirmButtonColor: "#d33"
                            });
                            loadTable(currentPage);
                        }
                    });
                } else {
                    console.error("Error: Invalid index for deletion.");
                }
            }
        });

        // Filter functionality with checkboxes
        function createFilterDropdown() {
            filterDropdown = document.createElement("div");
            filterDropdown.classList.add("dropdown-menu", "show");
            filterDropdown.innerHTML = `
                <div class="filter-section">
                    <h6 class="dropdown-header">Filter by Mode</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="mode-online" value="online">
                        <label class="form-check-label" for="mode-online">Online</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="mode-offline" value="offline">
                        <label class="form-check-label" for="mode-offline">Offline</label>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="filter-section">
                    <h6 class="dropdown-header">Filter by Status</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="filter-accept" value="approved">
                        <label class="form-check-label" for="filter-accept">Accept</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="filter-reject" value="rejected">
                        <label class="form-check-label" for="filter-reject">Reject</label>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="filter-section">
                    <h6 class="dropdown-header">Filter by Consultation</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="consultation-vastu" value="vastu">
                        <label class="form-check-label" for="consultation-vastu">Vastu</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="consultation-vedic" value="vedic">
                        <label class="form-check-label" for="consultation-vedic">Vedic</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="consultation-kundli" value="kundli">
                        <label class="form-check-label" for="consultation-kundli">Kundli</label>
                    </div>
                </div>
            `;
            document.body.appendChild(filterDropdown);

            const rect = filterButton.getBoundingClientRect();
            filterDropdown.style.position = "absolute";
            filterDropdown.style.top = `${rect.bottom}px`;
            filterDropdown.style.left = `${rect.left}px`;

            // Add event listeners to checkboxes
            filterDropdown.querySelectorAll('.form-check-input').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    updateFilters();
                    currentPage = 1;
                    loadTable(currentPage);
                });
            });
        }

        // Update selected filters
        function updateFilters() {
            selectedModes = Array.from(filterDropdown.querySelectorAll('input[id^="mode-"]:checked'))
                .map(checkbox => checkbox.value);
            selectedStatuses = Array.from(filterDropdown.querySelectorAll('input[id^="filter-"]:checked'))
                .map(checkbox => checkbox.value);
            selectedConsultations = Array.from(filterDropdown.querySelectorAll('input[id^="consultation-"]:checked'))
                .map(checkbox => checkbox.value);
        }

        filterButton.addEventListener("click", function () {
            if (filterDropdown) {
                filterDropdown.remove();
                filterDropdown = null;
            } else {
                createFilterDropdown();
            }
        });

        document.addEventListener("click", function (event) {
            if (filterDropdown && !filterButton.contains(event.target) && !filterDropdown.contains(event.target)) {
                filterDropdown.remove();
                filterDropdown = null;
            }
        });

        // Initialize the table
        loadDummyData();
        loadTable(currentPage);
    });
</script>
</body>
</html>