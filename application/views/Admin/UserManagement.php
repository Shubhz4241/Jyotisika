<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin:User Management</title>
    <!-- Bootstrap CSS for styling and layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets\css\style.css' ?>">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
            .main {
                margin-top: 0 !important;
            }

            .card-dashboard {
                margin-bottom: 1rem;
            }

            .table-responsive {
                font-size: 0.8rem;
            }

            .table td,
            .table th {
                padding: 0.5rem;
            }

            .btn-sm {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }

            /* Responsive table */
            .table-responsive-stack tr {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                margin-bottom: 1rem;
                border-bottom: 1px solid #eee;
            }

            .table-responsive-stack td {
                display: block;
                text-align: right;
            }

            .table-responsive-stack td:before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
            }
        }

        /* Mobile-friendly See All button */
        @media (max-width: 768px) {
            .card-footer .btn {
                margin-top: 10px;
                padding: 10px 15px;
                font-size: 0.9rem;
            }
        }

        @media (min-width: 769px) {
            .card-footer .btn {
                max-width: 250px;
            }
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
                    <!-- Search Bar -->
                    <input type="text" id="searchBar" class="form-control mb-3 border-3 shadow-none" placeholder="Search..." onkeyup="filterData()"

                        <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-light table-hover table-responsive ">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Contact No</th>
                                    <th>Service Taken</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <!-- Data will be displayed here -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Buttons -->
                    <div class="d-flex justify-content-end gap-2">
                        <button id="prevBtn" class="btn btn-sm btn-primary" onclick="previousPage()">Previous</button>
                        <div id="pageNumbers" class="btn-group"></div>
                        <button id="nextBtn" class="btn btn-sm btn-primary" onclick="nextPage()">Next</button>
                    </div>

                </div>

                <script>
                    let currentPage = 1;
                    const rowsPerPage = 8;

                    // Sample Data
                    const dummyData = [{
                            name: "John Doe",
                            address: "123 Main Street",
                            contactNo: "1234567890",
                            serviceTaken: 2,
                            action: `<button class="btn btn-danger delete-btn" data-id="1">
                        <i class="bi bi-trash-fill"></i>
                     </button>`
                        },
                        {
                            name: "Jane Smith",
                            address: "456 Elm Street",
                            contactNo: "0987654321",
                            serviceTaken: 1,
                            action: `<button class="btn btn-danger delete-btn" data-id="2">
                        <i class="bi bi-trash-fill"></i>
                     </button>`
                        },
                        {
                            name: "Jane Smith",
                            address: "456 Elm Street",
                            contactNo: "0987654321",
                            serviceTaken: 1,
                            action: `<button class="btn btn-danger delete-btn" data-id="2">
                        <i class="bi bi-trash-fill"></i>
                     </button>`
                        },
                        {
                            name: "Jane Smith",
                            address: "456 Elm Street",
                            contactNo: "0987654321",
                            serviceTaken: 1,
                            action: `<button class="btn btn-danger delete-btn" data-id="2">
                        <i class="bi bi-trash-fill"></i>
                     </button>`
                        },
                        {
                            name: "Jane Smith",
                            address: "456 Elm Street",
                            contactNo: "0987654321",
                            serviceTaken: 1,
                            action: `<button class="btn btn-danger delete-btn" data-id="2">
                        <i class="bi bi-trash-fill"></i>
                     </button>`
                        },
                        {
                            name: "Jane Smith",
                            address: "456 Elm Street",
                            contactNo: "0987654321",
                            serviceTaken: 1,
                            action: `<button class="btn btn-danger delete-btn" data-id="2">
                        <i class="bi bi-trash-fill"></i>
                     </button>`
                        },
                        {
                            name: "Jane Smith",
                            address: "456 Elm Street",
                            contactNo: "0987654321",
                            serviceTaken: 1,
                            action: `<button class="btn btn-danger delete-btn" data-id="2">
                        <i class="bi bi-trash-fill"></i>
                     </button>`
                        },
                        {
                            name: "Jane Smith",
                            address: "456 Elm Street",
                            contactNo: "0987654321",
                            serviceTaken: 1,
                            action: `<button class="btn btn-danger delete-btn" data-id="2">
                        <i class="bi bi-trash-fill"></i>
                     </button>`
                        },
                        {
                            name: "Jane Smith",
                            address: "456 Elm Street",
                            contactNo: "0987654321",
                            serviceTaken: 1,
                            action: `<button class="btn btn-danger delete-btn" data-id="2">
                        <i class="bi bi-trash-fill"></i>
                     </button>`
                        },
                        // Add more entries as needed
                    ];

                    let filteredData = [...dummyData]; // Keep a filtered copy of the data

                    // Function to display data based on page
                    function displayData(page) {
                        const start = (page - 1) * rowsPerPage;
                        const end = start + rowsPerPage;
                        const paginatedData = filteredData.slice(start, end);

                        const tableBody = document.getElementById('tableBody');
                        tableBody.innerHTML = '';

                        paginatedData.forEach((item, index) => {
                            const row = `
                <tr>
                    <td>${index + 1}</td>
                    <td>${item.name}</td>
                    <td>${item.address}</td>
                    <td>${item.contactNo}</td>
                    <td>${item.serviceTaken}</td>
                    <td class="text-center">${item.action}</td>
                </tr>`;
                            tableBody.innerHTML += row;
                        });

                        attachDeleteEvent(); // Attach SweetAlert to delete buttons
                    }
                    // Function to attach SweetAlert confirmation to delete buttons
                    function attachDeleteEvent() {
                        const deleteButtons = document.querySelectorAll('.delete-btn');
                        deleteButtons.forEach((btn) => {
                            btn.addEventListener('click', (event) => {
                                const id = event.currentTarget.getAttribute('data-id');

                                // SweetAlert confirmation
                                Swal.fire({
                                    title: "Are you sure?",
                                    text: "You won't be able to revert this!",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#3085d6",
                                    cancelButtonColor: "#d33",
                                    confirmButtonText: "Yes, delete it!"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Perform delete action
                                        deleteItem(id);
                                        Swal.fire(
                                            "Deleted!",
                                            "Your entry has been deleted.",
                                            "success"
                                        );
                                    }
                                });
                            });
                        });
                    }
                    // Function to delete an item by id
                    function deleteItem(id) {
                        filteredData = filteredData.filter((item, index) => index + 1 != id);
                        displayData(currentPage); // Refresh the table
                    }

                    // Update pagination
                    function updatePagination() {
                        const pageNumbers = document.getElementById('pageNumbers');
                        pageNumbers.innerHTML = ''; // Clear existing page numbers

                        const totalPages = Math.ceil(filteredData.length / rowsPerPage);
                        for (let i = 1; i <= totalPages; i++) {
                            const btn = document.createElement('button');
                            btn.className = `btn btn-sm ${currentPage === i ? 'btn-primary' : 'btn-secondary'}`;
                            btn.textContent = i;
                            btn.onclick = () => {
                                currentPage = i;
                                displayData(currentPage);
                            };
                            pageNumbers.appendChild(btn);
                        }

                        document.getElementById('prevBtn').disabled = currentPage === 1;
                        document.getElementById('nextBtn').disabled = currentPage === totalPages;
                    }

                    // Update entries showing info
                    function updateShowingEntries(start, end, total) {
                        document.getElementById('startIndex').textContent = start;
                        document.getElementById('endIndex').textContent = end;
                        document.getElementById('totalEntries').textContent = total;
                    }

                    // Filter data based on search
                    function filterData() {
                        const searchQuery = document.getElementById('searchBar').value.toLowerCase();
                        filteredData = dummyData.filter(item => {
                            return Object.values(item).some(val => String(val).toLowerCase().includes(searchQuery));
                        });

                        currentPage = 1; // Reset to first page when searching
                        displayData(currentPage);
                    }

                    // Handle previous page
                    function previousPage() {
                        if (currentPage > 1) {
                            currentPage--;
                            displayData(currentPage);
                        }
                    }

                    // Handle next page
                    function nextPage() {
                        if (currentPage < Math.ceil(filteredData.length / rowsPerPage)) {
                            currentPage++;
                            displayData(currentPage);
                        }
                    }

                    // Initial data display
                    displayData(currentPage);
                </script>

                <!-- Edit Attendance Modal -->
                <div class="modal fade" id="editAttendanceModal" tabindex="-1"
                    aria-labelledby="editAttendanceModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="background-color: var(--form-color);">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editAttendanceModalLabel">Edit Attendance</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close" onclick="resetForm()"></button>
                            </div>
                            <div class="modal-body">
                                <form id="UpdateAttendanceForm">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="attendanceDate" class="form-label">Date</label>
                                            <input type="date" class="form-control" name="attendanceDate" id="attendanceDate" autocomplete="off" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="attendanceStatus" class="form-label">Attendance Status</label>
                                            <select class="form-select" name="attendanceStatus" id="attendanceStatus" autocomplete="off" required>
                                                <option value="" selected disabled>Select Status</option>
                                                <option value="Present">Present</option>
                                                <option value="Absent">Absent</option>
                                                <option value="HalfDay">Half Day</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal" onclick="resetForm()">Close</button>
                                <button type="submit" form="UpdateAttendanceForm" class="btn btn-primary">
                                    Update</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- script to reset form -->
                <script>
                    function resetForm() {
                        document.getElementById('UpdateAttendanceForm').reset();
                    }
                </script>
            </main>
        </div>

    </div>
    </div>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script End -->

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