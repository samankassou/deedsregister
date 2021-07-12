<?php

namespace App\Filters;

use App\Models\Pole;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;

class PoleFilter extends Filter
{
    public $title = "Pôle";
    /**
     * Modify the current query when the filter is used
     *
     * @param Builder $query Current query
     * @param $value Value selected by the user
     * @return Builder Query modified
     */
    public function apply(Builder $query, $value, $request): Builder
    {
        return $query->whereHas('pole', function ($query) use ($value) {
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
        $poles = Pole::all();
        $arr = [];
        foreach ($poles as $pole) {
            $arr[$pole->name] = $pole->name;
        }
        return $arr;
    }
}
