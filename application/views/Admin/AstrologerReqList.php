<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin:Astrologer Requests</title>
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
        <div class="main mt-3">
            <!-- Navbar -->
            <?php $this->load->view('IncludeAdmin/CommanNavbar'); ?>
            <!-- Navbar End -->
            <main class="p-3">
                <div class="container">

                    <h2 class="float-start">Astrologer Request List</h2>

                    <!-- NAV TAB -->
                    <div class="float-end">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pending-tab" data-bs-toggle="pill" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="true">
                                    Pending
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="accepted-tab" data-bs-toggle="pill" data-bs-target="#accepted" type="button" role="tab" aria-controls="accepted" aria-selected="false">
                                    Approved
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="rejected-tab" data-bs-toggle="pill" data-bs-target="#rejected" type="button" role="tab" aria-controls="rejected" aria-selected="false">
                                    Rejected
                                </button>
                            </li>
                        </ul>
                    </div>

                    <!-- NAV TAB CONTENT -->
                    <div class="tab-content" id="pills-tabContent">

                        <!-- PENDING TAB -->
                        <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tab" tabindex="0">
                            <div class="container mt-3 mb-4">
                                <!-- Search Bar -->
                                <input type="text" id="searchBar" class="form-control mb-3 border-3 shadow-none" placeholder="Search..." onkeyup="filterData()">

                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-light table-hover table-responsive" id="leaveTable">
                                        <thead>
                                            <tr>
                                                <th style="min-width: 100px;">Sr. No</th>
                                                <th style="min-width: 120px;">Profile</th>
                                                <th style="min-width: 180px;">Name</th>
                                                <th style="min-width: 150px;">Contact</th>
                                                <th style="min-width: 200px;">Email</th>
                                                <th style="min-width: 120px;">Gender</th>
                                                <th style="min-width: 180px;">Language Known</th>
                                                <th style="min-width: 200px;">Specialities</th>
                                                <th style="min-width: 180px;">Aadhar PDF</th>
                                                <th style="min-width: 200px;">Certifications PDF</th>
                                                <th style="min-width: 150px;" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody"></tbody>
                                    </table>
                                </div>

                                <!-- Pagination Buttons -->
                                <div class="d-flex justify-content-end gap-2">
                                    <button id="prevBtn" class="btn btn-sm btn-primary" onclick="previousPage()">Previous</button>
                                    <div id="pageNumbers" class="btn-group"></div>
                                    <button id="nextBtn" class="btn btn-sm btn-primary" onclick="nextPage()">Next</button>
                                </div>

                                <!-- PDF Modal -->
                                <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="pdfModalLabel">View PDF</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe id="pdfViewer" src="" width="100%" height="500px"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            let currentPage = 1;
                            const rowsPerPage = 8;

                            // Sample Data
                            const dummyData = [{
                                    srNo: "1",
                                    profile: "assets/images/astrologer.png",
                                    name: "John Doe",
                                    contact: "123-456-7890",
                                    email: "johndoe@example.com",
                                    gender: "Male",
                                    language: "English, Spanish",
                                    specialities: "Web Development, UI/UX",
                                    aadhar: "Aadhar_Document.pdf",
                                    certifications: "FullStack_Certificate.pdf"
                                },
                                {
                                    srNo: "2",
                                    profile: "assets/images/astrologer.png",
                                    name: "Jane Smith",
                                    contact: "987-654-3210",
                                    email: "janesmith@example.com",
                                    gender: "Female",
                                    language: "English, French",
                                    specialities: "Graphic Design, Branding",
                                    aadhar: "Aadhar_Jane.pdf",
                                    certifications: "Adobe_Design_Certificate.pdf"
                                },
                                {
                                    srNo: "3",
                                    profile: "assets/images/astrologer.png",
                                    name: "Jane Smith",
                                    contact: "987-654-3210",
                                    email: "janesmith@example.com",
                                    gender: "Female",
                                    language: "English, French",
                                    specialities: "Graphic Design, Branding",
                                    aadhar: "Aadhar_Jane.pdf",
                                    certifications: "Adobe_Design_Certificate.pdf"
                                },
                                {
                                    srNo: "4",
                                    profile: "assets/images/astrologer.png",
                                    name: "Jane Smith",
                                    contact: "987-654-3210",
                                    email: "janesmith@example.com",
                                    gender: "Female",
                                    language: "English, French",
                                    specialities: "Graphic Design, Branding",
                                    aadhar: "Aadhar_Jane.pdf",
                                    certifications: "Adobe_Design_Certificate.pdf"
                                },
                                {
                                    srNo: "5",
                                    profile: "assets/images/astrologer.png",
                                    name: "Jane Smith",
                                    contact: "987-654-3210",
                                    email: "janesmith@example.com",
                                    gender: "Female",
                                    language: "English, French",
                                    specialities: "Graphic Design, Branding",
                                    aadhar: "Aadhar_Jane.pdf",
                                    certifications: "Adobe_Design_Certificate.pdf"
                                },
                                {
                                    srNo: "6",
                                    profile: "assets/images/astrologer.png",
                                    name: "Jane Smith",
                                    contact: "987-654-3210",
                                    email: "janesmith@example.com",
                                    gender: "Female",
                                    language: "English, French",
                                    specialities: "Graphic Design, Branding",
                                    aadhar: "Aadhar_Jane.pdf",
                                    certifications: "Adobe_Design_Certificate.pdf"
                                },
                                {
                                    srNo: "7",
                                    profile: "assets/images/astrologer.png",
                                    name: "Jane Smith",
                                    contact: "987-654-3210",
                                    email: "janesmith@example.com",
                                    gender: "Female",
                                    language: "English, French",
                                    specialities: "Graphic Design, Branding",
                                    aadhar: "Aadhar_Jane.pdf",
                                    certifications: "Adobe_Design_Certificate.pdf"
                                },
                                {
                                    srNo: "8",
                                    profile: "assets/images/astrologer.png",
                                    name: "Jane Smith",
                                    contact: "987-654-3210",
                                    email: "janesmith@example.com",
                                    gender: "Female",
                                    language: "English, French",
                                    specialities: "Graphic Design, Branding",
                                    aadhar: "Aadhar_Jane.pdf",
                                    certifications: "Adobe_Design_Certificate.pdf"
                                },
                                {
                                    srNo: "9",
                                    profile: "assets/images/astrologer.png",
                                    name: "Jane Smith",
                                    contact: "987-654-3210",
                                    email: "janesmith@example.com",
                                    gender: "Female",
                                    language: "English, French",
                                    specialities: "Graphic Design, Branding",
                                    aadhar: "Aadhar_Jane.pdf",
                                    certifications: "Adobe_Design_Certificate.pdf"
                                },
                                {
                                    srNo: "10",
                                    profile: "assets/images/astrologer.png",
                                    name: "Jane Smith",
                                    contact: "987-654-3210",
                                    email: "janesmith@example.com",
                                    gender: "Female",
                                    language: "English, French",
                                    specialities: "Graphic Design, Branding",
                                    aadhar: "Aadhar_Jane.pdf",
                                    certifications: "Adobe_Design_Certificate.pdf"
                                },
                                {
                                    srNo: "11",
                                    profile: "assets/images/astrologer.png",
                                    name: "Jane Smith",
                                    contact: "987-654-3210",
                                    email: "janesmith@example.com",
                                    gender: "Female",
                                    language: "English, French",
                                    specialities: "Graphic Design, Branding",
                                    aadhar: "Aadhar_Jane.pdf",
                                    certifications: "Adobe_Design_Certificate.pdf"
                                },
                            ];

                            let filteredData = [...dummyData];

                            function displayData(page) {
                                const start = (page - 1) * rowsPerPage;
                                const end = start + rowsPerPage;
                                const paginatedData = filteredData.slice(start, end);

                                const tableBody = document.getElementById("tableBody");
                                tableBody.innerHTML = "";

                                paginatedData.forEach(item => {
                                    const row = `
                                        <tr>
                                            <td>${item.srNo}</td>
                                            <td><img src="${item.profile}" alt="Profile" style="width:50px; height:50px; border-radius:50%;"></td>
                                            <td>${item.name}</td>
                                            <td>${item.contact}</td>
                                            <td>${item.email}</td>
                                            <td>${item.gender}</td>
                                            <td>${item.language}</td>
                                            <td>${item.specialities}</td>
                                            <td><a href="#" onclick="openPdfModal('${item.aadhar}')">${item.aadhar}</a></td>
                                            <td><a href="#" onclick="openPdfModal('${item.certifications}')">${item.certifications}</a></td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-primary" onclick="window.location.href='viewastrologer?srNo=${item.srNo}'">View</button>
                                            </td>
                                        </tr>
                                    `;
                                    tableBody.innerHTML += row;
                                });
                            }

                            function openPdfModal(pdfFileName) {
                                const pdfViewer = document.getElementById('pdfViewer');
                                const pdfUrl = `assets/images/CC UNIT II.pdf`; // Update with the correct file path
                                pdfViewer.src = pdfUrl;

                                const modal = new bootstrap.Modal(document.getElementById('pdfModal'));
                                modal.show();
                            }

                            function viewDetails(srNo) {
                                alert(`Viewing details for Sr. No: ${srNo}`);
                            }

                            function previousPage() {
                                if (currentPage > 1) {
                                    currentPage--;
                                    displayData(currentPage);
                                }
                            }

                            function nextPage() {
                                if (currentPage * rowsPerPage < filteredData.length) {
                                    currentPage++;
                                    displayData(currentPage);
                                }
                            }

                            displayData(currentPage);
                        </script>


                        <!-- ACCEPTED TAB -->
                        <div class="tab-pane fade" id="accepted" role="tabpanel" aria-labelledby="accepted-tab" tabindex="0">
                            <div class="container mt-3 mb-4">
                                <!-- Search Bar -->
                                <input type="text" id="searchBar2" class="form-control mb-3 border-3 shadow-none" placeholder="Search..." onkeyup="filterData2()">

                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-light table-hover table-responsive" id="acceptedLeaveTable">
                                        <thead>
                                            <tr>
                                                <th style="min-width: 100px;">Sr. No</th>
                                                <th style="min-width: 120px;">Profile</th>
                                                <th style="min-width: 180px;">Name</th>
                                                <th style="min-width: 150px;">Contact</th>
                                                <th style="min-width: 200px;">Email</th>
                                                <th style="min-width: 120px;">Gender</th>
                                                <th style="min-width: 180px;">Language Known</th>
                                                <th style="min-width: 200px;">Specialities</th>
                                                <th style="min-width: 180px;">Aadhar PDF</th>
                                                <th style="min-width: 200px;">Certifications PDF</th>
                                                <th style="min-width: 150px;" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="acceptedTableBody">
                                            <!-- Rows will be dynamically added here -->
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pagination Buttons -->
                                <div class="d-flex justify-content-end gap-2">
                                    <button id="prevBtn2" class="btn btn-sm btn-primary" onclick="previousPage2()">Previous</button>
                                    <div id="pageNumbers2" class="btn-group"></div>
                                    <button id="nextBtn2" class="btn btn-sm btn-primary" onclick="nextPage2()">Next</button>
                                </div>
                                <!-- PDF Modal -->
                                <div class="modal fade" id="approvedPdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="pdfModalLabel">PDF Preview</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe id="pdfViewer2" src="" width="100%" height="500px" frameborder="0"></iframe>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                let currentPage2 = 1;
                                const rowsPerPage2 = 8;

                                // Sample Data
                                const dummyData2 = [{
                                        srNo: "1",
                                        profile: "assets/images/astrologer.png",
                                        name: "John Doe",
                                        contact: "123-456-7890",
                                        email: "johndoe@example.com",
                                        gender: "Male",
                                        language: "English, Spanish",
                                        specialities: "Web Development, UI/UX",
                                        aadhar: "Aadhar_Document.pdf",
                                        certifications: "FullStack_Certificate.pdf"
                                    },
                                    {
                                        srNo: "2",
                                        profile: "assets/images/astrologer.png",
                                        name: "John Doe",
                                        contact: "123-456-7890",
                                        email: "johndoe@example.com",
                                        gender: "Male",
                                        language: "English, Spanish",
                                        specialities: "Web Development, UI/UX",
                                        aadhar: "Aadhar_Document.pdf",
                                        certifications: "FullStack_Certificate.pdf"
                                    },
                                    {
                                        srNo: "3",
                                        profile: "assets/images/astrologer.png",
                                        name: "John Doe",
                                        contact: "123-456-7890",
                                        email: "johndoe@example.com",
                                        gender: "Male",
                                        language: "English, Spanish",
                                        specialities: "Web Development, UI/UX",
                                        aadhar: "Aadhar_Document.pdf",
                                        certifications: "FullStack_Certificate.pdf"
                                    },
                                    {
                                        srNo: "4",
                                        profile: "assets/images/astrologer.png",
                                        name: "John Doe",
                                        contact: "123-456-7890",
                                        email: "johndoe@example.com",
                                        gender: "Male",
                                        language: "English, Spanish",
                                        specialities: "Web Development, UI/UX",
                                        aadhar: "Aadhar_Document.pdf",
                                        certifications: "FullStack_Certificate.pdf"
                                    },
                                    {
                                        srNo: "5",
                                        profile: "assets/images/astrologer.png",
                                        name: "John Doe",
                                        contact: "123-456-7890",
                                        email: "johndoe@example.com",
                                        gender: "Male",
                                        language: "English, Spanish",
                                        specialities: "Web Development, UI/UX",
                                        aadhar: "Aadhar_Document.pdf",
                                        certifications: "FullStack_Certificate.pdf"
                                    },
                                    {
                                        srNo: "6",
                                        profile: "assets/images/astrologer.png",
                                        name: "John Doe",
                                        contact: "123-456-7890",
                                        email: "johndoe@example.com",
                                        gender: "Male",
                                        language: "English, Spanish",
                                        specialities: "Web Development, UI/UX",
                                        aadhar: "Aadhar_Document.pdf",
                                        certifications: "FullStack_Certificate.pdf"
                                    },
                                    {
                                        srNo: "7",
                                        profile: "assets/images/astrologer.png",
                                        name: "John Doe",
                                        contact: "123-456-7890",
                                        email: "johndoe@example.com",
                                        gender: "Male",
                                        language: "English, Spanish",
                                        specialities: "Web Development, UI/UX",
                                        aadhar: "Aadhar_Document.pdf",
                                        certifications: "FullStack_Certificate.pdf"
                                    },
                                    {
                                        srNo: "8",
                                        profile: "assets/images/astrologer.png",
                                        name: "John Doe",
                                        contact: "123-456-7890",
                                        email: "johndoe@example.com",
                                        gender: "Male",
                                        language: "English, Spanish",
                                        specialities: "Web Development, UI/UX",
                                        aadhar: "Aadhar_Document.pdf",
                                        certifications: "FullStack_Certificate.pdf"
                                    },
                                    {
                                        srNo: "9",
                                        profile: "assets/images/astrologer.png",
                                        name: "John Doe",
                                        contact: "123-456-7890",
                                        email: "johndoe@example.com",
                                        gender: "Male",
                                        language: "English, Spanish",
                                        specialities: "Web Development, UI/UX",
                                        aadhar: "Aadhar_Document.pdf",
                                        certifications: "FullStack_Certificate.pdf"
                                    },
                                    {
                                        srNo: "10",
                                        profile: "assets/images/astrologer.png",
                                        name: "John Doe",
                                        contact: "123-456-7890",
                                        email: "johndoe@example.com",
                                        gender: "Male",
                                        language: "English, Spanish",
                                        specialities: "Web Development, UI/UX",
                                        aadhar: "Aadhar_Document.pdf",
                                        certifications: "FullStack_Certificate.pdf"
                                    },
                                    // Add more dummy entries as required
                                ];

                                let filteredData2 = [...dummyData2]; // Keep a filtered copy of the data

                                // Function to display data based on page
                                function displayData2(page) {
                                    const start = (page - 1) * rowsPerPage2;
                                    const end = start + rowsPerPage2;
                                    const paginatedData = filteredData2.slice(start, end);

                                    const tableBody = document.getElementById('acceptedTableBody');
                                    tableBody.innerHTML = ''; // Clear existing table content

                                    paginatedData.forEach(item => {
                                        const row = `
                                        <tr>
                                            <td>${item.srNo}</td>
                                            <td><img src="${item.profile}" alt="Profile" style="width:50px; height:50px; border-radius:50%;"></td>
                                            <td>${item.name}</td>
                                            <td>${item.contact}</td>
                                            <td>${item.email}</td>
                                            <td>${item.gender}</td>
                                            <td>${item.language}</td>
                                            <td>${item.specialities}</td>
                                            <td><a href="#" onclick="openPdfModal2('${item.aadhar}')">${item.aadhar}</a></td>
                                            <td><a href="#" onclick="openPdfModal2('${item.certifications}')">${item.certifications}</a></td>
                                            <td class="text-center">
                                                <span class="badge bg-success">Approved</span>
                                            </td>
                                        </tr>`;
                                        tableBody.innerHTML += row;
                                    });

                                    updatePagination2();
                                    updateShowingEntries2(start + 1, Math.min(end, filteredData2.length), filteredData2.length);
                                }

                                // Update pagination
                                function updatePagination2() {
                                    const pageNumbers = document.getElementById('pageNumbers2');
                                    pageNumbers.innerHTML = ''; // Clear existing page numbers

                                    const totalPages = Math.ceil(filteredData2.length / rowsPerPage2);
                                    for (let i = 1; i <= totalPages; i++) {
                                        const btn = document.createElement('button');
                                        btn.className = `btn btn-sm ${currentPage2 === i ? 'btn-primary' : 'btn-secondary'}`;
                                        btn.textContent = i;
                                        btn.onclick = () => {
                                            currentPage2 = i;
                                            displayData2(currentPage2);
                                        };
                                        pageNumbers.appendChild(btn);
                                    }

                                    document.getElementById('prevBtn2').disabled = currentPage2 === 1;
                                    document.getElementById('nextBtn2').disabled = currentPage2 === totalPages;
                                }

                                // Update entries showing info
                                function updateShowingEntries2(start, end, total) {
                                    document.getElementById('startIndex').textContent = start;
                                    document.getElementById('endIndex').textContent = end;
                                    document.getElementById('totalEntries').textContent = total;
                                }

                                // Filter data based on search
                                function filterData2() {
                                    const searchQuery = document.getElementById('searchBar2').value.toLowerCase();
                                    filteredData2 = dummyData2.filter(item => {
                                        return Object.values(item).some(val => String(val).toLowerCase().includes(searchQuery));
                                    });

                                    currentPage2 = 1; // Reset to first page when searching
                                    displayData2(currentPage2);
                                }

                                // Handle previous page
                                function previousPage2() {
                                    if (currentPage2 > 1) {
                                        currentPage2--;
                                        displayData2(currentPage2);
                                    }
                                }

                                // Handle next page
                                function nextPage2() {
                                    if (currentPage2 < Math.ceil(filteredData2.length / rowsPerPage2)) {
                                        currentPage2++;
                                        displayData2(currentPage2);
                                    }
                                }

                                // Initial data display
                                displayData2(currentPage2);

                                function openPdfModal2(pdfFileName2) {
                                    const pdfViewer2 = document.getElementById('pdfViewer2');
                                    const pdfUrl = `assets/images/CC UNIT II.pdf`; // Update with the correct file path
                                    pdfViewer2.src = pdfUrl;

                                    // Show the modal using the correct modal ID
                                    const modal = new bootstrap.Modal(document.getElementById('approvedPdfModal'));
                                    modal.show();
                                }
                            </script>

                        </div>

                        <!-- REJECTED TAB -->
                        <div class="tab-pane fade" id="rejected" role="tabpanel" aria-labelledby="rejected-tab" tabindex="0">

                            <div class="container mt-3 mb-4">
                                <!-- Search Bar -->
                                <input type="text" id="searchBar3" class="form-control mb-3 border-3 shadow-none" placeholder="Search..." onkeyup="filterData3()">

                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-light table-hover table-responsive" id="rejectedLeaveTable">
                                        <thead>
                                            <tr>
                                                <th style="min-width: 100px;">Sr. No</th>
                                                <th style="min-width: 120px;">Profile</th>
                                                <th style="min-width: 180px;">Name</th>
                                                <th style="min-width: 150px;">Contact</th>
                                                <th style="min-width: 200px;">Email</th>
                                                <th style="min-width: 120px;">Gender</th>
                                                <th style="min-width: 180px;">Language Known</th>
                                                <th style="min-width: 200px;">Specialities</th>
                                                <th style="min-width: 180px;">Aadhar PDF</th>
                                                <th style="min-width: 200px;">Certifications PDF</th>
                                                <th style="min-width: 150px;" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="rejectedTableBody"></tbody>
                                    </table>
                                </div>


                                <!-- Pagination Buttons -->
                                <div class="d-flex justify-content-end gap-2">
                                    <button id="prevBtn3" class="btn btn-sm btn-primary" onclick="previousPage3()">Previous</button>
                                    <div id="pageNumbers3" class="btn-group"></div>
                                    <button id="nextBtn3" class="btn btn-sm btn-primary" onclick="nextPage3()">Next</button>
                                </div>
                                <!-- PDF Modal -->
                                <div class="modal fade" id="rejectedPdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="pdfModalLabel">PDF Preview</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe id="pdfViewer3" src="" width="100%" height="500px" frameborder="0"></iframe>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                let currentPage3 = 1;
                                const rowsPerPage3 = 8;

                                // Sample Data
                                const dummyData3 = [{
                                        srNo: "1",
                                        profile: "assets/images/astrologer.png",
                                        name: "John Doe",
                                        contact: "123-456-7890",
                                        email: "johndoe@example.com",
                                        gender: "Male",
                                        language: "English, Spanish",
                                        specialities: "Web Development, UI/UX",
                                        aadhar: "Aadhar_Document.pdf",
                                        certifications: "FullStack_Certificate.pdf"
                                    },
                                    // Add more entries as needed
                                ];

                                let filteredData3 = [...dummyData3]; // Keep a filtered copy of the data

                                // Function to display data based on page
                                function displayData3(page) {
                                    const start = (page - 1) * rowsPerPage3;
                                    const end = start + rowsPerPage3;
                                    const paginatedData = filteredData3.slice(start, end);

                                    const tableBody = document.getElementById('rejectedTableBody');
                                    tableBody.innerHTML = ''; // Clear existing table content

                                    paginatedData.forEach(item => {
                                        const row = `
                                    <tr>
                                        <td>${item.srNo}</td>
                                        <td><img src="${item.profile}" alt="Profile" style="width:50px; height:50px; border-radius:50%;"></td>
                                        <td>${item.name}</td>
                                        <td>${item.contact}</td>
                                        <td>${item.email}</td>
                                        <td>${item.gender}</td>
                                        <td>${item.language}</td>
                                        <td>${item.specialities}</td>
                                        <td><a href="#" onclick="openPdfModal3('${item.aadhar}')">${item.aadhar}</a></td>
                                        <td><a href="#" onclick="openPdfModal3('${item.certifications}')">${item.certifications}</a></td>
                                        <td class="text-center">
                                            <span class="badge bg-danger">Rejected</span>
                                        </td>
                                    </tr>`;
                                        tableBody.innerHTML += row;
                                    });

                                    updatePagination3();
                                    updateShowingEntries3(start + 1, Math.min(end, filteredData3.length), filteredData3.length);
                                }

                                // Update pagination
                                function updatePagination3() {
                                    const pageNumbers = document.getElementById('pageNumbers3');
                                    pageNumbers.innerHTML = ''; // Clear existing page numbers

                                    const totalPages = Math.ceil(filteredData3.length / rowsPerPage3);
                                    for (let i = 1; i <= totalPages; i++) {
                                        const btn = document.createElement('button');
                                        btn.className = `btn btn-sm ${currentPage3 === i ? 'btn-primary' : 'btn-secondary'}`;
                                        btn.textContent = i;
                                        btn.onclick = () => {
                                            currentPage3 = i;
                                            displayData3(currentPage3);
                                        };
                                        pageNumbers.appendChild(btn);
                                    }

                                    document.getElementById('prevBtn3').disabled = currentPage3 === 1;
                                    document.getElementById('nextBtn3').disabled = currentPage3 === totalPages;
                                }

                                // Update entries showing info
                                function updateShowingEntries3(start, end, total) {
                                    document.getElementById('startIndex3').textContent = start;
                                    document.getElementById('endIndex3').textContent = end;
                                    document.getElementById('totalEntries3').textContent = total;
                                }

                                // Filter data based on search
                                function filterData3() {
                                    const searchQuery = document.getElementById('searchBar3').value.toLowerCase();
                                    filteredData3 = dummyData3.filter(item => {
                                        return Object.values(item).some(val => String(val).toLowerCase().includes(searchQuery));
                                    });

                                    currentPage3 = 1; // Reset to first page when searching
                                    displayData3(currentPage3);
                                }

                                // Handle previous page
                                function previousPage3() {
                                    if (currentPage3 > 1) {
                                        currentPage3--;
                                        displayData3(currentPage3);
                                    }
                                }

                                // Handle next page
                                function nextPage3() {
                                    if (currentPage3 < Math.ceil(filteredData3.length / rowsPerPage3)) {
                                        currentPage3++;
                                        displayData3(currentPage3);
                                    }
                                }

                                // Initial data display
                                displayData3(currentPage3);

                                function openPdfModal3(pdfFileName3) {
                                    const pdfViewer3 = document.getElementById('pdfViewer3');
                                    const pdfUrl = `assets/images/CC UNIT II.pdf`; // Update with the correct file path
                                    pdfViewer3.src = pdfUrl;

                                    // Show the modal using the correct modal ID
                                    const modal = new bootstrap.Modal(document.getElementById('rejectedPdfModal'));
                                    modal.show();
                                }
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
</body>

</html>