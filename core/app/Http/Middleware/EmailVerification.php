<?php

namespace App\Http\Middleware;

use Closure;
use App\GeneralSettings;
use Carbon\Carbon;


class EmailVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        if(GeneralSettings::pluck('email_verification')->all()[0]){
            if(empty($user->email_verified_at)){

                $basic = GeneralSettings::first();

                if ($basic->email_verification == 1) {

                    $email_code = substr(md5(rand(0, 9) . $user->email . time()), 0, 32);
                    $text = "Hi ". $user->fname . " " . $user->lname .". Please click this link or paste the address into your browser to confirm your registration:<br> <a href=". route('email.verify') . "?verification_token=" . $email_code ." target='_blank'>". route('email.verify') . "?verification_token=" . $email_code ."</a>";

                    send_email_verification($user->email, $user->username, config('app.name') . ' Email verification', $text);

                    $user->verification_code = $email_code;
                    $user->email_time = Carbon::parse()->addMinutes(5);
                    $user->save();

                }

                $request->session()->flash('email_verify', 'A fresh verification link has been sent to your email address, open the link to complete registration!');
                auth()->logout();
                return redirect('login');
            }
        }

        return $next($request);
    }
}
