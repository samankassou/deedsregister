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
            <a href="#deeds">Actes</a>
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
            <p class="leading-8"><span class="font-bold text-indigo-500">Deeds Register</span> est une application web pour l'enregistrement des actes. L'application a une interface assez simple et intuitive pour faciliter la prise en main. Elle est bien sécurisée et donc l'accès est limité aux personnes ayant un compte. Contactez un administrateur de l'application pour en avoir un.</p>
        </section>
        <section id="home" class="mt-8 mb-3">
            <h2 class="text-indigo-500 text-2xl mb-2">2. Page d'accueil</h2>
            <p class="leading-8 my-2">Ci dessous nous avons une image de la page d'accueil de l'application. Nous avons un seul bouton disponible, celui de connexion.</p>
            <img src="{{ asset('docs/home.png') }}" alt="Accueil">
            <p class="italic font-thin text-indigo-300">Fig 1. Page d'accueil de l'application <span class="font-bold">Deeds Register</span></p>
        </section>
        <section id="login" class="mt-8 mb-3">
            <h2 class="text-indigo-500 text-2xl mb-2">3. Connexion</h2>
            <p class="leading-8 my-2">Lorsqu'on clique sur le bouton "Se connecter", une fenêtre s'affiche. Cette fenêtre nous demande de rentrer nos identifiants(adresse mail et mot de passe). Lorsque la connexion se passe bien, nous accédons au Tableau de bord qui est décrit à la prochaine section.</p>
            <img src="{{ asset('docs/login.png') }}" alt="Connexion">
            <p class="italic font-thin text-indigo-300">Fig 2. Formulaire de connexion à  l'application <span class="font-bold">Deeds
                    Register</span></p>
        </section>
        <section id="dashboard" class="mt-8 mb-3">
            <h2 class="text-indigo-500 text-2xl mb-2">4. Tableau de bord</h2>
            <p class="leading-8 my-2">Le Tableau de bord est la première page qui s'affiche lorsqu'on se connecte à l'application. Comme son nom l'indique, il permet d'avoir un apperçu global de l'application. On a des informations telles que le nombre de client répertorié dans l'application, le nombre d'actes enregistrés etc.</p>
            <img src="{{ asset('docs/dashboard.png') }}" alt="Tableau de bord">
            <p class="italic font-thin text-indigo-300">Fig 3. Tableau de bord de l'application</p>
        </section>
        <section id="deeds" class="mt-8 mb-3">
            <h2 class="text-indigo-500 text-2xl my-2">5. Actes</h2>
            <div class="text-bold my-2 text-indigo-500">Liste des actes</div>
            <p class="leading-8 my-2">Dans le menu latéral, lorsque l'on clique sur "Actes", l'application nous affiche un tableau contenant les actes enregistrés dans le système. L'application affiche, pour chaque élément le code client, le nom/raison sociale du client, l'agence, le pôle, la garantie et le type de demande. Dans cette fenêtre nous avons plusieurs boutons d'action:
                <ul class="ml-3 my-3 list-disc">
                    <li class="py-2"><span class="text-indigo-500">Exporter</span>(qui permet d'exporter la liste des actes en fichier Excel);</li>
                    <li class="py-2"><span class="text-indigo-500">Créer</span>(qui ouvre un formulaire pour la création d'un acte);</li>
                    <li class="py-2"><span class="text-indigo-500">Corbeille</span>(qui ouvre la liste des actes supprimés). Ce bouton affiche également le nombre d'élément dans cette 'corbeille'.</li>
                </ul>
            </p>
            <img src="{{ asset('docs/deedslist.png') }}" alt="Liste des actes">
            <p class="italic font-thin text-indigo-300">Fig 4. Liste des actes</p>
            <div class="ml-3 mt-6">
                <span id="createDeed" class="text-xl text-indigo-500 d-block my-4">Créer un acte</span>
                <p class="leading-8 mb-2">La page de l'image ci-dessous affiche le formulaire de création d'un acte. Les champs marqués d'un * sont obligatoires.</p>
                <img src="{{ asset('docs/createdeedsform.png') }}" alt="Formulaire création d'un acte">
                <p class="italic font-thin text-indigo-300">Fig 5. Formulaire d'ajout d'un acte</p>
            </div>
            <div class="ml-3 mt-6">
                <span id="editDeed" class="text-xl text-indigo-500 d-block my-3">Modifier un acte</span>
                <p class="leading-8 mb-2">La page de l'image ci-dessous affiche le formulaire de d'édition d'un acte. Les champs marqués d'un * sont
                    obligatoires.</p>
                <img src="{{ asset('docs/editdeedform.png') }}" alt="Formulaire d'édition d'un acte">
                <p class="italic font-thin text-indigo-300">Fig 6. Formulaire d'édition d'un acte</p>
            </div>
            <div class="ml-3 mt-6">
                <span id="showDeed" class="text-xl text-indigo-500">Détail d'un acte</span>
                <p class="leading-8 mb-2">
                    Cette page présente la fiche détaillée d'un acte. On y retrouve toutes les informations sur l'acte(Client, notaire, Objet du crédit etc.)
                </p>
                <img src="{{ asset('docs/deedsdetails.png') }}" alt="page de détail d'un acte">
                <p class="italic font-thin text-indigo-300">Fig 7. Fiche détaillé d'un acte</p>
            </div>
        </section>
        <section id="warranties" class="mt-8 mb-3">
            <h2 class="text-indigo-500 text-2xl mb-2">6. Garanties</h2>
            <p class="leading-8">
                Cette page donnes accès à la liste des garanties enregistrées dans le système. Il faut noter que l'application n'étant pas
                une application conçue spécialement pour la gestion des garanties, nous nous limitons aux informations nécéssaires au bon
                fonctionnement de celle-ci(l'intitulé de la garantie)
                Cette interface permet de gérer les garanties enregistrées dans l'application(Ajout, modification et suppression).
            </p>
            <img src="{{ asset('docs/warrantieslist.png') }}" alt="Garanties">
            <p class="italic font-thin text-indigo-300">Fig 8. Page de gestion des garanties enregistrées dans l'application</p>
        </section>
        <section id="agencies" class="mt-8 mb-3">
            <h2 class="text-indigo-500 text-2xl mb-2">7. Agences</h2>
            <p class="leading-8">Cette page donnes accès à la liste des agences enregistrées dans le système. Il faut noter que l'application n'étant pas une application conçue spécialement pour la gestion des agences, nous nous limitons aux informations nécéssaires au bon fonctionnement de celle-ci(code et nom de l'agence)
                Cette interface permet de gérer les agences enregistrées dans l'application(Ajout, modification et suppression).
            </p>
            <img src="{{ asset('docs/agencieslist.png') }}" alt="Agences">
            <p class="italic font-thin text-indigo-300">Fig 9. Page de gestion des agences enregistrées dans l'application</p>
        </section>
        <section id="users" class="mt-8 mb-3">
            <h2 class="text-indigo-500 text-2xl mb-2">8. Utilisateurs</h2>
            <p class="leading-8">Cette page permet à un administrateur de gérer les comptes des différents utilisateurs de l'application. L'application dispose de deux types de comptes(administrateur et saisisseur). Le compte <span class="font-bold text-indigo-500">Saisisseur</span> a un accès limité uniquement aux opérations liées aux actes(ajout, modification, suppression etc.). L'administrateur peut ajouter, modifier, ou supprimer un compte d'utilisateur mais il peut aussi activer/désactiver un compte. En cas d'oublie d'un mot de passe par un utilisateur, l'administrateur peut envoyer un lien de réinitialisation par mail.</p>
            <img src="{{ asset('docs/userslist.png') }}" alt="Liste des utilisateurs">
            <p class="italic font-thin text-indigo-300">Fig 10. Interface de gestion des comptes d'utilisateurs</p>
        </section>
        <section id="settings" class="mt-8 mb-3">
            <h2 class="text-indigo-500 text-2xl mb-2">9. Paramètres</h2>
            <p class="leading-8">Cette page permet à l'utilisateur de modifier ses paramètres de connexion de connexion(adresse mail, noms et mot de passe).</p>
            <img src="{{ asset('docs/usersettings.png') }}" alt="Paramètres">
            <p class="italic font-thin text-indigo-300">Fig 11. Page des paramètres du compte d'un utilisateur</p>
        </section>
    </div>
</div>
@endsection
