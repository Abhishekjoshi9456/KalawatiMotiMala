<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Product List | Kalawati Moti Mala</title>
    @include ('include.link')

    <meta name="robots" content="noindex, nofollow">

</head>

<body>
    @include ('include.nav')

    <!-- Main Content Area -->
    <main class="main-content">
        <div class="container-fluid">
            <div class="table-responsive scrollbar">

                <table class="table table-bordered bg-light">
                    <thead>
                        <tr>
                            <th colspan="3">Product List</th>
                            <th colspan="4" class="text-end">
                                <a href="{{ route('add-product')}}" class="btn btn-primary"><i
                                        class="fas fa-plus me-2"></i> Add
                                    Product</a>
                            </th>
                        </tr>
                        <tr>
                            <th>S.NO.</th>
                            <th>Image</th>
                            <th scope="col" width="300">Title</th>
                            <th scope="col" width="80">Price</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th class="text-end" scope="col" width="100">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productData as $index => $product)

                            <tr>
                                <td>{{ $productData->firstItem() + $index }}</td>
                                <td><img src="{{ asset('storage/ProductImages/' . $product->meta_image)}}" alt=""
                                        class="img-fluid bg-white p-2 rounded-3" width="50"></td>
                                <td>{{$product->product_title}}</td>
                                <td>{{ $product->product_price}} Rs.</td>
                                <td>{{$product->meta_description}}</td>
                                <td class="text-center"> <button class="btn btn-link toggle-btn" type="button"
                                        data-id="{{ $product->product_id }}">
                                        <i
                                            class="{{ $product->status == '1' ? "fas fa-toggle-on" : "fas fa-toggle-off" }}"></i>
                                    </button>
                                    <span class="status-text {{ $product->status == '1' ? 'bg-success' : 'bg-danger' }}"
                                        data-id="{{ $product->blog_id }}" style="font-size:11px;">
                                        {{ $product->status == '1' ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <div>
                                        <button class="btn btn-link p-0 text-dark" type="button" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="View">
                                            <a href="{{ route('product.show', $product->slug) }}"><span
                                                    class="fas fa-eye"></span></a>
                                        </button>

                                        <button class="btn btn-link p-0 text-dark ms-2" type="button"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <a href="{{ route('update-product', $product->slug) }}"><span
                                                    class="fas fa-edit"></span></a>

                                        </button>

                                        <button class="btn btn-link p-0 text-dark ms-2" type="button"
                                            onclick="confirmDelete('{{ route('delete-product', $product->product_id) }}')"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                            <span class="fas fa-trash-alt"></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>

                {{ $productData->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </main>
    @include ('include.footer')
    @include ('include.script')


</body>

</html>

<script>
    function confirmDelete(url) {
        if (confirm("Are you sure you want to delete this blog?")) {
            window.location.href = url;
        }
    }
</script>
<script>
    $(document).ready(function () {
        $('.toggle-btn').click(function () {
            const button = $(this);
            const icon = button.find('i');
            const isOn = icon.hasClass('fa-toggle-on');
            const id = button.data('id');

            // Toggle icon visually
            icon.toggleClass('fa-toggle-on fa-toggle-off');

            $.ajax({
                url: '/toggle-status-product',
                type: 'POST',
                data: {
                    id: id,
                    status: isOn ? 0 : 1
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    console.log('Success:', response);
                    location.reload();
                },
                error: function (xhr) {
                    console.error('Error:', xhr);

                    // Revert icon toggle on error
                    icon.toggleClass('fa-toggle-on fa-toggle-off');
                }
            });
        });
    });
</script>
