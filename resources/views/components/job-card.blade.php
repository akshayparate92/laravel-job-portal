<x-card class="mb-4">
    <div class="flex justify-between bg-white">
        <h2 class="text-slate-500 font-medium"> {{ $job->title }} </h2>
        <div class="text-slate-500">
            ${{ number_format($job->salary) }}

        </div>
    </div>
    <div class="flex space-x-2 justify-between mt-3">
        <div class="flex space-x-1 text-sm">
        <div class="text-slate-600">Company Name:</div>
        <div class="border rounded-md px-1 bg-slate-200">{{ $job->location }}</div>
        </div>   
    <div class="flex space-x-2 ">
        <x-tag>{{ $job->category}}</x-tag>
        <x-tag>{{$job->experience}}</x-tag>
    </div>
</div>
   

  {{$slot}}
</x-card>