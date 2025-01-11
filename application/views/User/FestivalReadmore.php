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


</head>

<body>

    <!-- Navbar -->
    <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    <?php $this->load->view('IncludeUser/CommanSubnav'); ?>


    <main>
        <div class="container py-5">
            <!-- Select Year and Place + When is Christmas Card -->
            <div class="row g-4 mb-4">
                <!-- Form Section -->
                <div class="col-12 col-md-6 d-flex">
                    <div class="p-4 border rounded shadow-sm  w-100 d-flex flex-column justify-content-between">
                        <h2 class="mb-4 text-uppercase text-center font-weight-bold" style="letter-spacing: 1px;">Select
                            Year and Place</h2>
                        <form>
                            <div class="mb-3">
                                <label for="year" class="form-label">Select Year</label>
                                <select name="year" id="year" class="form-select border-primary">
                                    <option value="">Select Year</option>
                                    <?php for ($i = date('Y'); $i >= 2000; $i--): ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="place" class="form-label">Enter Place</label>
                                <input type="text" name="place" id="place" class="form-control border-primary"
                                    placeholder="Enter Place">
                            </div>
                            <div class="text-center mt-4">
                                <button type="button" class="btn  px-5 rounded-4 shadow" style="background-color:var(--yellow)">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Christmas Card -->
                <div class="col-12 col-md-6 d-flex justify-content-center shadow-sm  border rounded">
                    <div class="card  h-100 w-100 border-0 d-flex flex-column justify-content-between">
                        <div class="card-body text-center h-100 pt-5">
                            <h4 class="card-title">When is Christmas 2025?</h4>
                            <h1 class="card-text display-1 text-danger">13</h1>
                            <p class="card-text mb-1">December</p>
                            <p class="card-text">(Monday)</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Festival Image + About the Festival -->
            <div class="row g-4 mb-5">
                <!-- About the Festival -->
                <div class="col-12">
                    <div class="p-4 border rounded shadow-sm  w-100 d-flex flex-column justify-content-between">
                        <h3 class="text-dark mb-3">Christmas Festival</h3>
                        <p>
                            Christmas is a joyful festival celebrated worldwide to commemorate the birth of Jesus
                            Christ. It is a time of giving, sharing, and spreading love. People decorate Christmas
                            trees, exchange gifts, and gather for festive meals with family and friends.
                        </p>
                        <p>
                            Traditions vary across cultures, but the spirit of Christmas brings warmth and happiness to
                            everyone. From singing carols to lighting up homes, this festival symbolizes hope and unity.
                        </p>
                        
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