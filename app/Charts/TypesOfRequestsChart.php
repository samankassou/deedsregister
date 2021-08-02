<?php

declare(strict_types=1);

namespace App\Charts;

use App\Models\TypeOfRequest;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class TypesOfRequestsChart extends BaseChart
{
    /**
     * Determines the chart name to be used on the
     * route. If null, the name will be a snake_case
     * version of the class name.
     */
    public ?string $name = 'types_of_requests_chart';

    /**
     * Determines the name suffix of the chart route.
     * This will also be used to get the chart URL
     * from the blade directrive. If null, the chart
     * name will be used.
     */
    public ?string $routeName = 'types_of_requests';
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $labels = [];
        $values = [];
        $typesOfRequests = TypeOfRequest::withCount('deeds')->get();
        foreach ($typesOfRequests as $type) {
            $labels[] = $type->name;
            $values[] = $type->deeds_count;
        }
        return Chartisan::build()
            ->labels($labels)
            ->dataset('Nombre de demandes', $values);
    }
}
