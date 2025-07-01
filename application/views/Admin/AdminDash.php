<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Home</title>
    <!-- Bootstrap CSS for styling and layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="styles.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="assets/images/admin/logo.png" type="image/png">

    <style>
        /* Apply Inter font to the entire page */
        * {
            font-family: 'Inter', sans-serif;
        }

        /* Customize headers and table fonts for better readability */
        h1,
        h4 {
            font-weight: 700;
            font-size: 2.5rem;
        }

        p {
            font-weight: 400;
            font-size: 1.2rem;
            margin-bottom: auto;
        }

        td,
        th {
            font-weight: 400;
            font-size: 18px;
        }

        /* Enhance table header appearance */
        .table thead th {
            font-weight: 600;
            background-color: rgb(222, 222, 227);
            padding: 10px;
        }

        /* Counter Cards */
        .counter-card {
            border-radius: 15px;
            border: 1px solid rgba(18, 18, 18);
            box-shadow: 0px 8px 10px rgba(4, 1, 1, 0.2);       
            padding: 15px;
            background-color: white;
            height: 160px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: transform 0.3s ease;
        }

       

        .counter-card img {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }

        .counter-card-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }

        .counter-card h2 {
            font-size: 3rem;
            font-weight: 600;
            margin: 0;
            color: #333;
        }

        .counter-card p {
            font-size: 1rem;
            font-weight: 400;
            margin: 0;
            color: #333;
        }

        /* Table styling */
        .table-responsive {
            border-radius: 8px;
            overflow: auto;
        }

        .table {
            margin-bottom: 0;
        }

        .table tr {
            border-bottom: 1px solid #dee2e6;
        }

        .table td {
            padding: 12px 15px;
            vertical-align: middle;
        }

        /* Button styling */
        .btn-view {
            background-color: #0C768A !important;
            color: white !important;
            padding: 5px 10px !important;
            font-size: 0.8rem !important;
            border-radius: 4px !important;
            width: 70px;
        }

        .btn-success {
            background-color: #0C768A !important;
            border-color: #0C768A !important;
        }

        .see-all-btn {
            background-color: #0C768A !important;
            color: white !important;
            padding: 8px 20px !important;
            border-radius: 8px !important;
            font-weight: 500 !important;
            width: 130px !important;
            margin: 15px auto !important;
            display: block !important;
            height: 45px !important;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 15px;
            margin-top: 30px;
        }

        /* Profile images/admin */
        .profile-img {
            width: 72px;
            height: 81px;
            border-radius: 3%;
            object-fit: cover;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .counter-card {
                margin-bottom: 15px;
            }

            .table-responsive {
                font-size: 0.8rem;
                overflow: auto;
            }

            .btn-view,
            .btn-success {
                font-size: 0.7rem !important;
                padding: 4px 8px !important;
            }

            h1,
            h4 {
                font-size: 2rem;
            }

            p {
                font-size: 1rem;
            }

            .counter-card h2 {
                font-size: 1.2rem;
            }

            .counter-card p {
                font-size: 0.8rem;
            }
        }
    </style>
</head>

<body style="background-color:rgb(228, 236, 241);">
    <div class="d-flex">
        <!-- Sidebar -->
        <?php $this->load->view('IncludeAdmin/CommanSidebar'); ?>

        <!-- SIDEBAR END --> 

        <!-- Main Component -->
        <div class="main mt-3">
            <!-- Navbar -->
            <?php $this->load->view('IncludeAdmin/CommanNavbar'); ?>

            <!-- Navbar End -->

            <main class="p-1">
                <div class="container">
                    <!-- Counter cards -->
                     
                    <div class="row g-4 mb-4 justify-content-center">

                    <div class="col-md-3 col-sm-6">
                            <a href="<?php echo site_url('usermanagement'); ?>" class="text-decoration-none text-dark">
                                <div class="counter-card">
                                    <div class="counter-card-content">
                                        <h2 class="mt-1 counter"><?= $userCount ?>+</h2>
                                        <p>User</p>
                                    </div>
                                    <img src="<?php echo base_url('assets/images/HRside/Priest.png')?>" alt="Pujari icon" class="counter-icon">
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <a href="<?php echo site_url('astrologerslist'); ?>" class="text-decoration-none text-dark">
                                <div class="counter-card">
                                    <div class="counter-card-content">
                                        <h2 class="mt-1 counter"><?= $astrologerCount ?>+</h2>
                                        <p>Astrologer</p>
                                    </div>
                                    <img src="<?php echo base_url('assets/images/HRside/Astrology.png')?>" alt="Astrologer icon" class="counter-icon">
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6">
                            <a href="<?php echo site_url('pujariList'); ?>" class="text-decoration-none text-dark">
                                <div class="counter-card">
                                    <div class="counter-card-content">
                                        <h2 class="mt-1 counter"><?= $pujariCount ?>+</h2>
                                        <p>Pujari</p>
                                    </div>
                                    <img src="<?php echo base_url('assets/images/HRside/Priest.png')?>" alt="Pujari icon" class="counter-icon">
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 col-sm-6">
                        <a href="<?php echo site_url('rescheduleinterview'); ?>" class="text-decoration-none text-dark">

                            <div class="counter-card">
                                <div class="counter-card-content">
                                    <h2 class="mt-1 counter"><?= $reinterviewCount ?>+</h2>
                                    <p>Re-Interview</p>
                                </div>
                                <img src="<?php echo base_url('assets/images/HRside/Interview.png')?>" alt="Reinterview icon" class="counter-icon">
                            </div>
                            </a>
                        </div>
                    </div>
                    <!-- Recent Astrologer Requests Section -->
                    <h4 class="section-title">Recent Astrologer Requests</h4>
                    <div class="table-responsive mb-4">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Profile</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Languages Known</th>
                                    <th>Specialities</th>
                                    <th>Experience</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($Astro as $astro) :?> 
                                <tr>
                                    <td><img src="<?php echo base_url('uploads/astrologer/' . $astro['profile_image']); ?>" width="40" width="40"></td>
                                    <td><?php echo $astro['name'] ?></td>
                                    <td><?php echo $astro['contact'] ?></td>
                                    <td><?php echo $astro['email'] ?></td>
                                    <td><?php echo $astro['address'] ?></td>
                                    <td><?php echo $astro['languages'] ?></td>      
                                    <td><?php echo $astro['specialties'] ?></td>            
                                    <td><?php echo $astro['experience'] ?></td>
<td>
  <button class="btn btn-view" onclick="window.location.href='viewastrologere/<?php echo $astro['id']; ?>'">View</button>
</td>                                </tr>
                                <?php endforeach?>
                                <!-- <tr>
                                    <td><img src="<?php echo base_url('assets/images/HRside/Profile1.png')?>" width="40" width="40"></td>
                                    <td>John Doe</td>
                                    <td>9529577564</td>
                                    <td>johndoe@example.com</td>
                                    <td>Pandit colony</td>
                                    <td>English, Hindi, Marathi</td>
                                    <td>Numerology</td>
                                    <td>10 years</td>
                                    <td><button class="btn btn-view" onclick="window.location.href='viewastrologer'">View</button></td>
                                </tr>
                                <tr>
                                    <td><img src="<?php echo base_url('assets/images/HRside/Profile1.png')?>" width="40"" width="40"></td>
                                    <td>John Doe</td>
                                    <td>9529577564</td>
                                    <td>johndoe@example.com</td>
                                    <td>Pandit colony</td>
                                    <td>English, Hindi, Marathi</td>
                                    <td>Numerology</td>
                                    <td>10 years</td>
                                    <td><button class="btn btn-view" onclick="window.location.href='viewastrologer'">View</button></td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>

                    <div class="text-center mb-4">
                    <button class="see-all-btn" onclick="window.location.href='astrologerrequests'">See All</button>
                    </div>

                    <!-- Recent Pujari Requests Section -->
                    <h4 class="section-title">Recent Pujari Requests</h4>
                    <div class="table-responsive mb-4">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Profile</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Languages Known</th>
                                    <th>Specialities</th>
                                    <th>Experience</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                 <?php foreach($Pujari as $pujari) :?>
                                <tr>
                                    <td><img src="<?php echo base_url('uploads/pujari/profile/' . $pujari['profile_pic']); ?>" width="40" width="40"></td>
                                    <td><?php echo $pujari['name'] ?></td>
                                    <td><?php echo $pujari['contact'] ?></td>
                                    <td><?php echo $pujari['email'] ?></td>
                                    <td><?php echo $pujari['address'] ?></td>
                                    <td><?php echo $pujari['languages'] ?></td>
                                    <td><?php echo $pujari['specialties'] ?></td>
                                    <td><?php echo $pujari['experience'] ?></td> 
                                    <td><button class="btn btn-view" onclick="window.location.href='viewpujaridata/<?php echo $pujari['id']; ?>'">View</button></td>
                                </tr>
                                <?php endforeach?>
                                <!-- <tr>
                                    <td><img src="<?php echo base_url('assets/images/HRside/Profile1.png')?>" width="40"" width="40"></td>
                                    <td>John Doe</td>
                                    <td>9529577564</td>
                                    <td>johndoe@example.com</td>
                                    <td>Pandit colony</td>
                                    <td>English, Hindi, Marathi</td>
                                    <td>Ghar Shanti Puja</td>
                                    <td>10 years</td>
                                    <td><button class="btn btn-view" onclick="window.location.href='viewpujari'">View</button></td>
                                </tr>
                                <tr>
                                    <td><img src="<?php echo base_url('assets/images/HRside/Profile1.png')?>" width="40"" width="40"></td>
                                    <td>John Doe</td>
                                    <td>9529577564</td>
                                    <td>johndoe@example.com</td>
                                    <td>Pandit colony</td>
                                    <td>English, Hindi, Marathi</td>
                                    <td>Ghar Shanti Puja</td>
                                    <td>10 years</td>
                                    <td><button class="btn btn-view" onclick="window.location.href='viewpujari'">View</button></td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mb-4">
                    <button class="see-all-btn" onclick="window.location.href='pujarirequests'">See All</button>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- PDF Modal -->
    <!-- <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">Document Viewer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe id="pdfViewer" src="" width="100%" height="500px" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div> -->

    <!-- PDF Viewer Script -->
    <script>
        document.querySelectorAll('.btn-view').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const pdfUrl = "assets/documents/sample.pdf"; // Replace with your PDF URL
                document.getElementById('pdfViewer').src = pdfUrl;
                $('#pdfModal').modal('show');
            });
        });
    </script>
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
