
        @foreach($products_found->chunk(4) as $productChunk)
            <div class="row">
                @foreach($productChunk as $product_found)
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div class="card bg-transparent h-100 productCard">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <a href="{{ route('getSingleProduct', $product_found->id) }}">{{ $product_found->title }}</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <a href="#"><img class="card-img-top" src="{{ asset($product_found->thumbnail) }}" alt=""></a>
                                <p class="card-text">{{ $product_found->short_description }}</p>
                            </div>
                            <div class="card-footer">
                                <a>{{ number_format($product_found->price, 0, ',', "'") }}.-</a>
                                <a href="{{ route('addToCart', $product_found->id) }}" class="btn btn-primary pull-right" role="button">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

