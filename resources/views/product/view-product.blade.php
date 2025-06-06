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
                                    @if ($product->pro_video)
                                        <li class="mb-2 me-2">
                                            <video src="{{ asset('storage/ProductImages/' . $product->pro_video) }}"
                                                class="img-thumbnail thumb-img"
                                                style="width: 60px; height: 60px; object-fit: cover; cursor: pointer;"></video>
                                        </li>

                                    @endif

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
                            <button type="button" class="btn btn-primary btn-sm mb-3 enquiry-btn"
                                data-bs-toggle="modal" data-bs-target="#enquiryModal"
                                data-title="{{ $product->product_title }}"
                                data-img="{{ asset('storage/ProductImages/' . $productImage[0]) }}">
                                Enquiry
                            </button>
                            {{-- open model --}}
                            <div class="modal fade" id="enquiryModal" tabindex="-1" aria-labelledby="enquiryModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="enquiryModalLabel">Product Enquiry</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Product:</strong> <span id="modalProductTitle"></span></p>
                                            <img id="modalProductImage" src="" alt="Product Image"
                                                class="img-fluid mb-2" style="max-height: 200px;">
                                            <form>
                                                <div class="mb-3">
                                                    <input type="hidden" name="product_id" id="product_id"
                                                        value="{{ $product->product_id }}">
                                                    <label for="enquiryName" class="form-label">Your Name</label>
                                                    <input type="text" class="form-control" id="enquiryName"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="enquiryNumber" class="form-label">Your Number</label>
                                                    <input type="text" class="form-control" id="enquiryNumber"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="enquiryEmail" class="form-label">Your Email</label>
                                                    <input type="text" class="form-control" id="enquiryEmail"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="enquiryLocation" class="form-label">Location</label>
                                                    <input type="text" class="form-control" id="enquiryLocation"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="enquiryPinCode" class="form-label">Enter Your
                                                        PinCode</label>
                                                    <input type="text" class="form-control" id="enquiryPinCode"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="enquiryQuentity" class="form-label">Enter Your
                                                        Quentity</label>
                                                    <input type="text" class="form-control" id="enquiryQuentity"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="enquiryMessage" class="form-label">Type Your
                                                        Message</label>
                                                    <textarea class="form-control" id="enquiryMessage" rows="3"></textarea>
                                                </div>
                                                <!-- Add more fields if needed -->
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary btn-sm send-enquiry">Send
                                                Enquiry</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- close model --}}
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

<script>
    $(document).ready(function() {
        $('.send-enquiry').on('click', function() {
            const data = {
                name: $('#enquiryName').val(),
                number: $('#enquiryNumber').val(),
                email: $('#enquiryEmail').val(),
                location: $('#enquiryLocation').val(),
                pincode: $('#enquiryPinCode').val(),
                quentity: $('#enquiryQuentity').val(),
                product_id: $('#product_id').val(),
                message: $('#enquiryMessage').val(),
                _token: '{{ csrf_token() }}'
            };

            $.ajax({
                url: '{{ route('send.enquiry') }}', // Change this to your actual route
                method: 'POST',
                data: data,
                success: function(response) {
                    alert(response);
                    // $('#enquiryForm')[0].reset();
                    // $('#enquiryModal').modal('hide');
                },
                error: function(xhr) {
                    alert("Something went wrong. Please try again.");
                }
            });
        });
    });
</script>
