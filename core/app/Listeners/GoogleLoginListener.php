<?php

namespace App\Listeners;

use PragmaRX\Google2FALaravel\Events\LoginSucceeded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;
use Auth;
use Carbon\Carbon;
use Session;

class GoogleLoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  LoginSucceeded  $event
     * @return void
     */
    public function handle(LoginSucceeded $event)
    {
        $user = Auth::user();
        $user->set2faUpdatedAt(Carbon::now());
 
        if(Session::get( 'login_check') == 'init'){
            $user->set2faUpdatedAtUser(Carbon::now());
        }

        if(Session::get( 'button_check') == 'user'){
            $user->set2faUpdatedAtUser(Carbon::now());
        }
        if(Session::get( 'button_check') == 'buy'){
            $user->set2faUpdatedAtBuy(Carbon::now());
        }
        if(Session::get( 'button_check') == 'exchange'){
            $user->set2faUpdatedAtExchange(Carbon::now());
        }

        Session::put( 'button_check', null);

        $user->save();
    }
}
