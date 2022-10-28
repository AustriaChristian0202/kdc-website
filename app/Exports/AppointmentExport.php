<?php

namespace App\Exports;

use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AppointmentExport implements FromCollection, WithMapping, WithHeadings, WithStyles
{
  use Exportable;

  public function __construct($appointment)
  {
    $this->appointment = $appointment;
  }

  /**
   * @return \Illuminate\Support\Collection
   */
  public function collection()
  {
    //
    return $this->appointment;
  }

  public function map($appointment): array
  {
    return [
      $appointment->id,
      $appointment->name,
      $appointment->age,
      $appointment->contact,
      $appointment->client?->email ?? 'N/A',
      $appointment->dentist->name,
      // created by
      $appointment->causer?->name ?? 'N/A',
      $appointment->service,
      Carbon::parse($appointment->schedule)->format('M d, Y h:i A'),
      $appointment->status,
      $appointment->created_at,
    ];
  }

  public function headings(): array
  {
    return [
      'ID',
      'Name',
      'Age',
      'Contact',
      'Email',
      'Dentist',
      'Created By',
      'Service',
      'Schedule',
      'Status',
      'Created At',
    ];
  }

  public function styles(Worksheet $sheet)
  {
    // ID
    $sheet->getColumnDimension('A')->setWidth(10);
    $sheet->getStyle('A')->getAlignment()->setWrapText(true);

    // Name
    $sheet->getColumnDimension('B')->setWidth(20);
    $sheet->getStyle('B')->getAlignment()->setWrapText(true);

    // Age
    $sheet->getColumnDimension('C')->setWidth(10);
    $sheet->getStyle('C')->getAlignment()->setWrapText(true);

    // Contact
    $sheet->getColumnDimension('D')->setWidth(20);
    $sheet->getStyle('D')->getAlignment()->setWrapText(true);

    // Email
    $sheet->getColumnDimension('E')->setWidth(25);
    $sheet->getStyle('E')->getAlignment()->setWrapText(true);

    // Dentist
    $sheet->getColumnDimension('F')->setWidth(25);
    $sheet->getStyle('F')->getAlignment()->setWrapText(true);

    // Created By
    $sheet->getColumnDimension('G')->setWidth(25);
    $sheet->getStyle('G')->getAlignment()->setWrapText(true);

    // Service
    $sheet->getColumnDimension('H')->setWidth(20);
    $sheet->getStyle('H')->getAlignment()->setWrapText(true);

    // Schedule
    $sheet->getColumnDimension('I')->setWidth(24);
    $sheet->getStyle('I')->getAlignment()->setWrapText(true);

    // Status
    $sheet->getColumnDimension('J')->setWidth(15);
    $sheet->getStyle('J')->getAlignment()->setWrapText(true);

    // Created At
    $sheet->getColumnDimension('K')->setWidth(20);
    $sheet->getStyle('K')->getAlignment()->setWrapText(true);


    $sheet->getStyle($sheet->calculateWorksheetDimension())
      ->applyFromArray([
        'borders' => [
          'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => '000000'],
          ],
        ],
        'font' => [
          // set font name
          'name' => 'Helvetica',
          //color white
        ],
        'alignment' => [
          'vertical' => Alignment::VERTICAL_CENTER,
          'horizontal' => Alignment::HORIZONTAL_CENTER,
        ],
      ]);

    $sheet->getStyle('A1:K1')->applyFromArray([
      'font' => [
        'bold' => true,
        'size' => 11,
        'color' => [
          'rgb' => 'FFFFFF'
        ]
      ],
      'alignment' => [
        'horizontal' => 'center',
        'vertical' => 'center',
      ],
      'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => [
          'rgb' => '94A3B8',
        ],
      ],

    ]);
  }
}
