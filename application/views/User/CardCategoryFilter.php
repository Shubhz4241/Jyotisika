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
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=stylesheet">

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
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css") ?>">

    <style>
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

        /* New Energy Stones Layout Styles */
        .filter-sidebar {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .filter-section h6 {
            color: #333;
            font-size: 1.1rem;
        }

        .filter-options .form-check-label {
            font-size: 0.9rem;
            color: #666;
        }

        .filter-options .form-check-input:checked {
            background-color: var(--yellow);
            border-color: var(--yellow);
        }

        .price-range input[type="number"] {
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .range-slider {
            position: relative;
            margin: 10px 0;
        }

        .range-slider input[type="range"] {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 5px;
            background: none;
            pointer-events: none;
        }

        .range-slider input[type="range"]::-webkit-slider-thumb {
            pointer-events: auto;
            height: 20px;
            width: 20px;
            border-radius: 50%;
            background: var(--yellow);
            border: 2px solid #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .range-slider input[type="range"]::-moz-range-thumb {
            pointer-events: auto;
            height: 20px;
            width: 20px;
            border-radius: 50%;
            background: var(--yellow);
            border: 2px solid #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* Product Card Styles */
        .product-card {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-image-container {
            position: relative;
            overflow: hidden;
        }

        .product-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .product-card:hover .product-image {
            transform: scale(1.05);
        }

        .discount-badge-new {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #dc3545;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
            z-index: 1;
        }

        .product-content {
            padding: 15px;
        }

        .product-title {
            font-size: 0.9rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            line-height: 1.4;
            height: 2.8rem;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .product-rating {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 8px;
        }

        .product-rating .stars {
            display: flex;
            gap: 2px;
        }

        .product-rating .stars i {
            font-size: 0.8rem;
        }

        .product-rating .review-count {
            color: #666;
            font-size: 0.8rem;
        }

        .product-price {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .product-price .current-price {
            font-size: 1.1rem;
            font-weight: 700;
            color: #000;
        }

        .product-price .original-price {
            text-decoration: line-through;
            color: #999;
            font-size: 0.9rem;
        }

        /* View Toggle Buttons */
        .btn-outline-secondary.active {
            background-color: var(--yellow);
            border-color: var(--yellow);
            color: white;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .product-card {
                margin-bottom: 20px;
            }

            .filter-sidebar {
                background: none;
                padding: 10px;
            }

            .product-title {
                font-size: 0.85rem;
                height: auto;
            }

            .product-image {
                height: 200px;
            }
        }

        /* Offcanvas Styles */
        .offcanvas-body {
            padding: 20px;
        }

        .offcanvas-body .form-check-input:checked {
            background-color: var(--yellow);
            border-color: var(--yellow);
        }

        .offcanvas-body .btn-primary {
            background-color: var(--yellow);
            border-color: var(--yellow);
        }

        .offcanvas-body .btn-primary:hover {
            background-color: var(--yellow);
            border-color: var(--yellow);
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
    </style>
</head>

<body>
    <header>
        <!-- Navbar -->
        <?php $this->load->view('IncludeUser/CommanNavbar'); ?>
    </header>

    <!-- <?php print_r($product_data); ?> -->

    <main>
        <!-- Energy Stones-->
        <section class="py-3">
            <div class="container-fluid">
                <!-- Page Header -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="text-center">
                            <h1 class="display-6 fw-bold mb-2"><?php echo $this->lang->line('energy_stones');?></h1>
                            <p class="text-muted mb-0">(<?php echo $product__count_data ?> products)</p>
                            <p class="small text-muted"><?php echo $this->lang->line('semi');?></p>
                        </div>
                    </div>
                </div>

                <!-- Filter Toggle for Mobile -->
                <div class="row mb-3 d-lg-none">
                    <div class="col-6">
                        <button class="btn btn-outline-secondary btn-sm w-100" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#filterOffcanvas">
                            <i class="bi bi-funnel me-2"></i>Filter
                        </button>
                    </div>
                    <div class="col-6">
                        <select class="form-select form-select-sm">
                            <option value="bestSelling">Best selling</option>
                            <option value="priceLowHigh">Price: Low to High</option>
                            <option value="priceHighLow">Price: High to Low</option>
                            <option value="newest">Newest</option>
                        </select>
                    </div>
                </div>

                <!-- Desktop Filter Header -->
                <div class="row mb-3 d-none d-lg-flex">
                    <div class="col-3">
                        <button class="btn btn-outline-secondary btn-sm" type="button">
                            <i class="bi bi-funnel me-2"></i>Filter
                        </button>
                    </div>
                    <div class="col-9">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <select class="form-select form-select-sm d-inline-block" style="width: auto;">
                                    <option value="bestSelling">Sort by: Best selling</option>
                                    <option value="priceLowHigh">Price: Low to High</option>
                                    <option value="priceHighLow">Price: High to Low</option>
                                    <option value="newest">Newest</option>
                                </select>
                            </div>
                            <div>
                                <span class="me-2">View as:</span>
                                <button class="btn btn-sm btn-outline-secondary active" id="gridView">
                                    <i class="bi bi-grid"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-secondary" id="listView">
                                    <i class="bi bi-list"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Desktop Filter Sidebar -->
                    <div class="col-lg-3 d-none d-lg-block">
                        <div class="filter-sidebar">
                            <!-- Purpose Filter -->

                            <div class="filter-section mb-4">
                                <h6 class="fw-bold mb-3">Purpose</h6>

                                <div class="filter-options">
                                    <?php if (!empty($product_purpose) && is_array($product_purpose)): ?>
                                        <?php foreach ($product_purpose as $purpose => $count): ?>
                                            <?php
                                            $safePurpose = strtolower(trim($purpose)); // ID-safe value
                                            $label = ucfirst($safePurpose);            // Label for UI
                                            ?>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" value="<?= $safePurpose ?>"
                                                    id="<?= $safePurpose ?>">
                                                <label class="form-check-label" for="<?= $safePurpose ?>">
                                                    <?= $label ?> <span class="text-muted">(<?= $count ?>)</span>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>

                                    <?php endif ?>

                                    <?php ?>
                                </div>

                               <?php if (!empty($product_purpose) && is_array($product_purpose)): ?>
                                    <?php if (count($product_purpose) > 6): ?>
                                        <button class="btn btn-sm btn-link p-0 text-decoration-none" id="showMoreBtn">Show
                                            more</button>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>

                            <!-- Price Filter -->
                            <div class="filter-section mb-4">
                                <h6 class="fw-bold mb-3">Price</h6>
                                <div class="price-range">
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <input type="number" class="form-control form-control-sm" placeholder="₹ 0"
                                                value="0" id="priceMin">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control form-control-sm"
                                                placeholder="₹ 999" value="999" id="priceMax">
                                        </div>
                                    </div>
                                    <div class="range-slider">
                                        <input type="range" class="form-range" min="0" max="999" value="0"
                                            id="priceRangeMin">
                                        <input type="range" class="form-range" min="0" max="999" value="999"
                                            id="priceRangeMax">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Grid -->
                    <div class="col-lg-9">
                        <div class="row" id="productGrid">
                            <?php
                            $energyStones = [
                                [
                                    'discount' => '40% off',
                                    'img' => base_url('assets/images/JyotisikaMall/stone1.png'),
                                    'title' => 'Money Magnet Fusion Band - Pyrite, Tiger Eye, Citrine & Aventurine (8mm)',
                                    'rating' => 4.7,
                                    'reviews' => 241,
                                    'current_price' => 699,
                                    'original_price' => 1299,
                                    'purposes' => ['wealth', 'protection'],
                                    'created_at' => '2025-01-01'
                                ],
                                [
                                    'discount' => '40% off',
                                    'img' => base_url('assets/images/JyotisikaMall/stone2.png'),
                                    'title' => 'Pyrite Wealth Band',
                                    'rating' => 4.9,
                                    'reviews' => 17,
                                    'current_price' => 699,
                                    'original_price' => 1299,
                                    'purposes' => ['wealth'],
                                    'created_at' => '2025-02-01'
                                ],
                                [
                                    'discount' => '31% off',
                                    'img' => base_url('assets/images/JyotisikaMall/stone3.png'),
                                    'title' => 'Pyrite x Seven Chakra Band',
                                    'rating' => 4.8,
                                    'reviews' => 84,
                                    'current_price' => 899,
                                    'original_price' => 1299,
                                    'purposes' => ['wealth', 'balance'],
                                    'created_at' => '2025-03-01'
                                ],
                                [
                                    'discount' => '38% off',
                                    'img' => base_url('assets/images/JyotisikaMall/stone4.png'),
                                    'title' => 'Multi-Stone Healing Bracelet',
                                    'rating' => 4.6,
                                    'reviews' => 152,
                                    'current_price' => 799,
                                    'original_price' => 1299,
                                    'purposes' => ['peace', 'balance'],
                                    'created_at' => '2025-04-01'
                                ],
                                [
                                    'discount' => '54% off',
                                    'img' => base_url('assets/images/JyotisikaMall/stone5.png'),
                                    'title' => 'Tiger Eye Protection Band',
                                    'rating' => 4.8,
                                    'reviews' => 203,
                                    'current_price' => 599,
                                    'original_price' => 1299,
                                    'purposes' => ['protection', 'courage'],
                                    'created_at' => '2025-05-01'
                                ],
                                [
                                    'discount' => '42% off',
                                    'img' => base_url('assets/images/JyotisikaMall/stone6.png'),
                                    'title' => 'Citrine Abundance Bracelet',
                                    'rating' => 4.7,
                                    'reviews' => 95,
                                    'current_price' => 749,
                                    'original_price' => 1299,
                                    'purposes' => ['wealth'],
                                    'created_at' => '2025-06-01'
                                ],
                                [
                                    'discount' => '35% off',
                                    'img' => base_url('assets/images/JyotisikaMall/stone7.png'),
                                    'title' => 'Aventurine Luck Band',
                                    'rating' => 4.5,
                                    'reviews' => 128,
                                    'current_price' => 849,
                                    'original_price' => 1299,
                                    'purposes' => ['wealth', 'peace'],
                                    'created_at' => '2025-07-01'
                                ],
                                [
                                    'discount' => '48% off',
                                    'img' => base_url('assets/images/JyotisikaMall/stone8.png'),
                                    'title' => 'Chakra Balancing Bracelet',
                                    'rating' => 4.9,
                                    'reviews' => 312,
                                    'current_price' => 679,
                                    'original_price' => 1299,
                                    'purposes' => ['balance'],
                                    'created_at' => '2025-08-01'
                                ],
                                [
                                    'discount' => '44% off',
                                    'img' => base_url('assets/images/JyotisikaMall/stone9.png'),
                                    'title' => 'Healing Crystal Fusion Band',
                                    'rating' => 4.6,
                                    'reviews' => 87,
                                    'current_price' => 729,
                                    'original_price' => 1299,
                                    'purposes' => ['peace', 'balance'],
                                    'created_at' => '2025-09-01'
                                ]
                            ]; ?>

                            <!-- <?php print_r($product_data) ?> -->
                            <?php if (empty(!$product_data)): ?>

                                <?php foreach ($product_data as $stone): ?>



                                    <div class="col-lg-4 col-md-6 col-12 mb-4 product-item"
                                        data-purposes="<?php echo implode(',', $stone['purposes']); ?>"
                                        data-price="<?php echo $stone['discount_price']; ?>" data-rating="<?php echo 2 ?>"
                                        data-created-at="<?php echo $stone['created_at']; ?>">
                                        <a href=<?php echo base_url("ProductDetails/" . $stone["product_id"]) ?>
                                            class="text-decoration-none">
                                            <div class="product-card h-100">

                                                <div class="product-image-container">
                                                    <?php
                                                    $original = (float) $stone['product_price'];
                                                    $discounted = (float) $stone['discount_price'];
                                                    $discountPercent = 0;

                                                    if ($original > 0 && $discounted < $original) {
                                                        $discountPercent = round((($original - $discounted) / $original) * 100);
                                                    }
                                                    ?>
                                                    <span
                                                        class="discount-badge-new"><?php echo $discountPercent . "% off"; ?></span>

                                                    <img src="<?php echo base_url('uploads/products/' . $stone["product_image"]); ?>"
                                                        class="product-image" alt="<?php echo $stone['product_name']; ?>"
                                                        onerror="this.onerror=null;this.src='<?php echo base_url('uploads/festivals/diva.jpg'); ?>';">




                                                </div>
                                                <div class="product-content">
                                                    <h6 class="product-title"><?php echo $stone['product_name']; ?></h6>
                                                    <div class="product-rating">
                                                        <div class="stars">
                                                            <?php

                                                           
                                                             $rating = isset($stone["average_rating"]) && is_numeric($stone["average_rating"]) ? floatval($stone["average_rating"]) : 0;
                                                            $fullStars = floor($rating);
                                                            $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;
                                                            for ($i = 0; $i < $fullStars; $i++) {
                                                                echo '<i class="bi bi-star-fill text-warning"></i>';
                                                            }
                                                            if ($halfStar) {
                                                                echo '<i class="bi bi-star-half text-warning"></i>';
                                                            }
                                                            for ($i = $fullStars + $halfStar; $i < 5; $i++) {
                                                                echo '<i class="bi bi-star text-warning"></i>';
                                                            }
                                                            ?>
                                                        </div>
                                                        <!-- <span
                                                            class="review-count">(<?php echo $stone["total_reviews"]; ?>)</span> -->
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
                                <p>There is no product with this Category</p>

                            <?php endif ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mobile Filter Offcanvas -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="filterOffcanvas"
            aria-labelledby="filterOffcanvasLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="filterOffcanvasLabel">Filter & Sort</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <!-- Sort Options -->
                <div class="mb-4">
                    <h6 class="fw-bold mb-3">Sort by</h6>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="sort" id="bestSelling" value="bestSelling"
                            checked>
                        <label class="form-check-label" for="bestSelling">Best Selling</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="sort" id="priceLowHigh" value="priceLowHigh">
                        <label class="form-check-label" for="priceLowHigh">Price: Low to High</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="sort" id="priceHighLow" value="priceHighLow">
                        <label class="form-check-label" for="priceHighLow">Price: High to Low</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="sort" id="newest" value="newest">
                        <label class="form-check-label" for="newest">Newest</label>
                    </div>
                </div>

                <!-- Purpose Filter -->
                <div class="mb-4">
                    <h6 class="fw-bold mb-3">Purpossse</h6>
                    <?php if (empty(!$product_purpose)): ?>
                        <?php foreach ($product_purpose as $purpose => $count): ?>
                            <?php
                            $safePurpose = strtolower(trim($purpose));
                            $label = ucfirst($safePurpose);
                            ?>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="<?= $safePurpose ?>"
                                    id="<?= $safePurpose ?>Mobile">
                                <label class="form-check-label" for="<?= $safePurpose ?>Mobile">
                                    <?= $label ?> <span class="text-muted">(<?= $count ?>)</span>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    <?php endif ?>
                </div>

                <!-- Price Filter -->
                <div class="mb-4">
                    <h6 class="fw-bold mb-3">Price</h6>
                    <div class="row mb-2">
                        <div class="col-6">
                            <input type="number" class="form-control form-control-sm" placeholder="₹ 0" value="0"
                                id="priceMinMobile">
                        </div>
                        <div class="col-6">
                            <input type="number" class="form-control form-control-sm" placeholder="₹ 999" value="999"
                                id="priceMaxMobile">
                        </div>
                    </div>
                    <div class="range-slider">
                        <input type="range" class="form-range" min="0" max="999" value="0" id="priceRangeMinMobile">
                        <input type="range" class="form-range" min="0" max="999" value="999" id="priceRangeMaxMobile">
                    </div>
                </div>

                <!-- Apply Filters Button -->
                <!-- <button class="btn btn-primary w-100" data-bs-dismiss="offcanvas">Apply Filters</button> -->
            </div>
        </div>
    </main>

    <footer>
        <?php $this->load->view('IncludeUser/CommanFooter'); ?>
    </footer>

    <script>
        $(document).ready(function () {
            // Debounce function to limit rapid filter updates
            function debounce(func, wait) {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            }

            // Grid/List View Toggle
            $('#gridView, #listView').on('click', function () {
                $('#gridView, #listView').removeClass('active');
                $(this).addClass('active');

                if ($(this).attr('id') === 'listView') {
                    $('.product-item').removeClass('col-lg-4 col-md-6').addClass('col-12');
                    $('.product-card').addClass('d-flex');
                    $('.product-image-container').addClass('flex-shrink-0').css('width', '200px');
                    $('.product-content').addClass('flex-grow-1');
                } else {
                    $('.product-item').removeClass('col-12').addClass('col-lg-4 col-md-6');
                    $('.product-card').removeClass('d-flex');
                    $('.product-image-container').removeClass('flex-shrink-0').css('width', '100%');
                    $('.product-content').removeClass('flex-grow-1');
                }
            });

            // Sync filter values between desktop and mobile
            function syncFilters() {
                // Sync purpose checkboxes
                $('.filter-options input[type="checkbox"]').each(function () {
                    const value = $(this).val();
                    const isChecked = $(this).prop('checked');
                    $(`#${value}Mobile`).prop('checked', isChecked);
                });

                // Sync mobile to desktop
                $('.offcanvas-body input[type="checkbox"]').each(function () {
                    const value = $(this).val();
                    const isChecked = $(this).prop('checked');
                    $(`#${value}`).prop('checked', isChecked);
                });

                // Sync price inputs
                const minPrice = $('#priceMin').val();
                const maxPrice = $('#priceMax').val();
                $('#priceMinMobile').val(minPrice);
                $('#priceMaxMobile').val(maxPrice);
                $('#priceRangeMin').val(minPrice);
                $('#priceRangeMax').val(maxPrice);
                $('#priceRangeMinMobile').val(minPrice);
                $('#priceRangeMaxMobile').val(maxPrice);
            }

            // Price Range Slider
            function updatePriceRange(isMobile = false) {
                const prefix = isMobile ? 'Mobile' : '';
                const $minInput = $(`#priceRangeMin${prefix}`);
                const $maxInput = $(`#priceRangeMax${prefix}`);
                let minVal = parseInt($minInput.val()) || 0;
                let maxVal = parseInt($maxInput.val()) || 999;

                if (minVal > maxVal) {
                    minVal = maxVal;
                    $minInput.val(minVal);
                }

                $(`#priceMin${prefix}`).val(minVal);
                $(`#priceMax${prefix}`).val(maxVal);
                syncFilters();
                applyFilters();
            }

            $('#priceRangeMin, #priceRangeMax').on('input', () => updatePriceRange());
            $('#priceRangeMinMobile, #priceRangeMaxMobile').on('input', () => updatePriceRange(true));
            $('#priceMin, #priceMax, #priceMinMobile, #priceMaxMobile').on('change', function () {
                const isMobile = this.id.includes('Mobile');
                const prefix = isMobile ? 'Mobile' : '';
                const minVal = parseInt($(`#priceMin${prefix}`).val()) || 0;
                const maxVal = parseInt($(`#priceMax${prefix}`).val()) || 999;
                $(`#priceRangeMin${prefix}`).val(minVal);
                $(`#priceRangeMax${prefix}`).val(maxVal);
                syncFilters();
                applyFilters();
            });

            // Filter functionality
            const applyFilters = debounce(function () {
                const selectedPurposes = [];
                const minPrice = parseInt($('#priceMin').val()) || 0;
                const maxPrice = parseInt($('#priceMax').val()) || 999;

                // Get selected purposes
                $('.filter-options input[type="checkbox"]:checked, .offcanvas-body input[type="checkbox"]:checked').each(function () {
                    const purpose = $(this).val();
                    if (!selectedPurposes.includes(purpose)) {
                        selectedPurposes.push(purpose);
                    }
                });

                $('.product-item').each(function () {
                    const $item = $(this);
                    const productPrice = parseInt($item.data('price'));
                    const productPurposes = $item.data('purposes').split(',');

                    let show = true;

                    // Price filter
                    if (productPrice < minPrice || productPrice > maxPrice) {
                        show = false;
                    }

                    // Purpose filter
                    if (selectedPurposes.length > 0) {
                        const hasMatchingPurpose = selectedPurposes.some(purpose => productPurposes.includes(purpose));
                        if (!hasMatchingPurpose) {
                            show = false;
                        }
                    }

                    $item.toggle(show);
                });
            }, 300);

            // Apply filters on checkbox change
            $('.filter-options input[type="checkbox"], .offcanvas-body input[type="checkbox"]').on('change', function () {
                syncFilters();
                applyFilters();
            });

            // Sort functionality
            function sortProducts(sortBy) {
                const $products = $('.product-item').get();
                const $container = $('#productGrid');

                $products.sort((a, b) => {
                    const aPrice = parseInt($(a).data('price'));
                    const bPrice = parseInt($(b).data('price'));
                    const aRating = parseFloat($(a).data('rating'));
                    const bRating = parseFloat($(b).data('rating'));
                    const aDate = new Date($(a).data('created-at'));
                    const bDate = new Date($(b).data('created-at'));

                    switch (sortBy) {
                        case 'priceLowHigh':
                            return aPrice - bPrice;
                        case 'priceHighLow':
                            return bPrice - aPrice;
                        case 'newest':
                            return bDate - aDate;
                        case 'bestSelling':
                        default:
                            return bRating - aRating;
                    }
                });

                $container.empty().append($products);
                applyFilters();
            }

            // Sort dropdown change
            $('select').on('change', function () {
                sortProducts($(this).val());
            });

            // Mobile sort radio change
            $('input[name="sort"]').on('change', function () {
                sortProducts($(this).val());
            });

            // Initialize filters
            syncFilters();
            applyFilters();
        });
    </script>
</body>

</html>