<?php

namespace App\Filters;

use App\Models\TypeOfRequest;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;

class TypesOfRequestsFilter extends Filter
{
    public $title = "Types de demande";
    /**
     * Modify the current query when the filter is used
     *
     * @param Builder $query Current query
     * @param $value Value selected by the user
     * @return Builder Query modified
     */
    public function apply(Builder $query, $value, $request): Builder
    {
        return $query->whereHas('typeOfRequests', function ($query) use ($value) {
            $query->where('name', 'LIKE', '%' . $value . '%');
        });
    }

    /**
     * Defines the title and value for each option
     *
     * @return Array associative array with the title and values
     */
    public function options(): array
    {
        return $this->getFormattedOptions();
    }

    protected function getFormattedOptions(): array
    {
        $typesOfRequests = TypeOfRequest::all();
        $arr = [];
        foreach ($typesOfRequests as $type) {
            $arr[$type->name] = $type->name;
        }
        return $arr;
    }
}
