<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\PengaduanExport;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengaduans = Pengaduan::all(); //eloquent
        return view('admin.pages.laporan.index',compact('pengaduans'));
    }
    public function getlaporan(Request $request)
    {
        $from = $request->from . '' . '00:00:00';
        $to = $request->to . ' ' . '23:59:59';

        $pengaduan = Pengaduan::whereBetween('tgl',[$from, $to])->get();

        return view('admin.pages.laporan.index', ['pengaduans' => $pengaduan, 'from'=> $from, 'to'=>$to]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('admin.pages.laporan.show', compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function cetaklaporan()
    {
        $pengaduan = Pengaduan::all(); //eloquent

        $pdf = PDF::loadView('admin.pages.laporan.cetak', ['pengaduan'=> $pengaduan]);
        return $pdf->download('laporan_pengaduan_'.date('d-m-Y').'.pdf');
    }
    public function laporanExcel() 
    {
        return Excel::download(new PengaduanExport, 'laporan_pengaduan_'.date('d-m-Y').'.xlsx');
    }
}