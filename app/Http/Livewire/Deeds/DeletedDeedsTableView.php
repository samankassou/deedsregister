<?php

namespace App\Http\Livewire\Deeds;

use App\Models\Deed;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use App\Actions\RestoreDeedAction;
use LaravelViews\Actions\Confirmable;
use App\Actions\ForceDeleteDeedAction;
use LaravelViews\Actions\RedirectAction;
use Illuminate\Database\Eloquent\Builder;

class DeletedDeedsTableView extends TableView
{
    use Confirmable;
    public $searchBy = [
        'client', 'notary', 'agency.name',
        'pole.name', 'warranty.name'
    ];
    protected $paginate = 10;
    /**
     * Sets a initial query with the data to fill the table
     *
     * @return Builder Eloquent query
     */
    public function repository(): Builder
    {
        return Deed::onlyTrashed()->with(['agency', 'pole', 'warranty', 'typeOfRequests']);
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title('Code Client')->sortBy('client_code'),
            Header::title('Client')->sortBy('client'),
            Header::title('Agence'),
            'Pôle',
            'Garantie',
            'Décision de crédit',
            'Supprimé le',
            'Supprimé par'
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
            $model->client_code,
            $model->client,
            $model->agency->name,
            $model->pole->name,
            $model->warranty->name,
            $model->reference_of_credit_decision,
            optional($model->deleted_at)->format('d/m/Y'),
            optional($model->deletedBy)->name,
        ];
    }

    protected function actionsByRow()
    {
        if (auth()->user()->isAbleTo('forceDdelete-deed')) {
            return [
                new RedirectAction('admin.deeds.deleted.show', 'Détail', 'eye'),
                new RestoreDeedAction,
                new ForceDeleteDeedAction,
            ];
        }
        return [];
    }

    protected function bulkActions()
    {
        if (auth()->user()->isAbleTo('forceDdelete-deed')) {
            return [
                new RestoreDeedAction,
                new ForceDeleteDeedAction,
            ];
        }
        return [];
    }

    public function getConfirmationMessage($item = null)
    {
        return 'Cette suppression est définitive, voulez-vous confirmer?';
    }
}
