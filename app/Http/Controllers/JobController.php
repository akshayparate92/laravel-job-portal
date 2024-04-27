<?php

namespace App\Http\Controllers;

use App\Models\JobVacancy;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class JobController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', JobVacancy::class);    
        $jobs = JobVacancy::query();

        $jobs->when(request('search'),function($query){
            $query->where(function($query){
                $query->where('title','like','%'. request('search') . '%')
                ->orWhere('description','like','%'. request('search'). '%')
                ->orWhereHas('employer', function($query){
                    $query->where('company_name', 'like', '%' .request('search'). '%');
                });
            });
        })->when(request('from'), function($query){
            $query->where('salary','>=',  request('from') );
        })->when(request('to'), function($query){
            $query->where('salary','<=',  request('to') );
        })->when(request('experience'),function($query){
            $query->where('experience',request('experience'));
        })->when(request('category'),function($query){
            $query->where('category',request('category'));
        });
    

        return view('job.index' , ['jobs' => $jobs->latest()->withTrashed()->get()]);
    }

    
    public function show(JobVacancy $job)
    {
        $this->authorize('view', $job);
        return view('job.show',compact('job'));
    }

}
