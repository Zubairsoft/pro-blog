<?php declare(strict_types=1);

namespace Domains\Supports\Enums;

use BenSampo\Enum\Enum;

final class RoleEnum extends Enum
{
    const SUPER_ADMIN = "super admin";
    const AUTHOR ='author' ;
    const USER = 'user';
    const ADMIN = 'admin';
}
