<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransaksiResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Nasabah;
use App\Models\Kategorie;
use App\Models\User;
use App\Models\Storan;
use App\Models\Reward;
use App\Models\Pegawai;
use App\Models\Tabungan;
use App\Models\Databank;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

use function PHPUnit\Framework\isNull;

class TransaksiController extends Controller
{
    public function ubahStatus($status, Request $request)
    {
        $setoran = Storan::find($request->id);
        $result = $setoran->update([
            'status' => $status,
        ]);
        // var_dump($request->all());
        // dd($setoran);
        // return TransaksiResource::collection($setoran)->toArray(request());

        Tabungan::where('storan_id', $request->id)->update([
            'kredit' => $request->total_tabungan,
            'petugas_id' => $request->petugas,
        ]);

        return redirect('admin/setoran');
    }

    public function setoran(Request $request)
    {
        $nasabah = Nasabah::all();
        $pegawai = Pegawai::all();

        if (auth()->user()->type == 'Teller') {
            $setoran = Storan::whereRelation('DataBank', 'teller_id', '=', auth()->user()->id)->with(['Nasabah', 'Tabungan'])->get();
        }else {
            $setoran = Storan::with(['Nasabah', 'DataBank', 'Tabungan'])->get();
        }

        // return TransaksiResource::collection($hasil)->toArray(request());
        // dd($setoran);

        return view('admin.setoran', compact(['nasabah', 'setoran', 'pegawai']));
    }

    public function penarikan(Request $request)
    {
        $nasabah = Nasabah::all();
        return view('admin.penarikan', compact('nasabah'));
    }

    public function  setoranNasabahOld()
    {
        $user_id = Auth::user()->id;
        $nasabah = Nasabah::Where('user_id', $user_id)->first();
        // var_dump($nasabah);
        if (empty($nasabah)) {
            return redirect('/admin/addnasabah')->with('alert-nasabah', 'Buat tabungan terlebih dahulu');
        } else {
            $user_id = $nasabah->user_id;
            $kategori = Kategorie::all();
            $petugas = Pegawai::all();
            $lokasi = Databank::all();
            $setoran = DB::table('storans')
                ->join('kategories', 'storans.kategori_id', '=', 'kategories.id')
                ->select('storans.*', 'kategories.kategori_sampah')
                ->where('storans.nasabah_id', '=', $user_id)
                ->get();
                // dd($setoran);
            return view('admin.pilihnasabah', compact(['nasabah', 'kategori', 'setoran', 'petugas', 'lokasi']));
        }
    }

    public function  setoranNasabah($idstoran = 0)
    {
        $user_id = Auth::user()->id;
        if (empty($id)) {
            $stor = Storan::where('nasabah_id', $user_id)->with('DataBank', 'Kategori')->orderby('id', 'desc')->get()->first();
        } else {
            $stor = Storan::where('nasabah_id', $user_id)->where('id', $id)->with('DataBank', 'Kategori')->get()->first();
        }
        $nasabah = Nasabah::Where('user_id', $user_id)->first();
        // var_dump($nasabah);
        if (empty($nasabah)) {
            return redirect('/admin/addnasabah')->with('alert-nasabah', 'Buat tabungan terlebih dahulu');
        } else {
            $user_id = $nasabah->user_id;
            $kategorie = Kategorie::all();
            $petugas = Pegawai::all();
            $lokasi = Databank::all();
            $setoran = DB::table('storans')
            ->join('kategories', 'storans.kategori_id', '=', 'kategories.id')
            ->select('storans.*', 'kategories.kategori_sampah')
            ->where('storans.nasabah_id', '=', $user_id)
                ->get();
            // dd($kategorie);
            return view('nasabah.panggilPetugas', compact(['nasabah', 'kategorie', 'setoran', 'petugas', 'lokasi', 'idstoran','stor']));
        }
    }

    public function panggilact(Request $request) {
        $requestarr = $request->all();
        $lokasi = Databank::all();


        if ($requestarr['baru']==0) {

            $nasabah_id = $request->nasabah_id;
            $user_id = $request->user_id;

            $kategori_id = $request->kategori;
            // $petugas = $request->petugas;
            $jml_tab = $request->jml_tab;

            $kategori = Kategorie::find($kategori_id);
            $harga_pergram = $kategori->harga_pergram;
            $point = $kategori->point;


            $total_tabungan = $point * $jml_tab;
            $total_harga = $harga_pergram * $jml_tab;
            $tgl_hariini = date('Y-m-d');

            $status = (isset($request->status)) ? $request->status : 0;
            $stor_id = Storan::create([
                'nasabah_id' => Auth::user()->id,
                'kategori_id' => $request->kategori,
                // 'lokasi_id' => $lokasi,
                // 'petugas_id' => $petugas,
                'alamatjemput' => $request->lokasi,
                'invoice' => 'ET'.date('ymdHis'),
                'tgl_menabung' => $tgl_hariini,
                'harga_pergram' => $harga_pergram,
                'point' => $point,
                'total_harga' => $total_harga,
                'jml_tab_pergram' => $jml_tab,
                'total_tabungan' => $total_tabungan,
                'status' => $status
            ])->id;
            if ($stor_id) {
                $tabungan_id = Tabungan::create([
                    'nasabah_id' => Auth::user()->id,
                    // 'petugas_id' => $petugas,
                    // 'lokasi_id' => $lokasi,
                    'storan_id' => $stor_id,
                    'tgl_tab' => $tgl_hariini,
                    'kredit' => $total_tabungan,
                    'debit' => 0
                ])->id;
            }
        } else {
            return "lama";
        }
        return redirect()->route('pilihtps', ['stor_id' => $stor_id, 'tabungan_id' => $tabungan_id,]);
        // return view('nasabah.pilihbank', compact(['stor_id', 'lokasi']));

    }

    public function pilihtps(Request $request) {
        $user_id = Auth::user()->id;
        if (empty($id)) {
            $stor = Storan::where('nasabah_id', $user_id)->with('DataBank', 'Kategori')->orderby('id', 'desc')->get()->first();
        } else {
            $stor = Storan::where('nasabah_id', $user_id)->where('id', $id)->with('DataBank', 'Kategori')->get()->first();
        }
        $lokasi = Databank::all();
        $stor_id = $request->stor_id;
        $tabungan_id = $request->tabungan_id;
        return view('nasabah.pilihbank', compact(['stor_id', 'tabungan_id', 'lokasi','stor']));
    }

    public function pilihtpsact($stor_id, $tabungan_id, $tps)
    {
        $stor = DB::table('storans')->where('id', $stor_id)->update([
            'lokasi_id' => $tps,
        ]);

        if ($stor) {
            DB::table('tabungans')->where('id', $tabungan_id)->update([
                'lokasi_id' => $tps,
            ]);
        }

        return redirect()->route('invoice', [$stor_id]);

    }

    public function invoice($id){

        $stor = Storan::where('id',$id)->with('DataBank','Kategori')->get()->first();
        // dd($stor);
        return view('nasabah.invoice', compact(['stor']));

    }

    public function pesanan($id = null)  {

        $user_id = Auth::user()->id;
        if (empty($id)) {
            $stor = Storan::where('nasabah_id', $user_id)->with('DataBank', 'Kategori')->orderby('id', 'desc')->get()->first();
        } else {
            $stor = Storan::where('nasabah_id', $user_id)->where('id', $id)->with('DataBank', 'Kategori')->get()->first();
        }

        $storall = Storan::where('nasabah_id', $user_id)->with('DataBank', 'Kategori')->get();
        // dd($user_id);
        return view('nasabah.pesanan', compact(['stor', 'storall']));
    }

    public function pilihnasabah($id)
    {
        $user_id = Auth::user()->id;
        $lokasi_bank = DB::table('databanks')->where('teller_id', $user_id)->first();
        $nasabah = Nasabah::find($id);
        $user_id = $nasabah->user_id;
        $kategori = Kategorie::all();
        $petugas = Pegawai::all();
        $lokasi = Databank::all();
        $setoran = DB::table('storans')
            ->join('kategories', 'storans.kategori_id', '=', 'kategories.id')
            ->select('storans.*', 'kategories.kategori_sampah')
            ->where('storans.nasabah_id', '=', $user_id)
            ->get();
        return view('admin.pilihnasabah', compact(['nasabah', 'kategori', 'setoran', 'petugas', 'lokasi', 'lokasi_bank']));
    }

    public function stortabungan(Request $request)
    {
        $nasabah_id = $request->nasabah_id;
        $user_id = $request->user_id;

        $kategori_id = $request->kategori;
        $petugas = $request->petugas;
        $jml_tab = $request->jml_tab;
        $lokasi = $request->lokasi;

        $kategori = Kategorie::find($kategori_id);
        $harga_pergram = $kategori->harga_pergram;
        $point = $kategori->point;


        $total_tabungan = $point * $jml_tab;
        $total_harga = $harga_pergram * $jml_tab;
        $tgl_hariini = date('Y-m-d');

        $status = (isset($request->status)) ? $request->status : 0;
        // var_dump($status);

        $stor_id = Storan::create([
            'nasabah_id' => $user_id,
            'kategori_id' => $kategori_id,
            'lokasi_id' => $lokasi,
            'petugas_id' => $petugas,
            'tgl_menabung' => $tgl_hariini,
            'harga_pergram' => $harga_pergram,
            'point' => $point,
            'total_harga' => $total_harga,
            'jml_tab_pergram' => $jml_tab,
            'total_tabungan' => $total_tabungan,
            'status' => $status
        ])->id;
        if ($stor_id) {
            Tabungan::create([
                'nasabah_id' => $user_id,
                'petugas_id' => $petugas,
                'storan_id' => $stor_id,
                'lokasi_id' => $lokasi,
                'storan_id' => $stor_id,
                'tgl_tab' => $tgl_hariini,
                // 'kredit' => $total_tabungan,
                'debit' => 0
            ]);
        }

        return redirect('admin/' . "{$nasabah_id}" . '/pilihnasabah');
    }

    // public function destroysetor($id)
    // {


    //     DB::table('storans')->where('id',$id)->delete();
    //     return redirect('admin/pilihnasabah');
    // }

    public function editsetoran($id)
    {
        $kategori = Kategorie::all();
        $setoran = Storan::find($id);
        $petugas = Pegawai::all();
        $lokasi = Databank::all();
        return view('admin.editsetoran', compact(['setoran', 'kategori', 'petugas', 'lokasi']));
    }

    public function updatesetoran(Request $request)
    {
        $id = $request->id_storan;
        $nasabah_id = $request->user_id;
        $petugas = $request->petugas;

        $user_id = DB::table('nasabahs')
            ->where('user_id', '=', $nasabah_id)
            ->first();

        $tab_id = DB::table('tabungans')
            ->where('nasabah_id', '=', $nasabah_id)
            ->first();

        $user = $user_id->id;
        $id_tab = $tab_id->id;

        $kategori_id = $request->kategori;
        $jml_tab = $request->jml_tab;
        $lokasi = $request->lokasi;

        $kategori = Kategorie::find($kategori_id);
        $harga_pergram = $kategori->harga_pergram;
        $point = $kategori->point;

        $total_tabungan = $point * $jml_tab;
        $total_harga = $harga_pergram * $jml_tab;
        $tgl_hariini = date('Y-m-d');

        $stor = DB::table('storans')->where('id', $id)->update([
            'nasabah_id' => $nasabah_id,
            'kategori_id' => $kategori_id,
            'lokasi_id' => $lokasi,
            'petugas_id' => $petugas,
            'tgl_menabung' => $tgl_hariini,
            'harga_pergram' => $harga_pergram,
            'point' => $point,
            'total_harga' => $total_harga,
            'jml_tab_pergram' => $jml_tab,
            'total_tabungan' => $total_tabungan
        ]);

        if ($stor) {
            DB::table('tabungans')->where('id', $id_tab)->update([
                'nasabah_id' => $nasabah_id,
                'petugas_id' => $petugas,
                'lokasi_id' => $lokasi,
                'tgl_tab' => $tgl_hariini,
                'kredit' => $total_tabungan,
                'debit' => 0
            ]);
        }

        return redirect('admin/' . "{$user}" . '/pilihnasabah');
    }

    public function penarikanuang($id)
    {
        $user_id = Auth::user()->id;
        $lokasi_bank = DB::table('databanks')->where('teller_id', $user_id)->first();

        $lokasi = Databank::all();
        $nasabah = Nasabah::find($id);
        $reward = Reward::all();
        $id = $nasabah->user_id;
        $petugas = Pegawai::all();
        $kredit = DB::table('tabungans')
            ->where('nasabah_id', '=', $id)
            ->sum('kredit');
        $debit = DB::table('tabungans')
            ->where('nasabah_id', '=', $id)
            ->sum('debit');
        $saldo = $kredit - $debit;

        $lala = DB::table('tabungans')
            ->where('tabungans.nasabah_id', '=', $id)
            ->get();

        $tarik = DB::table('tabungans')
            ->join('pegawais', 'tabungans.petugas_id', '=', 'pegawais.id')
            ->join('nasabahs', 'tabungans.nasabah_id', '=', 'nasabahs.id')
            ->join('rewards', 'tabungans.reward_id', '=', 'rewards.id')
            ->select('tabungans.*', 'pegawais.nama_pegawai', 'nasabahs.nama_nasabah', 'rewards.name', 'rewards.point', 'rewards.keterangan')
            ->where('tabungans.nasabah_id', '=', $id)
            ->get();

        return view('admin.penarikanuang', compact(['nasabah', 'lala', 'saldo', 'petugas', 'tarik', 'lokasi', 'lokasi_bank', 'reward']));
    }

    public function tarikuang(Request $request)
    {
        // $extension = $request->file('file')->extension();

        // $waktu = time();

        // $filename = $waktu.'.'.$extension;

        // $request->file('file')->move(
        //     base_path() . '/public/document/voucher/', $filename
        // );

        $nasabah_id = $request->nasabah_id;
        $user_id = $request->user_id;
        // $reward = $request->point;
        $reward = $request->reward;
        // $point = $request->point;
        $kategori_id = $request->kategori;
        $petugas = $request->petugas;
        // $jml_tab = $request->jml_tab;
        $lokasi = $request->lokasi;
        $saldo = $request->saldo;
        $tgl_hariini = date('Y-m-d');

        if ($reward > $saldo) {
            return redirect('admin/' . "{$nasabah_id}" . '/penarikanuang')->with('alert-danger', 'Saldo tidak cukup');
        } else {
            Tabungan::create([
                'nasabah_id' => $user_id,
                // 'reward_id' => $reward,
                'petugas_id' => $petugas,
                'lokasi_id' => $lokasi,
                'tgl_tab' => $tgl_hariini,
                'kredit' => 0,
                'debit' => $reward
            ]);
        }

        return redirect('admin/' . "{$nasabah_id}" . '/penarikanuang');
    }

    public function lihattabungan()
    {
        $user_id = Auth::user()->id;
        if (empty($id)) {
            $stor = Storan::where('nasabah_id', $user_id)->with('DataBank', 'Kategori')->orderby('id', 'desc')->get()->first();
        } else {
            $stor = Storan::where('nasabah_id', $user_id)->where('id', $id)->with('DataBank', 'Kategori')->get()->first();
        }

        $nasabah = DB::table('nasabahs')
            ->where('user_id', '=', $user_id)
            ->first();

        $kredit = DB::table('tabungans')
            ->where('nasabah_id', '=', $user_id)
            ->sum('kredit');
        $debit = DB::table('tabungans')
            ->where('nasabah_id', '=', $user_id)
            ->sum('debit');
        $saldo = $kredit - $debit;

        $tarik = DB::table('tabungans')
            ->where('tabungans.nasabah_id', $user_id)
            ->get();

        if ($nasabah == null) {

            return app('App\Http\Controllers\NasabahController')->addnasabah();
            // return view('admin.bukarek');
        } else {
            return view('admin.dashboarduser', compact(['nasabah', 'saldo', 'tarik','stor']));
        }
    }

    public function destroystr($id)
    {
        DB::table('storans')->where('id', $id)->delete();
        return redirect('admin/setoran');
    }

    public function rewarduser($id)
    {

        $user_id = Auth::user()->id;
        $lokasi_bank = DB::table('databanks')->where('teller_id', $user_id)->first();

        $lokasi = Databank::all();
        $nasabah = Nasabah::find($id);
        $reward = Reward::all();
        $id = $nasabah->user_id;
        $petugas = Pegawai::all();
        $kredit = DB::table('tabungans')
            ->where('nasabah_id', '=', $id)
            ->sum('kredit');
        $debit = DB::table('tabungans')
            ->where('nasabah_id', '=', $id)
            ->sum('debit');
        $saldo = $kredit - $debit;

        $lala = DB::table('tabungans')
            ->where('tabungans.nasabah_id', '=', $id)
            ->get();

        $tarik = DB::table('tabungans')
            ->join('pegawais', 'tabungans.petugas_id', '=', 'pegawais.id')
            ->join('nasabahs', 'tabungans.nasabah_id', '=', 'nasabahs.id')
            ->join('rewards', 'tabungans.reward_id', '=', 'rewards.id')
            ->select('tabungans.*', 'pegawais.nama_pegawai', 'nasabahs.nama_nasabah', 'rewards.name', 'rewards.point', 'rewards.keterangan')
            ->where('tabungans.nasabah_id', '=', $id)
            ->get();

        return view('admin.tukarpoint', compact(['nasabah', 'lala', 'saldo', 'petugas', 'tarik', 'lokasi', 'lokasi_bank', 'reward']));
        // $rewarduser = Reward::all();
        // return view('admin.tukarpoint', compact('rewarduser'));
    }

    public function viewgift($id)
    {
        $user_id = Auth::user()->id;
        if (empty($id)) {
            $stor = Storan::where('nasabah_id', $user_id)->with('DataBank', 'Kategori')->orderby('id', 'desc')->get()->first();
        } else {
            $stor = Storan::where('nasabah_id', $user_id)->where('id', $id)->with('DataBank', 'Kategori')->get()->first();
        }
        $reward = Reward::find($id);
        return view('admin.succesgift', compact(['reward', 'stor']));
        // $user_id = Auth::user()->id;
        // $user_id = Auth::user()->id;
        // $lokasi_bank = DB::table('databanks')->where('teller_id', $user_id)->first();

        // $lokasi = Databank::all();
        // $nasabah = Nasabah::find($id);
        // $reward = Reward::all();
        // $id = $nasabah->user_id;
        // $petugas = Pegawai::all();
        // $kredit = DB::table('tabungans')
        //     ->where('nasabah_id', '=', $id)
        //     ->sum('kredit');
        // $debit = DB::table('tabungans')
        //     ->where('nasabah_id', '=', $id)
        //     ->sum('debit');
        // $saldo = $kredit - $debit;

        // $lala = DB::table('tabungans')
        //     ->where('tabungans.nasabah_id', '=', $id)
        //     ->get();

        // $tarik = DB::table('tabungans')
        //     ->join('pegawais', 'tabungans.petugas_id', '=', 'pegawais.id')
        //     ->join('nasabahs', 'tabungans.nasabah_id', '=', 'nasabahs.id')
        //     ->join('rewards', 'tabungans.reward_id', '=', 'rewards.id')
        //     ->select('tabungans.*', 'pegawais.nama_pegawai', 'nasabahs.nama_nasabah', 'rewards.name', 'rewards.point', 'rewards.keterangan')
        //     ->where('tabungans.nasabah_id', '=', $id)
        //     ->get();

        // return view('admin.succesgift', compact(['nasabah', 'lala', 'saldo', 'petugas', 'tarik', 'lokasi', 'lokasi_bank', 'reward']));
    }

    public function tarikuangpoint(Request $request)
    {
        // $extension = $request->file('file')->extension();

        // $waktu = time();

        // $filename = $waktu.'.'.$extension;

        // $request->file('file')->move(
        //     base_path() . '/public/document/voucher/', $filename
        // );

        $nasabah_id = $request->nasabah_id;
        $user_id = $request->user_id;
        // $reward = $request->point;
        $reward = $request->reward;
        $id_voucher = $request->id_voucher;
        // $point = $request->point;
        $kategori_id = $request->kategori;
        $petugas = $request->petugas;
        // $jml_tab = $request->jml_tab;
        $lokasi = $request->lokasi;
        $saldo = $request->saldo;
        $tgl_hariini = date('Y-m-d');
            // dd($request->all());
        if ($reward > $saldo) {
            return redirect('admin/rewarduser/'.$nasabah_id )->with('alert-danger', 'Saldo tidak cukup');
        } else {
            Tabungan::create([
                'nasabah_id' => 4,
                // 'reward_id' => $reward,
                'petugas_id' => 1,
                'lokasi_id' => 1,
                'tgl_tab' => $tgl_hariini,
                'kredit' => 0,
                'debit' => $reward
            ]);
        }

        return redirect('admin/succesgift/' .$id_voucher);
    }

    // public  function unduhreward(Request $request)
    // {
    //     $extension = $request->file('file')->extension();

    //     $waktu = time();

    //     $filename = $waktu.'.'.$extension;

    //     $filename = base_path('uploads/image/')."$filename";
    //     return Response::download($filename);

    // }
}
