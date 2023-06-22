<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function __construct()
    {
        // $this->middleware('admin');
    }
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
            'name' => ['required','unique:kategoris','max:45'],
        ]);

        DB::beginTransaction();
        try {
            Kategori::create($request->all());
            DB::commit();
            return redirect()->route('kategoris.index')->with('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
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
            'name' => ['required', Rule::unique('kategoris','name')->ignore($kategori)],
        ]);

        DB::beginTransaction();
        try {
            $kategori->update($request->all());
            DB::commit();
            return redirect()->route('kategoris.index')->with('success', 'Data berhasil diupdate');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->route('kategoris.index')->with('error', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        DB::beginTransaction();
        try {
            $kategori->delete();
            DB::commit();
            return redirect()->route('kategoris.index')->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->route('kategoris.index')->with('error', 'Data gagal dihapus');
        }
        
    }

    public function APIKategori(){
        $data = Kategori::all();

        return response()->json([
            'success' => true,
            'message' => 'Data Kategori Pengaduan',
            'data' => $data,
        ]);
    }

    public function APIKategoriDetail(string $id){
        $data = Kategori::find($id);

        if(!empty($data)){
            return response()->json([
                'success' => true,
                'message' => 'Data Kategori Pengaduan',
                'data' => $data,
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data Kategori Pengaduan tidak ditemukan',
            ]);
        }
    }
}
