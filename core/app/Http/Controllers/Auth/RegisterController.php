<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;



use App\GeneralSettings;
use App\AppCountry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;


class RegisterController extends Controller
{
    use RegistersUsers;

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers {
    //     // change the name of the name of the trait's method in this class
    //     // so it does not clash with our own register method
    //        register as registration;
    //    }

    /**
     * Where to redirect users after registration.
     *
     * @var		string	$redirectTo
     */
    protected $redirectTo = 'register';

    public function redirectTo(){
        return 'register';
    }

    public function redirectPath()
    {
      if (method_exists($this, 'redirectTo')) {
       return $this->redirectTo();
      }     
      return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $data['page_title'] = "Sign Up";
        $data['countries'] = AppCountry::pluck('country_name')->all();
        return view('auth.register',$data);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $request->session()->flash('registration_successfull', 'You have successfully created an account with us!, A verification link has been sent to your email address, open the link to complete the registration!');

        // $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect('register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|numeric|min:8|unique:users',
            'username' => 'required|min:5|unique:users|regex:/^\S*$/u',
            'password' => 'required|string|min:4|confirmed',
            'countries'=> 'required',
            recaptchaFieldName() => recaptchaRuleName()
        ],
            [
                'fname.required' => 'First Name  must not be  empty!!',
                'lname.required' => 'Last Name  must not be  empty!!',
                'phone.required' => 'Contact Number is required!!',
                'email.required' => 'Email Address must not be  empty!!',
                'username.required' => 'username must not be  empty!!',
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $basic = GeneralSettings::first();

        if ($basic->email_verification == 1) {
            $email_verify = 0;
        } else {
            $email_verify = 1;
        }

        if ($basic->sms_verification == 1) {
            $phone_verify = 0;
        } else {
            $phone_verify = 1;
        }
        if(isset($data['referBy'])){
            $referUser = User::where('username',$data['referBy'])->first();
        }

        // $verification_code  = strtoupper(Str::random(6));
        // $sms_code  = strtoupper(Str::random(6));
        // $email_time = Carbon::parse()->addMinutes(5);
        // $phone_time = Carbon::parse()->addMinutes(5);

        $user = User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'username' => strtolower($data['username']),
            'refer' =>  isset($data['referBy']) ?  $referUser->id : 0,
            'email_verify' => $email_verify,
            // 'verification_code' => $verification_code,
            // 'sms_code' => $sms_code,
            // 'email_time' => $email_time,
            // 'phone_time' => $phone_time,
            'phone_verify' => $phone_verify,
            'country'  => $data['countries'],
            'password' => Hash::make($data['password']),
            // 'google2fa_secret' => $data['google2fa_secret'],
        ]);

        return $user;
    }


    protected function registered(Request $request, $user)
    {
        $basic = GeneralSettings::first();

        if ($basic->email_verification == 1) {

            $email_code = substr(md5(rand(0, 9) . $user->email . time()), 0, 32);
            $text = "Hi ". $user->fname . " " . $user->lname .". Please click this link or paste the address into your browser to confirm your registration:<br> <a href=". route('email.verify') . "?verification_token=" . $email_code ." target='_blank'>". route('email.verify') . "?verification_token=" . $email_code ."</a>";

            send_email_verification($user->email, $user->username, config('app.name') . ' Email verification', $text);

            $user->verification_code = $email_code;
            $user->email_time = Carbon::parse()->addMinutes(5);
            $user->save();
        }

        if ($basic->sms_verification == 1) {
            $sms_code = substr(md5(rand(0, 9) . $user->phone . time()), 0, 32);
            $txt = "Your phone verification code is: $sms_code";
            $to = $user->phone;
            send_sms_verification($to, $txt);

            $user->sms_code = $sms_code;
            $user->phone_time = Carbon::parse()->addMinutes(5);
            $user->save();
        }
    }

    public function verifyEmail(Request $request){

        User::where('verification_code', $request->verification_token)
            ->update([  'email_verified_at' => Carbon::now(),
                        'email_verify'      => 1,
                    ]);

        session()->flash('successfull_verification', 'Email verified successfully!');
        return redirect()->route('login');
    }

    // public function sendSms($to, $text)
    // {


    //     $temp = Etemplate::first();
    //     $appi =  $temp->smsapi;
    //     $text = urlencode($text);
    //     $appi = str_replace("{{number}}", $to, $appi);
    //     $appi = str_replace("{{message}}", $text, $appi);
    //     $result = file_get_contents($appi);
    // }



    ////////////////////////////////////////////

    // public function register(Request $request)
    // {
    //     //Validate the incoming request using the already included validator method
    //     $this->validatorComplete($request->all())->validate();

    //     // Initialise the 2FA class
    //     $google2fa = app('pragmarx.google2fa');

    //     // Save the registration data in an array
    //     $registration_data = $request->all();

    //     // Add the secret key to the registration data
    //     $registration_data["google2fa_secret"] = $google2fa->generateSecretKey();

    //     // Save the registration data to the user session for just the next request
    //     $request->session()->flash('registration_data', $registration_data);

    //     // Generate the QR image. This is the image the user will scan with their app
    //  // to set up two factor authentication
    //     $QR_Image = $google2fa->getQRCodeInline(
    //         config('app.name'),
    //         $registration_data['email'],
    //         $registration_data['google2fa_secret']
    //     );

    //     // Pass the QR barcode image to our view
    //     return view('google2fa.register', ['QR_Image' => $QR_Image, 'secret' => $registration_data['google2fa_secret']]);
    // }

    // public function completeRegistration(Request $request)
    // {        
    //     // add the session data back to the request input
    //     $request->merge(session('registration_data'));
    //     $request->session()->flash('registration_successfull', 'You have successfully created an account with us!, A fresh verification link has been sent to your email address, open the link to complete registration!');

    //     // Call the default laravel authentication
    //     return $this->registration($request);
    // }

}
