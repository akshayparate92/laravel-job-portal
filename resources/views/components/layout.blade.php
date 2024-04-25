<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Laravel Job Portal</title>
    </head>
    <body class="mx-auto mt-10 max-w-2xl bg-slate-100 text-slate-700">
        <nav class="flex justify-between mb-4 bg-indigo-500 px-3 py-5 ">
            <ul class="flex space-x-1">
                <li><a href="{{route('jobs.index')}}">Home</a></li>
            </ul>
            <ul class="flex space-x-1">
                @auth
                   <li class=" font-medium text-lg"><a href="{{route('my-job-applications.index')}}"> {{auth()->user()->name ?? 'Anonymous'}}:Application </a></li>
                   <li>
                    <form action="{{route('auth.destroy')}} "  method="POST">
                        @csrf
                        @method("DELETE")
                        <button>Logout</button>
                    </form>
                   </li>
                   @else
                   <li><a class="hover:underline" href="{{route('auth.create')}}">Sign In</a></li>
                @endauth
            </ul>
        </nav>
        @if (session('success'))
            <div role="alert" class="my-8 border rounded-md border-green-300 border-l-4 bg-green-100 p-4 text-green-700 opacity-75 ">
                <p class="font-bold">Success!</p>
               <p> {{ session('success')}} </p>

            </div>
        @endif
            {{$slot}}
    </body>
</html>