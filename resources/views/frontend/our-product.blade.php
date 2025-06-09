<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Swagat Moti Mala for Barati - Kalawati Moti Mala</title>
    <meta name="keywords"
        content=" Barati Swagat Moti Mala, Barati Swagat Moti Mala Designs, Moti Mala for Welcome, Swagat Moti Mala for Barati, Welcome Mala for Barati, Moti Mala for Swagat, Milni Mala for Barati Swagat, Swagat Pearl Mala Set">
    <meta name="description"
        content="Welcome to  Kalawati Moti Mala. Make your guests feel special with our Swagat Moti Mala for Barati. Stunning craftsmanship and traditional elegance in every piece.">
    <meta property="og:title" content="Best Swagat Moti Mala for Barati - Kalawati Moti Mala">
    <meta property="og:description"
        content="Welcome to  Kalawati Moti Mala. Make your guests feel special with our Swagat Moti Mala for Barati. Stunning craftsmanship and traditional elegance in every piece.">
    <link rel="canonical" href="https://www.kalawatimotimala.com/our-products">
    @include('frontend.include.link')
</head>

<body class="bg-light">
    @include('frontend.include.header')
    <section class="py-3">
        <div class="container">
            <div class="row g-3 mb-3">
                <div class="col-md-12">
                    <h1 class="fw-bold h3">Barati Swagat Moti Mala</h1>
                </div>
            </div>

            <div class="row g-3 mb-3">

                @foreach ($products as $product)
                    <div class="col-xl-3 col-lg-6 col-sm-6">
                        <div
                            class="product-card card border-0 p-2 bg-white d-block blog-card overflow-hidden position-relative">
                            <div class="d-flex justify-content-between position-absolute top-0 start-0 w-100 p-3">
                                <a href="tel:9026339004" class="btn btn-primary rounded-pill me-2">
                                    <i class="fas fa-phone-alt me-1"></i> Call Us</a>
                                <a href="https://wa.me/9582562695" target="_blank" class="btn btn-success rounded-pill">
                                    <i class="fab fa-whatsapp me-1"></i> WhatsApp
                                </a>
                            </div>
                            <a href="{{ route('product.show', $product->slug) }}"
                                class="text-decoration-none text-dark">
                                <img src="{{ asset('storage/ProductImages/' . $product->meta_image) }}"
                                    alt="{{ $product->product_title }}" class="img-fluid w-100 rounded-3" width="316"
                                    height="316">
                                <?php
                                $basePrice = $product->product_price + 2;
                                $modifiedPrice = $basePrice * 2;
                                $finalPrice = $modifiedPrice * 0.5; // 50% discount
                                ?>

                                <div
                                    class="d-flex align-items-center justify-content-between bg-primary p-2 rounded-2 mt-2">
                                    <span class="text-white fw-bold">
                                        Price: ₹ {{ number_format($finalPrice, 2) }}/- per piece
                                    </span>
                                    <span class="text-white text-decoration-line-through small">
                                        ₹ {{ number_format($modifiedPrice, 2) }}
                                    </span>
                                    <span class="badge bg-danger">50% OFF</span>
                                </div>

                                <div class="card-body p-2">
                                    <h2 class="h6 mb-1 fw-bold mb-2 product-title"></h2>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="btn rounded-pill btn-primary"> View Details</span>
                                        <button type="button" class="btn rounded-pill btn-secondary enquiry"
                                            data-id="{{ $product->product_title }}" data-img="">Enquiry</button>
                                    </div>

                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach

                <p>
                    Welcome to the epitome of traditional elegance with our <b>Barati Swagat Moti Mala</b> collection.
                    Designed to
                    add a touch of sophistication and cultural charm to your special occasions, our malas are perfect
                    for
                    welcoming baratis with grandeur and respect. Each Moti Mala for Welcome is meticulously handcrafted,
                    ensuring the highest quality and attention to detail.
                </p>
                <p>
                    Our <b>Swagat Moti Mala for Barati</b> features intricate designs, combining lustrous pearls with
                    exquisite
                    craftsmanship to create a stunning visual impact. These malas not only serve as beautiful adornments
                    but also as symbols of hospitality and celebration, making them an essential part of any Indian
                    wedding
                    ceremony.
                </p>
                <p>
                    Explore our diverse range of <b>Barati Swagat Moti Mala Designs,</b> each one uniquely crafted to
                    suit
                    different tastes
                    and themes. Whether you are looking for a <b>Welcome Mala for Barati</b> or a <b>Moti Mala for
                        Swagat</b>, our collection offers
                    something for everyone.
                </p>
                <p>
                    For those special moments of unity and bonding, our <b>Milni Mala for Barati Swagat</b> is the
                    perfect
                    choice, symbolizing
                    the coming together of two families. Additionally, our Swagat Pearl Mala Set offers a coordinated
                    and
                    elegant look
                    for your event, ensuring a cohesive and beautiful presentation.
                </p>
                <p>
                    Experience the timeless beauty and cultural significance of our malas, and make your celebrations
                    unforgettable with
                    our handcrafted <b>Barati Swagat Moti Malas.</b>
                </p>
            </div>
        </div>
    </section>
    @include('frontend.include.footer')
    <script>
        function setMinHeightToMax() {
            var cards = document.querySelectorAll('.product-title');
            var maxHeight = 0;

            // Iterate through each card to find the maximum height
            cards.forEach(function(card) {
                var cardHeight = card.clientHeight;
                if (cardHeight > maxHeight) {
                    maxHeight = cardHeight;
                }
            });

            // Set the minimum height of all cards to the maximum height
            cards.forEach(function(card) {
                card.style.minHeight = maxHeight + 'px';
            });
        }

        // Call the function to set min-height after the page has loaded
        window.addEventListener('load', setMinHeightToMax);
    </script>

</body>

</html>
