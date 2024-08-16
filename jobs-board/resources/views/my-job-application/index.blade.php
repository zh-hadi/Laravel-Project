<x-layout>
    <x-bread-crumbs class="mb-4"
        :links="['My Jobs Application' => '#']"
    />

    @forelse ($applications as $application)
        <x-job-card :job="$application->job">
            <div class="flex justify-between text-xs text-slate-500">
                <div>
                    <div>
                        Applied {{ $application->created_at->diffForHumans() }}
                    </div>
                    <div>
                        Other {{Str::plural('applicant', $application->job->job_application_count - 1 )}}
                        {{ $application->job->job_application_count }}
                    </div>
                    <div>
                        Your asking salary ${{ number_format($application->expected_salary)}}
                    </div>
                    <div>
                        Avarage asking salary ${{number_format($application->job->job_applications_avg_expected_salary)}}
                    </div>
                </div>
                <div>
                    <form action="{{route('my-job-application.destroy', $application)}}" method="post">
                        @csrf
                        @method('delete')
                        <x-button>Cancel</x-button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty
        <div class="py-8 rounded-md border border-dashed border-slate-300">
            <div class="text-center font-medium">
                No  job application yet
            </div>
            <div class="text-center">
                Go to find some jobs <a class="text-indigo-300 underline" href="{{route('jobs.index')}}">here!</a>
            </div>
        </div>
    @endforelse
</x-layout>