<x-layout>
    <x-breadcrumbs class="mb-4" :links="[ 'Create Employer' => '#' ]" />
    <x-card>
        <form action="{{route('employer.store')}}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="company_name">Company Name</label>
            <input type="text" class="mb-4 px-2.5 py-1.5 ring-1 focus:ring-2 ring-slate-300 border-0 rounded-md w-full
            placeholder:text-slate-300 text-sm " name="company_name" placeholder="Enter Company Name">
            @error('company_name')
               <div class="text-xs text-red-400 "> {{$message}}</div>
            @enderror
        </div>
        <x-button class="w-full">Create </x-button>
        </form>
    </x-card>
</x-layout>