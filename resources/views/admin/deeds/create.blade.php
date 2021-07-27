@extends('layouts.admin', ['title' => 'Créer un acte'])
@section('styles')
    @parent
    <link href="{{ asset('vendor/choices.js/choices.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
@include('admin.deeds.partials.top')
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    @livewire('deeds.create-deed-form')
</div>
@endsection
@section('scripts')
@parent
<script src="{{ asset('vendor/choices.js/choices.min.js') }}"></script>
@endsection
