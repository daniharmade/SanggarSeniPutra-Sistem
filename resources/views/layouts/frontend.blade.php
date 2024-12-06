<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    
  <title>@yield('title')</title>

  @stack('before-style')
  @include('includes.frontend.style')
  @stack('after-style')

  
</head>


<body>
      <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area ">
                <div class="container-fluid p-0">
                    <div class="row align-items-center justify-content-between no-gutters">
                        <div class="col-xl-4 col-lg-4">
                            <div class="logo-img">
                                <a href="{{ url('/') }}">
                                    <p style="color: white;font-weight: bold;font-size:24px">Sanggar Seni Putra Karuhun </p>
                                    {{-- <img src="{{ asset('sanggar/img/logo.png') }}" alt=""> --}}
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="{{ url('/') }}">home</a></li>
                                        <li><a href="Schedule.html">List Kesenian</a></li>
                                        {{-- <li><a href="#">blog <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">blog</a></li>
                                                <li><a href="single-blog.html">single-blog</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="elements.html">elements</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="Speakers.html">Speakers</a></li>
                                        <li><a href="Venue.html">Venue</a></li> --}}
                                        <li><a href="contact.html">Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 d-none d-lg-block">
                            <div class="buy_ticket">
                                <a href="{{ url('login') }}" class="boxed-btn-white">Sewa</a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- slider_area_start -->
    <div class="slider_area slider_bg_1">
        <div class="slider_text">
            <div class="container">
                <div class="position_relv">
                    <h1 class="opcity_text d-none d-lg-block">Penyewaaan</h1>
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="title_text">
                                <h3>Sanggar Seni  <br>
                                    Putra Karuhun</h3>
                                {{-- <a href="#" class="boxed-btn-white">Add to your Calendar</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="countDOwn_area d-none">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="single_date">
                            <i class="ti-location-pin"></i>
                            <span>City Hall, New York City</span>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="single_date">
                            <i class="ti-alarm-clock"></i>
                            <span>12-15 Sep 2019</span>
                        </div>
                    </div>

                    <div class="col-xl-5 col-md-12 col-lg-5">
                        <span id="clock"></span>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <div class="about_area">
        {{-- <div class="shape-1 d-none d-xl-block">
            <img src="{{ asset('sanggar/img/sanggar/sanggar-utama.jpeg') }}" alt="">
        </div> --}}
        {{-- <div class="shape-2 d-none d-xl-block">
            <img src="{{ asset('sanggar/img/sanggar/sanggar-utama.jpeg') }}" alt="">
        </div> --}}
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-md-12">
                    <div class="about_thumb" style="position: relative;">
                        <img src="{{ asset('sanggar/img/sanggar/sanggar-utama.jpeg') }}" alt="">
                        <a href="{{ url('login') }}" class="boxed-btn-white btn btn-primary" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                            Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .event_area .container .row.no-gutters {
    margin-right: 0;
    margin-left: 0;
}

.event_area .container .row.no-gutters > [class*='col-'] {
    padding-right: 0;
    padding-left: 0;
}

.about_thumb {
    width: 100%;
    overflow: hidden;
}

.about_thumb img {
    width: 100%;
    height: auto;
    display: block;
}

    </style>
    <!-- event_area_start -->
    <div class="event_area">
        <div class="container">
            <div class="row align-items-center no-gutters">
                <div class="col-xl-4 col-md-4">
                    <div class="about_thumb">
                        <img src="{{ asset('sanggar/img/sanggar/1.jpeg') }}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="about_thumb">
                        <img src="{{ asset('sanggar/img/sanggar/2.jpeg') }}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="about_thumb">
                        <img src="{{ asset('sanggar/img/sanggar/3.jpeg') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- about_area_end -->

    <!-- speakers_start -->
    <div class="speakers_area">
        <h1 class="horizontal_text d-none d-lg-block">
            Kesenian
        </h1>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="serction_title_large mb-95">
                        <h3>
                            List Kesenian
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-5 col-md-6">
                    <div class="single_speaker">
                        <div class="speaker_thumb">
                            <img src="{{ asset('sanggar/img/sanggar/1.jpeg') }}" alt="">
                            <div class="hover_overlay">
                                <div class="social_icon">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="speaker_name text-center">
                            <h3>Jonson Miller</h3>
                            <p>Creative Director</p>
                        </div>
                    </div>
                    <div class="single_speaker">
                        <div class="speaker_thumb">
                            <img src="{{ asset('sanggar/img/sanggar/2.jpeg') }}" alt="">
                            <div class="hover_overlay">
                                <div class="social_icon">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="speaker_name text-center">
                            <h3>Albert Jackey</h3>
                            <p>Product Designer</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-2 col-md-6">
                    <div class="single_speaker">
                        <div class="speaker_thumb">
                            <img src="{{ asset('sanggar/img/sanggar/3.jpeg') }}" alt="">
                            <div class="hover_overlay">
                                <div class="social_icon">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="speaker_name text-center">
                            <h3>Marked Macau</h3>
                            <p>UI/UX Designer</p>
                        </div>
                    </div>
                    <div class="single_speaker">
                        <div class="speaker_thumb">
                            <img src="{{ asset('sanggar/img/sanggar/4.jpeg') }}" alt="">
                            <div class="hover_overlay">
                                <div class="social_icon">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="speaker_name text-center">
                            <h3>Kelvin Cooper</h3>
                            <p>Art Director</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- speakers_end-->

    <!-- event_area_start -->
    <div class="event_area" style="display: none">
        <h1 class="vr_text d-none d-lg-block">Event Schedule</h1>
        <div class="container">
            <div class="double_line">
                <div class="row">
                    <div class="col-xl-3 col-lg-3">
                        <div class="date">
                            <h3>08 Sep 2019</h3>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9">
                        <div class="single_speaker">
                            <img src="{{ asset('sanggar/img/speakers/seaker1.png') }}" alt="">
                            <div class="speaker-name">
                                <div class="heading d-flex justify-content-between align-items-center">
                                    <span>Jonson Miller</span>
                                    <div class="time">
                                        10-11 am
                                    </div>
                                </div>
                                <p>Our set he for firmament morning sixth subdue darkness creeping gathered divide our
                                    let
                                    god moving.
                                    Moving in fourth air night bring upon you’re it beast let you dominion </p>
                            </div>
                        </div>
                        <div class="single_speaker">
                            <img src="{{ asset('sanggar/img/speakers/seaker2.png') }}" alt="">
                            <div class="speaker-name">
                                <div class="heading d-flex justify-content-between align-items-center">
                                    <span>Albert Jackey</span>
                                    <div class="time">
                                        12-1.00 pm
                                    </div>
                                </div>
                                <p>Our set he for firmament morning sixth subdue darkness creeping gathered divide our
                                    let
                                    god moving.
                                    Moving in fourth air night bring upon you’re it beast let you dominion </p>
                            </div>
                        </div>
                        <div class="single_speaker">
                            <img src="{{ asset('sanggar/img/speakers/seaker3.png') }}" alt="">
                            <div class="speaker-name">
                                <div class="heading d-flex justify-content-between align-items-center">
                                    <span>Alvi Nourin</span>
                                    <div class="time">
                                        2.30-4.00 pm
                                    </div>
                                </div>
                                <p>Our set he for firmament morning sixth subdue darkness creeping gathered divide our
                                    let
                                    god moving.
                                    Moving in fourth air night bring upon you’re it beast let you dominion </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3">
                    <div class="date">
                        <h3>09 Sep 2019</h3>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9">
                    <div class="single_speaker">
                        <img src="{{ asset('sanggar/img/speakers/seaker4.png') }}" alt="">
                        <div class="speaker-name">
                            <div class="heading d-flex justify-content-between align-items-center">
                                <span>Marked Macau</span>
                                <div class="time">
                                    10-11 am
                                </div>
                            </div>
                            <p>Our set he for firmament morning sixth subdue darkness creeping gathered divide our let
                                god moving.
                                Moving in fourth air night bring upon you’re it beast let you dominion </p>
                        </div>
                    </div>
                    <div class="single_speaker">
                        <img src="{{ asset('sanggar/img/speakers/seaker5.png') }}" alt="">
                        <div class="speaker-name">
                            <div class="heading d-flex justify-content-between align-items-center">
                                <span>Jonson Miller</span>
                                <div class="time">
                                    12-1.00 pm
                                </div>
                            </div>
                            <p>Our set he for firmament morning sixth subdue darkness creeping gathered divide our let
                                god moving.
                                Moving in fourth air night bring upon you’re it beast let you dominion </p>
                        </div>
                    </div>
                    <div class="single_speaker">
                        <img src="{{ asset('sanggar/img/speakers/seaker6.png') }}" alt="">
                        <div class="speaker-name">
                            <div class="heading d-flex justify-content-between align-items-center">
                                <span>Jonson Miller</span>
                                <div class="time">
                                    2.30-4.00 pm
                                </div>
                            </div>
                            <p>Our set he for firmament morning sixth subdue darkness creeping gathered divide our let
                                god moving.
                                Moving in fourth air night bring upon you’re it beast let you dominion </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- event_area_end -->

    
    <!-- resister_book_start -->
    <div class="resister_book resister_bg_1" >
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="resister_text text-center">
                        <h3>Sewa <br>
                            Kesenian</h3>
                        <a href="{{ url('login') }}" class="boxed-btn-white">Sewa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- resister_book_end -->

    <!-- brand_area_start -->
    <div class="brand_area" style="display: none">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="brand_active owl-carousel">
                        <div class="single_brand text-center">
                            <img src="{{ asset('sanggar/img/barnd/1.png') }}" alt="">
                        </div>
                        <div class="single_brand text-center">
                            <img src="{{ asset('sanggar/img/barnd/2.png') }}" alt="">
                        </div>
                        <div class="single_brand text-center">
                            <img src="{{ asset('sanggar/img/barnd/3.png') }}" alt="">
                        </div>
                        <div class="single_brand text-center">
                            <img src="{{ asset('sanggar/img/barnd/4.png') }}" alt="">
                        </div>
                        <div class="single_brand text-center">
                            <img src="{{ asset('sanggar/img/barnd/5.png') }}" alt="">
                        </div>
                        <div class="single_brand text-center">
                            <img src="{{ asset('sanggar/img/barnd/6.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand_area_end -->

    <!-- faq_area_Start -->
    <div class="faq_area" style="display: none">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="serction_title_large mb-95">
                        <h3>
                            Frequently Ask
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

                                        <img src="{{ asset('sanggar/img/barnd/info.png') }}" alt=""> Is WordPress hosting worth it?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"
                                style="">
                                <div class="card-body">
                                    Our set he for firmament morning sixth subdue darkness creeping gathered divide our
                                    let god moving. Moving in fourth air night bring upon
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        <img src="{{ asset('sanggar/img/barnd/info.png') }}" alt="">What are the advantages <span>of WordPress
                                            hosting over shared?</span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordion" style="">
                                <div class="card-body">
                                    Our set he for firmament morning sixth subdue darkness creeping gathered divide our
                                    let god moving. Moving in fourth air night bring upon
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        <img src="{{ asset('sanggar/img/barnd/info.png') }}" alt=""> Where the Venue?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordion" style="">
                                <div class="card-body">
                                    Our set he for firmament morning sixth subdue darkness creeping gathered divide our
                                    let god moving. Moving in fourth air night bring upon
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading_4">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapse_4" aria-expanded="false" aria-controls="collapse_4">
                                        <img src="{{ asset('sanggar/img/barnd/info.png') }}" alt=""> How can I attend <span>the Event from
                                            Asia?</span>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse_4" class="collapse" aria-labelledby="heading_4" data-parent="#accordion"
                                style="">
                                <div class="card-body">
                                    Our set he for firmament morning sixth subdue darkness creeping gathered divide our
                                    let god moving. Moving in fourth air night bring upon
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- faq_area_end -->

    <!-- footer_start -->
    <footer class="footer footer_bg_1">
        <div class="circle_ball d-none d-lg-block">
            <img src="{{ asset('sanggar/img/banner/footer_ball.png') }}" alt="">
        </div>
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-md-4 col-lg-4">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                        Follow Us
                                </h3>
                                <ul>
                                    <li><a target="_blank" href="#">Facebook</a></li>
                                    <li><a target="_blank" href="#">Twitter</a></li>
                                    <li><a target="_blank" href="#">Instagram</a></li>
                                    <li><a target="_blank" href="#">Youtube</a></li>
                                </ul>
    
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-lg-4">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                        Links
                                </h3>
                                <ul>
                                    <li><a target="_blank" href="schedule.html">Schedule</a></li>
                                    <li><a target="_blank" href="speakers.html">Speakers</a></li>
                                    <li><a target="_blank" href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 col-lg-4">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                        Venue
                                </h3>
                                <p>
                                    200, D-block, Green lane USA <br>
                                    edumark@contact.com <br>
                                    +10 367 467 8934
                                    
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-right_text">
                <div class="container">
                    <div class="footer_border"></div>
                    <div class="row">
                        <div class="col-xl-12">
                            <p class="copy_right text-center">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    <!-- footer_end -->

  <div id="app">
    <div class="main-wrapper">
        @yield('content')
    </div>
  </div>
</body>

@stack('before-script')
@include('includes.frontend.script')
@stack('after-script')

</html>