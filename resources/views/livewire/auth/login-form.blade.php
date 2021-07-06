<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 flex flex-col">
    <div class="mb-4 flex items-center justify-center">
        <img src="{{ asset('images/simple_scb_logo.jpeg') }}" alt="Logo SCB Cameroun" class="max-w-12 max-h-12">
    </div>
    <p class="text-center text-yellow-700">Saisissez vos identifiants</p>
    <div class="mb-4">
        <input wire:model="email" class="shadow appearance-none border border-yellow-700 rounded w-full py-2 px-3 text-gray-700" id="email" type="text"
            placeholder="Email" autofocus autocomplete="none">
        @error('email') <span class="text-red-800 text-xs italic">{{ $message }}</span> @enderror
    </div>
    <div class="mb-6">
        <input wire:model="password" class="shadow appearance-none border border-yellow-700 rounded w-full py-2 px-3 text-gray-700 mb-3"
            id="password" type="password" placeholder="Mot de passe">
        @error('password') <span class="text-red-800 text-xs italic">{{ $message }}</span>@enderror
    </div>
    <div class="flex flex-col md:flex-row items-center justify-center md:justify-between">
        <button wire:click="login" class="bg-yellow-700 w-full md:w-max hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded" type="button">
            Se connecter
        </button>
        <a class="inline-block align-baseline font-bold text-sm text-blue hover:text-yellow-700" href="#">
            Mot de passe oublié?
        </a>
    </div>
</div>
