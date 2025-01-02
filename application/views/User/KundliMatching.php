<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Home</title>

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


    

    <!-- kundli matching -->
    <div class="container rounded p-4 my-4 shadow" style="background-color: #fff7b8; ">
        <h3 class="text-center mb-4">Kundli/Birth Chart</h3>
        <form action="">
            <div class="row ">

                <div class="col-12 col-md-6">

                    <h5>Boy's Details</h5>

                    <input type="text" name="name" id="name" placeholder="Name" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <input type="number" name="day" id="day" placeholder="Day" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="month" id="month" placeholder="Month" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="year" id="year" placeholder="Year" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="hour" id="hour" placeholder="Hour" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="minute" id="minute" placeholder="Minute" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="second" id="second" placeholder="Second" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                        </div>
                    </div>

                    <input type="text" name="birthPlace" id="birthPlace" placeholder="Birth Place" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">

                </div>

                <div class="col-12 col-md-6">
                    <h5>Girl's Details</h5>

                    <input type="text" name="name" id="name" placeholder="Name" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <input type="number" name="day" id="day" placeholder="Day" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="month" id="month" placeholder="Month" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="year" id="year" placeholder="Year" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="hour" id="hour" placeholder="Hour" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="minute" id="minute" placeholder="Minute" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                        </div>
                        <div class="col-12 col-md-4">
                            <input type="number" name="second" id="second" placeholder="Second" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">
                        </div>
                    </div>

                    <input type="text" name="birthPlace" id="birthPlace" placeholder="Birth Place" autocomplete="off" class="form-control shadow-none my-2 p-2 rounded-1">

                </div>
                <div class="col-12 d-flex gap-2 justify-content-center mt-3">
                    <button type="submit" class="btn" style="background-color: var(--yellow); color: black;">
                        Submit
                    </button>
                    <button type="button" class="btn" style="background-color: var(--yellow); color: black;">
                        Reset
                    </button>

                </div>
            </div>
        </form>
    </div>

    <!-- Horoscope Matching | Kundali Matching | Kundli Match for Marriage -->
    <div class="container my-4">
        <div class="row">
            <h4 class="text-center my-4" style="color: var(--red); ">Horoscope Matching | Kundali Matching | Kundli Match for Marriage</h4>
            <p style="text-align: justify;">Lorem Ipsum Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet.." comes from a line in section 1.10.32.The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
        </div>
    </div>

    <!-- Guna Milan -->
    <div class="container">
        <div class="row">
            <h4 class="text-center my-4" style="color: var(--red); ">Guna Milan</h4>
            <p>Each category of the Ashta Koot focuses on a different aspect of life and compatibility, including</p>
            <ul>
                <li>Varna: Spiritual compatibility and ego levels</li>
                <li>Vashya: Mutual control and attraction between partners</li>
                <li>Tara: Health and well-being compatibility</li>
                <li>Yoni: Sexual compatibility and overall nature</li>
            </ul>
        </div>
        <div class="row">
            <p>In Vedic astrology, the 36 Gunas are a way to compare two people's birth charts to predict how compatible they might be in a marriage. The 36 Gunas are divided into eight categories, called Ashta Koot, and each category is worth a different number of points</p>
            <ul>
                <li>Nadi: 8 points</li>
                <li>Bhakoot: 7 points</li>
                <li>Gana: 6 points</li>
                <li>Maitri: 5 points</li>
                <li>Yoni: 4 points</li>
                <li>Tara: 3 points</li>
                <li>Vasya: 2 points</li>
                <li>Varna: 1 point </li>
            </ul>
        </div>
    </div>

    <!-- Importance Of Guna Milan< -->
    <div class="container mb-4">
        <div class="row">
            <h4 class="text-center my-4" style="color: var(--red); ">Importance Of Guna Milan</h4>
            <p>For a marriage to be approved, at least 18 Gunas must match between the bride and groom. The degree of compatibility between the couple increases with the number of matching Gunas</p>
            <ul>
                <li>18–25 Gunas: Considered a good marriage</li>
                <li>26–32 Gunas: Considered a best match</li>
                <li>More than 32 Gunas: Considered an ideal marriage</li>
            </ul>
        </div>
    </div>


    <!-- footer -->
    <?php $this->load->view('IncludeUser/CommanFooter'); ?>




</body>

</html>