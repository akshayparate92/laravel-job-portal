<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index')]" />
    <x-card class="mb-4 text-sm">
        <form action="{{ route('jobs.index') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 text-slate-400 text-sm">Search</div>
                    <x-text-input name="search" value="{{ request('search') }}" placeholder="Search" />
                </div>
                <div>
                    <div class="mb-1 text-slate-400 text-sm">Salary</div>
                    <div class="flex gap-2">
                        <x-text-input name="from" value="{{ request('from') }}" placeholder="From" />
                        <x-text-input name="to" value="{{ request('to') }}" placeholder="To" />
                    </div>


                </div>
                <div>
                    <div class="mb-1 text-slate-400 text-sm">Experience</div>
                    <div class="flex gap-2">
                        <input type="radio" name="experience" value="" 
                        @checked(!request('experience'))/>
                        <span>All</span>
                    </div>
                    <div class="flex gap-2">
                        <input type="radio" name="experience" 
                        value="Fresher" @checked(request('experience') === 'Fresher') />
                        <span>Fresher</span>
                    </div>
                    <div class="flex gap-2">
                        <input type="radio" name="experience" value="Intermidiate" 
                        @checked(request('experience') === 'Intermidiate')/>
                        <span>Intermidiate</span>
                    </div>
                    <div class="flex gap-2">
                        <input type="radio" name="experience" value="Senior"
                        @checked(request('experience') === 'Senior')
                         /><span>Senior</span>
                    </div>
                </div>
                {{-- <div>
                <div class="mb-1 text-slate-400 text-sm">Search</div>
                <x-text-input name="Search" value="" placeholder="Search" />
            </div> --}}
            </div>
            <div>
                <button class="text-center border px-2 py-2 w-full hover:bg-slate-400">Filter</button>
            </div>
        </form>
    </x-card>
    @forelse ($jobs as $job)
        <x-job-card :$job>
            <x-link-button :href="route('jobs.show', $job)">
                Show
            </x-link-button>
        </x-job-card>
    @empty
        <div>No Jobs Vacancy Available</div>
    @endforelse
</x-layout>
