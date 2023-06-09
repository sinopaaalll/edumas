<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

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
        return redirect()->route('dashboard')->withSuccess('You have successfully registered & logged in!');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        return redirect('/');
    }
}
