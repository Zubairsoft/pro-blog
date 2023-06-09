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

    'accepted' => 'The :attribute must be accepted.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute must only contain letters.',
    'alpha_dash' => 'The :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute must only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'array' => 'The :attribute must have between :min and :max items.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'numeric' => 'The :attribute must be between :min and :max.',
        'string' => 'The :attribute must be between :min and :max characters.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'current_password' => 'The password is incorrect.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'declined' => 'The :attribute must be declined.',
    'declined_if' => 'The :attribute must be declined when :other is :value.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'doesnt_end_with' => 'The :attribute may not end with one of the following: :values.',
    'doesnt_start_with' => 'The :attribute may not start with one of the following: :values.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'array' => 'The :attribute must have more than :value items.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'numeric' => 'The :attribute must be greater than :value.',
        'string' => 'The :attribute must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'The :attribute must have :value items or more.',
        'file' => 'The :attribute must be greater than or equal to :value kilobytes.',
        'numeric' => 'The :attribute must be greater than or equal to :value.',
        'string' => 'The :attribute must be greater than or equal to :value characters.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'array' => 'The :attribute must have less than :value items.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'numeric' => 'The :attribute must be less than :value.',
        'string' => 'The :attribute must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'The :attribute must not have more than :value items.',
        'file' => 'The :attribute must be less than or equal to :value kilobytes.',
        'numeric' => 'The :attribute must be less than or equal to :value.',
        'string' => 'The :attribute must be less than or equal to :value characters.',
    ],
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'max' => [
        'array' => 'The :attribute must not have more than :max items.',
        'file' => 'The :attribute must not be greater than :max kilobytes.',
        'numeric' => 'The :attribute must not be greater than :max.',
        'string' => 'The :attribute must not be greater than :max characters.',
    ],
    'max_digits' => 'The :attribute must not have more than :max digits.',
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'array' => 'The :attribute must have at least :min items.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'numeric' => 'The :attribute must be at least :min.',
        'string' => 'The :attribute must be at least :min characters.',
    ],
    'min_digits' => 'The :attribute must have at least :min digits.',
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => [
        'letters' => 'The :attribute must contain at least one letter.',
        'mixed' => 'The :attribute must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'The :attribute must contain at least one number.',
        'symbols' => 'The :attribute must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'The :attribute field must be present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'array' => 'The :attribute must contain :size items.',
        'file' => 'The :attribute must be :size kilobytes.',
        'numeric' => 'The :attribute must be :size.',
        'string' => 'The :attribute must be :size characters.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid timezone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute must be a valid URL.',
    'uuid' => 'The :attribute must be a valid UUID.',
    'enum_value' => 'The :attribute is not in the list',

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
            'regex' => 'The :attribute must contain only letters',
            'min' => 'The length of the :attribute must be at least 3 characters'
        ],
        'representative_name' => [
            'regex' => 'The :attribute must contain only letters',
            'min' => 'The length of the :attribute must be at least 8 characters'
        ],
        'representative_mobile' => [
            'regex' => 'The :attribute must start with 5, followed by 8 digits only ',
        ],
        'password' => [
            'min' => 'The length of the :attribute must be at least 6 characters'
        ],
        'current_password' => [
            'min' => 'The length of the :attribute must be at least 6 characters'
        ],
        'new_password' => [
            'min' => 'The length of the :attribute must be at least 6 characters'
        ],
        'job_name' => [
            'min' => 'The length of the :attribute should be at least 3 characters',
            'max' => 'The length of the :attribute should be less than 255 characters',
        ],
        'department' => [
            'min' => 'The length of the :attribute should be at least 3 characters',
            'max' => 'The length of the :attribute should be less than 255 characters',
        ],
        'branch' => [
            'min' => 'The length of the :attribute should be at least 3 characters',
            'max' => 'The length of the :attribute should be less than 255 characters',
        ],
        'line_manager_name' => [
            'min' => 'The length of the :attribute should be at least 3 characters',
            'max' => 'The length of the :attribute should be less than 255 characters',
        ],
        'line_manager_job_title' => [
            'min' => 'The length of the :attribute should be at least 3 characters',
            'max' => 'The length of the :attribute should be less than 255 characters',
        ],
        'line_manager_email' => [
            'min' => 'The length of the :attribute should be at least 3 characters',
            'max' => 'The length of the :attribute should be less than 255 characters',
        ],
        'code' => [
            'unique' => 'The Certificate code already exists',
        ],
        'real_name' => [
            'min' => 'The length of the :attribute should be at least 8 characters',
            'max' => 'The length of the :attribute should be less than 27 characters',
        ],
        'city_id' => [
            'exists' => 'The selected city is not available',
            'integer' => 'The city must be a number',
        ],
        'reason' => [
            'min' => 'The length of the :attribute should be at least 10 characters',
            'max' => 'The length of the :attribute should not be greater than 140 characters',
        ],
        'starting_date' => [
            'after' => 'The event starting date must be a date after today',
        ],
        'ending_date' => [
            'after_or_equal' => 'The event ending date must be a date after or equal to event starting date',
        ],
        'image' => [
            'required' => 'The event image is required',
            'file' => 'The event image must be an image',
            'max' => 'The event image must not be greater than 3 Megabytes',
        ],
        'number_of_hours' => [
            'integer' => 'The number of hours must be a number',
        ],
        'enrollment_type' => [
            'in' => 'The selected enrollment type is not available'
        ],
        'is_paid' => [
            'in' => 'The selected fees is not available'
        ],
        'fees' => [
            'numeric' => 'The fees must be a number',
        ],
        'maximum_number_of_participants' => [
            'integer' => 'The maximum number of participants must be a number',
        ],
        'event_type_id' => [
            'exists' => 'The selected event type is not available',
            'integer' => 'The event type must be a number',
        ],
        'event_field_id' => [
            'exists' => 'The selected event field is not available',
            'integer' => 'The event field must be a number',
        ],
        'images' => [
            'max' => 'Can not upload more than 10 pictures'
        ],
        'images.*' => [
            'required' => 'The event image is required',
            'max' => 'The event image must not be greater than 3 Megabytes',
            'mimes' => 'The event image must be a file of type: :values.',
        ]
    ],

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
        'name' => 'Name',
        'name_ar'=>'Arabic Name',
        'name_en'=>'English Name',
        'local'=>'Language',
        'job_name' => 'Job Name',
        'representative_name' => 'Representative Name',
        'username' => 'Username',
        'email' => 'Email',
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'full_name' => 'Full Name',
        'tax_number' => 'Tax Number',
        'password' => 'Password',
        'password_confirmation' => 'Password Confirmation',
        'address' => 'Address',
        'phone' => 'Phone',
        'mobile' => 'Mobile',
        'representative_mobile' => 'Representative Mobile',
        'commercial_registration_document' => 'Commercial Registration',
        'purpose' => 'Purpose of using the Platform',
        'department' => 'Department',
        'branch' => "Branch",
        'city_id' => 'City',
        'line_manager_name' => 'Line Manager Name',
        'line_manager_job_title' => 'Line Manager Job Title',
        'line_manager_email' => 'Line Manager Email',
        'code' => 'Certificate code',
        'real_name' => 'Real name',
        'birth_date' => 'Birth date',
        'website' => 'Website',
        'picture' => 'Picture',
        'city' => 'City',
        'nationality_id' => 'Nationality',
        'educational_institution' => 'Educational institution',
        'graduation_year' => 'Graduation year',
        'english_level' => 'English language level',
        'arabic_level' => 'Arabic language level',
        'education_level_id' => 'Education level',
        'specialization_id' => 'Specialization',
        'languages_ids' => 'Other language',
        'career_objective' => 'Career Objective',
        'years_of_experience' => 'Years Of Experience',
        'accept_part_time_work' => 'Accept Part Time Work',
        'cv' => 'CV',
        'job_title' => 'Job Title',
        'is_current' => 'Are you still in the job',
        'date_started' => 'Work Start Date',
        'date_ended' => 'Work End Date',
        'company_name' => 'Employer Name',
        'sector_id' => 'Sector',
        'tasks' => 'Most Important Tasks',
        'achievements' => 'Top Achievements',
        'english_level_id' => 'English Level',
        'arabic_level_id' => 'Arabic Level',
        'candidate_id' => 'Candidate',
        'attachment' => 'Attachment',
        'reason' => 'Reason for reporting',
        'interview_title' => 'Interview Title',
        'interviewer' => 'Interviewer',
        'interviewer_position' => 'Interviewer Position',
        'interview_place' => 'Interview Place',
        'evaluation_form' => 'Evaluation Form',
        'interview_date' => 'Interview Date',
        'interview_time' => 'Interview Time',
        'current_password' => 'Current Password',
        'new_password' => 'New Password',
        'recommendation_status' => 'Recommendation',
        'hiring_reason' => 'Hiring Reason',
        'signed_form' => 'Signed Form',
        'contract_duration' => 'Contract Duration',
        'contract_status' => 'Contract Status',
        'probationary_period' => 'Probationary Period',
        'basic_salary' => 'Basic Salary',
        'monthly_housing_allowance' => 'Monthly Housing Allowance',
        'monthly_transportation_allowance' => 'Monthly Transportation Allowance',
        'other_allowances' => 'Other Allowances',
        'total_monthly_salary' => 'Total Monthly Salary',
        'annual_vacation_entitlement' => 'Annual Vacation Entitlement',
        'annual_vacation_ticket' => 'Annual Vacation Ticket',
        'medical_coverage_class' => 'Medical Coverage Class',
        'other_allowances_description' => 'Other Allowances Description',
        'commissions' => 'Commissions',
        'other_benefits' => 'Other Benefits',
        'joining_date' => 'Joining Date',
        'is_agree' => 'Is Agree',
        'expires_at' => 'Expiry Date',
        'today' => 'Today',
        'event_title' => 'Event Title',
        'event_description' => 'Event Description',
        'image' => 'Event Image',
        'link' => 'Event Link',
        'starting_date' => 'Event Starting Date',
        'ending_date' => 'Event Ending Date',
        'number_of_hours' => 'Number Of Hours',
        'fees' => 'Fees',
        'enrollment_type' => 'Enrollment Type',
        'maximum_number_of_participants' => 'Maximum number Of Participants',
        'what_do_participants_get' => 'What Do Participants Get',
        'event_type_id' => 'Event Type',
        'event_field_id' => 'Event Field',
        'images' => 'Event Images',
        'is_paid' => 'Paid ?',
        'is_limited' => 'Limited ?',
    ],
];
