@extends('layouts.master')

@section('title', 'Setoran')

@section('conten')

    <?php if(auth()->user()->type == 'Admin'||auth()->user()->type == 'Teller'){ $no=0; ?>
    <h6 class="mb-0 text-uppercase">Status Setoran</h6>
    <hr />

    {{-- {{var_dump($setoran)}} --}}
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                {{-- {{ dd($setoran) }} --}}
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Bank</th>
                            <th>Nama Penyetor</th>
                            <th>Alamat</th>
                            <th>Berat Sampah</th>
                            <th>Status</th>
                            <th>Petugas</th>
                            <th>Action</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($setoran as $stor)
                            <?php $no++; ?>
                            <tr>
                                <td>{{ $stor->databank->nama_bank }}</td>
                                <td>{{ $stor->nasabah->nama_nasabah }}</td>
                                <td>{{ $stor->nasabah->alamat }}</td>
                                <td>{{ $stor->jml_tab_pergram }}</td>
                                <td>
                                    @if ($stor->status == 1)
                                        <span class="badge bg-success">Accept</span>
                                    @elseif ($stor->status == 2)
                                        <span class="badge bg-danger">Cencel</span>
                                    @else
                                        <span class="badge bg-warning">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="" method="post" id="setoran{{ $no }}">
                                        <input type="hidden" name="id" value="{{ $stor->id }}">
                                        <input type="hidden" name="total_tabungan" value="{{ $stor->total_tabungan }}">
                                        @csrf
                                        <select class="form-control" name="petugas">
                                            @if ($stor->tabungan->petugas_id)
                                                @foreach ($pegawai as $petugas)
                                                    @if ($petugas->id == $stor->tabungan->petugas_id)
                                                        <option value="{{ $petugas->id }}" selected>
                                                            {{ $petugas->nama_pegawai }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $petugas->id }}" disabled>
                                                            {{ $petugas->nama_pegawai }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            @else
                                                <option value="0">-Pilih Petugas-</option>
                                                @foreach ($pegawai as $petugas)
                                                    <option value="{{ $petugas->id }}">
                                                        {{ $petugas->nama_pegawai }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    @if ($stor->status == 0)
                                        <button
                                            onclick="confirmSetoran('/admin/updatesetoran/1','Yakin Accept Setoran?',{{ $no }})"
                                            class="btn btn-success">
                                            <i class="bx bx-check" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Accept">
                                            </i>
                                        </button>
                                        <button
                                            onclick="confirmSetoran('/admin/updatesetoran/2','Yakin Cencel Setoran?',{{ $no }})"
                                            class="btn btn-danger">
                                            <i class="bx bx-x" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Cencel"></i>
                                        </button>
                                    @elseif ($stor->status == 1)
                                        <button
                                            onclick="confirmSetoran('/admin/updatesetoran/2','Yakin Cencel Setoran?',{{ $no }})"
                                            class="btn btn-danger">
                                            <i class="bx bx-x" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Cencel"></i>
                                        </button>
                                    @else
                                        <button
                                            onclick="confirmSetoran('/admin/updatesetoran/1','Yakin Accept Setoran?',{{ $no }})"
                                            class="btn btn-success">
                                            <i class="bx bx-check" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Accept"></i>
                                        </button>
                                    @endif
                                </td>
                                <td>
                                    <button onclick="confirmSetoran('','Yakin Accept Setoran?',{{ $no }})"
                                        class="btn btn-secondary">
                                        <i class="bx bx-trash" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            title="Delete"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br><br>
    <?php } ?>
    <h6 class="mb-0 text-uppercase">Nasahab Mall</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Nama Pemiilik Mall</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nasabah as $nas)
                            <tr>
                                <td>{{ $nas->nik }}</td>
                                <td>{{ $nas->nama_nasabah }}</td>
                                <td>
                                    <a href="/admin/{{ $nas->id }}/pilihnasabah" class="btn btn-primary">Pilih</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
