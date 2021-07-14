@if ($searchBy)
  @component('laravel-views::components.form.input-group', [
    'placeholder' => 'Rechercher...',
    'model' => 'search',
    'onClick' => 'clearSearch',
    'icon' => $search ? 'x-circle' : 'search',
    ])
  @endcomponent
@endif
