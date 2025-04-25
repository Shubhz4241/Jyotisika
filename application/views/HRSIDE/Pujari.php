<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Pujari Requests</title>
    <!-- Bootstrap CSS for styling and layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets\css\style.css' ?>">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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
    <link rel="icon" href="<?= base_url('assets/images/admin/logo.png.png'); ?>" type="image/png">

    <style>
        /* Apply Inter font to the entire page */
        * {
            font-family: 'Inter', sans-serif;
        }

        /* Customize headers and table fonts for better readability */
        h1,
        h4,h3 {
            font-weight: 00;
        }

        p,
        td,
        th {
            font-size: 16px;

        }

        .table {

            width: 100%;
            overflow: hidden;
            /* Ensures the border-radius applies correctly */
        }

        /* Enhance table header appearance */
        .table thead th {
            font-weight: 600;
            background-color:rgb(222, 222, 227);
            height: 60px;
            text-align: center;
            vertical-align: middle;
            color: black;
            /* Ensure text is readable */
        }

        .table tbody tr {
            text-align: center;
            height: 66px;
        }

        .table tbody td {
            padding: 10px;
            vertical-align: middle;
        }

        /* Adjust buttons for better aesthetics */
        .btn {
            font-weight: 500;
            font-size: 0.9rem;
            background: none;
            border: none;
            cursor: pointer;
        }

        /* Mobile Responsiveness Improvements */
        @media (max-width: 768px) {
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
                display: flex;
                flex-direction: column;
                margin-bottom: 1rem;

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

        .btn {
            background-color: #0C768A;
        }

        .btn:hover {
            background-color:rgb(38, 127, 145);
        }

        /* Search and filter component styles */
        .search-filter-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding-left: 15px;
            padding-right: 35px;
            margin-bottom: 20px;
            width: 100%;
        }

        .search-input-container {
            position: relative;
            flex-grow: 1;
            border-radius: 5px;
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
            border: 1px solid #E8B931 !important;

            padding: 0 15px 0 45px;
            border-radius: 5px;
            border: none;
            background-color: rgb(235, 206, 120);
            color: #000;
            font-size: 15px;
            outline: none;
        }

        .search-input::placeholder {
            color: #000;
            opacity: 1;
        }

        .filter-button {
            background-color: #0C768A;
            color: #000;
            border: 1px solid #E8B931;
            border-radius: 5px;
            padding: 0 15px;
            height: 40px;
            min-width: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
        }

        .filter-button span {
            font-size: 14px;
        }

        .filter-icon {
            width: 16px;
            height: 16px;
        }

        .nav-pills .nav-link {
            background-color: #0C768A;
            color: white;
            border-radius: 5px;
            margin: 5px;
        }

        .nav-pills .nav-link.active {
            background-color: grey !important;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .search-filter-container {
                padding-left: 10px;
                padding-right: 10px;
            }

            .filter-button {
                min-width: 90px;
            }
        }

        @media (max-width: 768px) {
            .search-filter-container {
                flex-wrap: wrap;
                gap: 10px;
            }

            .search-input-container {
                width: 100%;
            }

            .filter-button {
                min-width: 80px;
            }

            .card-footer .btn {
                margin-top: 10px;
                padding: 10px 15px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .search-filter-container {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-button {
                width: 100%;
                margin-top: 5px;
            }
        }

        @media (min-width: 769px) {
            .card-footer .btn {
                max-width: 250px;
            }
        }
    </style>

</head>

<body style="background-color:rgb(228, 236, 241);">
    <div class="d-flex">
        <!-- Sidebar -->
        <?php $this->load->view('IncludeHR/SideBarHR'); ?>
        <!-- SIDEBAR END -->

        <!-- Main Component -->
        <div class="main mt-3">
            <!-- Navbar -->
            <?php $this->load->view('IncludeAdmin/CommanNavBar'); ?>
            <!-- Navbar End -->
            <main class="p-3">
                <div class="container">

                    <h4 class="float-start">Recent Pujari Requests</h4>

                    <!-- NAV TAB -->
                    <div class="float-end">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <ul class="nav nav-pills" id="myTabs" role="tablist">

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pending-tab" data-bs-toggle="pill"
                                        role="tab" aria-controls="pending" aria-selected="true"
                                        onclick="filterTable('pending')">
                                        Scheduled
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="approved-tab" data-bs-toggle="pill"
                                        role="tab" aria-controls="approved" aria-selected="false"
                                        onclick="filterTable('approved')">
                                        Approved
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="rejected-tab" data-bs-toggle="pill"
                                        role="tab" aria-controls="rejected" aria-selected="false"
                                        onclick="filterTable('rejected')">
                                        Rejected
                                    </button>
                                </li>
                            </ul>

                        </ul>
                    </div>

                    <!-- NAV TAB CONTENT -->
                    <div class="tab-content" id="pills-tabContent">

                        <!-- Rejected TAB -->
                        <div class="tab-pane fade show active" id="Rejected" role="tabpanel" aria-labelledby="Rejected-tab" tabindex="0">

                            <!-- main table container -->
                            <div class="container mt-3 mb-4">
                                <!-- Search Bar -->
                                <input type="text" id="searchBar" class="form-control mb-3 border-3 shadow-none" placeholder="Search..." onkeyup="filterData()">

                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table table-light table-hover" id="leaveTable">
                                        <thead>
                                            <tr>

                                                <th>Profile</th>
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Email</th>
                                                <th>Gender</th>
                                                <th>Address</th>
                                                <th>Languages Known</th>
                                                <th>Specialities</th>
                                                <th>AadharCard</th>
                                                <th>Experience</th>
                                                <th>Certificates</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody">
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!-- PDF Modal -->
                            <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="pdfModalLabel">Document Preview</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <iframe id="pdfViewer" src="" style="width: 100%; height: 500px;" frameborder="0"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="pagination" class="d-flex justify-content-center mt-3"></div>

                            <script>
    let currentPage = 1;
    const rowsPerPage = 7;
    let PujarisData = [];
    let filteredData = [];
    const basePath = ""; // No backend, so leave this empty or put your base URL

    async function fetchPujaris() {
        try {
            // Static dummy data
            PujarisData = [
                {
                    id: 1,
                    profile_image: "",
                    name: "Asha Mehta",
                    phone_number: "9876543210",
                    email: "asha@example.com",
                    gender: "Female",
                    address: "Lucknow",
                    languages_known: "Hindi, Sanskrit",
                    specialties: ["Palmistry", "Kundli"],
                    aadhar_card: "1234 5678 9101",
                    experience: "4 years",
                    certificates: ["Vedic Astrology Certificate", "Palmistry Diploma"],
                    status: "Pending Interview"
                },
                {
                    id: 2,
                    profile_image: "",
                    name: "Rahul Sen",
                    phone_number: "9123456789",
                    email: "rahul@example.com",
                    gender: "Male",
                    address: "Delhi",
                    languages_known: "Hindi, English",
                    specialties: ["Vedic Astrology"],
                    aadhar_card: "2345 6789 1012",
                    experience: "6 years",
                    certificates: ["Vedic Astrology Diploma"],
                    status: "Pending Interview"
                },
                {
                    id: 3,
                    profile_image: "",
                    name: "Divya Kapoor",
                    phone_number: "9988776655",
                    email: "divya@example.com",
                    gender: "Female",
                    address: "Mumbai",
                    languages_known: "English, Hindi",
                    specialties: ["Tarot Reading"],
                    aadhar_card: "3456 7890 1123",
                    experience: "3 years",
                    certificates: ["Tarot Card Reading Certification"],
                    status: "Pending Interview"
                },{
                    id: 4,
                    profile_image: "",
                    name: "Rahul Sen",
                    phone_number: "9123456789",
                    email: "rahul@example.com",
                    gender: "Male",
                    address: "Delhi",
                    languages_known: "Hindi, English",
                    specialties: ["Vedic Astrology"],
                    aadhar_card: "2345 6789 1012",
                    experience: "6 years",
                    certificates: ["Vedic Astrology Diploma"],
                    status: "Pending Interview"
                },{
                    id: 5,
                    profile_image: "",
                    name: "Rahul Sen",
                    phone_number: "9123456789",
                    email: "rahul@example.com",
                    gender: "Male",
                    address: "Delhi",
                    languages_known: "Hindi, English",
                    specialties: ["Vedic Astrology"],
                    aadhar_card: "2345 6789 1012",
                    experience: "6 years",
                    certificates: ["Vedic Astrology Diploma"],
                    status: "Pending Interview"
                },{
                    id: 6,
                    profile_image: "",
                    name: "Rahul Sen",
                    phone_number: "9123456789",
                    email: "rahul@example.com",
                    gender: "Male",
                    address: "Delhi",
                    languages_known: "Hindi, English",
                    specialties: ["Vedic Astrology"],
                    aadhar_card: "2345 6789 1012",
                    experience: "6 years",
                    certificates: ["Vedic Astrology Diploma"],
                    status: "Pending Interview"
                },{
                    id: 7,
                    profile_image: "",
                    name: "Rahul Sen",
                    phone_number: "9123456789",
                    email: "rahul@example.com",
                    gender: "Male",
                    address: "Delhi",
                    languages_known: "Hindi, English",
                    specialties: ["Vedic Astrology"],
                    aadhar_card: "2345 6789 1012",
                    experience: "6 years",
                    certificates: ["Vedic Astrology Diploma"],
                    status: "Pending Interview"
                },{
                    id: 8,
                    profile_image: "",
                    name: "Rahul Sen",
                    phone_number: "9123456789",
                    email: "rahul@example.com",
                    gender: "Male",
                    address: "Delhi",
                    languages_known: "Hindi, English",
                    specialties: ["Vedic Astrology"],
                    aadhar_card: "2345 6789 1012",
                    experience: "6 years",
                    certificates: ["Vedic Astrology Diploma"],
                    status: "Pending Interview"
                },{
                    id: 9,
                    profile_image: "",
                    name: "Rahul Sen",
                    phone_number: "9123456789",
                    email: "rahul@example.com",
                    gender: "Male",
                    address: "Delhi",
                    languages_known: "Hindi, English",
                    specialties: ["Vedic Astrology"],
                    aadhar_card: "2345 6789 1012",
                    experience: "6 years",
                    certificates: ["Vedic Astrology Diploma"],
                    status: "Pending Interview"
                },{
                    id: 10,
                    profile_image: "",
                    name: "Rahul Sen",
                    phone_number: "9123456789",
                    email: "rahul@example.com",
                    gender: "Male",
                    address: "Delhi",
                    languages_known: "Hindi, English",
                    specialties: ["Vedic Astrology"],
                    aadhar_card: "2345 6789 1012",
                    experience: "6 years",
                    certificates: ["Vedic Astrology Diploma"],
                    status: "Pending Interview"
                },
            ];

            // Load filtered data (default to Pending Interview)
            filterTable("Pending Interview");

        } catch (error) {
            console.error("Error fetching Pujaris:", error);
            document.getElementById("tableBody").innerHTML =
                `<tr><td colspan="12" class="text-center text-danger">Failed to load data.</td></tr>`;
        }
    }

    function filterTable(status) {
        filteredData = PujarisData.filter(item => item.status.toLowerCase() === status.toLowerCase());
        currentPage = 1;
        displayData(currentPage);
    }

    function displayData(page) {
        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        const paginatedData = filteredData.slice(start, end);

        const tableBody = document.getElementById('tableBody');
        tableBody.innerHTML = '';

        if (paginatedData.length === 0) {
            tableBody.innerHTML = `<tr><td colspan="12" class="text-center text-muted">No Pujaris found.</td></tr>`;
            updatePagination();
            return;
        }

        paginatedData.forEach(item => {
            const specialtiesText = item.specialties.length > 0 ? item.specialties.join(', ') : '-';
            const certificatesText = item.certificates ? item.certificates.join(', ') : '-';

            const row = `
                <tr>
                    <td><img src="${item.profile_image || '<?php echo base_url('assets/images/HRside/Profile1.png')?>" width="40"'}" alt="Profile" class="profile-img" width="40"></td>
                    <td>${item.name || '-'}</td>
                    <td>${item.phone_number || '-'}</td>
                    <td>${item.email || '-'}</td>
                    <td>${item.gender || '-'}</td>
                    <td>${item.address || '-'}</td>
                    <td>${item.languages_known || '-'}</td>
                    <td>${specialtiesText}</td>
                    <td>${item.aadhar_card || '-'}</td>
                    <td>${item.experience || '-'}</td>
                    <td>${certificatesText}</td>
                    <td class="text-center">
<button class="btn btn-sm btn-primary" onclick="window.location.href='PujariRequest'">View</button>
                    </td>
                </tr>
            `;

            tableBody.innerHTML += row;
        });

        updatePagination();
    }

    function viewPujari(name) {
        alert(`Viewing Pujari profile: ${name}`);
    }

    function filterData() {
        const searchInput = document.getElementById('searchBar').value.toLowerCase();
        filteredData = PujarisData.filter(item =>
            item.name.toLowerCase().includes(searchInput) ||
            item.phone_number.toLowerCase().includes(searchInput) ||
            item.email.toLowerCase().includes(searchInput) ||
            item.gender.toLowerCase().includes(searchInput) ||
            item.address.toLowerCase().includes(searchInput) ||
            item.languages_known.toLowerCase().includes(searchInput) ||
            item.specialties.join(', ').toLowerCase().includes(searchInput) ||
            item.experience.toLowerCase().includes(searchInput)
        );
        currentPage = 1;
        displayData(currentPage);
    }

    function updatePagination() {
        const totalPages = Math.ceil(filteredData.length / rowsPerPage);
        const pagination = document.getElementById('pagination');
        pagination.innerHTML = '';

        let prevButton = `<button class="btn btn-light" onclick="changePage(${currentPage - 1})" ${currentPage === 1 ? 'disabled' : ''}>Previous</button>`;
        pagination.innerHTML += prevButton;

        for (let i = 1; i <= totalPages; i++) {
            let pageButton = `<button class="btn ${i === currentPage ? 'btn-primary' : 'btn-light'}" onclick="changePage(${i})">${i}</button>`;
            pagination.innerHTML += pageButton;
        }

        let nextButton = `<button class="btn btn-light" onclick="changePage(${currentPage + 1})" ${currentPage === totalPages ? 'disabled' : ''}>Next</button>`;
        pagination.innerHTML += nextButton;
    }

    function changePage(page) {
        const totalPages = Math.ceil(filteredData.length / rowsPerPage);
        if (page < 1 || page > totalPages) return;
        currentPage = page;
        displayData(currentPage);
    }

    // Load on page start
    document.addEventListener("DOMContentLoaded", fetchPujaris);
</script>


                        </div>

                    </div>
                </div>
            </main>

        </div>
    </div>
    <!-- Modal Structure -->
    <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">PDF Viewer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- PDF iframe -->
                    <iframe id="pdfViewe3" src="" width="100%" height="500px" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.btn-info').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default anchor behavior
                const pdfUrl = "assets/images/CC UNIT II.pdf"; // Replace with your PDF URL
                document.getElementById('pdfViewer3').src = pdfUrl;
            });
        });
    </script>
    <!-- Modal Structure End -->

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>
