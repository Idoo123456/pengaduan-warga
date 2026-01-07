<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama',
        'nik',
        'email',
        'password',
        'photo', // 🔥 HARUS photo
    ];

    protected $hidden = [
        'password',
    ];
}
