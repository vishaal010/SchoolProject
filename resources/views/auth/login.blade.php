@extends('layout.app')

@section('register')

    <div class="font-bold mt-12 pb-2 border-b border-gray-200">
        <h1>Login</h1>
    </div>
    <div class="mt-8">
    </div>
    <form class="w-full max-w-lg" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                    Email
                </label>
                <input name="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email" placeholder="piet@gmail.com" value="{{ old('email') }}">
                @error('email')
                <p class="text-red-500 text-xs italic">
                    {{ $message }}
                </p>
                <p class="text-gray-600 text-xs italic">loremt</p>
            </div>
        </div>

        @enderror
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                    Wachtwoord
                </label>
                <input name="password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="password" type="password" placeholder="" >
                @error('password')
                <p class="text-red-500 text-xs italic">
                    {{ $message }}
                </p>
                @enderror
                <p class="text-gray-600 text-xs italic">Een wachtwoord wat je makkelijk kan onthouden</p>
            </div>
        </div>



{{--        <div class="flex flex-wrap -mx-3 mb-2">--}}
{{--            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">--}}
{{--                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">--}}
{{--                    Stad--}}
{{--                </label>--}}
{{--                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="Albuquerque">--}}
{{--            </div>--}}
{{--            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">--}}
{{--                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">--}}
{{--                    State--}}
{{--                </label>--}}
{{--                <div class="relative">--}}
{{--                    <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">--}}
{{--                        <option>New Mexico</option>--}}
{{--                        <option>Missouri</option>--}}
{{--                        <option>Texas</option>--}}
{{--                    </select>--}}
{{--                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">--}}
{{--                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">--}}
{{--                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">--}}
{{--                    Zip--}}
{{--                </label>--}}
{{--                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="90210">--}}
{{--            </div>--}}
{{--        </div>--}}
        <button class="mt-4  hover:bg-gray hover:text-white transition ease-out duration-500 bg-transparent hover:bg-gray-500 text-gray-700 font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded">
            Login
        </button>
    </form>
    <a href="{{route('password.request')}}"> Wachtwoord vergeten? </a>
    <div class="mt-7">
    </div>
    @endsection
