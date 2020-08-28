@extends('layouts.app')
@section('css_link')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/blog_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/blog_responsive.css')}}">
@endsection
@section('title', 'Blog Page')
@section('content')

    <div class="home">
        <div class="home_background parallax-window"></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">Technological Blog</h2>
        </div>
    </div>

    <!-- Blog -->

    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="blog_posts d-flex flex-row align-items-start justify-content-between">
                        @foreach($posts as $post)
                        <!-- Blog post -->
                        <div class="blog_post">
                            <div class="blog_image" style="background-image:url({{ asset($post->post_image) }})"></div>
                            <div class="blog_text">
                                @if(Session::get('language') == 'hindi')
                                    {{ $post->post_title_in }}
                                @else
                                    {{ $post->post_title_en }}
                                @endif
                            </div>
                            <div class="blog_button"><a href="{{ route('single.post',$post->id) }}">
                                    @if(Session::get('language') == 'hindi')
                                        পড়া চালিয়ে যান
                                        @else
                                        Continue Reading
                                    @endif
                                </a></div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>


@stop

@section('scripts')
    <script src="{{ asset('frontend/js/blog_custom.js')}}"></script>
@stop
