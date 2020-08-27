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
                        <div class="cart_title">Checkout</div>
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
                                                    {{ $cart->qty }}
                                                </div>
                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Price</div>
                                                <div class="cart_item_text">{{ $cart->price }}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Total</div>
                                                <div class="cart_item_text">${{ $cart->price*$cart->qty }}</div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Order Total -->
                        <div class="row">
                            @if(Session::has('coupon'))
                                <div class="col-md-4 p-4"></div>
                            @else
                            <div class="col-md-4 p-4">
                                <div class="card p-4">
                                    <form action="{{ route('checkout.apply.coupon') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Apply Coupon</label>
                                            <input type="text" placeholder="Enter coupon code" name="coupon" class="form-control" style="width: 214px">
                                        </div>
                                        <button type="submit" style="cursor:pointer;" class="btn btn-primary">Apply</button>
                                    </form>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-4 offset-4 p-4">
                               <div class="card">
                                   <ul class="list-group">
                                       @if(Session::has('coupon'))
                                           <li class="list-group-item">Subtotal:<span style="float: right">BDT {{ Session::get('coupon')['balance'] }}</span></li>
                                           <li class="list-group-item">Coupon: <span>({{Session::get('coupon')['name']}}) <a
                                                       href="{{ route('remove.coupon') }}" class="btn btn-danger btn-sm">X</a></span> <span style="float: right">BDT {{ Session::get('coupon')['discount'] }}</span></li>
                                       @else
                                           <li class="list-group-item">Subtotal:<span style="float: right">BDT {{ Cart::subtotal() }}</span></li>
                                       @endif
                                       @if($charge->shipping_charge == NULL)
                                           @else
                                               <li class="list-group-item">Shipping Charge: <span style="float: right">BDT {{ $charge->shipping_charge }}</span></li>
                                           @endif

                                           @if($charge->vat == NULL)
                                           @else
                                               <li class="list-group-item">Vat: <span style="float: right">BDT {{ $charge->vat }}</span></li>
                                           @endif
                                           @if(Session::has('coupon'))
                                               @if(!$charge->vat == NULL &&  !$charge->shipping_charge == NULL)
                                                   <li class="list-group-item">Total:
                                                       <span style="float: right">BDT {{ Session::get('coupon')['balance'] + $charge->vat + $charge->shipping_charge}}</span>
                                                   </li>
                                               @elseif($charge->vat == NULL && !$charge->shipping_charge == NULL)
                                                   <li class="list-group-item">Total:
                                                       <span style="float: right">BDT {{ Session::get('coupon')['balance'] + $charge->shipping_charge}}</span>
                                                   </li>
                                               @elseif(!$charge->vat == NULL && $charge->shipping_charge == NULL)
                                                   <li class="list-group-item">Total:
                                                       <span style="float: right">BDT {{ Session::get('coupon')['balance'] + $charge->vat}}</span>
                                                   </li>
                                               @else
                                                   <li class="list-group-item">Total:
                                                       <span style="float: right">BDT {{ Session::get('coupon')['balance']}}</span>
                                                   </li>
                                               @endif
                                           @else
                                               @if(!$charge->vat == NULL && !$charge->shipping_charge == NULL)
                                                   <li class="list-group-item">Total:
                                                       <span style="float: right">BDT {{ Cart::subtotal() + $charge->vat + $charge->shipping_charge }}</span>
                                                   </li>
                                               @elseif($charge->vat == NULL && !$charge->shipping_charge == NULL)
                                                   <li class="list-group-item">Total:
                                                       <span style="float: right">BDT {{ Cart::subtotal() + $charge->shipping_charge }}</span>
                                                   </li>
                                               @elseif(!$charge->vat == NULL && $charge->shipping_charge == NULL)
                                                   <li class="list-group-item">Total:
                                                       <span style="float: right">BDT {{ Cart::subtotal() + $charge->vat }}</span>
                                                   </li>
                                               @else
                                                   <li class="list-group-item">Total:
                                                       <span style="float: right">BDT {{ Cart::subtotal() }}</span>
                                                   </li>
                                               @endif

                                           @endif

                                   </ul>
                               </div>
                            </div>
                        </div>
                        </div>
                        <div class="cart_buttons">
{{--                            <button type="button" class="button cart_button_clear">Remove All</button>--}}
                            <a href="{{ route('user.checkout') }}" class="button cart_button_checkout">Process</a>
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
