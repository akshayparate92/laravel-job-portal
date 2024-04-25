<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;

class MyApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('my_applications.index', [
            'applications' => auth()->user()->jobApplications()->with([
                            'jobVacancy' => fn($query) => $query->withCount('jobApplications')
                            ->withAvg('jobApplications' , 'expected_salary') ,
                            'jobVacancy.employer'
                        ])->latest()->get()
        ]);
    }

   
    public function destroy(JobApplication $myJobApplication)
    {
        $myJobApplication->delete();

        return redirect()->back()->with('success', 'Job application removed.');
    }
}
