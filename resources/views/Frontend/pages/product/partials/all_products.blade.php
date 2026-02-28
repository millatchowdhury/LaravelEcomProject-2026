<div class="featured-product">
                        <h1>All Products</h1>
                        <div class="row">

                            @foreach ($products as $product)
                               
                            <div class="col-xl-3">
                                <div class="card" style="margin-bottom: 15px;">
                                    {{-- multiple product images --}}
                                    {{-- @foreach ($product->imagesFunction as $image)
                                    <img src="{{ asset('images/products/'.$image->image) }}" class="card-img-top" alt="">
                                    @endforeach --}}


                                    {{-- single product image  --}}
                                    @php $i = 1;  @endphp
                                    @foreach ($product->imagesFunction as $image)
                                        @if($i>0)
                                            <a href="{{ route('products.show', $product->slug) }}">
                                                <img src="{{ asset('images/products/'.$image->image) }}" class="card-img-top" alt="{{ $product->title }}">
                                            </a>
                                            
                                        @endif
                                        @php $i--; @endphp
                                    @endforeach
                                    <div class="card-body" style="text-align: center">
                                        <h5 class="card-title">
                                            <a href="{{ route('products.show', $product->slug) }}">{{ $product->title }}</a>
                                        </h5>
                                        <p class="card-text">Taka - {{ $product->price }}</p>
                                        <a href="#" class="btn btn-primary">Add to cart</a>
                                    </div>
                                </div>
                            </div>

                           @endforeach 
                        </div>
                    </div>

                    

                    <div class="mt-4 pagination">
                        {{ $products->links() }}
                    </div>