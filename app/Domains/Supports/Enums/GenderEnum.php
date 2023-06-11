<?php

declare(strict_types=1);

namespace Domains\Supports\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class GenderEnum extends Enum implements LocalizedEnum
{
    const MALE = 1;
    const FEMALE = 2;
}
