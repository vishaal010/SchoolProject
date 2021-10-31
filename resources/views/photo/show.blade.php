@extends('layout.app')

@section('content')

    <div class="font-bold mt-12 pb-2 border-b border-gray-200">
        <h2> Naam: </h2>
    </div>
    <p> {{ $photo->name }} </p>

    <div class="font-bold mt-12 pb-2 border-b border-gray-200">
        <h2> Locatie: </h2>
    </div>
    <p> {{ $photo->location }} </p>

    <div class="font-bold mt-12 pb-2 border-b border-gray-200">
        <h2> Beschrijving: </h2>
    </div>
    <p> {{ $photo->description }} </p>

    <div class="font-bold mt-12 pb-2 border-b border-gray-200">
        <h2> Tags </h2>
    </div>
     @forelse($photo->tags as $tags)
         <div
             class="ml-4 text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 rounded-full bg-white text-gray-700 border">
             <svg
                 xmlns="http://www.w3.org/2000/svg"
                 width="16"
                 height="16"
                 viewBox="0 0 24 24"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="2"
                 stroke-linecap="round"
                 stroke-linejoin="round"
                 class="feather feather-hard-drive mr-2">
                 <line x1="22" y1="12" x2="2" y2="12"></line>
                 <path
                     d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"
                 ></path>
                 <line x1="6" y1="16" x2="6.01" y2="16"></line>
                 <line x1="10" y1="16" x2="10.01" y2="16"></line>
             </svg>
             {{ $tags->name }}
         </div>
    @empty
        <p> sdds </p>
        <p>  </p>
    @endforelse

    <div class="font-bold mt-12 pb-2 border-b border-gray-200">
        <h2> Foto: </h2>
    </div>
    <img src="{{ asset('images/' . $photo->imagepath) }}">

    <div class="mt-8">
    </div>



    <div class="font-bold mt-12 pb-2 border-b border-gray-200">
        <h2> Review: </h2>
    </div>
    @foreach($reviews  as $review)
{{--        @foreach( $review->users->name as $username)--}}
{{--            <p> {{ $username }} </p>--}}
            <p> Naam zegt : {{ $review->comment }} </p>
        @endforeach
{{--    @endforeach--}}




    @auth
        @if($validation >= 5)
    <button class="inline-flex items-center h-10 px-5 text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">
        <a href="{{ route('review.make' , $photo->id) }}">
 <span>Reviews</span>
 </a>
    </button>
@endif
    @endauth




@endsection
