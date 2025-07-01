<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Jyotisika Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/style.css' ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
                        <h3 class="text-center">Jyotisika Store Product List</h3>
                        <div class="d-flex justify-content-end mb-5">
                            <button class="btn btn-primary fixed-right-btn" data-bs-toggle="modal" data-bs-target="#addModal" style="background-color: #0c768a; color: white;">Add Product</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Sr. No.</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Image</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="festival-table-body">
                                    <?php $i = 1;
                                    foreach ($data as $p): ?>
                                        <tr>
                                            <th scope="row"><?= $i++ ?></th>
                                            <td><?= htmlspecialchars($p['product_name'], ENT_QUOTES, 'UTF-8') ?></td>
                                            <td><?= htmlspecialchars($p['product_description'], ENT_QUOTES, 'UTF-8') ?></td>
                                            <td><?= htmlspecialchars($p['product_price'], ENT_QUOTES, 'UTF-8') ?></td>
                                            <td>
                                                <img src="<?= base_url('Uploads/products/' . $p['product_image']) ?>"
                                                    alt="<?= htmlspecialchars($p['product_name'], ENT_QUOTES, 'UTF-8') ?>"
                                                    class="img-fluid rounded" width="60">
                                            </td>
                                            <td class="text-center d-flex justify-content-center">
                                                <a href="javascript:void(0)" class="text-primary me-2 edit-btn"
                                                    data-id="<?= $p['product_id'] ?>"
                                                    data-name="<?= htmlspecialchars($p['product_name'], ENT_QUOTES, 'UTF-8') ?>"
                                                    data-description="<?= htmlspecialchars($p['product_description'], ENT_QUOTES, 'UTF-8') ?>"
                                                    data-price="<?= htmlspecialchars($p['product_price'], ENT_QUOTES, 'UTF-8') ?>"
                                                    data-image="<?= $p['product_image'] ?>"
                                                    data-bs-toggle="modal" data-bs-target="#editModal">
                                                    <i class="bi bi-pencil-square fs-5"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="text-danger ms-2 delete-product" data-id="<?= $p['product_id'] ?>">
                                                    <i class="bi bi-trash fs-5"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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
                            <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('Admin/updateProductViaCurl') ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="product_id" id="edit-id">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
                                <div class="mb-3">
                                    <label for="edit-title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="edit-title" name="product_name" required maxlength="50">
                                </div>
                                <div class="mb-3">
                                    <label for="edit-description" class="form-label">Description</label>
                                    <textarea class="form-control" id="edit-description" name="product_description" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="edit-price" class="form-label">Price</label>
                                    <input type="number" step="0.01" class="form-control" id="edit-price" name="product_price" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Current Image</label>
                                    <div>
                                        <img id="current-image" src="" alt="Current Image" class="img-fluid rounded" width="100" style="display: none;">
                                        <span id="current-image-name"></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="edit-image" class="form-label">Upload New Image (Optional)</label>
                                    <input type="file" class="form-control" id="edit-image" name="product_image" accept="image/*">
                                    <small class="text-muted">Leave empty to keep current image</small>
                                </div>
                                <button type="submit" class="btn btn-primary" style="background-color: #0c768a; color: white;">Update Product</button>
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
                            <h5 class="modal-title" id="addModalLabel">Add Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('Admin/addProductViaCurl') ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="product_name" class="form-control" id="title" required maxlength="50">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="product_description" class="form-control" id="description" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="prise" class="form-label">Price</label>
                                    <input type="number" step="0.01" name="product_price" class="form-control" id="prise" required>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Upload Image</label>
                                    <input type="file" name="product_image" class="form-control" id="image" accept="image/*" required>
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
        // CSRF token setup
        let csrfName = '<?= $this->security->get_csrf_token_name() ?>';
        let csrfHash = '<?= $this->security->get_csrf_hash() ?>';

        document.addEventListener("DOMContentLoaded", function() {
            // Edit button click handler
            document.querySelectorAll('.edit-btn').forEach(function(btn) {
                btn.addEventListener("click", function() {
                    const id = btn.getAttribute('data-id');
                    const name = btn.getAttribute('data-name');
                    const description = btn.getAttribute('data-description');
                    const price = btn.getAttribute('data-price');
                    const imageName = btn.getAttribute('data-image');

                    document.getElementById('edit-id').value = id;
                    document.getElementById('edit-title').value = name;
                    document.getElementById('edit-description').value = description;
                    document.getElementById('edit-price').value = price;

                    const currentImage = document.getElementById('current-image');
                    const currentImageName = document.getElementById('current-image-name');

                    if (imageName) {
                        currentImage.src = '<?= base_url("Uploads/products/") ?>' + imageName;
                        currentImage.style.display = 'block';
                        currentImageName.textContent = imageName;
                    } else {
                        currentImage.style.display = 'none';
                        currentImageName.textContent = 'No image';
                    }
                });
            });

            // Delete button click handler
            document.getElementById('festival-table-body').addEventListener('click', function(e) {
                const btn = e.target.closest('.delete-product');
                if (btn) {
                    const productId = btn.getAttribute('data-id');
                    console.log('Delete Product ID:', productId);

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
                                url: '<?= base_url('Admin_API/deleteProductAPI') ?>',
                                type: 'POST',
                                data: {
                                    id: productId,
                                    [csrfName]: csrfHash
                                },
                                dataType: 'json',
                                beforeSend: function() {
                                    console.log('Sending Delete AJAX:', {
                                        id: productId,
                                        [csrfName]: csrfHash
                                    });
                                },
                                success: function(response) {
                                    console.log('Delete AJAX Response:', response);
                                    if (response.csrfHash) {
                                        csrfHash = response.csrfHash; // Update CSRF token
                                    }
                                    if (response.status) {
                                        Swal.fire('Deleted!', response.message, 'success').then(() => location.reload());
                                    } else {
                                        Swal.fire('Error!', response.message || 'Failed to delete product.', 'error');
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error('Delete AJAX Error:', {
                                        status: status,
                                        error: error,
                                        responseText: xhr.responseText,
                                        statusCode: xhr.status
                                    });
                                    Swal.fire('Error!', 'Failed to delete product. Check console for details.', 'error');
                                }
                            });
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>