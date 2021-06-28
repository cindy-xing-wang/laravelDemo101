<?php

namespace App\Exports;

use App\Models\ChecklistLogView;
use App\AppModelsChecklistLogView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ChecklistLogViewExport implements 
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
            'Operation_log_id',
            'Tasks comepleted',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect(ChecklistLogView::getChecklistLog($this->id));
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getStyle('A1:B1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            }
        ];
    }

    public function title(): string
    {
        return 'Checklist Log';
    }
}
