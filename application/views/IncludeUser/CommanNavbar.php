 <!-- NAVBAR -->
 <nav class="navbar navbar-expand-lg bg-body-tertiary px-md-2" style="background-color: var(--yellow) !important;">
     <div class="container-fluid">
         <a class="navbar-brand" href="#">
             <img src="<?php echo base_url('assets/images/logo.png'); ?>" alt="logo image" style="width: 60px; height: 50px;">
         </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="<?php echo base_url('home'); ?>">Home</a>
                 </li>
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                         Horoscope
                     </a>
                     <ul class="dropdown-menu dropdown-menu-end rounded-3" aria-labelledby="navbarDropdown">
                         <li><a class="dropdown-item" href="<?php echo base_url('todayhoroscope'); ?>"">Today Horoscope</a></li>
                         <li><a class="dropdown-item" href="#">Daily Horoscope</a></li>
                         <li><a class="dropdown-item" href="#">Weekly Horoscope</a></li>
                         <li><a class="dropdown-item" href="#">Monthly Horoscope</a></li>
                     </ul>
                 </li>

                
                 <li class="nav-item">
                     <a class="nav-link text-black" href="#">Astrology</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link text-black" href="#">Pujari</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link text-black" href="#">Why Us</a>
                 </li>
             </ul>

             <div class="d-flex gap-2">
                 <div class="position-relative">
                     <i class="bi bi-translate position-absolute" style="top: 50%; left: 10px; transform: translateY(-50%);"></i>
                     <select class="form-select shadow-none" aria-label="Default select example" style="width: 150px; padding-left: 30px;">
                         <option selected>English</option>
                         <option value="1">Marathi</option>
                         <option value="2">Hindi</option>
                         <option value="3">Tamil</option>
                     </select>
                 </div>

                 <button type="button" class="btn btn-primary border-0" style="background-color: var(--red);">
                    <a href="<?php echo base_url('LoginSignup'); ?>" style="text-decoration: none; color: white;">Login</a>
                 </button>
             </div>
         </div>
     </div>
 </nav>