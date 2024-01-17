<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nasabah;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class NasabahController extends Controller
{
    public function index()
    {
        $nasabah = Nasabah::all();
        return view('admin.nasabah', compact('nasabah'));
    }

    public function addnasabahold() {
        return view('admin.addnasabahold');
    }

    public function addnasabah()
    {
        $id = Auth::user()->id;
        $nasabah = DB::table('nasabahs')
        ->where('user_id', '=', $id)
        ->first();
        if($nasabah == null){
            // echo"lala";
            return view('admin.addnasabah');
        }else{
            return view('admin.bukatabungan', compact('nasabah'));
        }
    }

    public function storenasabah(Request $request)
    {
        $user_id = Auth::user()->id;

        Nasabah::create([
            'user_id' => $user_id,
            'nik' => $request->nik,
            'tgl_bergabung' => $request->tgl_bergabung,
            'nama_nasabah' => $request->nama_nasabah,
            'no_hp' => $request->no_hp,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat
        ]);

        return redirect('admin/dashboard');

    }

    public function destroynasabah($id)
    {
        DB::table('nasabahs')->where('id',$id)->delete();
        return redirect('admin/nasabah');
    }

    public function editnasabah($id)
    {
        $nasabah = Nasabah::find($id);
        return view('admin.editnasabah', compact(['nasabah']));
    }

    public function updatenasabah($id, Request $request)
    {
        $nasabah = Nasabah::find($id);
        $nasabah->update($request->except(['_token','submit']));
        return redirect('admin/addnasabah');
    }
}
