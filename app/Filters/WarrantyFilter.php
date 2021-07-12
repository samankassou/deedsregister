<?php

namespace App\Filters;

use App\Models\Warranty;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;

class WarrantyFilter extends Filter
{
    public $title = "Garantie";
    /**
     * Modify the current query when the filter is used
     *
     * @param Builder $query Current query
     * @param $value Value selected by the user
     * @return Builder Query modified
     */
    public function apply(Builder $query, $value, $request): Builder
    {
        return $query->whereHas('warranty', function ($query) use ($value) {
            $query->where('name', $value);
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
        $warranties = Warranty::all();
        $arr = [];
        foreach ($warranties as $warranty) {
            $arr[$warranty->name] = $warranty->name;
        }
        return $arr;
    }
}
