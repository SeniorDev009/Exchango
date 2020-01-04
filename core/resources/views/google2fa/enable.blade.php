@extends('layout') @section('css')
<link rel="stylesheet" href="{{asset('assets/front/css/form.css')}}"> @stop @section('content')

<div class="page-title-area">
    <div class="container">
        <div class="page-title">
            <h1 class="plus-margin"></h1>
        </div>
    </div>
</div>

<div class="container-fluid" style="padding:10px; background-color:rgb(244, 244, 244)">
    <div class="row" style="padding-right:10px; padding-left:10px; background-color:rgb(244, 244, 244)">
        <div style="background-color:rgb(244, 244, 244); padding-top:30px" class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <b><h3>Enable Two Factor Authentication</h3></b>
                    <p style="font-size:12px">For Extra Account Scurity, we strongly recommend you enable two-factor Authentication (2FA). Use Google Authenicator for 2FA.</p>
                    <form class="form-horizontal" method="POST" action="{{ route('enable2faPost') }}">
                        @csrf

                        <input name="secret" type="hidden" value="{{ old('secret',$secret) }}">
                        <input name="QR_Image" type="hidden" value="{{ old( 'QR_Image', $QR_Image ) }}">


                        <div class="form-group row">
                            <label for="email" class="col-md-4 control-label">Email: </label>

                            <label for="email" class="col-md-4 control-label">{{ old('email', $email) }}</label>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" required autofocus=""> 
                                @if ($errors->has('password'))
                                    <span class="error ">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="one_time_password" class="col-md-4 control-label">One Time Password</label>

                            <div class="col-md-6">
                                <input id="one_time_password" data-max="6" type="number" class="form-control" name="one_time_password" required> @if($errors->has('one_time_password'))
                                    <span class="error ">{{ $errors->first('one_time_password') }}</span>
                                @endif
                            </div>

                        </div>
                        <p style="font-size:12px">Before turning on 2FA, write down or print a copy of your 16-digit key and put it in a safe place, if your phone get lost, stolen, erased, you will need this key to get back into your account </p>
                        <br>
                        <input type="checkbox" name="checkbox" required=""> I have backed up my 16-digit key.
                        <br>
                        <br>
                        <input type="submit" value="Enable 2FA" style="border: 2px solid; border-radius: 30px;" class="btn btn-primary">

                    </form>

                </div>
            </div>
        </div>

        <div class="col-sm-6" style="background-color:rgb(244, 244, 244); padding-top:30px">
            <div class="card">
                <div class="card-body">
                    <p style="font-size:12px">Setup your your 2FA authentication by scanning barcode below, Alternatively you can use 16-digit key <b>{{ old('secret',$secret) }}</b>.</p>
                    <img style="margin-top:30px" src="{{ old( 'QR_Image', $QR_Image ) }}" />
                    <br>
                    <br>
                    <p style="font-size:12px">NOTE: This code will change each time you enable 2FA.
                        <br> Upon disabling 2FA, this code will no longer be valid</p>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection