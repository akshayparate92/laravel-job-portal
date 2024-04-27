<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;

class EmployerController extends \Illuminate\Routing\Controller
{
    use AuthorizesRequests;
    public function __construct()
    {
        $this->authorizeResource(Employer::class);
    }
    public function create()
    {
        return view('employer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validatedData =  $request->validate([
            'company_name' => 'required|min:3|max:25|unique:employers,company_name'
        ]);

        auth()->user()->employer()->create(
            [
                'company_name' => $validatedData['company_name']
            ]
        );
         return redirect()->route('jobs.index')->with('success', 'Your Employer account created successfully!');
    }
}
