<?php

declare(strict_types=1);

namespace Domains\Supports\Enums;

use BenSampo\Enum\Enum;

final class UserEnum extends Enum
{
    const ADMIN = 1;
    const AUTHOR = 2;
    const USER = 3;
}
