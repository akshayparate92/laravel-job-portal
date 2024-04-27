<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\JobVacancy;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use AuthorizesRequests;
    public function index()
    {   
        $this->authorize('viewAnyEmployer', JobVacancy::class);
        $jobs = auth()->user()->employer->jobs()->with(['employer','jobApplications','jobApplications.user'])->withTrashed()->get();
        return view('my_job.index' , compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $this->authorize('create', JobVacancy::class);
        return view('my_job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {
       $this->authorize('create', JobVacancy::class);
        auth()->user()->employer->jobs()->create($request->validated());
        return redirect()->route('my-jobs.index')
        ->with('success', 'Job created successfully.');
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobVacancy $myJob)
    {
        $this->authorize('update',$myJob);   
        return view('my_job.edit', ['job' => $myJob]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobRequest $request, JobVacancy $myJob)
    {
        $this->authorize('update',$myJob); 
        $myJob->update($request->validated());
        return redirect()->route('my-jobs.index')
        ->with('success', 'Job updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobVacancy $myJob)
    {
        
        $this->authorize('delete',$myJob);
        $myJob->delete();
        return redirect()->route('my-jobs.index')
        ->with('success', 'Job deleted.');
    }
}
