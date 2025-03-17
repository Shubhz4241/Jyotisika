<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consultation Schedule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Montserrat", serif;
            /* background-color: #f9f9f9; */
        }

        .container {
            max-width: 1100px;
            margin: auto;
            padding: 20px;
            position: relative;
        }

        .add-btn-container {
            text-align: right;
        }

        .consultation-form {
            display: none;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            margin: auto;
            position: relative;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            border-radius: 6px;
            padding: 10px;
        }

        .submit-btn {
            width: 100%;
            background-color: teal;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: darkslategray;
        }

        .radio-group {
            display: none;
            flex-direction: column;
            background: #f8f9fa;
            padding: 10px;
            border-radius: 6px;
        }

        .close-btn {
            text-align: right;
            cursor: pointer;
            color: red;
            font-size: 18px;
        }

        .form-title {
            text-align: center;
            font-size: 20px;
            /* font-weight: bold; */
            margin-bottom: 15px;
        }

        #consultationTypeContainer {
            position: relative;
        }

        #consultationDropdown {
            cursor: pointer;
            background: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #consultationOptions {
            display: none;
            position: absolute;
            width: 100%;
            background: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            z-index: 10;
            padding: 10px;
        }

        .dropdown-icon {
            font-size: 14px;
            color: #666;
        }

        .radio-group label {
            display: block;
            padding: 5px;
        }

        @media (max-width: 600px) {
            .consultation-form {
                width: 90%;
            }
        }

        .container {
            max-width: 1100px;
            margin: auto;
            padding: 20px;
        }

        .button-container {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .add-btn {
            background-color: #f3ebe9;
            border: 1px solid #e3d2cf;
            color: #333;
            padding: 10px 15px;
            border-radius: 6px;
            cursor: pointer;
        }

        .add-btn:hover {
            background-color: #e3d2cf;
        }

        .consultation-row {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }



        .consultation-card.show {
            opacity: 1;
            transform: translateY(0);
        }

        .consultation-card h5 {
            /* font-weight: bold; */
            margin-bottom: 5px;
        }

        .consultation-card {
            border: 1px solid #f4c28c;
            padding: 15px;
            border-radius: 8px;
            width: calc(33.33% - 20px);
            min-width: 280px;
            max-width: 350px;
            text-align: left;
            background-color: #fff;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
            word-wrap: break-word;
            /* Ensures long words wrap */
            overflow-wrap: break-word;
            /* Alternative for better browser support */
            white-space: normal;
            /* Ensures text wraps instead of staying in one line */
        }

        .consultation-card p {
            margin: 5px 0;
            color: #555;
            word-break: break-word;
            /* Prevents text overflow */
        }


        .consultation-card .location {
            color: green;
            /* font-weight: bold; */
        }

        @media (max-width: 992px) {
            .consultation-card {
                width: calc(50% - 20px);
            }
        }

        @media (max-width: 600px) {
            .consultation-card {
                width: 100%;
            }

            .button-container {
                justify-content: center;
            }
        }

        .container {
            max-width: 1100px;
            margin: auto;
            padding: 20px;
        }

        .consultation-row {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .consultation-card {
            border: 1px solid #f4c28c;
            padding: 15px;
            border-radius: 8px;
            width: calc(33.33% - 20px);
            min-width: 280px;
            max-width: 350px;
            text-align: left;
            background-color: #fff;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
        }

        .consultation-card.show {
            opacity: 1;
            transform: translateY(0);
        }

        .consultation-card h5 {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .consultation-card p {
            margin: 5px 0;
            color: #555;
        }

        .consultation-card .location {
            color: green;
            /* font-weight: bold; */
        }

        @media (max-width: 992px) {
            .consultation-card {
                width: calc(50% - 20px);
            }
        }

        @media (max-width: 600px) {
            .consultation-card {
                width: 100%;
            }
        }

        /* Background blur effect */
        #background-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(5px);
            z-index: 10;
        }

        /* Ensure form appears above */
        .consultation-form {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            z-index: 20;
            width: 90%;
            max-width: 700px;
        }

        /* Prevent scrolling when form is open */
        body.no-scroll {
            overflow: hidden;
        }
    </style>
</head>

<body>
    <header>
        <?php $this->load->view('Astrologer/Include/AstrologerNav') ?>
    </header>

    <div class="container">
        <!-- Add Consultation Button (Right Side) -->
        <div class="add-btn-container">
            <button class="btn btn-secondary" id="showFormBtn">+ Add Consultation</button>
        </div>

        <!-- Hidden Consultation Form -->
        <div class="consultation-form" id="consultationForm">
            <div class="close-btn" id="closeFormBtn">✖</div>
            <div class="form-title">Add Consultation</div>
            <form id="consultationFormData">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter full name" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="time">Time</label>
                        <input type="time" class="form-control" id="time" required>
                    </div>
                    <div class="col-md-6 form-group" id="consultationTypeContainer">
                        <label>Consultation Type</label>
                        <div id="consultationDropdown" class="form-control">
                            <span>Select Type</span>
                            <i class="fas fa-chevron-down dropdown-icon"></i>
                        </div>
                        <div id="consultationOptions">
                            <div class="radio-group">
                                <label><input type="radio" name="consultation" value="Vastu"> 1. Vastu Consultation</label>
                                <label><input type="radio" name="consultation" value="Kundli"> 2. Kundli</label>
                                <label><input type="radio" name="consultation" value="Vedic"> 3. Vedic Astrology</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address Field Width Fixed -->
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter address" required>
                    </div>
                </div>

                <button type="submit" class="submit-btn">Add</button>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="consultation-row" id="cards-container">
            <div class="consultation-card">
                <h5>John Doe</h5>
                <p><strong>Date :</strong> 12/1/2025</p>
                <p><strong>Time :</strong> 10:30 am</p>
                <p><strong>Consultation Type :</strong> Vastu</p>
                <p class="location">XYZ, ABC Road, Pandit Colony Nashik</p>
            </div>

            <div class="consultation-card">
                <h5>John Doe</h5>
                <p><strong>Date :</strong> 12/1/2025</p>
                <p><strong>Time :</strong> 10:30 am</p>
                <p><strong>Consultation Type :</strong> Vedic</p>
                <p class="location">XYZ, ABC Road, Pandit Colony Nashik</p>
            </div>

            <div class="consultation-card">
                <h5>John Doe</h5>
                <p><strong>Date :</strong> 12/1/2025</p>
                <p><strong>Time :</strong> 10:30 am</p>
                <p><strong>Consultation Type :</strong> Vastu</p>
                <p class="location">XYZ, ABC Road, Pandit Colony Nashik</p>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            // Show the form
            $("#showFormBtn").click(function() {
                $("#consultationForm").fadeIn();
            });

            // Hide the form
            $("#closeFormBtn").click(function() {
                $("#consultationForm").fadeOut();
            });

            // Show dropdown and radio buttons when clicking "Consultation Type"
            $("#consultationDropdown").click(function(event) {
                event.stopPropagation();
                $("#consultationOptions").fadeToggle();
                $(".radio-group").fadeIn(); // Ensure it shows up
            });

            // Selecting a radio button updates the dropdown text
            $("input[name='consultation']").change(function() {
                let selectedText = $("input[name='consultation']:checked").parent().text().trim();
                $("#consultationDropdown span").text(selectedText);
                $("#consultationOptions").fadeOut();
            });

            // Prevent hiding dropdown when clicking inside it
            $("#consultationOptions").click(function(event) {
                event.stopPropagation();
            });

            // Hide dropdown when clicking outside
            $(document).click(function(event) {
                if (!$(event.target).closest("#consultationTypeContainer").length) {
                    $("#consultationOptions").fadeOut();
                }
            });

            // Form validation and submission with SweetAlert
            $("#consultationFormData").submit(function(e) {
                e.preventDefault();

                let name = $("#name").val().trim();
                let date = $("#date").val().trim();
                let time = $("#time").val().trim();
                let address = $("#address").val().trim();
                let consultation = $("input[name='consultation']:checked").val();

                if (!name || !date || !time || !address || !consultation) {
                    Swal.fire("Error!", "Please fill all fields correctly!", "error");
                    return;
                }

                Swal.fire("Success!", "Consultation Added Successfully!", "success").then(() => {
                    $("#consultationForm").fadeOut();
                    $("#consultationFormData")[0].reset();
                    $("#consultationDropdown span").text("Select Type");
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Function to load saved consultations from localStorage
            function loadConsultations() {
                let savedConsultations = JSON.parse(localStorage.getItem("consultations")) || [];
                $("#cards-container").empty(); // Clear existing cards

                savedConsultations.forEach(function(consultation) {
                    let newCard = `
                <div class="consultation-card show">
                    <h5>${consultation.name}</h5>
                    <p><strong>Date :</strong> ${consultation.date}</p>
                    <p><strong>Time :</strong> ${consultation.time}</p>
                    <p><strong>Consultation Type :</strong> ${consultation.consultation}</p>
                    <p class="location">${consultation.address}</p>
                </div>
            `;
                    $("#cards-container").prepend(newCard);
                });
            }

            // Call this function when the page loads to restore saved consultations
            loadConsultations();

            // Show the form and blur the background
            $("#showFormBtn").click(function() {
                $("#consultationForm").fadeIn();
                $("#background-overlay").fadeIn();
                $("body").addClass("no-scroll"); // Disable scrolling
            });

            // Hide the form and remove background blur
            $("#closeFormBtn").click(function() {
                $("#consultationForm").fadeOut();
                $("#background-overlay").fadeOut();
                $("body").removeClass("no-scroll"); // Enable scrolling again
            });

            // Form validation and submission with localStorage support
            $("#consultationFormData").submit(function(e) {
                e.preventDefault();

                let name = $("#name").val().trim();
                let date = $("#date").val().trim();
                let time = $("#time").val().trim();
                let address = $("#address").val().trim();
                let consultation = $("input[name='consultation']:checked").val();

                if (!name || !date || !time || !address || !consultation) {
                    Swal.fire("Error!", "Please fill all fields correctly!", "error");
                    return;
                }

                let newConsultation = {
                    name,
                    date,
                    time,
                    address,
                    consultation
                };

                // Retrieve existing consultations from localStorage and update the list
                let savedConsultations = JSON.parse(localStorage.getItem("consultations")) || [];
                savedConsultations.push(newConsultation);
                localStorage.setItem("consultations", JSON.stringify(savedConsultations));

                // Add the new card to the UI
                let newCard = `
            <div class="consultation-card show">
                <h5>${name}</h5>
                <p><strong>Date :</strong> ${date}</p>
                <p><strong>Time :</strong> ${time}</p>
                <p><strong>Consultation Type :</strong> ${consultation}</p>
                <p class="location">${address}</p>
            </div>
        `;

                $("#cards-container").prepend(newCard); // Add card after the button

                Swal.fire("Success!", "Consultation Added Successfully!", "success").then(() => {
                    $("#consultationForm").fadeOut();
                    $("#background-overlay").fadeOut();
                    $("body").removeClass("no-scroll"); // Enable scrolling
                    $("#consultationFormData")[0].reset();
                    $("#consultationDropdown span").text("Select Type");
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <div id="background-overlay"></div>


    <footer class="text-black p-0 m-0">
    <?php $this->load->view('Astrologer/Include/AstrologerFooter'); ?>
</footer>

</body>

</html>