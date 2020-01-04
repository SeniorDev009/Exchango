<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'google2fa_secret', 'google2fa_enable', 'email_verified_at', 'fname', 'lname', 'image', 'verification_code', 'sms_code', 'phone_verify', 'email_verify', 'email_time', 'phone_time', 'refer', 'level', 'reference', 'balance', 'status', 'address', 'zip_code', 'login_time', 'city', 'provider' , 'provider_id', 'country'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'google2fa_secret',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'updated_at', 'created_at' , 'google2fa_last_login', 'google_2fa_last_login_user', 'google_2fa_last_login_buy', 'google_2fa_last_login_exchange', 'email_verified_at',
    ];
     /**
     *
     * @param  string  $value
     * Ecrypt the user's google_2fa secret.
     * @return string
     */
    public function setGoogle2faSecretAttribute($value)
    {
        if(!$value){
            $this->attributes['google2fa_secret'] = null;
        }else{
            $this->attributes['google2fa_secret'] = encrypt($value);
        }
    }

    public function getDecryptedGoogle2faSecretAttribute()
    {
        $secret = $this->attributes['google2fa_secret'];
        return ($secret == null) ? null : decrypt($this->attributes['google2fa_secret']);
    }


    /**
     * Decrypt the user's google_2fa secret.
     *
     * @param  string  $value
     * @return string
     */
    public function getGoogle2faSecretAttribute($value)
    {
        return ($value == null) ? null : decrypt($value);
    }

    /**
     * Checks if 2fa is enabled
     *
     * @param  string  $value
     * @return string
     */
    public function checkIfGoogle2faEnabled()
    {
        return (bool) $this->attributes['google2fa_enable'];
    }

     /**
     * Update updated_at
     *
     * @param  string  $value
     * @return string
     */
    public function set2faUpdatedAt($value)
    {
         $this->attributes['google2fa_last_login'] = $value;
    }

    public function set2faUpdatedAtUser($value)
    {
         $this->attributes['google_2fa_last_login_user'] = $value;
    }

    public function set2faUpdatedAtBuy($value)
    {
         $this->attributes['google_2fa_last_login_buy'] = $value;
    }

    public function set2faUpdatedAtExchange($value)
    {
         $this->attributes['google_2fa_last_login_exchange'] = $value;
    }

    //  /**
    //  * Set return_url
    //  *
    //  * @param  string  $value
    //  * @return 
    //  */
    // public function setReturnUrl($value)
    // {
    //      $this->attributes['return_url'] = $value;
    // }
}
