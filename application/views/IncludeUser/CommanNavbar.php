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
                    <i class="bi bi-translate position-absolute"
                        style="top: 50%; left: 10px; transform: translateY(-50%);"></i>
                    <select class="form-select shadow-none" aria-label="Default select example"
                        style="width: 150px; padding-left: 30px;">
                        <option selected>English</option>
                        <option value="1">Marathi</option>
                        <option value="2">Hindi</option>
                        <option value="3">Tamil</option>
                    </select>
                </div>

                <button type="button" class="btn btn-primary border-0" data-bs-toggle="modal"
                    data-bs-target="#exampleModal" style="background-color: var(--red);">
                    login
                </button>

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
                        <li><hr class="dropdown-divider mx-3"></li>
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
                        <li><hr class="dropdown-divider mx-3"></li>
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


<!-- Modal login model-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content"
            style="border-radius: 10px; overflow: hidden; background: linear-gradient(135deg, #ffffff, #f9f9f9); box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);">
            <!-- Modal Header -->


            <!-- Modal Body -->
            <div class="modal-body p-0">
                <div class="row g-0">
                    <!-- Left Section: Why Sign Up -->
                    <div class="col-md-6 p-4 order-2 order-md-1" style="background: linear-gradient(135deg, #FDFBDF, #FFE085);">
                        <h3 class="fw-bold mb-4" style="color: #333; font-size: 1.5rem;">Why Sign Up?</h3>
                        <div class="benefits-list" style="font-size: 1rem; line-height: 2;">
                            <p class="d-flex align-items-start mb-1">
                                <span class="me-3" style="font-size: 1.5rem; color: #F7C548;">✔</span>
                                Get personalized information
                            </p>
                            <p class="d-flex align-items-start mb-1">
                                <span class="me-3" style="font-size: 1.5rem; color: #F7C548;">✔</span>
                                Save charts (Kundli) on cloud
                            </p>
                            <p class="d-flex align-items-start mb-1">
                                <span class="me-3" style="font-size: 1.5rem; color: #F7C548;">✔</span>
                                Write notes & comments
                            </p>
                            <p class="d-flex align-items-start">
                                <span class="me-3" style="font-size: 1.5rem; color: #F7C548;">✔</span>
                                Access anywhere: mobile & web
                            </p>
                        </div>
                        <center>
                            <img src="<?php echo base_url('assets/images/ShreeGanesh.jpg'); ?>" alt="Benefits"
                                class="img-fluid mt-2 rounded" style="max-width: 280px; ">
                        </center>
                    </div>

                    <!-- Right Section: Login Form -->
                    <div class="col-md-6 d-flex flex-column justify-content-center align-items-center p-5 order-1 order-md-2"
                        style="background: #FFF;">
                        <h5 class="text-center fw-bold mb-4" style="color: #444; font-size: 1.6rem;">Sign In to Continue
                        </h5>
                        <form style="width: 100%; max-width: 420px;">
                            <div class="mb-4">
                                <input type="tel" class="form-control form-control-lg rounded-2" id="email"
                                    placeholder="Enter Mobile Number" style=" padding: 0.5rem; border: 1px solid #ddd; font-size:1.1rem">
                            </div>
                            <div class="mb-4">
                                <input type="password" class="form-control form-control-lg rounded-2" id="password"
                                    placeholder="Password" style=" padding: 0.5rem; border: 1px solid #ddd; font-size:1.1rem">
                            </div>
                            <div class="text-end mb-4">
                                <a href="#" class="text-black" style="color: #F2DC51; font-weight: 600;">
                                    Forgot Password?
                                </a>
                            </div>
                            <button type="submit" class="btn w-100  fw-bold "
                                style="background: #F2DC51; border-radius: 10px; font-size: 1.2rem; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);">Login</button>
                        </form>
                        <p class="mt-4 text-center" style="color: #666;">New here?
                            <a href="#" class="text-decoration-none" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal" style="color: #F7C548; font-weight: 600;">Create an
                                account</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Modal cretae account -->
<div class="modal fade" id="exampleModalToggle2" tabindex="-1" aria-labelledby="exampleModalToggle2Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content"
            style="border-radius: 10px; overflow: hidden; background: linear-gradient(135deg, #ffffff, #f9f9f9); box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);">
            <!-- Modal Header -->
            <!-- Modal Body -->
            <div class="modal-body p-0">
                <div class="row g-0">
                    <!-- Left Section: Why Sign Up -->
                    <div class="col-md-6 p-4" style="background: linear-gradient(135deg, #FDFBDF, #FFE085);">
                        <h3 class="fw-bold mb-4" style="color: #333; font-size: 1.5rem;">Why Sign Up?</h3>
                        <div class="benefits-list" style="font-size: 1rem; line-height: 2;">
                            <p class="d-flex align-items-start mb-1">
                                <span class="me-3" style="font-size: 1.5rem; color: #F7C548;">✔</span>
                                Get personalized information
                            </p>
                            <p class="d-flex align-items-start mb-1">
                                <span class="me-3" style="font-size: 1.5rem; color: #F7C548;">✔</span>
                                Save charts (Kundli) on cloud
                            </p>
                            <p class="d-flex align-items-start mb-1">
                                <span class="me-3" style="font-size: 1.5rem; color: #F7C548;">✔</span>
                                Write notes & comments
                            </p>
                            <p class="d-flex align-items-start">
                                <span class="me-3" style="font-size: 1.5rem; color: #F7C548;">✔</span>
                                Access anywhere: mobile & web
                            </p>
                        </div>
                        <center>
                            <img src="<?php echo base_url('assets/images/ShreeGanesh.jpg'); ?>" alt="Benefits"
                                class="img-fluid mt-2 rounded" style="max-width: 280px; ">
                        </center>
                    </div>

                    <!-- Right Section: Signup Form -->
                    <div class="col-md-6 d-flex flex-column justify-content-center align-items-center p-5"
                        style="background: #FFF;">
                        <h4 class="text-center fw-bold mb-4" style="color: #444; font-size: 1.6rem;">Create Account
                        </h4>
                        <form id="signupForm" style="width: 100%; max-width: 420px;">

                            <div id="step1" class="mb-4">
                                <input type="tel" class="form-control form-control-lg rounded-2" id="mobile"
                                    placeholder="Mobile Number" style="padding: 0.5rem; border: 1px solid #ddd;" required>
                                <button type="button" class="btn btn-warning mt-2" id="getOTP">Get OTP</button>
                            </div>
                            <div id="step2" style="display: none;">
                                <input type="text" class="form-control form-control-lg rounded-2 mb-2" id="otp"
                                    placeholder="Enter OTP" style="padding: 0.8rem; border: 1px solid #ddd;" maxlength="4" required>
                            </div>
                            <div id="step3" style="display: none;">
                                <input type="text" class="form-control form-control-lg rounded-4 mb-2" id="username"
                                    placeholder="Username" style="padding: 0.8rem; border: 1px solid #ddd;" required>
                                <input type="password" class="form-control form-control-lg rounded-4 mb-2" id="password"
                                    placeholder="Password" style="padding: 0.8rem; border: 1px solid #ddd;" required>
                                <input type="date" class="form-control form-control-lg rounded-4 mb-2" id="birthdate" required>
                                <button type="submit" class="btn w-100 py-3 fw-bold"
                                    style="background: #F2DC51; border-radius: 50px; font-size: 1.2rem; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById('getOTP').addEventListener('click', () => {
        // Add your OTP generation and verification logic here.  This is a placeholder.
        const mobile = document.getElementById('mobile').value;
        if (mobile.length === 10) { // Basic validation - replace with more robust check
            document.getElementById('step1').style.display = 'none';
            document.getElementById('step2').style.display = 'block';
        } else {
            Swal.fire("Enter Valid Mobile Number");
        }
    });

    document.getElementById('signupForm').addEventListener('submit', (e) => {
        e.preventDefault();
        // Add your signup logic here. This is a placeholder.
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;
        const birthdate = document.getElementById('birthdate').value;
        // Perform validation on username, password, and birthdate here.
        alert(`Creating account for ${username}...`);
    });

    document.getElementById('otp').addEventListener('input', () => {
        if (document.getElementById('otp').value.length === 4) {
            document.getElementById('step2').style.display = 'none';
            document.getElementById('step3').style.display = 'block';
        }
    });
</script>