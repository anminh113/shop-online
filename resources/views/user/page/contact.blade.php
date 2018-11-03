@extends('user/master')
@section('head')
    <link rel="stylesheet" type="text/css" href="source/user/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="source/user/styles/contact_styles.css">
    <link rel="stylesheet" type="text/css" href="source/user/styles/shop_styles.css">
    <link rel="stylesheet" type="text/css" href="source/user/styles/shop_responsive.css">
    <link rel="stylesheet" type="text/css" href="source/user/styles/css/header_css.css">
    <link rel="stylesheet" type="text/css" href="source/user/styles/css/index.css">



@endsection
@section('content')

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
                        <form action="#" id="contact_form">
                            <div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
                                <input type="text" id="contact_form_name" class="contact_form_name input_field" placeholder="Your name" required="required" data-error="Name is required.">
                                <input type="email" id="contact_form_email" class="contact_form_email input_field" placeholder="Your email" required="required" data-error="Email is required.">
                                <input type="text" id="contact_form_phone" class="contact_form_phone input_field" placeholder="Your phone number">
                            </div>
                            <div class="contact_form_text">
                                <textarea id="contact_form_message" class="text_field contact_form_message" name="message" rows="4" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
                            </div>
                            <div class="contact_form_button">
                                <button type="submit" class="button contact_submit_button">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>
    <!-- Map -->
    <div class="contact_map">
        <div id="google_map" class="google_map">
            <div class="map_container">
                <div id="map"></div>
            </div>
        </div>
    </div>




    @include('user/RecentlyViewed')
    @include('user/Brands')
@endsection


@section('footer')

    <script src="source/user/plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="source/user/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>

    <script src="source/user/plugins/parallax-js-master/parallax.min.js"></script>
    <script src="source/user/js/custom.js"></script>



@endsection
