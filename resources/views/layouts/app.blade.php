<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/slick-1.8.0/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/responsive.css') }}">
    @yield('css_link')
    @toastr_css
    <style>
        .featured .slick-track {
            margin-bottom: 94px;
        }
        div#size select {
            width: 134px !important;
            margin: auto;
        }
        div#color select {
            width: 134px !important;
            margin: auto;
        }
        input#qty {
            margin: 0 auto;
        }
    </style>
</head>

<body>

<div class="super_container">

    <!-- Header -->

    <header class="header">

        <!-- Top Bar -->
    @php
        $site_setting = \App\Sitesetting::first();
    @endphp
        <div class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row">
                        <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('frontend/images/phone.png') }}" alt=""></div>{{ $site_setting->phone_one }}</div>
                        <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('frontend/images/mail.png') }}" alt=""></div><a href="mailto:fastsales@gmail.com">{{ $site_setting->email }}</a></div>
                        <div class="top_bar_content ml-auto">
                            <div class="top_bar_menu">
                                <ul class="standard_dropdown top_bar_dropdown">
                                    @if(Session::get('language') == 'hindi')
                                        <li>
                                            <a href="{{ route('language.english') }}"><img src="{{ asset('media/flag/usa1.png') }}" width="35" height="35" alt=""></a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ route('language.hindi') }}"><img src="{{ asset('media/flag/bangladesh.png') }}" width="35" height="35" alt=""></a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="top_bar_menu">
                                <ul class="standard_dropdown top_bar_dropdown">
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#OrderTracking">Track My Order</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="top_bar_user">

                                @guest
                                    <div class="user_icon"><img src="{{ asset('frontend/images/user.svg') }}" alt=""></div>
                                    <div>
                                        <a href="{{ route('login') }}">Sign In</a> / <a href="{{ route('register') }}">Sign Up</a>
                                    </div>
                                @else
                                    <ul class="standard_dropdown top_bar_dropdown">
                                        <li>
                                            <a href="{{ route('myaccount') }}"><div class="user_icon"><img src="{{ asset('frontend/images/user.svg') }}" alt=""></div> My Account<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="{{ route('user.wishlist') }}">Wishlist</a></li>
                                                <li><a href="{{ route('user.checkout') }}">Checkout</a></li>
                                                <li><a href="#">Others</a></li>
                                                <li><a href="{{ route('logout.user') }}">Sign Out</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                @endguest

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.main-nav')
    </header>

    @yield('content')

    <!-- Newsletter -->

    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                        <div class="newsletter_title_container">
                            <div class="newsletter_icon"><img src="{{ asset('frontend/images/send.png') }}" alt=""></div>
                            <div class="newsletter_title">Sign up for Newsletter</div>
                            <div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
                        </div>
                        <div class="newsletter_content clearfix">
                            <form action="{{ route('subscriber.store') }}" method="POST" class="newsletter_form">
                                @csrf
                                <input type="email" name="email" class="newsletter_input" required placeholder="Enter your email address" >
                                <button class="newsletter_button" type="submit">Subscribe</button>
                            </form>
                            <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->

    <footer class="footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 footer_col">
                    <div class="footer_column footer_contact">
                        <div class="logo_container">
                            <div class="logo"><a href="#">{{ $site_setting->company_name }}</a></div>
                        </div>
                        <div class="footer_title">Got Question? Call Us 24/7</div>
                        <div class="footer_phone">{{ $site_setting->phone_two }}</div>
                        <div class="footer_contact_text">
                            <p>{{ $site_setting->company_address }}</p>
                        </div>
                        <div class="footer_social">
                            <ul>
                                <li><a href="{{ $site_setting->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ $site_setting->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{ $site_setting->youtube }}"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="{{ $site_setting->instagram }}"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 offset-lg-2">
                    <div class="footer_column">
                        <div class="footer_title">Find it Fast</div>
                        <ul class="footer_list">
                            <li><a href="#">Computers & Laptops</a></li>
                            <li><a href="#">Cameras & Photos</a></li>
                            <li><a href="#">Hardware</a></li>
                            <li><a href="#">Smartphones & Tablets</a></li>
                            <li><a href="#">TV & Audio</a></li>
                        </ul>
                        <div class="footer_subtitle">Gadgets</div>
                        <ul class="footer_list">
                            <li><a href="#">Car Electronics</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="footer_column">
                        <ul class="footer_list footer_list_2">
                            <li><a href="#">Video Games & Consoles</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Cameras & Photos</a></li>
                            <li><a href="#">Hardware</a></li>
                            <li><a href="#">Computers & Laptops</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="footer_column">
                        <div class="footer_title">Customer Care</div>
                        <ul class="footer_list">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Order Tracking</a></li>
                            <li><a href="#">Wish List</a></li>
                            <li><a href="#">Customer Services</a></li>
                            <li><a href="#">Returns / Exchange</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Product Support</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    <!-- Copyright -->

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                        <div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="logos ml-sm-auto">
                            <ul class="logos_list">
                                <li><a href="#"><img src="{{ asset('frontend/images/logos_1.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('frontend/images/logos_2.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('frontend/images/logos_3.png') }}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('frontend/images/logos_4.png') }}" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Tracking Order Model -->
<div class="modal fade" id="OrderTracking" tabindex="-1" role="dialog" aria-labelledby="ordertack" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="ordertack">Track My Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('order.tracking') }}" method="POST">
                @csrf
            <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="order_id" class="form-control" placeholder="Enter your Order ID">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Order Track</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('frontend/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('frontend/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('frontend/plugins/slick-1.8.0/slick.js') }}"></script>
<script src="{{ asset('frontend/plugins/easing/easing.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{ asset('frontend/js/custom.js') }}"></script>
@yield('scripts')

<script type="text/javascript">
    $(document).ready(function (){
        $('.addwishlist').on('click', function (){
            var id = $(this).data('id');
            if(id){
                $.ajax({
                    type    :'GET',
                    url     : "{{ url('add/wishlist/') }}/"+id,
                    dataType: 'json',
                    success : function (data){
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: false,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });

                        if($.isEmptyObject(data.error)){
                            Toast.fire({
                                icon: 'success',
                                title: data.success
                            })
                        }else{
                            Toast.fire({
                                icon: 'warning',
                                title: data.error
                            })
                        }
                    }

                });
            }
        });
        // Wishlist Icon
        $('.addwishlist').on('click', function(){
            $.ajax({
                type    : 'GET',
                url     : "{{ url('/showwishlist') }}",
                dataType    : 'JSON',
                success : (data) => {
                    $('.wishlist_count').html(data.wishlist);
                }
            });
        });
        $.ajax({
            type    : 'GET',
            url     : "{{ url('/showwishlist') }}",
            dataType    : 'JSON',
            success : (data) => {
                $('.wishlist_count').html(data.wishlist);
            }
        });
        {{--// Cart Icon--}}
        {{--$('.addtoCard').on('click', function(){--}}
        {{--    $.ajax({--}}
        {{--        type    : "GET",--}}
        {{--        url     : "{{ url('/cartcount') }}",--}}
        {{--        dataType: "JSON",--}}
        {{--        success : (data) => {--}}
        {{--            $('.cart_count span').html(data);--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}
        {{--$.ajax({--}}
        {{--    type    : "GET",--}}
        {{--    url     : "{{ url('/cartcount') }}",--}}
        {{--    dataType: "JSON",--}}
        {{--    success : (data) => {--}}
        {{--        $('.cart_count span').html(data);--}}
        {{--    }--}}
        {{--});--}}

    });

</script>
@toastr_js
@toastr_render
</body>

</html>
