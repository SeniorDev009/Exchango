@extends('layout') @section('css')
<link rel="stylesheet" href="{{asset('assets/front/css/form.css')}}"> @stop @section('content')

<div class="page-title-area">
    <div class="container">
        <div class="page-title">
            <h1>Disable 2fa</h1>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 40px">
    <div class="card">
        <div class="card-body">
<!--             <div class="alert alert-primary container-fluid" role="alert">
                Two Factor Athuntication Enabled
            </div> -->
            <h4 class="card-title">Disable Two Factor Athuntication</h4>
            <p style="font-size:12px">For Extra Account Scurity, we strongly recommend you enable two-factor Authentication (2FA). Use Google Authenicator for 2FA.</p>
        
            <form class="form-horizontal" method="POST" action="{{ route('disable2faPost') }}">
                @csrf
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" readonly="" class="form-control-plaintext" name="email" value="{{ old('email', $email) }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="one_time_password" class="col-sm-2 col-form-label">One Time Code</label>
                    <div class="col-sm-5">
                        <input type="number" id="one_time_password" class="form-control" name="one_time_password" required="" autofocus="" placeholder="Code">
                    </div>
                </div>

                <input type="submit" value="Disable 2FA" style="border: 2px solid; border-radius: 30px;" class="btn btn-primary">
            </form>

        </div>
    </div>
</div>

@endsection