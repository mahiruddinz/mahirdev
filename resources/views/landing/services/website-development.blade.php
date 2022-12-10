@extends('landing.master')
@section('content')
<section id="home" class="hero-area style1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-12">
                <div class="hero-content wow fadeInLeft" data-wow-delay=".3s">
                    <h1>Take your brand to <span class="text-success">Grow & Clean!</span></h1>
                    <p class="text-dark">Raih pertumbuhan optimal Anda melalui Branding Protection dengan strategi yang untuk menjaga kualitas & reputasi brand Anda.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <div class="hero-image wow fadeInRight" data-wow-delay=".4s">
                <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_zxau6gfz.json"  background="transparent"  speed="1"  loop autoplay></lottie-player>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="services style3 section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-4">
                    <h3 class="fw-bold mb-2" data-wow-delay=".4s">Branding Protection Strategy & Placement</h3>
                    <p>Periklanan Digital memungkinkan Anda menghemat anggaran serupa, tetapi mendapatkan dampak optimal.</span>
                </div>
            </div>
        </div>
        <div class="single-head">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-service wow fadeInUp" data-wow-delay=".2s">
                        <img src="{{ URL::asset('landing/assets/images/seo.png') }}" class="mb-4" height="60">
                        <h6 class="text-dark"><a href="#"><b>Issue Monitoring</b></a></h6>
                        <p>Dengan alat & teknologi kami akan membantu anda untuk memantau segala hal tentang brand anda.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-service wow fadeInUp" data-wow-delay=".4s">
                        <img src="{{ URL::asset('landing/assets/images/laptop.png') }}" class="mb-4" height="60">
                        <h6 class="text-dark"><a href="#"><b>Quick Action</b></a></h6>
                        <p>Tim bergerak cepat untuk mengatasi masalah komunikasi ataupun issue mengenai brand</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-service wow fadeInUp" data-wow-delay=".6s">
                        <img src="{{ URL::asset('landing/assets/images/light-bulb.png') }}" class="mb-4" height="60">
                        <h6 class="text-dark"><a href="#"><b>Updates & Report</b></a></h6>
                        <p>Kami menyediakan aplikasi teknis mengenai update laporan untuk membuat Anda up to date!</p>
                    </div>>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="overview" class="app-info section">
    <div class="container">
        <div class="info-one">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">

                    <div class="info-text wow fadeInLeft" data-wow-delay=".3s">
                        <div class="main-icon">
                            <i class="lni lni-angellist"></i>
                        </div>
                        <h2>Leave it to our professional team!</h2>
                        <h6 class="text-dark" style="line-height: 25px">Besar, kecil, sedang tidaklah penting. Tim kami tetap proffesional terhadap klien untuk merekomendasikan strategi dan solusi atas issue yang ada.
                        </h6>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="info-image wow fadeInRight" data-wow-delay=".5s">
                        <img class="ss1" src="{{ URL::asset('landing/assets/images/app-ss/l2-hero-image.png') }}" alt="#">
                    </div>
                </div>
            </div>
        </div>
        <div class="info-one style2">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="hero-image wow fadeInLeft" data-wow-delay=".3s">
                        <img class="ss2" style="border: 1px solid; padding: 10px; box-shadow: 5px 10px;" src="{{ URL::asset('landing/assets/images/dashboard.png') }}" alt="#">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">

                    <div class="info-text wow fadeInRight" data-wow-delay=".5s">
                        <div class="main-icon">
                            <i class="lni lni-layout"></i>
                        </div>
                        <h2>Base Data Dashboard</h2>
                        <h6 class="text-dark" style="line-height: 25px">Anda bisa mengakses aktifitas dan strategi yang akan dijalankan tanpa perlu menunggu, kapan saja & dimana saja. Sangat praktis, bukan?</h6>

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
                    <a href="javascript:void(0)" class="btn">Konsultasikan Brand Kamu
                </div>
            </div>
        </div>
    </div>
</section>
@endsection