<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landingpage.index');
    }

    public function pengaduan()
    {
        $data = Pengaduan::orderBy('tgl', 'desc')->paginate(3);
        Paginator::useBootstrapFive();
        return view('landingpage.pengaduan', compact('data'));
    }

    public function team()
    {
        $data = User::whereIn('role', ['admin', 'petugas'])->get();
        return view('landingpage.team', compact('data'));
    }
}
