@extends('layouts.admin', ['title' => 'Modifier un acte'])
@section('styles')
@parent
<link href="{{ asset('vendor/choices.js/choices.min.css') }}" rel="stylesheet" />
@endsection
@section('content')
@include('admin.deeds.partials.top')
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    @livewire('deeds.edit-deed-form', compact('deed'))
</div>
@endsection
@section('scripts')
@parent
<script src="{{ asset('vendor/choices.js/choices.min.js') }}"></script>
@endsection
