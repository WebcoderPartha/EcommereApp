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
                        <div class="cart_title">Shopping Cart</div>
                        <div class="cart_items">
                            <ul class="cart_list">
                                @foreach($carts as $cart)
                                <li class="cart_item clearfix">
                                    <div class="cart_item_image text-center"><img src="{{ asset($cart->options->image) }}" alt=""></div>
                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_name cart_info_col">
                                            <div class="cart_item_title">Name</div>
                                            <div class="cart_item_text">{{ Str::limit($cart->name, 20) }}</div>
                                        </div>
                                        @if($cart->options->color == null)
                                        @else
                                        <div class="cart_item_color cart_info_col">
                                            <div class="cart_item_title">Color</div>
                                            <div class="cart_item_text">{{ $cart->options->color }}</div>
                                        </div>
                                        @endif
                                        @if($cart->options->size == NULL)
                                            @else
                                        <div class="cart_item_color cart_info_col">
                                            <div class="cart_item_title">Size</div>
                                            <div class="cart_item_text">{{ $cart->options->size }}</div>
                                        </div>
                                        @endif
                                        <div class="cart_item_quantity cart_info_col">
                                            <div class="cart_item_title">Quantity</div>
                                            <div class="cart_item_text">
                                                <form action="{{ route('update.cart') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="productId" value="{{$cart->rowId}}">
                                                    <input type="number" class="form-control" style="border-top-right-radius: 0; border-bottom-right-radius: 0;display: inline-block;width: 70px" value="{{ $cart->qty }}" min="1" name="qty" pattern="[0-9]"><button class="btn btn-outline-white" style="padding: 6px;border-top-left-radius: 0px;border-bottom-left-radius: 0px;margin-top: -2px;"><i class="fa fa-check text-danger"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="cart_item_price cart_info_col">
                                            <div class="cart_item_title">Price</div>
                                            <div class="cart_item_text">BDT {{ $cart->price }}</div>
                                        </div>
                                        <div class="cart_item_total cart_info_col">
                                            <div class="cart_item_title">Total</div>
                                            <div class="cart_item_text">BDT {{ $cart->price*$cart->qty }}</div>
                                        </div>
                                        <div class="cart_item_total cart_info_col">
                                            <div class="cart_item_title">Action</div>
                                            <div class="cart_item_text"><a class="p-3" href="{{ route('remove.cart', $cart->rowId) }}">X</a></div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Order Total -->
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Order Total:</div>
                                <div class="order_total_amount">BDT {{ Cart::subtotal() }}</div>
                            </div>
                        </div>

                        <div class="cart_buttons">
                            <button type="button" class="button cart_button_clear">Remove All</button>
                            <a href="{{ route('user.checkout') }}" class="button cart_button_checkout">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script src="{{ asset('frontend/js/cart_custom.js')}}"></script>
@stop
