<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;

use Auth;
use Google2FA;
use Carbon\Carbon;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be resent if the user did not receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = 'user/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }


      public function enable2fa(Request $request)
      {
        // Initialise the 2FA class
        $google2fa = app('pragmarx.google2fa');
        // Save the registration data in an array
        $registration_data = $request->all();
        $registration_data['email'] = auth()->user()->email;

        // Add the secret key to the registration data
        $registration_data["google2fa_secret"] = $google2fa->generateSecretKey();
        $secret = $registration_data["google2fa_secret"];

        // Save the registration data to the user session for just the next request
        $request->session()->put('secret', $secret);

        // Generate the QR image. This is the image the user will scan with their app
     // to set up two factor authentication
        $QR_Image = $google2fa->getQRCodeInline(
            config('app.name'),
            $registration_data['email'],
            $registration_data['google2fa_secret']
        );

        if( !empty($request->old('secret')) ){
          $secret = $request->old('secret');
          $QR_Image = $request->old('QR_Image'); 
        }

        $email = auth()->user()->email;

        return view('google2fa.enable', compact('email','QR_Image', 'secret'));
      }


      public function disable2fa(Request $request)
      {     
        $email = auth()->user()->email;
        return view('google2fa.disable', compact('email'));
      }

      public function enable2faPost(Request $request)
      {
        $request->validate([
            'password' => 'required',
            'one_time_password' => 'required',
            'checkbox'  => 'required'
        ]);

        $credentials = $request->only('password');
        $credentials['email'] = auth()->user()->email;

        if (!Auth::attempt($credentials)) {
          return  redirect()->back()
                  ->withInput($request->input())
                  ->withErrors([
                      'password' => 'Wrong password!',
                  ]);
        }

        // Enable Google2FA if Google Authenticator code matches secret
        $otp = $request->input('one_time_password');
        $valid = Google2FA::verifyGoogle2FA($request->secret, $otp);

        // If Google2FA code is valid enable Google2FA
        if($valid) {
          $user = auth()->user();
          $user->google2fa_enable = true;
          $user->setGoogle2faSecretAttribute($request->secret);
          $user->set2faUpdatedAt(\Carbon\Carbon::now());
          $user->set2faUpdatedAtUser(\Carbon\Carbon::now());
          $user->save();
          return redirect()->route('home')->with('success', 'Success, 2FA is enabled.');

        // Else redirect with invalid code error
        } else {
          return  redirect()->back()
                  ->withInput($request->input())
                  ->withErrors([
                      'one_time_password' => 'Invalid code!',
                  ]);
        }

      }


      public function disable2faPost(Request $request)
      {
        $user = Auth::user();
        $secret = $user->google2fa_secret;
        // Enable Google2FA if Google Authenticator code matches secret
        $otp = $request->input('one_time_password');
        $valid = Google2FA::verifyGoogle2FA($user->getDecryptedGoogle2faSecretAttribute(), $otp);

        // If Google2FA code is valid enable Google2FA
        if($valid) {
          $user->google2fa_enable = false;
          $user->setGoogle2faSecretAttribute(null);
          $user->save();
          return redirect('/')->with('success', 'Success, 2FA is disabled.');

        // Else redirect with invalid code error
        } else {
          return redirect()->back()->with('error', 'Invalid Code, try again.');
        }
      }

      // public function resetTimeLimit(Request $request)
      // {
      //   // if ((Carbon::now()->diffInMinutes(Auth::user()->google2fa_last_login) < config('google2fa.time_limit_2fa') && Auth::user()->google2fa_last_login != null) || !Auth::user()->checkIfGoogle2faEnabled()) {
      //   //     return $next($request);
      //   // }
      //   $user = Auth::user();
      //   $user->set2faUpdatedAt(null);

      //   $user->save();
      // }

      // public function resetTimeLimitUser(Request $request)
      // {
      //   // if ((Carbon::now()->diffInMinutes(Auth::user()->google2fa_last_login) < config('google2fa.time_limit_2fa') && Auth::user()->google2fa_last_login != null) || !Auth::user()->checkIfGoogle2faEnabled()) {
      //   //     return $next($request);
      //   // }
      //   $user = Auth::user();
      //   $user->set2faUpdatedAtUser(null);

      //   $user->save();
      // }

      // public function resetTimeLimitBuy(Request $request)
      // {
      //   // if ((Carbon::now()->diffInMinutes(Auth::user()->google2fa_last_login) < config('google2fa.time_limit_2fa') && Auth::user()->google2fa_last_login != null) || !Auth::user()->checkIfGoogle2faEnabled()) {
      //   //     return $next($request);
      //   // }
      //   $user = Auth::user();
      //   $user->set2faUpdatedAtBuy(null);

      //   $user->save();
      // }

      // public function resetTimeLimitExchange(Request $request)
      // {
      //   // if ((Carbon::now()->diffInMinutes(Auth::user()->google2fa_last_login) < config('google2fa.time_limit_2fa') && Auth::user()->google2fa_last_login != null) || !Auth::user()->checkIfGoogle2faEnabled()) {
      //   //     return $next($request);
      //   // }
      //   $user = Auth::user();
      //   $user->set2faUpdatedAtExchange(null);

      //   $user->save();
      // }
}
