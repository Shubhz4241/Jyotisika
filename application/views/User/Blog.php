<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>

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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

</head>

<body>

    <!-- NAVBAR -->

     <header>
        <!-- Navbar -->
        <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    </header>
    

   

    <main>
       <?php $this->load->view('IncludeUser/CommanSubnav'); ?>


        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="col text-center">
                        <h3 class="fw-bold">Blogs</h3>
                    </div>
                    <!-- <div class="col-auto">
                        <a href="<?php echo base_url('blog'); ?>" class="btn" style="background-color: var(--yellow);">
                            View All
                        </a>
                    </div> -->
                </div>
            </div>

            <div class="row">
                <?php if (!empty($blogdata)): ?>
                    <?php foreach (array_slice($blogdata, 0) as $product): ?>

                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">

                            <a class="text-decoration-none"
                                href="<?php echo base_url('User/ViewBlogInfo/' . $product['blog_id']); ?>">
                                <div class="card shadow h-100 rounded-1">
                                    <img src="<?php echo base_url("uploads/blogs/".$product["blog_image"]); ?>" class="card-img-top p-2"
                                        alt="Product Image" style="height: 200px; object-fit: cover;"  onerror="this.onerror=null;this.src='<?php echo base_url('uploads/festivals/diva.jpg'); ?>';">
                                    <div class="card-body">
                                        <h5 class="card-title "><?php echo $product["blog_title"] ?></h5>
                                        <p class="text-muted">Today</p>

                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center text-muted">No products available.</p>
                <?php endif; ?>

            </div>
            <!-- <div class="row">
                <?php for ($i = 0; $i < 8; $i++): ?>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        <a class="text-decoration-none" href="<?php echo base_url('viewbloginfo'); ?>">
                            <div class="card shadow h-100">
                                <img src="<?php echo base_url('assets/images/blogimage.png'); ?>" class="card-img-top p-2" alt="Product Image" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title ">Your Zodiac Sign: What It Really Means</h5>
                                    <p class="text-muted">Today</p>

                                </div>
                            </div>
                        </a>
                    </div>

                <?php endfor; ?>
            </div> -->
        </div>



    </main>




     <footer>
        <!-- footer -->
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>

    <!-- <script>
        function acceptTerms() {
            alert("You have accepted the Terms and Conditions.");
        }
    </script> -->
</body>

</html>