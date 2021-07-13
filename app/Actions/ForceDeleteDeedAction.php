<?php

namespace App\Actions;

use App\Models\Deed;
use LaravelViews\Views\View;
use LaravelViews\Actions\Action;
use LaravelViews\Actions\Confirmable;

class ForceDeleteDeedAction extends Action
{
    use Confirmable;
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "Supprimer";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "trash";

    /**
     * Execute the action when the user clicked on the button
     *
     * @param $model Model object of the list where the user has clicked
     * @param $view Current view where the action was executed from
     */
    public function handle(Deed $deed, View $view)
    {
        $deed->typeOfRequests()->detach();
        $deed->forceDelete();
        // Your code here
        $this->success("Acte(s) supprimé(s)!");
    }

    public function getConfirmationMessage($item = null)
    {
        return 'Suppression définitive, Etes-vous sûr de vouloir continuer?';
    }
}
