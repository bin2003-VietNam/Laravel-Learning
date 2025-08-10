<?php

namespace App\Http\Controllers;

use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        //dd('hello');
        $jobs = Job::with('employer')->latest()->simplePaginate(3);
        return view('jobs.show', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);

        return redirect('/jobs');
    }

    public function show()
    {
        return view('jobs.create');
    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update(Job $job)
    {
    // validation
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required'],
    ]);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);
    // redirect the job page

    return redirect()->route('jobs.index',['job'=> $job->id]);

    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect('/jobs');
    }
}
