<footer class="footer">

    <div class="footer-top" style="background-color: white !important;padding:4rem 0 1rem 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12" style="text-align: center;">
                    <a href="{{url('/')}}" class="logo main-logo">
                            <p style="font-size:23px; color: #ffca2c;float: left;font-weight: bolder;">{{ __('sentence.democoin')}}</p><p style="font-weight: bolder;font-size:23px; float: left;color: #175596;">&nbsp;&nbsp;&nbsp; {{ __('sentence.exchange')}}</p>
                        </a>
                </div>
                <div class="col-lg-8 col-md-12">
                    <ul class="nav " style="color: black;text-decoration: none;list-style: none;font-weight: bolder;padding: 1% 2rem 0 2rem;">

                        @if(Auth::user())
                            <li style="padding: 0 1.5rem;">
                                <a style="color: black;" href="{{ route('logout') }}" onclick="signoutFunction()">Sign Out</a>
                            </li><i style="font-style: normal;color: black;">|</i>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        @else
                            <li style="padding: 0 1.5rem;">
                                <a style="color: black;" href="{{route('login')}}">Sign In</a>
                            </li><i style="font-style: normal;color: black;">|</i>
                            <li style="padding: 0 1.5rem;">
                                <a style="color: black;" href="{{route('register')}}" style="margin-left: 30px;">Register</a>
                            </li><i style="font-style: normal;color: black;">|</i>
                        @endif

                        <li style="padding: 0 1.5rem;"><a style="color: black;" href="{{ route('privacy-policy') }}">Privacy</a></li><i style="font-style: normal;color: black;">|</i>
                        <li style="padding: 0 1.5rem;"><a style="color: black;" href="{{ route('terms-condition') }}">Terms and Conditions</a></li><i style="font-style: normal;color: black;">|</i>
                        <li style="padding: 0 1.5rem;"><a style="color: black;" href="{{ route('contact-us') }}">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-12 col-md-12 col-xs-12" style="margin-top:7%; border-bottom: solid black 1px;"></div>
                <div class="col-lg-12" style="width: 100%;padding: 1rem 1rem;margin-top: -3%;">
                    <div class="ico-array" style="width:30%; margin: auto;text-align: center;background-color: white;">
                        <a href="#" style="padding-left: 1rem;"><img src="{{asset('assets/public/assets/images/ico-face.png')}}"></a>
                        <a href="#" style="padding-left: 1rem;"><img src="{{asset('assets/public/assets/images/ico-linked.png')}}"></a>
                        <a href="#" style="padding-left: 1rem;"><img src="{{asset('assets/public/assets/images/ico-twi.png')}}"></a>
                        <a href="#" style="padding-left: 1rem;"><img src="{{asset('assets/public/assets/images/ico-yout.png')}}"></a>
                        <a href="#" style="padding-left: 1rem;"><img src="{{asset('assets/public/assets/images/ico-mu.png')}}"></a>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="footer-bottom" style="background-color: white !important;padding:3rem 0 3rem 0;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12">
                    <div class="copyright">
                        <p class="text-center" style="color: black !important;">{{$basic->sitename}} © {{date('Y')}}.<b style="color:#ffca2c; "> Demo Exchange</b> All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
