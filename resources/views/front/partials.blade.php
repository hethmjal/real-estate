<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>عقارات السعودية</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('front/assets/img/favicon.png" rel="icon') }}">
    <link href="{{ asset('front/assets/img/apple-touch-icon.png" rel="apple-touch-icon') }}">
    <link rel="shortcut icon" href="{{ asset('front/assets/img/logo.png') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('front/assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Template Main CSS File -->
    <link href="{{ asset('front/assets/css/style.css') }}" rel="stylesheet">


</head>

<body>
    @php
        $categories = App\Models\Category::get();
    @endphp
    <!-- ======= Property Search Section ======= -->
    <div class="click-closed"></div>
    <!--/ Form Search Star /-->
    <div class="box-collapse">
        <div class="title-box-d">
            <h3 class="title-d">بحث مخصص</h3>
        </div>
        <span class="close-box-collapse right-boxed bi bi-x"></span>
        <div class="box-collapse-wrap form">
            <form class="form-a" action="{{ route('search') }}" method="get">

                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="form-group">
                            <label class="pb-2" for="Type">الكلمة المفتاحية</label>
                            <input type="text" name="key" class="form-control form-control-lg form-control-a" required
                                placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group mt-3">
                            <label class="pb-2" for="Type">القسم</label>
                            <select name="category_id" class="form-control form-select form-control-a" id="Type">
                                <option value="">كل الاقسام</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }} "> {{ $category->category }} </option>
                                @endforeach

                            </select>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success btn-b">بحث </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Property Search Section -->>

    <!-- ======= Header/Navbar ======= -->
    <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
        <div class="container">
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false"
                aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <a class="navbar-brand text-brand" href="{{ route('home') }}">عقارات <span class="color-b text-brand">
                    السعودية </span></a>

            <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">الرئيسية</a>
                    </li>



                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">الأقسام</a>
                        <div class="dropdown-menu">
                            @foreach ($categories as $category)
                                <a href="{{ route('showAllReales', $category->slug) }}" class="dropdown-item">
                                    {{ $category->category }} </a>
                            @endforeach


                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('contactus') }}"> تواصل معنا</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('register') }}"> تسجيل</a>
                        </li>
                    @endguest

                    @guest
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('login') }}"> تسجيل دخول </a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('reales') }}">عقاراتي</a>
                        </li>
                    @endauth
                    @auth
                        @if (Auth::user()->type == 'admin')
                            <li class="nav-item">
                                <a class="nav-link " href="{{ url('/dashboard') }}"> صفحتي </a>
                            </li>
                        @endif

                    @endauth

                    @auth
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('logout') }}">تسجيل الخروج </a>
                        </li>
                    @endauth

                </ul>
            </div>
            <a href="{{ route('real.add') }}" type="button"
            style="background: #5393eb ; border: none;   display: inline-block; color:white;   font-size: 16px; text-align: center;"
            class="rounded-3 mx-2 btn btn-sm btn-b-n ">
            اضافة عقار
        </a>
            <button type="button" style="background: #5393eb ;"
                class="rounded-3  mx-2 btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse"
                data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
                <i class="bi bi-search"></i>
            </button>


        </div>
    </nav>
    <!-- End Header/Navbar -->



    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @yield('content')



    <!-- ======= Footer ======= -->
    <section class="section-footer">
        <div class="container">
            <div class="row">


            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="nav-footer">
                        <ul class="list-inline">
                            <li class="list-inline-item m-1">
                                <a href="#">الرئيسية </a>
                            </li>


                            @foreach ($categories as $category)
                                <li class="list-inline-item m-1">
                                    <a href="{{ route('showAllReales', $category->slug) }}" class="dropdown-item">
                                        {{ $category->category }} </a>

                                </li>
                            @endforeach


                            <li class="list-inline-item m-1">
                                <a href="#">تواصل معنا</a>
                            </li>
                        </ul>
                    </nav>

                    <div class="copyright-footer">
                        <p class="copyright color-text-a">
                            جميع الحقوق محفوظة
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <!-- End  Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('front/assets/js/main.js') }}"></script>
    @stack('js')
</body>

</html>
