@extends('layout')
@section('content')

<div class="page-title-area">
    <div class="container">
        <div class="page-title">
            <h1>{{$page_title}}</h1>
        </div>
    </div>
</div>

<div class="container text-center" id="div_a3c8_0">
    <div class="row">

        <div class="col-lg-8 col-xl-8 col-md-12 col-sm-12">
            <div class="affilate-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="tables pt-0">
                                <div class="heading">
                                    <h4 class="mb-1">Referral Link <p class="font-weight-light pb-10"> Invite your friends and recieve free 100 DCO on their first deposit! </p></h4>
                                </div>
                                <div class="affiliate">
                                    <form class="input-box">
                                        <input type="text" id="myInput" style="height: 40px" value=" {{ route('refer.register',auth::user()->username) }}">
                                        <button class="copy" type="button" style="height: 40px;" onclick="myFunction()" title="Clipboard Copy"><i class="fas fa-copy"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid mb-3 mt-3 pt-5 pb-5 position-relative" style="font-weight: 400;border: 0;box-shadow: 0 5px 10px 0 rgba(0, 0, 0, .16), 0 5px 10px 0 rgba(0, 0, 0, .12);">
                    <div class="total-balance">
                        Your total balance: <span style="font-weight: bold;">{{ number_format( auth()->user()->balance) }} {{ $gnl->currency }}</span>
                    </div>
                @foreach($currencies as $currency)
                <div class="col-sm-12 col-md-12 col-md-12 col-lg-12 col-xl-6 mb-2 text-left currencies-container">
                    @if($currency->id == 1)
                        <img src="{{ asset('assets/images/currency/'). '/' .$currency->image }}" id="i_a3c8_0">
                        <span id="span_a3c8_0">
                            {{ $currency->name }} ({{ $currency->symbol }}): 
                            <span class="font-weight-bold">

                                @php $bitcoinDcoRate = getBitcoinRate() * 10; @endphp

                                {{ number_format(   (1/$bitcoinDcoRate) *
                                                    ($currency->trx()->where('user_id', $user_id)->where('type', '+')->sum('amount')
                                                    -$currency->trx()->where('user_id', $user_id)->where('type', '-')->sum('amount')) , 8, ',', '.')
                                }}
                                {{ $currency->name }}<span class="font-weight-light">(s)</span>
                            </span>
                        </span>
                    @else
                        <img src="{{ asset('assets/images/currency/'). '/' .$currency->image }}" id="i_a3c8_0">
                        <span id="span_a3c8_0">
                            {{ $currency->name }} ({{ $currency->symbol }}): 
                            <span class="font-weight-bold">
                                {{ number_format(   $currency->trx()->where('user_id', $user_id)->where('type', '+')->sum('amount')
                                                -   $currency->trx()->where('user_id', $user_id)->where('type', '-')->sum('amount') , 2, ',', '.')
                                }}
                                {{ $gnl->currency }}
                            </span>
                        </span>
                    @endif
                </div>
                <div class="col-sm-12 col-md-12 col-md-12 col-lg-12 col-xl-6">

                    <!-- <button id="a_a3c8_0" data-toggle="modal" data-target="#depositModal{{$currency->id}}" class="btn btn-primary btn-sm">Deposit</button> -->
                    <button data-toggle="modal" data-target="#depositModal{{$currency->id}}" class="btn btn-white">Deposit</button>

                    <!-- Modal -->
                    <div class="modal" id="depositModal{{$currency->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                @if($currency->id == 1)
                                                    <input id="input_dco_{{$currency->id}}" type="text" class="form-control " name="amount" placeholder="0.00" aria-label="amount"
                                                    onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '');
                                                             document.getElementById('input_currency_{{$currency->id}}').value = (this.value/{{ $bitcoinDcoRate }}).toFixed(8) ;"
                                                    placeholder=" Enter Amount" required>
                                                @else
                                                    <input id="input_dco_{{$currency->id}}" type="text" class="form-control " name="amount" placeholder="0.00" aria-label="amount"
                                                    onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '');
                                                             document.getElementById('input_currency_{{$currency->id}}').value = (this.value*{{ $currency->price }}).toFixed(8) ;"
                                                    placeholder=" Enter Amount" required>
                                                @endif
                                                <span class="input-group-text" id="basic-addon1">{{$basic->currency}}</span>
                                            </div>

                                            <div class="input-group-prepend mt-3">
                                                <input id="input_currency_{{$currency->id}}" class="form-control" disabled="" placeholder="0.00" >
                                                <span class="input-group-text" id="basic-addon1">{{$currency->name}}</span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success mb-0">Preview</button>
                                        <button type="button" class="btn btn-danger " data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <button onclick="withdrawSwal({{$currency->trx()->where('user_id', $user_id)->where('type', '+')->sum('amount')}})" class="btn btn-white">Withdraw</button>
                </div>
                @endforeach
            </div>

            <div class="container-fluid mb-5">

                <div class="offset-md-4 col-md-4 ">

                    <!-- <a href="#" class="btn btn-primary btn-sm" id="a_a3c8_0">Deposite</a> -->
                    <button data-toggle="modal" data-target="#pendingModal" class="btn btn-white blue">See Pending Deposits
                    </button>

                    <!-- Modal -->
                    <div class="modal" id="pendingModal" tabindex="-1" role="dialog" aria-labelledby="pendingModal" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"> Pendings Deposits </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="tile">
                                                <h4 class="tile-title ">Deposits awaiting confirmations</h4>
                                                <div class="tile-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered table-hover order-column text-center" id="">
                                                            <thead>
                                                                <tr>
                                                                    <th>#TRX</th>
                                                                    <th>Gateway</th>
                                                                    <th>Amount</th>
                                                                    <th>Status</th>
                                                                    <th>Date</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($deposits as $data)
                                                                <tr>
                                                                    <td>{{$data->trx}}</td>
                                                                    <td>{{$data->gateway->name}}</td>
                                                                    <td><strong>{{$data->amount}} {{$basic->currency}}</strong></td>
                                                                    <td>
                                                                        @if($data->status == 1)
                                                                        <span class="badge badge-success"> Completed </span> @else
                                                                        <span class="badge badge-warning">Pending </span> @endif
                                                                    </td>
                                                                    <td>
                                                                        {{$data->updated_at}}
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                                <tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Currency Cards -->
        <div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
            <div class="container">

                <div class="card">
                    <div class="card-body">
                        <span id="span_a3c8_4">
                                @php $bitcoinRate = getBitcoinRate(); @endphp
                                {{$bitcoin->name}} {{$bitcoin->discount_percentage}}% off
                                <br> 1 BTC = {{ number_format( $bitcoinRate * 10, 2, ',', '.')}} DCO
                                <br> Our Price = {{ number_format( ( ($bitcoinRate * 10) - ($bitcoin->discount_fixed) - ( ($bitcoinRate * 10) * ($bitcoin->discount_percentage/100) ) ) , 2, ',', '.')}} DCO
                            </span>
                        <div class="d-block mb-1 mt-1">
                            <button class="btn btn-primary" id="a_a3c8_92">{{ number_format($bitcoin->available_balance, 2, ',', '.') }} Bitcoins</button>

                            <button style="width: 120px; height: 35px;" data-toggle="modal" data-target="#buyBitcoinModal" class="btn btn-white yellow">Buy Now
                            </button>

                            <!-- Modal -->
                            <div class="modal" id="buyBitcoinModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Deposit <strong>{{$bitcoin->name}}</strong> via <strong>{{$gate->name}}</strong></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="post" action="{{route('deposit.data-insert')}}">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="currency_id" value="{{$bitcoin->id}}">
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
                                                <button type="button" class="btn btn-danger " data-dismiss="modal">Close
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" id="div_a3c8_1" aria-valuenow="{{ $bitcoin->total_balance - $bitcoin->available_balance }}" aria-valuemin="0" aria-valuemax="100">
                                    <span class="progress-bar-text">{{ number_format($bitcoin->available_balance, 2, ',', '.') }} / {{ number_format($bitcoin->total_balance, 2, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <span id="span_a3c8_4">
                                Buy Demo Coins
                                <br> {{ secondsToTime($gnl->counter) }}
                            </span>
                        <div class="d-block mb-1 mt-1">
                            <button class="btn btn-primary" id="a_a3c8_92">{{ number_format($democoin->available_balance, 2, ',', '.') }} DCOs</button>

                            <button style="width: 120px; height: 35px;" data-toggle="modal" data-target="#buyDemoModal" class="btn btn-white yellow">Buy Now</button>

                            <!-- Modal -->
                            <div class="modal" id="buyDemoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Deposit <strong>{{$democoin->name}}</strong> via <strong>{{$gate->name}}</strong></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="post" action="{{route('deposit.data-insert')}}">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="currency_id" value="{{$democoin->id}}">
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
                                                <button type="button" class="btn btn-danger " data-dismiss="modal">Close
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" id="div_a3c8_121" aria-valuenow="{{ $democoin->total_balance - $democoin->available_balance }}" aria-valuemin="0" aria-valuemax="100">
                                    <span class="progress-bar-text">{{ number_format($democoin->available_balance, 2, ',', '.') }} / {{ number_format($democoin->total_balance, 2, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

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
                                                <button type="button" class="btn btn-danger " data-dismiss="modal">Close
                                                </button>
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
    </div>
</div>

    <!-- All Physic and Virtual Shoes the user owns -->

    @if($virtual_purchases->count() > 0 )
        <section class="mbr-section article mbr-parallax-background" id="msg-box3-40" style="padding:2rem;">
            <div class="panel-heading text-center">
                <h2>Virtual Shoes You Own </h2>
            </div>
            <div id="exampleSlider" class="container">
                <div class="MS-content">
                    @foreach($virtual_purchases as $data) @if( ( ( array_key_exists( 'buy' , $data->toArray() ) ? $data['buy']->count() : 0 ) - ( array_key_exists('sell', $data->toArray() ) ? $data['sell']->count() : 0 ) ) > 0 )

                    <div class="item">
                        <div class="container">
                            <div style="position: absolute; z-index: 2; color: white; font-size: 12px; background-color: #ffca2c; right: 0; top: 0; height: 18px; width: 80px; border-bottom-left-radius: 20px;">
                                You own: <span style="font-weight: bold;">{{ $data['buy']->count() }}</span>
                            </div>
                        </div>
                        <div class="wt-icon-box-wraper bx-style-1 p-a20 left equal-col bg-white slider-hover">

                            <div style="text-align: center;">
                                <img class="img-fluid" src="{{ asset('assets/images/shoes') }}/{{ $data->first()->first()->shoe->image }}" alt="" style="width:100%;">
                            </div>

                            <div class="icon-content ">

                                <h5 class="wt-tilte text-uppercase text-black">{{ $data->first()->first()->shoe->name }}</h5>
                                <p style="color:#114f91; font-size:16px;">
                                    <span style="font-size:13px;">Sell price: </span> 
                                    {{ $data->first()->first()->shoe->sell_price }}
                                    <span style="font-size:12px; font-weight: bold;"> {{$gnl->currency}} </span>
                                </p>
                                <p style="color:#114f91; font-size:16px;">
                                    <span style="font-size:13px;">Purchase price: </span>
                                    {{ $data->first()->first()->shoe->purchase_price }}
                                    <span style="font-size:12px; font-weight: bold;"> {{$gnl->currency}} </span>
                                </p>
                                <p class="pt-0" style="font-size: 14px; color: #ffca2c;">
                                    {{ $data->first()->first()->shoe->discount }}% off
                                </p>
                                <p class="font-weight-light pt-0" style="font-size: 14px;">
                                    Till {{date("F jS, Y", strtotime( $data->first()->first()->shoe->discount_expiry ))}}
                                </p>

                            </div>

                            <div style="text-align: center;z-index: 1000;">
                                <form id="virtual{{ $data->first()->first()->shoe->id }}" method="POST" action="{{route('buy.shoe.virtual', $data->first()->first()->shoe->id )}}" onsubmit="virtual_purchase('virtual{{ $data->first()->first()->shoe->id }}')">
                                    @csrf
                                    <button type="submit" class="btn btn-white">Buy Now</button>

                                </form>
                            </div>

                            <div style="text-align: center;z-index: 1000;">

                                <form id="virtualsell{{ $data->first()->first()->shoe->id }}" method="POST" action="{{route('sell.shoe.virtual', $data->first()->first()->shoe->id )}}" onsubmit="virtual_sell('virtualsell{{ $data->first()->first()->shoe->id }}', '{{ $data->first()->first()->shoe->sell_price }}', '{{ $gnl->currency }}' )">
                                    @csrf
                                    <button type="submit" class="btn btn-white">Sell Now</button>
                                </form>
                            </div>

                        </div>
                    </div>
                    @endif @endforeach
                </div>
                <div class="MS-controls">
                    <button class="MS-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    <button class="MS-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                </div>
            </div>
        </section>
    @endif

    @if($shoes_purchases->count() > 0 )
        <section class="mbr-section article mbr-parallax-background" id="msg-box3-40" style="padding:2rem;">
            <div class="containter row">
                <div class="offset-md-1 col-md-10">
                    <div class="panel-heading text-center">
                        <h2>Physical Shoe Purchases </h2>
                    </div>
                    <div class="tile">
                        <div class="tile-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Shoe Name</th>
                                            <th>Transcation ID</th>
                                            <th>Total Amount</th>
                                            <th>Discount Availed</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach($shoes_purchases as $k=>$data)
                                        <tr>
                                            <td data-label="SL">{{++$k}}</td>
                                            <td data-label="Shoe Name">
                                                <img style="width: 35px; height: 25px; margin-right: 10px" src="{{ asset('assets/images/shoes') }}/{{ $data->shoe->image }}" alt="image"> {{$data->shoe->name }}
                                            </td>
                                            <td data-label="Transcation ID">
                                                @isset($data->trx_id) {{$data->trx->trx}} @endisset
                                            </td>

                                            <td data-label="Total Amount">{{$data->total_amount}} {{$basic->currency}}</td>
                                            <td data-label="Discount Availed">{{$data->discount}} {{$basic->currency}}</td>
                                            <td data-label="Status">
                                                {{ ucfirst($data->status) }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {!! $shoes_purchases->render() !!}

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Spinner -->
    <section class="mbr-section article mbr-parallax-background slider-hover3" id="msg-box3-40" style="padding:2rem;background-image: url({{asset('assets/public/assets/images/spin-back1.png')}});">
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

    <!-- All Physical and Virtual Shoes available to purchase -->

    @if($virtual_shoes->count() > 0)
    <section class="mbr-section article mbr-parallax-background" id="msg-box3-40" style="padding:2rem;">
        <div class="panel-heading text-center mt-3">
            <h2>All Virtual Shoes Available for Purchase </h2>
        </div>
        <div id="virtualSlider" class="container">
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
            <h2>All Physical Shoes Available for purchase </h2>
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
@endsection 

@section('js')
<script type="text/javascript">
    function virtual_sell(id, amount, symbol) {
        event.preventDefault();
        Swal.fire({
            title: 'Confirm Sale',
            text: "Are you sure to sell this shoe at " + amount + " " + symbol + " ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, confirm!'
        }).then((result) => {
            if (result.value) {
                document.getElementById(id).submit();
            }
        })
    }

    function virtual_purchase(id) {
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

    $(document).ready(function() {
        $('.slider-hover1').hover(function() {
            $(this).find('.icon-content2').css("display", "block");
            $(this).find('.icon-content1').css("display", "none");
        }, function() {
            $(this).find('.icon-content2').css("display", "none");
            $(this).find('.icon-content1').css("display", "block");
        });
        $('#exampleSlider').multislider({
            interval: 5000
        });
    });

    function withdrawSwal(value) {
        if (!value) {
            Swal.fire({
                title: 'Low Balance',
                type: 'info',
                html: 'Sorry! You have insufficient balance, please deposit first.',
                showCloseButton: true,
                showCancelButton: false,
                focusConfirm: false,
            })
        } else {
            Swal.fire({
                title: 'Exchange not Live',
                type: 'info',
                html: 'You can withdraw when our exchange goes live i.e. {{ $gnl->release_date }}',
                showCloseButton: true,
                showCancelButton: false,
                focusConfirm: false,
                animation: false,
                customClass: {
                    popup: 'animated tada'
                }
            })
        }
    }

    function myFunction() {
        /* Get the text field */
        var copyText = document.getElementById("myInput");

        /* Select the text field */
        copyText.select();

        /* Copy the text inside the text field */
        document.execCommand("copy");

    }
</script>


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

        $('#virtualSlider').multislider({interval:5000});
        $('#exampleSlider1').multislider({interval:5000});

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
        let audio = new Audio("{{asset('assets/public/assets/images/effect.mp3')}}");
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

    .total-balance{
        position: absolute;
        z-index: 2;
        color: white;
        font-size: 15px;
        background-color: #ffca2c;
        right: 0;
        top: 0;
        height: 25px;
        width: 45%;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-bottom-left-radius: 15px;
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
        font-size: 10px;
        text-align: center;
        padding: inherit;
        padding-left: 3px;
        padding-right: 3px;
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
    
    #div_a3c8_1 {
        width: {{ ( ($bitcoin->available_balance) / $bitcoin->total_balance) * 100}}%;

        color: #9e790c !important;
        background-color: #9ddd6a !important;
        height: inherit;
    }
    
    #div_a3c8_121 {
        width: {{ ( ($democoin->available_balance) / $democoin->total_balance) * 100}}%;
        color: #9e790c !important;
        background-color: #9ddd6a !important;
        height: inherit;
    }
    
    #div_a3c8_2 {
        margin-top: 10px
    }
    
    #span_a3c8_5 {
        color: rgb(255, 202, 46);
        font-size: 18px
    }
    
    #a_a3c8_9 {
        background-color: rgb(255, 202, 46);
        border: 0px solid;
        border-radius: 20px;
    }
    
    #div_a3c8_3 {
        width: 25%
    }
    
    #div_a3c8_4 {
        background-color: #f9fafaf6
    }
    
    #span_a3c8_6 {
        font-size: 18px;
        color: #1d75bd
    }
    
    #span_a3c8_7 {
        color: rgb(255, 202, 46)
    }
    
    #span_a3c8_8 {
        background-color: #1d75bd;
        font-size: 22px
    }
    
    #a_a3c8_10 {
        float: right;
        background-color: rgb(255, 202, 46);
        border: 0px solid;
        border-radius: 20px;
    }
    
    #span_a3c8_9 {
        font-size: 18px;
        color: #1d75bd;
    }
    
    #div_a3c8_5 {
        background-color: #f9fafaf6
    }
    
    #span_a3c8_10 {
        font-size: 24px;
        color: #1d75bd
    }
    
    #span_a3c8_11 {
        color: rgb(255, 202, 46)
    }
    
    #span_a3c8_12 {
        background-color: #1d75bd;
        font-size: 22px
    }
    
    #a_a3c8_11 {
        float: right;
        background-color: rgb(255, 202, 46);
        border: 0px solid;
        border-radius: 20px;
    }
    
    #span_a3c8_13 {
        font-size: 24px;
        color: #1d75bd;
    }
    
    #div_a3c8_6 {
        background-color: #f9fafaf6
    }
    
    #span_a3c8_14 {
        font-size: 24px;
        color: #1d75bd
    }
    
    #span_a3c8_15 {
        color: rgb(255, 202, 46)
    }
    
    #span_a3c8_16 {
        background-color: #1d75bd;
        font-size: 22px
    }
    
    #a_a3c8_12 {
        float: right;
        background-color: rgb(255, 202, 46);
        border: 0px solid;
        border-radius: 20px;
    }
    
    #span_a3c8_17 {
        font-size: 24px;
        color: #1d75bd;
    }
    
    #div_a3c8_7 {
        background-color: #f9fafaf6
    }
    
    #span_a3c8_18 {
        font-size: 24px;
        color: #1d75bd
    }
    
    #span_a3c8_19 {
        color: rgb(255, 202, 46)
    }
    
    #span_a3c8_20 {
        background-color: #1d75bd;
        font-size: 22px
    }
    
    #a_a3c8_13 {
        float: right;
        background-color: rgb(255, 202, 46);
        border: 0px solid;
        border-radius: 20px;
    }
    
    #span_a3c8_21 {
        font-size: 24px;
        color: #1d75bd;
    }
</style>

@endsection