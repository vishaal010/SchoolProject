<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Fotografie</title>
    <link rel="stylesheet" href="{{asset('css/app.css') }}">
</head>


<div class="grid md:grid-cols-3">
    <div class="md:col-span-1 md:flex md:justify-end">
        <nav class="text-right">
            <div class="flex justify-between item-center">
                <h1 class="font-bold uppercase p-4 border-b border-gray-100">
                    <a href="/" class="hover:text-gray-700">Fotografie</a>
                </h1>
                <div class="px-4 cursor-pointer md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </div>
            </div>
            <ul class="text-sm mt-6 hidden md:block" id="nav">
                <li class="text-gray-700 py-1 font-bold">
                    <a href="#" class="border-r-4 border-primary">
                        <span>Home</span>
                    </a>
                </li>
                <li class="py-1">
                    <a href="#" class="px-4 flex justify-end border-r-4 border-white">
                        <span>About</span>
                    </a>
                </li>
                <li class="py-1">
                    <a href="#" class="border-r-4 border-white">
                        <span>Contact</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <body class="text-gray-600 font-body">

    <main class=" flex-grow px-16 py-6 bg-gray-100 md:col-span-2">
        <div class="flex justify-center md:justify-end">
            @if (Route::has('login'))
                <a href="{{route('login')}}" class="text-primary btn border-primary md:border-2 hover:bg-primary hover:text-white transition ease-out duration-500">Login</a>
                @if(Route::has('register'))
                    <a href="{{route('register') }}" class="text-primary ml-2 btn border-primary md:border-2 hover:bg-primary hover:text-white transition ease-out duration-500">Register</a>
        </div>
        @endif
        @endif


        <header>
            <h1 class="text-gray-700 text-6x1 font-semibold">Vind mooie Fotografie</h1>
            <h2 class="text-2x1 font-semibold">Door verschillende mensen</h2>
        </header>

@yield('content')

@yield('register')
    </main>
</div>


<footer class="text-gray-100 bg-gray-800 bottom-0">
    <div class="max-w-3xl mx-auto py-6">
        <h1 class="text-center text-lg lg:text2xl"></h1>
    </div>
</footer>
</body>
</html>
