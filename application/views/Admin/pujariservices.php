<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Add Puja Service</title>
    <!-- Bootstrap CSS for styling and layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Rokkitt:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="<?= base_url('assets/images/admin/logo.png.png'); ?>" type="image/png">

    <style>
        /* Apply Rokkitt font to the entire page */
        * {
            font-family: 'Inter', serif;
        }
        /* Main content area styling */
        .main {

            /* Light gray background for contrast */
            min-height: 100vh;
            padding: 20px;
        }

        /* Customize headers */
        h3 {
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
        }

        /* Table Styling */
        .table-responsive {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            max-height: 630px;
            overflow-y: auto;
        }

        .table thead th {
            font-weight: 600;
            background-color: #0C768A;
            /* Yellow header */
            color: #333;
            text-align: center;
            vertical-align: middle;
            height: 60px;
            border-bottom: 2px solid #dee2e6;
            position: sticky;
            top: 0;
            z-index: 1;
        }

        .table tbody tr {
            text-align: center;
            height: 66px !important;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #ffffff;
            /* White for odd rows */
        }

        .table tbody tr:nth-child(even) {
            background-color: #f8f9fa;
            /* Light gray for even rows */
        }

        .table tbody tr:hover {
            background-color: #e9ecef;
            /* Hover effect */
        }

        .table td,
        .table th {
            vertical-align: middle;
            padding: 0.75rem;
        }

        /* Action Buttons */
        .action-btn {
            font-size: 20px;
            padding: 0.25rem 0.75rem;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            transition: opacity 0.3s ease;
        }

        .action-btn.edit {
            background-color:#0C768A;
            /* Green for Edit button */
        }

        .action-btn.delete {
            background-color: #dc3545;
            /* Red for Delete button */
        }

        .action-btn:hover {
            opacity: 0.9;
        }

        /* Add Puja Button */
        .fixed-right-btn {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            background-color: #0C768A;
            /* Green to match the theme */
            color: white;
            border: none;
            transition: background-color 0.3s ease;
        }

        .fixed-right-btn:hover {
            background-color: #7ab03f;
            /* Slightly darker green on hover */
        }

        /* Modal Styling */
        .modal-content {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            background-color: #F6CE57;
            /* Yellow header */
            color: #333;
            border-bottom: none;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .form-label {
            font-weight: 500;
            color: #333;
        }

        .form-control,
        .form-select {
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 0.5rem 0.75rem;
            transition: border-color 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #0C768A;
            box-shadow: 0 0 5px rgba(139, 194, 74, 0.2);
        }

        /* Form Icons */
        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-group i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #0C768A;
            font-size: 1.1rem;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            padding-left: 35px;
            /* Space for the icon */
        }

        /* Modal Submit Button */
        .modal-body .btn-primary {
            background-color: #0C768A;
            border: none;
            border-radius: 5px;
            padding: 0.5rem 1rem;
            transition: background-color 0.3s ease;
        }

        .modal-body .btn-primary:hover {
            background-color: #7ab03f;
        }

        /* Pagination Styling */
        .pagination .page-link {

            color: #0C768A;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            margin: 10px 2px;
            transition: background-color 0.3s ease;
        }

        .pagination .page-item.active .page-link {
            background-color: #0C768A;
            border-color: #0C768A;
            color: white;
        }

        .pagination .page-link:hover {
            background-color: #e9ecef;
            border-color: #dee2e6;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .main {
                margin-top: 0 !important;
                padding: 10px;
            }

            h3.text-center {
                font-size: 1.5rem;
            }

            .table-responsive {
                font-size: 0.8rem;
                max-height: 500px;
                /* Adjust height for mobile */
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .table th,
            .table td {
                white-space: nowrap;
                padding: 0.5rem;
            }

            .action-btn {
                padding: 0.2rem 0.5rem;
                font-size: 0.75rem;
            }

            .fixed-right-btn {
                font-size: 0.8rem;
                padding: 0.4rem 0.8rem;
                width: 100%;
                margin-bottom: 10px;
            }

            /* Ensure table headers are visible and aligned properly */
            .table thead th {
                position: sticky;
                top: 0;
                z-index: 1;
                background-color: #F6CE57;
            }

            /* Adjust modal for mobile */
            .modal-dialog {
                margin: 1rem;
            }

            .modal-body {
                padding: 1rem;
            }

            .modal-body .btn-primary {
                width: 100%;
            }
        }

        /* Scrollbar Styling for Table */
        .table-responsive::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background-color: #ccc;
            border-radius: 4px;
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            background-color: #999;
        }
    </style>
</head>

<body style="background-color:rgb(228, 236, 241);">
    <div class="d-flex">
        <!-- Sidebar -->
        <?php $this->load->view('IncludeAdmin/CommanSideBar'); ?>
        <!-- SIDEBAR END -->

        <!-- Main Component -->
        <div class="main">
            <!-- Navbar -->
            <?php $this->load->view('IncludeAdmin/CommanNavBar'); ?>
            <!-- Navbar End -->

            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-md-12">
                        <h3 class="text-center">Pujari Services</h3>
                        <div class="d-flex justify-content-end mb-3">
                            <button class="btn fixed-right-btn" data-bs-toggle="modal" data-bs-target="#addModal">Add Puja</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr. No.</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Image</th>
                                        
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="pujari_service-table-body">
                                    <!-- Dynamic Rows Here -->
                                </tbody>
                            </table>
                        </div>
                        <nav>
                            <ul class="pagination justify-content-center" id="pagination">
                                <!-- Dynamic Pagination Here -->
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Puja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editPujaForm">
                        <input type="hidden" id="service_id">
                        <input type="hidden" id="service_type" value="pujari"> <!-- Hidden Field for Service Type -->


                        <div class="mb-3 form-group">
                            <label for="edit-title" class="form-label">Title</label>
                            <i class="fas fa-heading"></i>
                            <input type="text" class="form-control" id="edit-title" required maxlength="50"
                                oninput="(function(element) { 
                                            element.value = element.value
                                                .replace(/^[ ]+/g, '')                
                                                .replace(/[^a-zA-Z0-9\s\-&',.]/g, ''); 
                                        })(this)"
                                pattern="^[^\s][a-zA-Z0-9\s\-&',.]{1,}$" title="Enter a valid name. Allowed: letters, numbers, spaces, and - & ' , .">
                            <div class="invalid-feedback">Please enter a valid title (Allowed: letters, numbers, spaces, and - & ' , ., no leading spaces).</div>
                        </div>

                        <div class="mb-3 form-group">
                            <label for="edit-description" class="form-label">Description</label>
                            <i class="fas fa-align-left"></i>
                            <textarea class="form-control" id="edit-description" rows="3" required minlength="10"></textarea>
                            <div class="invalid-feedback">Description must be at least 10 characters long.</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="price" class="form-label">Price (in ₹)</label>
                            <i class="fas fa-rupee-sign"></i>
                            <input type="number" class="form-control" id="edit-price" name="edit-price" required min="0" step="0.01">
                        </div>

                       

                        <div class="mb-3 form-group">
                            <label for="edit-image" class="form-label">Upload Image</label>
                            <i class="fas fa-image"></i>
                            <input type="file" class="form-control" id="edit-image" accept="image/*">
                            <div class="invalid-feedback">Please select a valid image file.</div>
                        </div>

                        <!-- Default Hidden Service Type Field -->
                        <input type="hidden" id="edit-service-type" value="Pujari">

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Puja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addPujaForm">
                        <input type="hidden" id="service_type" value="pujari"> <!-- Hidden Field for Service Type -->

                        <div class="mb-3 form-group">
                            <label for="title" class="form-label">Title</label>
                            <i class="fas fa-heading"></i>
                            <input type="text" class="form-control" id="title" required maxlength="50"
                                oninput="(function(element) { 
                                            element.value = element.value
                                                .replace(/^[ ]+/g, '')                
                                                .replace(/[^a-zA-Z0-9\s\-&',.]/g, ''); 
                                        })(this)"
                                pattern="^[^\s][a-zA-Z0-9\s\-&',.]{1,}$" title="Enter a valid name. Allowed: letters, numbers, spaces, and - & ' , .">
                            <div class="invalid-feedback">Please enter a valid title (Allowed: letters, numbers, spaces, and - & ' , ., no leading spaces).</div>
                        </div>

                        <div class="mb-3 form-group">
                            <label for="description" class="form-label">Description</label>
                            <i class="fas fa-align-left"></i>
                            <textarea class="form-control" id="description" rows="3" required minlength="10"></textarea>
                            <div class="invalid-feedback">Description must be at least 10 characters long.</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="price" class="form-label">Price (in ₹)</label>
                            <i class="fas fa-rupee-sign"></i>
                            <input type="number" class="form-control" id="price" name="price" required min="0" step="0.01">
                        </div>

                       

                        <div class="mb-3 form-group">
                            <label for="image" class="form-label">Upload Image</label>
                            <i class="fas fa-image"></i>
                            <input type="file" class="form-control" id="image" accept="image/*" required>
                            <div class="invalid-feedback">Please upload a valid image.</div>
                        </div>

                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Script for Table, Pagination, and Form Validation -->
    <script>
        let pujari_services = [];
        const recordsPerPage = 7;
        let currentPage = 1;
        document.addEventListener("DOMContentLoaded", function() {
            const fetchApiUrl = "fetchAllServices"; // Fetch Services API
            const addApiUrl = "addService"; // Add Service API



            async function fetchPujaServices() {
                try {
                    const response = await fetch(fetchApiUrl);
                    const data = await response.json();

                    if (data.status === "success") {
                        pujari_services = data.data;
                        renderTable(currentPage);
                        renderPagination();
                    } else {
                        console.error("No services found");
                    }
                } catch (error) {
                    console.error("Error fetching data:", error);
                }
            }

            function renderTable(page) {
                const startIndex = (page - 1) * recordsPerPage;
                const endIndex = startIndex + recordsPerPage;
                const visiblepujari_services = pujari_services.slice(startIndex, endIndex);

                const tableBody = document.getElementById("pujari_service-table-body");
                tableBody.innerHTML = "";

                visiblepujari_services.forEach((pujari_service, index) => {
                    const row = `
                <tr>
                    <th scope="row">${startIndex + index + 1}</th>
                    <td>${pujari_service.name}</td>
                    <td>${truncateText(pujari_service.description, 50)}</td>
                    <td>
                        <img 
                            src="${pujari_service.image ? '<?= base_url('uploads/Services/') ?>' + pujari_service.image : 'https://placehold.co/40x40'}" 
                            class="img-fluid rounded" 
                            alt="${pujari_service.name}" 
                            style="width: 40px; height: 40px;">
                    </td>

                   
                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                        <a href="#" class="action-btn edit" data-id="${pujari_service.id}">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="#" class="action-btn delete" data-id="${pujari_service.id}">
                            <i class="bi bi-trash"></i>
                        </a>
                        </div>
                    </td>
                </tr>
            `;
                    tableBody.innerHTML += row;
                });

                document.querySelectorAll(".action-btn.edit").forEach(button => {
                    button.addEventListener("click", function() {
                        const id = this.getAttribute("data-id");
                        const pujari_service = pujari_services.find(f => f.id == id);
                        document.getElementById("edit-title").value = pujari_service.name;
                        document.getElementById("edit-description").value = pujari_service.description;
                   
                        document.getElementById("editModal").setAttribute("data-id", id);
                    });
                });

                renderPagination(); // Ensure pagination updates after rendering
            }

            function renderPagination() {
                const totalPages = Math.ceil(pujari_services.length / recordsPerPage);
                const paginationContainer = document.getElementById("pagination");
                paginationContainer.innerHTML = "";

                if (totalPages <= 1) return; // No need for pagination if only one page

                let paginationHTML = `
            <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                <a class="page-link" href="#" data-page="${currentPage - 1}">Previous</a>
            </li>`;

                for (let i = 1; i <= totalPages; i++) {
                    paginationHTML += `
                <li class="page-item ${currentPage === i ? 'active' : ''}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                </li>`;
                }

                paginationHTML += `
            <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                <a class="page-link" href="#" data-page="${currentPage + 1}">Next</a>
            </li>`;

                paginationContainer.innerHTML = paginationHTML;

                document.querySelectorAll(".page-link").forEach(button => {
                    button.addEventListener("click", function(e) {
                        e.preventDefault();
                        const page = parseInt(this.getAttribute("data-page"));
                        if (!isNaN(page) && page > 0 && page <= totalPages) {
                            currentPage = page;
                            renderTable(currentPage);
                        }
                    });
                });
            }

            function truncateText(text, maxLength) {
                return text.length > maxLength ? text.substring(0, maxLength) + "..." : text;
            }
            //Add Puja
            document.getElementById("addPujaForm").addEventListener("submit", async function(event) {
                event.preventDefault(); // Prevent form reload

                const title = document.getElementById("title").value.trim();
                const description = document.getElementById("description").value.trim();
              
                const price = document.getElementById("price").value;
                const image = document.getElementById("image").files[0];
                const serviceType = document.getElementById("service_type").value; // Get hidden field value

                let isValid = true;
                let errorMessage = "";

                // Validate title
                const titleInput = document.getElementById("title");
                if (!title || !/^[^\s][a-zA-Z0-9\s\-&',.]{1,}$/.test(title)) {
                    isValid = false;
                    errorMessage += "Title is invalid. It must not start with a space and can contain letters, numbers, and - & ' , .\n";
                    titleInput.classList.add("is-invalid");
                } else {
                    titleInput.classList.remove("is-invalid");
                }

                // Validate description
                const descInput = document.getElementById("description");
                if (description.length < 10) {
                    isValid = false;
                    errorMessage += "Description must be at least 10 characters long.\n";
                    descInput.classList.add("is-invalid");
                } else {
                    descInput.classList.remove("is-invalid");
                }

                // Validate image
                const imageInput = document.getElementById("image");
                if (image) {
                    const validExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                    const fileExtension = image.name.split('.').pop().toLowerCase();
                    if (!validExtensions.includes(fileExtension)) {
                        isValid = false;
                        imageInput.classList.add("is-invalid");
                        imageInput.nextElementSibling && (imageInput.nextElementSibling.style.display = "block");
                        errorMessage += "Invalid image file type. Allowed: jpg, jpeg, png, gif, webp.\n";
                    } else {
                        imageInput.classList.remove("is-invalid");
                        imageInput.nextElementSibling && (imageInput.nextElementSibling.style.display = "none");
                    }
                }

                if (!isValid) {
                    Swal.fire("Validation Error!", errorMessage, "error");
                    return;
                }

                let formData = new FormData();
                formData.append("name", title);
                formData.append("description", description);
             
                formData.append("price", price);
                formData.append("image", image);
                formData.append("service_type", serviceType); // Include service_type in request

                try {
                    const response = await fetch(addApiUrl, {
                        method: "POST",
                        body: formData
                    });

                    const result = await response.json();

                    if (result.status === "success") {
                        Swal.fire("Success!", "Puja service added successfully.", "success").then(() => {
                            document.getElementById("addPujaForm").reset();
                            fetchPujaServices();
                            let modalElement = document.getElementById("addModal");
                            let modalInstance = bootstrap.Modal.getInstance(modalElement);
                            modalInstance.hide();
                        });
                    } else {
                        Swal.fire("Error!", result.message, "error");
                    }
                } catch (error) {
                    Swal.fire("Error!", "Failed to add service.", "error");
                    console.error("Error adding service:", error);
                }
            });

            fetchPujaServices();
        });
        // edit Puja
        document.addEventListener("DOMContentLoaded", function() {
            const editApiUrl = "editService"; // Correct API endpoint

            document.addEventListener("click", function(event) {
                if (event.target.closest(".action-btn.edit")) {
                    const id = event.target.closest(".edit").getAttribute("data-id");
                    const pujari_service = pujari_services.find(f => f.id == id);

                    if (pujari_service) {
                        document.getElementById("service_id").value = pujari_service.id;
                        document.getElementById("edit-title").value = pujari_service.name;
                        document.getElementById("edit-description").value = pujari_service.description;
                        document.getElementById("edit-price").value = pujari_service.price;
                     
                        document.getElementById("edit-service-type").value = "Pujari"; // Hidden field

                        let editModal = new bootstrap.Modal(document.getElementById("editModal"));
                        editModal.show();
                    }
                }
            });

            document.getElementById("editPujaForm").addEventListener("submit", async function(event) {
                event.preventDefault();

                const serviceId = document.getElementById("service_id").value.trim();
                const title = document.getElementById("edit-title").value.trim();
                const description = document.getElementById("edit-description").value.trim();
                const price = document.getElementById("edit-price").value;
               
                const image = document.getElementById("edit-image").files[0];
                const serviceType = document.getElementById("edit-service-type").value;

                if (!serviceId || !title) {
                    Swal.fire("Error!", "Service ID and Name are required.", "error");
                    return;
                }
                let isValid = true;
                let errorMessage = "";

                // Validate title
                const titleInput = document.getElementById("title");
                if (!title || !/^[^\s][a-zA-Z0-9\s\-&',.]{1,}$/.test(title)) {
                    isValid = false;
                    errorMessage += "Title is invalid. It must not start with a space and can contain letters, numbers, and - & ' , .\n";
                    titleInput.classList.add("is-invalid");
                } else {
                    titleInput.classList.remove("is-invalid");
                }

                // Validate description
                const descInput = document.getElementById("description");
                if (description.length < 10) {
                    isValid = false;
                    errorMessage += "Description must be at least 10 characters long.\n";
                    descInput.classList.add("is-invalid");
                } else {
                    descInput.classList.remove("is-invalid");
                }

                // Validate image
                const imageInput = document.getElementById("image");
                if (image) {
                    const validExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                    const fileExtension = image.name.split('.').pop().toLowerCase();
                    if (!validExtensions.includes(fileExtension)) {
                        isValid = false;
                        imageInput.classList.add("is-invalid");
                        imageInput.nextElementSibling && (imageInput.nextElementSibling.style.display = "block");
                        errorMessage += "Invalid image file type. Allowed: jpg, jpeg, png, gif, webp.\n";
                    } else {
                        imageInput.classList.remove("is-invalid");
                        imageInput.nextElementSibling && (imageInput.nextElementSibling.style.display = "none");
                    }
                }

                if (!isValid) {
                    Swal.fire("Validation Error!", errorMessage, "error");
                    return;
                }

                let formData = new FormData();
                formData.append("service_id", serviceId); // Ensure correct key name
                formData.append("name", title);
                formData.append("description", description);
             
                formData.append("price", price);
                formData.append("service_type", serviceType);
                if (image) {
                    formData.append("image", image);
                }

                try {
                    const response = await fetch(editApiUrl, {
                        method: "POST",
                        body: formData
                    });

                    const textResponse = await response.text(); // Get raw response
                    try {
                        const result = JSON.parse(textResponse); // Try parsing as JSON

                        if (result.status === "success") {
                            Swal.fire("Success!", "Puja service updated successfully.", "success").then(() => {
                                document.getElementById("editPujaForm").reset();
                                // fetchPujaServices(); // Refresh table
                                let modalElement = document.getElementById("editModal");
                                let modalInstance = bootstrap.Modal.getInstance(modalElement);
                                modalInstance.hide();


                                // Reload the page after modal closes
                                setTimeout(() => {
                                    location.reload();
                                }, 500); // Small delay to ensure smooth UX
                            });
                        } else {
                            Swal.fire("Error!", result.message, "error");
                        }

                    } catch (jsonError) {
                        console.error("Invalid JSON Response:", textResponse);
                        Swal.fire("Error!", "Unexpected server response. Check console for details.", "error");
                    }
                } catch (error) {
                    console.error("Error updating service:", error);
                    Swal.fire("Error!", "Something went wrong. Please try again.", "error");
                }
            });
        });
        //Delete Button
        document.addEventListener("DOMContentLoaded", function() {
            const deleteApiUrl = "deleteService"; // Delete API

            document.addEventListener("click", async function(event) {
                const deleteButton = event.target.closest(".action-btn.delete");
                if (deleteButton) {
                    const id = deleteButton.getAttribute("data-id");

                    if (!id) {
                        console.error("Service ID is missing!");
                        Swal.fire("Error!", "Service ID is required.", "error");
                        return;
                    }

                    Swal.fire({
                        title: "Are you sure?",
                        text: "This action cannot be undone!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Yes, delete it!"
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            try {
                                let formData = new FormData();
                                formData.append("service_id", id); // ✅ Ensure ID is sent

                                const response = await fetch(deleteApiUrl, {
                                    method: "POST",
                                    body: formData
                                });

                                const data = await response.json();

                                if (data.status === "success") {
                                    Swal.fire("Deleted!", "Puja service has been deleted.", "success").then(() => {
                                        location.reload(); // Reload page after successful delete
                                    });
                                } else {
                                    Swal.fire("Error!", data.message, "error");
                                }
                            } catch (error) {
                                console.error("Error deleting service:", error);
                                Swal.fire("Error!", "Failed to delete service.", "error");
                            }
                        }
                    });
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>