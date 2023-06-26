<?php

namespace App\Http\Controllers;


use App\Models\Pengaduan;

use App\Exports\PengaduanExport;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
class LaporanController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except(['index','show', 'cetaklaporan','laporanExcel']);
        $this->middleware('petugas')->only(['index','show', 'cetaklaporan','laporanExcel']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if((Request()->from && Request()->to)){

            $from = Request()->from . '' . '00:00:00';
            $to = Request()->to . ' ' . '23:59:59';

            $pengaduans = Pengaduan::whereBetween('tgl',[$from, $to])->get();
        }else{
            $pengaduans = Pengaduan::all()->sortDesc();
        };
        // $pengaduans = Pengaduan::all();
        return view('admin.pages.laporan.index',compact('pengaduans'));
    }

    // public function getlaporan(Request $request)
    // {
    //     $from = $request->from . '' . '00:00:00';
    //     $to = $request->to . ' ' . '23:59:59';

    //     $pengaduan = Pengaduan::whereBetween('tgl',[$from, $to])->get();

    //     return view('admin.pages.laporan.index', ['pengaduans' => $pengaduan, 'from'=> $from, 'to'=>$to]);
    // }

    public function show(string $id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('admin.pages.laporan.show', compact('pengaduan'));
    }

    public function cetaklaporan()
    {
        $pengaduan = Pengaduan::all(); //eloquent

        $pdf = PDF::loadView('admin.pages.laporan.cetak', ['pengaduan' => $pengaduan])->setPaper('a4', 'landscape');
        return $pdf->download('laporan_pengaduan_'.date('d-m-Y').'.pdf');
    }

    public function laporanExcel() 
    {
        return Excel::download(new PengaduanExport, 'laporan_pengaduan_'.date('d-m-Y').'.xlsx');
    }
}