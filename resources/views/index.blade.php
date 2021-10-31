@extends('layout.app')

@section('content')


    <header>
        <h1 class="text-gray-700 text-6x1 font-semibold">Vind mooie Fotografie</h1>
        <h2 class="text-2x1 font-semibold">Door verschillende mensen</h2>
    </header>



        <div>
            <form method="GET" action="{{url('/')}}">
            <h4 class="font-bold mt-12 pb-2 border-b border-gray-200"> Zoek Foto's</h4>
            <div class="pt-2 relative mx-auto text-gray-600">
                <input name="search" class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                       type="search" name="search" placeholder="Search">
                <button type="submit" class="absolute right-0 top-0 mt-5 mr-4">
                    <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                         viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                         width="512px" height="512px">
            <path
                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
          </svg>
                </button>
            </div>
            </form>
            <div class="font-bold mt-12 pb-2 border-b border-gray-200">
                <h2> Tags: </h2>
            </div>




            @forelse($tag as $tag)
                <form method="GET" action="{{url('/')}}">
                <div
                     class="ml-2 text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 rounded-full bg-white text-gray-700 border">
                    <button type="submit">
                        <a type="text" href="?tag={{ $tag->name }}">
                    {{ $tag->name }}
                    </a>
                    </button>
                </div>
            @empty
                <p> Geen Tags </p>
            @endforelse
                </form>
            <div class="mt-8 grid lg:grid-cols-3 gap-10">
                @foreach($photo as $photo)
                <!-- Cards -->
                <div class="card hover:shadow-lg">
                    <img src="{{ asset('images/' . $photo->imagepath) }}" alt="" class="w-full h-32 sm:h-48 object-cover ">
                    <div class="m-5">
                        <span class="font-bold"> {{ $photo->name }}</span>
                        <span class="block text-gray-500 text-sm"> Foto gemaakt door </span>
                        <div class="btn bg-secondary-100 text-secondary-200 hover:shadow-iner transform hover:scale-125 hover:bg-opacity-50 transition ease-out duration-300">
                           <a href="/photo/{{ $photo->id}}"> Details </a>
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
        <div class="mt-8">
        </div>
            <div class="flex justify-center">


            </div>
        </div>

@endsection
