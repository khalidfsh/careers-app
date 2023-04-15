<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\JobsController;
use App\Http\Livewire\JobList;
use App\Http\Livewire\JobManagement;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/locale/switch', [LocaleController::class, 'switch'])->name('locale.switch');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('jobs', [JobsController::class, 'index'])->name('jobs');
Route::get('resume', function () {
    return view('resume.dashboard');
})->name('resume');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('jobs/{job}', [JobsController::class, 'show'])->name('job');

    Route::get('admin/jobs', function () {
        return view('admin.jobs.index');
    })->name('admin.jobs');
    Route::get('admin/users', function () {
        return view('admin.jobs');
    })->name('admin.users');


});

// Route::get('/jobs', JobList::class)->name('jobs');
// Route::get('/jobs/manage', JobManagement::class)->name('jobs.manage');
