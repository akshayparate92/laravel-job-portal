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
      $validatedData =  $request->validate([
            'expected_salary' => 'required|min:1|max:100000',
            'cv_file' => 'required|file|mimes:pdf|max:2048'
        ]);
        $file = $request->file('cv_file');
        $cv_path = $file->store(  'cvs_folder', 'private');
        $job->jobApplications()->create([
            'user_id' => auth()->user()->id,
            'expected_salary' => $validatedData['expected_salary'],
            'cv_path' => $cv_path
         ]);

        return redirect()->route('jobs.show',$job)->with('success', 'Job application submitted');
    }

    public function destroy(string $id)
    {
        //
    }
}
