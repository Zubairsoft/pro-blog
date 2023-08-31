<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'يجب قبول :attribute.',
    'active_url' => ':attribute لا يُمثّل رابطا صحيحا.',
    'after' => 'يجب على :attribute أن يكون تاريخًا لاحقًا للتاريخ :date.',
    'after_or_equal' => ':attribute يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date.',
    'alpha' => 'يجب أن لا يحتوي :attribute سوى على حروف.',
    'alpha_dash' => 'يجب أن لا يحتوي :attribute سوى على حروف، أرقام ومطّات.',
    'alpha_num' => 'يجب أن يحتوي :attribute على حروفٍ وأرقامٍ فقط.',
    'array' => 'يجب أن يكون :attribute ًمصفوفة.',
    'before' => 'يجب على :attribute أن يكون تاريخًا سابقًا للتاريخ :date.',
    'before_or_equal' => ':attribute يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date.',
    'between' => [
        'numeric' => 'يجب أن تكون قيمة :attribute بين :min و :max.',
        'file' => 'يجب أن يكون حجم الملف :attribute بين :min و :max كيلوبايت.',
        'string' => 'يجب أن يكون عدد حروف النّص :attribute بين :min و :max.',
        'array' => 'يجب أن يحتوي :attribute على عدد من العناصر بين :min و :max.',
    ],
    'boolean' => 'يجب أن تكون قيمة :attribute إما true أو false .',
    'confirmed' => 'حقل التأكيد غير مُطابق للحقل :attribute.',
    'date' => ':attribute ليس تاريخًا صحيحًا.',
    'date_equals' => 'يجب أن يكون :attribute مطابقاً للتاريخ :date.',
    'date_format' => 'لا يتوافق :attribute مع الشكل :format.',
    'different' => 'يجب أن يكون الحقلان :attribute و :other مُختلفين.',
    'digits' => 'يجب أن يحتوي :attribute على :digits رقمًا/أرقام.',
    'digits_between' => 'يجب أن يحتوي :attribute بين :min و :max رقمًا/أرقام .',
    'dimensions' => 'الـ :attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct' => 'للحقل :attribute قيمة مُكرّرة.',
    'email' => 'يجب أن يكون :attribute عنوان بريد إلكتروني صحيح البُنية.',
    'exists' => 'القيمة المحددة :attribute غير موجودة.',
    'file' => 'الـ :attribute يجب أن يكون ملفا.',
    'filled' => ':attribute إجباري.',
    'gt' => [
        'numeric' => 'يجب أن تكون قيمة :attribute أكبر من :value.',
        'file' => 'يجب أن يكون حجم الملف :attribute أكبر من :value كيلوبايت.',
        'string' => 'يجب أن يكون طول النّص :attribute أكثر من :value حروفٍ/حرفًا.',
        'array' => 'يجب أن يحتوي :attribute على أكثر من :value عناصر/عنصر.',
    ],
    'gte' => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أكبر من :value.',
        'file' => 'يجب أن يكون حجم الملف :attribute على الأقل :value كيلوبايت.',
        'string' => 'يجب أن يكون طول النص :attribute على الأقل :value حروفٍ/حرفًا.',
        'array' => 'يجب أن يحتوي :attribute على الأقل على :value عُنصرًا/عناصر.',
    ],
    'image' => 'يجب أن يكون :attribute صورةً.',
    'in' => ':attribute غير موجود.',
    'in_array' => ':attribute غير موجود في :other.',
    'integer' => 'يجب أن يكون :attribute عددًا صحيحًا.',
    'ip' => 'يجب أن يكون :attribute عنوان IP صحيحًا.',
    'ipv4' => 'يجب أن يكون :attribute عنوان IPv4 صحيحًا.',
    'ipv6' => 'يجب أن يكون :attribute عنوان IPv6 صحيحًا.',
    'json' => 'يجب أن يكون :attribute نصآ من نوع JSON.',
    'lt' => [
        'numeric' => 'يجب أن تكون قيمة :attribute أصغر من :value.',
        'file' => 'يجب أن يكون حجم الملف :attribute أصغر من :value كيلوبايت.',
        'string' => 'يجب أن يكون طول النّص :attribute أقل من :value حروفٍ/حرفًا.',
        'array' => 'يجب أن يحتوي :attribute على أقل من :value عناصر/عنصر.',
    ],
    'lte' => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أصغر من :value.',
        'file' => 'يجب أن لا يتجاوز حجم الملف :attribute :value كيلوبايت.',
        'string' => 'يجب أن لا يتجاوز طول النّص :attribute :value حروفٍ/حرفًا.',
        'array' => 'يجب أن لا يحتوي :attribute على أكثر من :value عناصر/عنصر.',
    ],
    'max' => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أصغر من :max.',
        'file' => 'يجب أن لا يتجاوز حجم :attribute :max كيلوبايت.',
        'string' => 'يجب أن لا يتجاوز طول النّص :attribute :max حرفاً.',
        'array' => 'يجب أن لا يحتوي :attribute على أكثر من :max عناصر/عنصر.',
    ],
    'mimes' => 'يجب أن يكون ملفًا من نوع : :values.',
    'mimetypes' => 'يجب أن يكون ملفًا من نوع : :values.',
    'min' => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية أو أكبر من :min.',
        'file' => 'يجب أن يكون حجم الملف :attribute على الأقل :min كيلوبايت.',
        'string' => 'يجب أن يكون طول النص :attribute على الأقل :min حروفٍ/حرفًا.',
        'array' => 'يجب أن يحتوي :attribute على الأقل على :min عُنصرًا/عناصر.',
    ],
    'not_in' => ':attribute موجود.',
    'not_regex' => 'صيغة :attribute غير صحيحة.',
    'numeric' => 'يجب على :attribute أن يكون رقمًا.',
    'present' => 'يجب تقديم :attribute.',
    'regex' => 'صيغة :attribute غير صحيحة.',
    'required' => ':attribute مطلوب.',
    'required_if' => ':attribute مطلوب في حال ما إذا كان :other يساوي :value.',
    'required_unless' => ':attribute مطلوب في حال ما لم يكن :other يساوي :values.',
    'required_with' => ':attribute مطلوب إذا توفّر :values.',
    'required_with_all' => ':attribute مطلوب إذا توفّر :values.',
    'required_without' => ':attribute مطلوب إذا لم يتوفّر :values.',
    'required_without_all' => ':attribute مطلوب إذا لم يتوفّر :values.',
    'same' => 'يجب أن يتطابق :attribute مع :other.',
    'size' => [
        'numeric' => 'يجب أن تكون قيمة :attribute مساوية لـ :size.',
        'file' => 'يجب أن يكون حجم الملف :attribute :size كيلوبايت.',
        'string' => 'يجب أن يحتوي النص :attribute على :size حروفٍ/حرفًا بالضبط.',
        'array' => 'يجب أن يحتوي :attribute على :size عنصرٍ/عناصر بالضبط.',
    ],
    'starts_with' => 'يجب أن يبدأ :attribute بأحد القيم التالية: :values',
    'string' => 'يجب أن يكون :attribute نصًا.',
    'timezone' => 'يجب أن يكون :attribute نطاقًا زمنيًا صحيحًا.',
    'unique' => 'قيمة :attribute مُستخدمة من قبل.',
    'uploaded' => 'فشل في تحميل الـ :attribute.',
    'url' => 'صيغة الرابط :attribute غير صحيحة.',
    'uuid' => ':attribute يجب أن يكون بصيغة UUID سليمة.',
    'enum_value' => ':attribute ليست في القائمة',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => 'الاسم',
        'name_ar' => 'الاسم بالعربي',
        'name_en'=>'الاسم بالانجليزي',
        'local' => 'اللغة',
        'job_name' => 'اسم الوظيفة',
        'representative_name' => 'اسم الممثل',
        'username' => 'اسم المُستخدم',
        'email' => 'البريد الالكتروني',
        'first_name' => 'الاسم الأول',
        'last_name' => 'اسم العائلة',
        'password' => 'كلمة السر',
        'password_confirmation' => 'تأكيد كلمة السر',
        'city' => 'المدينة',
        'country' => 'الدولة',
        'address' => 'عنوان السكن',
        'phone' => 'الهاتف',
        'mobile' => 'الجوال',
        'representative_mobile' => 'جوال الممثل',
        'age' => 'العمر',
        'gender' => 'الجنس',
        'day' => 'اليوم',
        'month' => 'الشهر',
        'year' => 'السنة',
        'hour' => 'ساعة',
        'minute' => 'دقيقة',
        'second' => 'ثانية',
        'title' => 'العنوان',
        'content' => 'المُحتوى',
        'description' => 'الوصف',
        'excerpt' => 'المُلخص',
        'date' => 'التاريخ',
        'time' => 'الوقت',
        'available' => 'مُتاح',
        'size' => 'الحجم',
        'commercial_registration_document' => 'السجل التجاري',
        'avatar' => 'الصورة الشخصية',
        'purpose' => 'الغرض من استخدام المنصة',
        'department' => 'القسم',
        'branch' => 'الفرع',
        'city_id' => 'المدينة',
        'line_manager_name' => 'اسم المدير المباشر',
        'line_manager_job_title' => 'المسمى الوطيفي للمدير المباشر',
        'line_manager_email' => 'البريد الاكتروني للمدير المباشر',
        'code' => 'رمز الشهادة',
        'real_name' => 'الاسم الحقيقي',
        'birth_date' => 'تاريخ الميلاد',
        'website' => 'الموقع الكتروني',
        'picture' => 'الصورة',
        'nationality_id' => 'الجنسية',
        'educational_institution' => 'المؤسسة التعليمية',
        'graduation_year' => 'سنة التخرج',
        'english_level' => 'مستوى اللغة الإنجليزية',
        'arabic_level' => 'مستوى اللغة العربية',
        'education_level_id' => 'أعلى مؤهل علمي',
        'specialization_id' => 'التخصص',
        'languages_ids' => 'رمز اللغات الأخرى',
        'career_objective' => 'الهدف الوظيفي',
        'years_of_experience' => 'عدد سنوات الخبرة',
        'accept_part_time_work' => 'يقبل العمل بدوام جزئي',
        'cv' => 'السيرة الذاتية',
        'job_title' => 'المسمّى الوظيفي',
        'is_current' => 'هل مازلت بالوظيفة',
        'date_started' => 'تاريخ بدء العمل',
        'date_ended' => 'تاريخ انتهاء العمل',
        'company_name' => 'اسم الجهة',
        'sector_id' => 'القطاع / النشاط',
        'tasks' => 'أهم المهام',
        'achievements' => 'أهم الإنجازات',
        'english_level_id' => 'مستوى اللغة الإنجليزية',
        'arabic_level_id' => 'مستوى اللغة العربية',
        'candidate_id' => 'المرشح',
        'attachment' => 'الملف المرفق',
        'reason' => 'سبب الإبلاغ',
        'interview_title' => 'عنوان المقابلة',
        'interviewer' => 'المقابل',
        'interviewer_position' => 'منصب المقابل',
        'interview_place' => 'مكان المقابلة',
        'evaluation_form' => 'ملف التقييم',
        'interview_date' => 'تاريخ المقابلة',
        'interview_time' => 'وقت المقابلة',
        'current_password' => 'كلمة السر الحالية',
        'new_password' => 'كلمة السر الجديدة',
        'recommendation_status' => 'التوصية',
        'hiring_reason' => 'سبب التعيين',
        'signed_form' => 'مستند قرار التعيين الموقع',
        'contract_duration' => 'مدة العقد',
        'contract_status' => 'حالة العقد',
        'probationary_period' => 'الفترة التجريبية',
        'basic_salary' => 'الراتب الأساسي',
        'monthly_housing_allowance' => 'بدل السكن الشهري',
        'monthly_transportation_allowance' => 'بدل المواصلات الشهري',
        'other_allowances' => 'بدلات أخرى',
        'total_monthly_salary' => 'الراتب الشهري الإجمالي',
        'annual_vacation_entitlement' => 'الإجازة السنوية',
        'annual_vacation_ticket' => 'تذاكر سفر الإجازة',
        'medical_coverage_class' => 'مستوى التأمين الطبي',
        'other_allowances_description' => 'وصف البدلات الأخرى',
        'commissions' => 'العمولات',
        'other_benefits' => 'امتيازات أخرى',
        'joining_date' => 'تاريخ مباشرة العمل',
        'is_agree' => 'الموافقة على تعيين الموظف',
        'expires_at' => 'تاريخ الانتهاء',
        'today' => 'اليوم',
        'event_title' => 'اسم الفعالية',
        'event_description' => 'وصف الفعالية',
        'image' => 'صورة اعلان الفعالية',
        'link' => 'رابط الفعالية',
        'starting_date' => 'تاريخ بدء الفعالية',
        'ending_date' => 'تاريخ انتهاء الفعالية',
        'number_of_hours' => 'عدد الساعات',
        'fees' => 'رسوم المشاركة',
        'enrollment_type' => 'نوع التسجيل',
        'maximum_number_of_participants' => 'العدد الأقصى للمشاركين',
        'what_do_participants_get' => 'على ماذا يحصل المشاركون',
        'event_type_id' => 'نوع الفعالية',
        'event_field_id' => 'المجال',
        'images' => 'صور الفعالية',
        'is_paid' => 'مدفوعة ؟',
        'is_limited' => 'محدودة ؟',
        'comment'=>'تعليق'
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'name' => [
            'regex' => 'يجب أن يحتوي :attribute على حروف فقط.',
            'min' => 'يجب أن يكون طول :attribute على الأقل 3 أحرف.'
        ],
        'representative_name' => [
            'regex' => 'يجب أن يحتوي :attribute على حروف فقط.',
            'min' => 'يجب أن يكون طول :attribute على الأقل 8 أحرف.'
        ],
        'representative_mobile' => [
            'regex' => ':attribute يجب ان يبدا ب 5 ثم يتبع ب 8 ارقام فقط'
        ],
        'password' => [
            'min' => 'يجب أن يكون طول :attribute على الأقل 6 أحرف.'
        ],
        'current_password' => [
            'min' => 'يجب أن يكون طول :attribute على الأقل 6 أحرف.'
        ],
        'new_password' => [
            'min' => 'يجب أن يكون طول :attribute على الأقل 6 أحرف.'
        ],
        'username' => [
            'min' => 'يجب أن يكون طول :attribute على الأقل 3 أحرف.',
            'max' => 'يجب أن لا يتجاوز طول :attribute 20 حرفاً.'
        ],
        'avatar' => [
            'max' => 'يجب أن لا يتجاوز حجم :attribute :max كيلوبايت.'
        ],
        'job_name' => [
            'min' => 'يجب أن يكون طول :attribute على الأقل 3 أحرف.',
            'max' => 'يجب أن لا يتجاوز طول :attribute 20 حرفاً.'
        ],
        'department' => [
            'min' => 'يجب أن يكون طول :attribute على الأقل 3 أحرف.',
            'max' => 'يجب أن لا يتجاوز طول :attribute 255 حرفاً.'
        ],
        'branch' => [
            'min' => 'يجب أن يكون طول :attribute على الأقل 3 أحرف.',
            'max' => 'يجب أن لا يتجاوز طول :attribute 255 حرفاً.'
        ],
        'line_manager_name' => [
            'min' => 'يجب أن يكون طول :attribute على الأقل 3 أحرف.',
            'max' => 'يجب أن لا يتجاوز طول :attribute 255 حرفاً.'
        ],
        'line_manager_job_title' => [
            'min' => 'يجب أن يكون طول :attribute على الأقل 3 أحرف.',
            'max' => 'يجب أن لا يتجاوز طول :attribute 255 حرفاً.'
        ],
        'line_manager_email' => [
            'max' => 'يجب أن لا يتجاوز طول :attribute 255 حرفاً.'
        ],
        'code' => [
            'unique' => 'رمز الشهادة موجود مسبقًا',
        ],
        'real_name' => [
            'min' => 'يجب أن يكون طول :attribute على الأقل 8 أحرف.',
            'max' => 'يجب أن لا يتجاوز طول :attribute 27 حرفاً.'
        ],
        'city_id' => [
            'exists' => 'القيمة المختارة للمدينة غير موجودة',
            'integer' => 'يجب أن تكون المدينه رقمًا',
        ],
        'reason' => [
            'min' => 'يجب أن يكون طول :attribute على الأقل 10 أحرف.',
            'max' => 'يجب أن لا يتجاوز طول :attribute 140 حرفاً.'
        ],
        'link' => [
            'active_url' => ':attribute لا يُمثّل رابطاً صحيحاً'
        ],
        'starting_date' => [
            'after' => 'يجب على تاريخ بدء الفعالية أن يكون تاريخًا لاحقًا لتاريخ اليوم',
        ],
        'ending_date' => [
            'after_or_equal' => 'يجب أن يكون تاريخ انتهاء الفعالية تاريخاً لاحقاً أو مطابقاً لتاريخ بدء الفعالية',
        ],
        'image' => [
            'required' => 'صورة الفعالية مطلوبة',
            'file' => 'صورة الفعالية يجب أن تكون صورة',
            'max' => 'يجب أن لا يتجاوز حجم الصورة 3 ميجا بايت'
        ],
        'number_of_hours' => [
            'integer' => 'يجب أن يكون عدد الساعات رقمًا',
        ],
        'enrollment_type' => [
            'in' => 'القيمة المختارة لنوع التسجيل غير موجودة'
        ],
        'is_paid' => [
            'in' => 'القيمة المختارة للرسوم غير موجودة'
        ],
        'fees' => [
            'numeric' => 'يجب أن يكون رسوم المشاركة رقمًا',
        ],
        'maximum_number_of_participants' => [
            'integer' => 'يجب أن يكون العدد الأقصى للمشاركين رقمًا',
        ],
        'event_type_id' => [
            'exists' => 'القيمة المختارة لنوع الفعالية غير موجودة',
            'integer' => 'يجب أن تكون نوع الفعالية رقمًا',
        ],
        'event_field_id' => [
            'exists' => 'القيمة المختارة للمجال غير موجودة',
            'integer' => 'يجب أن يكون المجال رقمًا',
        ],
        'images' => [
            'max' => 'لا يمكن رفع أكثر من 10 صور'
        ],
        'images.*' => [
            'required' => 'صورة الفعالية مطلوبة',
            'max' => 'يجب أن لا يتجاوز حجم الصورة 3 ميجا بايت',
            'mimes' => 'يجب أن تكون صورة الفعالية ملفًا من نوع :values.'
        ],
    ]
];
