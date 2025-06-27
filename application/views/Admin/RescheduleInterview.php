<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin:Reschedule Interview</title>
    <!-- Bootstrap CSS for styling and layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets\css\style.css' ?>">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        /* Apply Inter font to the entire page */
        * {
            font-family: 'Inter', sans-serif !important;
        }

        /* Customize headers and table fonts for better readability */
        h1,
        h4 {
            font-weight: 700;
        }

        p,
        td,
        th {
            font-weight: 400;
            font-size: 1rem;
        }

        /* Enhance table header appearance */
        .table thead th {
            font-weight: 600;
            background-color: #f8f9fa;
        }

        /* Adjust buttons for better aesthetics */
        .btn {
            font-weight: 500;
            font-size: 0.9rem;
        }

        /* Mobile Responsiveness Improvements */
        @media (max-width: 768px) {
            body {
                font-size: 14px;
            }

            .main {
                padding: 10px !important;
            }

            .container {
                padding: 0 10px;
            }

            /* Responsive Table Styling */
            .table-responsive {
                overflow-x: auto;
            }

            .table {
                width: 100%;
                margin-bottom: 1rem;
                background-color: transparent;
            }

            .table thead {
                display: table-header-group;
            }

            .table tbody tr {
                display: table-row;
                margin-bottom: 10px;
                border: 1px solid #ddd;
            }

            .table th,
            .table td {
                display: table-cell;
                padding: 8px;
                vertical-align: middle;
                border: 1px solid #ddd;
            }

            /* Responsive Filter and Search */
            .d-flex.justify-content-between {
                flex-direction: column;
                gap: 10px;
            }

            #roleFilter,
            .btn-group {
                width: 100%;
                margin-bottom: 10px;
            }

            .btn-group {
                flex-wrap: wrap;
                justify-content: space-between;
            }

            .btn-group .btn {
                flex-grow: 1;
                margin: 2px;
            }

            /* Pagination Controls */
            .pagination-controls {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }

            #prevBtn,
            #nextBtn {
                width: 100%;
            }

            #pageNumbers {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 5px;
            }

            #pageNumbers .btn {
                flex-grow: 0;
            }

            /* Action Column Styling */
            .table td:last-child {
                text-align: center;
            }

            .bi-trash {
                font-size: 1rem;
                cursor: pointer;
            }
        }

        /* Ensure full width on smaller screens */
        @media (max-width: 480px) {
            .container {
                width: 100%;
                padding: 0 5px;
            }

            .table {
                font-size: 12px;
            }

            .table th,
            .table td {
                padding: 6px;
            }
        }

        /* Mobile Responsiveness Improvements */
        @media (max-width: 768px) {
            body {
                font-size: 14px;
            }

            .main {
                padding: 10px !important;
            }

            .container {
                padding: 0 10px;
            }

            /* Responsive Table Styling */
            .table-responsive {
                overflow-x: auto;
            }

            .table {
                width: 100%;
                margin-bottom: 1rem;
                background-color: transparent;
            }

            .table thead {
                display: table-header-group;
            }

            .table tbody tr {
                display: table-row;
                margin-bottom: 10px;
                border: 1px solid #ddd;
            }

            .table th,
            .table td {
                display: table-cell;
                padding: 8px;
                vertical-align: middle;
                border: 1px solid #ddd;
            }

            /* Responsive Filter and Search */
            .d-flex.justify-content-between {
                flex-direction: column;
                gap: 10px;
            }

            #roleFilter,
            .btn-group {
                width: 100%;
                margin-bottom: 10px;
            }

            .btn-group {
                flex-wrap: wrap;
                justify-content: space-between;
            }

            .btn-group .btn {
                flex-grow: 1;
                margin: 2px;
            }

            /* Pagination Controls */
            .pagination-controls {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }

            #prevBtn,
            #nextBtn {
                width: 100%;
            }

            #pageNumbers {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 5px;
            }

            #pageNumbers .btn {
                flex-grow: 0;
            }

            /* Action Column Styling */
            .table td:last-child {
                text-align: center;
            }

            .bi-trash {
                font-size: 1rem;
                cursor: pointer;
            }
        }

        /* Ensure full width on smaller screens */
        @media (max-width: 480px) {
            .container {
                width: 100%;
                padding: 0 5px;
            }

            .table {
                font-size: 12px;
            }

            .table th,
            .table td {
                padding: 6px;
            }
        }

        @media (min-width: 769px) {
            .card-footer .btn {
                max-width: 250px;
            }
        }

        .reschedule-label {
            display: block;
            /* Ensures labels take full width */
            text-align: left;
            /* Aligns text to the start */
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <?php $this->load->view('IncludeAdmin/CommanSidebar'); ?>
        <!-- SIDEBAR END -->


        <!-- Main Component -->
        <div class="main ">
            <!-- Navbar -->
            <?php $this->load->view('IncludeAdmin/CommanNavbar'); ?>
            <!-- Navbar End -->

            <main class="p-3">
                <div class="container mt-3 mb-4">
                    <h3 id="interviewHeading">Pooja Reschedule Interview</h3>


                    <!-- Filter Dropdown -->
                    <div class=" d-flex justify-content-between mb-3">
                        <select id="roleFilter" class="form-select w-auto" onchange="changeRole()">
                            <option value="Pujari">Pujari</option>
                            <option value="Astrologer">Astrologer</option>
                        </select>

                        <!-- Status Filter Buttons -->
                        <div>
                            <button class="btn btn-success" onclick="filterStatus('Approved')">Approved</button>
                            <button class="btn btn-danger" onclick="filterStatus('Pending')">Pending</button>
                            <button class="btn btn-secondary" onclick="filterStatus('All')">All</button>
                        </div>
                    </div>

                    <!-- Search Bar -->
                    <input type="text" id="searchBar" class="form-control mb-3 border-3 shadow-none" placeholder="Search..." onkeyup="filterData()">

                    <!-- Tables -->
                    <div class="table-responsive">
                        <table id="pujariTable" class="table table-bordered table-light table-hover">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact No</th>
                                    <th>Interview</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="pujariTableBody"></tbody>
                        </table>

                        <table id="astrologerTable" class="table table-bordered table-light table-hover d-none">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact No</th>
                                    <th>Interview</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="astrologerTableBody"></tbody>
                        </table>
                    </div>

                    <!-- Pagination Controls -->
                    <div class="d-flex justify-content-end gap-2">
                        <button id="prevBtn" class="btn btn-sm btn text-white" style="background-color: #0c768a;" onclick="previousPage()">Previous</button>
                        <div id="pageNumbers" class="btn-group"></div>
                        <button id="nextBtn" class="btn btn-sm btn text-white" style="background-color: #0c768a;" onclick="nextPage()">Next</button>
                    </div>
                </div>

                <script>
                    let currentPage = 1;
                    const rowsPerPage = 8;
                    let activeRole = "Pujari";
                    let activeData = [];

                    const pujariData = [{
                            name: "John Doe",
                            address: "123 Main St",
                            contactNo: "1234567890",
                            serviceTaken: "Reschedule",
                            status: "Approved"
                        },
                        {
                            name: "Jane Smith",
                            address: "456 Elm St",
                            contactNo: "0987654321",
                            serviceTaken: "Reschedule",
                            status: "Pending"
                        },
                        {
                            name: "Mark Wilson",
                            address: "789 Oak Ave",
                            contactNo: "1122334455",
                            serviceTaken: "Reschedule",
                            status: "Approved"
                        },
                        {
                            name: "Jane Smith",
                            address: "456 Elm St",
                            contactNo: "0987654321",
                            serviceTaken: "Reschedule",
                            status: "Pending"
                        },
                        {
                            name: "Mark Wilson",
                            address: "789 Oak Ave",
                            contactNo: "1122334455",
                            serviceTaken: "Reschedule",
                            status: "Approved"
                        },
                        {
                            name: "Jane Smith",
                            address: "456 Elm St",
                            contactNo: "0987654321",
                            serviceTaken: "Reschedule",
                            status: "Pending"
                        },
                        {
                            name: "Mark Wilson",
                            address: "789 Oak Ave",
                            contactNo: "1122334455",
                            serviceTaken: "Reschedule",
                            status: "Approved"
                        },
                        {
                            name: "Jane Smith",
                            address: "456 Elm St",
                            contactNo: "0987654321",
                            serviceTaken: "Reschedule",
                            status: "Pending"
                        },
                        {
                            name: "Mark Wilson",
                            address: "789 Oak Ave",
                            contactNo: "1122334455",
                            serviceTaken: "Reschedule",
                            status: "Approved"
                        },
                        {
                            name: "Jane Smith",
                            address: "456 Elm St",
                            contactNo: "0987654321",
                            serviceTaken: "Reschedule",
                            status: "Pending"
                        },
                        {
                            name: "Mark Wilson",
                            address: "789 Oak Ave",
                            contactNo: "1122334455",
                            serviceTaken: "Reschedule",
                            status: "Approved"
                        },
                        {
                            name: "Jane Smith",
                            address: "456 Elm St",
                            contactNo: "0987654321",
                            serviceTaken: "Reschedule",
                            status: "Pending"
                        },
                        {
                            name: "Mark Wilson",
                            address: "789 Oak Ave",
                            contactNo: "1122334455",
                            serviceTaken: "Reschedule",
                            status: "Approved"
                        },
                    ];

                    const astrologerData = [{
                            name: "Astro Raj",
                            address: "101 Star St",
                            contactNo: "2223334445",
                            serviceTaken: "Reschedule",
                            status: "Approved"
                        },
                        {
                            name: "Astro Meena",
                            address: "202 Galaxy Rd",
                            contactNo: "5556667778",
                            serviceTaken: "Reschedule",
                            status: "Pending"
                        },
                        {
                            name: "Astro Vikram",
                            address: "303 Moon Blvd",
                            contactNo: "9998887776",
                            serviceTaken: "Reschedule",
                            status: "Approved"
                        },
                        {
                            name: "Astro Meena",
                            address: "202 Galaxy Rd",
                            contactNo: "5556667778",
                            serviceTaken: "Reschedule",
                            status: "Pending"
                        },
                        {
                            name: "Astro Vikram",
                            address: "303 Moon Blvd",
                            contactNo: "9998887776",
                            serviceTaken: "Reschedule",
                            status: "Approved"
                        },
                        {
                            name: "Astro Meena",
                            address: "202 Galaxy Rd",
                            contactNo: "5556667778",
                            serviceTaken: "Reschedule",
                            status: "Pending"
                        },
                        {
                            name: "Astro Vikram",
                            address: "303 Moon Blvd",
                            contactNo: "9998887776",
                            serviceTaken: "Reschedule",
                            status: "Approved"
                        },
                        {
                            name: "Astro Meena",
                            address: "202 Galaxy Rd",
                            contactNo: "5556667778",
                            serviceTaken: "Reschedule",
                            status: "Pending"
                        },
                        {
                            name: "Astro Vikram",
                            address: "303 Moon Blvd",
                            contactNo: "9998887776",
                            serviceTaken: "Reschedule",
                            status: "Approved"
                        },
                        {
                            name: "Astro Meena",
                            address: "202 Galaxy Rd",
                            contactNo: "5556667778",
                            serviceTaken: "Reschedule",
                            status: "Pending"
                        },
                        {
                            name: "Astro Vikram",
                            address: "303 Moon Blvd",
                            contactNo: "9998887776",
                            serviceTaken: "Reschedule",
                            status: "Approved"
                        },
                        {
                            name: "Astro Meena",
                            address: "202 Galaxy Rd",
                            contactNo: "5556667778",
                            serviceTaken: "Reschedule",
                            status: "Pending"
                        },
                        {
                            name: "Astro Vikram",
                            address: "303 Moon Blvd",
                            contactNo: "9998887776",
                            serviceTaken: "Reschedule",
                            status: "Approved"
                        },
                    ];

                    function changeRole() {
                        activeRole = document.getElementById("roleFilter").value;
                        activeData = activeRole === "Pujari" ? [...pujariData] : [...astrologerData];

                        document.getElementById("pujariTable").classList.toggle("d-none", activeRole !== "Pujari");
                        document.getElementById("astrologerTable").classList.toggle("d-none", activeRole !== "Astrologer");

                        currentPage = 1;
                        renderTable();
                    }

                    function renderTable() {
                        const tableBody = document.getElementById(activeRole === "Pujari" ? "pujariTableBody" : "astrologerTableBody");
                        tableBody.innerHTML = "";

                        let filtered = activeData.slice((currentPage - 1) * rowsPerPage, currentPage * rowsPerPage);

                        filtered.forEach((item, index) => {
                            let row = `
                <tr ${item.serviceTaken === "Reschedule" ? `onclick="openRescheduleModal('${item.name}', '${item.contactNo}')" style="cursor:pointer;"` : ''}>
                    <td>${(currentPage - 1) * rowsPerPage + index + 1}</td>
                    <td>${item.name}</td>
                    <td>${item.address}</td>
                    <td>${item.contactNo}</td>
                    <td>${item.serviceTaken}</td>
                    <td>${item.status}</td>
                    <td> 
                        <button class="btn btn-danger btn-sm" onclick="deleteRow(${index})">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            `;
                            tableBody.innerHTML += row;
                        });
                    }

                    function deleteRow(index) {
                        activeData.splice((currentPage - 1) * rowsPerPage + index, 1);
                        renderTable();
                    }

                    function changeRole() {
                        activeRole = document.getElementById("roleFilter").value;
                        activeData = activeRole === "Pujari" ? [...pujariData] : [...astrologerData];

                        // Update heading dynamically
                        document.getElementById("interviewHeading").textContent =
                            activeRole === "Pujari" ? "Pujari Reschedule Interview" : "Astrologer Reschedule Interview";

                        document.getElementById("pujariTable").classList.toggle("d-none", activeRole !== "Pujari");
                        document.getElementById("astrologerTable").classList.toggle("d-none", activeRole !== "Astrologer");

                        currentPage = 1;
                        renderTable();
                    }


                    function updatePaginationButtons() {
                        let totalPages = Math.ceil(activeData.length / rowsPerPage);
                        document.getElementById("prevBtn").disabled = currentPage === 1;
                        document.getElementById("nextBtn").disabled = currentPage === totalPages || totalPages === 0;

                        let pageNumbersContainer = document.getElementById("pageNumbers");
                        pageNumbersContainer.innerHTML = "";
                        for (let i = 1; i <= totalPages; i++) {
                            let pageBtn = `<button class="btn btn-sm ${i === currentPage ? 'btn-dark' : 'btn-outline-dark'}" onclick="goToPage(${i})">${i}</button>`;
                            pageNumbersContainer.innerHTML += pageBtn;
                        }
                    }

                    function previousPage() {
                        if (currentPage > 1) {
                            currentPage--;
                            renderTable();
                        }
                    }

                    function nextPage() {
                        let totalPages = Math.ceil(activeData.length / rowsPerPage);
                        if (currentPage < totalPages) {
                            currentPage++;
                            renderTable();
                        }
                    }

                    function goToPage(pageNum) {
                        currentPage = pageNum;
                        renderTable();
                    }

                    function filterStatus(status) {
                        activeData = (activeRole === "Pujari" ? pujariData : astrologerData).filter(item => status === "All" || item.status === status);
                        currentPage = 1;
                        renderTable();
                    }

                    function filterData() {
                        let query = document.getElementById("searchBar").value.toLowerCase();
                        activeData = (activeRole === "Pujari" ? pujariData : astrologerData).filter(item =>
                            item.name.toLowerCase().includes(query) ||
                            item.address.toLowerCase().includes(query) ||
                            item.contactNo.toLowerCase().includes(query) ||
                            item.status.toLowerCase().includes(query)
                        );
                        currentPage = 1;
                        renderTable();
                    }

                    // Initialize
                    changeRole();

                    function renderTable() {
                        const tableBody = document.getElementById(activeRole === "Pujari" ? "pujariTableBody" : "astrologerTableBody");
                        tableBody.innerHTML = "";

                        let filtered = activeData.slice((currentPage - 1) * rowsPerPage, currentPage * rowsPerPage);

                        filtered.forEach((item, index) => {
                            let row = `
                    <tr>
                        <td>${(currentPage - 1) * rowsPerPage + index + 1}</td>
                        <td>${item.name}</td>
                        <td>${item.address}</td>
                        <td>${item.contactNo}</td>
                        <td>
                            ${item.serviceTaken === "Reschedule" 
                                ? `<button class="btn btn-warning btn-sm" onclick="openRescheduleModal('${item.name}')">Reschedule</button>` 
                                : item.serviceTaken}
                        </td>
                        <td>${item.status}</td>
                            
                        <td class="text-center">
                        <i class="bi bi-trash text-danger fs-5" onclick="confirmDelete()"></i>
                        </td>
                    </tr>`;
                            tableBody.innerHTML += row;
                        });
                    }


                    function confirmDelete() {
                        Swal.fire({
                            title: "Are you sure?",
                            text: "Do you want to delete this record?",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#d33",
                            cancelButtonColor: "#3085d6",
                            confirmButtonText: "Yes, delete it!"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire(
                                    "Deleted!",
                                    "Record has been deleted successfully.",
                                    "success"
                                );
                            }
                        });
                    }


                    function openRescheduleModal(name) {
                        // Set the modal text dynamically
                        document.getElementById("pujariMessage").innerHTML = `${name} has requested to add a new Puja (Satyanarayan puja) to his skillset.`;

                        // Show the modal using Bootstrap's modal method
                        var rescheduleModal = new bootstrap.Modal(document.getElementById('rescheduleModal'));
                        rescheduleModal.show();
                    }

                    function submitReschedule() {
                        // Get form values
                        let date = document.getElementById("interviewDate").value;
                        let time = document.getElementById("interviewTime").value;
                        let venue = document.getElementById("interviewVenue").value;

                        // Check if all fields are filled
                        if (date === "" || time === "" || venue === "") {
                            Swal.fire({
                                icon: "warning",
                                title: "Missing Information",
                                text: "Please fill all the fields before rescheduling.",
                            });
                            return;
                        }

                        // Show SweetAlert success message
                        Swal.fire({
                            icon: "success",
                            title: "Interview Scheduled Successfully!",
                            confirmButtonText: "OK",
                        }).then(() => {
                            // Close the Bootstrap modal
                            let modal = document.getElementById("rescheduleModal");
                            let bootstrapModal = bootstrap.Modal.getInstance(modal); // Get modal instance
                            bootstrapModal.hide(); // Hide modal

                            // Optionally reset the form fields
                            document.getElementById("interviewDate").value = "";
                            document.getElementById("interviewTime").value = "";
                            document.getElementById("interviewVenue").value = "";
                        });
                    }
                </script>



                <!-- Reschedule Modal -->
                <div class="modal fade" id="rescheduleModal" tabindex="-1" aria-labelledby="rescheduleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="rescheduleModalLabel">Pooja Reschedule Interview</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <!-- Profile Image -->
                                <img id="pujariImage" src="<?php echo base_url() . 'assets\images\astrologer.png'; ?>" class="rounded-circle mb-3" width="100" height="100" alt="Profile Picture">

                                <!-- Dynamic Text -->
                                <p id="pujariMessage" class="fw-bold"></p>

                                <!-- Reschedule Form -->
                                <div class="mb-3">
                                    <label for="interviewDate" class="form-label reschedule-label">Interview Date</label>
                                    <input type="date" class="form-control " id="interviewDate">
                                </div>
                                <div class="mb-3">
                                    <label for="interviewTime" class="form-label reschedule-label">Interview Time</label>
                                    <input type="time" class="form-control" id="interviewTime">
                                </div>
                                <div class="mb-3">
                                    <label for="interviewVenue" class="form-label reschedule-label">Meeting Link</label>
                                    <input type="text" class="form-control" id="interviewVenue" placeholder="Enter Link">
                                </div>

                                <!-- Submit Button -->
                                <button class="btn btn-primary w-100" onclick="submitReschedule()">Reschedule Interview</button>
                            </div>
                        </div>
                    </div>
                </div>



            </main>
        </div>

    </div>
    </div>


    <!-- Script Toggle Sidebar -->
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>