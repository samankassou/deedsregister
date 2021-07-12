<select x-data x-ref="input" x-init="new SlimSelect({ select: $refs.input, placeholder: 'Sélectionnez'})"
    {{ $attributes }}>
    {{ $slot }}
</select>
