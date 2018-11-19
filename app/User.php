<?php

namespace App;

use App\Notifications\SimpleNotif;
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
    protected $fillable = [
        'name', 'email', 'password', 'one_signal_player_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function simpleNotif(){
        $this->notify(new SimpleNotif());
    }

    /**
     * In order to let your Notification know which OneSignal user(s) you are targeting,
     * add the routeNotificationForOneSignal method to your Notifiable model.
     * You can either return a single player-id,
     * or if you want to notify multiple player IDs just return an array containing all IDs.
     * @return string
     */
    public function routeNotificationForOneSignal()
    {
        return $this->one_signal_player_id;
    }

}
