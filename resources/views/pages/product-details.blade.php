@extends('layouts.app')
@section('css_link')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_responsive.css')}}">
@endsection
@section('title', $product->product_name)
@section('content')
    <div class="single_product" style="padding-bottom: 100px">
        <div class="container">
            <div class="row">

                <!-- Images -->
                <div class="col-lg-2 order-lg-1 order-2">
                    <ul class="image_list">
                        <li data-image="{{ asset($product->image_one) }}"><img src="{{ asset($product->image_one) }}" alt=""></li>
                        <li data-image="{{ asset($product->image_two) }}"><img src="{{ asset($product->image_two) }}" alt=""></li>
                        <li data-image="{{ asset($product->image_three) }}"><img src="{{ asset($product->image_three) }}" alt=""></li>
                    </ul>
                </div>

                <!-- Selected Image -->
                <div class="col-lg-5 order-lg-2 order-1">
                    <div class="image_selected"><img src="{{ asset($product->image_one) }}" alt=""></div>
                </div>
                <!-- Description -->
                <div class="col-lg-5 order-3">
                    <div class="product_description">
                        <div class="product_category">{{ $product->category->category_name }} > {{ $product->subcategory->subcategory_name }}</div>
                        <div class="product_name">{{ $product->product_name }}</div>
                        <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                        <div class="product_text"><p>{!! Str::limit($product->product_details, 600) !!}</p></div>
                        <div class="order_info d-flex flex-row">
                            <form action="#">
                               <div class="row">
                                   @if($product->product_color == NULL)
                                       @else
                                   <div class="col-lg-4">
                                       <div class="form-group color">
                                           <label for="color">Color:</label>
                                           <select name="color" id="color" class="form-control" style="min-width: 120px !important; margin-left: 0px">
                                               @foreach($product_color as $color)
                                               <option value="{{Str::lower($color)}}">{{$color}}</option>
                                               @endforeach
                                           </select>
                                       </div>
                                   </div>
                                   @endif
                                   @if($product->product_size == NULL)
                                       @else
                                   <div class="col-lg-4">
                                       <div class="form-group">
                                           <label for="size">Size:</label>
                                           <select name="size" id="size" class="form-control" style="min-width: 120px !important; margin-left: 0px">
                                               @foreach($product_size as $size)
                                               <option value="{{ Str::lower($size) }}">{{$size}}</option>
                                              @endforeach
                                           </select>
                                       </div>
                                   </div>
                                   @endif
                                   <div class="col-lg-4">
                                       <div class="form-group">
                                           <label for="qty">Quantity:</label>
                                           <input class="form-control" id="qty" value="1" type="number" min="1" pattern="[1-9]" name="qty">
                                       </div>
                                   </div>
                               </div>

                                @if($product->discount_price == NULL)
                                    <div class="product_price">{{ $product->selling_prize }}</div>

                                @else
                                    <div class="product_price discount">{{ $product->discount_price }}</div>
                                    <div class="product_price"><del>{{ $product->selling_prize }}</del></div>
                                 @endif
                                <div class="button_container">
                                    <button type="button" class="button cart_button">Add to Cart</button>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

        <div class="container mb-5">
            <div class="row">
                <div class="col-md-12">
                    <nav>
                        <div class="nav nav-tabs mb-2" id="nav-tab" role="tablist">
                            <a style="font-size: 18px" class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Product Details</a>
                            <a style="font-size: 18px" class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Video</a>
                            <a style="font-size: 18px" class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Reviews</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                          {!! $product->product_details !!}
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            @if($product->video_link == NULL)

                            @else
                                <iframe width="600" height="400" src="{{ $product->video_link }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
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

                            <!-- Recently Viewed Item -->
                            <div class="owl-item">
                                <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="images/view_1.jpg" alt=""></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">$225<span>$300</span></div>
                                        <div class="viewed_name"><a href="#">Beoplay H7</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>


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

                            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_1.jpg" alt=""></div></div>
                            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_2.jpg" alt=""></div></div>
                        </div>

                        <!-- Brands Slider Navigation -->
                        <div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script src="{{ asset('frontend/js/product_custom.js')}}"></script>
@stop
