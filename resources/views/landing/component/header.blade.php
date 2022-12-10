    <header class="header navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="nav-inner">

                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand style3" href="index.html">
                                <img src="{{ URL::asset('landing/assets/images/logo/logo.svg') }}" alt="Logo">
                            </a>
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                        <li class="nav-item">
                                            <a href="{{ url('') }}" class="active" aria-label="Toggle navigation">Beranda</a>
                                        </li>
                                    <li class="nav-item">
                                        <a class=" dd-menu collapsed" href="#blog" data-bs-toggle="collapse" data-bs-target="#submenu-1-1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Services</a>
                                        <ul class="sub-menu collapse" id="submenu-1-1">
                                            <li class="nav-item"><a href="{{ route('branding.protection') }}">Branding Protection</a>
                                            </li>
                                            <li class="nav-item"><a href="{{ route('creative-agency') }}">Creative Agency</a></li>
                                            <li class="nav-item"><a href="{{ route('media-press-release') }}">Media Press Release</a></li>
                                            <li class="nav-item"><a href="{{ route('website-development') }}">Website Development</a></li>
                                            <li class="nav-item"><a href="{{ route('kol-management') }}">KOL & Influencer Management</a></li>
                                            <li class="nav-item"><a href="{{ route('outsourcing-team') }}">Outsourcing Team</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="contact.html" aria-label="Toggle navigation">Case Study</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="contact.html" aria-label="Toggle navigation">Contact Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="contact.html" aria-label="Toggle navigation">Blog</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="button add-list-button">
                                <a href="contact.html" class="btn">Free Consultation</a>
                            </div>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </header>