<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('test', function () {
    $job = Job::first();
    TranslateJob::dispatch($job);

    return 'Done';
});

Route::get('/', function () {
    $job = Job::all();

    // dd($job[0]->salary);  


    return view('home');
});
Route::view('/contact', 'contact');

Route::get('/jobs', [JobController::class, 'index']);
Route::post('/jobs', [JobController::class, 'create'])->middleware('auth');
Route::patch('/job/{job}', [JobController::class, 'update']);
Route::delete('/job/{job}', [JobController::class, 'destroy'])->name('jobs.index');
Route::get('/job/create', [JobController::class, 'show']);
Route::get('/job/{job}', function (Job $job) {

    return view('jobs.index', [
        'job' => $job,
    ]);
});
Route::get('/job/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');


// index
// Route::get('/jobs', function () {
//     $jobs = Job::with('employer')->latest()->simplePaginate(3);
//     return view('jobs.show', [
//         'jobs' => $jobs
//     ]);
// });

//Route::resource('jobs', JobController::class);


// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'login']);
Route::post('/logout', [SessionController::class, 'destroy']);