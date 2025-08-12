<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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

    public function edit(Job $job)
    {
        Gate::authorize('edit-job', $job);

        return view('jobs.edit', [
            'job' => $job,
        ]);
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

        return redirect()->route('jobs.index', ['job' => $job->id]);

    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect('/jobs');
    }
}
