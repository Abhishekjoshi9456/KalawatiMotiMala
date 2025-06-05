<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products | Moti Mala Maker</title>
    @include ('include.link')
    <meta name="robots" content="noindex, nofollow">

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
                    <div class="row align-items-start">
                        <div class="col-xl-7 col-lg-6">
                            <!-- Product Images & Alternates -->
                            <div class="product-images demo-gallery d-flex">
                                <!-- Begin Product Images Slider -->
                                <!-- <img src="Upload_img_vdo/{{ $product->product_img }}" class="img-fluid w-100 rounded-3"> -->
                                <div class="main-img-slider rounded-3">
                                    <a data-fancybox="gallery"
                                        href="">
                                        <img src=""
                                            class="img-fluid w-100 rounded-3">
                                    </a>
                                </div>
                                <ul class="thumb-nav mt-0">

                                    <li><img src=""
                                            class="w-100 img-fluid"></li>
                                </ul>
                                <!-- End product thumb nav -->
                            </div>
                            <!-- End Product Images & Alternates -->
                        </div>

                        <div class="col-xl-5 col-lg-6">
                            <h2 class="fw-bold h4">{{ $product->roduct_title }}</h2>
                            <?php
                            $originalPrice = $product->product_price;
                            $modifiedPrice = ($originalPrice / 3 + 2) * 2;
                            $finalPrice = $modifiedPrice * 0.5; // 50% discount
                            ?>

                            <p class="fw-bold h2 d-flex align-items-center gap-3">
                                <!-- Discounted Price -->
                                <span class="text-primary fw-bold d-flex align-items-center">
                                    <sup class="fs-6">₹</sup>{{number_format($finalPrice, 2) }}
                                    <span class="fs-6">/- per piece</span>
                                </span>

                                <!-- Original Modified Price with line-through -->
                                <span class="text-muted text-decoration-line-through fs-5">
                                    ₹{{ number_format($modifiedPrice, 2) }}
                                </span>

                                <!-- Discount Badge -->
                                <span class="badge bg-danger fs-6">50% OFF</span>
                            </p>

                            <!-- <p>M.R.P. <strike class="">₹</?php echo $ViewData['product_price'] ?></strike></p> -->
                            <button type="button" class="btn btn-sm btn-primary enquiry mb-2"
                                data-id="{{ $product->product_title }}"
                                data-img="">Enquiry</button>
                            <p>Delivery charges are not included.</p>
                            <hr>
                            <!-- <p class="fw-bold">Offers</p>
                    </?php
                    $discounts = [
                        ["label" => "Upto 100 piece", "discount" => 10, "quantity" => 100],
                        ["label" => "Upto 500 piece", "discount" => 20, "quantity" => 500],
                        ["label" => "Upto 1000 piece", "discount" => 50, "quantity" => 1000],
                    ];
                    ?>

                    <div class="row g-3">
                        </?php foreach ($discounts as $discount):
                            // Calculate price for a single piece after discount
                            $singleDiscountedPrice = $ViewData['product_price'] - ($ViewData['product_price'] * $discount['discount'] / 100);
                            // Calculate total price for the specified quantity
                            $totalPrice = $singleDiscountedPrice * $discount['quantity'];
                        ?>
                            <div class="col-xl col-lg-6 col-md-4">
                                <div class="card p-3">
                                    <b></?php echo $discount['label']; ?></b>
                                    <p class="mb-0">
                                        </?php echo $discount['discount']; ?>% Discount<br>
                                        Price per piece: <span class="text-primary fw-bold">₹</span><br>
                            </p>
                                </div>
                            </div>
                        </?php endforeach; ?>
                    </div> -->

                            <!-- <hr> -->

                            <p class="mt-3"><b>Product details</b></p>
                            <table class="table table-bordered">
                                <tr>
                                    <th width="200">Generic Name</th>
                                    <td>Moti Mala </td>
                                </tr>
                                <tr>
                                    <th>Item Size</th>
                                    <td>{{ $product->product_size }} Inch</td>
                                </tr>

                                <tr>
                                    <th>Material type</th>
                                    <td>Plastic</td>
                                </tr>
                                <tr>

                                <tr>
                                    <th>Occasion type</th>
                                    <td>Wedding</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-12 mt-3">
                            <h2 class="h5"><b>Description</b></h2>
                            <p>{{ $product->pro_short_des }} </p>
                            <p><b> {{ $product->pro_description }} </b></p>

                            <!-- <iframe src="https://www.shiprocket.in/dtdc-courier-rate-calculator/" width="100%" height="600px" frameborder="0" style="border: none;"></iframe> -->

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
