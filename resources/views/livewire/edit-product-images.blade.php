<div class="row g-2" id="existingImagesWrapper">
    @foreach ($productImage as $index => $image)
        <div class="col-4 col-sm-3 col-md-2 position-relative image-box" wire:key="img-{{ $index }}">
            <input type="hidden" name="proimageMulti[]" value="{{ $image }}">

            <div class="border rounded-3 p-1 position-relative">
                <img src="{{ asset('storage/ProductImages/' . $image) }}"
                    alt="Product Image" class="img-fluid rounded"
                    style="aspect-ratio: 1; object-fit: cover; width: 100%;">

                <button type="button"
                        class="btn btn-sm btn-danger rounded-circle position-absolute top-0 end-0 translate-middle"
                        wire:click="removeImage({{ $index }})"
                        style="z-index: 2; width: 1.5rem; height: 1.5rem; line-height: 1rem; padding: 0;">
                    &times;
                </button>
            </div>
        </div>
    @endforeach
</div>
