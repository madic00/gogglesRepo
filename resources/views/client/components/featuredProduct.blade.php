<div class="item">
    <div class="gd-box-info text-center">
        <div class="product-men women_two bot-gd">
            <div class="product-googles-info slide-img googles">
                <div class="men-pro-item">
                    <div class="men-thumb-item">
                        <img src="{{ asset("assets/images/$f_product->name/$f_product->image") }}" class="img-fluid" alt="Product {{ $f_product->name }}" />
                        <div class="men-cart-pro">
                            <div class="inner-men-cart-pro">
                                <a href="{{ route('home.products.show', ['product' => $f_product->id]) }}" class="link-product-add-cart">Quick View</a>
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
                                        <span class="money ">${{ $f_product->price}}</span>
                                    </div>
                                </div>
                              
                            </div>
                            <div class="googles single-item hvr-outline-out">
                                <form action="#" method="post">
                                    {{-- <input type="hidden" name="cmd" value="_cart">
                                    <input type="hidden" name="add" value="1">
                                    <input type="hidden" name="googles_item" value="Fastrack Aviator">
                                    <input type="hidden" name="amount" value="325.00">
                                    <button type="submit" class="googles-cart pgoogles-cart">
                                        <i class="fas fa-cart-plus"></i>
                                    </button> --}}

                                    <button type="button" class="googles-cart pgoogles-cart cartBtn" data-productid="{{ $product->id }}">
                                        <i class="fas fa-cart-plus"></i>
                                    </button>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>