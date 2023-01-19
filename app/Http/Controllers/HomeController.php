<?php

namespace App\Http\Controllers;

use App\Models\Jadwal_dokter;
use App\Models\pengajuan_jadwal;
use App\Models\Users;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role == 'dokter') {
            $jadwal = Jadwal_dokter::where('user_id', auth()->user()->id)->first();
            if ($jadwal != NULL) {

                $data['jadwal'] = explode(',', $jadwal->hari);
            } else {
                $data['jadwal'] = NULL;
            }
        } else if (auth()->user()->role == 'pasien') {
            $data['dokter'] = Users::with('jadwal')->where('role', 'dokter')->get();
            $data['pengajuan'] = pengajuan_jadwal::with('pasien', 'dokter')->where('id_pasien', auth()->user()->id)->orderby('jadwal', 'DESC')->get();
        };
        $data['hari'] = Jadwal_dokter::where('user_id', auth()->user()->id)->first();
        // $data = [];
        // dd($data);
        if (auth()->user()->role == 'admin') {
            return redirect()->to('/dokter');
        }
        return view('home', $data);
    }
    public function buatjadwal($id)
    {
        $data['dokter'] = Users::with('jadwal')->where('id', $id)->first();
        return view('pengajuanjadwal', $data);
    }
    public function insertjadwal(Request $request)
    {
        pengajuan_jadwal::create([
            'id_dokter' => $request->id_dokter,
            'id_pasien' => auth()->user()->id,
            'jadwal' => $request->tanggal,
        ]);
        return redirect()->to('/home')->with('success', 'Berhasil ditambah');
    }

    public function cetak($id)
    {
        $data['pengajuan_jadwal'] = pengajuan_jadwal::with('pasien', 'dokter')->where('id', $id)->first();
        return view('cetak', $data);
    }
}
