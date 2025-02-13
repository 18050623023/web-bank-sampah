<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorie;
use App\Models\Reward;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class KategoriController extends Controller
{

    public function index()
    {
        $kategori = Kategorie::all();
        return view('admin.kategori', compact('kategori'));
    }

    public function addkategori()
    {
        return view('admin.addkategori');
    }

    public function storekategori(Request $request)
    {

        Kategorie::create([
            'kategori_sampah' => $request->kategori_sampah,
            'harga_pergram' => $request->harga_pergram,
            'point' => $request->point,
            'ton' => $request->ton
        ]);

        return redirect('admin/kategori');

    }

    public function destroykategori($id)
    {
        DB::table('kategories')->where('id',$id)->delete();
        return redirect('admin/kategori');
    }

    public function editkategori($id)
    {
        $kategori = Kategorie::find($id);
        return view('admin.editkategori', compact(['kategori']));
    }

    public function updatekategori($id, Request $request)
    {
        $kategori = Kategorie::find($id);
        $kategori->update($request->except(['_token','submit']));
        return redirect('admin/kategori');
    }

    public function reward()
    {
        $reward = Reward::all();
        return view('admin.reward', compact('reward'));
    }



    public function addreward()
    {

        return view('admin.addreward');
    }

    public function storereward(Request $request)
    {
        $extension = $request->file('file')->extension();

        $waktu = time();

        $filename = $waktu.'.'.$extension;

        $request->file('file')->move(
            base_path() . '/public/document/', $filename
        );

        $number = mt_rand(1000000000,9999999999);

        if ($this->productCodeExists($number)) {
            $number = mt_rand(1000000000,999999999);
        }
        $request['product_code'] = $number;
        Reward::create([
            'name' => $request->name,
            'point' => $request->point,
            'keterangan' => $request->keterangan,
            'product_code' => $request->product_code,
            'path' => $filename


        ]);

        return redirect('admin/reward');

    }

    public function productCodeExists($number){
        return Reward::whereProductCode($number)->exists();
    }

    public function destroyreward($id)
    {
        DB::table('rewards')->where('id',$id)->delete();
        return redirect('admin/reward');
    }

    public function editreward($id)
    {
        $reward = Reward::find($id);
        return view('admin.editreward', compact('reward'));
    }

    public function updatereward($id, Request $request)
    {
        $extension = $request->file('file')->extension();

        $waktu = time();

        $filename = $waktu.'.'.$extension;

        $request->file('file')->move(
            base_path() . '/public/document/', $filename
        );

        // $number = mt_rand(1000000000,9999999999);

        // if ($this->productCodeExists($number)) {
        //     $number = mt_rand(1000000000,999999999);
        // }

        DB::table('rewards')->where('id',$id)->update([
            'name' => $request->name,
            'point' => $request->point,
            'keterangan' => $request->keterangan,
            // 'product_code' => $request->product_code,
            'path' => $filename
		]);
        return redirect('admin/reward');
    }

}
