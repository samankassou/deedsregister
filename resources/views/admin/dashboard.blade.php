@extends('layouts.admin', ['title' => 'Tableau de bord'])
@section('content')
    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <!-- Card -->
        <div class="flex items-center border p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-pink-500 bg-pink-100 rounded-full dark:text-pink-100 dark:bg-pink-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total clients
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $total_clients }}
                </p>
            </div>
        </div>
        <!-- Card -->
        <div class="flex items-center border p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                    </path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total actes
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $total_deeds }}
                </p>
            </div>
        </div>
        <!-- Card -->
        <div class="flex items-center border p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Agences
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $total_agencies }}
                </p>
            </div>
        </div>
        <!-- Card -->
        <div class="flex items-center border p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <div class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full dark:text-yellow-100 dark:bg-yellow-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Utilisateurs
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $total_users }}
                </p>
            </div>
        </div>
    </div>
    <!-- Charts -->
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Statistiques
    </h2>
    <div class="grid gap-6 mb-10 md:grid-cols-1">
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                Demandes par types
            </h4>
            <div id="requestsChart" style="height: 300px"></div>
        </div>
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                Actes par pôles
            </h4>
            <div id="deedsByPolesChart" style="height: 300px"></div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('vendor/chartjs/echarts.min.js') }}"></script>
<script src="{{ asset('vendor/chartjs/chartisan_echarts.js') }}"></script>
<script>
    const requestsChart = new Chartisan({
        el: "#requestsChart",
        url: route('charts.types_of_requests'),
        hooks: new ChartisanHooks().legend({ position: 'bottom' }).tooltip(),
    })

    const deedsByPolesChart = new Chartisan({
        el: "#deedsByPolesChart",
        url: route('charts.deeds_by_poles_chart'),
        hooks: new ChartisanHooks().datasets([{ type: 'pie', fill: false }, 'bar']).tooltip(),
    })
</script>
@endsection
