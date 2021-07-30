<tr class="border-b border-gray-200 text-sm">
    <td class="pl-3">
        <span class="flex items-center justify-center">
            <input type="checkbox" class="w-4 h-4 rounded" value="{{ $deed->id }}" wire:click="$emit('toggleSelected', {{ $deed->id }})" @if($selected) checked @endif>
        </span>
    </td>

    <td class="px-3 py-2 whitespace-no-wrap text-gray-500">
        {{ $deed->client_code }}
    </td>
    <td class="px-3 py-2 whitespace-no-wrap text-gray-500">
        {{ $deed->client }}
    </td>
    <td class="px-3 py-2 whitespace-no-wrap text-gray-500">
        {{ optional($deed->agency)->name }}
    </td>
    <td class="px-3 py-2 whitespace-no-wrap text-gray-500">
        {{ optional($deed->pole)->name }}
    </td>
    <td class="px-3 py-2 whitespace-no-wrap text-gray-500">
        {{ optional($deed->warranty)->name }}
    </td>
    <td class="px-3 py-2 whitespace-no-wrap text-gray-500">
        {{ optional($deed->typeOfRequests)->implode('name', ', ') }}
    </td>


    <td>
        <div class="px-3 py-2 flex justify-end">
            <div>
                <div class="hidden lg:flex justify-items-end">
                    <a href="{{ route('admin.deeds.show', $deed->id) }}"
                        class="p-1 border-2 border-transparent text-gray-600 rounded-full hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:bg-gray-100 transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-eye w-5 h-5">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </a>
                    <a target="_blank" href="{{ route('admin.deeds.print', $deed->id) }}"
                        class="p-1 border-2 border-transparent text-gray-600 rounded-full hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:bg-gray-100 transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-printer w-5 h-5">
                            <polyline points="6 9 6 2 18 2 18 9"></polyline>
                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2">
                            </path>
                            <rect x="6" y="14" width="12" height="8"></rect>
                        </svg>
                    </a>
                    <a href="{{ route('admin.deeds.edit', $deed->id) }}"
                        class="p-1 border-2 border-transparent text-gray-600 rounded-full hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:bg-gray-100 transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-edit w-5 h-5">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg>
                    </a>
                    <button wire:click.prevent="$emitUp('showDeletePopUp', {{ $deed->id }})"
                        class="p-1 border-2 border-transparent text-gray-600 rounded-full hover:text-gray-700 focus:outline-none focus:text-gray-700 focus:bg-gray-100 transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-trash w-5 h-5">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </td>
</tr>
