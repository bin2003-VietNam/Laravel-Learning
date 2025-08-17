<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::latest()->get()->groupBy('featured');

        return view('jobs/index', [
            'jobs' => $jobs[0],
            'featuredJobs'=> $jobs[1],
            'tags' => Tag::all(),
        ]);

    }
    public function create()
    {
        return view('jobs/create');
    }
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title'     => 'required',
            'salary'    => 'required',
            'location'  => 'required',
            'schedule'  => ['required', Rule::in('part-time', 'full-time')],
            'url'       => ['required', 'active_url'],
            'featured'  => ['nullable'],
        ]);

        $attributes['featured'] = $request->has('featured');

        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, ['tags']));

        if($attributes['tags'] ?? false) {
            foreach ((explode(',', $attributes['tags'])) as $tag) {
                $job->tag($tag);
            }
        }

        return redirect('/');

    }
}
