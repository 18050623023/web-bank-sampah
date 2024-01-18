@extends('layouts.master')

@section('title', 'Edit Lokasi')

@section('conten')

    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Edit Data TPS</h6>
            <hr />
            <div class="card border-top border-0 border-4 border-info">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-info"></i>
                            </div>
                            <h5 class="mb-0 text-info">Edit Data TPS</h5>
                        </div>
                        <hr />
                        <form method="POST" action="/admin/updatelokasi" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3" hidden>
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">id lok</label>
                                <div class="col-sm-9">
                                    <input type="text" name="id_lok" class="form-control" id="inputEnterYourName"
                                        value="{{ $lokasi->id }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Teller</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="teller">
                                        <option value="0">-Pilih Teller-</option>
                                        @foreach ($users as $usr)
                                            @if ($lokasi->teller_id == $usr->id)
                                                <option value="{{ $usr->id }}" selected>{{ $usr->name }}</option>
                                            @else
                                                <option value="{{ $usr->id }}">{{ $usr->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Nama TPS</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_bank" class="form-control" id="inputEnterYourName"
                                        value="{{ $lokasi->nama_bank }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEnterYourName" class="col-sm-3 col-form-label">Tanggal Bergabung</label>
                                <div class="col-sm-9">
                                    <input type="date" name="tgl_bergabung" class="form-control" id="inputEnterYourName"
                                        value="{{ $lokasi->tgl_bergabung }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Latitude</label>
                                <div class="col-sm-9">
                                    <input type="text" name="lat" class="form-control" id="inputEmailAddress2"
                                        value="{{ $lokasi->lat }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Longitude</label>
                                <div class="col-sm-9">
                                    <input type="text" name="long" class="form-control" id="inputEmailAddress2"
                                        value="{{ $lokasi->long }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <input type="text" name="alamat" class="form-control" id="inputEmailAddress2"
                                        value="{{ $lokasi->alamat }}" placeholder="Alamat Lengkap">
                                </div>
                            </div>
                            <div class="row mb-3 ">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Harga Jasa</label>
                                <div class=" input-group " style="width: 75%; flex: 0 0 auto;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Rp</span>
                                    </div>
                                    <input type="text" name="harga" class="form-control" id="inputEmailAddress2"
                                        value="{{ $lokasi->harga }}" placeholder="Harga Jasa TPS">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Dokumen</label>
                                <div class="col-sm-9">
                                    <iframe src="{{ url('/document/' . $lokasi->path) }}" frameborder="0"width="100%"></iframe>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Perbarui Dokumen</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="file" name="file"
                                        autocomplete="file">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-info px-5">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
