<?php

namespace App\Exports;

use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithProperties;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithStyles;

class DeedExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    WithProperties,
    WithCustomStartCell,
    WithEvents,
    WithColumnWidths,
    WithStyles
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

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $highestRow = $event->sheet->getDelegate()->getHighestRow();
                $highestColumn = $event->sheet->getDelegate()->getHighestColumn();
                $cellRange = 'A3:' . $highestColumn . '' . $highestRow;
                $hearders = "A2:$highestColumn" . "2";

                $event->sheet->getDelegate()->mergeCells("A1:B1");
                $event->sheet->getDelegate()->mergeCells("C1:N1");
                $event->sheet->getDelegate()->setCellValue("A1", today()->format('d/m/Y'));
                $event->sheet->getDelegate()->setCellValue("C1", "LISTES DES ACTES");
                $event->sheet->getDelegate()->getStyle($hearders)->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle("B2:T2")->getAlignment()->setTextRotation(61);
                $event->sheet->getDelegate()->getRowDimension(1)->setRowHeight(90);
                $event->sheet->getDelegate()->getRowDimension(2)->setRowHeight(90);
                $event->sheet->getDelegate()->getRowDimension(4)->setRowHeight(-1);

                $event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '000000']
                        ]
                    ]
                ]);
                $event->sheet->getDelegate()->getStyle("A1")->applyFromArray([
                    'font' => ['name' => 'Calibri', 'size' => 14, 'bold' => true],
                ]);
                $event->sheet->getDelegate()->getStyle("N2")->getAlignment()->applyFromArray([
                    'horizontal' => 'center',
                ]);
                $event->sheet->getDelegate()->getStyle("A1:C1")->getAlignment()->applyFromArray([
                    'horizontal' => 'center',
                    'vertical' => 'center'
                ]);
                $event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()->applyFromArray([
                    'horizontal' => 'center',
                    'vertical' => 'center'
                ]);
            }
        ];
    }

    public function startCell(): string
    {
        return 'A2';
    }

    public function headings(): array
    {
        return [
            'Code client',
            'client',
            'Date réception demande',
            'Notaire',
            'Correspondant notaire',
            'Objet du crédit',
            'Référence de la décision de crédit',
            'Pôle',
            'Agence',
            'Garantie',
            'Types de demande',
            'Référence avis d\'imposition',
            'Avis de débit notifié au client',
            'Documentation',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'C1' => [
                'fill' => ['fillType' => Fill::FILL_SOLID, 'color' => ['argb' => 'FFFF00']],
                'font' => ['name' => 'Candara', 'bold' => true, 'size' => 16],
            ],
            '2' => [
                'font' => ['name' => 'Candara', 'bold' => true, 'size' => 12],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => 'thin',
                        'color' => ['argb' => '000000']
                    ],
                ],
                'fill' => ['fillType' => Fill::FILL_SOLID, 'color' => ['argb' => 'CCCCCC']]
            ],
            '3' => [
                'font' => ['name' => 'Calibri', 'size' => 12],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => 'thin',
                        'color' => ['argb' => '000000']
                    ],
                ],
            ]
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 15,
            'B' => 20,
            'C' => 18,
            'D' => 24,
            'E' => 24,
            'F' => 24,
            'G' => 25,
            'H' => 25,
            'I' => 18,
            'J' => 10,
            'K' => 14,
            'L' => 14,
            'M' => 14,
            'N' => 14,
        ];
    }

    public function map($deed): array
    {
        return [
            $deed->client_code,
            $deed->client,
            optional($deed->date_of_receipt_of_the_request)->format('d/m/Y'),
            $deed->notary,
            $deed->correspondent_of_the_notary,
            $deed->purpose_of_the_credit,
            $deed->reference_of_credit_decision,
            $deed->pole->name,
            $deed->agency->name,
            $deed->warranty->name,
            optional($deed->typeOfRequests)->implode('name', ', '),
            $deed->tax_notice_reference,
            $deed->debit_advice_notified,
            $deed->documentation,
        ];
    }
}
