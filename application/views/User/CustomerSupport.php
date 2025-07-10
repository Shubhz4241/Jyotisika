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

    <main>
        <style>
            /* Custom styles for yellow theme */
            .nav-pills .nav-link.active {
                background-color: var(--yellow) !important;
                color: black !important;
            }

            .accordion-button:not(.collapsed) {
                background-color: var(--yellow) !important;
                color: black !important;
            }

            .accordion-button:focus {
                border-color: #fff7b8 !important;
                box-shadow: 0 0 0 0.25rem rgba(255, 247, 184, 0.25) !important;
            }
        </style>

        <section class="container my-5">
            <!-- Previous FAQ section code remains unchanged -->
            <div class="row">
                <div class="col-md-4 mb-4">
                    <ul class="nav nav-pills flex-column shadow-sm" id="faqTabs" role="tablist">
                        <li class="nav-item " role="presentation">
                            <button class="nav-link text-dark active w-100 text-start" id="general-tab"
                                data-bs-toggle="pill" data-bs-target="#general" type="button" role="tab">
                                <i class="bi bi-question-circle-fill me-2"></i>Account and Profile Issues
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-dark w-100 text-start" id="account-tab" data-bs-toggle="pill"
                                data-bs-target="#account" type="button" role="tab">
                                <i class="bi bi-person-fill me-2"></i>Account Related
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-dark w-100 text-start" id="payment-tab" data-bs-toggle="pill"
                                data-bs-target="#payment" type="button" role="tab">
                                <i class="bi bi-credit-card-fill me-2"></i>Payment Issues
                            </button>
                        </li>
                    </ul>
                </div>

                <div class="col-md-8">
                    <div class="tab-content" id="faqContent">
                        <!-- General Questions -->
                        <div class="tab-pane fade show active" id="general" role="tabpanel">
                            <div class="accordion" id="generalAccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" data-bs-toggle="collapse"
                                            data-bs-target="#general1">
                                            How do I get started with Jyotisika?
                                        </button>
                                    </h2>
                                    <div id="general1" class="accordion-collapse collapse show"
                                        data-bs-parent="#generalAccordion">
                                        <div class="accordion-body">
                                            To get started with Jyotisika, simply create an account and explore our
                                            services. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint
                                            eligendi fugiat, aperiam odit quam illo quos aut consequatur tempore
                                            assumenda.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#general2">
                                            What services does Jyotisika offer?
                                        </button>
                                    </h2>
                                    <div id="general2" class="accordion-collapse collapse"
                                        data-bs-parent="#generalAccordion">
                                        <div class="accordion-body">
                                            Jyotisika offers astrological consultations, horoscope readings, and
                                            spiritual guidance services. Lorem ipsum dolor sit, amet consectetur
                                            adipisicing elit. Ab inventore cum rerum magni nam, deleniti adipisci
                                            excepturi! Impedit molestiae labore, facere expedita earum similique quos
                                            quia qui vero error repudiandae?
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#general3">
                                            How can I contact customer support?
                                        </button>
                                    </h2>
                                    <div id="general3" class="accordion-collapse collapse"
                                        data-bs-parent="#generalAccordion">
                                        <div class="accordion-body">
                                            You can reach our customer support team through email, phone, or the contact
                                            form on our website.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Account Related -->
                        <div class="tab-pane fade" id="account" role="tabpanel">
                            <div class="accordion" id="accountAccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" data-bs-toggle="collapse"
                                            data-bs-target="#account1">
                                            How do I reset my password?
                                        </button>
                                    </h2>
                                    <div id="account1" class="accordion-collapse collapse show"
                                        data-bs-parent="#accountAccordion">
                                        <div class="accordion-body">
                                            Click on "Forgot Password" on the login page and follow the instructions
                                            sent to your email. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Quis veritatis tempore temporibus adipisci nobis vel quasi perferendis
                                            aliquid consectetur quod!
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#account2">
                                            How can I update my profile information?
                                        </button>
                                    </h2>
                                    <div id="account2" class="accordion-collapse collapse"
                                        data-bs-parent="#accountAccordion">
                                        <div class="accordion-body">
                                            Log into your account, go to Profile Settings, and click on Edit Profile to
                                            update your information. Lorem ipsum dolor, sit amet consectetur adipisicing
                                            elit. Illum, ratione.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#account3">
                                            Can I delete my account?
                                        </button>
                                    </h2>
                                    <div id="account3" class="accordion-collapse collapse"
                                        data-bs-parent="#accountAccordion">
                                        <div class="accordion-body">
                                            Yes, you can delete your account from the Profile Settings page. Please note
                                            this action is irreversible.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Issues -->
                        <div class="tab-pane fade" id="payment" role="tabpanel">
                            <div class="accordion" id="paymentAccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" data-bs-toggle="collapse"
                                            data-bs-target="#payment1">
                                            What payment methods do you accept?
                                        </button>
                                    </h2>
                                    <div id="payment1" class="accordion-collapse collapse show"
                                        data-bs-parent="#paymentAccordion">
                                        <div class="accordion-body">
                                            We accept all major credit cards, debit cards, UPI, and net banking. Lorem
                                            ipsum dolor sit amet consectetur adipisicing elit. Unde autem dolore numquam
                                            repellendus voluptatibus magnam tenetur veritatis facilis rem saepe.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#payment2">
                                            How do I request a refund?
                                        </button>
                                    </h2>
                                    <div id="payment2" class="accordion-collapse collapse"
                                        data-bs-parent="#paymentAccordion">
                                        <div class="accordion-body">
                                            Contact our support team within 7 days of your purchase to initiate a refund
                                            request. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae,
                                            ut.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                            data-bs-target="#payment3">
                                            Is my payment information secure?
                                        </button>
                                    </h2>
                                    <div id="payment3" class="accordion-collapse collapse"
                                        data-bs-parent="#paymentAccordion">
                                        <div class="accordion-body">
                                            Yes, we use industry-standard encryption to protect all payment information.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12 text-center">
                    <div class="p-4  rounded-3 shadow-sm">
                        <h4 class="mb-3">Still have questions?</h4>
                        <p class="mb-3">We're here to help! If your query isn't listed above, feel free to reach out to
                            us.</p>
                        <a href="#" class="btn btn-warning btn-sm px-4" data-bs-toggle="modal"
                            data-bs-target="#contactModal">
                            <i class="bi bi-envelope-fill me-2"></i>Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <!-- Contact Us Modal -->
    <!-- Contact Modal -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="<?php echo base_url('User/send_email') ?>"
                class="modal-content needs-validation" novalidate style="position: relative;">

                <!-- Loader Overlay -->
                <div id="loader-overlay"
                    style="display: none; position: absolute; top: 0; left: 0; right: 0; bottom: 0;
                        background: rgba(255, 255, 255, 0.8); z-index: 10; justify-content: center; align-items: center;">
                    <div class="spinner-border text-warning" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">Contact Us</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="contactName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="contactName" name="contact_name" required
                            pattern="[A-Za-z\s]+" title="Only letters and spaces allowed" placeholder="Enter your name">
                        <div class="invalid-feedback">Please enter a valid name (letters only).</div>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="contactEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="contactEmail" name="contact_email" required
                            placeholder="Enter your email">
                        <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>

                    <!-- Message -->
                    <div class="mb-3">
                        <label for="contactMessage" class="form-label">Message</label>
                        <textarea class="form-control" id="contactMessage" name="contact_message" rows="4" required
                            placeholder="Enter Message"></textarea>
                        <div class="invalid-feedback">Please enter your message.</div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn" style="background-color: var(--yellow);">Send</button>
                </div>
            </form>

            <!-- Full-Page Loader Overlay -->
            <div id="full-page-loader" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(255, 255, 255, 0.7); z-index: 9999; justify-content: center; align-items: center;">
                <div class="spinner-border text-warning" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

        </div>
    </div>



    <!-- SweetAlert2 Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
</script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  
    <script>
        <?php if ($this->session->flashdata('success')): ?>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?= $this->session->flashdata('success') ?>',
            });
        <?php elseif ($this->session->flashdata('error')): ?>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?= $this->session->flashdata('error') ?>',
            });
        <?php endif; ?>
    </script>




    <footer>
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>


    <!-- Add this script for Bootstrap validation -->
  


</body>

</html>