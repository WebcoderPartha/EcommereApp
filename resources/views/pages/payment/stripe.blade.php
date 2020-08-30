@extends('layouts.app')
@section('css_link')
    <script src="https://js.stripe.com/v3/"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_responsive.css')}}">
    <style>/**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            width: 100%;
            padding: 10px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }
        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }</style>
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
                        <div class="cart_title text-center">Card Details</div>
                        <div class="cart_items mb-3">
                            <form action="{{ route('stripe.payment') }}" method="post" id="payment-form">
                                @csrf
                                <input type="hidden" name="shipping_charge" value="{{ $charge->shipping_charge }}">
                                <input type="hidden" name="vat" value="{{ $charge->vat }}">
                                @if(Session::has('coupon'))
                                    <input type="hidden" name="subtotal" value="{{ Session::get('coupon')['balance'] }}">
                                @else
                                    <input type="hidden" name="subtotal" value="{{ Cart::subtotal() }}">
                                @endif
                                @if(Session::has('coupon'))
                                    <input type="hidden" name="discount" value="{{ Session::get('coupon')['discount'] }}">
                                @endif
                                @if(Session::has('coupon'))
                                    @if(!$charge->vat == NULL &&  !$charge->shipping_charge == NULL)
                                        <input type="hidden" name="total" value="{{ Session::get('coupon')['balance'] + $charge->vat + $charge->shipping_charge}}">
                                    @elseif($charge->vat == NULL && !$charge->shipping_charge == NULL)
                                        <input type="hidden" name="total" value="{{ Session::get('coupon')['balance'] + $charge->shipping_charge}}">
                                    @elseif(!$charge->vat == NULL && $charge->shipping_charge == NULL)
                                        <input type="hidden" name="total" value="{{ Session::get('coupon')['balance'] + $charge->vat}}">
                                    @else
                                        <input type="hidden" name="total" value="{{ Session::get('coupon')['balance']}}">
                                    @endif
                                @else
                                    @if(!$charge->vat == NULL && !$charge->shipping_charge == NULL)
                                        <input type="hidden" name="total" value="{{ Cart::subtotal() + $charge->vat + $charge->shipping_charge }}">
                                    @elseif($charge->vat == NULL && !$charge->shipping_charge == NULL)
                                        <input type="hidden" name="total" value="{{ Cart::subtotal() + $charge->shipping_charge }}">
                                    @elseif(!$charge->vat == NULL && $charge->shipping_charge == NULL)
                                        <input type="hidden" name="total" value="{{ Cart::subtotal() + $charge->vat }}">
                                    @else
                                        <input type="hidden" name="total" value="{{ Cart::subtotal() }}">
                                    @endif
                                @endif
                                <input type="hidden" name="ship_name" value="{{ $data['name']  }}">
                                <input type="hidden" name="ship_phone" value="{{ $data['phone']  }}">
                                <input type="hidden" name="ship_email" value="{{ $data['email']  }}">
                                <input type="hidden" name="ship_address" value="{{ $data['address']  }}">
                                <input type="hidden" name="ship_city" value="{{ $data['city']  }}">
                                <input type="hidden" name="ship_zipecode" value="{{ $data['postcode']  }}">
                                <input type="hidden" name="ship_country" value="{{ $data['country']  }}">
                                <input type="hidden" name="payment_type" value="{{ $data['payment']  }}">
                                <div class="form-row">
                                    <label for="card-element">
                                        Credit or debit card
                                    </label>
                                    <div id="card-element">
                                        <!-- A Stripe Element will be inserted here. -->
                                    </div>

                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-4">Pay Now</button>
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
    <script type="text/javascript">
        // Create a Stripe client.
        var stripe = Stripe('pk_test_CwZ6jXsI54SP1IuzRVYVLY2q');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>
@stop
