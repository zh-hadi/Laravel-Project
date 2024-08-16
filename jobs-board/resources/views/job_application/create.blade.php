<x-layout>
    <x-bread-crumbs :links="[ $job->title => route('jobs.show', $job) ,'Apply' => '#']"/>
    <x-job-card :job="$job" />

    <x-card>
        <h2 class="text-2xl font-bold text-slate-500 mb-4">Your Job Appliction</h2>
        <form action="{{ route('job.application.store', $job)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <x-label for="expected_salary" :required="true">Expected Salary</x-label>
                <x-text-input name="expected_salary" placeholder="expected salary" type="number"/>
            </div>
            <div class="mb-4">
                <x-label>Upload CV</x-label>
                <x-text-input name="cv" placeholder="" type="file"/>
            </div>
            <div>
                <x-button class="w-full">Apply</x-button>
            </div>
        </form>
    </x-card>
</x-layout>