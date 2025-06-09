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
    <div class="inner-banner position-relative">
        <img src="{{asset('asset/images/blog-banner.jpg')}}" class="d-block w-100" alt="Blogs">
        <div class="carousel-caption">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 text-start">
                        <h1 class="h2 fw-bold mb-3">
                            Blogs
                        </h1>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <section class="blog-sec py-5">
        <div class="container">
            <div class="row g-3">
            @foreach ($blogs as $blog)
                    <div class="col-md-3">
                        <a href="{{route('blog.show', $blog->slug)}} " class="card borderd border-0 bg-white h-100 d-block blog-card text-decoration-none overflow-hidden blog-item">
                            <img src="{{ asset('storage/BlogImages/'. $blog->blog_photo) }}" alt="<?= $blog->meta_title ?>" class="w-100">
                            <div class="card-body p-2">
                                <h2 class="fs-6 mb-1 fw-bold mb-2"><?= $blog->meta_title ?></h2>
                                <p class="mb-2 fs-0">
                                    <?= $blog->meta_description ?>
                                </p>
                                <p class="text-primary fw-bold">
                                    View Details
                                </p>
                            </div>
                        </a>
                    </div>
              @endforeach
            </div>
        </div>
    </section>
    @include('frontend.include.footer')
</body>

</html>
