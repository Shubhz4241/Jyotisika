<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jyotisika:Festival</title>

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
        .bg-color {
            background-color: #fff7b8 !important;
        }
    </style>

</head>


<body>

    <!-- Navbar -->
    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    <?php $this->load->view('IncludeUser/CommanSubnav'); ?>


    <div class="container">
        <div class="table-responsive ">
            <table class="table table-bordered text-warning-emphasis ">
                <thead>
                    <tr>
                        <th class="bg-color" scope="col">Title</th>
                        <th class="bg-color" scope="col">Value</th>

                    </tr>
                </thead>
                <tbody>

                    <!-- <?php print_r($titiData);
                    $tithi_data = json_decode($titiData['output'], true);
                    print_r($tithi_data);
                    ?> -->

                    <!-- <?php print_r($nakshatraData);
                    $nakshatraData = $nakshatraData['output'];
                    print_r($nakshatraData);
                    ?> -->

                  
                    <td class="bg-color">Date</td>
                    <td class="bg-color"><?php echo date("d F Y"); ?></td>


                    </tr>
                    <tr>
                        <td class="bg-color">Today's Tithi </td>
                        <td class="bg-color">Today's Tithi</td>

                    </tr>
                    <tr>
                        <td class="bg-color">Today's Nakshatra </td>
                        <td class="bg-color">Today's Nakshatra </td>
                        <!-- <td class="bg-color"><?php print_r($nakshatraData["name"].  $nakshatraData["starts_at"] ."----TO---".$nakshatraData["ends_at"] )?> </td> -->
                        <!-- <?php print_r($nakshatraData["name"].  $nakshatraData["starts_at"] ."----TO---".$nakshatraData["ends_at"] )?> -->

                    </tr>
                    <tr>
                        <td class="bg-color">Today's Karana </td>
                        <td class="bg-color">Baalav upto 10:05, Kolav upto 22:22</td>

                    </tr>
                    <tr>
                        <td class="bg-color">Today's Paksha </td>
                        <td class="bg-color">Krishna</td>

                    </tr>
                    <tr>
                        <td class="bg-color">Today's Yoga </td>
                        <td class="bg-color">Vaidhriti upto 18:33</td>

                    </tr>
                    <tr>
                        <td class="bg-color">Today's Sun Rise Time </td>
                        <td class="bg-color">Guruvara</td>

                    </tr>
                    <tr>
                        <td class="bg-color">Today's Sun Set Time</td>
                        <td class="bg-color">07:08</td>

                    </tr>
                    <tr>
                        <td class="bg-color">Today's Moon Sign</td>
                        <td class="bg-color">17:28</td>

                    </tr>
                    <tr>
                        <td class="bg-color">Today's Moon Rise </td>
                        <td class="bg-color">Karka upto 26:00</td>

                    </tr>
                    <tr>
                        <td class="bg-color">Today's Moon Set</td>
                        <td class="bg-color">21:27</td>

                    </tr>
                    <tr>
                        <td class="bg-color">Today's Ritu</td>
                        <td class="bg-color">10:30</td>

                    </tr>
                    <tr>
                        <td class="bg-color">Hindu Month</td>
                        <td class="bg-color">Pausha</td>

                    </tr>
                    <tr>
                        <td class="bg-color">Vikram Samvat </td>
                        <td class="bg-color">2081</td>

                    </tr>
                    <tr>
                        <td class="bg-color">Today's Dushta Muhurtas </td>
                        <td class="bg-color">From 10:35:18 To 11:16:35, From 14:42:57 To 15:24:14</td>

                    </tr>
                    <tr>
                        <td class="bg-color">Today's Kulika</td>
                        <td class="bg-color">From 10:35:18 To 11:16:35</td>

                    </tr>
                    <tr>
                        <td class="bg-color">Today's Rahu Kaal</td>
                        <td class="bg-color">From 13:35:53 To 14:53:17</td>

                    </tr>
                    <tr>
                        <td class="bg-color">Today's Abhijit muhurat </td>
                        <td class="bg-color">From 11:57:51 To 12:39:08</td>

                    </tr>
                    <tr>
                        <td class="bg-color">Today's Disha</td>
                        <td class="bg-color">South</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


        



    <!-- footer -->
    <?php $this->load->view('IncludeUser/CommanFooter'); ?>




</body>

</html>