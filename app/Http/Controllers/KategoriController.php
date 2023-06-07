<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view('admin.pages.kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.kategori.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required','unique:kategoris'],
        ]);

        DB::beginTransaction();
        try {
            Kategori::create([
                'nama' => $request->nama,
            ]);

            DB::commit();
            return redirect()->route('kategoris.index')->with('success', 'Data berhasil disimpan');
            
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->route('kategoris.index')->with('error', 'Data gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('admin.pages.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama' => ['required',Rule::unique('kategoris','nama')->ignore($kategori)]
        ]);

        DB::beginTransaction();
        try {
            $kategori->update([
                'nama' => $request->nama,
            ]);

            DB::commit();
            return redirect()->route('kategoris.index')->with('success', 'Data berhasil diupdate');
            
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->route('kategoris.index')->with('error', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategoris.index')->with('success', 'Data berhasil dihapus');


    }
}