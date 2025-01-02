<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Festival</title>

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

    <!-- Navbar -->
    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    <?php $this->load->view('IncludeUser/CommanSubnav'); ?>


    <div class="container">
        <div class="row">
            <h3 class="text-center fw-bold " style="color: var(--red);">Hindu Festivals 2025 & Muhurat</h3>
            <p> <span style="color: var(--red);">Hinduism</span> is celebrated for its rich tapestry of festivals, each brimming with cultural and spiritual significance. Over time, these festivals have evolved, embracing new traditions and meanings while preserving their ancient roots.</p>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="card p-2 " style="width:fit-content">
                <p class="card-text fs-5"> <span style="color: var(--red);">Today's Festival :</span> There is no festival Today.</p>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-12 col-md-6">
                <div class="card p-2" style="width: 18rem;">
                    <img src="<?php echo base_url('assets/images/Festival/merryChristmas.png'); ?>" class="card-img-top" alt="image">
                    <div class="card-body">
                        <h5 class="card-title text-center">Merry Chirstmas</h5>
                        <center>
                            <a href="#" class="btn mx-auto btn-sm mt-2 " style="background-color: var(--yellow);">
                                Read More
                            </a>
                        </center>
                    </div>
                </div>
                
            </div>
        </div>
    </div>






    <!-- footer -->
    <?php $this->load->view('IncludeUser/CommanFooter'); ?>




</body>

</html>