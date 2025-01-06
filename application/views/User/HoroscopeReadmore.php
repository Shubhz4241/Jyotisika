<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Horoscope Readmore</title>

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

    <style>
        /* image rotation code */
        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .rotating-image {
            animation: rotate 20s linear infinite;
            transform-origin: center center;
        }

        /* button hover */
        .btn-hover:hover {
            background-color: var(--yellow);
            color: black;
        }

        .zodiacSign:hover {
            background-color: var(--yellow);
        }
    </style>

</head>

<body>

    <!-- Navbar -->
    <header>
        <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    </header>


    <main>
        <?php $this->load->view('IncludeUser/CommanSubnav'); ?>

        <div class="container">

            <div class="row my-4">
                <div class="text-center mb-2">
                    <h2 class="fw-bold">Aries Today’s Horoscope </h2>
                    <p class="fs-5">25 December 2024</p>
                </div>
                <div>
                    <div class="position-relative ">
                        <hr class="border border-dark opacity-25">
                        <div class="position-absolute top-50 start-50 translate-middle bg-white px-3">
                            <img src="<?php echo base_url('assets/images/aris.png'); ?>" alt="horoscope"
                                style="width: 50px; height: 50px;">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-4 order-2 order-md-1 ">
                    <div class="card p-3 shadow border-1 rounded-2 ">
                        <label for="zodiacSign" class="form-label fw-bold mb-2">Select Other Sign</label>
                        <select name="zodiacSign" id="zodiacSign" class="form-select shadow-none">
                            <option value="Aries" selected>Aries</option>
                            <option value="Taurus">Taurus</option>
                            <option value="Gemini">Gemini</option>
                            <option value="Cancer">Cancer</option>
                            <option value="Leo">Leo</option>
                            <option value="Virgo">Virgo</option>
                            <option value="Libra">Libra</option>
                            <option value="Scorpio">Scorpio</option>
                            <option value="Sagittarius">Sagittarius</option>
                            <option value="Capricorn">Capricorn</option>
                            <option value="Aquarius">Aquarius</option>
                            <option value="Pisces">Pisces</option>
                        </select>

                    </div>

                    <div class="card shadow border-1 rounded-2 mt-1 p-3">
                        <p class="fs-5 fw-bold mb-3">Horoscope</p>
                        <div class="row row-cols-2 g-2">
                            <div class="col">
                                <button class="btn btn-outline-dark w-100 btn-hover">Today's Horoscope</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-outline-dark w-100 btn-hover">Tomorrow's Horoscope</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-outline-dark w-100 btn-hover">Weekly Horoscope</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-outline-dark w-100 btn-hover">Monthly Horoscope</button>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow border-1 rounded-2 mt-1 p-2">
                        <a href="#" class="text-decoration-none">
                            <div class="d-flex gap-3 align-items-center">
                                <div class="bg-light rounded-circle p-2">
                                    <img src="<?php echo base_url('assets/images/whatsapp.png'); ?>" alt="callImage"
                                        style="width:40px; height:40px">
                                </div>
                                <div>
                                    <p class=" fw-bold mb-0 text-black">Chat With Astrologer</p>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="card shadow border-1 rounded-2 mt-1 mb-3 p-2">
                        <a href="#" class="text-decoration-none">
                            <div class="d-flex gap-3 align-items-center">
                                <div class="bg-light rounded-circle p-2">
                                    <img src="<?php echo base_url('assets/images/call.png'); ?>" alt="callImage"
                                        style="width:40px; height:40px">
                                </div>
                                <div>
                                    <p class=" fw-bold mb-0 text-black">Call With Astrologer</p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
                <div class="col-12 col-md-8 order-1 order-md-2">
                    <div class="card shadow border-1 rounded-2 p-3">
                        <p class="fs-5 text-center fw-bold">Aries Today’s Horoscope  </p>
                        <p style="text-align:justify;" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, veniam porro iusto aliquid asperiores repudiandae laudantium ducimus cum deserunt explicabo qui deleniti, quaerat laboriosam perspiciatis at voluptatum amet quia eos voluptatem animi? Rem quae, nihil, reprehenderit dolorum ea labore ipsam quam facere ut hic omnis sed asperiores? Commodi, dolores dolor! Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque earum atque doloribus quod expedita dicta quis tempora beatae. Dolorum voluptas rem sed harum dolores repudiandae iure molestiae! Laudantium beatae neque temporibus. Magnam, nostrum accusamus ad voluptatum fugit eligendi id numquam ducimus enim est repudiandae eos quia non quasi, recusandae et in ab dolores dolor iusto soluta ipsum excepturi fuga nemo. Nam rerum nobis accusantium aliquam officiis quisquam neque provident, recusandae nulla itaque, sed fugit voluptates? Inventore quaerat, fugiat impedit esse alias nulla vel explicabo quisquam commodi unde debitis recusandae numquam suscipit pariatur voluptate, nam ducimus minima beatae delectus laudantium animi? </p>
                        
                    </div>
                </div>
            </div>

        </div>
    </main>









    <!-- footer -->
    <footer>
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>




</body>

</html>