<?php

namespace App\Exports;

use App\Models\OpsLogView;
use App\AppModelsOpsLogView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class OpsLogViewExport implements 
    FromCollection,
    WithHeadings, 
    ShouldAutoSize,
    WithEvents,
    WithTitle
{
private $id;
public function __construct($id)
{
    $this->id = $id;
}

public function headings():array {
    return[
        'Operation_id',
        'Operation log note',
        'Created by',
        'Created at',
        'Site',
    ];
}

/**
* @return \Illuminate\Support\Collection
*/
public function collection()
{
    return collect(OpsLogView::getOpsLog($this->id));
}

public function registerEvents(): array
{
    return [
        AfterSheet::class => function(AfterSheet $event) {
            $event->sheet->getStyle('A1:E1')->applyFromArray([
                'font' => [
                    'bold' => true
                ]
            ]);
        }
    ];
}

public function title(): string
{
    return 'Operation Log';
}
}