<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin:Home</title>
    <!-- Bootstrap CSS for styling and layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets\css\style.css' ?>">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
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
    </style>

</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <?php $this->load->view('IncludeAdmin/CommanSidebar'); ?>
        <!-- SIDEBAR END -->


        <!-- Main Component -->
        <div class="main mt-3">
            <!-- Navbar -->
            <?php $this->load->view('IncludeAdmin/CommanNavbar'); ?>
            <!-- Navbar End -->
            <main class="p-3">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="card border-0 d-flex flex-column align-items-center justify-content-center shadow pt-3">
                                <img src="<?php echo base_url() . 'assets/images/users.png'; ?>" alt="icon" class="img-fluid border-0" style="width: 60px; height: 60px; object-fit: cover;">
                                <h1 class="mt-3">50</h1>
                                <p>Total Users</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 d-flex flex-column align-items-center justify-content-center shadow pt-3">
                                <img src="<?php echo base_url() . 'assets/images/astrologers.png'; ?>" alt="icon" class="img-fluid border-0" style="width: 60px; height: 60px; object-fit: cover;">
                                <h1 class="mt-3">50</h1>
                                <p>Total Astrologer</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 d-flex flex-column align-items-center justify-content-center shadow pt-3">
                                <img src="<?php echo base_url() . 'assets/images/pujari.png'; ?>" alt="icon" class="img-fluid border-0" style="width: 60px; height: 60px; object-fit: cover;">
                                <h1 class="mt-3">50</h1>
                                <p>Total Pujari</p>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Recent Astrologer Requests</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Contact</th>
                                                    <th>Experience</th>
                                                    <th>Service</th>
                                                    <th>Document</th>
                                                    <th>Address</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Dummy Data -->
                                                <tr>
                                                    <td>John Doe</td>
                                                    <td>+1 123-456-7890</td>
                                                    <td>5 Years</td>
                                                    <td>Web Development</td>
                                                    <!-- Button to trigger the modal -->
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#pdfModal">View</a>
                                                    </td>
                                                    <td>123 Elm Street, Springfield</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <a href="#" class="btn btn-sm btn-success me-2">
                                                                <i class="fas fa-check"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-sm btn-danger">
                                                                <i class="fas fa-times"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Jane Smith</td>
                                                    <td>+1 987-654-3210</td>
                                                    <td>3 Years</td>
                                                    <td>Graphic Design</td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#pdfModal">View</a>
                                                    </td>
                                                    <td>456 Oak Avenue, Metropolis</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <a href="#" class="btn btn-sm btn-success me-2">
                                                                <i class="fas fa-check"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-sm btn-danger">
                                                                <i class="fas fa-times"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Michael Brown</td>
                                                    <td>+1 555-123-4567</td>
                                                    <td>10 Years</td>
                                                    <td>SEO Optimization</td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#pdfModal">View</a>
                                                    </td>
                                                    <td>789 Pine Lane, Gotham</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <a href="#" class="btn btn-sm btn-success me-2">
                                                                <i class="fas fa-check"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-sm btn-danger">
                                                                <i class="fas fa-times"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- End Dummy Data -->
                                            </tbody>

                                        </table>
                                        <div class="card-footer text-center">
                                            <a href="<?php echo base_url('astrologerrequests'); ?>"
                                                class="btn btn-outline-primary btn-block">
                                                See All Registrations
                                            </a>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-header">
                                    <h4 class="card-title">Recent Poojari Requests</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Contact</th>
                                                    <th>Experience</th>
                                                    <th>Service</th>
                                                    <th>Document</th>
                                                    <th>Address</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Dummy Data -->
                                                <tr>
                                                    <td>John Doe</td>
                                                    <td>+1 123-456-7890</td>
                                                    <td>5 Years</td>
                                                    <td>Web Development</td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#pdfModal">View</a>
                                                    </td>
                                                    <td>123 Elm Street, Springfield</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <a href="#" class="btn btn-sm btn-success me-2">
                                                                <i class="fas fa-check"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-sm btn-danger">
                                                                <i class="fas fa-times"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Jane Smith</td>
                                                    <td>+1 987-654-3210</td>
                                                    <td>3 Years</td>
                                                    <td>Graphic Design</td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#pdfModal">View</a>
                                                    </td>
                                                    <td>456 Oak Avenue, Metropolis</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <a href="#" class="btn btn-sm btn-success me-2">
                                                                <i class="fas fa-check"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-sm btn-danger">
                                                                <i class="fas fa-times"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Michael Brown</td>
                                                    <td>+1 555-123-4567</td>
                                                    <td>10 Years</td>
                                                    <td>SEO Optimization</td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#pdfModal">View</a>
                                                    </td>
                                                    <td>789 Pine Lane, Gotham</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <a href="#" class="btn btn-sm btn-success me-2">
                                                                <i class="fas fa-check"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-sm btn-danger">
                                                                <i class="fas fa-times"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- End Dummy Data -->
                                            </tbody>

                                        </table>
                                        <div class="card-footer text-center">
                                            <a href="<?php echo base_url('admin/all_registrations'); ?>"
                                                class="btn btn-outline-primary btn-block">
                                                See All Registrations
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
    <!-- Modal Structure -->
    <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">PDF Viewer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- PDF iframe -->
                    <iframe id="pdfViewer" src="" width="100%" height="500px" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.btn-info').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default anchor behavior
                const pdfUrl = "assets/images/CC UNIT II.pdf"; // Replace with your PDF URL
                document.getElementById('pdfViewer').src = pdfUrl;
            });
        });
    </script>
    <!-- Modal Structure End -->


    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script End -->

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
</body>

</html>