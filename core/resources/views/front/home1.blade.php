@extends('layout')

@section('css')
@endsection
@section('content')

    <section class="mbr-section mbr-section-hero mbr-section-full mbr-parallax-background mbr-section-with-arrow mbr-after-navbar" id="header1-36" style="background-image: url(assets/public/assets/images/background.png);">

    <div class="mbr-overlay" style=""></div>

    <div class="mbr-table-cell">

        <div class="container">
            <div class="row">
                <div class="mbr-section col-md-10 col-md-offset-1 text-xs-center">

                    <h1 class="mbr-section-title display-1" style="font-size:60px; color: white;">{{ __('sentence.democoincomingsoon')}}</h1>
                    <h2 style="color: #ffdb6b;font-weight: 700;">{{ __('sentence.1democoinspriceis')}}</h2>
                    <div id="rounded-countdown" style="position: relative;">
                        <div class="countdown" data-remaining-sec="{{ $gnl->counter }}"></div>
                    </div>
                    <div class="icon-content" style="margin-top:30px;position: absolute;width: 100%;text-align: center;">
                        <a class="btn btn-white-ye" href="{{route('register')}}">{{ __('sentence.getstarted')}}</a>
                    </div>

                </div>
            </div>

        </div>
    </div>


</section>

<section class="mbr-section mbr-section__container article" id="header3-3z" style="background-color: rgb(255, 255, 255); padding-top: 60px; padding-bottom: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="mbr-section-title display-2">New Coins Released</h3>

            </div>
        </div>
    </div>
</section>
<section class="mbr-section mbr-section__container article" id="header3-3z" style="background-color: rgb(255, 255, 255); padding-top: 60px; padding-bottom: 0px;">
    <div class="container">
        <div class="row">
            @foreach($currencies as $currency) @if ($currency->id == 1 || $currency->id == 964) @continue @endif
            <div class="col-sm-12 col-lg-3 col-md-6 ">
                <div class="card" style="font-weight: 400;border: 0;box-shadow: 0 5px 10px 0 rgba(0, 0, 0, .16), 0 5px 10px 0 rgba(0, 0, 0, .12);">
                    <div class="card-body">
                        <h5 id="span_a3c8_012" class="card-body-title mb-2 border-bottom-0">New IEO Releases</h5>
                        <div class="d-block mb-2">
                            <img src="{{ asset('assets/images/currency/'). '/' .$currency->image }}" id="i_a3c8_0">
                            <span class="d-inline-block" id="span_a3c8_0">{{$currency->name}} ({{$currency->symbol}})</span>
                        </div>
                        <div class="d-block mb-2">
                            <span class="d-inline-block" id="span_a3c8_01243"> Our Price </span> <span id="span_a3c8_013"> {{ $currency->price }} USD/1DCO</span>
                        </div>

                        <div class="d-block">

                            <button data-toggle="modal" data-target="#BuyModal{{$currency->id}}" class="btn btn-white yellow">Buy Now
                            </button>

                            <!-- Modal -->
                            <div class="modal" id="BuyModal{{$currency->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Deposit <strong>{{$currency->name}}</strong> via <strong>{{$gate->name}}</strong></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="post" action="{{route('deposit.data-insert')}}">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="currency_id" value="{{$currency->id}}">
                                                <input type="hidden" name="gateway" value="{{$gate->id}}">
                                                <label><strong>DEPOSIT AMOUNT</strong>
                                                    <span class="modal-msg">({{ $gate->minamo }} - {{$gate->maxamo }}
                                                                ) {{$basic->currency}}
                                                                <br>
                                                               <code
                                                                   class="font-weight-bold">Charged {{ $gate->fixed_charge }} {{$basic->currency}}
                                                                   + {{ $gate->percent_charge }}%</code>
                                                        </span>
                                                </label>
                                                <hr/>

                                                <div class="input-group input-group-lg mb-3">

                                                    <div class="input-group-prepend">
                                                        <input type="text" class="form-control " name="amount" placeholder="0.00" aria-label="amount" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" placeholder=" Enter Amount" required>
                                                        <span class="input-group-text" id="basic-addon1">{{$basic->currency}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success ">Preview</button>
                                                <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <span class="d-inline-block" id="span_a3c8_0">Release Date:</span>
                        <span class="d-block" id="span_a3c8_01243"> {{ Carbon\Carbon::parse(Carbon\Carbon::today())->addSeconds( $gnl->counter )->toDateString() }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-lg-6" style="padding: 2% 5%;">
                <div class="card" style="background-image: url('assets/public/assets/images/bit-back4.png'); -webkit-background-size: cover;  -moz-background-size: cover; background-size: cover; padding:1rem;">
                 <!--    <div class="mbr-overlay" style="opacity: 0; background-color: rgb(255, 255, 255);"></div> -->
                    <div>
                        <div style="border:solid white 1px; padding: 1rem;">
                        <div>
                            <p style = "color: white;font-size: 25px;font-weight: 600;">
                                <b style="font-size: 50px;color: #ffca2c;padding-left:20px;padding-right: 20px;">50%</b>&nbsp;&nbsp;Bitcoin Discount
                            </p>
                            <p style = "text-align:center;color: white;">
                                Max 50 BTC Available
                            </p>
                            <div style="text-align: center;z-index: 1000;margin-top: 30px;">
                                <a class="btn btn-white-wh" href="{{route('register')}}" style="text-align: center;">Buy Now</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" style="padding: 2% 5%;">
                <div class="card" style="background-image: url('assets/public/assets/images/bit-back3.jpg'); -webkit-background-size: cover;  -moz-background-size: cover; background-size: cover; padding:1rem;">
                    <!-- <div class="mbr-overlay" style="opacity: 0; background-color: rgb(255, 255, 255);"></div>
                    <div> -->
                        <div style="border:solid white 1px; padding: 1rem;">
                            <div>
                                <p style = "color: white;">
                                    <b style="font-size: 50px;color: #ffca2c;padding-left:20px;padding-right: 20px;">Democoin Buy</b>
                                </p>
                                <p style = "text-align:center;color: white;">
                                    Max 50 BTC Available
                                </p>
                                <div style="text-align: center;z-index: 1000;margin-top: 30px;">
                                    <a class="btn btn-white-ye" href="{{route('register')}}" style="text-align: center;">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="mbr-section mbr-section__container article" id="header3-3z" style="background-color: rgb(255, 255, 255); padding-top: 60px; padding-bottom: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h3 class="mbr-section-title display-2">Main Your Coin of Choice with Us</h3>

            </div>
        </div>
    </div>
</section>

<section class="mbr-section mbr-section__container article" id="header3-3z" style="background-color: rgb(255, 255, 255); padding-top: 60px; padding-bottom: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 m-b30">
                <div class="wt-icon-box-wraper bx-style-1 p-a20 left equal-col bg-white buy-hover">
                    <div style="text-align: center;">
                        <img src="{{asset('assets/public/assets/images/bit-mark1.png')}}"  alt="">
                    </div>
                    <div class="icon-content ">
                        <h5 class="wt-tilte text-uppercase text-black">Bitcoin</h5>
                        <p>The project and framework should always be referred to as Bootstrap.</p>
                    </div>
                    <div style="text-align: center;z-index: 1000;">
                        <a class="btn btn-white" href="{{route('register')}}">Mine Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 m-b30">
                <div class="wt-icon-box-wraper bx-style-1 p-a20 left equal-col bg-white buy-hover">
                    <div style="text-align: center;">
                        <img src="{{asset('assets/public/assets/images/bit-mark2.png')}}" alt="">
                    </div>
                    <div class="icon-content ">
                        <h5 class="wt-tilte text-uppercase text-black">Bitcoin</h5>
                        <p>The project and framework should always be referred to as Bootstrap.</p>
                    </div>
                    <div style="text-align: center;z-index: 1000;">
                        <a class="btn btn-white" href="{{route('register')}}">Mine Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 m-b30">
                <div class="wt-icon-box-wraper bx-style-1 p-a20 left equal-col bg-white buy-hover">
                    <div style="text-align: center;">
                        <img src="{{asset('assets/public/assets/images/bit-mark3.png')}}" alt="">
                    </div>
                    <div class="icon-content ">
                        <h5 class="wt-tilte text-uppercase text-black">Bitcoin</h5>
                        <p>The project and framework should always be referred to as Bootstrap.</p>
                    </div>
                    <div style="text-align: center;z-index: 1000;">
                        <a class="btn btn-white" href="{{route('register')}}">Mine Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 m-b30">
                <div class="wt-icon-box-wraper bx-style-1 p-a20 left equal-col bg-white buy-hover">
                    <div style="text-align: center;">
                        <img src="{{asset('assets/public/assets/images/bit-mark4.png')}}" alt="">
                    </div>
                    <div class="icon-content ">
                        <h5 class="wt-tilte text-uppercase text-black">Bitcoin</h5>
                        <p>The project and framework should always be referred to as Bootstrap.</p>
                    </div>
                    <div style="text-align: center;z-index: 1000;">
                        <a class="btn btn-white" href="{{route('register')}}">Mine Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section article mbr-parallax-background" id="msg-box3-40" style="background-image: url(assets/public/assets/images/back2.jpg); padding-top: 120px; padding-bottom: 120px;">

    <div class="mbr-overlay" style="opacity: 0;">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">
                <h3 class="mbr-section-title display-2" style="color: #114f91;">Invite your friends to recieve 100 free democoins</h3>
                <div class="lead"><p>Mobirise 3 template is free for everyone, you can use it for your commercial and non-profit sites.</p></div>
                <div><a class="btn btn-yellow" href="{{route('reference-bonus')}}">REFER LINK NOW</a> </div>
            </div>
        </div>
    </div>

</section>

@if($virtual_shoes->count() > 0)
<section class="mbr-section article mbr-parallax-background" id="msg-box3-40" style="padding:2rem;">
    <div class="panel-heading text-center mt-3">
        <h2>Virtual Shoes </h2>
    </div>
    <div id="exampleSlider" class="container">
       <div class="MS-content">
            @foreach($virtual_shoes as $shoe)
                <div class="item">
                    <div class="wt-icon-box-wraper bx-style-1 p-a20 left equal-col bg-white slider-hover" >
                        <div style="text-align: center;">
                            <img class="img-fluid" src="{{ asset('assets/images/shoes') }}/{{ $shoe->image }}" alt="" style="width:100%;">
                        </div>
                        <div class="icon-content ">
                            <h5 class="wt-tilte text-uppercase text-black">{{$shoe->name}}</h5>
                            <p style="color:#114f91; font-size:18px;">{{$shoe->purchase_price}} {{$gnl->currency}}</p>
                            <p class="font-weight-bold pt-0" style="font-size: 14px; color: #ffca2c;">{{$shoe->discount}}% off</p>
                            <p class="font-weight-light pt-0" style="font-size: 14px;"> Till {{date("F jS, Y", strtotime($shoe->discount_expiry))}} </p>
                        </div>
                        <div style="text-align: center;z-index: 1000;">
                            <form id="virtual{{$shoe->id}}" method="POST" action="{{route('buy.shoe.virtual', $shoe->id )}}" onsubmit="virtual_purchase('virtual{{$shoe->id}}')">
                                @csrf
                                <button type="submit" class="btn btn-white" href="{{route('buy.shoe.virtual', $shoe->id )}}">Buy Now</button>

                            </form>
                        </div>
<!--                         <div style="text-align: center;z-index: 1000;">
                            <a class="btn btn-white" href="{{route('register')}}">Sell Now</a>
                        </div> -->
                    </div>
                </div>
            @endforeach
       </div>
       <div class="MS-controls">
           <button class="MS-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
           <button class="MS-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
       </div>
   </div>
</section>
@endif

@if($physical_shoes->count() > 0)
<section class="mbr-section article mbr-parallax-background" id="msg-box3-40" style="padding:2rem;">
    <div class="panel-heading text-center">
        <h2>Physical Shoes </h2>
    </div>
    <div id="exampleSlider1" class="container">
       <div class="MS-content">
            @foreach($physical_shoes as $shoe)
                <div class="item" style="width: 100%;">
                    <div class="row">
                            <div class = "col-lg-6 col-md-12 col-xs-12">
                                <div class="bg-white" style="height:380px !important; overflow-wrap: break-word; ">
                                    <div><h2 style="font-weight:900;">{{$shoe->name}}</h2></div>
                                    <div class="container" style="margin-top:1rem;padding:0;">
                                        <div class="col-md-4">
                                            <p style="font-size:25px;"><b style="font-size:40px; color:#ffca2c">{{$shoe->discount}}%</b>off</p>
                                            <p class="font-weight-light" style="font-size: 14px;"> Till {{date("F jS, Y", strtotime($shoe->discount_expiry))}} </p>
                                        </div>
                                        <div class="col-md-8"><p style="font-size:20px;">Physical item</p><p>will be delivered at your address</p></div>
                                    </div>
                                    <div class="container" style="margin-top:1rem;padding:0;">
                                        <p style="font-size:20px;">{{$shoe->description}}</p>
                                    </div>
                                    <div class="container" style="margin-top:1rem;padding:0;">
                                        <p style="color:#114f91; font-size:20px;font-weight:bolder;float:left;">{{$shoe->purchase_price}} {{$gnl->currency}}</p>
                                        <form id="physcial{{$shoe->id}}" method="POST" action="{{route('buy.shoe.physical', $shoe->id )}}" onsubmit="physcial_purchase('physcial{{$shoe->id}}')">
                                            @csrf
                                            <button type="submit" class="btn btn-white" style="float:left;margin-left:1rem;">Buy Now</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-xs-12">
                                <img src="{{ asset('assets/images/shoes') }}/{{ $shoe->image }}" alt="" style="width:100%;">
                            </div>
                        </div>
                </div>
            @endforeach
       </div>
       <div class="MS-controls">
           <button class="MS-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
           <button class="MS-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
       </div>
   </div>
</section>
@endif
<!-- <section class="mbr-section article mbr-parallax-background" id="msg-box3-40" style="padding:2rem;">
    <div class="container">
        @foreach($physical_shoes as $shoe)
        <div class="row">
            <div class = "col-lg-6 col-md-12 col-xs-12">
                <div class="bg-white" style="height:380px !important;">
                    <div><h2 style="font-weight:900;">{{$shoe->name}}</h2></div>
                    <div class="container" style="margin-top:1rem;padding:0;">
                        <div class="col-md-4">
                            <p style="font-size:25px;"><b style="font-size:40px; color:#ffca2c">{{$shoe->discount}}%</b>off</p>
                            <p class="font-weight-light" style="font-size: 14px;"> Till {{date("F jS, Y", strtotime($shoe->discount_expiry))}} </p>
                        </div>
                        <div class="col-md-8"><p style="font-size:20px;">Physical item(will be delivered at your address)</p></div>
                    </div>
                    <div class="container" style="margin-top:1rem;padding:0;">
                        <p style="font-size:20px;">{{$shoe->description}}</p>
                    </div>
                    <div class="container" style="margin-top:1rem;padding:0;">
                        <p style="color:#114f91; font-size:20px;font-weight:bolder;float:left;">{{$shoe->purchase_price}} {{$gnl->currency}}</p>
                        <form id="physcial{{$shoe->id}}" method="POST" action="{{route('buy.shoe.physical', $shoe->id )}}" onsubmit="physcial_purchase('physcial{{$shoe->id}}')">
                            @csrf
                            <button type="submit" class="btn btn-white" style="float:left;margin-left:1rem;">Buy Now</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-xs-12">
                <div class="MS-content wt-icon-box-wraper bx-style-1 p-a20 left equal-col bg-white slider-hover">
                    <div class="item">
                        <img src="{{ asset('assets/images/shoes') }}/{{ $shoe->image }}" alt="" style="width:100%;">
                    </div>
                </div>
            </div>

        </div>
        @endforeach
    </div>
</section>
 -->

<section class="mbr-section article mbr-parallax-background slider-hover3" id="msg-box3-40" style="padding:2rem;background-image: url('assets/public/assets/images/spin-back1.png');">
    <div class="container">
        <div class="row">
            <div class="col-lg-3" style="font-family: 'Montserrat', sans-serif !important; display: table; vertical-align: middle; height: 400px;">

                  <div style=
                    "#position: absolute; #top: 50%;display: table-cell; vertical-align: middle;">
                    <div style=" color: #fdcb25; position: relative; top: -50%; font-weight: bold; font-size: 40px;">
                      WIN
                    </div>
                    <div style=" color: #114f91; text-align: center; position: relative; top: -50%; font-style: italic; font-size: 15px;">
                      Democoin
                    </div>
                  </div>

            </div>
            <div style="text-align: center;" class="col-lg-6">

                @if(Auth::user())
                    @if( (Carbon\Carbon::now()->diffInMinutes(\Auth::user()->google_2fa_last_login_user) < config('google2fa.time_limit_2fa') && \Auth::user()->google_2fa_last_login_user != null) || !\Auth::user()->checkIfGoogle2faEnabled() )
                        <div id="chart" style="width: 100%;" class="loggedin"></div>
                    @else
                        <div><a href="{{route('home')}}" id="chart_static" class="logout"></a></div>
                    @endif
                @else
                    <div><a href="{{route('register')}}" id="chart_static" class="logout"></a></div>
                @endif
                <div style="text-align: center; width: 100%;" id="question"><h1 style="font-family: 'Open Sans', sans-serif !important;font-size: 40px;"></h1></div>
            </div>
            <div class="col-lg-3" style="font-family: 'Montserrat', sans-serif !important; display: table; vertical-align: middle; height: 400px;">

                  <div style=
                    "#position: absolute; #top: 50%;display: table-cell; vertical-align: middle;">
                    <div style=" color: #114f91; position: relative; top: -50%; font-weight: bold; font-size: 40px;">
                      Costs 100
                    </div>
                    <div style=" color: #000; text-align: center; position: relative; top: -50%; font-style: italic; font-size: 15px;">
                      Democoins for each spin
                    </div>
                  </div>

            </div>
        </div>
    </div>
</section>


<section>
    <div style="width: 30%; margin:auto;text-align: center;margin-top: 3%"><h3>Our Team</h3></div>
    <div id="teamSlider" class="container">
       <div class="MS-content" >
           <div class="item">
                <div class="wt-icon-box-wraper bx-style-1 left equal-col bg-white slider-hover1" >
                    <div style="text-align: center;">
                        <img class="img-fluid" src="{{asset('assets/public/assets/images/man1.png')}}" alt="">
                    </div>
                    <div class="icon-content2" style="display: none;background-color: #114f91;">
                        <h5 class="ico-content1-text text-uppercase" style="color: white;">John Deo Geo</h5>
                        <p style="color: gray;">Exchange Manager</p>
                        <p style="color: white; margin-top: 7%;padding-bottom: 1rem;">This is my practice site and in the <br> further i'll product Demo</p>
                    </div>
                    <div class="icon-content1">
                        <h5 class="ico-content1-text text-uppercase text-black">Jamse Deo Geo</h5>
                        <p>CEO</p>
                    </div>
                </div>
            </div>
           <div class="item">
                <div class="wt-icon-box-wraper bx-style-1 left equal-col bg-white slider-hover1" >

                    <div style="text-align: center;">
                        <img class="img-fluid" src="{{asset('assets/public/assets/images/man2.png')}}" alt="">
                    </div>
                    <div class="icon-content2" style="display: none;background-color: #114f91;">
                        <h5 class="ico-content1-text text-uppercase" style="color: white;">John Deo Geo</h5>
                        <p style="color: gray;">Exchange Manager</p>
                        <p style="color: white; margin-top: 7%;padding-bottom: 1rem;">This is my practice site and in the <br> further i'll product Demo</p>
                    </div>
                    <div class="icon-content1">
                        <h5 class="ico-content1-text text-uppercase text-black">Jamse Deo Geo</h5>
                        <p>CEO</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="wt-icon-box-wraper bx-style-1 left equal-col bg-white slider-hover1" >

                    <div style="text-align: center;">
                        <img class="img-fluid" src="{{asset('assets/public/assets/images/man3.png')}}" alt="">
                    </div>
                    <div class="icon-content2" style="display: none;background-color: #114f91;">
                        <h5 class="ico-content1-text text-uppercase" style="color: white;">John Deo Geo</h5>
                        <p style="color: gray;">Exchange Manager</p>
                        <p style="color: white; margin-top: 7%;padding-bottom: 1rem;">This is my practice site and in the <br> further i'll product Demo</p>
                    </div>
                    <div class="icon-content1">
                        <h5 class="ico-content1-text text-uppercase text-black">Jamse Deo Geo</h5>
                        <p>CEO</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="wt-icon-box-wraper bx-style-1 left equal-col bg-white slider-hover1" >

                    <div style="text-align: center;">
                        <img class="img-fluid" src="{{asset('assets/public/assets/images/man3.png')}}" alt="">
                    </div>
                   <div class="icon-content2" style="display: none;background-color: #114f91;">
                        <h5 class="ico-content1-text text-uppercase" style="color: white;">John Deo Geo</h5>
                        <p style="color: gray;">Exchange Manager</p>
                        <p style="color: white; margin-top: 7%;padding-bottom: 1rem;">This is my practice site and in the <br> further i'll product Demo</p>
                    </div>
                    <div class="icon-content1">
                        <h5 class="ico-content1-text text-uppercase text-black">Jamse Deo Geo</h5>
                        <p>CEO</p>
                    </div>
                </div>
            </div>
           <div class="item">
                <div class="wt-icon-box-wraper bx-style-1 left equal-col bg-white slider-hover1" >

                    <div style="text-align: center;">
                        <img class="img-fluid" src="{{asset('assets/public/assets/images/man2.png')}}" alt="">
                    </div>
                    <div class="icon-content2" style="display: none;background-color: #114f91;">
                        <h5 class="ico-content1-text text-uppercase" style="color: white;">John Deo Geo</h5>
                        <p style="color: gray;">Exchange Manager</p>
                        <p style="color: white; margin-top: 7%;padding-bottom: 1rem;">This is my practice site and in the <br> further i'll product Demo</p>
                    </div>
                    <div class="icon-content1">
                        <h5 class="ico-content1-text text-uppercase text-black">Jamse Deo Geo</h5>
                        <p>CEO</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="wt-icon-box-wraper bx-style-1 left equal-col bg-white slider-hover1" >

                    <div style="text-align: center;">
                        <img class="img-fluid" src="{{asset('assets/public/assets/images/man3.png')}}" alt="">
                    </div>
                    <div class="icon-content2" style="display: none;background-color: #114f91;">
                        <h5 class="ico-content1-text text-uppercase" style="color: white;">John Deo Geo</h5>
                        <p style="color: gray;">Exchange Manager</p>
                        <p style="color: white; margin-top: 7%;padding-bottom: 1rem;">This is my practice site and in the <br> further i'll product Demo</p>
                    </div>
                    <div class="icon-content1">
                        <h5 class="ico-content1-text text-uppercase text-black">Jamse Deo Geo</h5>
                        <p>CEO</p>
                    </div>
                </div>
            </div>
       </div>
       <div class="MS-controls">
           <button class="MS-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
           <button class="MS-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
       </div>
   </div>

</section>
<section class="mbr-section article " style="padding:2rem;background-image: url('assets/public/assets/images/phone-back.png');background-size: cover;">
    <div class="container">
        <div class="row" style="padding: 5rem 0 5rem 0; text-align: center;">
            <div class="col-md-6">
                <h3 class="mbr-section-title display-2" style="color: white;">Democoin Exchange New Version of App</h3>
                <div class="lead" style="color: white;"><p>Mobirise 3 template is free for everyone, you can use it for your commercial and non-profit sites.</p></div>
                <div>
                    <a class="btn btn-black" href="{{route('register')}}" style="border-radius:10px;width:243px;height: 71px; background-image: url('assets/public/assets/images/appstore1.png');background-size: cover;"></a>
                    <a class="btn btn-black" href="{{route('register')}}" style="border-radius:10px; width:243px;height: 71px; background-image: url('assets/public/assets/images/appstore2.png'); background-size: cover;"></a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('js')

    <script>

        function virtual_purchase(id){
            event.preventDefault();
            Swal.fire({
              title: 'Purchase of a virtual item',
              text: "Are you sure to purchase this item?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, purchase!'
            }).then((result) => {
              if (result.value) {
                document.getElementById(id).submit();
              }
            })
        }

        function physcial_purchase(id){
            event.preventDefault();
            Swal.fire({
              title: 'Purchase of an item',
              text: "Are you sure to purchase this item?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, purchase!'
            }).then((result) => {
              if (result.value) {
                document.getElementById(id).submit();
              }
            })
        }

        $(document).ready(function () {
            var from_amount = $(".from_amount").val();
            var receive_amount = $(".receive_amount").val();

            $(".from_amount, #from_currency_id, .receive_amount, #receive_currency_id ").on('keyup change', function () {

                var enterAmount = $(".from_amount").val();
                var fromAmountPrice = $("#from_currency_id option:selected").data('price');
                var fromAmountExchangeCharge = $("#from_currency_id option:selected").data('exchange');

                var receiveAmountPrice = $("#receive_currency_id option:selected").data('price');
                var receiveAmountExchangeCharge = $("#receive_currency_id option:selected").data('exchange');


                var getAmountTotal = parseFloat((receiveAmountPrice/ fromAmountPrice)*enterAmount);
                var chargeFromTotalAmoFromEnter = parseFloat((getAmountTotal*receiveAmountExchangeCharge)/100);
                var getAmountInput = parseFloat((getAmountTotal - chargeFromTotalAmoFromEnter));
                $(".receive_amount").val(getAmountInput.toFixed(8));
            });

        });

        $('#exampleSlider').multislider({interval:5000});
        $('#exampleSlider1').multislider({interval:5000});
        $('#exampleSlider2').multislider({interval:500000});
        $('#teamSlider').multislider({
            interval:5000,
        });
       $(document).ready(function(){
          $('.slider-hover1').hover(function(){
            $(this).find('.icon-content2').css("display","block");
           $(this).find('.icon-content1').css("display","none");
          }, function(){
            $(this).find('.icon-content2').css("display","none");
            $(this).find('.icon-content1').css("display","block");
          });

        });

        var padding = {top:20, right:40, bottom:0, left:0},
            w = 400 - padding.left - padding.right,
            h = 400 - padding.top  - padding.bottom,
            r = Math.min(w, h)/2,
            rotation = 0,
            oldrotation = 0,
            picked = 100000,
            oldpick = [],
            color = d3.scale.category20();//category20c()

        var data = [
                    {"label":"1x", "value":1, "question":"Congratulations! You've earned 100 points!"},
                    {"label":"Lose", "value":1, "question":"Bad Luck! Try again!"},
                    {"label":"Lose", "value":1, "question":"Bad Luck! Try again!"},
                    {"label":"1K", "value":1, "question":"Congratulations! You've earned 1000 points!"},
                    {"label":"Lose", "value":1, "question":"Bad Luck! Try again!"},
                    {"label":" Lose", "value":1, "question":"Bad Luck! Try again!"}
        ];
        var svg = d3.select('#chart1')
            .append("svg")
            .data([data])
            .attr("width",  w + padding.left + padding.right)
            .attr("height", h + padding.top + padding.bottom);
        var svg = d3.select('#chart')
            .append("svg")
            .data([data])
            .attr("width",  w + padding.left + padding.right)
            .attr("height", h + padding.top + padding.bottom)
            .style({"overflow":"visible"});

        var container = svg.append("g")
            .attr("class", "chartholder")
            .attr("transform", "translate(" + (h/2 + padding.top) + "," + (h/2 + padding.top) + ")");

        container.append("circle")
        .attr("cx", 0)
        .attr("cy", 0)
        .attr("r", 205)
        .attr("stroke-width", 1)
        .style({"fill":"#0000000a"});

        container.append("circle")
        .attr("cx", 0)
        .attr("cy", 0)
        .attr("r", 200)
        .attr("stroke-width", 1)
        .style({"fill":"#fff5d6"});

        container.append("circle")
        .attr("cx", 0)
        .attr("cy", 0)
        .attr("r", 191)
        .attr("stroke-width", 1)
        .style({"fill":"#114f91"});


        var vis = container
            .append("g");

        var pie = d3.layout.pie().sort(null).value(function(d){return 1;});
        // declare an arc generator function
        var arc = d3.svg.arc().outerRadius(r);
        // select paths, use arc generator to draw
        var arcs = vis.selectAll("g.slice")
            .data(pie)
            .enter()
            .append("g")
            .attr("class", "slice");

        arcs.append("path")
            .attr("stroke","#FDCB25")
            .attr("stroke-width","5")
            .attr("fill", "#fff")
            // .attr("fill", function(d, i){ return color(i); })
            .attr("d", function (d) { return arc(d); });

        // add the text
        arcs.append("text").attr("transform", function(d){
                d.innerRadius = 0;
                d.outerRadius = r;
                d.angle = (d.startAngle + d.endAngle)/2;
                return "rotate(" + (d.angle * 180 / Math.PI ) + ")translate(10,-120)";

                // return "rotate(" + (d.angle * 180 / Math.PI - 90) + ")translate(" + (d.outerRadius -10) +")";
            })
            .attr("text-anchor", "end")
            .text( function(d, i) {
                return data[i].label;
            })
            .style({"fill" : "black", "font-weight":"normal", "font-family": "'Open Sans', sans-serif", "font-size":"30px"});

        container.on("click", spin);

        function spin(d){

            /* Reseting Spinner */
            d3.select(".slice:nth-child(" + (picked + 1) + ") path")
                .attr("fill", "#fff");
            //populate question
            d3.select("#question h1")
                .text("");

            /* Unbinding click event */
            container.on("click", null);

            (async () => {
                const rawResponse = await fetch("{{ route('home.spin') }}", {
                    method: 'PATCH',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                });
                const content = await rawResponse.json();
                if (content.error){
                    return;
                }
                else if (content.success){

                    playSound();
                    var ps       = content.success.ps;
                        pieslice = content.success.pieslice;
                        rng      = content.success.rng;
                    rotation = content.success.rotation;
                    picked   = content.success.picked;

                    /* Spin */
                    rotation += 90 - Math.round(ps/2);
                    vis.transition()
                        .duration(10000)
                        .attrTween("transform", rotTween)
                        .each("end", function(){
                            //mark question as seen
                            d3.select(".slice:nth-child(" + (picked + 1) + ") path")
                                .attr("fill", "#ffca2f");
                            //populate question
                            d3.select("#question h1")
                                .text(data[picked].question);
                            oldrotation = rotation;

                            /*Rebinding click event*/
                            container.on("click", spin);
                            Swal.fire(data[picked].label, content.success.question , "info");
                        });

                } else{
                    return;
                }

            })();
        }

        //make arrow
        svg.append("g")
            .attr("transform", "translate(" + (w + padding.left + padding.right) + "," + ((h/2)+padding.top) + ")")
            .append("path")
            .attr("d", "M-" + (r*.15) + ",0L0," + (r*.05) + "L0,-" + (r*.05) + "Z")
            .style({"fill":"red"});
        //draw spin circle
        container.append("circle")
            .attr("cx", 0)
            .attr("cy", 0)
            .attr("r", 65)
            .style({"fill":"#FDCB25","cursor":"pointer"});
        container.append("circle")
            .attr("cx", 0)
            .attr("cy", 0)
            .attr("r", 60)
            .style({"fill":"#114f91","cursor":"pointer"});

        //spin text
        container.append("text")
            .attr("x", 0)
            .attr("y", 10)
            .attr("text-anchor", "middle")
            .text("SPIN")
            .style({"fill" : "white", "font-weight":"bold", "font-family": "'Open Sans', sans-serif", "font-size":"30px"});


        function rotTween(to) {
          var i = d3.interpolate(oldrotation % 360, rotation);
          return function(t) {
            return "rotate(" + i(t) + ")";
          };
        }
        let audio = new Audio('assets/public/assets/images/effect.mp3');
        function playSound()
            {
                // Stop and rewind the sound if it already happens to be playing.
                audio.pause();
                audio.currentTime = 0;
                // Play the sound.
                audio.play();
            }


        function getRandomNumbers(){
            var array = new Uint16Array(1000);
            var scale = d3.scale.linear().range([360, 1440]).domain([0, 100000]);
            if(window.hasOwnProperty("crypto") && typeof window.crypto.getRandomValues === "function"){
                window.crypto.getRandomValues(array);
                console.log("works");
            } else {
                //no support for crypto, get crappy random numbers
                for(var i=0; i < 1000; i++){
                    array[i] = Math.floor(Math.random() * 100000) + 1;
                }
            }
            return array;
        }
    </script>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

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
<style type="text/css">

    button{
        outline: none !important;
    }

    .btn.btn-white.blue{
        background-color: #1d75bd;
        color: white;
        border: 1px solid #aeaeae;
    }

    .btn.btn-white.blue:hover{
        background-color: white;
        color: black;
        border: 1px solid black;
    }

    .btn.btn-white.yellow{
        background-color: #ffca2c;
        color: white;
        border: 1px solid #aeaeae;
    }

    .btn.btn-white.yellow:hover{
        background-color: white;
        color: black;
        border: 1px solid #ffca2c;
    }

    @media (max-width: 1200px) {
        .currencies-container{
            text-align: center !important;
        }
    }

    #div_a3c8_0 {
        padding-top: 70px
    }

    #i_a3c8_0 {
        font-size: 30px;
        color: #1d75bd
    }

    #span_a3c8_013 {
        color: #ffca2e;
        font-size: 13px;
        font-family: 'Open Sans', sans-serif;
        font-weight: bold;
    }

    #span_a3c8_012 {
        color: #ffca2e;
        font-size: 18px;
        font-family: 'Open Sans', sans-serif;
        font-weight: bold;
    }

    #span_a3c8_0 {
        color: #1d75bd;
        font-size: 16px;
        font-family: 'Open Sans', sans-serif;
        /*font-weight: bold;*/
    }

    #span_a3c8_01243 {
        color: #1d75bd;
        font-size: 14px;
        font-family: 'Open Sans', sans-serif;
        font-weight: bold;
    }

    #a_a3c8_0,
    #a_a3c8_1 {
        background-color: rgb(255, 202, 46);
        border: 0px solid;
        border-radius: 20px;
        line-height: 0px;
        height: 35px;
        font-size: 14px;
        text-align: center;
        padding: inherit;
        width: 120px;
        font-family: 'Open Sans', sans-serif;
        font-weight: bold;
    }

    #a_a3c8_92 {
        background-color: #1d75bd;
        border: 0px solid;
        border-radius: 20px;
        line-height: 0px;
        height: 35px;
        font-size: 13px;
        text-align: center;
        padding: inherit;
        padding-left: 5px;
        padding-right: 5px;
        font-family: 'Open Sans', sans-serif;
        font-weight: bold;
    }

    .progress {
        height: 20px;
    }

    .progress-bar-text {
        text-align: center;
        left: 0;
        position: absolute;
        width: 100%;
    }

    #i_a3c8_1 {
        font-size: 30px;
        color: #1d75bd
    }

    #span_a3c8_1 {
        color: #1d75bd;
        font-size: 18px;
        font-family: 'Open Sans', sans-serif;
        font-weight: bold;
        ;
    }

    #a_a3c8_2 {
        background-color: rgb(255, 202, 46);
        font-weight: bold;
        border: 0px solid;
        border-radius: 20px;
    }

    #a_a3c8_3 {
        background-color: rgb(255, 202, 46);
        font-weight: bold;
        border: 0px solid;
        border-radius: 20px;
    }

    #i_a3c8_2 {
        font-size: 30px;
        color: #1d75bd
    }

    #span_a3c8_2 {
        color: #1d75bd;
        font-size: 18px;
        font-family: 'Open Sans', sans-serif;
        font-weight: bold;
        ;
    }

    #a_a3c8_4 {
        background-color: rgb(255, 202, 46);
        font-weight: bold;
        border: 0px solid;
        border-radius: 20px;
    }

    #a_a3c8_5 {
        background-color: rgb(255, 202, 46);
        font-weight: bold;
        border: 0px solid;
        border-radius: 20px;
    }

    #i_a3c8_3 {
        font-size: 30px;
        color: #1d75bd
    }

    #span_a3c8_3 {
        color: #1d75bd;
        font-size: 18px;
        font-family: 'Open Sans', sans-serif;
        font-weight: bold;
        ;
    }

    #a_a3c8_6 {
        background-color: rgb(255, 202, 46);
        font-weight: bold;
        border: 0px solid;
        border-radius: 20px;
    }

    #a_a3c8_7 {
        background-color: rgb(255, 202, 46);
        font-weight: bold;
        border: 0px solid;
        border-radius: 20px;
    }

    #span_a3c8_4 {
        color: rgb(255, 202, 46);
        font-size: 16px
    }

    #a_a3c8_8 {
        background-color: rgb(255, 202, 46);
        border: 0px solid;
        border-radius: 20px;
    }

</style>
@endsection

