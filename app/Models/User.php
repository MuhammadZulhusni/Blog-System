<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // protected $fillable = [
    //     'name',
    //     'email',
    //     'username',
    //     'password',
    // ];
    // OR
    protected $guarded = ['id']; // Mean id x boleh di isi oleh user, selain dari id user boleh isi

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class); 
    }
}

