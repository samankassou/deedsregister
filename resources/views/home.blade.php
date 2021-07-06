@extends('layouts.app', ['title' => 'Accueil'])
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection
@section('content')
    <div class="flex justify-center items-center min-h-screen">
        @guest
            <button class="bg-yellow-800 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded"
                onclick="Livewire.emit('openModal', 'auth.login-form')">Se connecter</button>
        @endguest
        @auth
            <a href="{{ route('admin.dashboard') }}" class="bg-yellow-800 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded">Tableau de bord</a>
        @endauth
    </div>
@endsection
