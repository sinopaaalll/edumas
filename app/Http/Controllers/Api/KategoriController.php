<?php

namespace App\Http\Controllers\Api;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Resources\KategoriResource;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();

        return new KategoriResource(true, 'Data Kategori Pengaduan', $kategori);
    }

    public function show(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        
        return new KategoriResource(true, 'Data Kategori Pengaduan Detail', $kategori);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required||unique:kategoris||max:45',
        ]);

        if ($validator->fails()) {
           return response()->json($validator->errors(), 422); 
        }

        $kategori = Kategori::create([
            'name' => $request->name,
        ]);
        return new KategoriResource(true, 'Data Kategori berhasil diinput', $kategori); 
        
    }

    public function update(string $id, Request $request)
    {
        $kategori = Kategori::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => ['required', Rule::unique('kategoris','name')->ignore($kategori)],
        ]);

        if ($validator->fails()) {
           return response()->json($validator->errors(), 422); 
        }

        $kategori->update([
            'name' => $request->name,
        ]);
        return new KategoriResource(true, 'Data Kategori berhasil diupdate', $kategori); 
        
    }

    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return new KategoriResource(true, 'Data Kategori berhasil dihapus', $kategori); 
    }
}
