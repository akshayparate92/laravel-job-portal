<x-layout>
<x-breadcrumbs :links="['My Jobs' => route('my-jobs.index') , 'Create Job' => '#']"  class="mb-4" />
<x-card>
    <form action="{{route('my-jobs.store')}}" method="POST">
        @csrf
    <div class="grid grid-cols-2 mb-4 gap-4">
        <div>
            <x-label for="title" :required="true"> Job Title</x-label>
            <x-text-input name="title" placeholder="Enter Job Title" />
        </div>
        <div>
            <x-label for="location" :required="true"> Job Location</x-label>
            <x-text-input name="location" placeholder="Enter Job Location" />
        </div>
        <div class="col-span-2 ">
            <x-label for="salary" :required="true" >Expected Salary</x-label>
            <x-text-input type="number" name="salary" placeholder="Enter Your Expected Salary" />
        </div>
        <div class="col-span-2 ">
            <x-label for="description" :required="true" >Job Description</x-label>
            <textarea name="description" id="description" cols="30" rows="10"
            class="mb-4 px-2.5 py-1.5 ring-1 focus:ring-2 ring-slate-300 border-0 rounded-md w-full
            placeholder:text-slate-300 text-sm "> {{ old('description')}}</textarea>
            @error('description')
                <div class="text-red-400 font-medium text-sm">{{$message}}</div>
            @enderror
        </div>
        <div>           
            <x-label for="experience" :required="true"> Experience </x-label>
            <x-radio-group name="experience" :all="false" :value="old('experience')" :options="\App\Models\JobVacancy::$experience" />
          </div>
        <div>
            <x-label for="category" :required="true"> Category </x-label>
            <x-radio-group name="category" :all="false" :value="old('category')" :options="\App\Models\JobVacancy::$category" />
  
        </div>
        <div class="col-span-2 " >
             <x-button class=" w-full ">Create Job</x-button>
        </div>
    </div>
</form>
</x-card>
</x-layout>