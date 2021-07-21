<?php

namespace App\Actions;

use App\Models\Deed;
use LaravelViews\Views\View;
use LaravelViews\Actions\Action;

class RestoreDeedAction extends Action
{
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "Restaurer";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "refresh-cw";

    /**
     * Execute the action when the user clicked on the button
     *
     * @param $model Model object of the list where the user has clicked
     * @param $view Current view where the action was executed from
     */
    public function handle($arg, View $view)
    {
        if (is_array($arg)) {
            Deed::onlyTrashed()->whereIn('id', $arg)->restore();
        } else {
            $arg->restore();
        }
        $this->view->emit('deedRestored');
        $this->view->dispatchBrowserEvent('alert-emit', [
            'alert' => 'success',
            'message' => 'Acte(s) restauré(s)'
        ]);
    }
}
