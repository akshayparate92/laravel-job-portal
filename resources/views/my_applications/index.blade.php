<x-layout>
    <x-breadcrumbs class="mb-4" :links="[ 'My Job Application' => '#' ]" />
       
        @forelse ($applications as $application)
        <x-job-card :job="$application->jobVacancy">
            <div class="flex items-center justify-between text-xs text-slate-500">
              <div>
                <div>
                  Applied {{ $application->created_at->diffForHumans() }}
                </div>
                <div>
                  Other {{ Str::plural('applicant', $application->jobVacancy->job_applications_count - 1) }}
                  {{ $application->jobVacancy->job_applications_count - 1 }}
                </div>
                <div>
                  Your asking salary ${{ number_format($application->expected_salary) }}
                </div>
                <div>
                  Average asking salary
                  ${{ number_format($application->jobVacancy->job_applications_avg_expected_salary) }}
                </div>
              </div>
              <div>
                <form action="{{route('my-job-applications.destroy', $application)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-button>Cancel Application</x-button>
                </form>
              </div>
            </div>
        </x-job-card>
        @empty   
        <div class="items-center text-slate-400 rounded-md border border-dashed border-slate-600 font-medium p-10">
            <div class="text-center font-medium"> No job Has been Applied Yet</div>
            <div class="text-center font-medium">To apply Job Click <a href="{{route('jobs.index')}}" class="text-indigo-500 hover:underline">here</a></div>

    </div>
        @endforelse
    
</x-layout>