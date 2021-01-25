<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'id_user',
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'id_user',
        'password'
    ];

    protected $table = 'users';

    protected $primaryKey = 'id_user';

    public $incrementing = false;

    public $timestamps = false;
}
