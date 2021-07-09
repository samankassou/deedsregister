<?php

namespace App\Http\Livewire;

use App\Models\Deed;
use LaravelViews\Views\TableView;
use Illuminate\Database\Eloquent\Builder;

class DeletedDeedsTableView extends TableView
{
    /**
     * Sets a initial query with the data to fill the table
     *
     * @return Builder Eloquent query
     */
    public function repository(): Builder
    {
        return Deed::onlyTrashed();
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            'Client',
            'Décision de crédit'
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
            $model->client,
            $model->reference_of_credit_decision
        ];
    }
}
