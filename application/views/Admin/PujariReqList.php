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
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
        h1, h4, h3 {
            font-weight: 400;
        }

        p, td, th {
            font-size: 16px;
        }

        .table {
            width: 100%;
            overflow: hidden;
        }

        /* Enhance table header appearance */
        .table thead th {
            font-weight: 600;
            background-color: rgb(222, 222, 227);
            height: 60px;
            text-align: center;
            vertical-align: middle;
            color: black;
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
            cursor: pointer;
        }

        /* Mobile Responsiveness Improvements */
        @media (max-width: 768px) {
            .table-responsive {
                font-size: 0.8rem;
            }

            .table td, .table th {
                padding: 0.5rem;
            }

            .btn-sm {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }

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

        .btn-primary {
            background-color: #0C768A;
            border: none;
        }

        .btn-primary:hover {
            background-color: rgb(38, 127, 145);
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
            color: white;
        }

        .btn-info:hover {
            background-color: #138496;
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

<body style="background-color: rgb(228, 236, 241);">
    <div class="d-flex">
        <!-- Sidebar -->
        <?php $this->load->view('IncludeAdmin/CommanSidebar'); ?>
        <!-- SIDEBAR END -->

        <!-- Main Component -->
        <div class="main mt-3">
            <?php $this->load->view('IncludeAdmin/CommanNavbar'); ?>

            <main class="p-3">
                <div class="container">
                    <h4 class="float-start">Recent Pujari Requests</h4>

                    <!-- NAV TAB -->
                    <div class="float-end">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="newest-tab" data-bs-toggle="pill" role="tab" aria-controls="newest" aria-selected="false" onclick="filterTable('newest')">Newest Requests</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pending-tab" data-bs-toggle="pill" role="tab" aria-controls="pending" aria-selected="false" onclick="filterTable('pending')">Scheduled</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="approved-tab" data-bs-toggle="pill" role="tab" aria-controls="approved" aria-selected="false" onclick="filterTable('approved')">Approved</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="rejected-tab" data-bs-toggle="pill" role="tab" aria-controls="rejected" aria-selected="false" onclick="filterTable('rejected')">Rejected</button>
                            </li>
                        </ul>
                    </div>

                    <!-- NAV TAB CONTENT -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="PujariTable" role="tabpanel" tabindex="0">
                            <div class="container mt-3 mb-4">
                                <!-- Search Bar -->
                                <input type="text" id="searchBar" class="form-control mb-3 border-3 shadow-none" placeholder="Search..." onkeyup="filterData()">

                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table table-light table-hover" id="leaveTable">
                                        <thead>
                                            <tr>
                                                <th>Sr. No</th>
                                                <th>Profile</th>
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Gender</th>
                                                <th>Address</th>
                                                <th>Languages Known</th>
                                                <th>Specialities</th>
                                                <th>Experience</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody"></tbody>
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
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

    <!-- Main Data Script -->
    <script>
        let currentPage = 1;
        const rowsPerPage = 7;
        let PujarisData = [];
        let filteredData = [];
        const basePath = "";

        async function fetchPujaris() {
            try {
                PujarisData = [
                    // Newest Requests - 10 rows
                    {
                        id: 1,
                        profile_image: "",
                        name: "Kavita Sharma",
                        phone_number: "9876543210",
                        email: "kavita@example.com",
                        gender: "Female",
                        address: "Delhi",
                        languages_known: "Hindi, English",
                        specialties: ["Tarot Reading", "Numerology"],
                        aadhar_card_pdf: "assets/aadhar/id1.pdf",
                        experience: "2 years",
                        certificates: ["Tarot Basics"],
                        status: "New Request"
                    },
                    {
                        id: 2,
                        profile_image: "",
                        name: "Amit Patel",
                        phone_number: "9123456789",
                        email: "amit.patel@example.com",
                        gender: "Male",
                        address: "Mumbai",
                        languages_known: "Hindi, Marathi",
                        specialties: ["Vedic Astrology"],
                        aadhar_card_pdf: "assets/aadhar/id2.pdf",
                        experience: "3 years",
                        certificates: ["Vedic Astrology Intro"],
                        status: "New Request"
                    },
                    {
                        id: 3,
                        profile_image: "",
                        name: "Sneha Roy",
                        phone_number: "9988776655",
                        email: "sneha.roy@example.com",
                        gender: "Female",
                        address: "Kolkata",
                        languages_known: "Bengali, Hindi",
                        specialties: ["Palmistry"],
                        aadhar_card_pdf: "assets/aadhar/id3.pdf",
                        experience: "1 year",
                        certificates: [],
                        status: "New Request"
                    },
                    {
                        id: 4,
                        profile_image: "",
                        name: "Vikas Gupta",
                        phone_number: "9876541234",
                        email: "vikas.gupta@example.com",
                        gender: "Male",
                        address: "Jaipur",
                        languages_known: "Hindi, Rajasthani",
                        specialties: ["Kundli Matching"],
                        aadhar_card_pdf: "assets/aadhar/id4.pdf",
                        experience: "2 years",
                        certificates: ["Kundli Basics"],
                        status: "New Request"
                    },
                    {
                        id: 5,
                        profile_image: "",
                        name: "Priyanka Nair",
                        phone_number: "9123459876",
                        email: "priyanka.nair@example.com",
                        gender: "Female",
                        address: "Chennai",
                        languages_known: "Tamil, English",
                        specialties: ["Vastu Shastra"],
                        aadhar_card_pdf: "assets/aadhar/id5.pdf",
                        experience: "3 years",
                        certificates: ["Vastu Intro"],
                        status: "New Request"
                    },
                    {
                        id: 6,
                        profile_image: "",
                        name: "Rahul Desai",
                        phone_number: "9988775544",
                        email: "rahul.desai@example.com",
                        gender: "Male",
                        address: "Ahmedabad",
                        languages_known: "Gujarati, Hindi",
                        specialties: ["Horoscope Analysis"],
                        aadhar_card_pdf: "assets/aadhar/id6.pdf",
                        experience: "2 years",
                        certificates: [],
                        status: "New Request"
                    },
                    {
                        id: 7,
                        profile_image: "",
                        name: "Anjali Verma",
                        phone_number: "9876544321",
                        email: "anjali.verma@example.com",
                        gender: "Female",
                        address: "Lucknow",
                        languages_known: "Hindi, Urdu",
                        specialties: ["Astrology Consultation"],
                        aadhar_card_pdf: "assets/aadhar/id7.pdf",
                        experience: "1 year",
                        certificates: [],
                        status: "New Request"
                    },
                    {
                        id: 8,
                        profile_image: "",
                        name: "Suresh Reddy",
                        phone_number: "9123458765",
                        email: "suresh.reddy@example.com",
                        gender: "Male",
                        address: "Hyderabad",
                        languages_known: "Telugu, English",
                        specialties: ["Palm Reading"],
                        aadhar_card_pdf: "assets/aadhar/id8.pdf",
                        experience: "2 years",
                        certificates: ["Palm Reading Basics"],
                        status: "New Request"
                    },
                    {
                        id: 9,
                        profile_image: "",
                        name: "Meena Joshi",
                        phone_number: "9988774433",
                        email: "meena.joshi@example.com",
                        gender: "Female",
                        address: "Pune",
                        languages_known: "Marathi, Hindi",
                        specialties: ["Numerology"],
                        aadhar_card_pdf: "assets/aadhar/id9.pdf",
                        experience: "3 years",
                        certificates: ["Numerology Intro"],
                        status: "New Request"
                    },
                    {
                        id: 10,
                        profile_image: "",
                        name: "Rohan Kumar",
                        phone_number: "9876543219",
                        email: "rohan.kumar@example.com",
                        gender: "Male",
                        address: "Bangalore",
                        languages_known: "Kannada, English",
                        specialties: ["Tarot Reading"],
                        aadhar_card_pdf: "assets/aadhar/id10.pdf",
                        experience: "2 years",
                        certificates: [],
                        status: "New Request"
                    },
                    // Scheduled (Pending Interview) - 10 rows
                    {
                        id: 11,
                        profile_image: "",
                        name: "Asha Mehta",
                        phone_number: "9876543220",
                        email: "asha.mehta@example.com",
                        gender: "Female",
                        address: "Lucknow",
                        languages_known: "Hindi, Sanskrit",
                        specialties: ["Palmistry", "Kundli"],
                        aadhar_card_pdf: "assets/aadhar/id11.pdf",
                        experience: "4 years",
                        certificates: ["Vedic Astrology Certificate", "Palmistry Diploma"],
                        status: "Pending Interview"
                    },
                    {
                        id: 12,
                        profile_image: "",
                        name: "Rahul Sen",
                        phone_number: "9123456790",
                        email: "rahul.sen@example.com",
                        gender: "Male",
                        address: "Delhi",
                        languages_known: "Hindi, English",
                        specialties: ["Vedic Astrology"],
                        aadhar_card_pdf: "assets/aadhar/id12.pdf",
                        experience: "6 years",
                        certificates: ["Vedic Astrology Diploma"],
                        status: "Pending Interview"
                    },
                    {
                        id: 13,
                        profile_image: "",
                        name: "Divya Kapoor",
                        phone_number: "9988776666",
                        email: "divya.kapoor@example.com",
                        gender: "Female",
                        address: "Mumbai",
                        languages_known: "English, Hindi",
                        specialties: ["Tarot Reading"],
                        aadhar_card_pdf: "assets/aadhar/id13.pdf",
                        experience: "3 years",
                        certificates: ["Tarot Card Reading Certification"],
                        status: "Pending Interview"
                    },
                    {
                        id: 14,
                        profile_image: "",
                        name: "Vikram Sharma",
                        phone_number: "9876541244",
                        email: "vikram.sharma@example.com",
                        gender: "Male",
                        address: "Jaipur",
                        languages_known: "Hindi, Marwari",
                        specialties: ["Numerology"],
                        aadhar_card_pdf: "assets/aadhar/id14.pdf",
                        experience: "5 years",
                        certificates: ["Numerology Certificate"],
                        status: "Pending Interview"
                    },
                    {
                        id: 15,
                        profile_image: "",
                        name: "Priya Nair",
                        phone_number: "9123459887",
                        email: "priya.nair2@example.com",
                        gender: "Female",
                        address: "Chennai",
                        languages_known: "Tamil, English",
                        specialties: ["Vastu Shastra"],
                        aadhar_card_pdf: "assets/aadhar/id15.pdf",
                        experience: "7 years",
                        certificates: ["Vastu Shastra Diploma"],
                        status: "Pending Interview"
                    },
                    {
                        id: 16,
                        profile_image: "",
                        name: "Sanjay Patel",
                        phone_number: "9988775555",
                        email: "sanjay.patel@example.com",
                        gender: "Male",
                        address: "Ahmedabad",
                        languages_known: "Gujarati, Hindi",
                        specialties: ["Horoscope Analysis"],
                        aadhar_card_pdf: "assets/aadhar/id16.pdf",
                        experience: "8 years",
                        certificates: ["Horoscope Analysis Certification"],
                        status: "Pending Interview"
                    },
                    {
                        id: 17,
                        profile_image: "",
                        name: "Neha Gupta",
                        phone_number: "9876544332",
                        email: "neha.gupta@example.com",
                        gender: "Female",
                        address: "Kolkata",
                        languages_known: "Bengali, Hindi",
                        specialties: ["Astrology Consultation"],
                        aadhar_card_pdf: "assets/aadhar/id17.pdf",
                        experience: "4 years",
                        certificates: ["Astrology Consultation Certificate"],
                        status: "Pending Interview"
                    },
                    {
                        id: 18,
                        profile_image: "",
                        name: "Arjun Reddy",
                        phone_number: "9123458776",
                        email: "arjun.reddy@example.com",
                        gender: "Male",
                        address: "Hyderabad",
                        languages_known: "Telugu, English",
                        specialties: ["Kundli Matching"],
                        aadhar_card_pdf: "assets/aadhar/id18.pdf",
                        experience: "6 years",
                        certificates: ["Kundli Matching Diploma"],
                        status: "Pending Interview"
                    },
                    {
                        id: 19,
                        profile_image: "",
                        name: "Meera Joshi",
                        phone_number: "9988774444",
                        email: "meera.joshi2@example.com",
                        gender: "Female",
                        address: "Pune",
                        languages_known: "Marathi, Hindi",
                        specialties: ["Palm Reading"],
                        aadhar_card_pdf: "assets/aadhar/id19.pdf",
                        experience: "5 years",
                        certificates: ["Palm Reading Certificate"],
                        status: "Pending Interview"
                    },
                    {
                        id: 20,
                        profile_image: "",
                        name: "Rohan Desai",
                        phone_number: "9876543229",
                        email: "rohan.desai2@example.com",
                        gender: "Male",
                        address: "Bangalore",
                        languages_known: "Kannada, English",
                        specialties: ["Vedic Astrology"],
                        aadhar_card_pdf: "assets/aadhar/id20.pdf",
                        experience: "7 years",
                        certificates: ["Vedic Astrology Diploma"],
                        status: "Pending Interview"
                    },
                    // Approved - 10 rows
                    {
                        id: 21,
                        profile_image: "",
                        name: "Anita Sharma",
                        phone_number: "9876543230",
                        email: "anita.sharma@example.com",
                        gender: "Female",
                        address: "Varanasi",
                        languages_known: "Hindi, Sanskrit",
                        specialties: ["Vedic Astrology", "Kundli"],
                        aadhar_card_pdf: "assets/aadhar/id21.pdf",
                        experience: "10 years",
                        certificates: ["Vedic Astrology Master", "Kundli Specialist"],
                        status: "Approved"
                    },
                    {
                        id: 22,
                        profile_image: "",
                        name: "Kiran Patel",
                        phone_number: "9123456800",
                        email: "kiran.patel@example.com",
                        gender: "Male",
                        address: "Surat",
                        languages_known: "Gujarati, Hindi",
                        specialties: ["Numerology"],
                        aadhar_card_pdf: "assets/aadhar/id22.pdf",
                        experience: "12 years",
                        certificates: ["Numerology Master"],
                        status: "Approved"
                    },
                    {
                        id: 23,
                        profile_image: "",
                        name: "Sneha Verma",
                        phone_number: "9988776677",
                        email: "sneha.verma2@example.com",
                        gender: "Female",
                        address: "Noida",
                        languages_known: "Hindi, English",
                        specialties: ["Tarot Reading"],
                        aadhar_card_pdf: "assets/aadhar/id23.pdf",
                        experience: "8 years",
                        certificates: ["Tarot Master Certification"],
                        status: "Approved"
                    },
                    {
                        id: 24,
                        profile_image: "",
                        name: "Amit Kumar",
                        phone_number: "9876541255",
                        email: "amit.kumar2@example.com",
                        gender: "Male",
                        address: "Patna",
                        languages_known: "Hindi, Bhojpuri",
                        specialties: ["Vastu Shastra"],
                        aadhar_card_pdf: "assets/aadhar/id24.pdf",
                        experience: "9 years",
                        certificates: ["Vastu Shastra Expert"],
                        status: "Approved"
                    },
                    {
                        id: 25,
                        profile_image: "",
                        name: "Pooja Iyer",
                        phone_number: "9123459898",
                        email: "pooja.iyer@example.com",
                        gender: "Female",
                        address: "Coimbatore",
                        languages_known: "Tamil, English",
                        specialties: ["Astrology Consultation"],
                        aadhar_card_pdf: "assets/aadhar/id25.pdf",
                        experience: "11 years",
                        certificates: ["Astrology Expert Certificate"],
                        status: "Approved"
                    },
                    {
                        id: 26,
                        profile_image: "",
                        name: "Vivek Rao",
                        phone_number: "9988775566",
                        email: "vivek.rao@example.com",
                        gender: "Male",
                        address: "Bhopal",
                        languages_known: "Hindi, English",
                        specialties: ["Horoscope Analysis"],
                        aadhar_card_pdf: "assets/aadhar/id26.pdf",
                        experience: "10 years",
                        certificates: ["Horoscope Specialist"],
                        status: "Approved"
                    },
                    {
                        id: 27,
                        profile_image: "",
                        name: "Riya Singh",
                        phone_number: "9876544343",
                        email: "riya.singh@example.com",
                        gender: "Female",
                        address: "Chandigarh",
                        languages_known: "Punjabi, Hindi",
                        specialties: ["Kundli Matching"],
                        aadhar_card_pdf: "assets/aadhar/id27.pdf",
                        experience: "7 years",
                        certificates: ["Kundli Matching Expert"],
                        status: "Approved"
                    },
                    {
                        id: 28,
                        profile_image: "",
                        name: "Aditya Menon",
                        phone_number: "9123458787",
                        email: "aditya.menon@example.com",
                        gender: "Male",
                        address: "Kochi",
                        languages_known: "Malayalam, English",
                        specialties: ["Palm Reading"],
                        aadhar_card_pdf: "assets/aadhar/id28.pdf",
                        experience: "8 years",
                        certificates: ["Palm Reading Master"],
                        status: "Approved"
                    },
                    {
                        id: 29,
                        profile_image: "",
                        name: "Shalini Bose",
                        phone_number: "9988774455",
                        email: "shalini.bose@example.com",
                        gender: "Female",
                        address: "Guwahati",
                        languages_known: "Assamese, Hindi",
                        specialties: ["Vedic Astrology"],
                        aadhar_card_pdf: "assets/aadhar/id29.pdf",
                        experience: "9 years",
                        certificates: ["Vedic Astrology Expert"],
                        status: "Approved"
                    },
                    {
                        id: 30,
                        profile_image: "",
                        name: "Nikhil Jain",
                        phone_number: "9876543239",
                        email: "nikhil.jain@example.com",
                        gender: "Male",
                        address: "Indore",
                        languages_known: "Hindi, English",
                        specialties: ["Numerology"],
                        aadhar_card_pdf: "assets/aadhar/id30.pdf",
                        experience: "10 years",
                        certificates: ["Numerology Specialist"],
                        status: "Approved"
                    },
                    // Rejected - 10 rows
                    {
                        id: 31,
                        profile_image: "",
                        name: "Ravi Malhotra",
                        phone_number: "9876543240",
                        email: "ravi.malhotra@example.com",
                        gender: "Male",
                        address: "Agra",
                        languages_known: "Hindi",
                        specialties: ["Palmistry"],
                        aadhar_card_pdf: "assets/aadhar/id31.pdf",
                        experience: "2 years",
                        certificates: [],
                        status: "Rejected"
                    },
                    {
                        id: 32,
                        profile_image: "",
                        name: "Suman Das",
                        phone_number: "9123456811",
                        email: "suman.das@example.com",
                        gender: "Female",
                        address: "Siliguri",
                        languages_known: "Bengali, Hindi",
                        specialties: ["Tarot Reading"],
                        aadhar_card_pdf: "assets/aadhar/id32.pdf",
                        experience: "1 year",
                        certificates: [],
                        status: "Rejected"
                    },
                    {
                        id: 33,
                        profile_image: "",
                        name: "Kunal Yadav",
                        phone_number: "9988776688",
                        email: "kunal.yadav@example.com",
                        gender: "Male",
                        address: "Kanpur",
                        languages_known: "Hindi",
                        specialties: ["Vedic Astrology"],
                        aadhar_card_pdf: "assets/aadhar/id33.pdf",
                        experience: "3 years",
                        certificates: ["Basic Astrology Course"],
                        status: "Rejected"
                    },
                    {
                        id: 34,
                        profile_image: "",
                        name: "Lata Mishra",
                        phone_number: "9876541266",
                        email: "lata.mishra@example.com",
                        gender: "Female",
                        address: "Bhopal",
                        languages_known: "Hindi",
                        specialties: ["Numerology"],
                        aadhar_card_pdf: "assets/aadhar/id34.pdf",
                        experience: "2 years",
                        certificates: [],
                        status: "Rejected"
                    },
                    {
                        id: 35,
                        profile_image: "",
                        name: "Manoj Thakur",
                        phone_number: "9123459909",
                        email: "manoj.thakur@example.com",
                        gender: "Male",
                        address: "Ranchi",
                        languages_known: "Hindi, English",
                        specialties: ["Kundli"],
                        aadhar_card_pdf: "assets/aadhar/id35.pdf",
                        experience: "4 years",
                        certificates: ["Kundli Basic Course"],
                        status: "Rejected"
                    },
                    {
                        id: 36,
                        profile_image: "",
                        name: "Anjali Roy",
                        phone_number: "9988775577",
                        email: "anjali.roy2@example.com",
                        gender: "Female",
                        address: "Durgapur",
                        languages_known: "Bengali, Hindi",
                        specialties: ["Vastu Shastra"],
                        aadhar_card_pdf: "assets/aadhar/id36.pdf",
                        experience: "2 years",
                        certificates: [],
                        status: "Rejected"
                    },
                    {
                        id: 37,
                        profile_image: "",
                        name: "Vinod Kumar",
                        phone_number: "9876544354",
                        email: "vinod.kumar@example.com",
                        gender: "Male",
                        address: "Meerut",
                        languages_known: "Hindi",
                        specialties: ["Horoscope Analysis"],
                        aadhar_card_pdf: "assets/aadhar/id37.pdf",
                        experience: "3 years",
                        certificates: [],
                        status: "Rejected"
                    },
                    {
                        id: 38,
                        profile_image: "",
                        name: "Sunita Pal",
                        phone_number: "9123458798",
                        email: "sunita.pal@example.com",
                        gender: "Female",
                        address: "Jabalpur",
                        languages_known: "Hindi",
                        specialties: ["Palm Reading"],
                        aadhar_card_pdf: "assets/aadhar/id38.pdf",
                        experience: "1 year",
                        certificates: [],
                        status: "Rejected"
                    },
                    {
                        id: 39,
                        profile_image: "",
                        name: "Rajesh Sahu",
                        phone_number: "9988774466",
                        email: "rajesh.sahu@example.com",
                        gender: "Male",
                        address: "Gwalior",
                        languages_known: "Hindi",
                        specialties: ["Astrology Consultation"],
                        aadhar_card_pdf: "assets/aadhar/id39.pdf",
                        experience: "2 years",
                        certificates: [],
                        status: "Rejected"
                    },
                    {
                        id: 40,
                        profile_image: "",
                        name: "Geeta Rani",
                        phone_number: "9876543249",
                        email: "geeta.rani@example.com",
                        gender: "Female",
                        address: "Ludhiana",
                        languages_known: "Punjabi, Hindi",
                        specialties: ["Kundli Matching"],
                        aadhar_card_pdf: "assets/aadhar/id40.pdf",
                        experience: "3 years",
                        certificates: ["Basic Kundli Course"],
                        status: "Rejected"
                    }
                ];

                // Initialize with Newest Requests
                filteredData = PujarisData.filter(item => item.status === "New Request");
                displayData(currentPage);
            } catch (error) {
                console.error("Error fetching Pujaris:", error);
                document.getElementById("tableBody").innerHTML =
                    `<tr><td colspan="12" class="text-center text-danger">Failed to load data.</td></tr>`;
            }
        }

        function filterTable(status) {
            const statusMap = {
                'newest': 'New Request',
                'pending': 'Pending Interview',
                'approved': 'Approved',
                'rejected': 'Rejected'
            };
            const mappedStatus = statusMap[status.toLowerCase()] || status;
            filteredData = PujarisData.filter(item => item.status.toLowerCase() === mappedStatus.toLowerCase());
            currentPage = 1;
            displayData(currentPage);
        }

        function viewPDF(url) {
            document.getElementById('pdfViewer').src = url;
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

            paginatedData.forEach((item, index) => {
                const specialtiesText = item.specialties.length > 0 ? item.specialties.join(', ') : '-';
                const certificatesText = item.certificates ? item.certificates.join(', ') : '-';
                const isRejected = item.status.toLowerCase() === 'rejected';
                const srNo = start + index + 1; // Calculate the serial number

                const row = `
                    <tr>
                        <td>${srNo}</td> <!-- Add the Sr. No. column -->
                        <td><img src="${item.profile_image || '<?php echo base_url('assets/images/HRside/Profile1.png')?>'}" alt="Profile" class="profile-img" width="40"></td>
                        <td>${item.name || '-'}</td>
                        <td>${item.phone_number || '-'}</td>
                        <td>${item.gender || '-'}</td>
                        <td>${item.address || '-'}</td>
                        <td>${item.languages_known || '-'}</td>
                        <td>${specialtiesText}</td>
                        <td>${item.experience || '-'}</td>
                        <td class="text-center">
                            ${isRejected ?
                                '<span class="badge bg-danger">Rejected</span>' :
                                '<button class="btn btn-sm btn-primary" onclick="window.location.href=\'viewpujari\'">View</button>'
                            }
                        </td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });

            updatePagination();
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

        function deletePujari(id) {
            // Find the index of the Pujari to delete
            const index = filteredData.findIndex(item => item.id === id);
            if (index !== -1) {
                // Remove the Pujari from the filteredData array
                filteredData.splice(index, 1);
                // Remove the Pujari from the PujarisData array
                const dataIndex = PujarisData.findIndex(item => item.id === id);
                if (dataIndex !== -1) {
                    PujarisData.splice(dataIndex, 1);
                }
                // Re-render the table to update the serial numbers
                displayData(currentPage);
            }
        }

        document.addEventListener("DOMContentLoaded", fetchPujaris);
    </script>
</body>
</html>
