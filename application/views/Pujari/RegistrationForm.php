<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Pujari Role</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', serif;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-custom {
            background-color: #ff8000;
            color: white;
            width: 200px;
            display: block;
            margin: 0 auto;
        }

        .btn-custom:hover {
            background-color: #e06c00;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-container img {
            width: 180px;
        }

        .error {
            color: red;
            font-size: 12px;
            display: none;
        }

        .text-center {
            text-align: start !important;
        }

        hr {
            border: 0;
            height: 1px;
            background-color: #ddd;
            margin-bottom: 20px;
        }

        #fileList {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        /* File item styling */
        .file-item {
            background: #f8f9fa;
            border-radius: 5px;
            padding: 6px;
            font-size: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            width: 100%;
            border: 1px solid #ddd;
        }

        /* Remove (Cross) Button Styling */
        .remove-file {
            background: none;
            border: none;
            font-size: 14px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo-container">
            <img src="assets/images/Pujari/logo.png" alt="Jyotisika Logo">
        </div>
        <h4 class="text-center">Apply for Pujari Role</h4>
        <hr>
        <form id="pujariForm">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="name" required placeholder="Enter your name" pattern="^[a-zA-Z\s]+$" title="Only letters and spaces are allowed.">
                </div>
                <div class="col-md-6 form-group">
                    <label>Contact</label>
                    <input type="text" class="form-control" id="contact" maxlength="10" required placeholder="Enter your contact number" pattern="\d{10}" title="Must be a 10-digit number.">
                </div>
                <div class="col-md-6 form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="email" required placeholder="Enter your email">
                </div>
                <div class="col-md-6 form-group">
                    <label>Gender</label>
                    <select class="form-control" id="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" id="address" required minlength="5" placeholder="Enter your Address">
                </div>
                <div class="col-md-6 form-group">
                    <label>Languages Known</label>
                    <select class="form-control" id="languages" required>
                        <option value="">Select languages</option>
                        <option value="Hindi">Hindi</option>
                        <option value="Sanskrit">Sanskrit</option>
                        <option value="English">English</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>Specialties</label>
                    <input type="text" class="form-control" id="specialties" required minlength="3" placeholder="Enter Specialties">
                </div>
                <div class="col-md-6 form-group">
                    <label>Aadhaar Card</label>
                    <input type="file" class="form-control" id="aadhaarCard" accept=".pdf,.jpg,.png" required>
                </div>

                <div class="col-md-6 form-group">
                    <label>Certificates (optional)</label>
                    <input type="file" class="form-control" id="certificates" accept=".pdf,.jpg,.png" multiple>
                    <div id="fileList" class="mt-2"></div>
                </div>
            </div>
            <button type="submit" class="btn btn-custom mt-3">Submit</button>
        </form>
    </div>

    <script>
        document.getElementById("contact").addEventListener("input", function(event) {
            this.value = this.value.replace(/\D/g, '');
        });
    </script>
    <script>
        document.getElementById("pujariForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent actual form submission

            // Redirect directly to success message section in MobileNumberAndOTPForm
            window.location.href = "<?php echo base_url('MobileNumberAndOTPForm'); ?>?success=true";
        });
    </script>

    <script>
        let selectedFiles = []; // Store selected files

        document.getElementById("certificates").addEventListener("change", function(event) {
            let newFiles = Array.from(event.target.files);

            // Merge new files with previously selected ones
            selectedFiles = [...selectedFiles, ...newFiles];

            displayFiles(); // Show updated list
        });

        function displayFiles() {
            const fileList = document.getElementById("fileList");
            fileList.innerHTML = ""; // Clear the list before re-rendering

            const row = document.createElement("div");
            row.classList.add("row", "gx-2"); // Bootstrap row with gap reduction

            selectedFiles.forEach((file, index) => {
                const fileItem = document.createElement("div");
                fileItem.classList.add("col-4", "p-1"); // 3 files per row

                fileItem.innerHTML = `
            <div class="file-item d-flex justify-content-between align-items-center">
                <span class="text-truncate">${file.name}</span>
                <button type="button" class="text-danger remove-file" data-index="${index}" title="Remove">❌</button>
            </div>
        `;

                row.appendChild(fileItem);
            });

            fileList.appendChild(row);
            attachRemoveEvents(); // Attach event listeners after rendering
        }

        function attachRemoveEvents() {
            document.querySelectorAll(".remove-file").forEach(button => {
                button.addEventListener("click", function() {
                    removeFile(button.getAttribute("data-index"));
                });
            });
        }

        function removeFile(index) {
            selectedFiles.splice(index, 1); // Remove file from array
            displayFiles(); // Refresh file list
        }
    </script>
</body>

</html>