<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()->paginate(10);

        return view('jobs.index', compact('jobs'));
    }

    public function show(Job $job)
    {
        $qualifications = json_decode($job['qualifications'], true);
        $experiencePerQualifications = json_decode($job['experience_years_per_qualification'], true);
        $specializations = json_decode($job['specializations'], true);
        $requirements = json_decode($job['extra_requirements'], true);
        return view('jobs.show', compact('job', 'qualifications', 'experiencePerQualifications', 'specializations', 'requirements'));
    }
}