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


        <select id="language" class="form-control shadow-none col-6 my-2 p-2 rounded-1" required>
            <option value="" disabled selected>Select Language</option>
            <option value="en">English</option>
            <option value="hi">Hindi</option>
            <option value="bn">Bengali</option>
            <option value="ma">Marathi</option>
            <option value="tm">Tamil</option>
            <option value="tl">Telugu</option>
            <option value="ml">Malayalam</option>
            <option value="kn">Kannada</option>
        </select>



        <div class="table-responsive ">
            <table class="table table-bordered text-warning-emphasis ">
                <thead>
                    <tr>
                        <th class="bg-color" scope="col"><?php echo $this->lang->line('Title'); ?></th>
                        <th class="bg-color" scope="col"><?php echo $this->lang->line('Value'); ?></th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="bg-color"><?php echo $this->lang->line('Date'); ?></td>
                        <td class="bg-color" id="todayDate">Loading...</td>
                    </tr>

                    <tr>
                        <td class="bg-color"><?php echo $this->lang->line('Todays_Tithi'); ?></td>
                        <td class="bg-color" id="tithi">Loading...</td>
                    </tr>
                    <tr>
                        <td class="bg-color"><?php echo $this->lang->line('Todays_Nakshatra'); ?></td>
                        <td class="bg-color" id="nakshatra">Loading...</td>
                    </tr>

                    <tr>
                        <td class="bg-color"><?php echo $this->lang->line('Todays_Karana'); ?></td>
                        <td class="bg-color" id="todayKarana">Loading...</td>
                    </tr>
                    <tr>
                        <td class="bg-color"><?php echo $this->lang->line('Todays_Paksha'); ?></td>
                        <td class="bg-color" id="todayPaksha">Loading...</td>
                    </tr>

                    <tr>
                        <td class="bg-color"><?php echo $this->lang->line('Todays_Yoga'); ?></td>
                        <td class="bg-color" id="todayYoga">Loading...</td>
                    </tr>

                    <tr>
                        <td class="bg-color"><?php echo $this->lang->line('Todays_Sunrise'); ?></td>
                        <td class="bg-color" id="sunrise">Loading...</td>
                    </tr>
                    <tr>
                        <td class="bg-color"><?php echo $this->lang->line('Todays_Sunset'); ?></td>
                        <td class="bg-color" id="sunset">Loading...</td>
                    </tr>
                    <!-- <tr>
                            <td class="bg-color">Today's Moon Sign</td>
                            <td class="bg-color">17:28</td>


                        </tr> -->

                    <tr>
                        <td class="bg-color"><?php echo $this->lang->line('Todays_Weekday'); ?></td>
                        <td class="bg-color" id="weekday">Loading...</td>
                    </tr>
                    <tr>
                        <td class="bg-color"><?php echo $this->lang->line('Todays_Moonrise'); ?></td>
                        <td class="bg-color" id="moonrise">Loading...</td>
                    </tr>
                    <tr>
                        <td class="bg-color"><?php echo $this->lang->line('Todays_Moonset'); ?></td>
                        <td class="bg-color" id="moonset">Loading...</td>
                    </tr>
                    <tr>
                        <td class="bg-color"><?php echo $this->lang->line('Todays_Ritu'); ?></td>
                        <td class="bg-color" id="todayRitu">Loading...</td>
                    </tr>

                    <!-- <tr>
                            <td class="bg-color">Hindu Month</td>
                            <td class="bg-color">Pausha</td>

                        </tr> -->
                    <tr>
                        <td class="bg-color"><?php echo $this->lang->line('Vikram_Samvat'); ?></td>
                        <td class="bg-color" id="vikramSamvat">Loading...</td>
                    </tr>
                    <tr>
                        <td class="bg-color"><?php echo $this->lang->line('Shaka_Samvat'); ?></td>
                        <td class="bg-color" id="shakaSamvat">Loading...</td>
                    </tr>

                    <tr>
                        <td class="bg-color"><?php echo $this->lang->line('Todays_Dushta_Muhurtas'); ?> </td>
                        <td class="bg-color">From 10:35:18 To 11:16:35, From 14:42:57 To 15:24:14</td>

                    </tr>
                    <tr>
                        <td class="bg-color"><?php echo $this->lang->line('Todays_Kulika'); ?></td>
                        <td class="bg-color">From 10:35:18 To 11:16:35</td>

                    </tr>
                    <tr>
                        <td class="bg-color"><?php echo $this->lang->line('Todays_Rahu_Kaal'); ?></td>
                        <td class="bg-color">From 13:35:53 To 14:53:17</td>

                    </tr>

                    <tr>
                        <td class="bg-color"><?php echo $this->lang->line('Todays_Abhijit_Muhurat'); ?></td>
                        <td class="bg-color" id="abhijit-time">From 13:35:53 To 14:53:17</td>
                    </tr>


                    <tr>
                        <td class="bg-color"><?php echo $this->lang->line('Todays_Disha'); ?></td>
                        <td class="bg-color" id="todaysDisha">North</td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>


    <script>

        let selectedLanguage = "en";
        const langSelect = document.getElementById("language");

        // If already selected language exists (optional)
        if (langSelect && langSelect.value) {
            selectedLanguage = langSelect.value;
        }

        langSelect.addEventListener("change", function () {
            selectedLanguage = this.value;
            console.log(selectedLanguage);
            fetchAndUpdatePanchang();
            fetchNakshatra();
            karana();
            yoga();
            ritu();
            sunandmoon();
            // findsamvet();

        });




    </script>




    <script>
        function fetchAndUpdatePanchang() {
            let lat = 28.6139;
            let lon = 77.2090;
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function (position) {
                        lat = position.coords.latitude;
                        lon = position.coords.longitude;

                    },
                    function (error) {
                        console.warn("Geolocation failed, using default location:", error.message);

                    }
                );
            } else {
                console.warn("Geolocation not supported, using default location.");

            }
            const today = new Date();
            const day = today.getDate();
            const month = today.getMonth() + 1;
            const year = today.getFullYear();

            const formData = new FormData();
            formData.append("api_key", "b49e81e874acc04f1141569767b24b79");
            formData.append("day", day);
            formData.append("month", month);
            formData.append("year", year);

            formData.append("lat", lat);
            formData.append("lon", lon);
            formData.append("tzone", "5.5");
            formData.append("lan", selectedLanguage);

            fetch("https://astroapi-1.divineapi.com/indian-api/v1/find-panchang", {
                method: "POST",
                headers: {
                    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g"
                },
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    const tithis = data.data.tithis;

                    if (!tithis || tithis.length === 0) {
                        return console.log("No tithi found")
                    }

                    const firstTithi = tithis[0];
                    const endTime = new Date(firstTithi.end_time);
                    const hours = endTime.getHours().toString().padStart(2, '0');
                    const minutes = endTime.getMinutes().toString().padStart(2, '0');
                    const formattedTithi = `${firstTithi.tithi} upto ${hours}:${minutes}`;

                    // Inject values
                    document.getElementById("tithi").innerText = formattedTithi;

                    // Sunrise and Sunset

                })
                .catch(error => {
                    console.error("Error fetching Panchang data:", error);
                    // alert("Failed to fetch Panchang data.");
                });
        }

        document.addEventListener("DOMContentLoaded", fetchAndUpdatePanchang);
    </script>

    <script>
        function fetchNakshatra() {
            let lat = 28.6139;
            let lon = 77.2090;
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function (position) {
                        lat = position.coords.latitude;
                        lon = position.coords.longitude;

                    },
                    function (error) {
                        console.warn("Geolocation failed, using default location:", error.message);

                    }
                );
            } else {
                console.warn("Geolocation not supported, using default location.");

            }
            const today = new Date();
            const day = today.getDate();
            const month = today.getMonth() + 1;
            const year = today.getFullYear();

            const formData = new FormData();
            formData.append("api_key", "b49e81e874acc04f1141569767b24b79");
            formData.append("day", day );
            formData.append("month", month);
            formData.append("year", year);

            formData.append("lat", lat);
            formData.append("lon", lon);
            formData.append("tzone", "5.5");
            formData.append("lan", selectedLanguage);

            fetch("https://astroapi-1.divineapi.com/indian-api/v1/find-nakshatra", {
                method: "POST",
                headers: {
                    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g"
                },
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    const nakList = data?.data?.nakshatras?.nakshatra_list;
                    const nakPada = data?.data?.nakshatras?.nakshatra_pada;

                    if (!nakList || nakList.length === 0) {
                        document.getElementById("nakshatra").innerText = "No data found";
                        return;
                    }

                    // Format: Pushya upto HH:MM
                    const currentNakshatra = nakPada[0]; // First pada of today
                    const time = new Date(currentNakshatra.end_time);
                    const hours = time.getHours().toString().padStart(2, '0');
                    const minutes = time.getMinutes().toString().padStart(2, '0');

                    const displayText = `${currentNakshatra.nak_name} upto ${hours}:${minutes}`;
                    document.getElementById("nakshatra").innerText = displayText;
                })
                .catch(error => {
                    console.error("Error fetching nakshatra:", error);
                    document.getElementById("nakshatra").innerText = "Error loading nakshatra";
                });
        }

        document.addEventListener("DOMContentLoaded", fetchNakshatra);
    </script>



    <script>
        function karana() {
            let lat = 28.6139;
            let lon = 77.2090;
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function (position) {
                        lat = position.coords.latitude;
                        lon = position.coords.longitude;

                    },
                    function (error) {
                        console.warn("Geolocation failed, using default location:", error.message);

                    }
                );
            } else {
                console.warn("Geolocation not supported, using default location.");

            }
            const today = new Date();
            const day = today.getDate();
            const month = today.getMonth() + 1;
            const year = today.getFullYear();

            const formData = new FormData();
            formData.append("api_key", "b49e81e874acc04f1141569767b24b79");
            formData.append("day", day);
            formData.append("month", month);
            formData.append("year", year);

            formData.append("lat", lat);
            formData.append("lon", lon);
            formData.append("tzone", "5.5");
            formData.append("lan", selectedLanguage);


            fetch("https://astroapi-1.divineapi.com/indian-api/v1/find-karana", {
                method: "POST",
                headers: {
                    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g"
                },
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.data.karnas.length > 0) {
                        let karanaText = "";
                        const karnas = data.data.karnas;

                        // Create readable Karana text with timings
                        karnas.forEach(karana => {
                            const endTime = new Date(karana.end_time);
                            const timeStr = endTime.toLocaleTimeString('en-IN', {
                                hour: '2-digit',
                                minute: '2-digit',
                                hour12: false
                            });
                            karanaText += `${karana.karana_name} upto ${timeStr}, `;
                        });

                        karanaText = karanaText.replace(/, $/, ''); // remove trailing comma
                        document.getElementById("todayKarana").innerText = karanaText;

                        // Display Paksha from the first Karana (usually all have the same)
                        document.getElementById("todayPaksha").innerText = karnas[0].paksha;
                    } else {
                        document.getElementById("todayKarana").innerText = "Not available";
                        document.getElementById("todayPaksha").innerText = "Not available";
                    }
                })
                .catch(error => {
                    console.error("Error fetching Karana data:", error);
                    document.getElementById("todayKarana").innerText = "Error loading";
                    document.getElementById("todayPaksha").innerText = "Error loading";
                });
        };


        document.addEventListener("DOMContentLoaded", karana);
    </script>

    <script>
        function yoga() {
            let lat = 28.6139;
            let lon = 77.2090;
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function (position) {
                        lat = position.coords.latitude;
                        lon = position.coords.longitude;

                    },
                    function (error) {
                        console.warn("Geolocation failed, using default location:", error.message);

                    }
                );
            } else {
                console.warn("Geolocation not supported, using default location.");

            }
            const today = new Date();
            const day = today.getDate();
            const month = today.getMonth() + 1;
            const year = today.getFullYear();

            const formData = new FormData();
            formData.append("api_key", "b49e81e874acc04f1141569767b24b79");
            formData.append("day", day);
            formData.append("month", month);
            formData.append("year", year);

            formData.append("lat", lat);
            formData.append("lon", lon);
            formData.append("tzone", "5.5");
            formData.append("lan", selectedLanguage);


            fetch("https://astroapi-1.divineapi.com/indian-api/v1/find-yoga", {
                method: "POST",
                headers: {
                    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g"
                },
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    const yogaArray = data?.data?.yogas;
                    if (!yogaArray || yogaArray.length === 0) {
                        document.getElementById("todayYoga").innerText = "Not available";
                        return;
                    }

                    // Format: Yoga1 upto HH:MM, Yoga2 upto HH:MM
                    let yogaText = "";
                    yogaArray.forEach(yoga => {
                        const endTime = new Date(yoga.end_time);
                        const formattedTime = endTime.toLocaleTimeString('en-IN', {
                            hour: '2-digit',
                            minute: '2-digit',
                            hour12: false
                        });
                        yogaText += `${yoga.yoga_name} upto ${formattedTime}, `;
                    });

                    yogaText = yogaText.replace(/,\s*$/, ''); // remove last comma
                    document.getElementById("todayYoga").innerText = yogaText;
                })
                .catch(err => {
                    console.error("Error fetching Yoga data:", err);
                    document.getElementById("todayYoga").innerText = "Error loading";
                });
        };

        document.addEventListener("DOMContentLoaded", yoga);
    </script>




    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const today = new Date();

            const options = {
                day: 'numeric',
                month: 'long',
                year: 'numeric',
            };

            const formattedDate = today.toLocaleDateString('en-IN', options); // e.g. "19 June 2025"
            document.getElementById("todayDate").innerText = formattedDate;
        });
    </script>

    <script>
        function ritu() {

            let lat = 28.6139;
            let lon = 77.2090;
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function (position) {
                        lat = position.coords.latitude;
                        lon = position.coords.longitude;

                    },
                    function (error) {
                        console.warn("Geolocation failed, using default location:", error.message);

                    }
                );
            } else {
                console.warn("Geolocation not supported, using default location.");

            }
            const today = new Date();
            const day = today.getDate();
            const month = today.getMonth() + 1;
            const year = today.getFullYear();

            const formData = new FormData();
            formData.append("api_key", "b49e81e874acc04f1141569767b24b79");
            formData.append("day", day );
            formData.append("month", month);
            formData.append("year", year);

            formData.append("lat", lat);
            formData.append("lon", lon);
            formData.append("tzone", "5.5");
            formData.append("lan", selectedLanguage);


            fetch("https://astroapi-2.divineapi.com/indian-api/v1/find-ritu-and-anaya", {
                method: "POST",
                headers: {
                    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g"
                },
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    const ritu = data?.data?.ritus?.vedic?.[0]?.name;
                    const ayana = data?.data?.ritus?.vedic?.[0]?.ayana;
                    const zodiac = data?.data?.ritus?.vedic?.[0]?.zodiac;
                    const madhyahna = data?.data?.madhyahna;

                    if (ritu) {
                        document.getElementById("todayRitu").innerText = `${capitalize(ritu)} (${capitalize(ayana)}, ${capitalize(zodiac)}), Madhyahna: ${madhyahna}`;
                    } else {
                        document.getElementById("todayRitu").innerText = "Unavailable";
                    }
                })
                .catch(err => {
                    console.error("Error fetching Ritu:", err);
                    document.getElementById("todayRitu").innerText = "Error";
                });

            function capitalize(str) {
                return str.charAt(0).toUpperCase() + str.slice(1);
            }
        };
        document.addEventListener("DOMContentLoaded", ritu);
    </script>



    <script>
        function sunandmoon() {

            let lat = 28.6139;
            let lon = 77.2090;
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function (position) {
                        lat = position.coords.latitude;
                        lon = position.coords.longitude;

                    },
                    function (error) {
                        console.warn("Geolocation failed, using default location:", error.message);

                    }
                );
            } else {
                console.warn("Geolocation not supported, using default location.");

            }
            const today = new Date();
            const day = today.getDate();
            const month = today.getMonth() + 1;
            const year = today.getFullYear();

            const formData = new FormData();
            formData.append("api_key", "b49e81e874acc04f1141569767b24b79");
            formData.append("day", day);
            formData.append("month", month);
            formData.append("year", year);

            formData.append("lat", lat);
            formData.append("lon", lon);
            formData.append("tzone", "5.5");
            formData.append("lan", selectedLanguage);


            fetch("https://astroapi-2.divineapi.com/indian-api/v1/find-sun-and-moon", {
                method: "POST",
                headers: {
                    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g"
                },
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    const d = data.data;
                    document.getElementById("sunrise").innerText = d.sunrise || "N/A";
                    document.getElementById("sunset").innerText = d.sunset || "N/A";
                    document.getElementById("moonrise").innerText = d.moonrise || "N/A";
                    document.getElementById("moonset").innerText = d.moonset || "N/A";
                    document.getElementById("weekday").innerText = d.weekday || "N/A";
                })
                .catch(err => {
                    console.error("Error fetching sun and moon timings:", err);
                    document.getElementById("sunrise").innerText = "Error";
                    document.getElementById("sunset").innerText = "Error";
                    document.getElementById("moonrise").innerText = "Error";
                    document.getElementById("moonset").innerText = "Error";
                    document.getElementById("weekday").innerText = "Error";
                });
        };

        document.addEventListener("DOMContentLoaded", sunandmoon);

    </script>


    <script>

        function findsamvet() {
            let lat = 28.6139;
            let lon = 77.2090;
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function (position) {
                        lat = position.coords.latitude;
                        lon = position.coords.longitude;

                    },
                    function (error) {
                        console.warn("Geolocation failed, using default location:", error.message);

                    }
                );
            } else {
                console.warn("Geolocation not supported, using default location.");

            }
            const today = new Date();
            const day = today.getDate();
            const month = today.getMonth() + 1;
            const year = today.getFullYear();

            const formData = new FormData();
            formData.append("api_key", "b49e81e874acc04f1141569767b24b79");
            formData.append("day", day );
            formData.append("month", month);
            formData.append("year", year);

            formData.append("lat", lat);
            formData.append("lon", lon);
            formData.append("tzone", "5.5");
            formData.append("lan", selectedLanguage);

            fetch("https://astroapi-2.divineapi.com/indian-api/v1/find-samvat", {
                method: "POST",
                headers: {
                    "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL2RpdmluZWFwaS5jb20vc2lnbnVwIiwiaWF0IjoxNzUwMzExNjA1LCJuYmYiOjE3NTAzMTE2MDUsImp0aSI6InNhM0h4bEVpejBtWDAxdXIiLCJzdWIiOiIzODQ2IiwicHJ2IjoiZTZlNjRiYjBiNjEyNmQ3M2M2Yjk3YWZjM2I0NjRkOTg1ZjQ2YzlkNyJ9.n2_tICXPqQBv8JkIPqQP_J4UzZc_PIsnXX4_W0lRC5g"
                },
                body: formData
            })
                .then(res => res.json())
                .then(data => {
                    if (data.success && data.data) {
                        document.getElementById("vikramSamvat").innerText = data.data.vikram_year + " (" + data.data.vikram_name + ")";
                        document.getElementById("shakaSamvat").innerText = data.data.shaka_year + " (" + data.data.shaka_name + ")";
                    } else {
                        document.getElementById("vikramSamvat").innerText = "Unavailable";
                        document.getElementById("shakaSamvat").innerText = "Unavailable";
                    }
                })
                .catch(err => {
                    console.error("Error fetching Samvat:", err);
                    document.getElementById("vikramSamvat").innerText = "Error";
                    document.getElementById("shakaSamvat").innerText = "Error";
                });
        };

        document.addEventListener("DOMContentLoaded", findsamvet);
    </script> 

    <script>

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function (position) {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;
                    console.log(lat);
                    console.log(lon);
                },
                function (error) {
                    console.warn("Geolocation failed, using default location:", error.message);
                    callAstroAPI(28.6139, 77.2090, "New Delhi"); // fallback
                }
            );
        } else {
            console.warn("Geolocation not supported, using default location.");
            callAstroAPI(28.6139, 77.2090, "New Delhi"); // fallback
        }
    </script>






    <!-- footer -->
    <?php $this->load->view('IncludeUser/CommanFooter'); ?>




</body>

</html>