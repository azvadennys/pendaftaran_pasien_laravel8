<?php

namespace App\Http\Controllers;

use App\Models\Jadwal_dokter;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DokterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'users' => Users::where('role', 'dokter')->get(),
        ];

        return view('dokterindex', $data);
    }
    public function tambah()
    {
        $data = [];

        return view('dokterregister', $data);
    }
    public function insert(Request $request)
    {
        // dd($request);
        Users::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect()->back()->with('success', 'Berhasil ditambah');
    }
    public function delete($id)
    {
        // dd($request);
        Users::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Berhasil hapus');
    }
    public function edit($id)
    {
        // dd($request);

        $data = [
            'user' =>  Users::where('id', $id)->first(),
        ];

        return view('dokteredit', $data);
    }
    public function update(Request $request)
    {
        // dd($request);
        if ($request->password != NULL) {
            Users::where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
        } else {
            Users::where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
            ]);
        }
        return redirect()->back()->with('success', 'Berhasil edit');
    }

    public function jadwal(Request $request, $id)
    {
        // dd($request);
        if ($request->jadwal == NULL) {
            Jadwal_dokter::where('user_id', $id)->delete();
        } else {
            Jadwal_dokter::where('user_id', $id)->delete();
            Jadwal_dokter::create([
                'user_id' => $id,
                'hari' => implode(',', $request->jadwal),
            ]);
        }

        return redirect()->back()->with('success', 'Berhasil update');
    }
}
