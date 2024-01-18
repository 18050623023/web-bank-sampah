<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Databank;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Pegawai::all();
        return view('admin.petugas', compact('petugas'));
    }

    public function addpetugas()
    {
        $bank = Databank::all();
        return view('admin.addpetugas', compact('bank'));
    }

    public function storepetugas(Request $request)
    {

        Pegawai::create([
            'lokasi_id' => $request->bank,
            'nama_pegawai' => $request->nama_pegawai,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat
        ]);

        return redirect('admin/petugas');

    }

    public function destroypetugas($id)
    {
        DB::table('pegawais')->where('id',$id)->delete();
        return redirect('admin/petugas');
    }

    public function editpetugas($id)
    {
        $bank = Databank::all();
        $petugas = Pegawai::find($id);
        return view('admin.editpetugas', compact(['petugas','bank']));
    }

    public function updatepetugas($id, Request $request)
    {
        $petugas = Pegawai::find($id);
        $petugas->update($request->except(['_token','submit']));
        return redirect('admin/petugas');
    }
}
