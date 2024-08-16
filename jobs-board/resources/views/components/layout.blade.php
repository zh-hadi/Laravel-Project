<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Jobs Board</title>

        @vite('resources/css/app.css')
    </head>
    <body class="from-10% via-30% to-90% mx-auto mt-10 max-w-2xl bg-gradient-to-r from-indigo-100 via-sky-100 to-emerald-100 text-slate-700">
        <nav class="flex justify-between mb-8">
            <ul>
                <li>
                    <a href="{{route('jobs.index')}}">Home</a>
                </li>
            </ul>
            <ul class="flex space-x-2">
                @auth
                <li>
                    <a href="{{route('my-job-application.index')}}">{{auth()->user()->name ?? 'Anynomus'}}:Application</a>
                </li>
                <li>
                    <a href="{{route('my-jobs.index')}}">My Jobs</a>
                </li>
                <li>
                    <form action="{{route('auth.destroy')}}" method="post">
                        @csrf
                        @method('delete')
                        <button>Logout</button>
                    </form>
                </li>
                @else
                <li>
                    <a href="{{route('login')}}" href="">Sing in</a>
                </li>
                @endauth
            </ul>
        </nav>

        @if(session('success'))
            <div role="alert"
                class="my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-75"
            >
                <p class="font-bold">Success!</p>
                <p>{{session('success')}}</p>
            </div>
        @endif

        @if(session('error'))
            <div role="alert"
                class="my-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-700 opacity-75"
            >
                <p class="font-bold">Error!</p>
                <p>{{session('error')}}</p>
            </div>
        @endif

        {{ $slot }}
    </body>
</html>
