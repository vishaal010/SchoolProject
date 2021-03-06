@extends('layout.app')

@section('register')

    <div class="font-bold mt-12 pb-2 border-b border-gray-200">
        <h1>Maak een nieuwe gebruiker</h1>
    </div>
    <div class="mt-8">
    </div>
    <form class="w-full max-w-lg" method="POST" action="{{ route('admin.users.store') }}">
       @include('admin.users.partials.form', ['create' => true])
    </form>
    <div class="mt-7">
    </div>
    @endsection
