<?php

namespace App\Http\Livewire;

use App\Models\Deed;
use App\Filters\PoleFilter;
use App\Filters\DateOfReceipt;
use App\Filters\WarrantyFilter;
use LaravelViews\Facades\Header;
use App\Actions\DeleteDeedAction;
use LaravelViews\Views\TableView;
use LaravelViews\Actions\RedirectAction;
use Illuminate\Database\Eloquent\Builder;

class DeedsTableView extends TableView
{
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
        return Deed::latest()->with(['agency', 'pole', 'warranty', 'typeOfRequests']);
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
            'Types de demande',
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
            $model->typeOfRequests->implode('name', ', '),
        ];
    }

    protected function filters()
    {
        return [
            new DateOfReceipt,
            new PoleFilter,
            new WarrantyFilter
        ];
    }

    protected function actionsByRow()
    {
        return [
            new RedirectAction('admin.deeds.show', 'Détail', 'eye'),
            new RedirectAction('admin.deeds.edit', 'Modifier', 'edit'),
            new DeleteDeedAction,
        ];
    }

    protected function bulkActions()
    {
        return [
            new DeleteDeedAction
        ];
    }
}
