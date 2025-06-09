<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalawati Moti Mala Blog - Insights on Barati Swagat Moti Malas and More</title>
    <meta name="keywords"
        content=" Kalawati Moti Mala Blog, Barati Swagat Moti Mala Insights, Moti Mala Trends, Moti Mala Tips, Swagat Moti Mala Blog, Wedding Mala Advice, Traditional Mala Designs, Cultural Mala Trends, Pearl Mala Blog, Celebration Tips, Delhi Moti Mala Blog">
    <meta name="description"
        content="Explore the Kalawati Moti Mala Blog for the latest insights, trends, and tips on Barati Swagat Moti Malas. Stay updated with expert advice and beautiful designs for all your celebratory needs.">
    <meta property="og:title" content="Kalawati Moti Mala Blog - Insights on Barati Swagat Moti Malas and More">
    <meta property="og:description" name="description"
        content="Explore the Kalawati Moti Mala Blog for the latest insights, trends, and tips on Barati Swagat Moti Malas. Stay updated with expert advice and beautiful designs for all your celebratory needs.">
    <link rel="canonical" href="https://www.kalawatimotimala.com/our-blog">
    @include('frontend.include.link')
    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                "@type": "ListItem",
                "position": 5,
                "name": "Blog",
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
                <h1 class="h6 mb-0 text-white">Mala for Barati</h1>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"
                            class="text-white text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Mala for Barati</li>
                </ol>
            </nav>
        </div>
    </div>
    <section class="py-5">
        <div class="container">
            <div class="row g-3 mb-3">
                <div class="col-md-12">
                    <h2 class="fw-bold">Barati welcome mala: Enhancing the Swagatam Ceremony </h2>
                    <p>
                        The Indian weddings have an important significance of <b>welcome mala for Barati</b>, <b>Swagat
                            mala</b> or <b>barati mala</b>.
                        It plays a crucial role as they used to welcome the guests or Baratis that are the groom’s
                        party.
                        These malas are not just the ornamental pieces that are made with pearls and beads but a symbol
                        of respect.
                        <b>Swagat mala</b> also known as <a href="moti-mala"
                            class="fw-bold text-primary text-decoration-none">moti mala</a> holds a very special place
                        in the auspicious ceremony in the Indian wedding
                        culture which is known as Barati Swagat or welcome ceremony.
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
            <h2 class="fw-bold h4">Milni Haar: Welcome Mala for Baratis </h2>
            <p>
                As the Indian wedding culture and traditions are so much diverse and vibrant,
                keeping this in mind the <b>Swagat mala</b> makers focuses on variety of <b>moti mala designs</b>.
                Talking about the bride’s side in the Indian marriage culture, they want to make every
                single gesture worth by giving respect and honour to the groom’s side, for this people often
                search <b>latest moti mala designs</b>. The reason why welcome malas are also known as <b>milni haar</b>
                also has a cultural significance as these malas lays the foundation of a forever meeting or
                bond. In hindi, Milan means to meet and keeping that in mind the craftsmen also gave it this
                auspicious name milni mala or <b>milni haar</b>.
            </p>
            <h3 class="fw-bold">The Use of Swagat mala: A Forever Custom </h3>
            <p>
                The value of <b>moti mala</b> always remains growing and glowing in the Indian wedding tradition. Beyond
                the aesthetic appeal of these malas, they are also a symbol of purity, grace, honour and respect towards
                your guests and loved ones. It signifies the way of how you welcome your guests with open heart and lays
                the foundation of new relations. It also marks the beginning of new family bonds and makes the welcome
                ceremony memorable. Choosing the perfect set of moti malas that goes well with your preferences is
                important as it is not just an accessory but a way to cherish our Indian wedding customs and beliefs.
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
