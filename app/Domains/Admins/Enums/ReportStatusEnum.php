<?php

declare(strict_types=1);

namespace Domains\Admins\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

class ReportStatusEnum extends  Enum implements LocalizedEnum
{
    const NEW = 1;
    const READ = 2;
    const SOLVE = 3;
}
