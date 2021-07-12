<div wire:ignore x-data="{ values: @entangle($attributes->wire('model')), choices: null }" x-init="
        choices = new Choices($refs.multiple, {
            itemSelectText: '',
            removeItems: true,
            removeItemButton: true,
            noChoicesText: 'Aucun élément à sélectioner',
            noResultsText: 'Aucun résultat',
            itemSelectText: 'Tapez Entrer pour sélectionner',
        });

        for (const [value, label] of Object.entries(values)) {
            choices.setChoiceByValue(value || label)
        }

        $refs.multiple.addEventListener('change', function (event) {
            values = []
            Array.from($refs.multiple.options).forEach(function (option) {
                values.push(option.value || option.text)
            })
        })
    ">
    <select x-ref="multiple" multiple="multiple">
        @foreach($options as $option)
        <option value="{{ $option->id }}">{{ $option->name }}</option>
        @endforeach
    </select>
</div>
