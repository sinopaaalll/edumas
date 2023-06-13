<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PetugasController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereIn('role',['admin','petugas'])->get();
        return view('admin.pages.petugas.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.petugas.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:225',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
            'role' => 'required',
        ]);

        DB::beginTransaction();
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' => $request->role,
                'image' => $request->file('image') ? $request->file('image')->store('user','public') : null,
            ]);

            DB::commit();
            return redirect()->route('users.index')->with('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollback();
            return redirect()->route('users.index')->with('error', 'Data gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.pages.petugas.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'name' => 'required|max:225',
            'email' => ['required','email',Rule::unique('users','email')->ignore($id)],
            // 'password' => 'required|min:6|confirmed',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
            'role' => 'required',
        ]);

        $user = User::findOrFail($id);

        if($request->password){
            $validate = $request->validate([
                'password' => 'required|min:6|confirmed',
            ]);

            $password = $request->password;
        }else{
            $password = $user->password;
        }

        if ($request->file('image')) {
            if ($user->image) {
                Storage::disk('public')->delete($user->image); 
            }
            $image = $request->file('image')->store('user','public');
        }else{
            $image = $user->image;
        }


        DB::beginTransaction();
        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password,
                'role' => $request->role,
                'image' => $image,
            ]);

            DB::commit();
            return redirect()->route('users.index')->with('success', 'Data berhasil diupdate');
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollback();
            return redirect()->route('users.index')->with('error', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        DB::beginTransaction();
        try {
            $user->delete();

            DB::commit();
            if($user->image){
                Storage::disk('public')->delete($user->image);
            }
    
            return redirect()->route('users.index')->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('users.index')->with('error', 'Data gagal dihapus');
        }

        


    }
}
