<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .table{
            width: 50%;
            margin: 0 auto;
        }
        .price_details_right {
            margin-bottom: 40px;
        }
        td.price_details_left h3 {
            font-size: 16px;
        }
        body{
            font-family: Verdana;
            /*max-width: 600px;*/
        }
        .header{
            padding: 20px;
            text-align: center;
            font-weight: 900;
            color: #fff;
        }
        .footer{
            padding: 20px;
            text-align: center;
            font-weight: 900;
            color: #fff;
        }
        .confirm_info{
            text-align: center;
            padding: 20px;
        }
        td.cofirm_box {
            padding: 27px;
        }
        .package{
            padding: 27px;
        }
        td.cofirm_box h2 {
            font-size: 18px;
            font-weight: normal;
        }
        td.break hr {
            border: 0;
            border-bottom: 1px solid;
            color: orange;
        }
        .shipping {
            padding: 0px 0px 0px 27px;
        }
        .order_Details{
            margin-top: 12px;
        }
        .order_Details p {
            margin-bottom: 4px;
            font-weight: normal;
        }
        td.shipping_left h4 {
            font-size: 14px;
            margin-bottom: 7px;
        }
        td.shipping_left p {
            font-size: 14px;
            color: #555;
        }
        .shipping_right p {
            font-size: 14px;
            color: #555;
        }
        .shipping_right {
            margin-top: 24px;
        }
        .price_details_right p {
            margin-bottom: 6px;
        }
        td.package h5 {
            font-size: 18px;
        }
        td.cofirm_box p {
            font-size: 14px;
            margin-top: 15px;
            line-height: 20px;
        }
        .confirm_info p {
            font-size: 15px;
        }
        @media all and (max-width: 415px){
            /*body{*/
            /*    width: 100% !important;*/
            /*    margin: 0 auto;*/
            /*}*/
            .table{
                width: 100%;
            }
            .price_details_right p {
                font-size: 14px;
                margin-right: 11px;
            }
        }
    </style>
</head>
<body>
<table class="table" cellspacing="0">
    <tbody>
    <tr bgcolor="#f36d2e">
        <td class="header">
            <h2>WEB SHOP</h2>
        </td>
    </tr>
    <tr>
        <td class="confirm_info">
            <h3 style="margin-bottom: 5px">Your order has been placed & Under review!</h3>
            <p style="color: #f36d2e;font-weight: bold">Order ID #{{ $order->order_id }}</p>
            <img src="https://ci6.googleusercontent.com/proxy/-bHLrVkOR1mreIS8r68cn22Ik57GOe4DzOKHjTIqbwiM4RoKIS6T3_sWLLWU9ijfAveZutFBHlp6_yMf6cbhiw_AGqG5A46Bep3wZFXfMWebBiCm2NqB5efJN34U8M60loqlRUUSqaf2TT9tN1byXmjSYJ3OzifW_vxCHzC9Prz3rI_CUTs3A5hcW9kfGDXN=s0-d-e1-ft#https://static.cdn.responsys.net/i5/responsysimages/lazadaihq/contentlibrary/!header700/images/transactions/Daz-Confirmed.png" width="100%" alt="">
        </td>
    </tr>
    <tr>
        <td bgcolor="#f0f0f0" class="cofirm_box">
            <h2>Hey {{ $shipping_details->ship_name }},</h2>
            <p>Your Order ID <span style="color:#f36d2e">#{{ $order->order_id }}</span> has been placed on {{ $order->date }}. Your order is now under review. You will be updated with another email after your item(s) has been confirmed.</p>
        </td>
    </tr>
    <tr>
        <td class="package">
            <h5>Your Package:</h5>
        </td>
    </tr>
    <tr>
        <td class="shipping">
            <table width="100%">
                <tr>
                    <td width="50%" class="shipping_left">
                        <h4>Shipping Address:</h4>
                        <p>{{ $shipping_details->ship_name }}</p>
                        <p>{{ $shipping_details->ship_address }}</p>
                        <p>{{ $shipping_details->ship_city }}-{{ $shipping_details->ship_zipecode }}, {{ $shipping_details->ship_country }}</p>
                    </td>
                    <td width="50%" valign="top">
                        <div class="shipping_right">
                            <p>Phone: {{ $shipping_details->ship_phone }}</p>
                            <p>Email: {{ $shipping_details->ship_email }}</p>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="package">
            <h5>Order Details:</h5>
        </td>
    </tr>
    <tr>
        <td class="shipping">
            @foreach($carts as $product)
            <table width="100%">
                <tr>
                    <td width="30%" class="order_img">
                        <img src="{{ asset($product->options->image) }}" width="100%" alt="">
                    </td>
                    <td width="70%" valign="top">
                        <div class="order_Details">
                            <p>{{ $product->name }}</p>
                            <p>Unit Price: <span style="color: #f36d2e">{{ $product->price }} BDT</span></p>
                            <p>Quantity: {{ $product->qty }}</p>
                            @if($product->options->size == null)
                            @else
                                <p>Size: {{ $product->options->size }}</p>
                            @endif
                            @if($product->options->color == null)
                            @else
                                <p>Color: {{ $product->options->color }}</p>
                            @endif
                        </div>
                    </td>
                </tr>
            </table>
            @endforeach
        </td>
    </tr>
    <tr>
        <td class="break" width="100%" style="padding: 5px">
            <hr>
        </td>
    </tr>
    <tr>
        <td class="shipping" style="padding-top: 10px;">
            <table width="100%">
                <tr>
                    <td width="50%" class="price_details_left" valign="top">
                        <h3 style="color: #f36d2e">Paid via: {{ $order->payment_type }}</h3>
                    </td>
                    <td width="50%" valign="top">
                        <div class="price_details_right">
                            <p>Subtotal: <span style="float: right">{{ $order->subtotal }} BDT</span></p>
                            <p>Discount: <span style="float: right">{{ $order->discount ? $order->discount : 0}} BDT</span></p>
                            <p>Shipping: <span style="float: right">{{ $order->shipping_charge ? $order->shipping_charge : 0 }} BDT</span></p>
                            <p>Vat: <span style="float: right">{{ $order->vat ? $order->shipping_charge : 0 }} BDT</span></p>
                            <hr style="margin-bottom: 4px;margin-top: 4px;border: 0;border-bottom: 1px solid;color: orange;">
                            <p style="color:#f36d2e;font-weight: 900">Total Amount: <span style="float: right">{{ $order->total }} BDT</span></p>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr bgcolor="#f36d2e">
        <td class="footer">
            <h2>WEB SHOP</h2>
            <p>www.webshop.com</p>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
