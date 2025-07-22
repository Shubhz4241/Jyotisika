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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- EXTERNAL CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        .carousel-inner img {
            height: 400px;
            object-fit: cover;
        }

        .collection-circle {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid var(--yellow, #ffc107);
            /* fallback to Bootstrap yellow if variable missing */
            margin: 0 auto;
        }

        /* best seller card */
        .best-seller-card {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            background: #fff;
            transition: transform 0.2s;
            height: 100%;
        }



        .discount-badge {
            position: absolute;
            top: 0;
            left: 0;
            background-color: #b41f1f;
            color: white;
            padding: 4px 10px;
            font-size: 0.75rem;
            border-bottom-right-radius: 8px;
            z-index: 1;
        }

        .best-seller-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
        }

        .product-content {
            padding: 12px 15px;
            text-align: left;
        }

        .product-title {
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 6px;
        }

        .product-rating {
            color: #e60023;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .product-rating i {
            color: #f9b500;
        }

        .product-price {
            margin-top: 6px;
        }

        .product-price .current-price {
            font-size: 1.2rem;
            font-weight: 600;
            color: #000;
        }

        .product-price .original-price {
            text-decoration: line-through;
            color: #888;
            font-size: 0.9rem;
            margin-left: 6px;
        }

        /* image gallery */
        .gallery-grid img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .gallery-grid img:hover {
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .gallery-grid .col-12 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }

        /* reviw */
        .review-card {
            background: #fff;
            border-radius: 10px;

            overflow: hidden;
            text-align: center;
            padding-bottom: 20px;
            transition: transform 0.3s;
            height: 100%;
        }



        .review-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .review-stars {
            color: #e60023;
            font-size: 1.2rem;
            margin: 15px 0 5px;
        }

        .review-name {
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 1rem;
        }

        .review-title {
            font-weight: 600;
            font-size: 0.95rem;
            margin-bottom: 5px;
        }

        .review-text {
            font-size: 0.9rem;
            color: #444;
            padding: 0 15px;
        }

        /* carousel */
        /* slider code  */
        .owl-nav .owl-prev,
        .owl-nav .owl-next {
            pointer-events: auto;
            background-color: yellow;
            border: 2px solid var(--red);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--red);
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .owl-nav .owl-prev:hover,
        .owl-nav .owl-next:hover {
            background-color: yellow;
            color: var(--yellow) !important;
        }

        .owl-nav .owl-prev {
            margin-left: 10px;
        }

        .owl-nav .owl-next {
            margin-right: 10px;
        }

        .owl-carousel .item {
            margin: 15px;
        }
    </style>
</head>

<body>
    <header>
        <!-- Navbar -->
        <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    </header>

    <main>
        <?php $this->load->view('IncludeUser/CommanSubnav'); ?>

        <!-- Banner Carousel -->
        <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b" class="d-block w-100"
                        alt="Banner 1">
                </div>
                <div class="carousel-item">
                    <img src="<?php echo base_url('assets/images/JyotisikaMall/productbanner1.jpg'); ?>"
                        class="d-block w-100" alt="Banner 2">
                </div>

            </div>
            <!-- <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button> -->
        </div>

        <?php print_r($getcategory_data)?>
        <div class="container">

            <!-- Collections Section -->
            <?php if (empty(!$getcategory_data)): ?>
                <section class="py-5 text-center mt-2">
                    <div class="container">
                        <h2 class="mb-4"><?php echo $this->lang->line('shop_our_collections'); ?></h2>
                        <div class="owl-carousel collection-carousel owl-theme">
                            <?php
                            // Array of collection items with title, image path, and link
                            $collections = [
                                ['title' => 'Rudraksh', 'image' => 'productbanner1.JPG', 'link' => 'products/rudraksh'],
                                ['title' => 'Yantra', 'image' => 'productbanner1.JPG', 'link' => 'products/yantra'],
                                ['title' => 'Gemstones', 'image' => 'productbanner1.JPG', 'link' => 'products/gemstones'],
                                ['title' => 'Pooja Items', 'image' => 'productbanner1.JPG', 'link' => 'products/pooja-items'],
                                ['title' => 'Spiritual Books', 'image' => 'productbanner1.JPG', 'link' => 'products/spiritual-books'],
                            ]; ?>

                            <?php if (empty(!$getcategory_data)): ?>
                                <?php foreach ($getcategory_data as $item): ?>
                                    <div class="item">
                                        <a href="<?php echo base_url('cardcategoryfilter/' . $item['category']); ?>"
                                            style="text-decoration: none; color: inherit;">
                                            <img src="<?php echo base_url('uploads/products/' . $item["product_image"]); ?>"
                                                class="img-fluid collection-circle">
                                         <p class="mt-2"><strong><?php echo ucwords($item['category']); ?></strong></p>


                                        </a>
                                    </div>

                                <?php endforeach; ?>
                            <?php endif ?>
                        </div>
                    </div>
                </section>
            <?php endif ?>



            <!-- Best Sellers Carousel -->
            <section class="">
                <div class="container">
                    <?php if ((empty(!$productdata))): ?>
                        <h2 class="text-center mb-4"><?php echo $this->lang->line('best_sellers'); ?></h2>
                    <?php endif ?>
                    <div class="owl-carousel owl-theme">
                        <?php
                        if (empty($bestSellers)) {
                            $bestSellers = [
                                (object) [
                                    'discount' => 'Up to 40% off',
                                    'img' => base_url('assets/images/JyotisikaMall/product6.png'),
                                    'title' => 'Gold Plated Modern Rudraksha Bracelet',
                                    'rating' => 4.5,
                                    'reviews' => 2156,
                                    'current_price' => 599,
                                    'original_price' => 999,
                                    'slug' => 'rudraksha-bracelet'
                                ],
                                (object) [
                                    'discount' => 'Up to 30% off',
                                    'img' => base_url('assets/images/JyotisikaMall/product7.png'),
                                    'title' => 'Spiritual Yantra Pendant',
                                    'rating' => 4,
                                    'reviews' => 1520,
                                    'current_price' => 699,
                                    'original_price' => 999,
                                    'slug' => 'yantra-pendant'
                                ],
                                (object) [
                                    'discount' => 'Up to 25% off',
                                    'img' => base_url('assets/images/JyotisikaMall/product8.png'),
                                    'title' => 'Natural Gemstone Mala',
                                    'rating' => 4.2,
                                    'reviews' => 980,
                                    'current_price' => 899,
                                    'original_price' => 1199,
                                    'slug' => 'gemstone-mala'
                                ],
                                (object) [
                                    'discount' => 'Up to 35% off',
                                    'img' => base_url('assets/images/JyotisikaMall/product9.png'),
                                    'title' => 'Premium Pooja Thali Set',
                                    'rating' => 4.8,
                                    'reviews' => 3200,
                                    'current_price' => 1299,
                                    'original_price' => 1999,
                                    'slug' => 'pooja-thali'
                                ],
                                (object) [
                                    'discount' => 'Up to 20% off',
                                    'img' => base_url('assets/images/JyotisikaMall/product10.png'),
                                    'title' => 'Handcrafted Brass Diya',
                                    'rating' => 4.0,
                                    'reviews' => 750,
                                    'current_price' => 499,
                                    'original_price' => 699,
                                    'slug' => 'brass-diya'
                                ]
                            ];
                        }

                        if (!empty($productdata)):
                            foreach ($productdata as $product):
                                ?>
                                <div class="item">
                                    <a href="<?php echo base_url("ProductDetails/" . $product["product_id"]); ?>"
                                        style="text-decoration: none; color: inherit;">
                                        <div class="best-seller-card h-100">
                                            <?php

                                            if ($product['product_price'] > 0) {
                                                $discount = round((($product['product_price'] - $product['discount_price']) / $product['product_price']) * 100);
                                            } else {
                                                $discount = 0;
                                            }
                                            ?>

                                            <div class="discount-badge">
                                                <i class="bi bi-heart-fill me-1"></i><?php echo $discount . "% Off"; ?>
                                            </div>



                                            <img src="<?php echo base_url('uploads/products/' . $product["product_image"]); ?>"
                                                class="best-seller-img" alt="Product"
                                                onerror="this.onerror=null;this.src='<?php echo base_url('uploads/festivals/diva.jpg'); ?>';">
                                            <div class="product-content">
                                                <div class="product-title"><?php echo $product["product_name"]; ?></div>
                                                <div class="product-rating">
                                                    <span>
                                                        <?php
                                                        $rating = isset($product["average_rating"]) && is_numeric($product["average_rating"]) ? floatval($product["average_rating"]) : 0;
                                                        $fullStars = floor($rating);
                                                        $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;
                                                        for ($i = 0; $i < $fullStars; $i++) {
                                                            echo '<i class="bi bi-star-fill"></i>';
                                                        }
                                                        if ($halfStar) {
                                                            echo '<i class="bi bi-star-half"></i>';
                                                        }
                                                        for ($i = $fullStars + $halfStar; $i < 5; $i++) {
                                                            echo '<i class="bi bi-star"></i>';
                                                        }
                                                        ?>
                                                    </span>
                                                    <span>(<?php echo $product["total_reviews"]; ?>)</span>
                                                </div>
                                                <div class="product-price">
                                                    <span class="current-price">₹
                                                        <?php echo $product["discount_price"]; ?><sup>00</sup></span>
                                                    <span class="original-price">₹
                                                        <?php echo $product["product_price"]; ?><sup>00</sup></span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </section>


            <!-- <?php print_r($energy_stone) ?> -->

            <!-- Energy Stones-->




            <?php if (empty(!$energy_stone)): ?>
                <section class="py-3">
                    <div class="container">
                        <h2 class="text-center mb-4"><?php echo $this->lang->line('energy_stones'); ?></h2>
                        <div class="owl-carousel owl-theme">
                            <?php
                            $energyStones = [
                                [
                                    'slug' => 'rudraksha-bracelet',
                                    'discount' => 'Up to 40% off',
                                    'img' => base_url('assets/images/JyotisikaMall/stone1.png'),
                                    'title' => 'Gold Plated Modern Rudraksha Bracelet',
                                    'rating' => 4.5,
                                    'reviews' => 2156,
                                    'current_price' => 599,
                                    'original_price' => 999
                                ],
                                [
                                    'slug' => 'yantra-pendant-1',
                                    'discount' => 'Up to 30% off',
                                    'img' => base_url('assets/images/JyotisikaMall/stone2.png'),
                                    'title' => 'Spiritual Yantra Pendant',
                                    'rating' => 4,
                                    'reviews' => 1520,
                                    'current_price' => 699,
                                    'original_price' => 999
                                ],
                                // ... Add more with different slugs
                                [
                                    'slug' => 'stone-3',
                                    'discount' => 'Up to 30% off',
                                    'img' => base_url('assets/images/JyotisikaMall/stone3.png'),
                                    'title' => 'Spiritual Yantra Pendant',
                                    'rating' => 4,
                                    'reviews' => 1520,
                                    'current_price' => 699,
                                    'original_price' => 999
                                ],
                                [
                                    'slug' => 'stone-4',
                                    'discount' => 'Up to 30% off',
                                    'img' => base_url('assets/images/JyotisikaMall/stone4.png'),
                                    'title' => 'Spiritual Yantra Pendant',
                                    'rating' => 4,
                                    'reviews' => 1520,
                                    'current_price' => 699,
                                    'original_price' => 999
                                ],
                                // Repeat for rest with unique slugs
                            ]; ?>

                            <!-- <?php print_r($energy_stone) ?> -->


                            <?php if (empty(!$energy_stone)): ?>

                                <?php foreach ($energy_stone as $stone): ?>
                                    <div class="item">
                                        <a href="<?php echo base_url('ProductDetails/' . $stone["product_id"]); ?>"
                                            style="text-decoration: none; color: inherit;">
                                            <div class="best-seller-card">
                                                <div class="discount-badge">
                                                    <i class="bi bi-heart-fill me-1"></i>
                                                    <?php
                                                    $original = (float) $stone['product_price'];
                                                    $discount = (float) $stone['discount_price'];
                                                    if ($original > 0 && $discount < $original) {
                                                        $percent = round((($original - $discount) / $original) * 100);
                                                        echo $percent . "% off";
                                                    } else {
                                                        echo "No discount";
                                                    }
                                                    ?>
                                                </div>



                                                <img src="<?php echo base_url('uploads/products/' . $stone["product_image"]); ?>"
                                                    class="best-seller-img" alt="Product"
                                                    onerror="this.onerror=null;this.src='<?php echo base_url('uploads/festivals/diva.jpg'); ?>';">
                                                <div class="product-content">
                                                    <div class="product-title"><?php echo $stone['product_name']; ?></div>
                                                    <div class="product-rating">
                                                        <span>
                                                            <?php
                                                            $rating = isset($stone["average_rating"]) && is_numeric($stone["average_rating"]) ? floatval($stone["average_rating"]) : 0;
                                                            $fullStars = floor($rating);
                                                            $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;
                                                            for ($i = 0; $i < $fullStars; $i++) {
                                                                echo '<i class="bi bi-star-fill"></i>';
                                                            }
                                                            if ($halfStar) {
                                                                echo '<i class="bi bi-star-half"></i>';
                                                            }
                                                            for ($i = $fullStars + $halfStar; $i < 5; $i++) {
                                                                echo '<i class="bi bi-star"></i>';
                                                            }
                                                            ?>
                                                        </span>
                                                        <!-- <span>(<?php echo 2; ?>)</span> -->
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="current-price">₹
                                                            <?php echo $stone['discount_price']; ?><sup>00</sup></span>
                                                        <span class="original-price">₹
                                                            <?php echo $stone['product_price']; ?><sup>00</sup></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>There is no product with energy stones category</p>
                            <?php endif ?>
                        </div>
                    </div>
                </section>
            <?php endif ?>




            <!-- Gallery -->
            <div class="row">
                <h2 class="text-center mb-4"><?php echo $this->lang->line('gallery'); ?></h2>
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <img src="<?php echo base_url('assets/images/JyotisikaMall/product9.png'); ?>"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />

                    <img src="<?php echo base_url('assets/images/JyotisikaMall/image2.png'); ?>"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Wintry Mountain Landscape" />
                    <img src="<?php echo base_url('assets/images/JyotisikaMall/product9.png') ?>"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Yosemite National Park" />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img src="<?php echo base_url('assets/images/JyotisikaMall/image1.png'); ?>"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Mountains in the Clouds" />

                    <img src="<?php echo base_url('assets/images/JyotisikaMall/image3.png') ?>"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img src="<?php echo base_url('assets/images/JyotisikaMall/image4.png') ?>"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Waves at Sea" />

                    <img src="<?php echo base_url('assets/images/JyotisikaMall/product9.png') ?>"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Yosemite National Park" />
                </div>
            </div>



            <!-- Customer Reviews -->
            <section class="py-5">
                <div class="container">
                    <?php if (empty(!$product_feedback)): ?>
                        <h2 class="text-center mb-4"><?php echo $this->lang->line('customer_reviews'); ?></h2>
                    <?php endif ?>
                    <div class="owl-carousel owl-theme">
                        <?php
                        // Demo data for $customerReviews if not set or empty
                        if (empty($customerReviews)) {
                            $customerReviews = [
                                (object) [
                                    'image' => base_url('assets/images/JyotisikaMall/review.png'),
                                    'stars' => 5,
                                    'name' => 'Dvs Raju',
                                    'title' => 'Very Nice',
                                    'text' => 'Excellent Karungali mala and bracelet... I am happy. Good packing and fast delivery...'
                                ],
                                (object) [
                                    'image' => base_url('assets/images/JyotisikaMall/review2.png'),
                                    'stars' => 5,
                                    'name' => 'Meena S.',
                                    'title' => 'Powerful Rudraksh',
                                    'text' => 'Loved the Rudraksh. It gives positive energy. Also arrived well packed.'
                                ],
                                (object) [
                                    'image' => base_url('assets/images/JyotisikaMall/review2.png'),
                                    'stars' => 5,
                                    'name' => 'Meena S.',
                                    'title' => 'Powerful Rudraksh',
                                    'text' => 'Loved the Rudraksh. It gives positive energy. Also arrived well packed.'
                                ],
                                (object) [
                                    'image' => base_url('assets/images/JyotisikaMall/review2.png'),
                                    'stars' => 5,
                                    'name' => 'Meena S.',
                                    'title' => 'Powerful Rudraksh',
                                    'text' => 'Loved the Rudraksh. It gives positive energy. Also arrived well packed.'
                                ],
                                (object) [
                                    'image' => base_url('assets/images/JyotisikaMall/review3.png'),
                                    'stars' => 5,
                                    'name' => 'Ramesh K.',
                                    'title' => 'Perfect for Gifting',
                                    'text' => 'Beautiful idols and mala. Looks divine. Excellent delivery and service.'
                                ]
                            ];
                        } ?>

                        <?php if (empty(!$product_feedback)): ?>
                            <?php foreach ($product_feedback as $review): ?>
                                <div class="item">
                                    <div class="review-card">



                                        <img src="<?php echo base_url($review["product_feedback_image"]) ?>"
                                            class="review-image"
                                            alt="Customer <?php echo htmlspecialchars($review["message"]); ?>">
                                        <div class="review-stars">
                                            <?php
                                            for ($i = 0; $i < $review["productrating"]; $i++) {
                                                echo '★';
                                            }
                                            for ($i = $review["productrating"]; $i < 5; $i++) {
                                                echo '☆';
                                            }
                                            ?>
                                        </div>
                                        <div class="review-name"><?php echo htmlspecialchars($review["user_name"]); ?></div>
                                        <div class="review-title"><?php echo htmlspecialchars($review["product_name"]); ?></div>
                                        <div class="review-text">
                                            <?php echo htmlspecialchars($review["message"]); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        <?php else: ?>

                        <?php endif ?>
                    </div>
                </div>
            </section>

        </div>
    </main>

    <footer>
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>

    <script>
        $(document).ready(function () {


            // For collection section only
            $('.collection-carousel').owlCarousel({
                loop: true,
                margin: 15,
                nav: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 4
                    },
                    1000: {
                        items: 6
                    }
                }
            });
        });

        $(document).ready(function () {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                dots: false,
                navText: [
                    "<i class='bi bi-chevron-left' style='font-size: 2rem; color: var(--red);'></i>",
                    "<i class='bi bi-chevron-right' style='font-size: 2rem; color: var(--red);'></i>"
                ],
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 2,
                        nav: false
                    },
                    800: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 4,
                        nav: true,
                        loop: false
                    }
                }
            });

            function positionNavButtons() {
                if ($(window).width() < 768) {
                    // For mobile screens, position buttons below
                    $('.owl-nav').css({
                        'position': 'relative',
                        'width': '100%',
                        'margin-top': '20px',
                        'display': 'flex',
                        'justify-content': 'center',
                        'gap': '20px'
                    });

                    $('.owl-prev, .owl-next').css({
                        'position': 'relative',
                        'left': 'auto',
                        'right': 'auto'
                    });
                } else {
                    // For larger screens, position buttons on sides
                    $('.owl-nav').css({
                        'position': 'absolute',
                        'top': '50%',
                        'width': '100%',
                        'transform': 'translateY(-50%)',
                        'margin-top': '0'
                    });

                    $('.owl-prev').css({
                        'position': 'absolute',
                        'left': '-40px'
                    });

                    $('.owl-next').css({
                        'position': 'absolute',
                        'right': '-40px'
                    });
                }
            }

            // Initial positioning
            positionNavButtons();

            // Reposition on window resize
            $(window).resize(function () {
                positionNavButtons();
            });

            // Prevent hover color change
            $('.owl-nav button').hover(function () {
                $(this).css('background', 'transparent');
            });


        });
    </script>

</body>

</html>