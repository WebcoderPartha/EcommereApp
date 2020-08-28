@extends('layouts.app')
@section('css_link')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/blog_single_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/blog_single_responsive.css')}}">

@endsection
@section('title')
    @if(Session::get('language') == 'hindi')
    {{ $post->post_title_in }}
    @else
        {{ $post->post_title_en }}
    @endif
@stop
@section('content')
    <div class="home">
        <div class="home_background parallax-window text-center"><img src="{{ asset($post->post_image) }}" height="400" alt=""></div>
    </div>

    <!-- Single Blog Post -->

    <div class="single_post mt-0 p-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">

                @if(Session::get('language') == 'hindi')
                    <div class="single_post_title">{{ $post->post_title_in }}</div>
                    <div class="single_post_text">
                        <p>{!! $post->details_in !!}</p>
                    </div>
                @else
                    <div class="single_post_title">{{ $post->post_title_en }}</div>
                    <div class="single_post_text">
                        <p>{!! $post->details_en !!}</p>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>



@stop

@section('scripts')
    <script src="{{ asset('frontend/js/blog_single_custom.js')}}"></script>
@stop
