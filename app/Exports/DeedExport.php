<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithProperties;

class DeedExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    WithProperties
{
    protected $deeds;

    public function __construct($deeds)
    {
        $this->deeds = $deeds;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->deeds;
    }

    public function properties(): array
    {
        return [
            'creator'        => auth()->user()->name,
            'lastModifiedBy' => auth()->user()->name,
            'title'          => 'Liste des actes du ' . today()->format('d/m/Y'),
            'company'        => 'SCB Cameroun'
        ];
    }

    public function headings(): array
    {
        return [
            'client',
        ];
    }

    public function map($deed): array
    {
        return [
            $deed->client,
        ];
    }
}
