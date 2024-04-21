<x-layout>
    <x-breadcrumbs :links="[ 'Jobs' => route('jobs.index') ]"/>
        @forelse ($jobs as $job)
        <x-job-card :$job>
            <x-link-button :href="route('jobs.show',$job)">
                Show
               </x-link-button>
        </x-job-card>
    @empty
        <div>No Jobs Vacancy Available</div>
    @endforelse
</x-layout>
