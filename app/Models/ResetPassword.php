<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ResetPassword extends Model
{
    use HasUuids;
    protected $table = 'password_reset_tokens';

    protected $fillable = [
        'email',
        'token',
        'type'
    ];

    public $timestamps = false;

    protected $primaryKey="id";
}
