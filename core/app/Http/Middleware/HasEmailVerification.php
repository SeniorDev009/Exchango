<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Exception;

class HasEmailVerification
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
        if ($request->isMethod('get')) {
            /**
             * No token = Goodbye.
             */
            // dd($request->all());
            if (!$request->has('verification_token')) {
                return redirect(route('login'));
            }

            $verification_token = $request->get('verification_token');

            /**
             * Lets try to find invitation by its token.
             * If failed -> return to request page with error.
             */
            try {
                $user = User::where('verification_code', $verification_token)->firstOrFail();
            } catch (Exception $e) {
                session()->flash('wrong_token', 'Wrong invitation token! Please check your URL.');
                return redirect(route('login'));
            }

            /**
             * Let's check if users already registered.
             * If yes -> redirect to login with error.
             */
            if (!is_null($user->email_verified_at)) {
                return redirect(route('login'));
            }
        }

        return $next($request);
    }
}
