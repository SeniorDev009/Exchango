<?php

namespace App\Http\Middleware;

use Closure;
use PragmaRX\Google2FALaravel\Support\Authenticator;
use Google2FA;
use Carbon\Carbon;
use Auth;
use Session;
    
class TimeLimitBuy
{
    public function handle($request, Closure $next)
    {
        $authenticator = app(Authenticator::class)->boot($request);

        if ((Carbon::now()->diffInMinutes(Auth::user()->google_2fa_last_login_buy) < config('google2fa.time_limit_2fa') && Auth::user()->google_2fa_last_login_buy != null) || !Auth::user()->checkIfGoogle2faEnabled()) {
            return $next($request);
        }
        Session::put( 'button_check', 'buy' );
        Google2FA::logout();
        return $authenticator->makeRequestOneTimePasswordResponse();
    }
}
