<?php

namespace App\Http\Livewire;

use App\Models\Deed;
use LaravelViews\Views\TableView;

class DeedsTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Deed::class;

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
