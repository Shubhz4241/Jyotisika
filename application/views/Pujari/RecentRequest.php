<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recent Request</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.6/sweetalert2.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/Pujari/jyotishvitaran.png'); ?>" type="image/png">
    <style>

        .table th:nth-child(2),
        .table td:nth-child(2) {
            width: 23%;
            min-width: 200px;
        }

        .table th:nth-child(1),
        .table td:nth-child(1) {
            width: 20%;
            min-width: 160px;
        }

        .table th:not(:nth-child(1)):not(:nth-child(2)),
        .table td:not(:nth-child(1)):not(:nth-child(2)) {
            width: 11.4%;
            min-width: 130px;
        }

        .table th {
            vertical-align: middle;
        }

        body {
            background-color: #f8f9fa;
            font-family: "Montserrat", serif;
            overflow: visible !important;
        }

        .table th {
            background-color: #ff9900;
            color: white;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 1;
            padding: 10px;
        }

        .table td {
            text-align: center;
            vertical-align: middle;
            padding: 10px;
            white-space: nowrap;
            overflow: hidden;
        }

        .filter-btn {
            display: flex;
            justify-content: end;
            margin-bottom: 15px;
        }

        .distance-col img {
            width: 50px;
            height: 50px;
        }

        .table {
            table-layout: fixed;
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }

        .table th,
        .table td {
            width: 14.28%;
            min-width: 150px;
            box-sizing: border-box;
        }

        .dropdown-menu {
            min-width: 200px;
            padding: 10px;
        }

        .filter-section {
            margin-bottom: 10px;
        }

        div[style="overflow-x: auto;"] {
            overflow-x: auto;
            width: 100%;
            -webkit-overflow-scrolling: touch;
        }

        .approve-btn {
            transition: background-color 0.3s ease;
        }

        .approve-btn.btn-success {
            background-color: #28a745 !important;
            color: white !important;
            border-color: #28a745 !important;
        }

        .reject-btn.btn-danger {
    background-color: #dc3545 !important;
    color: white !important;
    border-color: #dc3545 !important;
}

        .table td:nth-child(6) {
            white-space: normal;
            overflow: visible;
        }

        /* Modal styles */
        .meeting-link-modal .modal-header {
            background-color: #ff9900;
            color: white;
        }

        .meeting-link-modal .btn-primary {
            background-color: green;

        }

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
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <header>
        <?php $this->load->view('Pujari/Include/PujariNav') ?>
    </header>
    <div style="min-height: 100vh;">
        <div class="container mt-5">
            <div class="d-flex justify-content-between pt-4">
                <h5 class="mb-4">Recent Request</h5>
                <div class="filter-btn">
                    <button class="btn btn-outline-secondary" id="filterButton">
                        <i class="bi bi-funnel"></i> Filter By
                    </button>
                </div>
            </div>
            <div style="overflow-x: auto;">
                <table class="table table-bordered" id="puja-table">
                    <thead id="puja-table-header">
                        <tr>
                            <th>Name</th>
                            <th>Puja</th>
                            <th>Mode</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="puja-table-body"></tbody>
                </table>
            </div>

            <!-- Pagination -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center" id="pagination">
                    <li class="page-item disabled">
                        <a class=" ⎯page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">10</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Meeting Link Modal -->
    <div class="modal fade meeting-link-modal" id="meetingLinkModal" tabindex="-1" aria-labelledby="meetingLinkModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="meetingLinkModalLabel">Provide Meeting Link</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="meetingLink" class="form-label">Meeting Link</label>
                        <input type="text" class="form-control" id="meetingLink" placeholder="Enter meeting link here">
                        <div class="form-text">This link will be sent to the user for the online puja session.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="sendLinkBtn">Send & Approve</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <?php $this->load->view('Pujari/Include/PujariFooter') ?>
    </footer>

    <!-- Inline script to pass pujari_id from session -->
    <script>
        const PUJARI_ID = '<?php echo htmlspecialchars($this->session->userdata('pujari_id')); ?>';
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.6/sweetalert2.all.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tableHeader = document.querySelector("#puja-table-header");
            const tableBody = document.querySelector("#puja-table-body");
            const paginationContainer = document.querySelector("#pagination");
            const filterButton = document.getElementById("filterButton");
            const meetingLinkModal = new bootstrap.Modal(document.getElementById('meetingLinkModal'));
            const meetingLinkInput = document.getElementById('meetingLink');
            const sendLinkBtn = document.getElementById('sendLinkBtn');
            let currentPage = 1;
            const itemsPerPage = 10;
            let selectedModes = [];
            let selectedStatuses = [];
            let filterDropdown;
            let allRequests = [];
            let currentRequestToApprove = null;

            async function fetchRequests() {
                if (!PUJARI_ID) {
                    Swal.fire({
                        title: "Error!",
                        text: "Pujari ID not found. Please log in again.",
                        icon: "error",
                        confirmButtonColor: "#d33"
                    });
                    return;
                }

                try {
                    const response = await fetch(`<?php echo base_url(); ?>PujariController/getAllRequest/${PUJARI_ID}`, {

                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                        }
                    });
                    const result = await response.json();

                    if (result.status && result.data) {
                        allRequests = result.data.map(item => ({
                            name: item.user_name || 'Unknown',
                            puja: item.service_name || 'Unknown',
                            // Store the original mode value without modifying it
                            mode: item.puja_mode || '',
                            // Display the mode exactly as it comes from the database
                            modeDisplay: item.puja_mode || '',
                            date: item.puja_date || '',
                            time: item.puja_time || '',
                            payment_status: item.payment_status || 'Pending',
                            status: item.status || '',
                            id: item.book_puja_id
                        }));

                        console.log("Fetched requests with modes and statuses:",
                            allRequests.map(req => ({
                                mode: req.mode,
                                status: req.status
                            })));

                        localStorage.setItem("pujaRequests", JSON.stringify(allRequests));
                        loadTable(currentPage);
                    } else {
                        console.error('No requests found:', result.message);
                        allRequests = [];
                        localStorage.setItem("pujaRequests", JSON.stringify([]));
                        loadTable(currentPage);
                    }
                } catch (error) {
                    console.error('Error fetching requests:', error);
                    allRequests = [];
                    localStorage.setItem("pujaRequests", JSON.stringify([]));
                    loadTable(currentPage);
                }
            }

            function loadTable(page) {
                const storedData = JSON.parse(localStorage.getItem("pujaRequests")) || [];
                let filteredData = [...storedData];

                // Apply mode filter if any modes are selected
                if (selectedModes.length > 0) {
                    filteredData = filteredData.filter(data => {
                        const lowerCaseMode = (data.mode || '').toLowerCase();
                        return selectedModes.includes(lowerCaseMode);
                    });
                }

                // Apply status filter if any statuses are selected
                if (selectedStatuses.length > 0) {
                    filteredData = filteredData.filter(data => {
                        // Case-insensitive comparison for status
                        const lowerCaseStatus = (data.status || '').toLowerCase();
                        return selectedStatuses.some(status => lowerCaseStatus === status);
                    });
                }

                // Adjust table header based on whether status filter is active
                if (selectedStatuses.length > 0) {
                    tableHeader.innerHTML = `
                <tr>
                    <th>Name</th>
                    <th>Puja</th>
                    <th>Mode</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Payment Status</th>
                    <th>Status</th>
                </tr>`;
                } else {
                    tableHeader.innerHTML = `
                <tr>
                    <th>Name</th>
                    <th>Puja</th>
                    <th>Mode</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                </tr>`;
                }

                tableBody.innerHTML = "";
                let start = (page - 1) * itemsPerPage;
                let end = start + itemsPerPage;
                let paginatedItems = filteredData.slice(start, end);

                paginatedItems.forEach((data, index) => {
                    let globalIndex = storedData.findIndex(item => item.id === data.id);
                    let row;
                    if (selectedStatuses.length > 0) {
                        row = `<tr>
                    <td>${data.name}</td>
                    <td>${data.puja}</td>
                    <td>${data.modeDisplay}</td>
                    <td>${data.date}</td>
                    <td>${data.time}</td>
                    <td>${data.payment_status}</td>
                    <td class="status-col">${data.status || ''}</td>
                </tr>`;
                    } else {
                        row = `<tr>
                    <td>${data.name}</td>
                    <td>${data.puja}</td>
                    <td>${data.modeDisplay}</td>
                    <td>${data.date}</td>
                    <td>${data.time}</td>
                    <td>${data.payment_status}</td>
                    <td>
                        <button class="btn btn-outline-success btn-sm approve-btn me-2 ${data.status === 'Approved' ? 'btn-success' : ''}" data-index="${globalIndex}" data-id="${data.id}">
                            <i class="bi bi-check-lg"></i>
                        </button>
                        <button class="btn btn-outline-danger btn-sm reject-btn ${data.status === 'Rejected' ? 'btn-danger' : ''}" data-index="${globalIndex}" data-id="${data.id}">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </td>
                </tr>`;
                    }
                    tableBody.innerHTML += row;
                });

                updatePagination(page, filteredData.length);
            }

            // Pagination functions remain unchanged
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
                    pageBtn.addEventListener("click", function(event) {
                        event.preventDefault();
                        currentPage = parseInt(this.dataset.page);
                        loadTable(currentPage);
                    });
                });
                document.getElementById("prevPage")?.addEventListener("click", function(event) {
                    event.preventDefault();
                    if (currentPage > 1) {
                        currentPage--;
                        loadTable(currentPage);
                    }
                });
                document.getElementById("nextPage")?.addEventListener("click", function(event) {
                    event.preventDefault();
                    const storedData = JSON.parse(localStorage.getItem("pujaRequests")) || [];
                    let filteredData = [...storedData];
                    if (selectedModes.length > 0) {
                        filteredData = filteredData.filter(data => selectedModes.includes(data.mode.toLowerCase()));
                    }
                    if (selectedStatuses.length > 0) {
                        filteredData = filteredData.filter(data => {
                            const lowerCaseStatus = (data.status || '').toLowerCase();
                            return selectedStatuses.includes(lowerCaseStatus);
                        });
                    }
                    if ((currentPage * itemsPerPage) < filteredData.length) {
                        currentPage++;
                        loadTable(currentPage);
                    }
                });
            }

            // Modified Accept handler for showing modal
            tableBody.addEventListener("click", async function(event) {
                const storedData = JSON.parse(localStorage.getItem("pujaRequests")) || [];

                // Approve Request
                if (event.target.closest(".approve-btn")) {
                    const indexToApprove = event.target.closest(".approve-btn").dataset.index;
                    const requestId = event.target.closest(".approve-btn").dataset.id;
                    const requestData = storedData[indexToApprove];

                    if (requestData.status === "Approved") {
                        Swal.fire({
                            title: "Already Approved!",
                            text: "This request has already been approved.",
                            icon: "warning",
                            confirmButtonColor: "#28a745"
                        });
                        return;
                    } else if (requestData.status === "Rejected") {
                        Swal.fire({
                            title: "Cannot Approve!",
                            text: "This request has already been rejected.",
                            icon: "warning",
                            confirmButtonColor: "#28a745"
                        });
                        return;
                    }

                    // Store the current request to approve
                    currentRequestToApprove = {
                        index: indexToApprove,
                        id: requestId
                    };

                    // Clear previous input and show modal
                    meetingLinkInput.value = '';
                    meetingLinkModal.show();
                }

                // Reject Request (unchanged)
                if (event.target.closest(".reject-btn")) {
                    const indexToReject = event.target.closest(".reject-btn").dataset.index;
                    const requestId = event.target.closest(".reject-btn").dataset.id;

                    if (storedData[indexToReject].status === "Rejected") {
                        Swal.fire({
                            title: "Already Rejected!",
                            text: "This request has already been rejected.",
                            icon: "warning",
                            confirmButtonColor: "#d33"
                        });
                        return;
                    } else if (storedData[indexToReject].status === "Approved") {
                        Swal.fire({
                            title: "Cannot Reject!",
                            text: "This request has already been approved.",
                            icon: "warning",
                            confirmButtonColor: "#d33"
                        });
                        return;
                    }

                    Swal.fire({
                        title: "Are you sure?",
                        text: "Do you want to reject this request?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#6c757d",
                        confirmButtonText: "Yes, Reject"
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            try {
                                const response = await fetch('<?php echo base_url(); ?>PujariController/rejectRequest', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                    },
                                    body: JSON.stringify({
                                        id: requestId
                                    })
                                });
                                const result = await response.json();

                                if (result.status) {
                                    storedData[indexToReject].status = "Rejected";
                                    localStorage.setItem("pujaRequests", JSON.stringify(storedData));
                                    Swal.fire({
                                        title: "Rejected!",
                                        text: "The request has been rejected successfully.",
                                        icon: "success",
                                        confirmButtonColor: "#d33"
                                    });
                                    loadTable(currentPage); // Refresh table
                                } else {
                                    Swal.fire({
                                        title: "Error!",
                                        text: result.message || "Failed to reject request.",
                                        icon: "error",
                                        confirmButtonColor: "#d33"
                                    });
                                }
                            } catch (error) {
                                console.error('Error rejecting request:', error);
                                Swal.fire({
                                    title: "Error!",
                                    text: "Failed to reject request due to a network error.",
                                    icon: "error",
                                    confirmButtonColor: "#d33"
                                });
                            }
                        }
                    });
                }
            });

            // Add event listener for the Send & Approve button
            sendLinkBtn.addEventListener("click", async function() {
                if (!currentRequestToApprove) {
                    Swal.fire({
                        title: "Error!",
                        text: "No request selected for approval.",
                        icon: "error",
                        confirmButtonColor: "#d33"
                    });
                    return;
                }

                const meetingLink = meetingLinkInput.value.trim();
                if (!meetingLink) {
                    Swal.fire({
                        title: "Error!",
                        text: "Please provide a meeting link.",
                        icon: "error",
                        confirmButtonColor: "#d33"
                    });
                    return;
                }

                // Show loader
                const loader = document.createElement('div');
                loader.className = 'loader-overlay';
                loader.innerHTML = `
        <div class="loader-container">
            <div class="spinner"></div>
            <p>Processing request...</p>
        </div>
    `;
                document.body.appendChild(loader);

                try {
                    const response = await fetch('<?php echo base_url(); ?>PujariController/acceptRequest', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            id: currentRequestToApprove.id,
                            meeting_link: meetingLink
                        })
                    });
                    const result = await response.json();

                    // Remove loader
                    document.body.removeChild(loader);

                    if (result.status) {
                        const storedData = JSON.parse(localStorage.getItem("pujaRequests")) || [];
                        storedData[currentRequestToApprove.index].status = "Approved";
                        localStorage.setItem("pujaRequests", JSON.stringify(storedData));

                        meetingLinkModal.hide();

                        Swal.fire({
                            title: "Approved!",
                            text: "The request has been approved and the meeting link has been sent successfully.",
                            icon: "success",
                            confirmButtonColor: "#28a745"
                        });

                        loadTable(currentPage); // Refresh table
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: result.message || "Failed to approve request.",
                            icon: "error",
                            confirmButtonColor: "#d33"
                        });
                    }
                } catch (error) {
                    // Remove loader in case of error too
                    document.body.removeChild(loader);

                    console.error('Error approving request:', error);
                    Swal.fire({
                        title: "Error!",
                        text: "Failed to approve request due to a network error.",
                        icon: "error",
                        confirmButtonColor: "#d33"
                    });
                }
            });

            // Filter functions remain unchanged
            function createFilterDropdown() {
                // First, determine available modes in the data for dynamic filter creation
                const storedData = JSON.parse(localStorage.getItem("pujaRequests")) || [];
                const availableModes = [...new Set(storedData.map(item => (item.mode || '').toLowerCase()))];
                console.log("Available modes for filtering:", availableModes);

                filterDropdown = document.createElement("div");
                filterDropdown.classList.add("dropdown-menu", "show");

                // Create mode filter HTML based on available modes
                let modeFilterHTML = `
            <div class="filter-section">
                <h6 class="dropdown-header">Filter by Mode</h6>`;

                // Include all available modes dynamically
                availableModes.forEach(mode => {
                    if (!mode) return; // Skip empty modes

                    const displayMode = mode === 'mob' ? 'Mob' :
                        mode === 'online' ? 'Online' :
                        mode.charAt(0).toUpperCase() + mode.slice(1); // Capitalize first letter

                    modeFilterHTML += `
                <div class="form-check">
                    <input class="form-check-input filter-checkbox" type="checkbox" id="mode-${mode}" value="${mode}" data-type="mode">
                    <label class="form-check-label" for="mode-${mode}">${displayMode}</label>
                </div>`;
                });

                modeFilterHTML += `</div>`;

                // Complete the filter HTML - no Apply/Clear buttons
                filterDropdown.innerHTML = `
            ${modeFilterHTML}
            <div class="filter-section mt-3">
                <h6 class="dropdown-header">Filter by Status</h6>
                <div class="form-check">
                    <input class="form-check-input filter-checkbox" type="checkbox" id="status-approved" value="approved" data-type="status">
                    <label class="form-check-label" for="status-approved">Approved</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input filter-checkbox" type="checkbox" id="status-rejected" value="rejected" data-type="status">
                    <label class="form-check-label" for="status-rejected">Rejected</label>
                </div>
            </div>
        `;

                document.body.appendChild(filterDropdown);

                const rect = filterButton.getBoundingClientRect();
                filterDropdown.style.position = "absolute";
                filterDropdown.style.top = `${rect.bottom}px`;
                filterDropdown.style.left = `${rect.left}px`;
                filterDropdown.style.zIndex = "1000";

                // Set any previously selected filters
                if (selectedModes.length > 0 || selectedStatuses.length > 0) {
                    selectedModes.forEach(mode => {
                        const checkbox = document.getElementById(`mode-${mode}`);
                        if (checkbox) checkbox.checked = true;
                    });

                    selectedStatuses.forEach(status => {
                        const checkbox = document.getElementById(`status-${status}`);
                        if (checkbox) checkbox.checked = true;
                    });
                }

                // Add event listeners to each checkbox for immediate filtering
                document.querySelectorAll('.filter-checkbox').forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        updateFiltersFromCheckboxes();
                        currentPage = 1;
                        loadTable(currentPage);
                    });
                });
            }

            function updateFiltersFromCheckboxes() {
                // Get selected mode filters
                selectedModes = Array.from(document.querySelectorAll('input[data-type="mode"]:checked'))
                    .map(checkbox => checkbox.value);

                // Get selected status filters
                selectedStatuses = Array.from(document.querySelectorAll('input[data-type="status"]:checked'))
                    .map(checkbox => checkbox.value);

                console.log("Applied filters - Modes:", selectedModes, "Statuses:", selectedStatuses);
            }

            filterButton.addEventListener("click", function(event) {
                event.stopPropagation();
                if (filterDropdown) {
                    filterDropdown.remove();
                    filterDropdown = null;
                } else {
                    createFilterDropdown();
                }
            });

            document.addEventListener("click", function(event) {
                if (filterDropdown && !filterButton.contains(event.target) && !filterDropdown.contains(event.target)) {
                    filterDropdown.remove();
                    filterDropdown = null;
                }
            });

            fetchRequests();
        });
    </script>
</body>

</html>