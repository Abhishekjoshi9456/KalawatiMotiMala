<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog List | Kalawati Moti Mala</title>
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
                            <th colspan="3">Blog List</th>
                            <th colspan="2" class="text-end">
                                <a href="{{ route('add-blogs')}}" class="btn btn-primary"><i class="fas fa-plus me-2"></i> Add
                                    Blog</a>
                            </th>
                        </tr>
                        <tr>
                            <th>S.NO.</th>
                            <th>Image</th>
                            <th scope="col" width="300">Title</th>
                            <th scope="col">Description</th>
                            <th class="text-end" scope="col" width="100">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogData as $index => $blog)

                        <tr>
                            <td>{{ $blogData->firstItem() + $index }}</td>
                            <td><img src="{{ asset('storage/BlogImages/'. $blog->blog_photo)}}" alt="" class="img-fluid bg-white p-2 rounded-3" width="100"></td>
                            <td>{{$blog->meta_title}}</td>
                            <td>{{$blog->meta_description}}</td>
                            <td class="text-end">
                                <div>
                                    <button class="btn btn-link p-0 text-dark" type="button" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="View">
                                        <a href="{{ route('blog.show', $blog->slug) }}"><span class="fas fa-eye"></span></a>
                                    </button>

                                    <button class="btn btn-link p-0 text-dark ms-2" type="button"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                        <a href="{{ route('update-blog', $blog->slug) }}"><span class="fas fa-edit"></span></a>

                                    </button>

                                    <button class="btn btn-link p-0 text-dark ms-2" type="button"
                                        onclick="confirmDelete('{{ route('delete-blog', $blog->slug) }}')"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                        <span class="fas fa-trash-alt"></span>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>

                {{ $blogData->links('pagination::bootstrap-5') }}
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