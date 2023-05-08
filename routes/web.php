<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\JobsController;
// use App\Http\Livewire\JobList;
// use App\Http\Livewire\JobManagement;
use App\Http\Livewire\admin\JobManage;
use App\Http\Controllers\FileController;
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

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/locale/switch', [LocaleController::class, 'switch'])->name('locale.switch');

Route::get('jobs', [JobsController::class, 'index'])->name('jobs');
Route::get('jobs/{job}', [JobsController::class, 'show'])->name('jobs.show');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {


    Route::get('resume', function () {
        return view('resume.dashboard');
    })->name('resume');

    Route::get('/file/{userId}/{path}', [FileController::class, 'show'])->where('path', '.*')->name('file.show');

    Route::prefix('admin')->middleware(['only.admin'])->group(function () {
        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::view('jobs', 'admin.jobs.index')->name('admin.jobs');

        Route::view('job', 'admin.job.index', [
            'isNew' => true,
            'jobId' => null,
        ])->name('admin.job');

        Route::get('jobs/{id}', function ($id) {
            return view('admin.job.index', [
                'isNew' => false,
                'jobId' => $id,
            ]);
        })->where(['id' => '[0-9]+'])->name('admin.job.manage');

        Route::view('users', 'admin.users.index')->name('admin.users');
    });

});



// Route::get('/jobs', JobList::class)->name('jobs');
// Route::get('/jobs/manage', JobManagement::class)->name('jobs.manage');
