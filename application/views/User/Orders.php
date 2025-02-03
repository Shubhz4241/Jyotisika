<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Festival</title>

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <style>
        .nav-pills .nav-link {
            /* background-color: var(--yellow); */
            /* Set the background color to yellow */
            color: black;
            /* Set the text color to black for better contrast */
            border: 1px solid #ccc;
            border-radius: 15px;
            /* Optional: Add a border for definition */
        }

        .nav-pills .nav-link.active {
            background-color: var(--yellow);
            /* A darker shade for the active tab */
            color: black;
            /* White text for the active tab */
        }

        .nav-pills .nav-link:hover {
            background-color: var(--yellow);
            /* Slightly different shade on hover */
        }
    </style>


</head>

<body>

    <header class="sticlky-top">
        <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    </header>


    <main>
        <div class="container my-5">
            <div class="row">
                <!-- Nav pills - switches to vertical on small screens -->
                <ul class="nav nav-pills mb-3 d-flex justify-content-between w-100" id="pills-tab" role="tablist">
                    <li class="nav-item flex-grow-1 mx-1">
                        <a class="nav-link active text-center w-100" id="pills-home-tab" data-bs-toggle="pill"
                            href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Call</a>
                    </li>
                    <li class="nav-item flex-grow-1 mx-1">
                        <a class="nav-link text-center w-100" id="pills-profile-tab" data-bs-toggle="pill"
                            href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Chat</a>
                    </li>

                    <li class="nav-item flex-grow-1 mx-1">
                        <a class="nav-link text-center w-100" id="pills-mall-tab" data-bs-toggle="pill"
                            href="#pills-mall" role="tab" aria-controls="pills-mall" aria-selected="false">Jyotisika Mall</a>
                    </li>
                </ul>
                <!-- Tab content -->
                <div class="tab-content p-3" id="pills-tabContent">

                    <!-- call -->
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="card">
                            <div class="card-body">
                                <?php if(empty($calls)): ?>
                                    <div class="text-center py-4">
                                        <i class="bi bi-calendar-x fs-1 text-muted"></i>
                                        <p class="mt-2">No pooja calls found</p>
                                    </div>
                                <?php else: ?>
                                    <?php foreach($calls as $call): ?>
                                        <div class="card mb-3 border-warning">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-md-2 text-center">
                                                        <i class="bi bi-person-circle fs-1"></i>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <h5 class="card-title"><?php echo $call->pooja_name; ?></h5>
                                                        <p class="card-text mb-1">
                                                            <i class="bi bi-calendar-event"></i> 
                                                            <?php echo date('d M Y', strtotime($call->scheduled_date)); ?>
                                                        </p>
                                                        <p class="card-text mb-1">
                                                            <i class="bi bi-clock"></i>
                                                            <?php echo date('h:i A', strtotime($call->scheduled_time)); ?>
                                                        </p>
                                                        <p class="card-text">
                                                            <i class="bi bi-person"></i>
                                                            <?php echo $call->pandit_name; ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-3 text-end">
                                                        <span class="badge bg-<?php echo ($call->status == 'completed') ? 'success' : 'warning'; ?>">
                                                            <?php echo ucfirst($call->status); ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="card p-3">second</div>
                    </div>


                    <!-- mall -->
                    <div class="tab-pane fade" id="pills-mall" role="tabpanel" aria-labelledby="pills-mall-tab">

                        <!-- Submenu Nav pills -->
                        <ul class="nav nav-pills mb-3 mt-3 d-flex justify-content-between w-100" id="mall-subtab" role="tablist">
                            <li class="nav-item flex-grow-1 mx-1">
                                <a class="nav-link active text-center w-100" id="orders-tab" data-bs-toggle="pill" href="#orders" role="tab">Orders</a>
                            </li>
                            <li class="nav-item flex-grow-1 mx-1">
                                <a class="nav-link text-center w-100" id="purchased-tab" data-bs-toggle="pill" href="#purchased" role="tab">Purchased</a>
                            </li>
                        </ul>

                        <!-- Submenu Tab content -->
                        <div class="tab-content" id="mall-subTabContent">
                            <div class="tab-pane fade show active" id="orders" role="tabpanel">
                                <div class="card p-3">
                                    Orders content here
                                </div>
                            </div>
                            <div class="tab-pane fade" id="purchased" role="tabpanel">
                                <div class="card p-3">
                                    Purchased items content here
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>







    <footer>
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>




</body>

</html>