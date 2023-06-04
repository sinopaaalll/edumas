<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if((Request()->status)){
            $pengaduans = Pengaduan::where('status', Request()->status)->get();
        }else{
            $pengaduans = Pengaduan::all();
        };

        return view('admin.pages.pengaduan.index', compact('pengaduans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('masyarakat.pages.pengaduan.add', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg|max:5120',
        ]);

        DB::beginTransaction();
        try {
            Pengaduan::create([
                'user_id' => $request->user_id,
                'tgl' => date('Y-m-d'),
                'kategori_id' => $request->kategori,
                'deskripsi' => $request->deskripsi,
                'lokasi' => $request->lokasi,
                'image' => $request->file('image') ? $request->file('image')->store('pengaduan','public') : null,
                'status' => 'masuk',
            ]);

            DB::commit();
            return redirect()->route('pengaduans.create')->with('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollback();
            return redirect()->route('pengaduans.create')->with('error', 'Data gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengaduan $pengaduan)
    {
        return view('admin.pages.pengaduan.show', compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengaduan $pengaduan)
    {
        //
    }
}
