@extends('layouts.admin', ['title' => 'Détails d\'un acte supprimé'])
@section('content')
@include('admin.deeds.partials.top')
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    @livewire('deeds.deleted-detail', ['model' => $deed])
</div>
@endsection
