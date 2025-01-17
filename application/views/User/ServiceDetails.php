<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Why Us</title>

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

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
</head>

<body>

    <header>
        <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    </header>

    <main>
        <?php $this->load->view('IncludeUser/CommanSubnav'); ?>


        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card shadow-lg border-0" style="overflow: hidden; border-radius: 15px; ">
                        <div class="row g-0">
                            <!-- Image Section -->
                            <div class="col-md-4 p-3">
                                <img src="<?php echo base_url('assets/images/Services/carrerJobService.png') ?>"
                                    class="img-fluid" alt="service image"
                                    style="height:240px; width:240px; object-fit: contain;  " >
                                
                            </div>
                            <!-- Content Section -->
                            <div class="col-md-5 d-flex flex-column justify-content-center p-4">
                                <h5 class="card-title fw-bold text-dark mb-3" style="font-size: 1.5rem; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);" >
                                    Career/Job
                                </h5>
                                <p class="card-text text-secondary mb-4 " style="text-align:justify; font-size: 0.95rem; line-height: 1.6;">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste illo nulla tempora dolorum vero quisquam minus cum, nobis rem velit dicta harum consequuntur recusandae fuga reiciendis ut magnam perferendis explicabo?
                                </p>
                            </div>
                            <!-- Price and Button Section -->
                            <div class="col-md-3 d-flex flex-column justify-content-center align-items-center text-center p-4"
                                style="border-top-right-radius: 15px; border-bottom-right-radius: 15px;">
                                <p class="mb-1 text-muted" style="font-size: 1rem;">Price</p>
                                <p class="fw-bold fs-4 text-success mb-0 pb-0" style="font-size: 1.8rem; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);">
                                    344 Rs
                                </p>
                                <p class="text-decoration-line-through">500 Rs</p>
                                <button class="btn btn-primary btn w-fit text-dark p-2" style="background-color:var(--yellow); border: none; border-radius: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); transition: transform 0.2s;">
                                    Order Now
                                </button>
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