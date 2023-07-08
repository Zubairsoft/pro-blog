<?php

namespace App\Models;

use App\Models\ModelEloquent\OtpActivationEloquent;
use Domains\Supports\Traits\HasOtpActivation;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtpActivation extends Model
{
    use HasFactory,
        HasOtpActivation,
        OtpActivationEloquent,
        HasUuids;

    protected $fillable = [
        'email',
        'otp',
        'type'
    ];
}
