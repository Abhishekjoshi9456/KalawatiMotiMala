<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog | Moti Mala Maker</title>
    @include ('include.link')
    <meta name="robots" content="noindex, nofollow">

</head>

<body>
    @include ('include.nav')

    <!-- Main Content Area -->
    <main class="main-content">
        <div class="container-fluid">
            <form action="{{route('insert-blogs')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label class="form-lable mb-2" for="meta_title">Meta Title*</label>
                    <input type="text" class="form-control" name="meta_title" id="meta_title" value="{{old('meta_title')}}">
                    @error('meta_title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-lable mb-2" for="meta_keyword">Meta Keyword*</label>
                    <input type="text" class="form-control" name="meta_keyword" id="meta_keyword" value="{{old('meta_keyword')}}">
                    @error('meta_keyword')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-lable mb-2" for="meta_description">Meta Description*</label>
                    <textarea class="form-control" name="meta_description" id="meta_description" rows="3">{{old('meta_description')}}</textarea>
                    @error('meta_description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-lable mb-2" for="meta_image">Meta Image*</label>
                    <input type="file" class="form-control" name="meta_image" id="meta_image" value="{{old('meta_image')}}">
                    @error('meta_image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-lable mb-2" for="page_description">Description*</label>
                    <textarea class="form-control summernote" name="page_description" id="page_description" rows="3">{{old('page_description')}}</textarea>
                    @error('page_description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </main>
    @include ('include.footer')
    @include ('include.script')


</body>

</html>
<script>
    $(document).ready(function () {
        $('#page_description').summernote({
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>