<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @if($isSingle === 0)
    <meta property="og:url"                content="http://www.humanity-bd.com/"/>
   <meta property="og:type"               content="website" />
   <meta property="og:title"              content= "★শিক্ষা ★সেবা ★দাওয়াহ ★মানবতা" />
   <meta property="og:description"        content="হিউম্যানিটি একটি শিক্ষা, দাওয়াহ ও মানবকল্যাণে নিবেদিত সেবামূলক প্রতিষ্ঠান।" />
   <meta property="og:image"              content="{{URL::asset('frontendAssets/img/share.jpg')}}" />
   @else
      <meta property="og:image" content="{{URL::asset('uploads/postImages')}}/{{$singlePostInfo->post_image }}">
   @endif

    <!-- Bootstrap Min CSS -->
    <link rel=stylesheet href="{{asset('frontendAssets/css/bootstrap.min.css')}}">
    <link rel=stylesheet href="{{asset('frontendAssets/css/animate.min.css')}}">
    <!-- IcoFont Min CSS -->
    <link rel=stylesheet href="{{asset('frontendAssets/css/icofont.min.css')}}">
    <!-- MeanMenu CSS -->
    <link rel=stylesheet href="{{asset('frontendAssets/css/meanmenu.css')}}">
    <!-- Owl Carousel Min CSS -->
    <link rel=stylesheet href="{{asset('frontendAssets/css/owl.carousel.min.css')}}">
    <!-- Style CSS -->
    <link rel=stylesheet href="{{asset('frontendAssets/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel=stylesheet href="{{asset('frontendAssets/css/responsive.css')}}">
    <title>{{ $title }}</title>
    <link rel="icon" type="image/png" href="{{asset('frontendAssets/img/favicon.png')}}">
</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0"
        nonce="GF15sJpO"></script>
    <!-- Start Header Area -->
    <header class="header-area">
        <!-- Start Top Header -->
        <div class="top-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <ul class="top-nav">
                            <li style="font-weight: 600"> Invitation To Islam </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-4 text-right">
                        <ul class="top-social">
                            <li style="font-weight: 800">
                                الدعوة إلى الإسلام
                            </li>
                        </ul>
                        <div class="header-date">
                            <i class="icofont-clock-time"></i>
                            @php
                            echo date("F j, Y");
                            @endphp
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Top Header -->

        <div class=navbar-area>
            <div class="sinmun-mobile-nav">
                <div class=logo> <a href="{{url('/')}}"><img src="{{asset('frontendAssets/img/lo.png')}}" alt=logo></a>
                </div>
                <div class="container">
                    <div class="row mt-2">
                        <div class="col-sm-6 col-md-6 col-xs-6">
                            <p> Invitation To Islam</p>
                        </div>
                        <div class="col-sm-6 col-md-6 col-xs-6">
                            <p class="text-right">الدعوة إلى الإسلام</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="sinmun-nav">
                <div class=container>
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class=navbar-brand href="{{url('/')}}"><img src="{{asset('frontendAssets/img/lo.png')}}"
                                alt=logo></a>
                        {{-- <div class="navbar-brand" > <a href="{{url('/')}}">Humanity </a>
                </div> --}}
                <div class="collapse navbar-collapse mean-menu" id=navbarSupportedContent>
                    <ul class=navbar-nav>
                        <li class=nav-item><a href="{{url('/')}}" class="nav-link active">সকল </a>
                        </li>
                        @php
                        $menus = App\Models\Category::where('menu_status',1)->get();
                        @endphp
                        @foreach ($menus as $menu)
                        <li class=nav-item><a href="{{url('category')}}/{{ $menu->id }}"
                                class=nav-link>{{$menu->post_category}}</a></li>
                        @endforeach
                        <li class=nav-item><a href="{{url('/answer/view')}}" class="nav-link">প্রশ্নোত্তর</a></li>
                        <li class=nav-item><a href="{{url('/about/view')}}" class="nav-link">আমাদের সম্পর্কে</a></li>
                        <li class=nav-item><a href="{{url('/login')}}" class="nav-link">লগইন</a></li>


                    </ul>
                    <div class=others-options>
                        <ul>
                            {{-- <li><a href={{url('/login')}}><i class=icofont-user-alt-5></i></a></li> --}}
                            {{-- <li class=header-search>
                                        <div class=nav-search>
                                            <div class=nav-search-button> <i class=icofont-ui-search></i> </div>
                                            <form> <span class=nav-search-close-button tabindex=0>✕</span>
                                                <div class=nav-search-inner> <input name=search placeholder="Search here...."> </div>
                                            </form>
                                        </div>
                                    </li> --}}
                        </ul>
                    </div>
                </div>
                </nav>
            </div>
        </div>
        </div>


    </header>
    <!-- End Header Area -->
    @yield('frontend_content')


    <div class="social pt-5 pb-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-12 head"> <span></span>
                    <h4> Find Us On <span class="fb">Facebook</span> and <span class="yt">Youtube</span></h4>
                </div>
                <div class="col-lg-6 col-md-6 like">

                    <script src="https://apis.google.com/js/platform.js"></script>
                    <div class="g-ytsubscribe" data-channelid="UCtkEUJgzN0KpfkesN8E1Htg" data-layout="full"
                        data-count="default"></div>
                </div>

                <div class="col-lg-6 col-md-6 like">
                    <div class="fb-page" data-href="{{url('https://www.facebook.com/হিউম্যানিটি-104810691780630')}}"
                        data-tabs="timeline" data-width="270" data-height="70" data-small-header="true"
                        data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false">
                        <blockquote cite="{{url('https://www.facebook.com/হিউম্যানিটি-104810691780630')}}"
                            class="fb-xfbml-parse-ignore"><a
                                href="{{url('https://www.facebook.com/হিউম্যানিটি-104810691780630')}}"></a></blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-5">
        <div class="row pb-5 text-center">

            <div class="col-lg-6 pt-3 pb-3">
                <div class="col-lg-10 card m-auto">
                    <div class="card-header">
                        <p> প্রধান উপদেষ্টা: <a
                                href="{{url('https://www.facebook.com/profile.php?id=100009938328877')}}"
                                target="_blank" class="text-danger">মোহাম্মদ শাহাদত হোসেন চৌধুরী</a></p>
                    </div>
                    <div class="card-body">
                        <p>চেয়ারম্যান </p>
                        <p>৫ নং বরুমচড়া ইউনিয়ন পরিষদ</p>
                        <p>আনোয়ারা চট্টগ্রাম</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pt-3 pb-3">
                <div class="col-lg-10 card m-auto">
                    <div class="card-header">
                        <p> প্রতিষ্ঠাতা পরিচালক: <a href="{{url('https://www.facebook.com/nuru.llah.9235/')}}"
                                target="_blank" class="text-danger">মোহাম্মদ নুরুল্লাহ লোকমানী</a></p>
                    </div>
                    <div class="card-body">
                        <p>ইসলামী বিশ্ববিদ্যালয় কুষ্টিয়া</p>
                        <p>মোবাইল: <span>01837235598</span></p>
                        <p> জিমেইল: <span>humanity3694@gmail.com</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Footer Area -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 m-auto text-center pt-3 pb-3">
                    <p style="color: white">আপনার লেখা পাঠাতে <a style="padding:2px 10px" class="btn btn-danger"
                            target="_blank" href="{{url('add/guest/post/insert/view')}}">এখানে</a> ক্লিক করুন </p>
                </div>
                <div class="col-lg-6 m-auto text-center pt-3 pb-3">
                    <p style="color: white">আপনার প্রশ্ন পাঠাতে <a style="padding:2px 10px" class="btn btn-danger"
                            target="_blank" href="{{url('insert/question/view')}}">এখানে</a> ক্লিক করুন </p>
                </div>

            </div>
        </div>

        <div class="copyright-area">
            <div class="container">
                <div class="row align-items-center text-center">
                    <div class="col-lg-6 col-md-12 ">
                        <p>Copyright © 2021 <a href="" target="_blank">Humanity</a>. All Rights Reserved.</p>
                    </div>

                    <div class="col-lg-6 col-md-12 pt-3">
                        <p><span class="text-danger">Dev</span>eloped By <a
                                href="{{url('https://www.facebook.com/sarar.arnab/')}}" target="_blank"
                                class="text-danger">Shakib Sarar Arnab</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Area -->

    <div class=go-top><i class="icofont-swoosh-up"></i></div>

    <!-- Jquery Min JS -->
    <script src="{{asset('frontendAssets/js/jquery.min.js')}}"></script>
    <!-- Popper Min JS -->
    <script src="{{asset('frontendAssets/js/popper.min.js')}}"></script>
    <!-- Bootstrap Min JS -->
    <script src="{{asset('frontendAssets/js/bootstrap.min.js')}}"></script>
    <!-- MeanMenu JS -->
    <script src="{{asset('frontendAssets/js/jquery.meanmenu.js')}}"></script>
    <!-- Owl Carousel Min JS -->
    <script src="{{asset('frontendAssets/js/owl.carousel.min.js')}}"></script>
    <!-- Main JS -->
    <script src="{{asset('frontendAssets/js/main.js')}}"></script>

</body>

</html>
