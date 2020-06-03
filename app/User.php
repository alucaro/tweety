<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'username', 'avatar', 'name', 'email', 'password',
         //si estamos seguros de todo usamos protected $guarded = []; no se preocupa por validar
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
        $temp_route = asset($value ?: 'http://127.0.0.1:8000/images/default-avatar.jpeg');
        $fine_url = str_replace("avatars", "storage/avatars", $temp_route);
        //This solution don´t work, i need to change it
        //return asset($value);
        return ($fine_url);
    }

    // $user->password = 'foobar';
    public function setPasswordAttribute($value)
    {
        //Como estaba en la tutorial no me funciono, asi que quite el bcrypt
        //$this->attributes['password'] = bcrypt($value);
        $this->attributes['password'] = $value;
    }

    public function timeline()
    {
        $friends = $this->follows()->pluck('id');

        return Tweet::whereIn('user_id', $friends)
                        ->orWhere('user_id', $this->id)
                        ->latest()
                        ->paginate(10);

    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function path($append = '')
    {
        $path = route('profile', $this->username);
        return $append ? " {$path}/{$append}" : $path;
    }
    
}
