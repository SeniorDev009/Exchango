<?php

namespace App\Http\Middleware;

use Closure;
use PragmaRX\Google2FALaravel\Support\Authenticator;

class Check2faEnabled
{
    public function handle($request, Closure $next)
    {
    	if( $request->user()->checkIfGoogle2faEnabled() && empty($request->user()->getDecryptedGoogle2faSecretAttribute())){
			return redirect(route('enable2fa'));
    	}

        $authenticator = app(Authenticator::class)->boot($request);
        
        if ($authenticator->isAuthenticated() || !$request->user()->checkIfGoogle2faEnabled() ) {
            return $next($request);
        }

        return $authenticator->makeRequestOneTimePasswordResponse();
    }
}
