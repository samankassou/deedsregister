@extends('layouts.admin', ['title' => 'Guide'])
@section('content')
<!-- New Table -->
<div class="w-full border overflow-hidden rounded-lg shadow-xs px-6 py-4">
    <h1 class="font-bold text-xl mb-3">Table de matières</h1>
    <ol class="text-indigo-500 pl-3 list-decimal">
        <li class="py-2">
            <a href="#description">Description de l'application</a>
        </li>
        <li class="py-2">
            <a href="#home">Page d'accueil</a>
        </li>
        <li class="py-2">
            <a href="#login">Connexion</a>
        </li>
        <li class="py-2">
            <a href="#dashboard">Tableau de bord</a>
        </li>
        <li class="py-2">
            <a href="#dashboard">Actes</a>
            <ul class="ml-5 list-disc">
                <li class="py-2">
                    <a href="#deeds">Liste des actes</a>
                </li>
                <li class="py-2">
                    <a href="#createDeed">Créer un acte</a>
                </li>
                <li class="py-2">
                    <a href="#editDdeed">Modifier un acte</a>
                </li>
                <li class="py-2">
                    <a href="#showDeed">Détails d'un acte</a>
                </li>
            </ul>
        </li>
        <li class="py-2">
            <a href="#warranties">Garanties</a>
        </li>
        <li class="py-2">
            <a href="#agencies">Agences</a>
        </li>
        <li class="py-2">
            <a href="#users">Utilisateurs</a>
        </li>
        <li class="py-2">
            <a href="#settings">Paramètres</a>
        </li>
    </ol>

    <div id="content" class="text-gray-500">
        <section id="description" class="mt-8 mb-3">
            <h2 class="text-indigo-500 text-2xl mb-2">1. Description de l'application</h2>
            <p class="leading-8">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium harum nulla eligendi hic
                sit minus aut cupiditate vel. Perferendis repudiandae optio nostrum dolor nihil laborum quae dignissimos cum
                saepe culpa!</p>
        </section>
        <section id="home" class="mt-8 mb-3">
            <h2 class="text-indigo-500 text-2xl mb-2">2. Page d'accueil</h2>
            <p class="leading-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima sunt omnis repellat impedit
                facilis, a repellendus fuga. Saepe veritatis obcaecati voluptatum a, officia nostrum omnis, ab odio est debitis
                eaque.</p>
            <img src="{{ asset('docs/home.png') }}" alt="Accueil">
        </section>
        <section id="login" class="mt-8 mb-3">
            <h2 class="text-indigo-500 text-2xl mb-2">3. Connexion</h2>
            <p class="leading-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima sunt omnis repellat impedit
                facilis, a repellendus fuga. Saepe veritatis obcaecati voluptatum a, officia nostrum omnis, ab odio est debitis
                eaque.</p>
            <img src="{{ asset('docs/login.png') }}" alt="Connexion">
        </section>
        <section id="dashboard" class="mt-8 mb-3">
            <h2 class="text-indigo-500 text-2xl mb-2">4. Tableau de bord</h2>
            <p class="leading-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima sunt omnis repellat impedit
                facilis, a repellendus fuga. Saepe veritatis obcaecati voluptatum a, officia nostrum omnis, ab odio est debitis
                eaque.</p>
            <img src="{{ asset('docs/dashboard.png') }}" alt="Tableau de bord">
        </section>
        <section id="deeds" class="mt-8 mb-3">
            <h2 class="text-indigo-500 text-2xl mb-2">5. Actes</h2>
            <div>Liste des actes</div>
            <p class="leading-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima sunt omnis repellat impedit
                facilis, a repellendus fuga. Saepe veritatis obcaecati voluptatum a, officia nostrum omnis, ab odio est debitis
                eaque.</p>
            <img src="{{ asset('docs/deedslist.png') }}" alt="Liste des actes">
            <div>Créer un acte</div>
            <div>Modifier un acte</div>
            <div>Détail d'un acte</div>
        </section>
        <section id="warranties" class="mt-8 mb-3">
            <h2 class="text-indigo-500 text-2xl mb-2">6. Garanties</h2>
            <p class="leading-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima sunt omnis repellat impedit
                facilis, a repellendus fuga. Saepe veritatis obcaecati voluptatum a, officia nostrum omnis, ab odio est debitis
                eaque.</p>
            <img src="{{ asset('docs/warrantieslist.png') }}" alt="Garanties">
        </section>
        <section id="agencies" class="mt-8 mb-3">
            <h2 class="text-indigo-500 text-2xl mb-2">7. Agences</h2>
            <p class="leading-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima sunt omnis repellat impedit
                facilis, a repellendus fuga. Saepe veritatis obcaecati voluptatum a, officia nostrum omnis, ab odio est debitis
                eaque.</p>
            <img src="{{ asset('docs/agencieslist.png') }}" alt="Agences">
        </section>
        <section id="users" class="mt-8 mb-3">
            <h2 class="text-indigo-500 text-2xl mb-2">8. Utilisateurs</h2>
            <p class="leading-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima sunt omnis repellat impedit
                facilis, a repellendus fuga. Saepe veritatis obcaecati voluptatum a, officia nostrum omnis, ab odio est debitis
                eaque.</p>
            <img src="{{ asset('docs/userslist.png') }}" alt="Liste des utilisateurs">
        </section>
        <section id="settings" class="mt-8 mb-3">
            <h2 class="text-indigo-500 text-2xl mb-2">9. Paramètres</h2>
            <p class="leading-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima sunt omnis repellat impedit
                facilis, a repellendus fuga. Saepe veritatis obcaecati voluptatum a, officia nostrum omnis, ab odio est debitis
                eaque.</p>
            <img src="{{ asset('docs/usersettings.png') }}" alt="Paramètres">
        </section>
    </div>
</div>
@endsection
