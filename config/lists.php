<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Qualification Types 
    |--------------------------------------------------------------------------
    |
    | This configuration value informs the qualification types dropdown.
    | go to `lang/en/resume.php` for transulations.
    |
    */
    'qualification_types' => [
        'high_school' => 'resume.qualification.types.high_school',
        'diploma' => 'resume.qualification.types.diploma',
        'bachelor' => 'resume.qualification.types.bachelor',
        'master' => 'resume.qualification.types.master',
        'phd' => 'resume.qualification.types.phd',
    ],


    /**
    |--------------------------------------------------------------------------
    | Job Categories
    |--------------------------------------------------------------------------
    |
    | This configuration value informs the job categories dropdown.
    | go to `lang/en/job.php` for transulations.
    |
    */
    'job_categories' => [
        'it' => 'job.it',
        'finance' => 'job.finance',
        'human_resources' => 'job.human_resources',
        'legal' => 'job.legal',
        'accounting' => 'job.accounting',
        'customer_service' => 'job.customer_service',
        'design' => 'job.design',
        'other' => 'job.other',
    ],

    /**
    |--------------------------------------------------------------------------
    | Job Types
    |--------------------------------------------------------------------------
    |
    | This configuration value informs the job types dropdown.
    | go to `lang/en/job.php` for transulations.
    |
    */
    'job_types' => [
        'full_time' => 'job.full_time',
        'part_time' => 'job.part_time',
        'remote' => 'job.remote',
        // 'internship' => 'job.internship',
        // 'volunteer' => 'job.volunteer',
    ],
];