<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions</title>

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
    <?php $this->load->view('IncludeUser/CommanSubnav'); ?>




    <main>





        <section class="container mt-5">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <!-- Blog Image -->
                    <div class="blog-image text-center mb-4">
                        <img src="<?php echo !empty($blogdata[0]["blog_image"]) ? base_url($blogdata[0]["blog_image"]) : base_url('assets/images/default-blog.png'); ?>"
                            class="img-fluid w-50" alt="Blog Image">
                    </div>


                    <!-- Blog Content -->
                    <div class="blog-content">
                        <h2 class="mb-3 text-center"><?php echo $blogdata[0]["blog_title"] ?? "No Title Available"; ?></h2>

                        <!-- <div class="blog-meta mb-3">
                            <span class="me-3"><i class="bi bi-calendar"></i> <?php echo date('M d, Y'); ?></span>
                          
                        </div> -->
                        <div class="blog-text">
                            <p class="lead">About</p>
                            <p style="text-align: justify;">
                                <?php echo !empty($blogdata[0]["blog_desc"]) ? $blogdata[0]["blog_desc"] : "No description available."; ?>
                            </p>

                        </div>

                    </div>
                </div>
            </div>
        </section>
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