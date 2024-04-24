<?php

namespace App\Http\Controllers;

use App\Models\JobVacancy;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobApplicationController extends Controller
{
    use AuthorizesRequests;
    public function create(JobVacancy $job)
    {
        $this->authorize('apply',$job);
        return view('job_application.create',compact('job'));
    }

   
    public function store( JobVacancy $job, Request $request)
    {
        $this->authorize('apply',$job);
        $job->jobApplications()->create([
            'user_id' => auth()->user()->id,
            ...request()->validate([
                'expected_salary' => 'required|min:1|max:100000'
            ])
        ]);

        return redirect()->route('jobs.show',$job)->with('success', 'Job application submitted');
    }

    public function destroy(string $id)
    {
        //
    }
}
