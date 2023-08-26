<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
    protected $table = 'password_reset_tokens';

    protected $fillable = [
        'email',
        'token',
        'type'
    ];

    public $timestamps = false;

    protected $primaryKey="id";
}
