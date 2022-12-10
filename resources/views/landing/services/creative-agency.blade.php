@extends('landing.master')
@section('content')
<section id="home" class="hero-area style1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-12">
                <div class="hero-content wow fadeInLeft" data-wow-delay=".3s">
                    <h1>Welcome to a new era of <span class="text-danger">Digital Advertising!</span></h1>
                    <p class="text-dark">Kami menyediakan jasa foto & video kreatif untuk platform media sosial sehingga Anda dapat terlibat dengan audiens Anda di mana pun mereka berada.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <div class="hero-image wow fadeInRight" data-wow-delay=".4s">
                    <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_KxHSo3oGhc.json"  background="transparent"  speed="1"  loop autoplay></lottie-player>
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
                </div>
            </div>
        </div>
        <div class="single-head">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-service wow fadeInUp" data-wow-delay=".2s">
                        <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_uecuu64m.json"  background="transparent"  speed="1"  loop autoplay></lottie-player><hr>
                        <h6 class="text-dark"><a href="#"><b>Design & Content Copywriting</b></a></h6>
                        <p>Kami memberikan rekomendasi dan strategi untuk meningkatkan jangkauan pada akun brand anda.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-service wow fadeInUp" data-wow-delay=".4s">
                        <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_0zv8teye.json"  background="transparent"  speed="1"  loop autoplay></lottie-player><hr>
                        <h6 class="text-dark"><a href="#"><b>Shooting Video / Photo Catalog</b></a></h6>
                        <p>Kami juga menyediakan jasa photo product/katalog ataupun shooting video untuk keperluan advertising brand.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-service wow fadeInUp" data-wow-delay=".6s">
                        <lottie-player src="https://assets4.lottiefiles.com/private_files/lf30_55smx65u.json"  background="transparent"  speed="1"  loop autoplay></lottie-player><hr>
                        <h6 class="text-dark"><a href="#"><b>Mapping Area With Drone</b></a></h6>
                        <p>Jasa pemetaan lahan dengan menggunakan drone dan eksekutor yang telah ber-sertifikasi</p>
                    </div>  
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
                        <h2>Efortless, but powerfull!</h2>
                        <h6 class="text-dark" style="line-height: 25px">Anda tidak perlu memikirkan bentuk ide dan strategi, waktu anda bisa terhemat sampai 80% untuk menghandle sektor lain.
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
                        <h2>Banyak Benefitnya</h2>
                        <h6 class="text-dark" style="line-height: 35px">
                            <ul class="list">
                                <li><i class="lni lni-checkmark-circle"></i> Harga yang bersaing & benefit melimpah</li>
                                <li><i class="lni lni-checkmark-circle"></i> Dikerjakan Desainer & Content Creator Profesional</li>
                                <li><i class="lni lni-checkmark-circle"></i> Meningkatkan Engagement & Brand Awareness</li>
                                <li><i class="lni lni-checkmark-circle"></i> Tak Perlu Pusing Cari Ide Konten & Desain.</li>
                            </ul>
                        </h6>

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