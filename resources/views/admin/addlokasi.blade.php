@extends('layouts.master')

@section('title','Lokasi')

@section('conten')

		<div class="row">
					<div class="col-xl-9 mx-auto">
						<h6 class="mb-0 text-uppercase">Tambah Data TPS</h6>
						<hr/>
						<div class="card border-top border-0 border-4 border-info">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="card-title d-flex align-items-center">
										<div><i class="bx bxs-user me-1 font-22 text-info"></i>
										</div>
										<h5 class="mb-0 text-info">Tambah Data TPS</h5>
									</div>
									<hr/>
                        <form method="POST" action="{{ url('admin/storelokasi') }}" enctype="multipart/form-data">
                        @csrf
                                    @if (Auth::user()->type == 'Admin')
                                        <div class="row mb-3">
                                            <label for="inputEnterYourName" class="col-sm-3 col-form-label">Admin TPS</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="teller">
                                                        <option value="0">-Pilih Admin-</option>
                                                    @foreach($teller as $tel)
                                                        <option value="{{ $tel->id }}">{{ $tel->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    @else
                                        <input type="hidden" name="teller" value="{{Auth::user()->id}}">
                                    @endif
									<div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">Nama TPS</label>
										<div class="col-sm-9">
											<input type="text" name="nama_bank" class="form-control" id="inputEnterYourName" placeholder="Nama TPS">
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputEnterYourName" class="col-sm-3 col-form-label">Tanggal Bergabung</label>
										<div class="col-sm-9">
											<input type="date" name="tgl_bergabung" class="form-control" id="inputEnterYourName">
										</div>
									</div>
									<div class="row mb-3">
										<label for="inputEmailAddress2" class="col-sm-3 col-form-label">Latitude</label>
										<div class="col-sm-9">
											<input type="text" name="lat" class="form-control" id="inputEmailAddress2" placeholder="Latitude">
										</div>
									</div>
                                    <div class="row mb-3">
										<label for="inputEmailAddress2" class="col-sm-3 col-form-label">Longitude</label>
										<div class="col-sm-9">
											<input type="text" name="long" class="form-control" id="inputEmailAddress2" placeholder="Longitude">
										</div>
									</div>
                                    <div class="row mb-3">
                                        <label for="inputEmailAddress2" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="alamat" class="form-control" id="inputEmailAddress2" placeholder="Alamat Lengkap">
                                        </div>
                                    </div>
                                    <div class="row mb-3 ">
										<label for="inputEmailAddress2" class="col-sm-3 col-form-label">Harga Jasa</label>
										<div class=" input-group " style="width: 75%; flex: 0 0 auto;">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                            </div>
											<input type="text" name="harga" class="form-control" id="inputEmailAddress2" placeholder="Harga Jasa TPS">
										</div>
									</div>
                                    <div class="row mb-3">
										<label for="inputEmailAddress2" class="col-sm-3 col-form-label">Dokumen</label>
										<div class="col-sm-9">
											<input type="file" class="form-control" id="file" name="file" required autocomplete="file">
										</div>
									</div>
									<div class="row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<button type="submit" class="btn btn-info px-5">simpan</button>
										</div>
									</div>
                        </form>
								</div>
							</div>
						</div>
					</div>
				</div>

@endsection
