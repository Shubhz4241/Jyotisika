<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Home</title>

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <style>
        .table td,
        .table th {
            padding: 20px;
            /* Adjust spacing as needed */
            text-align: center;
            /* Center align the text */
            white-space: nowrap;
            /* Prevent text from wrapping */
        }
    </style>


</head>

<body>


    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>

    <?php $this->load->view('IncludeUser/CommanSubnav'); ?>


    <div class="container p-2 my-4 rounded-3" style="background-color: #fff7b8;  ">
        <h4 class=" text-center ">Kundli/Birth Chart</h4>
    </div>


    <div class="container my-4">
        <div class="row">

            <div class="col-12 col-md-7">
                <h5 class="fw-bold">Navamansa chart</h5>
                <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta fugit omnis eligendi debitis cum incidunt molestias iste voluptates! Eveniet adipisci amet id fugiat illo doloribus? Aspernatur voluptatibus sint possimus corrupti error sequi, voluptatum commodi sapiente iure id temporibus sunt at inventore exercitationem eos aliquid? Rerum ex sed tempora temporibus officia? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis odit ut rem eius assumenda deleniti perferendis quisquam dolores enim corrupti temporibus debitis quos dolor id, fuga molestias exercitationem provident incidunt?</p>
            </div>
            <div class="col-12 col-md-5 text-center">
                <img src="<?php echo base_url('assets/images/FreeKundli/kundli2.png'); ?>" alt="kundli" class="img-fluid"
                    style="width:300px; height: 300px;">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 col-md-5 text-center order-2 order-md-1">
                <img src="<?php echo base_url('assets/images/FreeKundli/kundli2.png'); ?>" alt="kundli" class="img-fluid"
                    style="width:300px; height: 300px;">
            </div>
            <div class="col-12 col-md-7 order-1 order-md-2">
                <h5 class="fw-bold">Lagna Chart</h5>
                <p style="text-align: justify;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta fugit omnis eligendi debitis cum incidunt molestias iste voluptates! Eveniet adipisci amet id fugiat illo doloribus? Aspernatur voluptatibus sint possimus corrupti error sequi, voluptatum commodi sapiente iure id temporibus sunt at inventore exercitationem eos aliquid? Rerum ex sed tempora temporibus officia? Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis odit ut rem eius assumenda deleniti perferendis quisquam dolores enim corrupti temporibus debitis quos dolor id, fuga molestias exercitationem provident incidunt?</p>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead>
                        <tr>
                            <th style="width: 80px;">Planets</th>
                            <td style="width: 200px;">Asc</td>
                            <td style="width: 200px;">Sun</td>
                            <td style="width: 200px;">Moon</td>
                            <td style="width: 200px;">Mars</td>
                            <td style="width: 200px;">Merc</td>
                            <td style="width: 60px;">Jupiter</td>
                            <td style="width: 60px;">Venus</td>
                            <td style="width: 60px;">Saturn</td>
                            <td style="width: 60px;">Rahu</td>
                            <td style="width: 60px;">Ketu</td>
                            <td style="width: 60px;">Uranus</td>
                            <td style="width: 60px;">Neptune</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Combust</th>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>C</td>
                            <td>-</td>
                            <td>-</td>
                            <td>C</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>Direct</th>
                            <td>-</td>
                            <td>D</td>
                            <td>D</td>
                            <td>D</td>
                            <td>D</td>
                            <td>D</td>
                            <td>D</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>Retrograde</th>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>R</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>R</td>
                        </tr>
                        <tr>
                            <th>Eclipse</th>
                            <td>E</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>E</td>
                            <td>E</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <th>Longitude</th>
                            <td>20-35-06</td>
                            <td>07-51-51</td>
                            <td>17-12-05</td>
                            <td>00-30-42</td>
                            <td>14-21-26</td>
                            <td>20-32-28</td>
                            <td>08-16-61</td>
                            <td>22-16-05</td>
                            <td>24-47-35</td>
                            <td>24-47-35</td>
                            <td>04-59-38</td>
                            <td>16-09-56</td>
                        </tr>
                        <tr>
                            <th>Nakshatra</th>
                            <td>Swaraa</td>
                            <td>Kritika</td>
                            <td>Hasta</td>
                            <td>Magh</td>
                            <td>Rohini</td>
                            <td>Punarvasu</td>
                            <td>Ardra</td>
                            <td>Rohini</td>
                            <td>Magh</td>
                            <td>Jyestha</td>
                            <td>Dhanishtha</td>
                            <td>Swaraa</td>
                        </tr>
                        <tr>
                            <th>Pada</th>
                            <td>4</td>
                            <td>4</td>
                            <td>3</td>
                            <td>3</td>
                            <td>2</td>
                            <td>1</td>
                            <td>1</td>
                            <td>4</td>
                            <td>1</td>
                            <td>3</td>
                            <td>4</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <th>Relation</th>
                            <td>Enemy</td>
                            <td>Friendly</td>
                            <td>Enemy</td>
                            <td>Friendly</td>
                            <td>Enemy</td>
                            <td>Friendly</td>
                            <td>Enemy</td>
                            <td>Friendly</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php $this->load->view('IncludeUser/CommanFooter'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzDO9Jq/Uy1p1Lw2jG/q04FH04EZoQUlBgDkfiC9UvN0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyl2nq2K9KVDL9VkUsRxKSh3zO7lHcKrCdP4I3ZeGIDc9HrT2yztVR" crossorigin="anonymous"></script>

</body>

</html>