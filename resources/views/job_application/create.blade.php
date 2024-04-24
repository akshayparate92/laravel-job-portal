<x-layout>

    <x-breadcrumbs class="mb-4" 
    :links="[ 'Jobs' => route('jobs.index'), $job->title => route('jobs.show', $job) , 'Apply' => '#' ]" />
<x-card>
    <x-job-card :$job   />
    <hr>    
    <form class="my-2" action="{{route('job.application.store', $job)}}" method="POST">
        @csrf
        <div class="mb-1">
        <label for="expected_salary" class="font-medium block text-sm m-4 text-slate-600"> Expected Salary</label>     
        <input type="number" class="mb-4 px-2.5 py-1.5 ring-1 focus:ring-2 ring-slate-300 border-0 rounded-md w-full
            placeholder:text-slate-300 text-sm " name="expected_salary" placeholder="Enter Your Expected Salary">
            @error('expected_salary')
               <div class="text-sm text-red-400 "> {{$message}}</div>
            @enderror
        </div>
            <x-button class="my-4 w-full px-3 py-2 hover:text-slate-800 hover:bg-slate-500 ">Apply</x-button>
    </form>
</x-card>

</x-layout>