@extends('layout.app')

@section('register')

    <div class="font-bold mt-12 pb-2 border-b border-gray-200">
        <h1>Bewerk een gebruiker</h1>
    </div>
    <div class="mt-8">
    </div>
    <form class="w-full max-w-lg" method="POST" action="{{ route('admin.users.update', $user->id) }}">
        @method('PATCH')
       @include('admin.users.partials.form')
    </form>
    <div class="mt-7">
    </div>
    @endsection
