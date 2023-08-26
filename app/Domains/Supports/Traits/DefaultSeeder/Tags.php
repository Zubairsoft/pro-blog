<?php

namespace Domains\Supports\Traits\DefaultSeeder;

use Domains\Supports\Enums\RoleEnum;

trait Tags
{
    private function tags(): array
    {
        return [
            [
                'name_en' => 'Sport',
                'name_ar' => 'الرياضة',
            ],
            [
                'name_en' => 'History',
                'name_ar' => 'التاريخ',
            ],
            [
                'name_en' => 'Policy',
                'name_ar' => 'السياسة',
            ],
            [
                'name_en' => 'Culture',
                'name_ar' => 'التقافة',
            ],
            [
                'name_en' => 'Social',
                'name_ar' => 'الاجتماعي',
            ],
            [
                'name_en' => 'Religion',
                'name_ar' => 'ديني',
            ],
            [
                'name_en' => 'guid',
                'name_ar' => 'توعوي',
            ]

        ];
    }
}
