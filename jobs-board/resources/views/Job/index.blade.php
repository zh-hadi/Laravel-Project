<x-layout>
    <x-bread-crumbs :links="['Jobs' => route('jobs.index')]" />

    <x-card class="mb-4">
        <form action="{{route('jobs.index')}}" action="get" id="formSubmit">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="text-slate-500 font-semibold mb-1">Search</div>
                            <x-text-input name="search" placeholder="Search by any text" value="{{request('search')}}" ref="true"/>
                        </div>
                        <div>
                            <div class="text-slate-500 font-semibold mb-1">Salary</div>
                            <div class="flex space-x-2">
                                <x-text-input name="min_salary" placeholder="From" value="{{request('min_salary')}}" ref="true"/>
                                <x-text-input name="max_salary" placeholder="To" value="{{request('max_salary')}}" ref="true"/>
                            </div>
                        </div>
                        <div>
                            <div class="text-slate-500 font-semibold mb-1">Experience</div>

                            <x-radio-group name="experience" :options="\App\Models\Job::$experience" />

                            
                        </div>
                        <div>
                            <div class="text-slate-500 font-semibold mb-1">Catagorie</div>

                            <x-radio-group name="catagorie" :options="\App\Models\Job::$catagories" />
                        </div>
                    </div>
                    <x-button>Filter</x-button>
                </form>
    </x-card>
    @foreach ($jobs as $job)
       <x-job-card :job="$job">
            <div>
                <x-link-button :href="route('jobs.show', ['job' => $job->id])">
                    Show
                </x-link-button>
            </div>
       </x-job-card>
    @endforeach
</x-layout>

