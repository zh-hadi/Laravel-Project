<x-layout>
    <x-bread-crumbs :links="[
        'My Jobs' => route('my-jobs.index'), 'Create' => '#'  
    ]" />

    <x-card class="mb-8">
        <form action="{{route('my-jobs.store')}}" method="post">
            @csrf
            <div class="grid grid-cols-2 mb-4 gap-4">
                <div>
                    <x-label for="title" :required="true">Title</x-label>
                    <x-text-input name="title" />
                </div>
                <div>
                    <x-label for="location" :required="true">Location</x-label>
                    <x-text-input name="location" />
                </div>
                <div class="col-span-2">
                    <x-label for="salary" :required="true">Salary</x-label>
                    <x-text-input name="salary" type="number" />
                </div>
                <div class="col-span-2">
                    <x-label for="description" :required="true">Descripiton</x-label>
                    <x-text-input name="description" type="textarea" />
                </div>

                <div>
                    
                    <x-label for="experience" :required="true">Experience</x-label>
                    <x-radio-group name="experience" :options="\App\Models\Job::$experience" :default_option="false" />
                </div>

                <div>
                    <x-label for="catagories">Catagorie</x-label>
                    <x-radio-group name="catagories" :options="\App\Models\Job::$catagories" :default_option="false"/>
                </div>

                <div class="col-span-2">
                    <x-button>Create Job</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>