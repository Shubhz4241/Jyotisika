<style>
        .footer-links {
                color: black;
                text-decoration: none;
        }
</style>

<!-- footer -->
<footer>
        <div class="container-fluid ">
                <div class="row d-flex flex-row justify-content-center align-items-start gap-3 p-3"
                        style="background-color: var(--yellow); ">
                        <!-- Column 1: Social Media -->
                        <div class="col-12 col-md-2 text-center">
                                <img src="<?php echo base_url('assets/images/JyotisikaLogo.png'); ?>" alt="Logo"
                                        style="width: 100px;">
                                <div class="social-media mt-2">
                                        <a href="#"><img src="<?php echo base_url('assets/images/facebook.png'); ?>"
                                                        alt="Facebook" style="width: 30px;"></a>
                                        <a href="#"><img src="<?php echo base_url('assets/images/whatsapp.png'); ?>"
                                                        alt="WhatsApp" style="width: 30px;"></a>
                                        <a href="#"><img src="<?php echo base_url('assets/images/youtube.png'); ?>"
                                                        alt="YouTube" style="width: 30px;"></a>
                                        <a href="#"><img src="<?php echo base_url('assets/images/instagram.png'); ?>"
                                                        alt="Instagram" style="width: 30px;"></a>
                                </div>
                        </div>
                        <!-- Column 2: Astrological Services -->
                        <div class="col-12 col-sm-4 col-md-2 mt-2 mt-md-0">
                                <h5 class="fw-bold">
                                        <?php echo $this->lang->line('Categories') ?: "Categories"; ?>
                                </h5>
                                <?php echo $this->lang->line('Astrological_Description') ?: "Explore our range of astrological services tailored to your needs."; ?>
                        </div>
                        <!-- Column 3: Categories -->
                        <div class="col-12 col-sm-4 col-md-2">
                                <h5 class="fw-bold">
                                        <?php echo $this->lang->line('Categories') ?: "Categories"; ?>
                                </h5>
                                <ul class="list-unstyled">
                                        <!-- <li><a href="#"
                                                        class="footer-links"><?php echo $this->lang->line('Kundli_Birth_Chart') ?: "Kundli/Birth Chart"; ?></a>
                                        </li> -->
                                        <!-- <li><a href="#"
                                                        class="footer-links"><?php echo $this->lang->line('Kundli_Matching') ?: "Kundli Matching"; ?></a>
                                        </li> -->
                                        <li><a href="<?php echo base_url("panchang") ?>"
                                                        class="footer-links"><?php echo $this->lang->line('Panchang') ?: "Panchang"; ?></a>
                                        </li>
                                        <li><a href="<?php echo base_url("todayhoroscope") ?>"
                                                        class="footer-links"><?php echo $this->lang->line('Horoscope') ?: "Horoscope"; ?></a>
                                        </li>
                                        <li><a href="<?php echo base_url("festival") ?>"
                                                        class="footer-links"><?php echo $this->lang->line('Festivals') ?: "Festivals"; ?></a>
                                        </li>
                                        <!-- <li><a href="<?php echo base_url("festival") ?>"
                                                        class="footer-links"><?php echo $this->lang->line('Remedies') ?: "Remedies"; ?></a>
                                        </li> -->
                                </ul>
                        </div>
                        <!-- Column 4: General Links -->
                        <div class="col-12 col-sm-4 col-md-2">
                                <h5 class="fw-bold"><?php echo $this->lang->line('General_Links') ?: "General Links"; ?>
                                </h5>
                                <ul class="list-unstyled">
                                        <li><a href="<?php echo base_url("privacypolicy") ?>" class="footer-links">
                                                        <?php echo $this->lang->line('Privacy_Policy') ?: "Privacy Policy"; ?></a>
                                        </li>


                                        <li><a href="<?php echo base_url("terms") ?>" class="footer-links">
                                                        <?php echo $this->lang->line('term') ?: "Terms And Conditions "; ?></a>
                                        </li>


                                        <li><a href="<?php echo base_url("home") ?>"
                                                        class="footer-links"><?php echo $this->lang->line('Home') ?: "Home"; ?></a>
                                        </li>
                                        <li><a href="<?php echo base_url("astrologers") ?>"
                                                        class="footer-links"><?php echo $this->lang->line('Astrology') ?: "Astrology"; ?></a>
                                        </li>


                                        <li><a href="<?php echo base_url("todayhoroscope") ?>"
                                                        class="footer-links"><?php echo $this->lang->line('Horoscope') ?: "Horoscope"; ?></a>
                                        </li>


                                        <!-- <li><a href="<?php echo base_url("home") ?>" class="footer-links"><?php echo $this->lang->line('Services') ?: "Services"; ?></a>
                    </li>
                    <li><a href="#"
                            class="footer-links"><?php echo $this->lang->line('Compatibility') ?: "Compatibility"; ?></a>
                    </li>
                    <li><a href="#"
                            class="footer-links"><?php echo $this->lang->line('Calculators') ?: "Calculators"; ?></a>
                    </li>
                    <li><a href="#" class="footer-links"><?php echo $this->lang->line('Yantras') ?: "Yantras"; ?></a>
                    </li>
                    <li><a href="#"
                            class="footer-links"><?php echo $this->lang->line('Free_Reports') ?: "Free Reports"; ?></a>
                    </li>
                    <li><a href="#" class="footer-links"><?php echo $this->lang->line('KP') ?: "KP"; ?></a></li> -->
                                </ul>
                        </div>

                        <!-- Column 5: Online Consultations -->
                        <div class="col-12 col-sm-4 col-md-2">
                                <h5 class="fw-bold">Online Consultations</h5>
                                <ul class="list-unstyled" id="footer-services-list">
                                        <!-- JavaScript will populate this -->
                                </ul>
                        </div>
                        <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                        fetch("<?php echo base_url('User_Api_Controller/showservices_limited'); ?>")
                                                .then(response => response.json())
                                                .then(data => {
                                                        const list = document.getElementById("footer-services-list");

                                                        if (data.status === "success") {
                                                                let html = "";

                                                                data.data.forEach(service => {
                                                                        html += `
                                                                        <li>
                                                                          <a href="<?php echo base_url('/astrologers') ?>" class="footer-links">
                                                                            ${service.name}
                                                                          </a>
                                                                        </li>
                                                                      `;
                                                                });

                                                                list.innerHTML = html;
                                                        } else {
                                                                list.innerHTML = "<li>No services found.</li>";
                                                        }
                                                })
                                                .catch(error => {
                                                        console.error("Error fetching services:", error);
                                                        document.getElementById("footer-services-list").innerHTML =
                                                                "<li>Failed to load services.</li>";
                                                });
                                });
                        </script>



                </div>
                <div class="row">
                        <div class="col-12 text-center bg-white p-2">
                                <p class="text-dark">
                                        Design By : <span><img
                                                        src="<?php echo base_url('assets/images/manasviTechSolutionLogo.png'); ?>"
                                                        alt="Manasvi Tech Solution" style="width: 120px;"></span>
                                        This site is designed, hosted and maintained by <a
                                                class="text-dark text-decoration-none"
                                                href="https://manasvi.tech/">Manasvi Tech Solutions Pvt. Ltd.</a>
                                </p>
                        </div>
                </div>
        </div>
</footer>