<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin:View Astrologer</title>
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

        /* Main Profile Container (Single Border) */
        .profile-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 3px solid #444;
            padding: 30px;
            border-radius: 12px;
            background: #fff;
            max-width: 800px;
            margin: 10vh auto;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            width: 90%;
        }

        /* Profile Top Section (Image & Content Side by Side) */
        .profile-top {
            display: flex;
            align-items: stretch;
            width: 100%;
            margin-bottom: 20px;
            gap: 20px;
        }

        /* Profile Image */
        .profile-image {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-right: 20px;
        }

        .profile-image img {
            width: 100%;
            max-width: 250px;
            height: auto;
            border-radius: 12px;
            border: 2px solid #666;
        }

        /* Profile Details */
        .profile-content {
            flex: 2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: left;
            /* Ensures text starts from left */
        }

        .profile-content h2 {
            font-size: 24px;
            margin-bottom: 12px;
            color: #222;
            font-weight: 600;
        }

        .profile-content ul {
            list-style: none;
            padding: 0;
        }

        .profile-content ul li {
            font-size: 16px;
            margin-bottom: 8px;
            color: #333;
        }

        /* Documents Section */
        .documents {
            width: 100%;
            text-align: left;
            /* Left-align title */
            margin-bottom: 20px;
        }

        .documents h3 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #222;
        }

        /* Document Previews */
        .document-preview {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .document {
            flex: 1;
            text-align: left;
            /* Left-align document names */
        }

        .doc-frame {
            width: 100%;
            height: 150px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        /* Buttons */
        .buttons {
            display: flex;
            gap: 20px;
            justify-content: left;
            /* Align buttons to the left */
            flex-wrap: wrap;
            /* Allow buttons to wrap if needed */
        }

        .approve-btn,
        .reject-btn {
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s ease-in-out;
            flex: 1;
            /* Ensures equal width */
            max-width: 150px;
        }

        .approve-btn {
            background: #28a745;
            color: white;
        }

        .approve-btn:hover {
            background: #218838;
        }

        .reject-btn {
            background: #dc3545;
            color: white;
        }

        .reject-btn:hover {
            background: #c82333;
        }

        /* 📌 RESPONSIVE FIXES */
        @media (max-width: 768px) {
            .profile-top {
                flex-direction: column;
                /* Stack image and content */
            }

            .profile-image {
                padding-right: 0;
                margin-bottom: 20px;
            }

            .profile-content {
                text-align: left;
                /* Ensure text starts from left */
            }

            .documents {
                text-align: left;
                /* Keep documents title aligned */
            }

            .document-preview {
                flex-direction: column;
                /* Stack Documents */
            }

            .buttons {
                justify-content: center;
                /* Center buttons on small screens */
            }

            .approve-btn,
            .reject-btn {
                flex: none;
                /* Prevent buttons from stretching */
                width: 45%;
                /* Keep them side by side */
                max-width: none;
                text-align: center;
            }
        }

        /* MODAL STYLES */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            padding: 20px;
            width: 90%;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            position: relative;
        }

        /* Close Button (Top-Right Corner) */
        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            cursor: pointer;
        }

        .close-btn:hover {
            color: red;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        label {
            text-align: left;
            font-weight: bold;
        }

        input,
        select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .submit-btn {
            background: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #218838;
        }

        /* RESPONSIVENESS */
        @media (max-width: 768px) {
            .modal-content {
                width: 95%;
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

        .time-picker {
            display: flex;
            gap: 8px;
            align-items: center;
            background: #f5f5f5;
            padding: 10px;
            border-radius: 8px;
            width: fit-content;
        }

        .time-picker select {
            padding: 6px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
            background-color: white;
        }

        .submit-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #0056b3;
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
                <div class="profile-container">
                    <!-- Image & Details Section -->
                    <div class="profile-top">
                        <!-- Profile Image -->
                        <div class="profile-image">
                        <img src="<?= base_url('Uploads/user_image/' . $Astro['profile_pic']) ?>" alt="Profile Pic" style="width:50px; height:50px; border-radius:50%;">  
                        </div>
                        <!-- Profile Details -->
                        <div class="profile-content">
                            <ul>
                                <li><strong>Name:</strong> <?php echo $Astro['name']?></li>
                                <li><strong>Contact No:</strong><?php echo $Astro['contact']?></li>
                                <li><strong>Email:</strong><?php echo $Astro['email']?></li>
                                <li><strong>Gender:</strong><?php echo $Astro ['gender']?></li>
                                <li><strong>Address:</strong><?php echo $Astro['address']?></li>
                                <li><strong>Language Known:</strong><?php echo $Astro ['languages']?></li>
                                <li><strong>Specialities:</strong><?php echo $Astro['specialties']?></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Documents Section -->
                    <div class="documents">
                        <h3>Documents Attached</h3>
                        <div class="document-container">
                            <!-- Aadhar Card -->
                            <div class="document-card">
                                <p><strong>Aadhar Card</strong></p>
                                <button onclick="openPDF('assets/images/CC UNIT II.pdf')" style="background-color: #0c768a" class="view-btn">View</button>
                            </div>

                            <!-- Certification 1 -->
                            <div class="document-card">
                                <p><strong>Certification 1</strong></p>
                                <button onclick="openPDF('assets/images/CC UNIT II.pdf')" style="background-color: #0c768a" class="view-btn">View</button>
                            </div>

                            <!-- Certification 2 -->
                            <div class="document-card">
                                <p><strong>Certification 2</strong></p>
                                <button onclick="openPDF('assets/images/CC UNIT II.pdf')" style="background-color: #0c768a" class="view-btn">View</button>
                            </div>

                            <!-- Certification 3 -->
                            <div class="document-card">
                                <p><strong>Certification 3</strong></p>
                                <button onclick="openPDF('assets/documents/cert3.pdf')" style="background-color: #0c768a" class="view-btn">View</button>
                            </div>
                        </div>
                    </div>
                    <script>
                        function openPDF(pdfPath) {
                            window.open(pdfPath, '_blank');
                        }
                    </script>

                    <!-- Approve & Reject Buttons -->
                    <div class="buttons">
                        <!-- <button class="approve-btn" onclick="openModal()">Approve</button> -->
                        <button class="approve-btn" onclick="openModal('<?php echo $Astro['id']; ?>')">Approve</button>
                        <button class="reject-btn">Reject</button>
                    </div>
                </div>
            </main>

            <!-- Modal Structure -->
            <div id="approveModal" class="modal" onclick="closeModal(event)">
                <div class="modal-content" onclick="event.stopPropagation();">
                    <span class="close-btn" onclick="closeModal(event)">&times;</span>
                    <h2>Approval Details</h2>
                    <form action="<?= base_url('Admin/updateAstrologerData') ?>" method="POST">
    <input type="hidden" id="astroId" name="astroId" value="<?php echo $Astro['id']; ?>">

    <label for="mode">Mode:</label>
    <select id="mode" name="mode">
        <option value="Online">Online</option>
        <option value="Offline">Offline</option>
    </select>

    <label for="date">Date:</label>
    <input type="date" id="date" name="date" required>

    <label for="time">Time:</label>
    <input type="time" name="time" required>

    <label for="venue">Venue:</label>
    <input type="text" id="venue" name="venue" placeholder="Enter Venue" required>

    <button type="submit" class="submit-btn">Submit</button>
</form>


                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                function openModal(id) {
                    document.getElementById("approveModal").style.display = "flex";
                    document.getElementById("astroId").value = id; 
                }


                function closeModal(event) {
                    const modal = document.getElementById("approveModal");
                    if (event.target === modal || event.target.classList.contains("close-btn")) {
                        modal.style.display = "none";
                    }
                }

                function handleSubmit(event) {
    event.preventDefault();  // Prevent the default form submission

    // Get form values
    const id = document.getElementById("astroId").value; // Should now be populated correctly
    const mode = document.getElementById("mode").value;
    const date = document.getElementById("date").value;
    const time = document.getElementById("time").value;
    const venue = document.getElementById("venue").value;

    // Prepare the data to send to the API
    const data = {
        id: id,
        mode: mode,
        date: date,
        time: time,
        venue: venue
    };

    // Make the API call using fetch
    fetch('http://localhost/Jyotisika/Admin_API/updateAstrologerData', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        // Check if the API response is successful
        if (data.success) {
            // Close the modal
            document.getElementById("approveModal").style.display = "none";

            // Show SweetAlert success message
            Swal.fire({
                title: "Great Job",
                text: "Your interview is scheduled successfully.",
                imageUrl: "assets/images/Admin logo.png", // Your custom image
                imageWidth: 100,
                imageHeight: 100,
                imageAlt: "Success Image",
                confirmButtonText: "Close",
                confirmButtonColor: "#3085d6",
                customClass: {
                    popup: 'custom-swal-popup',
                    image: 'custom-swal-image' // Apply custom styling for round image
                }
            });
        } else {
            // Handle error if API call failed
            Swal.fire({
                title: "Error",
                text: "There was an issue scheduling the interview. Please try again.",
                icon: "error",
                confirmButtonText: "Close"
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            title: "Error",
            text: "There was an issue connecting to the server. Please try again.",
            icon: "error",
            confirmButtonText: "Close"
        });
    });
}


                // Call function on page load
                window.onload = populateTimeDropdowns;
            </script>

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