<x-layout>
    <x-bread-crumbs :links="['Jobs' => route('jobs.index'), $job->title => route('jobs.show', ['job'=> $job->id])]"/>
    <x-job-card :$job>
            <p class="text-sm text-slate-500 mb-4">
                {!! nl2br($job->description) !!}
            </p>
            @can('apply', $job)
            <x-link-button :href="route('job.application.create', $job)">Apply</x-link-button>
            @endcan
    </x-job-card>
    <x-card class="text-slate-500 text-sm">
        <h2 class="text-xl font-semibold mb-4">{{$job->employer->company_name}} jobs</h2>
        @foreach ($job->employer->jobs as $otherJob)
            <div class="flex mb-4 justify-between">
                <div>
                    <div class="text-slate-700">
                        <a href="{{route('jobs.show', $otherJob)}}">
                            {{$otherJob->title}}
                        </a>
                    </div>
                    <div class="text-xs">
                        {{$otherJob->created_at->diffForHumans() }}
                    </div>
                </div>
                <div class="text-xs">${{ number_format($otherJob->salary)}}</div>
            </div>
        @endforeach
    </x-card>
</x-layout>