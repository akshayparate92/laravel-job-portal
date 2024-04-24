<x-card class="mb-4">
    <div class="flex justify-between bg-white">
        <h2 class="text-slate-500 font-medium"> {{ $job->title }} </h2>
        <div class="text-slate-500">
            ${{ number_format($job->salary) }}

        </div>
    </div>
    <div class="flex space-x-2 justify-between mt-3">
        <div class="flex space-x-2 text-sm">
        <div class="text-slate-600 ">{{$job->employer->company_name}}</div>
        <div class="border rounded-md px-1 bg-slate-200">{{ $job->location }}</div>
        </div>   
    <div class="flex space-x-2 ">
        <x-tag>
         <a href="{{route('jobs.index' , [ 'category' => $job->category] )}}">   {{ $job->category}} </a>
        </x-tag>
        <x-tag>
            <a href="{{route('jobs.index' , [ 'experience' => $job->experience] )}}">   {{$job->experience}} </a></x-tag>
    </div>
</div>
   

  {{$slot}}
</x-card>

