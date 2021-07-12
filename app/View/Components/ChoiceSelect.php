<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ChoiceSelect extends Component
{
    /**
     * The select options.
     *
     * @var array
     */
    public $options;
    /**
     * Create a new component instance.
     *
     * @param array $options
     * @return void
     */
    public function __construct($options)
    {
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.choice-select');
    }
}
