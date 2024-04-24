<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index'), $job->title => '#']" />

    <x-job-card :$job>
        <p class="mt-5 text-sm mb-5">
            {!! nl2br(e($job->description)) !!}
        </p>
    </x-job-card>
    <x-card class="mb-4">
        <h2 class="text-stone-700 items-center text-lg font-medium">More {{ $job->employer->company_name }} Jobs</h2>
        <div class="text-sm text-slate-500">
            @foreach ($job->employer->jobs as $otherJob)
                <div class="flex mb-4 justify-between">
                    <div>
                        <div class="text-sm hover:text-slate-700">
                          <a href=" {{ route('jobs.show' , $otherJob )}}">  {{$otherJob->title}} </a>
                        </div>
                        <div class="text-xs">
                            {{$otherJob->created_at->diffForHumans()}}
                        </div>
                    </div>
                    <div class="text-xs">${{ number_format($otherJob->salary) }}</div>
                </div>
            @endforeach

        </div>
    </x-card>
</x-layout>
