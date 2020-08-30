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
                <div class="col-lg-8 border">
                    <div class="cart_container">
                        <div class="cart_title text-center">Cart Products</div>
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
                                                <div class="cart_item_text">BDT {{ $cart->price }}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Total</div>
                                                <div class="cart_item_text">BDT {{ $cart->price*$cart->qty }}</div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- Order Total -->
                    <div class="row">

                            <div class="col-md-3 p-4"></div>

                        <div class="col-md-5 offset-4 p-4">
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
                <div class="col-lg-4 border">
                    <div class="cart_container">
                        <div class="cart_title text-center">Shipping Address</div>
                        <div class="cart_items mb-3">
                            <form method="POST" action="{{ route('payment.success') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter full name">
                                </div>
                                <div class="form-group">
                                    <label for="name">Phone Number</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Enter phone">
                                </div>
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="name">Address</label>
                                    <input type="text" class="form-control" name="address" placeholder="Enter address name">
                                </div>
                                <div class="form-group">
                                    <label for="name">City</label>
                                    <input type="text" class="form-control" name="city" placeholder="Enter city name">
                                </div>
                                <div class="form-group">
                                    <label for="name">Post Code</label>
                                    <input type="text" class="form-control" name="postcode" placeholder="Enter post code">
                                </div>
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <select name="country" class="form-control" id="country" style="width:342px">
                                        <option value="">Select Country</option>
                                        <option value="bangladesh">Bangladesh</option>
                                        <option value="india">India</option>
                                        <option value="pakistan">Pakistan</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <h4 class="text-center"><label for="country">Payment Method</label></h4>
                                    <ul class="logos_list border">
                                        <li><input type="radio" name="payment" value="Stripe"><img src="{{ asset('media/payment/mastercard.png') }}" alt="" width="80" height="60"></li>
                                        <li><input type="radio" name="payment" value="Paypal"><img src="{{ asset('media/payment/paypal.png') }}" alt="" width="80" height="60"></li>
                                        <li><input type="radio" name="payment" value="Cash"><img src="{{ asset('media/payment/mollie.png') }}" alt="" width="80" height="60"></li>
                                    </ul>
                                </div>
                                <button type="submit" class="btn btn-primary">Pay Now</button>
                            </form>
                        </div>
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
