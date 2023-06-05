<?php

return [
    'resend_verification_code' => [
        'title' => 'Resend the activation code',
        'body' => ':name needs to resend the activation code',
    ],
    'candidate_invitation' => [
        'notify' => [
            'title' => 'Candidate invitation',
            'body' => 'You have been selected as a candidate for :job_title at :company_name',
        ],
        'accept' => [
            'title' => 'The candidate accepted the invitation',
            'body' => ':candidate_name accepted the candidate invitation for this job :job_name',
        ],
        'reject' => [
            'title' => 'The candidate rejected the invitation',
            'body' => ':candidate_name rejected the candidate invitation for this job :job_name',
        ],
    ],
    'employment_form' => [
        'send' => [
            'title' => 'Employment Form',
            'body' => ':company_name send you this employment form for this job :job_name',
        ],
        'submit' => [
            'title' => 'Employment Form',
            'body' => 'Employment form has been filled by :candidate_name for this job :job_name',
        ]
    ],
    'interview' => [
        'send' => [
            'title' => 'Interview',
            'body' => 'You have an interview for :job_name job on :date at :time at :company_name',
        ],
    ],
    'job_offers' => [
        'send' => [
            'title' => 'Job Offer',
            'body' => 'You have a job offer for this job :job_name',
        ],
        'accept' => [
            'title' => 'The candidate accepted the job offer',
            'body' => ':candidate_name accepted the job offer for this job :job_name',
        ],
        'reject' => [
            'title' => 'The candidate rejected the job offer',
            'body' => ':candidate_name rejected the job offer for this job :job_name',
        ],
    ],
    'follow' => [
        'send' => [
            'title' => 'You have a new follower',
            'body' => ':username followed you',
        ],
    ],
    'comments' => [
        'send' => [
            'title' => 'New comment',
            'body' => ':username added a comment on your post'
        ]
    ],
    'likes' => [
        'title' => 'New like',
        'body' => ':username liked your post',
    ],
    'enrollment_requests' => [
        'send' => [
            'title' => 'New enrollment request',
            'body' => 'the job seeker :username send an enrollment request for this event :event_name'
        ],
        'accept' => [
            'title' => 'Accepted the enrollment request',
            'body' => ':company_name accepted the enrollment request for the event :event_name'
        ],
        'reject' => [
            'title' => 'Rejected the enrollment request',
            'body' => ':company_name rejected the enrollment request for the event :event_name'
        ]
    ]
];
