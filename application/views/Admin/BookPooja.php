<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Book Puja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/style.css' ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        * { font-family: 'Inter', sans-serif !important; }
        h1, h4 { font-weight: 700; }
        p, td, th { font-weight: 400; font-size: 1rem; }
        .table thead th { font-weight: 600; background-color: #f8f9fa; }
        .btn { font-weight: 500; font-size: 0.9rem; }
        @media (max-width: 768px) {
            .main { margin-top: 0 !important; }
            .card-dashboard { margin-bottom: 1rem; }
            .table-responsive { font-size: 0.8rem; }
            .table td, .table th { padding: 0.5rem; }
            .btn-sm { padding: 0.25rem 0.5rem; font-size: 0.75rem; }
            .table-responsive-stack tr { display: flex; flex-direction: column; margin-bottom: 1rem; border-bottom: 1px solid #eee; }
            .table-responsive-stack td { display: block; text-align: right; }
            .table-responsive-stack td:before { content: attr(data-label); float: left; font-weight: bold; }
        }
        @media (max-width: 768px) { .card-footer .btn { margin-top: 10px; padding: 10px 15px; font-size: 0.9rem; } }
        @media (min-width: 769px) { .card-footer .btn { max-width: 250px; } }
        .fixed-right-btn { position: fixed; right: 20px; z-index: 1; }
        @media (max-width: 768px) { .fixed-right-btn { width: 100%; position: initial; } }
        .table-responsive { overflow-x: auto; }
        .table-responsive::-webkit-scrollbar { height: 8px; }
        .table-responsive::-webkit-scrollbar-thumb { background-color: #ccc; border-radius: 4px; }
        .table-responsive::-webkit-scrollbar-thumb:hover { background-color: #999; }
        @media (max-width: 768px) { .fixed-right-btn { position: relative; margin-left: 40px; } h3.text-center { font-size: 1.5rem; } }
        .page-item.active .page-link { background-color: #0c768a !important; border-color: #0c768a !important; color: white !important; }
        .page-link { color: #0c768a !important; }
        .page-link:hover { background-color: #0c768a !important; color: white !important; }
    </style>
</head>
<body>
    <div class="d-flex">
        <?php $this->load->view('IncludeAdmin/CommanSidebar'); ?>
        <div class="main">
            <?php $this->load->view('IncludeAdmin/CommanNavbar'); ?>
            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-md-12">
                        <h3 class="text-center">Pooja List</h3>
                        <div class="d-flex justify-content-end mb-5">
                            <button class="btn btn-primary fixed-right-btn" style="background-color: #0c768a; color: white;" data-bs-toggle="modal" data-bs-target="#addModal">Add Pooja</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr. No.</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Pooja Mode</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="pooja-table-body">
                                    <?php if (!empty($Pooja)): ?>
                                        <?php $i = 1; foreach ($Pooja as $row): ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= htmlspecialchars($row['puja_name'], ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= htmlspecialchars($row['puja_decription'], ENT_QUOTES, 'UTF-8') ?></td>
                                                <td>
                                                    <?php if (!empty($row['puja_image'])): ?>
                                                        <img src="<?= base_url('Uploads/pooja_images/' . $row['puja_image']) ?>" alt="Pooja Image" width="80" class="img-fluid rounded">
                                                    <?php else: ?>
                                                        <span>No Image</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= ucfirst($row['puja_mode']) ?></td>
                                                <td class="text-center d-flex justify-content-center">
                                                    <a href="javascript:void(0)" class="text-primary me-2 edit-pooja"
                                                       data-id="<?= $row['puja_id'] ?>"
                                                       data-name="<?= htmlspecialchars($row['puja_name'], ENT_QUOTES, 'UTF-8') ?>"
                                                       data-description="<?= htmlspecialchars($row['puja_decription'], ENT_QUOTES, 'UTF-8') ?>"
                                                       data-mode="<?= $row['puja_mode'] ?>"
                                                       data-image="<?= !empty($row['puja_image']) ? base_url('Uploads/pooja_images/' . $row['puja_image']) : '' ?>"
                                                       data-bs-toggle="modal" data-bs-target="#editModal">
                                                        <i class="bi bi-pencil-square fs-5"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="text-danger ms-2 delete-pooja" data-id="<?= $row['puja_id'] ?>">
                                                        <i class="bi bi-trash fs-5"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" class="text-center">No Poojas Found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <nav>
                            <ul class="pagination justify-content-center" id="pagination"></ul>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Pooja</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editPoojaForm" action="<?= base_url('Admin/updatePoojaViaCurl') ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="edit-id">
                                <div class="mb-3">
                                    <label for="edit-title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="edit-title" name="pooja_name" required maxlength="50"
                                           pattern="^[^\s][A-Za-zÀ-ž\s]+$" title="Enter Alphabets Only"
                                           oninput="this.value = this.value.replace(/^[ ]/g, '').replace(/[^a-zA-Z0-9\s]/g, '').replace(/(\..*)\./g, '$1');">
                                </div>
                                <div class="mb-3">
                                    <label for="edit-description" class="form-label">Description</label>
                                    <textarea class="form-control" id="edit-description" name="pooja_description" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="edit-puja-mode" class="form-label">Pooja Mode</label>
                                    <select class="form-select" id="edit-puja-mode" name="pooja_mode" required>
                                        <option value="" disabled>Select Pooja Mode</option>
                                        <option value="Online">Online</option>
                                        <option value="Offline">Offline</option>
                                        <option value="Mob">Mob</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Current Image</label>
                                    <img id="edit-current-image" src="" alt="Current Pooja Image" width="100" class="img-fluid rounded d-none">
                                </div>
                                <div class="mb-3">
                                    <label for="edit-image" class="form-label">Upload New Image</label>
                                    <input type="file" class="form-control" id="edit-image" name="pooja_image" accept="image/*">
                                </div>
                                <button type="submit" class="btn btn-primary" style="background-color: #0c768a; color: white;">Save</button>
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
                            <h5 class="modal-title" id="addModalLabel">Add Pooja</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="addPoojaForm" action="<?= base_url('Admin/addPoojaViaCurl') ?>" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="add-title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="add-title" name="pooja_name" required maxlength="50"
                                           pattern="^[^\s][A-Za-zÀ-ž\s]+$" title="Enter Alphabets Only"
                                           oninput="this.value = this.value.replace(/^[ ]/g, '').replace(/[^a-zA-Z0-9\s]/g, '').replace(/(\..*)\./g, '$1');">
                                    <div class="invalid-feedback">Please enter a valid title without spaces and special characters.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="add-description" class="form-label">Description</label>
                                    <textarea class="form-control" id="add-description" name="pooja_description" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="add-puja-mode" class="form-label">Pooja Mode</label>
                                    <select class="form-select" id="add-puja-mode" name="pooja_mode" required>
                                        <option value="" disabled selected>Select Pooja Mode</option>
                                        <option value="Online">Online</option>
                                        <option value="Offline">Offline</option>
                                        <option value="Mob">Mob</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a valid pooja mode.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="add-image" class="form-label">Upload Image</label>
                                    <input type="file" class="form-control" id="add-image" name="pooja_image" accept="image/*" required>
                                    <div class="invalid-feedback">Please select a valid image file.</div>
                                </div>
                                <button type="submit" class="btn btn-primary" style="background-color: #0c768a; color: white;">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Event delegation for Edit buttons
            document.getElementById('pooja-table-body').addEventListener('click', function(e) {
                const btn = e.target.closest('.edit-pooja');
                if (btn) {
                    try {
                        const id = btn.getAttribute('data-id');
                        const name = btn.getAttribute('data-name');
                        const description = btn.getAttribute('data-description');
                        const mode = btn.getAttribute('data-mode');
                        const image = btn.getAttribute('data-image');

                        console.log('Edit Pooja Data:', { id, name, description, mode, image });

                        const editIdField = document.getElementById('edit-id');
                        const editTitleField = document.getElementById('edit-title');
                        const editDescriptionField = document.getElementById('edit-description');
                        const editModeField = document.getElementById('edit-puja-mode');
                        const editCurrentImage = document.getElementById('edit-current-image');

                        if (!editIdField || !editTitleField || !editDescriptionField || !editModeField || !editCurrentImage) {
                            console.error('One or more form fields not found');
                            return;
                        }

                        editIdField.value = id || '';
                        editTitleField.value = name || '';
                        editDescriptionField.value = description || '';
                        editModeField.value = mode || '';

                        if (image) {
                            editCurrentImage.src = image;
                            editCurrentImage.classList.remove('d-none');
                        } else {
                            editCurrentImage.src = '';
                            editCurrentImage.classList.add('d-none');
                        }
                    } catch (error) {
                        console.error('Error populating edit modal:', error);
                    }
                }
            });

            // Event delegation for Delete buttons
            document.getElementById('pooja-table-body').addEventListener('click', function(e) {
                const btn = e.target.closest('.delete-pooja');
                if (btn) {
                    const poojaId = btn.getAttribute('data-id');
                    console.log('Delete Pooja ID:', poojaId);

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#0c768a',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '<?= base_url('Admin/deletePoojaViaCurl') ?>',
                                type: 'POST',
                                data: { id: poojaId },
                                dataType: 'json',
                                beforeSend: function() {
                                    console.log('Sending Delete AJAX:', { id: poojaId });
                                },
                                success: function(response) {
                                    console.log('Delete AJAX Response:', response);
                                    if (response.status) {
                                        Swal.fire('Deleted!', response.message, 'success').then(() => location.reload());
                                    } else {
                                        Swal.fire('Error!', response.message || 'Failed to delete pooja.', 'error');
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error('Delete AJAX Error:', { status, error, response: xhr.responseText });
                                    Swal.fire('Error!', 'Failed to delete pooja. Check console for details.', 'error');
                                }
                            });
                        }
                    });
                }
            });

            // Form validation for Add and Edit modals
            ['addPoojaForm', 'editPoojaForm'].forEach(formId => {
                const form = document.getElementById(formId);
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                        form.classList.add('was-validated');
                    }
                }, false);
            });

            // Pagination logic
            const recordsPerPage = 5;
            let currentPage = 1;
            const poojas = <?= json_encode($Pooja) ?>;

            function truncateText(text, maxLength) {
                return text.length > maxLength ? text.substring(0, maxLength) + "..." : text;
            }

            function renderTable(page) {
                const startIndex = (page - 1) * recordsPerPage;
                const endIndex = startIndex + recordsPerPage;
                const visiblePoojas = poojas.slice(startIndex, endIndex);
                const tableBody = document.getElementById('pooja-table-body');
                tableBody.innerHTML = '';

                if (visiblePoojas.length === 0) {
                    tableBody.innerHTML = '<tr><td colspan="6" class="text-center">No Poojas Found</td></tr>';
                    return;
                }

                visiblePoojas.forEach((pooja, index) => {
                    const imageSrc = pooja.puja_image ? `<?= base_url('Uploads/pooja_images/') ?>${pooja.puja_image}` : '';
                    tableBody.innerHTML += `
                        <tr>
                            <td>${startIndex + index + 1}</td>
                            <td>${pooja.puja_name}</td>
                            <td>${truncateText(pooja.puja_decription, 50)}</td>
                            <td>${imageSrc ? `<img src="${imageSrc}" alt="Pooja Image" width="80" class="img-fluid rounded">` : '<span>No Image</span>'}</td>
                            <td>${pooja.puja_mode.charAt(0).toUpperCase() + pooja.puja_mode.slice(1)}</td>
                            <td class="text-center d-flex justify-content-center">
                                <a href="javascript:void(0)" class="text-primary me-2 edit-pooja" 
                                   data-id="${pooja.puja_id}" 
                                   data-name="${pooja.puja_name}" 
                                   data-description="${pooja.puja_decription}" 
                                   data-mode="${pooja.puja_mode}" 
                                   data-image="${imageSrc}" 
                                   data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="bi bi-pencil-square fs-5"></i>
                                </a>
                                <a href="javascript:void(0)" class="text-danger ms-2 delete-pooja" data-id="${pooja.puja_id}">
                                    <i class="bi bi-trash fs-5"></i>
                                </a>
                            </td>
                        </tr>
                    `;
                });
            }

            function renderPagination() {
                const totalPages = Math.ceil(poojas.length / recordsPerPage);
                const pagination = document.getElementById('pagination');
                pagination.innerHTML = '';

                for (let i = 1; i <= totalPages; i++) {
                    pagination.innerHTML += `
                        <li class="page-item ${i === currentPage ? 'active' : ''}">
                            <a class="page-link" href="javascript:void(0)" onclick="changePage(${i})">${i}</a>
                        </li>
                    `;
                }
            }

            function changePage(page) {
                currentPage = page;
                renderTable(page);
                renderPagination();
            }

            // Initial render
            renderTable(currentPage);
            renderPagination();
        });

        // Sidebar toggle
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
</body>
</html>