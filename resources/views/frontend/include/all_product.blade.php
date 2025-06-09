 <div id="autoScrollWrapper" class="overflow-auto">
     <div class="d-flex flex-nowrap gap-3" id="autoScrollContent">
         {{-- Your @foreach loop with cards stays exactly as it is --}}
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
                     <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none text-dark">
                         <img src="{{ asset('storage/ProductImages/' . $product->meta_image) }}"
                             alt="{{ $product->product_title }}" class="img-fluid w-100 rounded-3" width="316"
                             height="316">
                         <?php
                         $basePrice = $product->product_price + 2;
                         $modifiedPrice = $basePrice * 2;
                         $finalPrice = $modifiedPrice * 0.5; // 50% discount
                         ?>

                         <div class="d-flex align-items-center justify-content-between bg-primary p-2 rounded-2 mt-2">
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
 </div>
