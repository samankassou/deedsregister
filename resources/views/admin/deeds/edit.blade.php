@extends('layouts.admin', ['title' => 'Modifier un acte'])
@section('styles')
@parent
<link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('vendor/choices.js/choices.min.css') }}" rel="stylesheet" />
<link href="{{ asset('vendor/pickaday/pickaday.css') }}" rel="stylesheet" />
@endsection
@section('content')
@include('admin.deeds.partials.top')
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    @livewire('edit-deed-form', compact('deed'))
</div>
@endsection
@section('scripts')
@parent
<script src="{{ asset('vendor/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('vendor/pickaday/french.js') }}"></script>
<script src="{{ asset('vendor/pickaday/pickaday.js') }}"></script>
<script src="{{ asset('vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('vendor/choices.js/choices.min.js') }}"></script>
@endsection
