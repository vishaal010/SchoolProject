@extends('layout.app')

@section('register')

<div class="font-bold mt-12 pb-2 border-b border-gray-200">
    <h1>Voeg een review</h1>
</div>
<div class="mt-8">
</div>
<form class="w-full max-w-lg" method="POST" enctype="multipart/form-data" action="{{ route('review.store')  }}">
    @csrf
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-username">
                Wat wil je zeggen
            </label>
            <input name="comment" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="username" type="text" placeholder="piet123"
                   value="{{ old('comment') }}">
        </div>
    </div>

    @error('comment')
    <p class="text-red-500 text-xs italic">
        {{ $message }}
    </p>
    @enderror




    <input name="photo_id"
           value="{{ $photo_id }}">


    <input name="user_id" style="display: none"
           value="{{ Auth::user()->id  }}">


    <button class="mt-4  hover:bg-gray hover:text-white transition ease-out duration-500 bg-transparent hover:bg-gray-500 text-gray-700 font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded">
        Submit
    </button>

</form>
<div class="mt-7">
</div>
@endsection
