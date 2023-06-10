<?php

namespace App\Exports;

use App\Models\Pengaduan;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PengaduanExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = Pengaduan::all();

        // Mengubah format data sesuai kebutuhan
        $formattedData = $data->map(function ($item) {
            return [
                'tgl' => $item->tgl,
                'name' => $item->user->name,
                'isi' => $item->deskripsi,
                'lokasi' => $item->lokasi,
                'kategori' => $item->kategori->name,
                'status' => $item->status,
            ];
        });

        return $formattedData;
    }

    public function headings(): array
    {
        return ["Tanggal","Nama Pengadu", "Isi Laporan", "Lokasi", "Kategori", "Status Pengaduan"];
    }
    
}
