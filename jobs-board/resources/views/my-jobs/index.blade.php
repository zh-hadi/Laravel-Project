<x-layout>
    <x-bread-crumbs  :links="['My Jobs' => '#']"/>

    <div class="mb-8 text-right">
        <x-link-button href="{{route('my-jobs.create')}}" class="bg-white">Add New</x-link-button>
    </div>

    @forelse($jobs as $job)
        <x-job-card :$job>
            <div class="text-sm text-slate-500 mb-4">
                @forelse($job->JobApplications as $applications)
                    <div class="mb-4 flex justify-between items-center">
                        <div>
                            <div>{{$applications->user->name}}</div>
                            <div>Applied {{$applications->created_at->diffForHumans()}}</div>
                            <div>Download CV</div>
                        </div>
                        <div>
                            ${{number_format($applications->expected_salary)}}
                        </div>
                    </div>

                  
                @empty
                    <div>Not application yet</div>
                @endforelse
            </div>
            <x-link-button href="{{ route('my-jobs.edit', $job) }}" >Edit Job</x-link-button>
        </x-job-card>
    @empty
        <div class="py-8 rounded-md border border-dashed text-center border-slate-300">
            <div class="text-center font-medium">No job yet</div>
            <div>
                Post your fist job <a href="{{route('my-jobs.create')}}" class="text-indigo-500 hover:underline">here</a>
            </div>
        </div>
    @endforelse
</x-layout>