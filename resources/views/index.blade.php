<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalawati Moti Mala - Admin Dashboard</title>
    @include ('include.link')


</head>

<body>
    @include ('include.nav')

    <!-- Main Content Area -->
    <main class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center my-5">
                <div class="col-md-3">
                    <div class="card p-3">
                        <h2>Blog</h2>
                        <p>Totle : 10</p>
                        <a href="{{ route('blog-list') }}" class="btn btn-primary"> Blog List</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-3">
                        <h2>Product</h2>
                        <p>Totle : 10</p>
                        <a href="{{ route('product-list') }}" class="btn btn-primary">Product List</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-3">
                        <h2>Enquiry</h2>
                        <p>Totle : 10</p>
                        <a href="enquiry-list" class="btn btn-primary"> Enquiry List</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-3">
                        <h2>Invoice</h2>
                        <p>Totle : 10</p>
                        <a href="invoice-list" class="btn btn-primary"> Invoice List</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include ('include.footer')
    @include ('include.script')


</body>

</html>