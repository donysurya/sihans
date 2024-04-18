<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pidum extends Model implements Authenticatable
{
    use Notifiable, AuthenticableTrait;

    protected $guard = 'pidum';
    protected $table = 'pidum';

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address', 'picture', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
