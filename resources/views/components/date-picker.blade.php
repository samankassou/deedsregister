<input x-data="{ selected: @entangle($attributes->wire('model')) }" x-ref="input"
x-init="
picker = new Pikaday({
    field: $refs.input,
    format: 'DD/MM/YYYY',
    i18n: i18n,
    'defaultDate': selected,
    onSelect: () => $dispatch('input', picker.toString('YYYY-MM-DD')) })"
    type="text" {{ $attributes }} autocomplete="off">
