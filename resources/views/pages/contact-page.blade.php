@extends('layouts.app')
@section('css_link')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css')}}">
@endsection
@section('title', 'Contact Page')
@section('content')

    <!-- Contact Info -->

    <div class="contact_info">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

                        <!-- Contact Item -->
                        <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                            <div class="contact_info_image"><img src="images/contact_1.png" alt=""></div>
                            <div class="contact_info_content">
                                <div class="contact_info_title">Phone</div>
                                <div class="contact_info_text">+38 068 005 3570</div>
                            </div>
                        </div>

                        <!-- Contact Item -->
                        <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                            <div class="contact_info_image"><img src="images/contact_2.png" alt=""></div>
                            <div class="contact_info_content">
                                <div class="contact_info_title">Email</div>
                                <div class="contact_info_text">fastsales@gmail.com</div>
                            </div>
                        </div>

                        <!-- Contact Item -->
                        <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                            <div class="contact_info_image"><img src="images/contact_3.png" alt=""></div>
                            <div class="contact_info_content">
                                <div class="contact_info_title">Address</div>
                                <div class="contact_info_text">10 Suffolk at Soho, London, UK</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Form -->

    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="contact_form_container">
                        <div class="contact_form_title">Get in Touch</div>

                        <form method="POST" action="{{ route('send.message') }}" id="contact_form">
                            @csrf
                            <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                <input type="text" id="contact_form_name" class="contact_form_name input_field" name="name" placeholder="Your name" required="required" data-error="Name is required.">
                                <input type="email" id="contact_form_email" name="email" class="contact_form_email input_field" placeholder="Your email" required="required" data-error="Email is required.">
                                <input type="text" id="contact_form_phone" name="phone" class="contact_form_phone input_field" placeholder="Your phone number">
                            </div>
                            <div class="contact_form_text">
                                <textarea id="contact_form_message" name="message" class="text_field contact_form_message" name="message" rows="4" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
                            </div>
                            <div class="contact_form_button">
                                <button type="submit" class="button contact_submit_button">Send Message</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Map -->

    <div class="contact_map mt-5">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29194.780964170433!2d90.33801303193816!3d23.841786810826292!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c14a03cac2f3%3A0x9ed3919c3c9f3f5e!2sWeb%20Coder%20Partha!5e0!3m2!1sen!2sbd!4v1599060856912!5m2!1sen!2sbd" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>

@stop

