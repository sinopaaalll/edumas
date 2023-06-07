<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        // Count jumlah dari tiap tiap databases
        $count = [
            'all' => Pengaduan::all()->count('id'),
            'masuk' => Pengaduan::where('status','masuk')->count(),
            'proses' => Pengaduan::where('status','proses')->count(),
            'selesai' => Pengaduan::where('status','selesai')->count(),
            'ditolak' => Pengaduan::where('status','ditolak')->count(),
            'allUser' => User::all()->count('id'),
            'admin' => User::where('role','admin')->count(),
            'petugas' => User::where('role','petugas')->count(),
            'masyarakat' => User::where('role','masyarakat')->count(),
        ];

        // Ambil data pengaduan dari database menggunakan Eloquent
        $pengaduan = Pengaduan::selectRaw('DATE(tgl) as date, COUNT(*) as total')->groupBy('date')->get();

        // Format data agar sesuai dengan format yang dibutuhkan oleh Chart.js
        $labels = $pengaduan->pluck('date')->toArray();
        $data = $pengaduan->pluck('total')->toArray();

        $chartData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Jumlah Pengaduan',
                    'data' => $data,
                    'backgroundColor' => '#6777ef',
                    'borderColor' => '#6777ef',
                    'borderWidth' => 3,
                    'pointBackgroundColor' => '#ffffff',
                    'pointRadius' => 4,
                    'fill' => false,
                ],
            ],
        ];
        return view('admin.pages.dashboard', compact('chartData','count'));
    }
}
