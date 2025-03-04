<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:View More</title>

    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">



</head>

<body>
    <!-- Navbar -->
    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    <?php $this->load->view('IncludeUser/CommanSubnav'); ?>

    <main>
        <section class="pooja-info-section py-5">
            <div class="container">
            <div class="row">
                <div class="col-lg-4">
                <div class="pooja-image-container">
                    <img src="assets/images/BookPooja/RitualReuniteYourLove.png" 
                     alt="Pooja Name" 
                     class="img-fluid rounded shadow-lg">
                </div>
                </div>
                <div class="col-lg-8">
                <div class="pooja-details bg-light p-4 rounded shadow">
                    <h2 class="mb-4" style="color:var(--red)">Pooja Name</h2>
                    <div class="description mb-4">
                    <h4 class="text-secondary">Description</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div class="procedure">
                    <h4 class="text-secondary">Procedure</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                    </div>
                    <div class="benefits mb-4">
                    <h4 class="text-secondary">Benefits</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        Benefit 1
                        </li>
                        <li class="list-group-item">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        Benefit 2
                        </li>
                        <li class="list-group-item">
                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                        Benefit 3
                        </li>
                    </ul>
                    </div>
                   
                </div>
                </div>
            </div>
            </div>
        </section>
    </main>

    <footer>
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>