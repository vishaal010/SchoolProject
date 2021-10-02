@extends('layout.app')

@section('register')
        <h1>Verifieer email</h1>
        <p>Je moet je email verifieren om toegang te krijgen op deze pagina</p>

        <form method="POST" action="{{ route('verification.send') }}">
    @csrf
            <button type="submit" class=""> Stuur verificatie opnieuw </button>
    </form
    @endsection
