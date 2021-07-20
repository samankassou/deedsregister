<input x-data x-ref="input"
x-init="
new Pikaday({ field: $refs.input, format: 'DD/MM/YYYY', i18n: i18n })
"
type="text" {{ $attributes }}
onchange="this.dispatchEvent(new InputEvent('input'))">
