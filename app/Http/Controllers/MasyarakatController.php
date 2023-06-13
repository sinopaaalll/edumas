<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\String_;
use Illuminate\Support\Facades\Storage;

class MasyarakatController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except(['index','show']);
        $this->middleware('petugas')->only(['index','show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $masyarakat = Masyarakat::all();
        return view('admin.pages.masyarakat.index', compact('masyarakat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.masyarakat.add');
    }

    /**
     * Store a newly created resource in storage.
     */
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
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' => 'masyarakat',
                'image' => $request->file('image') ? $request->file('image')->store('user','public') : null,
            ]);

            $masyarakat = Masyarakat::create([
                'nik' => $request->nik,
                'alamat' => $request->alamat,
                'telp' => $request->telp,
                'jk' => $request->jk,
                'user_id' => $user->id,
            ]);

            DB::commit();
            return redirect()->route('masyarakats.index')->with('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollback();
            return redirect()->route('masyarakats.index')->with('error', 'Data gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Masyarakat::findOrFail($id);
        return view('admin.pages.masyarakat.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Masyarakat::findOrFail($id);
        return view('admin.pages.masyarakat.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $masyarakat = Masyarakat::findOrFail($id);

        $request->validate([
            'nik' => ['required','numeric',Rule::unique('masyarakats','nik')->ignore($id)],
            'name' => 'required|max:225',
            'email' => ['required','email',Rule::unique('users','email')->ignore($masyarakat->user->id)],
            // 'password' => 'required|min:6|confirmed',
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
            return redirect()->route('masyarakats.index')->with('success', 'Data berhasil diupdate');
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollback();
            return redirect()->route('masyarakats.index')->with('error', 'Data gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $masyarakat = Masyarakat::findOrFail($id);

        DB::beginTransaction();
        try {
            $masyarakat->user->delete();
            
            DB::commit();
            if($masyarakat->user->image){
                Storage::disk('public')->delete($masyarakat->user->image);
            }
            return redirect()->route('masyarakats.index')->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->route('masyarakats.index')->with('error', 'Data gagal dihapus');
        }
    }
}
