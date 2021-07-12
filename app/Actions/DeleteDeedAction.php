<?php

namespace App\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;
use LaravelViews\Actions\Confirmable;

class DeleteDeedAction extends Action
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
    public function handle($model, View $view)
    {
        // Your code here
        $model->delete();
        $this->success("Acte supprimé!");
    }

    public function getConfirmationMessage($item = null)
    {
        return 'Etes-vous sûr de vouloir supprimer?';
    }
}
