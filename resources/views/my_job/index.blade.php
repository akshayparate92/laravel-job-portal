<x-layout>
    <x-breadcrumbs :links="['My Jobs' => '#']"  class="mb-4"/>
        <div class="mb-8 text-right">
        <x-link-button href="{{route('my-jobs.create')}}">
            Add Job
        </x-link-button>
    </div>
    @forelse ($jobs as $job )
        <x-job-card :$job>
            <div class="text-xs text-slate-300">
                @forelse ($job->jobApplications as $application)
                    <div class="flex justify-between mb-4 items-center">
                        <div>
                            <div> {{$application->user->name}} </div>
                            <div>Applied {{$application->created_at->diffForHumans()}}</div>
                            <div>Download Cv</div>
                        </div>
                        <div>${{ number_format($application->expected_salary) }}</div>
                    </div>
                @empty
                    <div>No  Application Yet</div>
                @endforelse
                <div class="flex space-x-2">
                    <x-link-button href="{{ route('my-jobs.edit', $job)}}">Edit</x-link-button>
                    <div>
                        <form action="{{route('my-jobs.destroy', $job)}}" method="POST">
                            @csrf
                            @method("DELETE")
                           <x-button >Delete</x-button> 
                        </form>
                    </div>
                </div>
            </div>
        </x-job-card>
    @empty
        <div class="border rounded-md border-dashed border-slate-600 text-center p-8">
           <div class="text-center font-medium"> No Jobs Added Yet</div>
           <div class="text-center font-medium">
                Post your First Job 
                <a class="text-indigo-500 text-sm hover:underline " href="{{route('my-jobs.create')}}"> Create Job</a>
           </div>
        </div>
    @endforelse
   
</x-layout>