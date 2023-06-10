<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TanggapanController extends Controller
{
    public function tanggapan(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required',
            'status' => 'required',
        ]);

        DB::beginTransaction();
        try {
            Tanggapan::create([
                'pengaduan_id' => $request->pengaduan_id,
                'tgl' => Carbon::now(),
                'deskripsi' => $request->deskripsi,
                'user_id' => $request->user_id,
            ]);

            $pengaduan = Pengaduan::where('id', $request->pengaduan_id);
            $pengaduan->update(['status'=>$request->status]);

            DB::commit();
            return redirect()->route('pengaduans.index')->with('success', 'Pengaduan telah ditanggapi');
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollback();
            return redirect()->route('pengaduans.index')->with('error', 'Pengaduan gagal ditanggapi');
        }
    }

    public function tanggapanSelesai(string $id)
    {
        $pengaduan = Pengaduan::where('id', $id);

        DB::beginTransaction();
        try {
            $pengaduan->update(['status'=>'selesai']);

            DB::commit();
            return redirect()->route('pengaduans.index')->with('success', 'Status pengaduan berhasil diubah');
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollback();
            return redirect()->route('pengaduans.index')->with('error', 'Pengaduan gagal diupdate status');
        }
        
    }

}
