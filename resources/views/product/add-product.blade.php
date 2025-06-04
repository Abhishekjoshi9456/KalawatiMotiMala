<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product | Moti Mala Maker</title>
    @include ('include.link')
    <meta name="robots" content="noindex, nofollow">

</head>

<body>
    @include ('include.nav')

    <!-- Main Content Area -->
    <main class="main-content">
        <div class="container-fluid">
            <form action="{{ route('insert-product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-2">

                    <!-- Product Title -->
                    <div class="form-group mb-3">
                        <label for="product_title">Product Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="product_title" id="product_title"
                            placeholder="Enter Product Title" value="{{ old('product_title') }}">
                        @error('product_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Product Category -->
                    <div class="form-group mb-3">
                        <label for="category">Product Category <span class="text-danger">*</span>
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </label>
                        <select class="form-select" name="category" id="category">
                            <option value="">Select Category</option>
                            <option value="Moti Mala" {{ old('category') == 'Moti Mala' ? 'selected' : '' }}>Moti Mala
                            </option>
                            <option value="Barati Moti Mala"
                                {{ old('category') == 'Barati Moti Mala' ? 'selected' : '' }}>Barati Moti Mala</option>
                        </select>
                    </div>

                    <!-- Product Details -->
                    <div class="form-group mb-3">
                        <label for="pro_short_des">Product Details <span class="text-danger">*</span></label>
                        <textarea name="pro_short_des" id="pro_short_des" class="form-control" placeholder="Enter Product Details">{{ old('pro_short_des') }}</textarea>
                        @error('pro_short_des')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Product More Details -->
                    <div class="form-group mb-3">
                        <label for="pro_description">Product More Details</label>
                        <textarea name="pro_description" id="pro_description" class="form-control" placeholder="Enter Product Long Description">{{ old('pro_description') }}</textarea>
                    </div>

                    <!-- Product Images -->
                    <div class="form-group mb-3">
                        <label for="pro_imageMulti">Upload Images <span class="text-danger">*</span></label>
                        @if ($errors->has('pro_imageMulti'))
                            <span class="text-danger">{{ $errors->first('pro_imageMulti') }}</span>
                        @endifß
                        <div id="fileInputs">
                            <div class="input-group mb-2">
                                <input type="file" class="form-control" name="pro_imageMulti[]" accept="image/*">
                            </div>
                        </div>

                        <button type="button" id="addFileInput" class="btn btn-success">
                            <i class="fas fa-plus-circle"></i>
                        </button>
                    </div>

                    <!-- Product Video -->
                    <div class="form-group mb-3">
                        <label for="pro_video">Upload Video</label>
                        <input type="file" class="form-control" name="pro_video" id="pro_video" accept="video/*">
                        @error('pro_video')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Meta Keyword -->
                    <div class="form-group mb-3">
                        <label for="meta_keyword">Meta Keyword <span class="text-danger">*</span></label>
                        <textarea name="meta_keyword" id="meta_keyword" class="form-control" placeholder="Enter Meta Keyword">{{ old('meta_keyword') }}</textarea>
                        @error('meta_keyword')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Meta Description -->
                    <div class="form-group mb-3">
                        <label for="meta_description">Meta Description <span class="text-danger">*</span></label>
                        <textarea name="meta_description" id="meta_description" class="form-control" placeholder="Enter Meta Description">{{ old('meta_description') }}</textarea>
                        @error('meta_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Meta Image -->
                    <div class="form-group mb-3">
                        <label for="meta_image">Upload Meta Image <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="meta_image" id="meta_image" accept="image/*">
                        @error('meta_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Product Size -->
                    <div class="form-group mb-3">
                        <label for="product_size">Size <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="product_size" name="product_size"
                            placeholder="Enter Size" value="{{ old('product_size') }}" maxlength="10"
                            oninput="this.value = this.value.replace(/\D/g, '')">
                        @error('product_size')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Product Price -->
                    <div class="form-group mb-3">
                        <label for="product_price">Price <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="product_price" name="product_price"
                            placeholder="Enter Price" value="{{ old('product_price') }}" maxlength="10"
                            oninput="this.value = this.value.replace(/\D/g, '')">
                        @error('product_price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Modal ID -->
                    <div class="form-group mb-3">
                        <label for="modal_id">Modal ID <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="modal_id" name="modal_id"
                            placeholder="Enter Modal ID" value="{{ old('modal_id') }}">
                        @error('modal_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group mb-3 text-end">
                        <button type="submit" class="btn btn-primary" name="insert">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </main>
    @include ('include.footer')
    @include ('include.script')


</body>

</html>
<script>
    $(document).ready(function() {
        $('#pro_description').summernote({
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
<script>
    $(document).ready(function() {
        const maxInputs = 5; // Maximum number of input fields allowed
        let inputCount = 1; // Track the number of input fields

        // Handle the "Add More" button click
        $('#addFileInput').on('click', function() {
            if (inputCount < maxInputs) {
                inputCount++;
                const newInput = `
          <div class="input-group mb-2">
            <input type="file" class="form-control" name="pro_imageMulti[]" accept="image/*" required   >
            <button type="button" class="btn btn-danger remove-btn" ><i class="fas fa-trash-alt"></i></button>
          </div>`;
                $('#fileInputs').append(newInput);
            } else {
                alert('You can upload a maximum of ' + maxInputs + ' files.');
            }
        });

        // Handle the "Remove" button click
        $('#fileInputs').on('click', '.remove-btn', function() {
            $(this).closest('.input-group').remove();
            inputCount--;
        });
    });
</script>
