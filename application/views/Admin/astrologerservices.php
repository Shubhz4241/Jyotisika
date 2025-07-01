<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Add Astrologer Service</title>
    <!-- Bootstrap CSS for styling and layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rokkitt:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="<?= base_url('assets/images/admin/logo.png.png'); ?>" type="image/png">
 <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rokkitt:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Apply Rokkitt font to the entire page */
        * {
            font-family: 'Inter', serif;
        }

        /* Main content area styling */
        .main {

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
            background-color: #0C768A ;
            color: white;
            text-align: center;
            font-size: 18px;
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
        }

        .table tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .table tbody tr:hover {
            background-color: #e9ecef;
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
            background-color: #0C768A ;
        }

        .action-btn.delete {
            background-color: #dc3545;
        }

        .action-btn:hover {
            opacity: 0.9;
        }

        /* Add Service Button */
        .fixed-right-btn {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            background-color: #0C768A ;
            color: white;
            border: none;
            transition: background-color 0.3s ease;
        }

        .fixed-right-btn:hover {
            background-color: #0C768A ;
        }

        /* Modal Styling */
        .modal-content {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            background-color: #0C768A ;
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
            border-color: #0C768A ;
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
            color: #0C768A ;
            font-size: 1.1rem;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            padding-left: 35px;
        }

        /* Modal Submit Button */
        .modal-body .btn-primary {
            background-color: #8BC24A;
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
            color: #0C768A ;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            margin: 10px 2px;
            transition: background-color 0.3s ease;
        }

        .pagination .page-item.active .page-link {
            background-color: #0C768A ;
            border-color: #8BC24A;
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

            .table thead th {
                position: sticky;
                top: 0;
                z-index: 1;
                background-color: #0C768A ;
            }

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
                        <h3 class="text-center">Astrologer Services</h3>
                        <div class="d-flex justify-content-end mb-3">
                            <button class="btn fixed-right-btn" data-bs-toggle="modal" data-bs-target="#addModal">Add Service</button>
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
                                <tbody id="festival-table-body">
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
                    <h5 class="modal-title" id="editModalLabel">Edit Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editServiceForm">
                        <div class="mb-3 form-group">
                            <label for="edit-title" class="form-label">Title</label>
                            <i class="fas fa-heading"></i>
                            <input type="text" class="form-control" id="edit-title" aria-describedby="title" required maxlength="50"
                                oninput="(function(element) { 
                                            element.value = element.value
                                                .replace(/^[ ]+/g, '')                
                                                .replace(/[^a-zA-Z0-9\s\-&',.]/g, ''); 
                                        })(this)"
                                pattern="^[^\s][a-zA-Z0-9\s\-&',.]{1,}$" title="Enter a valid name. Allowed: letters, numbers, spaces, and - & ' , .">
                            <div class="invalid-feedback">Please enter a valid title (Allowed: letters, numbers, spaces, and - & ' , ., no leading spaces).</div>
                        </div>
                        <!-- <div class="mb-3 form-group">
                            <label for="price" class="form-label">Price (in ₹)</label>
                            <i class="fas fa-rupee-sign"></i>
                            <input type="number" class="form-control" id="edit-price" name="edit-price" required min="0" step="0.01">
                        </div> -->

                        <div class="mb-3 form-group">
                            <label for="edit-description" class="form-label">Description</label>
                            <i class="fas fa-align-left"></i>
                            <textarea class="form-control" id="edit-description" aria-describedby="description" rows="3" required minlength="10"></textarea>
                            <div class="invalid-feedback">Description must be at least 10 characters long.</div>
                        </div>

                        <div class="mb-3 form-group">
                            <label for="edit-image" class="form-label">Upload Image (Optional)</label>
                            <i class="fas fa-image"></i>
                            <input type="file" class="form-control" id="edit-image" aria-describedby="image" accept="image/*">
                            <div class="invalid-feedback">Please select a valid image file (.jpg, .jpeg, .png, .gif, .webp).</div>
                        </div>
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
                    <h5 class="modal-title" id="addModalLabel">Add Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addServiceForm">
                        <div class="mb-3 form-group">
                            <label for="title" class="form-label">Title</label>
                            <i class="fas fa-heading"></i>
                            <input type="text" class="form-control" id="title" aria-describedby="title" required maxlength="50"
                            oninput="(function(element) { 
                                            element.value = element.value
                                                .replace(/^[ ]+/g, '')                
                                                .replace(/[^a-zA-Z0-9\s\-&',.]/g, ''); 
                                        })(this)"
                                pattern="^[^\s][a-zA-Z0-9\s\-&',.]{1,}$" title="Enter a valid name. Allowed: letters, numbers, spaces, and - & ' , .">
                            <div class="invalid-feedback">Please enter a valid title (Allowed: letters, numbers, spaces, and - & ' , ., no leading spaces).</div>
                        </div>
                        <!-- <div class="mb-3 form-group">
                            <label for="price" class="form-label">Price (in ₹)</label>
                            <i class="fas fa-rupee-sign"></i>
                            <input type="number" class="form-control" id="price" name="price" required min="0" step="0.01">
                        </div> -->

                        <div class="mb-3 form-group">
                            <label for="description" class="form-label">Description</label>
                            <i class="fas fa-align-left"></i>
                            <textarea class="form-control" id="description" aria-describedby="description" rows="3" required minlength="10"></textarea>
                            <div class="invalid-feedback">Description must be at least 10 characters long.</div>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="image" class="form-label">Upload Image (Optional)</label>
                            <i class="fas fa-image"></i>
                            <input type="file" class="form-control" id="image" aria-describedby="image" accept="image/*">
                            <div class="invalid-feedback">Please select a valid image file (.jpg, .jpeg, .png, .gif, .webp).</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script for Table, Pagination, and Form Validation -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const baseUrl = "<?php echo base_url() ?>";
            const apiUrl = `${baseUrl}/Admin/GetAstrologerServices`;
            const deleteUrl = `${baseUrl}/Admin/deleteService`;
            const editUrl = `${baseUrl}/Admin/editService`;
            const addUrl = `${baseUrl}/Admin/AddService`; // New API endpoint
            let services = [];
            const recordsPerPage = 8;
            let currentPage = 1;

            async function fetchServices() {
    try {
        const response = await fetch(apiUrl);
        if (!response.ok) throw new Error(`Network response was not ok: ${response.status}`);
        let result = await response.json();
        console.log("Raw API response:", result);

        if (result && result.status === "success" && Array.isArray(result.services)) {
            services = result.services.map(service => ({
                id: service.id || "N/A",
                name: service.name || "N/A",
                description: service.description || "N/A",
                price: service.price || "N/A", // Include price since it's in the response
                image: service.image || null,
                mode: service.service_type || "N/A" // Map service_type to mode
            }));
            console.log("Mapped services:", services);
        } else {
            console.warn("Invalid API response format:", result);
            services = [];
        }
    } catch (error) {
        console.error("Fetch services error:", error);
        services = [];
    }
    renderTable(currentPage);
    renderPagination();
}
            function truncateText(text, maxLength) {
                return text && text.length > maxLength ? text.substring(0, maxLength) + "..." : text || "N/A";
            }

            function renderTable(page) {
                const startIndex = (page - 1) * recordsPerPage;
                const endIndex = startIndex + recordsPerPage;
                const visibleServices = services.slice(startIndex, endIndex);

                const tableBody = document.getElementById("festival-table-body");
                tableBody.innerHTML = "";

                visibleServices.forEach((service, index) => {
                    const row = `
                        <tr>
                            <th scope="row">${startIndex + index + 1}</th>
                            <td>${service.name}</td>
                            <td>${truncateText(service.description, 50)}</td>
                            <td>
                                ${
                                    service.image
                                        ? `<img src="<?= base_url('uploads/Services/') ?>${service.image}" class="img-fluid rounded" alt="${service.name}" style="width: 40px; height: 40px;">`
                                        : "No Image"
                                }
                            </td>
                            <td class="text-center ">
                               <div class="d-flex justify-content-center gap-2">
                                <a href="#" class="action-btn edit" data-id="${service.id}" title="Edit ${service.name}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="#" class="action-btn delete" data-id="${service.id}" title="Delete ${service.name}">
                                    <i class="bi bi-trash"></i>
                                </a>
                                </div>
                            </td>
                        </tr>
                    `;
                    tableBody.innerHTML += row;
                });
            }

            function renderPagination() {
                const totalPages = Math.ceil(services.length / recordsPerPage);
                const pagination = document.getElementById("pagination");
                pagination.innerHTML = "";

                if (totalPages <= 1) {
                    pagination.style.display = "none";
                    return;
                } else {
                    pagination.style.display = "flex";
                }

                for (let i = 1; i <= totalPages; i++) {
                    const pageItem = document.createElement("li");
                    pageItem.className = `page-item ${i === currentPage ? "active" : ""}`;
                    const pageLink = document.createElement("a");
                    pageLink.className = "page-link";
                    pageLink.href = "#";
                    pageLink.textContent = i;
                    pageLink.onclick = (e) => {
                        e.preventDefault();
                        changePage(i);
                    };
                    pageItem.appendChild(pageLink);
                    pagination.appendChild(pageItem);
                }
            }

            function changePage(page) {
                if (page < 1 || page > Math.ceil(services.length / recordsPerPage)) return;
                currentPage = page;
                renderTable(page);
                renderPagination();
            }

            async function deleteService(service_id) {
                console.log("deleteService called with service_id:", service_id);
                if (!service_id) {
                    Swal.fire({
                        title: "Error!",
                        text: "Service ID is missing!",
                        icon: "error",
                        confirmButtonColor: "#dc3545",
                    });
                    return;
                }

                const numericServiceId = Number(service_id);
                if (isNaN(numericServiceId)) {
                    Swal.fire({
                        title: "Error!",
                        text: "Service ID must be a number!",
                        icon: "error",
                        confirmButtonColor: "#dc3545",
                    });
                    return;
                }

                try {
                    const formData = new URLSearchParams();
                    formData.append('service_id', numericServiceId);

                    const response = await fetch(deleteUrl, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded",
                        },
                        body: formData,
                    });

                    const result = await response.json();
                    console.log("Delete response:", result);

                    if (!response.ok || result.status !== "success") {
                        throw new Error(result.message || `Failed to delete service (Status: ${response.status})`);
                    }

                    services = services.filter((s) => s.id !== numericServiceId);
                    renderTable(currentPage);
                    renderPagination();

                    Swal.fire({
                        title: "Deleted!",
                        text: "Service has been deleted.",
                        icon: "success",
                        confirmButtonColor: "#8BC24A",
                    }).then(() => {
                        location.reload();
                    });
                } catch (error) {
                    console.error("Delete error:", error);
                    Swal.fire({
                        title: "Error!",
                        text: "Failed to delete service: " + error.message,
                        icon: "error",
                        confirmButtonColor: "#dc3545",
                    });
                }
            }

            async function editService(service_id, name, description, imageFile) {
                console.log("editService called with service_id:", service_id, "and Name:", name);
                if (!service_id || !name) {
                    Swal.fire({
                        title: "Error!",
                        text: "Service ID and name are required!",
                        icon: "error",
                        confirmButtonColor: "#dc3545",
                    });
                    return;
                }

                const formData = new FormData();
                formData.append("service_id", service_id);
                formData.append("name", name);
                // formData.append("price", price);
                formData.append("description", description);
                if (imageFile) formData.append("image", imageFile);

                try {
                    const response = await fetch(editUrl, {
                        method: "POST",
                        body: formData,
                    });

                    const result = await response.json();
                    // console.log("Edit response:", result);

                    if (!response.ok || result.status !== "success") {
                        throw new Error(result.message || `Failed to update service (Status: ${response.status})`);
                    }

                    const updatedService = result.data || {
                        id: service_id,
                        name,
                        description,
                        image: services.find(s => s.id === service_id).image
                    };
                    const index = services.findIndex((s) => s.id === service_id);
                    if (index !== -1) {
                        services[index] = {
                            ...services[index],
                            ...updatedService
                        };
                    }

                    renderTable(currentPage);
                    renderPagination();

                    Swal.fire({
                        title: "Success!",
                        text: "Service has been updated.",
                        icon: "success",
                        confirmButtonColor: "#8BC24A",
                    }).then(() => {
                        location.reload();
                    });

                    const modal = bootstrap.Modal.getInstance(document.getElementById("editModal"));
                    modal.hide();
                } catch (error) {
                    console.error("Edit error:", error);
                    Swal.fire({
                        title: "Error!",
                        text: "Failed to update service: " + error.message,
                        icon: "error",
                        confirmButtonColor: "#dc3545",
                    });
                }
            }

            async function addService(name, description, imageFile) {

                if (!name || !description) {
                    Swal.fire({
                        title: "Error!",
                        text: "Name, service type, and description are required!",
                        icon: "error",
                        confirmButtonColor: "#dc3545",
                    });
                    return;
                }

                const formData = new FormData();
                formData.append("name", name);
                formData.append("service_type", 'astrologer');
                formData.append("description", description);
                // formData.append("price", price);

                if (imageFile) formData.append("image", imageFile); // Image is optional

                try {
                    const response = await fetch(addUrl, {
                        method: "POST",
                        body: formData,
                    });

                    const result = await response.json();
                    console.log("Add response:", result);

                    if (!response.ok || result.status !== "success") {
                        throw new Error(result.message || `Failed to add service (Status: ${response.status})`);
                    }

                    // Add the new service to the local array (assuming API returns the new service data)
                    const newService = result.data || {
                        name,
                        description,
                        image: null
                    };
                    services.push(newService);
                    renderTable(currentPage);
                    renderPagination();

                    Swal.fire({
                        title: "Success!",
                        text: "Service has been added.",
                        icon: "success",
                        confirmButtonColor: "#8BC24A",
                    }).then(() => {
                        location.reload();
                    });

                    const modal = bootstrap.Modal.getInstance(document.getElementById("addModal"));
                    modal.hide();

                    // Refresh the service list
                    fetchServices();
                } catch (error) {
                    console.error("Add error:", error);
                    Swal.fire({
                        title: "Error!",
                        text: "Failed to add service: " + error.message,
                        icon: "error",
                        confirmButtonColor: "#dc3545",
                    });
                }
            }

            function attachEventListeners() {
                // Event delegation for edit and delete buttons
                document.getElementById("festival-table-body").addEventListener("click", function(e) {
                    const target = e.target.closest(".action-btn");
                    if (!target) return;

                    e.preventDefault();
                    const service_id = target.getAttribute("data-id");
                    console.log(`${target.classList.contains("edit") ? "Edit" : "Delete"} button clicked, service_id:`, service_id);

                    if (target.classList.contains("edit")) {
                        const service = services.find((s) => s.id === service_id);
                        if (service) {
                            console.log("Found service for edit:", service);
                            document.getElementById("edit-title").value = service.name || "";
                            document.getElementById("edit-description").value = service.description || "";
                            // document.getElementById("edit-price").value = service.price || "";
                            document.getElementById("editModal").setAttribute("data-id", service_id);
                            console.log("Set data-id on modal:", document.getElementById("editModal").getAttribute("data-id"));
                            const editModal = new bootstrap.Modal(document.getElementById("editModal"));
                            editModal.show();
                        } else {
                            console.warn("Service not found for service_id:", service_id);
                        }
                    } else if (target.classList.contains("delete")) {
                        if (!service_id) {
                            console.error("Service ID is missing for delete operation.");
                            Swal.fire({
                                title: "Error!",
                                text: "Service ID is missing!",
                                icon: "error",
                                confirmButtonColor: "#dc3545",
                            });
                            return;
                        }
                        Swal.fire({
                            title: "Are you sure?",
                            text: "You won't be able to revert this!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#8BC24A",
                            cancelButtonColor: "#dc3545",
                            confirmButtonText: "Yes, delete it!",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                deleteService(service_id);
                            }
                        });
                    }
                });

                // Edit form submission
                document.getElementById("editServiceForm").addEventListener("submit", function(e) {
                    e.preventDefault();

                    const service_id = document.getElementById("editModal").getAttribute("data-id");
                    console.log("Edit form submitted, service_id from modal:", service_id);
                    const name = document.getElementById("edit-title").value.trim();
                    const description = document.getElementById("edit-description").value.trim();
                    // const price = document.getElementById("edit-price").value;
                    const imageInput = document.getElementById("edit-image");
                    const imageFile = imageInput.files[0];

                    let isValid = true;
                    let errorMessage = "";

                    if (!name || !/^[^\s].{1,}$/.test(name)) {
                        isValid = false;
                        errorMessage += "Name cannot start with a space and must not be empty.\n";
                        document.getElementById("edit-title").classList.add("is-invalid");
                    } else {
                        document.getElementById("edit-title").classList.remove("is-invalid");
                    }


                    if (imageFile) {
                        const validExtensions = ['jpg', 'jpeg', 'png', 'gif','webp']
                        const fileExtension = imageFile.name.split('.').pop().toLowerCase();

                        if (!validExtensions.includes(fileExtension)) {
                            isValid = false;
                            imageInput.classList.add("is-invalid");
                            imageInput.nextElementSibling.style.display = "block"; // Show error
                            errorMessage += "Invalid image file type. Allowed: jpg, jpeg, png, gif, webp.\n";
                        } else {
                            imageInput.classList.remove("is-invalid");
                            imageInput.nextElementSibling.style.display = "none"; // Hide error
                        }
                    } else {
                        imageInput.classList.remove("is-invalid");
                        imageInput.nextElementSibling.style.display = "none";
                    }


                    if (!description || description.length < 10) {
                        isValid = false;
                        errorMessage += "Description must be at least 10 characters long.\n";
                        document.getElementById("edit-description").classList.add("is-invalid");
                    } else {
                        document.getElementById("edit-description").classList.remove("is-invalid");
                    }

                    if (isValid) {
                        editService(service_id, name, description, imageFile);
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: errorMessage,
                            icon: "error",
                            confirmButtonColor: "#dc3545",
                        });
                    }
                });

                // Add form submission
                document.getElementById("addServiceForm").addEventListener("submit", function(e) {
                    e.preventDefault();

                    const name = document.getElementById("title").value.trim();
                    // const serviceType = document.getElementById("serviceType").value.trim();
                    const description = document.getElementById("description").value.trim();
                    const imageInput = document.getElementById("image");
                    // const price = document.getElementById("price").value;
                    const imageFile = imageInput.files[0];

                    let isValid = true;
                    let errorMessage = "";

                    if (!name || !/^[^\s][A-Za-zÀ-ž\s]+$/.test(name)) {
                        isValid = false;
                        errorMessage += "Name must contain only alphabets and spaces, with no leading spaces.\n";
                        document.getElementById("title").classList.add("is-invalid");
                    } else {
                        document.getElementById("title").classList.remove("is-invalid");
                    }
                    // Image validation
                    if (imageFile) {
                        const validExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                        const fileExtension = imageFile.name.split('.').pop().toLowerCase();

                        if (!validExtensions.includes(fileExtension)) {
                            isValid = false;
                            imageInput.classList.add("is-invalid");
                            imageInput.nextElementSibling.style.display = "block"; // Show error
                            errorMessage += "Invalid image file type. Allowed: jpg, jpeg, png, gif, webp.\n";
                        } else {
                            imageInput.classList.remove("is-invalid");
                            imageInput.nextElementSibling.style.display = "none"; // Hide error
                        }
                    } else {
                        imageInput.classList.remove("is-invalid");
                        imageInput.nextElementSibling.style.display = "none";
                    }



                    if (!description || description.length < 10) {
                        isValid = false;
                        errorMessage += "Description must be at least 10 characters long.\n";
                        document.getElementById("description").classList.add("is-invalid");
                    } else {
                        document.getElementById("description").classList.remove("is-invalid");
                    }

                    if (isValid) {
                        addService(name, description, imageFile);
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: errorMessage,
                            icon: "error",
                            confirmButtonColor: "#dc3545",
                        });
                    }
                });
            }

            // Initialize
            attachEventListeners();
            fetchServices();
        });
    </script>

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