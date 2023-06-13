<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended(route('dashboard'))->withSuccess('You are logged in!');;
            // $user = Auth::user();

            // if ($user->role === 'admin' || $user->role === 'petugas') {
            //     return redirect()->intended(route('dashboard'));
            // } else {
            //     return redirect()->intended(route('pengaduans.create'));
            // }
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register()
    {
        return view('auth.regis');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => ['numeric','required','min:16','unique:masyarakats'],
            'name' => 'required|max:225',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'telp' => 'required|numeric|min:12',
            'alamat' => 'required',
            'jk' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'masyarakat',
            'image' => null,
        ]);

        $masyarakat = Masyarakat::create([
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'jk' => $request->jk,
            'user_id' => $user->id,
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')->withSuccess('You have successfully registered and logged in!');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        return redirect('/');
    }

    public function profile()
    {
        $pengaduan = Pengaduan::where('user_id', auth()->user()->id )->count();

        $id = auth()->user()->id;
        $user = User::findOrFail($id);
        return view('auth.profile', compact('pengaduan','user'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $masyarakat = Masyarakat::findOrFail($id);

        $request->validate([
            'nik' => ['required','numeric',Rule::unique('masyarakats','nik')->ignore($id)],
            'name' => 'required|max:225',
            'email' => ['required','email',Rule::unique('users','email')->ignore($masyarakat->user->id)],
            'telp' => 'required|numeric|min:12',
            'alamat' => 'required',
            'jk' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if($request->password){
            $request->validate([
                'password' => 'required|min:6|confirmed',
            ]);

            $password = $request->password;
        }else{
            $password = $masyarakat->user->password;
        }

        if ($request->file('image')) {
            if ($masyarakat->user->image) {
                Storage::disk('public')->delete($masyarakat->user->image); 
            }
            $image = $request->file('image')->store('user','public');
        }else{
            $image = $masyarakat->user->image;
        }

        DB::beginTransaction();
        try {
            $masyarakat->user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
                'role' => $masyarakat->user->role,
                'image' => $image,
            ]);

            $masyarakat->update([
                'nik' => $request->nik,
                'alamat' => $request->alamat,
                'telp' => $request->telp,
                'jk' => $request->jk,
                'user_id' => $masyarakat->user_id,
            ]);

            DB::commit();
            return redirect()->route('profile')->with('success', 'Data berhasil diupdate');
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollback();
            return redirect()->route('profile')->with('error', 'Data gagal diupdate');
        }
    }
}
