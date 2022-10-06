<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::belumkembali()->latest()->with('programstudi')->get();
        return view('dashboard.pengembalian', compact('peminjaman'));
    }

    public function create()
    {
        return view('dashboard.peminjaman');
    }

    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Ujung_Pandang');

        $validate = $request->validate([
            'prodi' => 'required|integer',
            'kode_infocus' => 'required|integer|min:1|max:5',
            'matakuliah' => 'required|string',
            'dosen' => 'required|string|max:100',
            'ruang' => 'required|string|max:100',
            'nama' => 'required|string|max:50',
            'stambuk' => 'required|string|max:15',
        ]);

        $validate['waktu_peminjaman'] = date('Y-m-d H:i:s');
        $validate['matakuliah'] = strtolower($request->matakuliah);
        $validate['dosen'] = strtolower($request->dosen);
        $validate['nama'] = strtolower($request->nama);
        $validate['stambuk'] = strtolower($request->stambuk);

        Peminjaman::create($validate);

        return redirect('/pengembalian')->with('success', 'Berhasil Meminjam Infocus.');
    }

    public function history()
    {
        $peminjaman = Peminjaman::sudahkembali()->latest()->paginate(4);
        return view('dashboard.riwayat', compact('peminjaman'));
    }

    public function update(Request $request)
    {
        date_default_timezone_set('Asia/Ujung_Pandang');

        $validate = $request->validate([
            'id' => 'required|integer',
            'item_infocus' => 'required|string',
            'item_power' => 'nullable|string',
            'item_hdmi' => 'nullable|string',
            'item_cok' => 'nullable|string',
            'item_penyangga' => 'nullable|string'
        ]);

        $validate['status'] = 1;
        $validate['waktu_pengembalian'] = date('Y-m-d H:i:s');;
        // $validate['item_infocus'] = 1;
        // $validate['item_power'] = 1;
        // $validate['item_hdmi'] = 1;
        // $validate['item_cok'] = 1;
        // $validate['item_penyangga'] = 1;

        Peminjaman::where('id' , $request->id)->update($validate);

        return redirect('/riwayat')->with('success', 'Berhasil Mengembalikan Infocus.');
    }
}
