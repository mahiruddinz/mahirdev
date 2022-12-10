@extends('landing.master')
@section('content')
<section id="home" class="hero-area style1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-12">
                <div class="hero-content wow fadeInLeft" data-wow-delay=".3s">
                    <h1>Creative Solutions For Everyone </h1>
                    <p class="text-dark">PT Digital Indonesia Bersatu is your future digital marketing partner with a team of professionals that builds an branding profile to enhance brand growth every step of the way.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <div class="hero-image wow fadeInRight" data-wow-delay=".4s">
                <img src="{{ URL::asset('landing/assets/images/hero/branding.png') }}" alt="#">
                </div>
            </div>
        </div>
    </div>
</section>


<div class="client-logo-section">
    <div class="container">
        <div class="client-logo-wrapper">
            <div class="client-logo-carousel d-flex align-items-center justify-content-between">
                <div class="client-logo">
                    <img src="{{ URL::asset('landing/assets/images/client-logo/client-1.svg') }}" alt="#">
                </div>
                <div class="client-logo">
                    <img src="{{ URL::asset('landing/assets/images/client-logo/client-2.svg') }}" alt="#">
                </div>
                <div class="client-logo">
                    <img src="{{ URL::asset('landing/assets/images/client-logo/client-3.svg') }}" alt="#">
                </div>
                <div class="client-logo">
                    <img src="{{ URL::asset('landing/assets/images/client-logo/client-4.svg') }}" alt="#">
                </div>
                <div class="client-logo">
                    <img src="{{ URL::asset('landing/assets/images/client-logo/client-5.svg') }}" alt="#">
                </div>
                <div class="client-logo">
                    <img src="{{ URL::asset('landing/assets/images/client-logo/client-6.svg') }}" alt="#">
                </div>
            </div>
        </div>
    </div>
</div>


<section class="services style3 section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3 class="wow zoomIn" data-wow-delay=".2s">Services</h3>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">What we offer</h2>
                </div>
            </div>
        </div>
        <div class="single-head">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-service wow fadeInUp" data-wow-delay=".2s">
                        <img src="{{ URL::asset('landing/assets/images/seo.png') }}" class="mb-4" height="60">
                        <h6><a href="service-details.html"><b>Search Engine Optimization</b></a></h6>
                        <p>Tingkatkan awareness dari brand kamu dengan optimasi mesin pencari</p>
                        <div class="button">
                            <a href="service-details.html" class="link fw-bold">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-service wow fadeInUp" data-wow-delay=".4s">
                        <img src="{{ URL::asset('landing/assets/images/laptop.png') }}" class="mb-4" height="60">
                        <h6><a href="service-details.html"><b>Website Development</b></a></h6>
                        <p>Buat website untuk brand maupun company profile kamu dengan design yang menarik</p>
                        <div class="button">
                            <a href="service-details.html" class="link fw-bold">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-service wow fadeInUp" data-wow-delay=".6s">
                        <img src="{{ URL::asset('landing/assets/images/light-bulb.png') }}" class="mb-4" height="60">
                        <h6><a href="service-details.html"><b>Branding Protection</b></a></h6>
                        <p>Kami berintegritas untuk menjaga dan mengelola reputasi dari sebuah brand</p>
                        <div class="button">
                            <a href="service-details.html" class="link fw-bold">Read More</a>
                        </div>
                    </div>>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-service wow fadeInUp" data-wow-delay=".2s">
                        <img src="{{ URL::asset('landing/assets/images/seo.png') }}" class="mb-4" height="60">
                        <h6><a href="service-details.html"><b>Media Press Release</b></a></h6>
                        <p>Kami menyediakan jasa <i>Media Invitation</i> &  <i>Press Conference</i> untuk event / brand anda</p>
                        <div class="button">
                            <a href="service-details.html" class="btn btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-service wow fadeInUp" data-wow-delay=".4s">
                        <img src="{{ URL::asset('landing/assets/images/seo.png') }}" class="mb-4" height="60">
                        <h6><a href="service-details.html"><b>KOL & Influencer Management</b></a></h6>
                        <p>Kami memiliki koneksi lebih dari 1000+ influencer untuk endorse maupun support campaign anda</p>
                        <div class="button">
                            <a href="service-details.html" class="btn btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-service wow fadeInUp" data-wow-delay=".6s">
                        <img src="{{ URL::asset('landing/assets/images/seo.png') }}" class="mb-4" height="60">
                        <h6><a href="service-details.html"><b>Buzzer Outsourcing</b></a></h6>
                        <p>Memiliki koneksi lebih dari 1000+ buzzer untuk reviewing maupun support brand awareness anda</p>
                        <div class="button">
                            <a href="service-details.html" class="btn btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="about" class="about section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-12">
                <div class="image wow fadeInLeft" data-wow-delay=".3s">
                    <img class="main-image" src="{{ URL::asset('landing/assets/images/about/about-image.png') }}" alt="#">
                    <div class="img2"></div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <div class="content wow fadeInRight" data-wow-delay=".5s">
                    <div class="heading">
                        <h2>People choose us because of our service</h2>
                        <p>Client kami memberikan kepercayaan yang tinggi untuk mensukseskan tujuan jangka panjang. </p>
                    </div>
                    <div class="list">

                        <div class="single-list">
                            <i class="lni lni-bolt"></i>
                            <h4>Customer Oriented</h4>
                            <p>Consumers are the heart of business. There is no business without consumers. Our team is 110% committed to providing the best service.
                            </p>
                        </div>


                        <div class="single-list">
                            <i class="lni lni-grid-alt"></i>
                            <h4>Industry-leading Consultant                                </h4>
                            <p>We continue to research and innovate on technological developments and develop our own technology to support this.
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="team" class="team section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Our team</h2>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-team wow fadeInUp" data-wow-delay=".2s">

                    <div class="image">
                        <img src="{{ URL::asset('landing/assets/images/team/gianeoo.png') }}" alt="#">

                        <ul class="social">
                            <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-behance-original"></i></a></li>
                        </ul>

                    </div>

                    <div class="info-head">

                        <div class="info-box">
                            <h4 class="name"><a href="javascript:void(0)">Dahlia Moore</a></h4>
                            <span class="designation">Senior Manager</span>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-team wow fadeInUp" data-wow-delay=".4s">

                    <div class="image">
                        <img src="{{ URL::asset('landing/assets/images/team/andi.png') }}" alt="#">

                        <ul class="social">
                            <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-behance-original"></i></a></li>
                        </ul>

                    </div>

                    <div class="info-head">

                        <div class="info-box">
                            <h4 class="name"><a href="javascript:void(0)">Jhone digo</a></h4>
                            <span class="designation">Markeitng</span>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-team wow fadeInUp" data-wow-delay=".6s">

                    <div class="image">
                        <img src="{{ URL::asset('landing/assets/images/team/team3.jpg') }}" alt="#">

                        <ul class="social">
                            <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-behance-original"></i></a></li>
                        </ul>

                    </div>

                    <div class="info-head">

                        <div class="info-box">
                            <h4 class="name"><a href="javascript:void(0)">Zara tingo</a></h4>
                            <span class="designation">Web Developer</span>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
                <div class="single-team wow fadeInUp" data-wow-delay=".8s">

                    <div class="image">
                        <img src="{{ URL::asset('landing/assets/images/team/team4.jpg') }}" alt="#">

                        <ul class="social">
                            <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-behance-original"></i></a></li>
                        </ul>

                    </div>

                    <div class="info-head">

                        <div class="info-box">
                            <h4 class="name"><a href="javascript:void(0)">David Zone</a></h4>
                            <span class="designation">SEO Expert</span>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="call-action">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-12">
                <div class="text">
                    <h2>Ready to dive in?<span class="">Start your consultation today.</span>
                    </h2>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="button">
                    <a href="javascript:void(0)" class="btn">Free Consultation
                </div>
            </div>
        </div>
    </div>
</section>
@endsection