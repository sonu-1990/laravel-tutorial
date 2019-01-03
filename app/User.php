<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password',
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
     * User has many questions.
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Get url of the user
     * @return Route of user
     */
    public function getUrlAttribute()
    {
        //return route('user.show', $this->id);
        return '#';
    }

}
