<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['destroy']);
        $this->middleware('masyarakat')->only('create','store');
        $this->middleware('ormasyarakat')->only(['index','show','destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if((Request()->status)){
            $pengaduans = Pengaduan::where('status', Request()->status)->get()->sortDesc();
        }else{
            $role = auth()->user()->role;
            $user = auth()->user()->id;

            if ($role == 'masyarakat') {
                $pengaduans = Pengaduan::where('user_id', $user)->get()->sortDesc();
            }else{
                $pengaduans = Pengaduan::all()->sortDesc();
            }
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
            return redirect()->route('pengaduans.create')->with('success', 'Pengaduan berhasil dikirim');
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollback();
            return redirect()->route('pengaduans.create')->with('error', 'Pengaduan gagal dikirim');
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
     * Remove the specified resource from storage.
     */
    public function destroy(Pengaduan $pengaduan)
    {
        if($pengaduan->image){
            Storage::disk('public')->delete($pengaduan->image);
        }

        $pengaduan->delete();
        return redirect()->route('pengaduans.index')->with('success', 'Data berhasil dihapus');

    }
}
