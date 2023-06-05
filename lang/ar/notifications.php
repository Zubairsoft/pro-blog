<?php

return [
    'resend_verification_code' => [
        'title' => 'إعادة إرسال كود التفعيل',
        'body' => 'طلب إعادة إرسال كود التفعيل :name',
    ],
    'candidate_invitation' => [
        'notify' => [
            'title' => 'دعوة ترشيح',
            'body' => 'لقد تم اختيارك كمرشح لوظيفة :job_title في :company_name',
        ],
        'accept' => [
            'title' => 'قبل المرشح الدعوة',
            'body' => ':candidate_name قبل دعوة الترشيح لوظيفة :job_name',
        ],
        'reject' => [
            'title' => 'رفض المرشح الدعوة',
            'body' => ':candidate_name رفض دعوة الترشيح لوظيفة :job_name',
        ],
    ],
    'employment_form' => [
        'send' => [
            'title' => 'طلب توظيف',
            'body' => ':company_name أرسلت إليك إستمارة التوظيف لوظيفة :job_name',
        ],
        'submit' => [
            'title' => 'طلب توظيف',
            'body' => 'تم تعبئة إستمارة التوظيف من قبل :candidate_name لوظيفة :job_name',
        ]
    ],
    'interview' => [
        'send' => [
            'title' => 'مقابلة عمل',
            'body' => 'لديك مقابلة لوظيفة :job_name في تاريخ :date الساعة :time في :company_name',
        ],
    ],
    'job_offers' => [
        'send' => [
            'title' => 'عرض عمل',
            'body' => 'لديك عرض وظيفي لوظيفة :job_name'
        ],
        'accept' => [
            'title' => 'قبل المرشح عرض العمل',
            'body' => ':candidate_name قبل عرض العمل لوظيفة :job_name',
        ],
        'reject' => [
            'title' => 'رفض المرشح عرض العمل',
            'body' => ':candidate_name رفض عرض العمل لوظيفة :job_name',
        ],
    ],
    'follow' => [
        'send' => [
            'title' => 'لديك متابع جديد',
            'body' => 'لقد قام :username بمتابعتك',
        ],
    ],
    'comments' => [
        'send' => [
            'title' => 'تعليق جديد',
            'body' => 'قام :username بإضافة تعليق على منشورك',
        ]
    ],
    'likes' => [
        'title' => 'إعجاب جديد',
        'body' => 'لقد قام :username بالإعجاب بمنشورك',
    ],
    'enrollment_requests' => [
        'send' => [
            'title' => 'طلب اشتراك جديد',
            'body' => 'لقد قام :username بإرسال طلب الانضمام لفعالية :event_name'
        ],
        'accept' => [
            'title' => 'قبول طلب الإشتراك',
            'body' => ':company_name قبل طلب الإشتراك لفعالية :event_name'
        ],
        'reject' => [
            'title' => 'رفض طلب الإشتراك',
            'body' => ':company_name رفض طلب الإشتراك لفعالية :event_name'
        ]
    ]
];
