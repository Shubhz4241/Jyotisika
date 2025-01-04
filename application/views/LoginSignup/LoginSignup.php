<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="border-radius: 15px; overflow: hidden; background: linear-gradient(135deg, #ffffff, #f9f9f9); box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);">
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
                                <img src="<?php echo base_url('assets/images/ShreeGanesh.jpg'); ?>" alt="Benefits" class="img-fluid mt-2 rounded" 
                                style="max-width: 280px; ">
                            </center>
                        </div>

                        <!-- Right Section: Login Form -->
                        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center p-5" style="background: #FFF;">
                            <h4 class="text-center fw-bold mb-4" style="color: #444; font-size: 1.6rem;">Sign In to Continue</h4>
                            <form style="width: 100%; max-width: 400px;">
                                <div class="mb-4">
                                    <input type="email" class="form-control form-control-lg rounded-4" id="email" placeholder="Email Address" style=" padding: 1rem; border: 1px solid #ddd;">
                                </div>
                                <div class="mb-4">
                                    <input type="password" class="form-control form-control-lg rounded-4" id="password" placeholder="Password" style=" padding: 1rem; border: 1px solid #ddd;">
                                </div>
                                <div class="text-center mb-4">
                                    <a href="#" class="text-decoration-none" style="color: #F2DC51; font-weight: 600;">Forgot Password?</a>
                                </div>
                                <button type="submit" class="btn w-100 py-3 fw-bold " style="background: #F2DC51; border-radius: 50px; font-size: 1.2rem; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);">Login</button>
                            </form>
                            <p class="mt-4 text-center" style="color: #666;">New here?
                                <a href="#" class="text-decoration-none" style="color: #F7C548; font-weight: 600;">Create an account</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>