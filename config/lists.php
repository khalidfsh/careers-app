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

    'languages' => [
        'arabic' => 'language.arabic',
        'english' => 'language.english',
        'chinese' => 'language.chinese',
        'french' => 'language.french',
        'spanish' => 'language.spanish',
        'german' => 'language.german',
        'italian' => 'language.italian',
        'portuguese' => 'language.portuguese',
        'russian' => 'language.russian',
        'turkish' => 'language.turkish',
        'japanese' => 'language.japanese',
        'korean' => 'language.korean',
        'hindi' => 'language.hindi',
        'bengali' => 'language.bengali',
        'punjabi' => 'language.punjabi',
        'urdu' => 'language.urdu',
    ],

    'language_levels' => [
        1 => 'language.level.basic',
        2 => 'language.level.conversational',
        3 => 'language.level.intermediate',
        4 => 'language.level.advanced',
        5 => 'language.level.fluent',
        6 => 'language.level.native',
    ],
];