@extends('layout')
@section('css')
<link rel="stylesheet" href="{{asset('assets/front/css/form.css')}}">
@stop 

@section('content')
<div class="container-fluid" style="background-color:rgb(24, 8, 73); padding-top: 200px; padding-bottom: 200px ">
    <div class="container">
        <div style="background-color: white; padding:40px" class="col-sm-4 col-sm-offset-4">
            <form class="form-horizontal" method="POST" action="{{ route('2fa') }}">
                @csrf
                <div class="form-group">
                    <center><span style="color: rgb(255, 202, 46); font-size: 30px"><b>Google Authenticator</b></span></center>
                </div>
                <div class="form-group">
                    <label for="one_time_password" style="color: rgb(255, 202, 46)" for="p">One Time Password</label>
                    <input style="background-color: rgb(255, 202, 46); border: 0px solid; border-radius: 10px; color: white; font-size: 14px;  " type="password" autofocus="" class="form-control" name="one_time_password" id="one_time_password" placeholder="Password" required="">
                    @if ($errors->has('one_time_password'))
                        <span class="error ">{{ $errors->first('one_time_password') }}</span>
                    @endif
                </div>
                <center>
                    <input type="submit" class="btn btn-primary" style=" background-color:rgb(27, 152, 255);  border: 2px solid; border-radius: 40px;" name="signIn" value="Submit">
                </center>

            </form>
        </div>
    </div>
</div>
@endsection