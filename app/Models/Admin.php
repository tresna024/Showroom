<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory, Authenticatable;

    protected $fillable = [
        'nama',
        'usermame',
        'password'
    ];
}
