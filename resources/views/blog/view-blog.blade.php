<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blogdata->meta_title }}</title>
    <meta name="keywords" content=" {{ $blogdata->meta_keyword }}">
    <meta name="description" content="{{ $blogdata->meta_description }}">
    <meta property="og:title" content="{{ $blogdata->meta_title }}">
    <meta property="og:description" name="description" content="{{ $blogdata->meta_description }}">
    <meta property="og:image" content="{{ asset('storage/BlogImages/'.$blogdata->blog_photo) }}">

    @include ('include.link')

    <meta name="robots" content="noindex, nofollow">

</head>

<body>
    @include ('include.nav')

    <!-- Main Content Area -->
    <main class="main-content">
        <div class="slider-item position-relative py-4">
            <div class="container text-start">
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <h1 class="h2 fw-bold mb-3">
                            {{ $blogdata->meta_title }}
                        </h1>
                    </div>
                    <div class="col-md-3">
                        <div class="blog-img-inner">
                            <img src="{{ asset('storage/BlogImages/'. $blogdata->blog_photo) }}" alt="{{ $blogdata->meta_title }}" class="w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="py-5">
            <div class="container">
                <div class="row">

                    <div class="col-md-8">
                        {!! $blogdata->page_description !!}
                    </div>
                    <div class="col-md-4">
                        <div class="bg-light p-3 rounded-3 mt-3">
                            <h2 class="mb-3 h5">Latest Blogs</h2>
                            @foreach($otherblogs as $blog)
                            <a href="{{ route('blog.show', $blog->slug) }}" class="row mb-3 events-card bg-white m-0 text-dark text-decoration-none g-3 py-2">
                                <div class="col-3 mt-0">
                                    <img src="{{ asset('storage/BlogImages/'. $blog->blog_photo) }}" alt="{{ $blog->meta_title }}" class="img-fluid w-100 border border-1 border-dark p-2" style="aspect-ratio: 4/4; object-fit: cover;">
                                </div>
                                <div class="col-9 mt-0">
                                    <h3 class="h6 mb-1 mt-1 fw-semibold">{{ substr($blog->meta_title ?? '', 0, 35) }}</h3>
                                    <p class="mb-1 event-paragraph">
                                        {{ substr($blog->meta_description ?? '', 0, 100) }}
                                    </p>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>

                </div>
        </section>
    </main>
    @include ('include.footer')
    @include ('include.script')


</body>

</html>