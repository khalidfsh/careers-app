<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $jobsController = new JobsController();
        $latestJobs = $jobsController->getLatestJobs();
        return view('home', ['latestJobs' => $latestJobs]);
    }
}    
