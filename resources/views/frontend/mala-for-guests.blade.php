<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Guests Welcome Mala | Shop Swagat Milni Mala Online</title>
    <meta name="keywords" content="welcome mala for guests, swagat mala, guests mala, milni mala, milni haar">
    <meta name="description"
        content="Are you looking for the best Welcome Mala for Guests in India? Explore our exclusive collection of Swagat Milni Mala online—handcrafted, elegant, and customizable.">
    <meta property="og:title" content="Buy Guests Welcome Mala | Shop Swagat Milni Mala Online">
    <meta property="og:description"
        content="Are you looking for the best Welcome Mala for Guests in India? Explore our exclusive collection of Swagat Milni Mala online—handcrafted, elegant, and customizable.">
    <link rel="canonical" href="https://www.kalawatimotimala.com/mala-for-guests" />
    @include('frontend.include.link')
    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                "@type": "ListItem",
                "position": 3,
                "name": "Product",
                "item": "https://www.kalawatimotimala.com/mala-for-guests"
            }]
        }
    </script>
</head>

<body class="bg-light">
    @include('frontend.include.header')
    <div class="inner-breadcrumb bg-primary py-2">
        <div class="container">
            <nav class="d-flex flex-wrap align-items-center gap-2 justify-content-between breadcrumb-sec"
                style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <h1 class="h6 mb-0 text-white">Mala for Guests</h1>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"
                            class="text-white text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Mala for Guests</li>
                </ol>
            </nav>
        </div>
    </div>
    <section class="py-5">
        <div class="container">
            <div class="row g-3 mb-3">
                <div class="col-md-12">
                    <h2 class="fw-bold">Welcome Mala for Guests: An Elegant Way to Elevate the Swagatam Cerem </h2>
                    <p>
                        In Indian weddings, welcoming mala for guests, also referred to as Swagat mala or guests mala,
                        is a significant tradition. From the moment the groom's procession arrives, mala play an
                        important role in welcoming the guests as one of the initially summarized cultural customs.
                        These gorgeous welcome accessories of pearls and beads are not just a ceremonial component, each
                        swagat mala is an extension of hospitality and respect. While they are often referred to as moti
                        mala, they are a beautiful garland with cultural importance as part of the Swagat or welcome
                        custom of Indian weddings.
                    </p>
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
            </div>
            <h2 class="fw-bold h4">Milni Haar: An Honorable Welcome For Guests</h2>
            <p>
                The Indian wedding customs are extravagant and meaningful; the same can be said about the Swagat malas
                made in the same extravagance. The bride family is seeking ceremonial elegance to ostentatiously fulfil
                their hosting duties, while looking for proper moti mala designs to exclusively commend the groom folk.
                Although they act in a ceremonial capacity, garlands of moti also carry the emotions of welcome and
                respect. "Milni" means "to meet"; therefore, the milni mala symbolize the joining of two families as
                one.
            </p>
            <h3 class="fw-bold">The Continuance of the Use of Swagat mala</h3>
            <p>
                The allure of the moti mala continues to spread across generations of Indian weddings. More than a
                decorative object, the malas connote respectability, sincerity, elegance, and an honorable welcome of
                guests. To garland with a welcome mala symbolizes customs and the merged identity of the families.
                Choosing the right mala is not about design; it is about customs, ceremonials, and stating mateship.
            </p>
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
