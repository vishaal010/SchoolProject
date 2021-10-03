@extends('layout.app')

@section('register')

    <div class="font-bold mt-12 pb-2 border-b border-gray-200">
        <h1>Voeg een nieuwe photo</h1>
    </div>
    <div class="mt-8">
    </div>
    <form class="w-full max-w-lg" method="POST" enctype="multipart/form-data" action="{{ route('photo.store')  }}">
       @include('photo.partials.form', ['create' => true])
    </form>
    <div class="mt-7">
    </div>
    @endsection
