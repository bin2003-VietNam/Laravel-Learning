<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;


Route::get('/', function () {
    $job = Job::all();

    // dd($job[0]->salary);  
    
    
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(3) ;
    return view('jobs.show', [
        'jobs' => $jobs
    ]);
});

Route::post('/jobs', function () {
    //dd(request()->all());
    // validation

    Job::create([
        'title' => request('title'),
        'salary'=> request('salary'),
        'employer_id'=> 1,
    ]);

    return redirect('/jobs'); 
});



Route::get('/job/create', function () {

    return view('jobs.create');
});

Route::get('/job/{id}', function ($id) {

    $job = Job::find($id);

    return view('jobs.index', [
        'job' => $job,
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});

