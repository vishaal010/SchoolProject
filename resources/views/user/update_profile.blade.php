@extends('layout.app')

@section('register')

    <div class="font-bold mt-12 pb-2 border-b border-gray-200">
        <h1>Update profile</h1>
    </div>
    <div class="mt-8">
    </div>
    <form class="w-full max-w-lg" method="POST" action="{{ route('user-profile-information.update') }}">
        @csrf
        @method('PUT')
{{--        <div class="flex flex-wrap -mx-3 mb-6">--}}
{{--            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">--}}
{{--                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">--}}
{{--                    Voornaam--}}
{{--                </label>--}}

{{--                <input name="first_name" class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('first_name') border border-red-500  @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="first_name" type="text" placeholder="Jane" value="{{ old('first_name') }}">--}}
{{--            </div>--}}
{{--            @error('first_name')--}}
{{--                         <p class="text-red-500 text-xs italic">--}}
{{--            {{ $message }}--}}
{{--            </p>--}}
{{--           @enderror--}}
{{--            <div class="w-full md:w-1/2 px-3">--}}
{{--                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">--}}
{{--                    Achternaam--}}
{{--                </label>--}}
{{--                <input name="last_name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="last_name" type="text" placeholder="Doe" value="{{ old('last_name') }}">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        @error('last_name')--}}
{{--        <p class="text-red-500 text-xs italic">--}}
{{--            {{ $message }}--}}
{{--        </p>--}}
{{--        @enderror--}}
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-username">
                    Gebruikersnaam
                </label>
                <input name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="username" type="text" placeholder="piet123" value="{{ auth()->user->name }}">
                <p class="text-gray-600 text-xs italic">Hiermee log je in</p>
            </div>
        </div>
        @error('name')
        <p class="text-red-500 text-xs italic">
            {{ $message }}
        </p>
        @enderror
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                    Email
                </label>
                <input name="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email" placeholder="piet@gmail.com" value="{{ auth()->user->email  }}">
                @error('email')
                <p class="text-red-500 text-xs italic">
                    {{ $message }}
                </p>
                <p class="text-gray-600 text-xs italic">loremt</p>
            </div>
        </div>

        @enderror


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
            Submit
        </button>
    </form>
    <div class="mt-7">
    </div>
    @endsection
