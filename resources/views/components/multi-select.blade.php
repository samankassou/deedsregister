<select x-data x-ref="input" x-init="new SlimSelect({ select: $refs.input, placeholder: 'Sélectionnez'})" multiple {{ $attributes }}>
    {{ $slot }}
</select>
