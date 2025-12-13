<?php

namespace App\Exports;

use App\Models\PermohonanTte;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PermohonanTteExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths
{
    protected $permohonan;

    public function __construct($permohonan)
    {
        $this->permohonan = $permohonan;
    }

    public function collection(): Collection
    {
        return $this->permohonan->map(function ($item) {
            return [
                $item->id,
                $item->nama_lengkap,
                $item->tempat_lahir,
                $item->tanggal_lahir->format('d/m/Y'),
                $item->nik,
                $item->nip ?? '-',
                $item->jenis_kelamin,
                $item->nomor_telepon,
                $item->email ?? '-',
                $item->jabatan,
                $item->golongan ?? '-',
                $item->nipData ? $item->nipData->perangkat_daerah : $item->opd->nama_opd,
                $item->tanggal_permohonan->format('d/m/Y'),
                ucfirst($item->status_permohonan),
                $item->created_at->format('d/m/Y H:i'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Lengkap',
            'Tempat Lahir',
            'Tanggal Lahir',
            'NIK',
            'NIP',
            'Jenis Kelamin',
            'Nomor Telepon',
            'Email',
            'Jabatan',
            'Golongan',
            'Instansi/Perangkat Daerah',
            'Tanggal Permohonan',
            'Status',
            'Tanggal Dibuat',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:O1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '2c5aa0'],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Auto height untuk header
        $sheet->getRowDimension(1)->setRowHeight(25);

        return $sheet;
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 20,
            'C' => 15,
            'D' => 12,
            'E' => 16,
            'F' => 16,
            'G' => 15,
            'H' => 15,
            'I' => 20,
            'J' => 18,
            'K' => 12,
            'L' => 25,
            'M' => 15,
            'N' => 15,
            'O' => 18,
        ];
    }
}
