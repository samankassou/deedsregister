<?php

declare(strict_types=1);

namespace App\Charts;

use App\Models\Pole;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class DeedsByPolesChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $labels = [];
        $values = [];
        $poles = Pole::withCount('deeds')->get();
        foreach ($poles as $pole) {
            $labels[] = $pole->name;
            $values[] = $pole->deeds_count;
        }
        return Chartisan::build()
            ->labels($labels)
            ->dataset('Nombre  d\'actes par pôle', $values);
    }
}
