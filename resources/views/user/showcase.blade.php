@extends('layout.app')

@section('content')


    <header>
        <h1 class="text-gray-700 text-6x1 font-semibold">Vind mooie Fotografie</h1>
        <h2 class="text-2x1 font-semibold">Door verschillende mensen</h2>
    </header>

        <div>
            <h4 class="font-bold mt-12 pb-2 border-b border-gray-200"> Foto's van {{ Auth::user()->name }}</h4>
            <div class="mt-8 grid lg:grid-cols-3 gap-10">
                @foreach($photo as $photo)
                <!-- Cards -->
                <div class="card hover:shadow-lg">
                    <img src="{{ asset('images/' . $photo->imagepath) }}" alt="" class="w-full h-32 sm:h-48 object-cover ">
                    <div class="m-5">
                        <span class="font-bold"> {{ $photo->name }}</span>
                        <span class="block text-gray-500 text-sm"> Foto gemaakt door </span>
                        <div class="btn bg-secondary-100 text-secondary-200 hover:shadow-iner transform hover:scale-125 hover:bg-opacity-50 transition ease-out duration-300">
                           <a href="/photo/{{ $photo->id }}"> Details </a>
                        </div>
                    </div>
                    <div class="badge">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span> 25 Min </span>
                    </div>
                </div>
                    @endforeach



{{--                <div class="card hover:shadow-lg">--}}
{{--                    <img src="#" alt="" class="w-full h-32 sm:h-48 object-cover ">--}}
{{--                    <div class="m-4 ">--}}
{{--                        <span class="font-bold"> Mooie landschap</span>--}}
{{--                        <span class="block text-gray-500 text-sm"> Foto gemaakt door</span>--}}
{{--                    </div>--}}
{{--                    <div class="badge">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />--}}
{{--                        </svg>--}}
{{--                        <span> 25 Min </span>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <h4 class="font-bold mt-12 pb-2 border-b border-gray-200">Populaire Foto's</h4>
        <div class="mt-8">
        </div>
            <div class="flex justify-center">
                <div class="text-center my-6 btn bg-secondary-100 text-secondary-200 hover:shadow-inner transform hover:scale-75 hover:bg-opacity-50 transition ease-out duration-300">
                    Laad meer
                </div>
            </div>
        </div>

@endsection
