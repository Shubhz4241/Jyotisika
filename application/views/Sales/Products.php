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
         .table thead th {
            background-color: #0C768A;

        }

        .table thead tr {
            background-color: #0C768A;
            border-radius: 20px;
            color: white;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-top: 20px;
            border: 1px solid #e0e0e0;
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
    </style>
    
</head>

<body style="background-color:rgb(228, 236, 241);">
    <div class="d-flex">
        <!-- Sidebar -->
        <?php $this->load->view('Sales/SalesSidebar'); ?>

        <!-- SIDEBAR END -->

        <!-- Main Component -->
        <div class="main mt-3">
            <!-- Navbar -->
            <?php $this->load->view('Sales/SalesNavbar'); ?>

            <!-- Navbar End -->

            <div class="container">
            <div class="row">
                        <h4 class="section-title">Products</h4>
                        <div class="table-responsive mb-4">
                            <div class="table-container">
                                <table class="table table-responsive rounded-5">
                                    <thead>
                                        <tr class="text-white">
                                            <th class="text-white">Sr.No</th>
                                            <th class="text-white">Product Image</th>
                                            <th class="text-white">Product Name</th>
                                            <th class="text-white">Actual Price</th>
                                            <th class="text-white">Discounted Price</th>
                                            <th class="text-white">Rating</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><img src="<?php echo base_url('assets/images/HRside/Profile1.png') ?>" width="40"" width=" 40"></td>
                                            <td>Dimand Ring</td>
                                            <td>4999</td>
                                            <td>40000</td>
                                            <td>4.5 Rating</td>

                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td><img src="<?php echo base_url('assets/images/HRside/Profile1.png') ?>" width="40"" width=" 40"></td>
                                            <td>Dimand</td>
                                            <td>4999</td>
                                            <td>3000</td>
                                            <td>4.5 Rating</td>

                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td><img src="<?php echo base_url('assets/images/HRside/Profile1.png') ?>" width="40"" width=" 40"></td>
                                            <td>Rudraksh</td>
                                            <td>4999</td>
                                            <td>3500</td>
                                            <td>4 Rating</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>

                    </div>
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
</body>

</html>