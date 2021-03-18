        
        <div class="col-md-3 product-men women_two my-3">
            <div class="product-googles-info googles">
                <div class="men-pro-item">
                    <div class="men-thumb-item">
                        <img src="{{ asset("assets/images/$product->name/" . $product->image) }}" class="img-fluid" alt="" />
                        <div class="men-cart-pro">
                            <div class="inner-men-cart-pro">
                                <a href="{{ route('home.products.show', ['product' => $product->id]) }}" class="link-product-add-cart">View</a>
                            </div>
                        </div>
                        {{-- <span class="product-new-top">New</span> --}}
                    </div>
                    <div class="item-info-product">
                        <div class="info-product-price">
                            <div class="grid_meta">
                                <div class="product_price">
                                    <h4>
                                        <a href="{{ route('home.products.show', ['product' => $product->id]) }}">{{ $product->name }}</a>
                                    </h4>
                                    <div class="grid-price mt-2">
                                        <span class="money ">${{ $product->price}}</span>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="googles single-item hvr-outline-out">

                                <form action="#" method="post">

                                    {{-- <input type="hidden" name="cmd" value="_cart">
                                    <input type="hidden" name="add" value="{{ $product->id }}"/>
                                    <input type="hidden" name="googles_item" value="{{ $product->name}}"/>
                                    <input type="hidden" name="amount" value="{{ $product->prices[count($product->prices) - 1]->price}}" />
                                    <button type="submit" class="googles-cart pgoogles-cart">
                                        <i class="fas fa-cart-plus"></i>
                                    </button> --}}

                                    {{-- <input type="hidden" class="" name="product" value="{{ $product->id }}" /> --}}

                                    <button type="button" class="googles-cart pgoogles-cart cartBtn" data-productid="{{ $product->id }}">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>

                                </form>

                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>