<!DOCTYPE html>
<html lang="en" dir="">

<!-- Mirrored from htmlstream.com/preview/front-v4.2/html/landing-classic-corporate.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 02 Aug 2022 18:14:25 GMT -->

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Frip Tradeing</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/init_page.png') }}">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('front/assets/css/vendor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/vendor/bootstrap-icons/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/vendor/aos/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/theme.minc619.css?v=1.0') }}">


    <!-- إضافة الخط من Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 700;
        }

        p,
        span,
        div {
            font-weight: 400;
        }

        .bg-dark {
            --bs-bg-opacity: 1;
            background-color: #347478ff !important;
        }
    </style>

</head>

<body>
    <!-- ========== HEADER ========== -->
    @include('layouts.partials.navbar') <!-- استخراج الـ navbar في ملف منفصل -->
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        @yield('content')
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

    <footer class="bg-dark">
        <div class="container pb-1 pb-lg-5">
            <div class="row content-space-t-2">
                <div class="col-lg-3 mb-7 mb-lg-0">
                    <!-- Logo -->
                    <div class="mb-5">
                        <a class="navbar-brand" href="/" aria-label="Space">
                            <img class="navbar-brand-logo" src="{{ asset('images/init_page.png') }}"
                                alt="Image Description">
                        </a>
                    </div>
                    <!-- End Logo -->

                    <!-- List -->
                    <ul class="list-unstyled list-py-1">
                        <li><a class="link-sm link-light" href="#"><i class="bi-geo-alt-fill me-1"></i> 153 Williamson
                                Plaza, Maggieberg</a></li>
                        <li><a class="link-sm link-light" href="tel:1-062-109-9222"><i
                                    class="bi-telephone-inbound-fill me-1"></i> +1 (062) 109-9222</a></li>
                    </ul>
                    <!-- End List -->

                </div>
                <!-- End Col -->

                <div class="col-sm mb-7 mb-sm-0">
                    <h5 class="text-white mb-3">Company</h5>

                    <!-- List -->
                    <ul class="list-unstyled list-py-1 mb-0">
                        <li><a class="link-sm link-light" href="#">About</a></li>
                        <li><a class="link-sm link-light" href="#">Careers <span
                                    class="badge bg-warning text-dark rounded-pill ms-1">We're hiring</span></a></li>
                        <li><a class="link-sm link-light" href="#">Blog</a></li>
                        <li><a class="link-sm link-light" href="#">Customers <i
                                    class="bi-box-arrow-up-right small ms-1"></i></a></li>
                        <li><a class="link-sm link-light" href="#">Hire us</a></li>
                    </ul>
                    <!-- End List -->
                </div>
                <!-- End Col -->

                <div class="col-sm mb-7 mb-sm-0">
                    <h5 class="text-white mb-3">Features</h5>

                    <!-- List -->
                    <ul class="list-unstyled list-py-1 mb-0">
                        <li><a class="link-sm link-light" href="#">Press <i
                                    class="bi-box-arrow-up-right small ms-1"></i></a></li>
                        <li><a class="link-sm link-light" href="#">Release Notes</a></li>
                        <li><a class="link-sm link-light" href="#">Integrations</a></li>
                        <li><a class="link-sm link-light" href="#">Pricing</a></li>
                    </ul>
                    <!-- End List -->
                </div>
                <!-- End Col -->

                <div class="col-sm">
                    <h5 class="text-white mb-3">Documentation</h5>

                    <!-- List -->
                    <ul class="list-unstyled list-py-1 mb-0">
                        <li><a class="link-sm link-light" href="#">Support</a></li>
                        <li><a class="link-sm link-light" href="#">Docs</a></li>
                        <li><a class="link-sm link-light" href="#">Status</a></li>
                        <li><a class="link-sm link-light" href="#">API Reference</a></li>
                        <li><a class="link-sm link-light" href="#">Tech Requirements</a></li>
                    </ul>
                    <!-- End List -->
                </div>
                <!-- End Col -->

                <div class="col-sm">
                    <h5 class="text-white mb-3">Resources</h5>

                    <!-- List -->
                    <ul class="list-unstyled list-py-1 mb-5">
                        <li><a class="link-sm link-light" href="#"><i class="bi-question-circle-fill me-1"></i> Help</a>
                        </li>
                        <li><a class="link-sm link-light" href="#"><i class="bi-person-circle me-1"></i> Your
                                Account</a></li>
                    </ul>
                    <!-- End List -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->

            <div class="border-top border-white-10 my-7"></div>

            <div class="row mb-7">
                <div class="col-sm mb-3 mb-sm-0">
                    <!-- Socials -->
                    <ul class="list-inline list-separator list-separator-light mb-0">
                        <li class="list-inline-item">
                            <a class="link-sm link-light" href="#">Privacy &amp; Policy</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="link-sm link-light" href="#">Terms</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="link-sm link-light" href="#">Site Map</a>
                        </li>
                    </ul>
                    <!-- End Socials -->
                </div>

                <div class="col-sm-auto">
                    <!-- Socials -->
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a class="btn btn-soft-light btn-xs btn-icon" href="#">
                                <i class="bi-facebook"></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a class="btn btn-soft-light btn-xs btn-icon" href="#">
                                <i class="bi-google"></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a class="btn btn-soft-light btn-xs btn-icon" href="#">
                                <i class="bi-twitter"></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <a class="btn btn-soft-light btn-xs btn-icon" href="#">
                                <i class="bi-github"></i>
                            </a>
                        </li>

                        <li class="list-inline-item">
                            <!-- Button Group -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-soft-light btn-xs dropdown-toggle"
                                    id="footerSelectLanguage" data-bs-toggle="dropdown" aria-expanded="false"
                                    data-bs-dropdown-animation="">
                                    <span class="d-flex align-items-center">
                                        <img class="avatar avatar-xss avatar-circle me-2"
                                            src="assets/vendor/flag-icon-css/flags/1x1/us.svg" alt="Image description"
                                            width="16">
                                        <span>English (US)</span>
                                    </span>
                                </button>

                                <div class="dropdown-menu" aria-labelledby="footerSelectLanguage">
                                    <a class="dropdown-item d-flex align-items-center active" href="#">
                                        <img class="avatar avatar-xss avatar-circle me-2"
                                            src="assets/vendor/flag-icon-css/flags/1x1/us.svg" alt="Image description"
                                            width="16">
                                        <span>English (US)</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <img class="avatar avatar-xss avatar-circle me-2"
                                            src="assets/vendor/flag-icon-css/flags/1x1/de.svg" alt="Image description"
                                            width="16">
                                        <span>Deutsch</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <img class="avatar avatar-xss avatar-circle me-2"
                                            src="assets/vendor/flag-icon-css/flags/1x1/es.svg" alt="Image description"
                                            width="16">
                                        <span>Español</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <img class="avatar avatar-xss avatar-circle me-2"
                                            src="assets/vendor/flag-icon-css/flags/1x1/cn.svg" alt="Image description"
                                            width="16">
                                        <span>中文 (繁體)</span>
                                    </a>
                                </div>
                            </div>
                            <!-- End Button Group -->
                        </li>
                    </ul>
                    <!-- End Socials -->
                </div>
            </div>

            <!-- Copyright -->
            <div class="w-md-85 text-lg-center mx-lg-auto">
                <p class="text-white-50 small">© Front. 2021 Htmlstream. All rights reserved.</p>
                <p class="text-white-50 small">When you visit or interact with our sites, services or tools, we or our
                    authorised service providers may use cookies for storing information to help provide you with a
                    better, faster and safer experience and for marketing purposes.</p>
            </div>
            <!-- End Copyright -->
        </div>
    </footer>

    <!-- ========== SECONDARY CONTENTS ========== -->
    <a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;" data-hs-go-to-options='{
       "offsetTop": 700,
       "position": {
         "init": { "right": "2rem" },
         "show": { "bottom": "2rem" },
         "hide": { "bottom": "-2rem" }
       }
     }'>
        <i class="bi-chevron-up"></i>
    </a>
    <!-- ========== END SECONDARY CONTENTS ========== -->


    <script src="{{ asset('front/assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('front/assets/js/theme.min.js') }}"></script>


    <!-- JS Plugins Init. -->
    <script>
        (function () {
            // INITIALIZATION OF HEADER
            // =======================================================
            new HSHeader('#header').init()


            // INITIALIZATION OF MEGA MENU
            // =======================================================
            new HSMegaMenu('.js-mega-menu', {
                desktop: {
                    position: 'left'
                }
            })


            // INITIALIZATION OF SHOW ANIMATIONS
            // =======================================================
            new HSShowAnimation('.js-animation-link')


            // INITIALIZATION OF BOOTSTRAP VALIDATION
            // =======================================================
            HSBsValidation.init('.js-validate', {
                onSubmit: data => {
                    data.event.preventDefault()
                    alert('Submited')
                }
            })


            // INITIALIZATION OF BOOTSTRAP DROPDOWN
            // =======================================================
            HSBsDropdown.init()


            // INITIALIZATION OF GO TO
            // =======================================================
            new HSGoTo('.js-go-to')


            // INITIALIZATION OF AOS
            // =======================================================
            AOS.init({
                duration: 650,
                once: true
            });


            // INITIALIZATION OF TEXT ANIMATION (TYPING)
            // =======================================================
            HSCore.components.HSTyped.init('.js-typedjs')


            // INITIALIZATION OF SWIPER
            // =======================================================
            var sliderThumbs = new Swiper('.js-swiper-thumbs', {
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
                history: false,
                breakpoints: {
                    480: {
                        slidesPerView: 2,
                        spaceBetween: 15,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 15,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 15,
                    },
                },
                on: {
                    'afterInit': function (swiper) {
                        swiper.el.querySelectorAll('.js-swiper-pagination-progress-body-helper')
                            .forEach($progress => $progress.style.transitionDuration = `${swiper.params.autoplay.delay}ms`)
                    }
                }
            });

            var sliderMain = new Swiper('.js-swiper-main', {
                effect: 'fade',
                autoplay: true,
                loop: true,
                thumbs: {
                    swiper: sliderThumbs
                }
            })
        })()
    </script>
</body>

</html>