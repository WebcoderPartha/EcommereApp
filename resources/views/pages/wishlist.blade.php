@extends('layouts.app')
@section('css_link')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_responsive.css')}}">
@endsection
@section('title', 'Shopping Cart')
@section('content')

    <!-- Cart -->

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart_container">
                        <div class="cart_title">Wishlist</div>
                        @if(count($wishlists))
                        <div class="cart_items">
                            <ul class="cart_list">
                                @foreach($wishlists as $product)
                                    <li class="cart_item clearfix">
                                        <div class="cart_item_image text-center"><img src="{{ asset($product->product->image_one) }}" alt=""></div>
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Name</div>
                                                <div class="cart_item_text">{{ Str::limit($product->product->product_name, 20) }}</div>
                                            </div>
                                            @if($product->product->product_color == null)
                                            @else
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title">Color</div>
                                                    <div class="cart_item_text">{{ $product->product->product_color }}</div>
                                                </div>
                                            @endif
                                            @if($product->product->product_size == NULL)
                                            @else
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title">Size</div>
                                                    <div class="cart_item_text">{{ $product->product->product_size }}</div>
                                                </div>
                                            @endif

                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Price</div>
                                                @if($product->product->discount_price == NULL)
                                                    <div class="cart_item_text">{{ $product->product->selling_prize }}</div>
                                                @else
                                                <div class="cart_item_text">{{ $product->product->discount_price }}</div>
                                                @endif
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Action</div>
                                                <div class="cart_item_text"><a class="p-3" href="{{ route('user.remove.wishlist', $product->id) }}">X</a></div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @else
                            <h5 class="text-center">Empty</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script src="{{ asset('frontend/js/cart_custom.js')}}"></script>
@stop
