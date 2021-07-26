<div class="flex items-center justify-center w-full mb-12">

    <label for="toogle{{ $user->id }}" class="flex items-center cursor-pointer">
        <!-- toggle -->
        <div class="relative">
            <!-- input -->
            <input id="toogle{{ $user->id }}" wire:model="user.status" type="checkbox" class="sr-only" />
            <!-- line -->
            <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
            <!-- dot -->
            <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition"></div>
        </div>
        <!-- label -->
        <div class="ml-3 text-gray-700 font-medium">
            Status
        </div>
    </label>

</div>
