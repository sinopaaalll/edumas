<?php

namespace App\Exports;

use App\Models\Pengaduan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
//use Maatwebsite\Excel\Facades\Excel;

class PengaduanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $pengaduan = Pengaduan::all(); //eloquent
        return Pengaduan::select("tgl","deskripsi","status")->get();
    }
    public function headings(): array
    {
        return ["tgl","deskripsi", "status"];
    }
}
