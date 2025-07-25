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
                            <img src="<?php echo base_url("uploads/services/" . $puja_data[0]["image"]) ?>"
                                alt="Pooja Name" class="img-fluid rounded shadow-lg"
                                onerror="this.onerror=null; this.src='<?php echo base_url('assets/images/BookPooja/MahaRudrabhishekpooja.png'); ?>';">


                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="pooja-details bg-light p-4 rounded shadow">
                            <h2 class="mb-4" style="color:var(--red)"><?php echo $puja_data[0]["name"] ?></h2>
                            <div class="description mb-4">
                                <h4 class="text-secondary"><?php echo $this->lang->line('description') ?></h4>
                                <p><?php echo $puja_data[0]["description"] ?></p>
                            </div>

                            <b>
                                     <p>  <?php echo $this->lang->line('price') ?> <?php echo $puja_data[0]["price"] ?></p>
                                </b>
                            <div class="d-flex gap-3 mb-4">
                                <a href="<?php echo base_url("OnlinePoojaris/") . $puja_data[0]["id"] ?>"
                                    class="btn rounded-1" style="background-color: green; color:white;">
                                     <?php echo $this->lang->line('book_online_pooja') ?>   
                                </a>
                                <!-- <a href="<?php echo base_url('offlinepoojaris') ?>" class="btn btn-outline-dark btnHover rounded-1">
                            Book Offline Pooja
                        </a> -->
                            </div>

                            <div class="procedure">
                                <h4 class="text-secondary">  <?php echo $this->lang->line('procedure') ?>   </h4>
                                <p> <?php echo $this->lang->line('procedure_steps_intro') ?>   </p>
                                <ul>
                                    <li>
                                         <?php echo $this->lang->line('procedure_step1') ?>  
                                        

                                    </li>
                                    <li>
                                          <?php echo $this->lang->line('procedure_step2') ?>  
                                        
                               
                                    </li>
                                    <li>
                                        <?php echo $this->lang->line('procedure_step3') ?>  
                               
                                    </li>
                                    <li>
                                        <?php echo $this->lang->line('procedure_step4') ?>  
                                        
                                    </li>
                                </ul>
                            </div>
                            <div class="benefits mb-4">
                                <h4 class="text-secondary">   <?php echo $this->lang->line('benefits') ?> </h4>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                         <?php echo $this->lang->line('benefit1') ?>  
                                    </li>
                                    <li class="list-group-item">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                         <?php echo $this->lang->line('benefit2') ?> 
                                    </li>
                                    <li class="list-group-item">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                         <?php echo $this->lang->line('benefit3') ?>  
                                    </li>
                                    <li class="list-group-item">
                                        <i class="bi bi-check-circle-fill text-success me-2"></i>
                                        <?php echo $this->lang->line('benefit4') ?>  
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