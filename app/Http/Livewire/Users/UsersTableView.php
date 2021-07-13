<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use LaravelViews\Views\TableView;

class UsersTableView extends TableView
{
    public $searchBy = ['name', 'email'];
    protected $paginate = 5;

    /**
     * Sets a model class to get the initial data
     */
    protected $model = User::class;

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            'Name',
            'Email',
            'Created',
            'Updated'
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
            $model->name,
            $model->email,
            $model->created_at,
            $model->updated_at
        ];
    }
}
