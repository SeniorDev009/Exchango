<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{isset($page_title) ? $page_title : ''}} | {{$basic->sitename}} </title>
    <!--Favicon add-->
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logo/favicon.png')}}">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/select2-bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/select2.min.css')}}">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- icofont css -->
    <link rel="stylesheet" href="{{asset('assets/front/fonts/icofont/icofont.min.css')}}">
    <!-- flaticon css  -->
    <link rel="stylesheet" href="{{asset('assets/front/fonts/flaticon.css')}}">
    <!-- font-awesome -->
    <link rel="stylesheet" href="{{asset('assets/front/css/fontawesome.min.css')}}">
    <!-- owl-carosel -->
    <link rel="stylesheet" href="{{asset('assets/front/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/sweetalert.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/admin/css/toastr.min.css')}}" />
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('assets/front/css/animate.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/table.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('assets/front/css/color.php')}}?color={{ $basic->color }}">
    <link rel="stylesheet" href="{{asset('assets/front/css/responsive.css')}}">

    <!-- //////////////////////////////// -->
    <link rel="stylesheet" href="{{asset('assets/public/assets/bootstrap-material-design-font/css/material.css')}}">
    <link rel="stylesheet" href="{{asset('assets/public/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/public/assets/dropdown/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/public/assets/animate.css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/public/assets/theme/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/public/common-css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/public/common-css/jquery.classycountdown.css')}}">
    <link rel="stylesheet" href="{{asset('assets/public/01-comming-soon/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/public/assets/mobirise/css/mbr-additional.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    
    @yield('css')
    {!! htmlScriptTagJsApi() !!}
</head>

<body>

    <div class="preloader">
        <div class="loader">Loading...</div>
    </div>



    <header class="header navbar-fixed-top" style="background-color: #124f92;z-index: 5;">
        <div class="container">
            <div class="row d-flex">
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="logo">
                        <a href="{{url('/')}}" class="logo main-logo">
                            <p style="font-size:30px; color: #ffca2c;float: left;">{{ __('sentence.democoin')}}</p><p style="font-size:30px; float: left;color: white;">&nbsp;&nbsp;&nbsp; {{ __('sentence.exchange')}}</p>
                        </a>
                    </div>
                    <div class="menu-button d-block d-xl-none d-lg-block d-md-block d-sm-block">
                        <i class="icofont-navigation-menu"></i>
                    </div>
                </div>
                <div class="col-xl-8 d-flex align-items-center col-lg-8 col-md-12">
                    <div class="main-menu">
                        <ul>

                            @php $locale = session()->get('locale'); $locale_full = session()->get('locale_full');  @endphp

                            @if(Auth::user())
                                <li> <a>{{Auth::user()->username}} </a> </li>
                                <li><a class="reset-time-limit-user" href="{{route('home')}}">Dashboard</a></li>

                                @if(!Auth::user()->checkIfGoogle2faEnabled())
                                    <li>
                                        <a href="{{route('enable2fa')}}">Security</a>
                                    </li>
                                @elseif(Auth::user()->checkIfGoogle2faEnabled())
                                    <li>
                                        <a href="{{route('disable2fa')}}">Security</a>
                                    </li>
                                @endif

                                <li>
                                    <a href="{{ route('logout') }}" onclick="signoutFunction()">Sign Out</a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>

                                <!--<li><a href="{{route('blog')}}">blog</a></li>
                                <li><a href="{{route('contact-us')}}">Contact Us</a></li>
                                <li>
                                    <a class="reset-time-limit-buy" style=" background-color: #a71e1e;  padding: 4px 10px;  border-radius: 10px; " href="">Buy Demo Coins</a>
                                </li> -->
                            @else
                                <li>
                                    <a href="{{route('login')}}">Sign In</a>
                                    <a href="{{route('register')}}" style="margin-left: 30px;">Register</a>
                                </li>
                            @endif

                            <li><a href="#">{{ $locale_full === null ? config('app.locale') : $locale_full }} <span><i class="fas fa-angle-down"></i></span></a>
                                <ul>
                                    <li><a href="localization/en/{{ __('sentence.full.english')}}">{{ __('sentence.full.english')}}</a></li>
                                    <li><a href="localization/zh-CN/{{ __('sentence.full.chinese')}}">{{ __('sentence.full.chinese')}}</a></li>
                                    <li><a href="localization/fr/{{ __('sentence.full.franch')}}">{{ __('sentence.full.franch')}}</a></li>
                                    <li><a href="localization/ko/{{ __('sentence.full.korean')}}">{{ __('sentence.full.korean')}}</a></li>
                                    <li><a href="localization/de/{{ __('sentence.full.Germany')}}">{{ __('sentence.full.Germany')}}</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>


@yield('content')


@include('partials.footer')


<!-- jquery js -->
<script src="{{asset('assets/front/js/')}}/jquery.min.js"></script>
<!-- bootstrap js -->
<script src="{{asset('assets/front/js/')}}/bootstrap.min.js"></script>
@yield('script')
<script src="{{asset('assets/admin/js/toastr.min.js')}}"></script>
<script src="{{asset('assets/admin/js/sweetalert.js')}}"></script>
<!-- owl carosel -->
<script src="{{asset('assets/front/js/')}}/owl.carousel.js"></script>
<!-- filterizer -->
<script src="{{asset('assets/front/js/')}}/jquery.filterizr.min.js"></script>
<!-- wow js -->
<script src="{{asset('assets/front/js/')}}/wow.min.js"></script>
<!-- main js -->
<script src="{{asset('assets/front/js/')}}/main.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    function signoutFunction(){
        event.preventDefault();
        Swal.fire({
          title: 'Are you sure?',
          text: "Do you really want to sign out?",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, sign out!'
        }).then((result) => {
          if (result.value) {
            Swal.fire(
              'Signed out!',
              'Redirecting.',
              'success'
            )
            document.getElementById('logout-form').submit();
          }
        })
    }
</script>
<style type="text/css">
    
    .MS-content .item{
        height: inherit !important;
    }

    #chart_static{
        padding: 2rem;
        width: 520px;
        height: 520px;
        background-image: url(assets/images/spin_static.jpg);
        background-repeat: no-repeat;
        background-size: auto;
        display: block;
        transform: scale(0.7,0.7);
    }

</style>

<!-- @if(Auth::user())
    @if(request()->segment(2) != 'buy' || request()->segment(2) != 'enable2fa' || request()->segment(2) != 'disable2fa' )
        @if(number_format(Auth::user()->balance, $basic->decimal) < 1)
            <script>
                $(document).ready(function() {
                    Swal.fire({
                      title: 'Low Balance',
                      type: 'info',
                      html:
                        'Your account balance is 0, you need to deposit if you want to buy coins from our exchange. ' +
                        '<a href="{{route('deposit')}}">Click Here</a> ' + 'to go to deposit page',
                      showCloseButton: true,
                      showCancelButton: true,
                      focusConfirm: false,
                      confirmButtonText:
                        '<i class="fa fa-thumbs-up"></i> Deposit!',
                      confirmButtonAriaLabel: 'Thumbs up, great!',
                      cancelButtonText:
                        '<i class="fa fa-thumbs-down"></i>',
                      cancelButtonAriaLabel: 'Thumbs down'
                    })
                    .then(function (result) {
                        if (result.value) {
                            window.location = "{{route('deposit')}}";
                        }
                    })
                });
            </script>
        @endif
    @endif
@endif
 -->

<style type="text/css">
    .modal-footer button{
        margin-bottom: 0px !important;
    }
</style>

@yield('js')
@if (session('success'))
    <script type="text/javascript">
        $(document).ready(function () {
            Swal.fire("Success!", "{{ session('success') }}", "success");
        });
    </script>
@endif

@if (session('alert'))
    <script type="text/javascript">
        $(document).ready(function () {
            Swal.fire("Sorry!", "{{ session('alert') }}", "error");
        });
    </script>
@endif
</body>
</html>

<!-- <style type="text/css">
    
    .header .main-menu ul li{
        margin-left: 0 !important;
    }

</style> -->

@if(Auth::user())
    @if( request()->segment(1) !== '2fa'  && url()->current() !== null )
        {{ Session::put( 'last_non_auth_urls', url()->current() ) }}
    @endif
@endif

<!--  -->