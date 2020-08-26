@extends('layouts.app')
@section('title', 'Home Page')
@section('content')
    <!-- Header Main -->

    <!-- Banner -->
    <div class="banner">
        <div class="banner_background" style="background-image:url({{asset('frontend/images/banner_background.jpg')}})"></div>
        <div class="container fill_height">
            <div class="row fill_height">
                <div class="banner_product_image"><img src="{{ asset($slider->image_one) }}" alt=""></div>
                <div class="col-lg-5 offset-lg-4 fill_height">
                    <div class="banner_content">
                        <h1 class="banner_text">{{$slider->product_name}}</h1>
                        <div class="banner_price">
                            @if( $slider->discount_price == NULL )
                                BDT{{$slider->selling_prize}}
                            @else
                                <span>BDT{{$slider->selling_prize}}</span>BDT{{$slider->discount_price}}
                            @endif
                        </div>
                        <div class="banner_product_name">{{$slider->brand->brand_name}}</div>
                        <div class="button banner_button"><a href="#">Shop Now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Characteristics -->

    <div class="characteristics">
        <div class="container">
            <div class="row">

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ asset('frontend/images/char_1.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from BDT50</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ asset('frontend/images/char_2.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from BDT50</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ asset('frontend/images/char_3.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from BDT50</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ asset('frontend/images/char_4.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from BDT50</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Deals of the week -->

    <div class="deals_featured">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

                    <!-- Deals -->

                    <div class="deals">
                        <div class="deals_title">Deals of the Week</div>
                        <div class="deals_slider_container">

                            <!-- Deals Slider -->
                            <div class="owl-carousel owl-theme deals_slider">
                            @foreach($hotNew as $deal)
                                <!-- Deals Item -->
                                <div class="owl-item deals_item">
                                    <div class="deals_image"><img src="{{ asset($deal->image_one) }}" alt=""></div>
                                    <div class="deals_content">
                                        <div class="deals_info_line d-flex flex-row justify-content-start">
                                            <div class="deals_item_category"><a href="#">{{ $deal->brand->brand_name }}</a></div>
                                            @if($deal->discount_price == NULL)
                                            @else
                                                <div class="deals_item_price_a ml-auto">BDT{{$deal->selling_prize}}</div>
                                            @endif
                                        </div>
                                        <div class="deals_info_line d-flex flex-row justify-content-start">
                                            <div class="deals_item_name"><a style="font-size: 22px" href="{{ route('product.details',[$deal->id, $deal->product_name]) }}">{{ $deal->product_name}}</a></div>
                                            @if($deal->discount_price == NULL)
                                                <div class="deals_item_price ml-auto">BDT{{ $deal->selling_prize }}</div>
                                            @else
                                            @endif
                                            @if($deal->discount_price !== NULL)
                                                <div class="deals_item_price ml-auto">BDT{{ $deal->discount_price }}</div>
                                            @else
                                            @endif
                                        </div>
                                        <div class="available">
                                            <div class="available_line d-flex flex-row justify-content-start">
                                                <div class="available_title">Available: <span>{{ $deal->product_quantity }}</span></div>
                                                <div class="sold_title ml-auto">Already sold: <span>28</span></div>
                                            </div>
                                            <div class="available_bar"><span style="width:17%"></span></div>
                                        </div>
                                        <div class="deals_timer d-flex flex-row align-items-center justify-content-start">
                                            <div class="deals_timer_title_container">
                                                <div class="deals_timer_title">Hurry Up</div>
                                                <div class="deals_timer_subtitle">Offer ends in:</div>
                                            </div>
                                            <div class="deals_timer_content ml-auto">
                                                <div class="deals_timer_box clearfix" data-target-time="">
                                                    <div class="deals_timer_unit">
                                                        <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                                                        <span>hours</span>
                                                    </div>
                                                    <div class="deals_timer_unit">
                                                        <div id="deals_timer1_min" class="deals_timer_min"></div>
                                                        <span>mins</span>
                                                    </div>
                                                    <div class="deals_timer_unit">
                                                        <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                                                        <span>secs</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            </div>

                        </div>

                        <div class="deals_slider_nav_container">
                            <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
                            <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
                        </div>
                    </div>

                    <!-- Featured -->
                    <div class="featured">
                        <div class="tabbed_container">
                            <div class="tabs">
                                <ul class="clearfix">
                                    <li class="active">Featured</li>
                                </ul>
                                <div class="tabs_line"><span></span></div>
                            </div>

                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="featured_slider slider">
                                @foreach($featured as $recent)
                                    <!-- Slider Item -->
                                    <div class="featured_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset($recent->image_one) }}" width="115" height="115" alt=""></div>
                                            <div class="product_content">
                                                @if($recent->discount_price == NULL)
                                                    <div class="product_price discount">BDT{{$recent->selling_prize}}</div>
                                                @else
                                                    <div class="product_price discount">BDT{{$recent->discount_price}}<span>BDT{{$recent->selling_prize}}</span></div>
                                                @endif
                                                <div class="product_name"><div><a href="{{ route('product.details',[$recent->id, $recent->product_name]) }}">{{$recent->product_name}}</a></div></div>
                                                <div class="product_extras">
                                                    <button class="product_cart_button addtoCard" id="{{ $recent->id }}" onclick="productView(this.id)" data-toggle="modal" data-target="#cartModel">Add to Cart</button>
                                                </div>
                                            </div>
                                            <button class="addwishlist" style="border: 0; cursor: pointer" data-id="{{$recent->id}}"><div class="product_fav"><i class="fas fa-heart"></i></div></button>
                                            <ul class="product_marks">
                                            @if($recent->discount_price == NULL)
                                                <li class="product_mark product_discount" style="background: blue">New</li>
                                            @else
                                                @php
                                                    $ammout = $recent->selling_prize - $recent->discount_price;
                                                    $discount = $ammout / $recent->selling_prize * 100;
                                                @endphp
                                                <li class="product_mark product_discount">{{ intval($discount) }}%</li>
                                            @endif
                                            </ul>
                                        </div>
                                    </div>

                                    @endforeach
                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Popular Categories -->

    <div class="popular_categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="popular_categories_content">
                        <div class="popular_categories_title">Popular Categories</div>
                        <div class="popular_categories_slider_nav">
                            <div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                            <div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                        <div class="popular_categories_link"><a href="#">full catalog</a></div>
                    </div>
                </div>

                <!-- Popular Categories Slider -->

                <div class="col-lg-9">
                    <div class="popular_categories_slider_container">
                        <div class="owl-carousel owl-theme popular_categories_slider">
                        @foreach($product_cat as $category)
                            <!-- Popular Categories Item -->
                            <div class="owl-item">
                                <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                    <div class="popular_category_image"><img src="{{ asset('frontend/images/popular_1.png') }}" alt=""></div>
                                    <div class="popular_category_text">{{ $category->category_name }}</div>
                                </div>
                            </div>

                        @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Banner -->

    <div class="banner_2">
        <div class="banner_2_background" style="background-image:url({{ asset('frontend/images/banner_2_background.jpg') }})"></div>
        <div class="banner_2_container">
            <div class="banner_2_dots"></div>
            <!-- Banner 2 Slider -->

            <div class="owl-carousel owl-theme banner_2_slider">
            @foreach($midSliders as $mid_slider)
                <!-- Banner 2 Slider Item -->
                <div class="owl-item">
                    <div class="banner_2_item">
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col-lg-4 col-md-6 fill_height">
                                    <div class="banner_2_content">
                                        <div class="banner_2_category"><h4>{{ $mid_slider->category->category_name }}</h4></div>
                                        <a href="{{ route('product.details',[$deal->id, $deal->product_name]) }}"><div class="banner_2_title"><h3>{{ $mid_slider->product_name }}</h3></div></a>
                                        <div class="banner_2_text"><h4>{{ $mid_slider->brand->brand_name }}</h4> <br>
                                           <h2>BDT{{ $mid_slider->selling_prize }}</h2>
                                        </div>
                                        <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="button banner_2_button"><a href="">Explore</a></div>
                                    </div>

                                </div>
                                <div class="col-lg-8 col-md-6 fill_height">
                                    <div class="banner_2_image_container">
                                        <div class="banner_2_image"><img src="{{ asset($mid_slider->image_one) }}" style="width: 416px !important; height: 416px !important;" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

            </div>
        </div>
    </div>

    <!-- Category One -->

    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">{{ $watch_category->category_name }}</div>
                            <ul class="clearfix">
                                <li class="active"></li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12" style="z-index:1;">

                                <!-- Product Panel -->
                                <div class="product_panel panel active">
                                    <div class="arrivals_slider slider">

                                    @foreach($watch_products as $product)
                                        <!-- Slider Item -->
                                            <div class="featured_slider_item">
                                                <div class="border_active"></div>
                                                <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset($product->image_one) }}" width="115" height="115" alt=""></div>
                                                    <div class="product_content">
                                                        @if($product->discount_price == NULL)
                                                            <div class="product_price discount">BDT{{$product->selling_prize}}</div>
                                                        @else
                                                            <div class="product_price discount">BDT{{$product->discount_price}}<span>BDT{{$product->selling_prize}}</span></div>
                                                        @endif
                                                        <div class="product_name"><div><a href="{{ route('product.details',[$product->id, $product->product_name]) }}">{{$product->product_name}}</a></div></div>
                                                        <div class="product_extras">
                                                            <div class="product_color">
                                                                <input type="radio" checked name="product_color" style="background:#b19c83">
                                                                <input type="radio" name="product_color" style="background:#000000">
                                                                <input type="radio" name="product_color" style="background:#999999">
                                                            </div>
                                                            <button data-id="{{ $product->id }}" class="product_cart_button addtoCard">Add to Cart</button>
                                                        </div>
                                                    </div>
                                                    <button class="addwishlist" style="border: 0; cursor: pointer" data-id="{{$product->id}}"><div class="product_fav"><i class="fas fa-heart"></i></div></button>
                                                    <ul class="product_marks">
                                                        @if($product->discount_price == NULL)
                                                            <li class="product_mark product_discount" style="background: blue">New</li>
                                                        @else
                                                            @php
                                                                $ammout = $product->selling_prize - $product->discount_price;
                                                                $discount = $ammout / $product->selling_prize * 100;
                                                            @endphp
                                                            <li class="product_mark product_discount">{{ intval($discount) }}%</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                    @endforeach

                                    </div>
                                    <div class="arrivals_slider_dots_cover"></div>
                                </div>



                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Category 2 -->

    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">{{ $man_category->category_name }}</div>
                            <ul class="clearfix">
                                <li class="active"></li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12" style="z-index:1;">

                                <!-- Product Panel -->
                                <div class="product_panel panel active" >
                                    <div class="arrivals_slider slider">

                                        <!-- Slider Item -->
                                    @foreach($man_products as $product)
                                        <!-- Slider Item -->
                                            <div class="featured_slider_item">
                                                <div class="border_active"></div>
                                                <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset($product->image_one) }}" width="115" height="115" alt=""></div>
                                                    <div class="product_content">
                                                        @if($product->discount_price == NULL)
                                                            <div class="product_price discount">BDT{{$product->selling_prize}}</div>
                                                        @else
                                                            <div class="product_price discount">BDT{{$product->discount_price}}<span>BDT{{$product->selling_prize}}</span></div>
                                                        @endif
                                                        <div class="product_name"><div><a href="{{ route('product.details',[$product->id, $product->product_name]) }}">{{$product->product_name}}</a></div></div>
                                                        <div class="product_extras">
                                                            <div class="product_color">
                                                                <input type="radio" checked name="product_color" style="background:#b19c83">
                                                                <input type="radio" name="product_color" style="background:#000000">
                                                                <input type="radio" name="product_color" style="background:#999999">
                                                            </div>
                                                            <button class="product_cart_button addtoCard" data-id="{{ $product->id }}">Add to Cart</button>
                                                        </div>
                                                    </div>
                                                    <button class="addwishlist" style="border: 0; cursor: pointer" data-id="{{$product->id}}"><div class="product_fav"><i class="fas fa-heart"></i></div></button>
                                                    <ul class="product_marks">
                                                        @if($product->discount_price == NULL)
                                                            <li class="product_mark product_discount" style="background: blue">New</li>
                                                        @else
                                                            @php
                                                                $ammout = $product->selling_prize - $product->discount_price;
                                                                $discount = $ammout / $product->selling_prize * 100;
                                                            @endphp
                                                            <li class="product_mark product_discount">{{ intval($discount) }}%</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                    <div class="arrivals_slider_dots_cover"></div>
                                </div>



                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Best Sellers -->

    <div class="best_sellers">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">Hot Best Sellers</div>
                            <ul class="clearfix">
                                <li class="active">Top 20</li>
                                <li>Audio & Video</li>
                                <li>Laptops & Computers</li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>

                        <div class="bestsellers_panel panel active">

                            <!-- Best Sellers Slider -->

                            <div class="bestsellers_slider slider">

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item discount">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item discount">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Samsung J730F...</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Nomi Black White</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Samsung Charm Gold</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item discount">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Beoplay H7</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Huawei MediaPad T3</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item discount">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item discount">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item discount">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                            </div>
                        </div>

                        <div class="bestsellers_panel panel">

                            <!-- Best Sellers Slider -->

                            <div class="bestsellers_slider slider">

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item discount">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item discount">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item discount">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item discount">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item discount">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item discount">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                            </div>
                        </div>

                        <div class="bestsellers_panel panel">

                            <!-- Best Sellers Slider -->

                            <div class="bestsellers_slider slider">

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item discount">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item discount">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item discount">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item discount">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item discount">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item discount">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_5.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                                <!-- Best Sellers Item -->
                                <div class="bestsellers_item">
                                    <div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                        <div class="bestsellers_image"><img src="{{ asset('frontend/images/best_6.png') }}" alt=""></div>
                                        <div class="bestsellers_content">
                                            <div class="bestsellers_category"><a href="#">Headphones</a></div>
                                            <div class="bestsellers_name"><a href="product.html">Xiaomi Redmi Note 4</a></div>
                                            <div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="bestsellers_price discount">$225<span>$300</span></div>
                                        </div>
                                    </div>
                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                    <ul class="bestsellers_marks">
                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

{{--    <!-- Adverts -->--}}

{{--    <div class="adverts">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}

{{--                <div class="col-lg-4 advert_col">--}}

{{--                    <!-- Advert Item -->--}}

{{--                    <div class="advert d-flex flex-row align-items-center justify-content-start">--}}
{{--                        <div class="advert_content">--}}
{{--                            <div class="advert_title"><a href="#">Trends 2018</a></div>--}}
{{--                            <div class="advert_text">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</div>--}}
{{--                        </div>--}}
{{--                        <div class="ml-auto"><div class="advert_image"><img src="" alt=""></div></div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-4 advert_col">--}}

{{--                    <!-- Advert Item -->--}}

{{--                    <div class="advert d-flex flex-row align-items-center justify-content-start">--}}
{{--                        <div class="advert_content">--}}
{{--                            <div class="advert_subtitle">Trends 2018</div>--}}
{{--                            <div class="advert_title_2"><a href="#">Sale -45%</a></div>--}}
{{--                            <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>--}}
{{--                        </div>--}}
{{--                        <div class="ml-auto"><div class="advert_image"><img src="" alt=""></div></div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-lg-4 advert_col">--}}

{{--                    <!-- Advert Item -->--}}

{{--                    <div class="advert d-flex flex-row align-items-center justify-content-start">--}}
{{--                        <div class="advert_content">--}}
{{--                            <div class="advert_title"><a href="#">Trends 2018</a></div>--}}
{{--                            <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>--}}
{{--                        </div>--}}
{{--                        <div class="ml-auto"><div class="advert_image"><img src="" alt=""></div></div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- Trends -->

    <div class="trends">
        <div class="trends_background" style="background-image:url({{asset('frontend/images/trends_background.jpg')}})"></div>
        <div class="trends_overlay"></div>
        <div class="container">
            <div class="row">

                <!-- Trends Content -->
                <div class="col-lg-3">
                    <div class="trends_container">
                        <h2 class="trends_title">Buy One Get One</h2>
                        <div class="trends_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</p></div>
                        <div class="trends_slider_nav">
                            <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                            <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                    </div>
                </div>

                <!-- Trends Slider -->
                <div class="col-lg-9">
                    <div class="trends_slider_container">

                        <!-- Trends Slider -->

                        <div class="owl-carousel owl-theme trends_slider">
                        @foreach($buyone_getone as $buyone)
                            <!-- Trends Slider Item -->
                            <div class="owl-item">
                                <div class="trends_item is_new">
                                    <div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset($buyone->image_one) }}" alt=""></div>
                                    <div class="trends_content">
                                        <div class="trends_category"><a href="#">{{ $buyone->brand->brand_name }}</a></div>
                                        <div class="trends_info clearfix">
                                            <div class="trends_name"><a href="{{ route('product.details', [$buyone->id, $buyone->product_name]) }}">{{ $buyone->product_name }}</a></div>
                                            @if($buyone->discount_price == NULL)
                                                <div class="product_price discount">${{$recent->selling_prize}}</div>
                                            @else
                                                <div class="product_price discount">${{$buyone->discount_price}}<span>${{$buyone->selling_prize}}</span></div>
                                            @endif
                                        </div>
                                    </div>
                                    <ul class="trends_marks">
                                        @if($buyone->discount_price == NULL)
                                            <li class="trends_mark trends_new">new</li>
                                        @else
                                            @php
                                            $amound = (($buyone->selling_prize-$buyone->discount_price)/$buyone->selling_prize)*100;
                                            @endphp
                                            <li class="trends_mark trends_new">{{ intval($amound) }}%</li>
                                        @endif
                                    </ul>
                                    <button class="addwishlist"  style="border: 0" data-id="{{ $buyone->id }}"><div class="trends_fav"><i class="fas fa-heart"></i></div></button>
                                    <button class="btn btn-danger addtoCard" data-id="{{ $buyone->id }}">Add to Cart</button>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Reviews -->

    <div class="reviews">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="reviews_title_container">
                        <h3 class="reviews_title">Latest Reviews</h3>
                        <div class="reviews_all ml-auto"><a href="#">view all <span>reviews</span></a></div>
                    </div>

                    <div class="reviews_slider_container">

                        <!-- Reviews Slider -->
                        <div class="owl-carousel owl-theme reviews_slider">

                            <!-- Reviews Slider Item -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{ asset('frontend/images/review_3.jpg') }}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name">Roberto Sanchez</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews Slider Item -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{ asset('frontend/images/review_3.jpg') }}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name">Brandon Flowers</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews Slider Item -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{ asset('frontend/images/review_3.jpg') }}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name">Emilia Clarke</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews Slider Item -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{ asset('frontend/images/review_1.jpg') }}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name">Roberto Sanchez</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews Slider Item -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{ asset('frontend/images/review_2.jpg') }}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name">Brandon Flowers</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews Slider Item -->
                            <div class="owl-item">
                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                    <div><div class="review_image"><img src="{{ asset('frontend/images/review_3.jpg') }}" alt=""></div></div>
                                    <div class="review_content">
                                        <div class="review_name">Emilia Clarke</div>
                                        <div class="review_rating_container">
                                            <div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                            <div class="review_time">2 day ago</div>
                                        </div>
                                        <div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="reviews_dots"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recently Viewed -->

    <div class="viewed">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="viewed_title_container">
                        <h3 class="viewed_title">Recently Viewed</h3>
                        <div class="viewed_nav_container">
                            <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </div>

                    <div class="viewed_slider_container">

                        <!-- Recently Viewed Slider -->

                        <div class="owl-carousel owl-theme viewed_slider">

                        @foreach($recently as $recent)
                            <!-- Recently Viewed Item -->
                            <div class="owl-item">
                                <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="{{ asset($recent->image_one) }}" width="115" height="115" alt=""></div>
                                    <div class="viewed_content text-center">
                                        @if($recent->discount_price == NULL)
                                            <div class="viewed_price">${{ $recent->selling_prize }}</div>
                                        @else
                                            <div class="viewed_price">${{ $recent->discount_price }}<span>${{ $recent->selling_prize }}</span></div>
                                        @endif
                                        <div class="viewed_name"><a href="{{ route('product.details', [$recent->id, $recent->product_name]) }}">{{ $recent->product_name }}</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        @if($recent->discount_price == NULL)
                                            <li class="item_mark item_discount" style="background: blue">New</li>
                                        @else
                                            @php
                                                $amount = $recent->selling_prize - $recent->discount_price;
                                                $discount = $amount / $recent->selling_prize * 100;
                                            @endphp
                                            <li class="item_mark item_discount">{{ intval($discount) }}%</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Brands -->

    <div class="brands">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="brands_slider_container">

                        <!-- Brands Slider -->

                        <div class="owl-carousel owl-theme brands_slider">
                        @foreach($brands as $brand)
                            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ asset($brand->brand_logo) }}" style="width: 113px; height: 70px" alt=""></div></div>
                            @endforeach
                        </div>

                        <!-- Brands Slider Navigation -->
                        <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="cartModel" tabindex="-1" role="dialog" aria-labelledby="titless" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titless">Product Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body p-1">
                                    <img src="" id="pImage" width="222" height="auto" alt="">
                                    <h5 class="pTitle text-center"></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body p-1">
                                    <ul class="list-group">
                                        <li class="list-group-item">Product Code: <span id="code"></span></li>
                                        <li class="list-group-item">Category: <span id="pCategory"></span></li>
                                        <li class="list-group-item">Brand: <span id="pbrand"></span> <img src="" id="plogo" width="50" height="auto" alt=""></li>
                                        <li class="list-group-item">Stock: <span class="badge badge-success text-white">Available</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-3" id="size">
                                <div class="card-header p-1 text-center">
                                    <label class="card-title" for="size">Size</label></div>
                                <div class="card-body p-1">
                                    <select style="width: 109px;" name="size" class="form-control">

                                    </select>
                                </div>
                            </div>
                            <div class="card mb-3"  id="color">
                                <div class="card-header p-1 text-center">
                                    <label for="color" class="card-title">Color</label>
                                </div>
                                <div class="card-body p-1">
                                    <select style="width: 109px;" name="color" class="form-control">
                                        <option value="size">Red</option>
                                        <option value="size">Blue</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header p-1 text-center">
                                    <label for="qty" class="card-title">Quantity</label>
                                </div>
                                <div class="card-body p-1">
                                    <input type="number" id="qty" style="width: 109px;" class="form-control" value="1" min="1" pattern="[1-9]" name="qty">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Add To Cart</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript">
        function productView(id){
            $.ajax({
                type    : "GET",
                url     : "{{ url('/view/cart/product') }}/"+id,
                dataType: "JSON",
                success : (data) =>{
                    $('.pTitle').text(data.product.product_name);
                    $('#pImage').attr('src', data.product.image_one);
                    $('#code').text(data.product.product_code);
                    $('#pCategory').text(data.product.category.category_name);
                    $('#pbrand').text(data.product.brand.brand_name);
                    $('#plogo').attr('src', data.product.brand.brand_logo);

                    let d = $("select[name='size']").empty();
                    if(!$.trim(data.size)){
                        $("#size").hide();
                    }else{

                        $.each(data.size, (idx, value) => {
                            let sizing = '<option value="'+value+'">'+value+'</option>';
                            $("select[name='size']").append(sizing);
                        })
                        $("#size").show();
                    }

                    let e = $("select[name='color']").empty();
                    if(!$.trim(data.color)){
                        $("#color").hide();
                    }else{
                        $("#color").show();
                        $.each(data.color, (idx, value) => {
                            let coloring = '<option value="'+value+'">'+value+'</option>';
                            $("select[name='color']").append(coloring);
                        });
                    }
                }
            });
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function (){
            {{--$('.addtoCard').on('click', function (){--}}
            {{--    var id = $(this).data('id');--}}
            {{--    if(id){--}}
            {{--        $.ajax({--}}
            {{--            type    : "GET",--}}
            {{--            url     : "{{ url('/addtocart/') }}/"+id,--}}
            {{--            dataType: "JSON",--}}
            {{--            success : (data) => {--}}
            {{--                const Toast = Swal.mixin({--}}
            {{--                    toast: true,--}}
            {{--                    position: 'top-end',--}}
            {{--                    showConfirmButton: false,--}}
            {{--                    timer: 3000,--}}
            {{--                    timerProgressBar: false,--}}
            {{--                    onOpen: (toast) => {--}}
            {{--                        toast.addEventListener('mouseenter', Swal.stopTimer)--}}
            {{--                        toast.addEventListener('mouseleave', Swal.resumeTimer)--}}
            {{--                    }--}}
            {{--                });--}}

            {{--                if ($.isEmptyObject(data.error)){--}}
            {{--                    Toast.fire({--}}
            {{--                        icon: 'success',--}}
            {{--                        title: data.success--}}
            {{--                    })--}}
            {{--                }else{--}}
            {{--                    Toast.fire({--}}
            {{--                        icon: 'success',--}}
            {{--                        title: data.error--}}
            {{--                    })--}}
            {{--                }--}}
            {{--            }--}}
            {{--        });--}}
            {{--    }--}}
            {{--});--}}


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
        });
    </script>
@stop
