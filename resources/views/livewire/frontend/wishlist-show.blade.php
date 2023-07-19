<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">

            <h3 class="text-center">My Wishlist</h3>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row text-center">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-3">
                                    <h4>Price</h4>
                                </div>

                                <div class="col-md-3">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>


                        @forelse ($wishlists as $wishlist)
                            @if ($wishlist->product)
                                <div class="cart-item">
                                    <div class="row text-center">
                                        <div class="col-md-6 my-auto">
                                            <a href="{{url('/collections/'.$wishlist->product->category->slug.'/'.$wishlist->product->slug.'/')}}">
                                                <label class="product-name">
                                                    <img src="{{asset($wishlist->product->productImages[0]->image)}}" style="width: 50px; height: 50px"
                                                    alt="{{$wishlist->product->name}}">
                                                    {{$wishlist->product->name}}
                                                </label>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-6 my-auto">
                                            <label class="price">${{$wishlist->product->selling_price}}</label>
                                        </div>

                                        <div class="col-md-3 col-6 my-auto">
                                            <div class="remove">
                                                <button wire:click='removeWishListItem({{$wishlist->id}})' class="btn btn-danger btn-sm">

                                                    <span wire:loading.remove wire:target='removeWishListItem({{$wishlist->id}})'>
                                                        <i class="fa fa-trash"></i> Remove
                                                    </span>
                                                    <span wire:loading  wire:target='removeWishListItem({{$wishlist->id}})'>
                                                        <i class="fa fa-trash"></i> Removing...

                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @empty
                            <div>
                                <h4>Wishlist Empty</h4>
                            </div>
                        @endforelse



                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
