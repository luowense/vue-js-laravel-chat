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
     * A user can have many messages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * A user belong to many psychologist
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function psychologist()
    {
        return $this->belongsToMany(Psychologist::class);
    }

    /**
     * A user belong to one chat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */
    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }
}
