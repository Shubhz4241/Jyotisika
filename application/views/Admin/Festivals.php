<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Festivals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        * {
            font-family: 'Inter', sans-serif !important;
        }

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

        .table thead th {
            font-weight: 600;
            background-color: #f8f9fa;
        }

        .btn {
            font-weight: 500;
            font-size: 0.9rem;
        }

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

            .table-responsive-stack tr {
                display: flex;
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

        .fixed-right-btn {
            position: fixed;
            right: 20px;
            z-index: 1;
        }

        @media (max-width: 768px) {
            .fixed-right-btn {
                width: 100%;
                position: initial;
            }
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table-responsive::-webkit-scrollbar {
            height: 8px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background-color: #ccc;
            border-radius: 4px;
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            background-color: #999;
        }

        @media (max-width: 768px) {
            .fixed-right-btn {
                position: relative;
                margin-left: 40px;
            }

            h3.text-center {
                font-size: 1.5rem;
            }
        }

        .page-item.active .page-link {
            background-color: #0c768a !important;
            border-color: #0c768a !important;
            color: white !important;
        }

        .page-link {
            color: #0c768a !important;
        }

        .page-link:hover {
            background-color: #0c768a !important;
            color: white !important;
        }

        .modal-content {
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            border-bottom: 1px solid #dee2e6;
        }

        .modal-footer {
            border-top: 1px solid #dee2e6;
        }

        .image-preview {
            width: 100%;
            height: 200px;
            background-color: #f8f9fa;
            border: 1px dashed #ced4da;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-bottom: 1rem;
        }

        .image-preview img {
            max-width: 100%;
            max-height: 100%;
        }
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
                        <h3 class="text-center">Festival List</h3>
                        <div class="d-flex justify-content-end mb-5">
                            <button class="btn btn-primary fixed-right-btn" data-bs-toggle="modal" data-bs-target="#addModal" style="background-color: #0c768a; color: white;">Add Festival</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr. No.</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Image</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="festival-table-body">
                                    <?php if (!empty($festival)): ?>
                                        <?php $i = 1;
                                        foreach ($festival as $row): ?>
                                            <tr>
                                                <th scope="row"><?= $i++ ?></th>
                                                <td><?= htmlspecialchars($row['festivals_title'], ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= htmlspecialchars($row['festivals_decription'], ENT_QUOTES, 'UTF-8') ?></td>
                                                <td>
                                                    <?php
                                                    $image_path = !empty($row['festivals_image']) ? FCPATH . $row['festivals_image'] : '';
                                                    if (!empty($row['festivals_image']) && file_exists($image_path)): ?>
                                                        <img src="<?= base_url($row['festivals_image']) ?>" alt="<?= htmlspecialchars($row['festivals_title'], ENT_QUOTES, 'UTF-8') ?>" class="img-fluid rounded" width="60" onerror="handleImageError(this)">
                                                    <?php else: ?>
                                                        <span>No Image</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center d-flex justify-content-center">
                                                    <a href="javascript:void(0)" class="text-primary me-2 edit-btn"
                                                        data-id="<?= $row['festivals_id'] ?>"
                                                        data-title="<?= htmlspecialchars($row['festivals_title'], ENT_QUOTES, 'UTF-8') ?>"
                                                        data-description="<?= htmlspecialchars($row['festivals_decription'], ENT_QUOTES, 'UTF-8') ?>"
                                                        data-image="<?= $row['festivals_image'] ?>"
                                                        data-bs-toggle="modal" data-bs-target="#editModal">
                                                        <i class="bi bi-pencil-square fs-5"></i>
                                                    </a>
                                                    <!-- <a href="javascript:void(0)" class="text-danger ms-2 delete-festival" data-id="<?= $row['festivals_id'] ?>">
                                                        <i class="bi bi-trash fs-5"></i>
                                                    </a> -->
                                                    <!-- Delete icon/button -->
<a href="javascript:void(0)" class="text-danger ms-2 delete-festival" data-id="<?= $row['festivals_id'] ?>">
    <i class="bi bi-trash fs-5"></i>
</a>

                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center">No Festivals Found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Festival</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editFestivalForm" enctype="multipart/form-data">
                                <input type="hidden" id="editFestivalId" name="festivals_id">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
                                <div class="mb-3">
                                    <label for="editTitle" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="editTitle" name="festivals_title" required maxlength="50">
                                </div>
                                <div class="mb-3">
                                    <label for="editDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="editDescription" name="festivals_decription" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Current Image</label>
                                    <div>
                                        <img id="current-image" src="" alt="Current Image" class="img-fluid rounded" width="100" style="display: none;">
                                        <span id="current-image-name"></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="editImage" class="form-label">Upload New Image (Optional)</label>
                                    <input type="file" class="form-control" id="editImage" name="festivals_image" accept="image/*">
                                    <div class="image-preview" id="editImagePreview"></div>
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
                            <h5 class="modal-title" id="addModalLabel">Add Festival</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('Admin/addFestival') ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
                                <div class="mb-3">
                                    <label for="addTitle" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="addTitle" name="festivals_title" required maxlength="50">
                                </div>
                                <div class="mb-3">
                                    <label for="addDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="addDescription" name="festivals_description" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="addImage" class="form-label">Upload Image</label>
                                    <input type="file" class="form-control" id="addImage" name="festivals_image" accept="image/*" required>
                                    <div class="image-preview" id="addImagePreview"></div>
                                </div>
                                <button type="submit" class="btn btn-primary" style="background-color: #0c768a; color: white;">Add</button>
                            </form>
                            <?php if ($this->session->flashdata('success')): ?>
                                <div class="alert alert-success mt-2"><?= $this->session->flashdata('success') ?></div>
                            <?php elseif ($this->session->flashdata('error')): ?>
                                <div class="alert alert-danger mt-2"><?= $this->session->flashdata('error') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // CSRF token setup
        let csrfName = '<?= $this->security->get_csrf_token_name() ?>';
        let csrfHash = '<?= $this->security->get_csrf_hash() ?>';

        // Handle image load errors to prevent infinite loops
        function handleImageError(img) {
            console.log('Image failed to load:', img.src);
            img.src = '<?= base_url('assets/images/no-image.png') ?>';
            img.onerror = null; // Prevent further onerror triggers
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Edit button click handler
            document.querySelectorAll('.edit-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const id = btn.getAttribute('data-id');
                    const title = btn.getAttribute('data-title');
                    const description = btn.getAttribute('data-description');
                    const image = btn.getAttribute('data-image');

                    document.getElementById('editFestivalId').value = id;
                    document.getElementById('editTitle').value = title;
                    document.getElementById('editDescription').value = description;

                    const currentImage = document.getElementById('current-image');
                    const currentImageName = document.getElementById('current-image-name');
                    const editImagePreview = document.getElementById('editImagePreview');

                    if (image) {
                        const imageUrl = '<?= base_url() ?>' + image;
                        currentImage.src = imageUrl;
                        currentImage.style.display = 'block';
                        currentImageName.textContent = image.split('/').pop();
                        editImagePreview.innerHTML = `<img src="${imageUrl}" class="img-fluid" alt="Preview">`;
                    } else {
                        currentImage.style.display = 'none';
                        currentImageName.textContent = 'No image';
                        editImagePreview.innerHTML = '';
                    }
                });
            });

            // Delete button click handler
            // document.getElementById('festival-table-body').addEventListener('click', function(e) {
            //     const btn = e.target.closest('.delete-festival');
            //     if (btn) {
            //         const festivalId = btn.getAttribute('data-id');
            //         console.log('Delete Festival ID:', festivalId);

            //         Swal.fire({
            //             title: 'Are you sure?',
            //             text: "You won't be able to revert this!",
            //             icon: 'warning',
            //             showCancelButton: true,
            //             confirmButtonColor: '#0c768a',
            //             cancelButtonColor: '#d33',
            //             confirmButtonText: 'Yes, delete it!'
            //         }).then((result) => {
            //             if (result.isConfirmed) {
            //                 $.ajax({
            //                     url: '<?= base_url('Admin_API/deleteFestivalAPI') ?>',
            //                     type: 'POST',
            //                     data: {
            //                         id: festivalId,
            //                         [csrfName]: csrfHash
            //                     },
            //                     dataType: 'json',
            //                     beforeSend: function() {
            //                         console.log('Sending Delete AJAX:', {
            //                             id: festivalId,
            //                             [csrfName]: csrfHash
            //                         });
            //                     },
            //                     success: function(response) {
            //                         console.log('Delete AJAX Response:', response);
            //                         if (response.csrfHash) {
            //                             csrfHash = response.csrfHash;
            //                         }
            //                         if (response.status) {
            //                             Swal.fire('Deleted!', response.message, 'success').then(() => location.reload());
            //                         } else {
            //                             Swal.fire('Error!', response.message || 'Failed to delete festival.', 'error');
            //                         }
            //                     },
            //                     error: function(xhr, status, error) {
            //                         console.error('Delete AJAX Error:', {
            //                             status: status,
            //                             error: error,
            //                             responseText: xhr.responseText,
            //                             statusCode: xhr.status
            //                         });
            //                         Swal.fire('Error!', 'Failed to delete festival. Check console for details.', 'error');
            //                     }
            //                 });
            //             }
            //         });
            //     }
            // });
            $(document).on('click', '.delete-festival', function () {
    const festivalId = $(this).data('id');

    if (!confirm('Are you sure you want to delete this festival?')) return;

    $.ajax({
        url: '<?= base_url("Admin_API/deleteFestivalAPI") ?>', // change to actual controller path
        method: 'POST',
        data: {
            festivals_id: festivalId
        },
        dataType: 'json',
        success: function (response) {
            alert(response.message);
            if (response.status) {
                // Optionally remove the deleted row from DOM
                location.reload(); // or remove the row using JS
            }
        },
        error: function () {
            alert('Something went wrong. Please try again.');
        }
    });
});


            // Edit form submission via AJAX
            document.getElementById('editFestivalForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                console.log('FormData entries:');
                for (let [key, value] of formData.entries()) {
                    console.log(`${key}: ${value instanceof File ? value.name : value}`);
                }

                $.ajax({
                    url: '<?= base_url('Admin_API/updateFestivalAPI') ?>',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        console.log('Sending Update AJAX');
                    },
                    success: function(response) {
                        console.log('Update AJAX Response:', response);
                        if (response.csrfHash) {
                            csrfHash = response.csrfHash;
                        }
                        if (response.status) {
                            Swal.fire('Updated!', response.message, 'success').then(() => location.reload());
                        } else {
                            Swal.fire('Error!', response.message || 'Failed to update festival.', 'error');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Update AJAX Error:', {
                            status: status,
                            error: error,
                            responseText: xhr.responseText,
                            statusCode: xhr.status
                        });
                        Swal.fire('Error!', 'Failed to update festival. Check console for details.', 'error');
                    }
                });
            });

            // Image preview for Add Modal
            document.getElementById('addImage').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('addImagePreview').innerHTML = `<img src="${e.target.result}" class="img-fluid" alt="Preview">`;
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Image preview for Edit Modal
            document.getElementById('editImage').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('editImagePreview').innerHTML = `<img src="${e.target.result}" class="img-fluid" alt="Preview">`;
                    };
                    reader.readAsDataURL(file);
                }
            });
        });

        // Sidebar toggle
        const toggler = document.querySelector('.toggler-btn');
        const closeBtn = document.querySelector('.close-sidebar');
        const sidebar = document.querySelector('#sidebar');

        if (toggler && sidebar) {
            toggler.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
            });
        }

        if (closeBtn && sidebar) {
            closeBtn.addEventListener('click', function() {
                sidebar.classList.remove('collapsed');
            });
        }
    </script>
</body>

</html>