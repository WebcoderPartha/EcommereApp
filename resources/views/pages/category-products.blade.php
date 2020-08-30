@extends('layouts.app')
@section('css_link')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/shop_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/shop_responsive.css')}}">
    <style>
        .product_item {
            display: inline-block;}
    </style>
@endsection
@section('title', $category->category_name.' - Products')
@section('content')

    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">{{ $category->category_name }}</h2>
        </div>
    </div>

    <!-- Category -->

    <div class="shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">

                    <!-- Shop Sidebar -->
                    <div class="shop_sidebar">
                        <div class="sidebar_section">
                            <div class="sidebar_title">Categories</div>
                            <ul class="sidebar_categories">
                                @foreach($categories as $category)
                                    <li><a href="{{ route('category.products', $category->id) }}">{{ $category->category_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar_section filter_by_section">
                            <div class="sidebar_title">Filter By</div>
                            <div class="sidebar_subtitle">Price</div>
                            <div class="filter_price">
                                <div id="slider-range" class="slider_range"></div>
                                <p>Range: </p>
                                <p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
                            </div>
                        </div>
                        <div class="sidebar_section">
                            <div class="sidebar_subtitle color_subtitle">Color</div>
                            <ul class="colors_list">
                                <li class="color"><a href="#" style="background: #b19c83;"></a></li>
                                <li class="color"><a href="#" style="background: #000000;"></a></li>
                                <li class="color"><a href="#" style="background: #999999;"></a></li>
                                <li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
                                <li class="color"><a href="#" style="background: #df3b3b;"></a></li>
                                <li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
                            </ul>
                        </div>
                        <div class="sidebar_section">
                            <div class="sidebar_subtitle brands_subtitle">Brands</div>
                            <ul class="brands_list">
                                @foreach($brands as $brand)
                                    <li class="brand"><a href="#">{{ $brand->brand->brand_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="col-lg-9">

                    <!-- Shop Content -->

                    <div class="shop_content">
                        <div class="shop_bar clearfix">
                            <div class="shop_product_count"><span>{{ count($category_prooduct) }}</span> products found</div>
                            <div class="shop_sorting">
                                <span>Sort by:</span>
                                <ul>
                                    <li>
                                        <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
                                        <ul>
                                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
                                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
                                            <li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product_grid">
                            <div class="product_grid_border"></div>
                    @if(count($category_prooduct) > 0)
                        @foreach($category_prooduct as $product)
                            <!-- Product Item -->
                                <div class="product_item is_new">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset($product->image_one) }}" width="115" height="115" alt=""></div>
                                    <div class="product_content">
                                        @if($product->discount_price == NULL)
                                            <div class="product_price discount">BDT{{$product->selling_prize}}</div>
                                        @else
                                            <div class="product_price discount">BDT{{$product->discount_price}}<span>BDT{{$product->selling_prize}}</span></div>
                                        @endif
                                        <div class="product_name"><div><a href="{{ route('product.details', [$product->id, $product->product_name]) }}" tabindex="0">{{ $product->product_name }}</a></div></div>
                                    </div>
                                    <button class="addwishlist" style="border: 0; cursor: pointer" data-id="{{$product->id}}"><div class="product_fav"><i class="fas fa-heart"></i></div></button>
                                    <ul class="product_marks">
                                        @if($product->discount_price == NULL)
                                            <li class="product_mark product_new">new</li>
                                        @else
                                            @php
                                                $amound = $product->selling_prize - $product->discount_price;
                                                $discount = $amound/$product->selling_prize*100;
                                            @endphp
                                            <li class="product_mark product_new" style="background: darkred">{{ intval($discount) }}%</li>
                                        @endif

                                    </ul>
                                </div>
                            @endforeach
                        @else
                            <h2 class="text-center p-4">Empty</h2>
                        @endif
                        </div>

                        <!-- Shop Page Navigation -->

                        <div class="shop_page_nav d-flex flex-row">
                            {{ $category_prooduct->links() }}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script src="{{ asset('frontend/js/shop_custom.js')}}"></script>
@stop
