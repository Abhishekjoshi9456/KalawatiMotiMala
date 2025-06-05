<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products | Moti Mala Maker</title>
    @include ('include.link')
    <meta name="robots" content="noindex, nofollow">
    <style>
        .thumb-nav img {
            border: 2px solid #ddd;
            transition: border-color 0.2s;
        }

        .thumb-nav img:hover,
        .thumb-nav img.active {
            border-color: #007bff;
        }

        .main-img {
            width: 100%;
            border: 1px solid #eee;
        }

        @media (max-width: 768px) {
            .thumb-nav {
                max-width: 100%;
            }

            .thumb-nav img {
                width: 50px;
                height: 50px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css">
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>


</head>

<body>
    @include ('include.nav')

    <!-- Main Content Area -->
    <main class="main-content">
        <div class="container-fluid">
            <div class="inner-banner">
                <div class="container">
                    <!-- <img src="images/about-us.jpg" alt=""> -->
                </div>
            </div>
            <section id="detail" class="py-5">
                <div class="container">
                    <div class="row">
                        <!-- Left: Images -->

                        <div class="col-lg-5">
                            <div class="d-flex flex-lg-row flex-column-reverse">
                                <!-- Main Image Left -->
                                <div class="flex-grow-1 pe-lg-3 pe-0">
                                    <a href="{{ asset('storage/ProductImages/' . $productImage[0]) }}"
                                        data-fancybox="gallery" id="mainImageLink">
                                        <img id="mainImg"
                                            src="{{ asset('storage/ProductImages/' . $productImage[0]) }}"
                                            class="img-fluid rounded main-img"
                                            style="max-height: 400px; object-fit: contain; cursor: zoom-in;">
                                    </a>
                                </div>

                                <!-- Thumbnails Right -->
                                <ul class="list-unstyled d-flex d-lg-block flex-row overflow-auto thumb-nav ps-lg-3 ps-0"
                                    style="max-height: 400px;">
                                    @foreach ($productImage as $index => $image)
                                        <li class="mb-2 me-2">
                                            <img src="{{ asset('storage/ProductImages/' . $image) }}"
                                                class="img-thumbnail thumb-img"
                                                style="width: 60px; height: 60px; object-fit: cover; cursor: pointer;"
                                                onclick="updateMainImage('{{ asset('storage/ProductImages/' . $image) }}')">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Right: Product Info -->
                        <div class="col-lg-7 mt-4 mt-lg-0">
                            <h2 class="fw-bold h4 mb-3">{{ $product->product_title }}</h2>

                            <?php
                            $originalPrice = $product->product_price;
                            $modifiedPrice = ($originalPrice / 3 + 2) * 2;
                            $finalPrice = $modifiedPrice * 0.5;
                            ?>

                            <!-- Price -->
                            <p class="h3 fw-bold text-primary mb-2">₹{{ number_format($finalPrice, 2) }}
                                <span class="fs-6">/- per piece</span>
                            </p>
                            <p class="text-muted fs-5">
                                <del>₹{{ number_format($modifiedPrice, 2) }}</del>
                                <span class="badge bg-danger ms-2">50% OFF</span>
                            </p>

                            <!-- Enquiry -->
                            <button class="btn btn-primary btn-sm mb-3" data-id="{{ $product->product_title }}"
                                data-img="">Enquiry</button>

                            <p class="text-muted">Delivery charges are not included.</p>

                            <!-- Product Table -->
                            <table class="table table-sm table-bordered mt-3">
                                <tr>
                                    <th width="150">Generic Name</th>
                                    <td>Moti Mala</td>
                                </tr>
                                <tr>
                                    <th>Item Size</th>
                                    <td>{{ $product->product_size }} Inch</td>
                                </tr>
                                <tr>
                                    <th>Material</th>
                                    <td>Plastic</td>
                                </tr>
                                <tr>
                                    <th>Occasion</th>
                                    <td>Wedding</td>
                                </tr>
                            </table>

                            <!-- Description -->
                            <h5 class="mt-4"><b>Description</b></h5>
                            <p>{{ $product->pro_short_des }}</p>
                            <p><b>{!! $product->pro_description !!}</b></p>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>
    @include ('include.footer')
    @include ('include.script')


</body>

</html>
<script>
    function initializeThumbnailSlider() {
        // Check window width
        if ($(window).width() > 1200) {
            // Vertical slider for > 1200px
            $('.thumb-nav').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                infinite: true,
                vertical: true, // Vertical mode
                asNavFor: '.main-img-slider',
                dots: false,
                centerMode: false,
                draggable: true,
                touchMove: true,
                speed: 200,
                focusOnSelect: true,
                prevArrow: '<div class="slick-prev"><i class="fas fa-angle-up"></i></div>',
                nextArrow: '<div class="slick-next"><i class="fas fa-angle-down"></i></div>'
            });
        } else {
            // Horizontal slider for <= 1200px
            $('.thumb-nav').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                infinite: true,
                vertical: false, // Horizontal mode
                asNavFor: '.main-img-slider',
                dots: false,
                centerMode: false,
                draggable: true,
                touchMove: true,
                speed: 200,
                focusOnSelect: true,
                prevArrow: '<div class="slick-prev"><i class="fas fa-angle-left"></i></div>',
                nextArrow: '<div class="slick-next"><i class="fas fa-angle-right"></i></div>'
            });
        }
    }

    function initializeMainSlider() {
        // Main/Product image slider
        $('#detail .main-img-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            arrows: true,
            fade: true,
            autoplay: true,
            autoplaySpeed: 4000,
            speed: 300,
            lazyLoad: 'ondemand',
            prevArrow: '<div class="slick-prev"><i class="fas fa-angle-left"></i></div>',
            nextArrow: '<div class="slick-next"><i class="fas fa-angle-right"></i></div>',
            draggable: true,
            touchMove: true
        });
    }

    // Initialize sliders on page load
    $(document).ready(function() {
        initializeMainSlider();
        initializeThumbnailSlider();
    });

    // Reinitialize thumbnail slider on window resize
    $(window).on('resize', function() {
        $('.thumb-nav').slick('unslick'); // Destroy current instance
        initializeThumbnailSlider(); // Reinitialize based on window width
    });
</script>
<script>
    function updateMainImage(imageUrl) {
        const mainImg = document.getElementById('mainImg');
        const mainLink = document.getElementById('mainImageLink');

        mainImg.src = imageUrl;
        mainLink.href = imageUrl;
    }
</script>
