<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: User Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Rokkitt:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            padding: 20px;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #e0e7ff, #f3f4f6);
            animation: fadeIn 1s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 25px;
            border-radius: 15px;
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .back-arrow {
            font-size: 24px;
            text-decoration: none;
            color: #1a1a1a;
            margin-bottom: 20px;
            display: inline-flex;
            align-items: center;
            transition: transform 0.3s ease, color 0.3s ease;
            animation: slideInLeft 0.5s ease-out;
        }

        @keyframes slideInLeft {
            from { transform: translateX(-20px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        .profile-img {
            width: 100%;
            max-width: 250px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .profile-img:hover {
            transform: scale(1.05);
        }

        .details p {
            font-size: 20px;
            margin: 8px 0;
            color: #333;
        }

        .details b {
            font-size: 20px;
            font-weight: 500;
            color: #1a1a1a;
        }

        .document-section {
            margin-top: 30px;
        }

        .btn-container {
            margin-top: 40px;
            text-align: center;
        }

        .btns {
            padding: 12px 25px;
            font-size: 18px;
            border-radius: 30px;
            border: none;
            margin: 8px;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            animation: bounceIn 0.5s ease-out;
        }

        .btns:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        @keyframes bounceIn {
            0% { transform: scale(0.8); opacity: 0; }
            60% { transform: scale(1.1); opacity: 1; }
            100% { transform: scale(1); }
        }

        .btn-approve {
            background: #0C768A;
            color: white;
        }

        .btn-reject,
        .btn-direct-reject,
        .btn-reject-approved_Pujari {
            background: linear-gradient(45deg, #A10000, #e74c3c);
            color: white;
            width: 120px;
        }

        /* New Accordion Document Viewing Styles */
        .document-accordion {
            margin-top: 20px;
        }

        .accordion-item {
            background: white;
            border: none;
            border-radius: 10px;
            margin-bottom: 10px;
            overflow: hidden;
        }

        .accordion-header {
            background: #0C768A;
            color: white;
            font-size: 18px;
            font-weight: 500;
        }

        .accordion-button {
            background: #0C768A;
            color: white;
            font-size: 18px;
            font-weight: 500;
            padding: 15px;
            border: none;
            transition: background 0.3s ease;
        }

        .accordion-button:not(.collapsed) {
            background: #095D6E;
            color: white;
        }

        .accordion-button:focus {
            box-shadow: none;
        }

        .accordion-body {
            padding: 20px;
            background: #f8f9fa;
        }

        .doc-card {
            max-width: 350px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .doc-card:hover {
            transform: translateY(-3px);
        }

        .doc-image {
            width: 100%;
            height: 250px;
            object-fit: contain;
            background: #e0e7ff;
        }

        .doc-info {
            padding: 10px;
            text-align: center;
        }

        .doc-info p {
            font-size: 16px;
            font-weight: 600;
            color: #1a1a1a;
            margin: 0;
        }

        .doc-actions {
            padding: 10px;
            text-align: center;
        }

        .doc-btn {
            display: inline-block;
            padding: 8px 20px;
            background: linear-gradient(45deg, #8BC24A, #2ecc71);
            color: white;
            border-radius: 20px;
            text-decoration: none;
            font-size: 14px;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .doc-btn:hover {
            background: linear-gradient(45deg, #76a832, #27ae60);
            transform: scale(1.05);
        }

        .certification-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 10px;
            justify-items: center;
        }

        .certification-link {
            display: block;
            width: 100%;
            max-width: 200px;
            padding: 10px;
            background: linear-gradient(45deg, #F6CE57, #f1c40f);
            color: #1a1a1a;
            border-radius: 20px;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
            transition: transform 0.2s ease;
        }

        .certification-link:hover {
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .doc-card {
                max-width: 100%;
            }

            .doc-image {
                height: 200px;
            }

            .doc-info p {
                font-size: 14px;
            }

            .doc-btn {
                padding: 6px 15px;
                font-size: 12px;
            }

            .certification-grid {
                grid-template-columns: 1fr;
            }

            .certification-link {
                max-width: 100%;
            }
        }

        @media (max-width: 480px) {
            .doc-image {
                height: 150px;
            }

            .accordion-button {
                font-size: 16px;
                padding: 10px;
            }
        }

        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(8px);
            z-index: 1000;
            padding: 10px;
            overflow: auto;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .popup-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        .popup {
            position: relative;
            background: white;
            padding: 25px;
            border-radius: 20px;
            width: 90%;
            max-width: 800px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            transform: scale(0.8);
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .popup.show {
            transform: scale(1);
            opacity: 1;
        }

        .popup h5 {
            background: #0c768a;
            padding: 12px;
            margin: -25px -25px 20px -25px;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            text-align: center;
            font-size: clamp(24px, 5vw, 34px);
            color: white;
        }

        .popup-content {
            padding-top: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .popup-field {
            flex: 1 1 45%;
            border-radius: 10px;
        }

        .popup-field label {
            display: block;
            margin-bottom: 8px;
            font-size: clamp(18px, 4vw, 22px);
            color: #1a1a1a;
        }

        .popup input {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            background: #f0f4f8;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .popup input:focus {
            border-color: #8BC24A;
            box-shadow: 0 0 8px rgba(139, 194, 74, 0.3);
            outline: none;
        }

        .popup button {
            width: 100%;
            max-width: 200px;
            padding: 14px;
            margin-top: 25px;
            background: #0C768A;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 19px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .popup button:hover {
            background: #095D6E;
            transform: translateY(-3px);
        }

        .submitbtn {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 25px;
        }

        .submitbtn button:nth-child(2) {
            background: linear-gradient(45deg, #A10000, #e74c3c);
        }

        .submitbtn button:nth-child(2):hover {
            background: linear-gradient(45deg, #8e0000, #c0392b);
        }

        @media (max-width: 768px) {
            .popup-content {
                flex-direction: column;
            }

            .popup-field {
                flex: 1 1 100%;
            }

            .popup button {
                max-width: none;
            }
        }

        /* Success Popup Styles */
        .success-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(8px);
            z-index: 2000;
            padding: 10px;
            overflow: auto;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .success-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        .success-popup {
            background: white;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            position: relative;
            transform: scale(0.8);
            transition: transform 0.3s ease, opacity 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 500px;
            flex-direction: column;
        }

        .success-popup.show {
            transform: scale(1);
            opacity: 1;
        }

        .success-popup .circle {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #d2691e, #f4a460);
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .success-popup .circle::before {
            content: "\f00c"; /* Changed to checkmark icon */
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            color: white;
            font-size: 40px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .success-popup h3 {
            font-size: 24px;
            color: #1a1a1a;
            margin-bottom: 10px;
        }

        .success-popup p {
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
        }

        .success-popup .close-btn {
            padding: 10px 20px;
            background: #0C768A;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 28px;
            transition: background 0.3s ease;
            font-family: 'Rokkitt';
            width: 120px;
        }

        .success-popup .close-btn:hover {
            background: #095D6E;
        }

        @media (max-width: 480px) {
            .success-popup {
                padding: 15px;
            }

            .success-popup h3 {
                font-size: 20px;
            }

            .success-popup p {
                font-size: 16px;
            }

            .success-popup .close-btn {
                padding: 8px 15px;
                font-size: 14px;
            }
        }

                /* General Styling */
                .documents {
            text-align: center;
            margin: 30px auto;
            font-family: 'Poppins', sans-serif;
            max-width: 100%;
        }

        /* Document Container - Ensures All 4 Cards Fit in One Row */
        .document-container {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            gap: 15px;
            max-width: 1000px;
            /* Ensures proper fit */
            margin: 0 auto;
        }

        /* Document Cards */
        .document-card {
            background: #fff;
            padding: 15px;
            width: 220px;
            /* Ensures 4 cards fit in a row */
            height: 130px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .document-card p {
            font-size: 16px;
            font-weight: 600;
            color: #444;
            margin-bottom: 10px;
        }

        .document-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
        }

        /* View Button */
        .view-btn {
            background: #007BFF;
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .view-btn:hover {
            background: #0056b3;
        }

        /* Responsive Styling */
        @media (max-width: 1024px) {
            .document-container {
                max-width: 800px;
            }

            .document-card {
                width: 200px;
            }
        }

        @media (max-width: 768px) {
            .document-container {
                flex-wrap: wrap;
                justify-content: center;
                gap: 10px;
            }

            .document-card {
                width: 45%;
            }
        }

        @media (max-width: 480px) {
            .document-container {
                flex-direction: column;
                align-items: center;
            }

            .document-card {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <?php $this->load->view('IncludeAdmin/CommanSidebar'); ?>

        <!-- Main Component -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('IncludeAdmin/CommanNavbar'); ?>

            <div class="container">
                <i class="fas fa-arrow-left"></i>
                <a href="Pujarirequests" class="back-arrow" style="margin-left: 10px;">Recent Pujari Requests</a>
                <div class="row mt-3 d-flex align-items-center">
                    <div class="col-md-4 text-center">
                        <img src="<?php echo base_url('assets/images/HRside/profile1.png') ?>" alt="Profile" class="profile-img">
                    </div>
                    <div class="col-md-8">
                        <div class="details">
                            <p><b>Name:</b> John Doe</p>
                            <p><b>Contact No:</b> +1 234 567 890</p>
                            <p><b>Email:</b> johndoe@example.com</p>
                            <p><b>Gender:</b> Male</p>
                            <p><b>Address:</b> 123 Main St, City, Country</p>
                            <p><b>Languages Known:</b> English, Spanish</p>
                            <p><b>Specialties:</b> Vedic Astrology, Tarot Reading</p>
                            <p><b>Experience:</b> 5 years</p>
                        </div>
                    </div>

                    <div class="document-section">
                        <h5 class="text-center mb-4">Documents Attached</h5>
                        <div class="document-accordion accordion" id="documentAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="aadhaarHeading">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#aadhaarCollapse" aria-expanded="true" aria-controls="aadhaarCollapse">
                                        Aadhaar Card
                                    </button>
                                </h2>
                                <div id="aadhaarCollapse" class="accordion-collapse collapse show" aria-labelledby="aadhaarHeading" data-bs-parent="#documentAccordion">
                                    <div class="accordion-body">
                                        <div class="doc-card">
                                            <img src="<?php echo base_url('Uploads/documents/aadharcard.jpg') ?>" alt="Aadhaar Card" class="doc-image" onerror="this.src='<?php echo base_url('assets/images/fallback.jpg') ?>'">
                                            <div class="doc-info">
                                                <p>Aadhaar Card</p>
                                            </div>
                                            <div class="doc-actions">
                                                <a href="<?php echo base_url('Uploads/documents/aadharcard.jpg') ?>" target="_blank" class="doc-btn">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="certificateHeading">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#certificateCollapse" aria-expanded="false" aria-controls="certificateCollapse">
                                        Certificate
                                    </button>
                                </h2>
                                <div id="certificateCollapse" class="accordion-collapse collapse" aria-labelledby="certificateHeading" data-bs-parent="#documentAccordion">
                                    <div class="accordion-body">
                                        <div class="doc-card">
                                            <img src="<?php echo base_url('Uploads/Astologer/aadharcard.png') ?>" alt="Certificate" class="doc-image" onerror="this.src='<?php echo base_url('assets/images/fallback.jpg') ?>'">
                                            <div class="doc-info">
                                                <p>Certificate</p>
                                            </div>
                                            <div class="doc-actions">
                                                <a href="<?php echo base_url('Uploads/Astologer/certificate.png') ?>" target="_blank" class="doc-btn">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="certificationsHeading">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#certificationsCollapse" aria-expanded="false" aria-controls="certificationsCollapse">
                                        Other Certifications
                                    </button>
                                </h2>
                                <div id="certificationsCollapse" class="accordion-collapse collapse" aria-labelledby="certificationsHeading" data-bs-parent="#documentAccordion">
                                    <div class="accordion-body">
                                        <div class="certification-grid" id="certificationGrid">
                                            <!-- Certifications will be populated dynamically -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="btn-container">
                        <!-- if it is new request -->
                        <button class="btns btn-schedule" data-status="schedule" onclick="showPopup(this)">Schedule</button>
                        <button class="btns btn-direct-reject" id="reject-without-interview">Reject</button>
                        <!-- if interview is scheduled -->
                        <button class="btns btn-approve" id="approve">Approve</button>
                        <button class="btns btn-reject" id="reject">Reject</button>
                        <button class="btns btn-update-interview" onclick="showUpdateInterviewPopup()">Update Interview</button>
                        <!-- for approved status -->
                        <button class="btns btn-reject-approved_Pujari" id="reject-approved_Pujari">Reject</button>
                        <!-- if status is rejected -->
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Schedule Interview Popup -->
    <div class="popup-overlay" id="popup">
        <div class="popup">
            <h5>Schedule Interview</h5>
            <div class="popup-content">
                <input type="hidden" id="Pujari-id" value="1">
                <div class="popup-field">
                    <label for="mode">Mode</label>
                    <input type="text" id="mode" placeholder="Mode" value="Online" readonly required pattern="[A-Za-z\s]+" title="Mode should only contain letters and spaces">
                </div>
                <div class="popup-field">
                    <label for="date">Date</label>
                    <input type="date" id="date" required min="2025-04-22" title="Date must be today or later">
                </div>
                <div class="popup-field">
                    <label for="time">Time</label>
                    <input type="time" id="time" required title="Please select a time">
                </div>
                <div class="popup-field">
                    <label for="meeting-link">Meeting Link</label>
                    <input type="url" id="meeting-link" placeholder="Meeting link" required title="Please enter a valid URL (e.g., https://example.com)">
                </div>
            </div>
            <div class="submitbtn">
                <button onclick="scheduleInterview()">Submit</button>
                <button onclick="hidePopup()">Cancel</button>
            </div>
        </div>
    </div>

    

    <!-- Update Interview Popup -->
    <div class="popup-overlay" id="update-interview-popup">
        <div class="popup">
            <h5>Update Interview Timing</h5>
            <div class="popup-content">
                <input type="hidden" id="update-Pujari-id" value="1">
                <div class="popup-field">
                    <label for="update-date">Date</label>
                    <input type="date" id="update-date" required min="2025-04-22" title="Date must be today or later">
                </div>
                <div class="popup-field">
                    <label for="update-time">Time</label>
                    <input type="time" id="update-time" required title="Please select a time">
                </div>
                <div class="popup-field">
                    <label for="update-meeting-link">Meeting Link</label>
                    <input type="url" id="update-meeting-link" placeholder="Meeting link" required title="Please enter a valid URL (e.g., https://example.com)">
                </div>
            </div>
            <div class="submitbtn">
                <button onclick="updateInterviewTiming()">Update</button>
                <button onclick="hideUpdateInterviewPopup()">Cancel</button>
            </div>
        </div>
    </div>

    <!-- Success Popup -->
    <div class="success-overlay" id="successPopup">
        <div class="success-popup">
            <img src="<?php echo base_url('assets/images/newlogo.png.png') ?>" alt="Success" style="width: 200px; height: auto;">
            <h1>Great Job</h1>
            <p style="font-size: 28px; font-weight: 400;">Action Completed Successfully!!</p>
            <button class="close-btn" onclick="hideSuccessPopup()">Close</button>
        </div>
    </div>

    <!-- Frontend JavaScript -->
    <script>
        // Simulate backend data for certifications (replace with actual backend data)
        const certifications = [
            { name: "Certification 1", url: "<?php echo base_url('Uploads/Astologer/cert1.pdf') ?>" },
            { name: "Certification 2", url: "<?php echo base_url('Uploads/Astologer/cert2.pdf') ?>" }
        ];

        // Dynamically populate certifications
        function populateCertifications() {
            const grid = document.getElementById('certificationGrid');
            grid.innerHTML = '';
            if (certifications.length === 0) {
                grid.innerHTML = '<p class="text-center text-muted">No certifications available.</p>';
                return;
            }
            certifications.forEach(cert => {
                const link = document.createElement('a');
                link.href = cert.url;
                link.target = '_blank';
                link.className = 'certification-link';
                link.textContent = cert.name;
                grid.appendChild(link);
            });
        }

        // Initialize certifications on page load
        document.addEventListener('DOMContentLoaded', populateCertifications);

        function showPopup(button) {
            let PujariId = button.getAttribute("data-id") || "1";
            let actionStatus = button.getAttribute("data-status");
            let popup = document.getElementById("popup");
            popup.classList.add("show");
            document.getElementById("Pujari-id").value = PujariId;
            popup.setAttribute("data-status", actionStatus);
        }

        function hidePopup() {
            let popup = document.getElementById("popup");
            popup.classList.remove("show");
        }

        function showChargesPopup(button) {
            try {
                let PujariId = button.getAttribute("data-id") || "1";
                let popup = document.getElementById("charges-popup");
                if (!popup) {
                    console.error("Charges popup element not found");
                    Swal.fire("Error!", "Charges popup not found.", "error");
                    return;
                }
                popup.classList.add("show");
                document.getElementById("charges-Pujari-id").value = PujariId;
            } catch (error) {
                console.error("Error in showChargesPopup:", error);
                Swal.fire("Error!", "Failed to open charges popup.", "error");
            }
        }

        function hideChargesPopup() {
            let popup = document.getElementById("charges-popup");
            if (popup) {
                popup.classList.remove("show");
            } else {
                console.error("Charges popup element not found");
            }
        }

        function scheduleInterview() {
            let PujariId = document.getElementById("Pujari-id").value;
            let date = document.getElementById("date").value;
            let time = document.getElementById("time").value;
            let meetingLink = document.getElementById("meeting-link").value;
            let actionStatus = document.getElementById("popup").getAttribute("data-status");

            if (!PujariId) {
                Swal.fire("Error!", "Pujari ID is missing.", "error");
                return;
            }

            if (!date || !time || !meetingLink) {
                Swal.fire("Error!", "Please fill all required fields.", "error");
                return;
            }

            let successPopup = document.getElementById("successPopup");
            if (successPopup) {
                successPopup.classList.add("show");
            } else {
                console.error("Success popup element with id 'successPopup' not found");
            }
            hidePopup();
        }

       function showUpdateInterviewPopup() {
            let popup = document.getElementById("update-interview-popup");
            popup.classList.add("show");
        }

        function hideUpdateInterviewPopup() {
            let popup = document.getElementById("update-interview-popup");
            popup.classList.remove("show");
        }

        function updateInterviewTiming() {
            let PujariId = document.getElementById("update-Pujari-id").value;
            let date = document.getElementById("update-date").value;
            let time = document.getElementById("update-time").value;
            let meetingLink = document.getElementById("update-meeting-link").value;

            if (!PujariId) {
                Swal.fire("Error!", "Pujari ID is missing.", "error");
                return;
            }

            if (!date || !time || !meetingLink) {
                Swal.fire("Error!", "Please fill all required fields.", "error");
                return;
            }

            let successPopup = document.getElementById("successPopup");
            if (successPopup) {
                successPopup.classList.add("show");
            } else {
                console.error("Success popup element with id 'successPopup' not found");
            }
            hideUpdateInterviewPopup();
        }

        function hideSuccessPopup() {
            let successPopup = document.getElementById("successPopup");
            if (successPopup) {
                successPopup.classList.remove("show");
            } else {
                console.error("Success popup element with id 'successPopup' not found");
            }
        }

        document.addEventListener("click", function(event) {
            if (event.target && event.target.id === "reject-without-interview") {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You are about to reject this Pujari without an interview.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, Reject",
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire("Success!", "Pujari rejected successfully!", "success");
                    }
                });
            }
        });

        // Sidebar Toggle
        const toggler = document.querySelector(".toggler-btn");
        const closeBtn = document.querySelector(".close-sidebar");
        const sidebar = document.querySelector("#sidebar");

        if (toggler && sidebar) {
            toggler.addEventListener("click", function() {
                sidebar.classList.toggle("collapsed");
            });
        }

        if (closeBtn && sidebar) {
            closeBtn.addEventListener("click", function() {
                sidebar.classList.remove("collapsed");
            });
        }
    </script>
</body>
</html>