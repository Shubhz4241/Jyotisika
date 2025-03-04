<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-body-tertiary px-md-2 sticky-top" style="background-color: var(--yellow) !important;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="<?php echo base_url('assets/images/web-logo.jpg'); ?>" alt="logo image"
                style="width: 60px; height: 50px; mix-blend-mode: multiply;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo base_url('home'); ?>">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-black" href="<?php echo base_url('todayhoroscope'); ?>">Horoscope</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-black" href="<?php echo base_url('astrologers'); ?>">Astrologers</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link text-black" href="<?php echo base_url('Poojaris') ?>">Pujari</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link text-black" href="<?php echo base_url('WhyUs') ?>">Why Us</a>
                </li>
            </ul>

           

            <div class="d-flex gap-2">
                <div class="position-relative">

                    <i class="bi bi-translate position-absolute ps-2"
                        style="top: 50%; left: 0px; transform: translateY(-50%);"></i>
                    <select name="cars" id="cars" class="p-1 px-4 rounded-2">
                        <option value="English">English</option>
                        <option value="Marathi">Marathi</option>
                        <option value="Hindi">Hindi</option>

                    </select>
                </div>
                <!-- <div class="position-relative">
                    <i class="bi bi-translate position-absolute"
                        style="top: 50%; left: 10px; transform: translateY(-50%);"></i>
                    <select class=" shadow-none" aria-label="Default select example"
                        style="width: 150px; padding-left: 30px;">
                        <option selected>English</option>
                        <option value="1">Marathi</option>
                        <option value="2">Hindi</option>
                        <option value="3">Tamil</option>
                    </select>
                </div> -->



                <a class="btn btn-primary border-0" href="<?php echo base_url('Login') ?>" style="background-color: var(--red);">
                    Login
                </a>

                <div class="dropdown">
                    <a class="nav-link" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?php echo base_url('assets/images/userProfile.png') ?>" alt="User Profile" style="width: 40px; height: 40px; border-radius: 50%;">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown"
                        style="border-radius: 15px; box-shadow: 0 8px 16px rgba(0,0,0,0.15); border: none; min-width: 250px;">
                        <li class="text-center p-4">
                            <a href="<?php echo base_url('UserProfile') ?>" class="text-decoration-none">
                                <div class="position-relative d-inline-block">
                                    <img src="<?php echo base_url('assets/images/userProfile.png') ?>" alt="Profile Image"
                                        style="width: 80px; height: 80px; border-radius: 50%; border: 3px solid var(--yellow); padding: 3px; transition: transform 0.3s;">
                                    <div class="position-absolute bottom-0 right-0 bg-success rounded-circle"
                                        style="width: 15px; height: 15px; right: 5px; border: 2px solid white;"></div>
                                </div>
                                <p class="mt-3 mb-0 text-dark" style="font-weight: 600; font-size: 1.1rem;">User Name</p>

                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider mx-3">
                        </li>
                        <li>
                            <a class="dropdown-item py-2 ps-4" href="<?php echo base_url('Notification'); ?>">
                                <i class="bi bi-bell me-2"></i> Notifications
                                <span class="badge bg-danger rounded-pill float-end me-2">3</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2 ps-4" href="<?php echo base_url('Orders'); ?>">
                                <i class="bi bi-bag me-2"></i> My Orders
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2 ps-4" href="<?php echo base_url('myservices'); ?>">
                                <i class="bi bi-gear me-2"></i> My Services
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item py-2 ps-4" href="<?php echo base_url('CustomerSupport'); ?>">
                                <i class="bi bi-gear me-2"></i> Customer Support
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider mx-3">
                        </li>
                        <li>
                            <a class="dropdown-item py-2 ps-4 text-danger" href="<?php echo base_url('logout'); ?>">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
    /* Custom scrollbar styles */
    ::-webkit-scrollbar {
        width: 15px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background-color: var(--yellow);
        border-radius: 2px;
        border: 3px solid #f1f1f1;
    }
</style>




<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>