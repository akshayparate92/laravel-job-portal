<x-layout>
    <x-breadcrumbs :links="['My Jobs' => route('my-jobs.index') , 'Edit Job' => '#']"  class="mb-4" />
    <x-card>
        <form action="{{route('my-jobs.update' ,$job)}}" method="POST">
            @csrf
            @method('PUT')
        <div class="grid grid-cols-2 mb-4 gap-4">
            <div>
                <x-label for="title" :required="true"> Job Title</x-label>
                <x-text-input name="title" placeholder="Enter Job Title" :value="$job->title" />
            </div>
            <div>
                <x-label for="location" :required="true"> Job Location</x-label>
                <x-text-input name="location" placeholder="Enter Job Location" :value="$job->location"/>
            </div>
            <div class="col-span-2 ">
                <x-label for="salary" :required="true" >Expected Salary</x-label>
                <x-text-input type="number" name="salary" placeholder="Enter Your Expected Salary" :value="$job->salary"/>
            </div>
            <div class="col-span-2 ">
                <x-label for="description" :required="true" >Job Description</x-label>
                <textarea name="description" id="description" cols="30" rows="10"
                class="mb-4 px-2.5 py-1.5 ring-1 focus:ring-2 ring-slate-300 border-0 rounded-md w-full
                placeholder:text-slate-300 text-sm "> {{ $job->description }}</textarea>
                @error('description')
                    <div class="text-red-400 font-medium text-sm">{{$message}}</div>
                @enderror
            </div>
            <div>           
                <x-label for="experience" :required="true"> Experience </x-label>
                <x-radio-group name="experience" :all="false" :value="old('experience')" :options="\App\Models\JobVacancy::$experience" :value="$job->experience" />
              </div>
            <div>
                <x-label for="category" :required="true"> Category </x-label>
                <x-radio-group name="category" :all="false" :value="old('category')" :options="\App\Models\JobVacancy::$category" :value="$job->category" />
      
            </div>
            <div class="col-span-2 " >
                 <x-button class=" w-full ">Update Job</x-button>
            </div>
        </div>
    </form>
    </x-card>
    </x-layout>