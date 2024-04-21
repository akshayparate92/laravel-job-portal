<x-layout>
    <x-breadcrumbs class="mb-4" 
    :links="['Jobs' =>  route('jobs.index'), $job->title =>'#' ]" />
   
    <x-job-card :$job > 
    <p class="mt-5 text-sm mb-5">
        {!! nl2br(e($job->description)) !!}
    </p> 
    </x-job-card>  
</x-layout>
