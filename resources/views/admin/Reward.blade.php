@extends('layouts.master')

@section('title','Reward')

@section('conten')

<h6 class="mb-0 text-uppercase">Reward Point</h6>
		<hr/>
		<div class="card">
			<div class="card-body">
				<a href="{{ url('admin/addreward') }}" class="btn btn-primary">+Tambah Reward</a></br></br>
							<div class="table-responsive">
								<table id="example2" class="table table-striped table-bordered">
									<thead>
										<tr>
											<th>No</th>
                                            {{-- <th>ID</th> --}}
											<th>Name Reward</th>
											<th>Point Reedem</th>
                                            <th>Keterangan</th>
                                            <th>Barcode</th>
                                            <th>Voucher</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									@php($i = 1)
                					@foreach($reward as $reward)
										<tr>
											<td>{{ $i++ }}</td>
                                            {{-- <th>{{$rew->id}}</th> --}}
											<td>{{$reward->name}}</td>
											<td>{{$reward->point}} point</td>
                                            <td>{{$reward->keterangan}}</td>
                                            <td>{!! DNS1D::getBarcodeHTML("$reward->product_code",'UPCA',2,50) !!}
                                            P - {{ $reward->product_code }}
                                            </td>
                                            <td><a href="{{url('/')}}/document/{{ $reward->path }}" target="__blank">{{ $reward->path }}</a></td>
											<td>
												<a href="/admin/{{$reward->id}}/editreward" class="btn btn-primary">Edit</a>
												<a href="/admin/dellreward/<?php echo $reward->id ?>" class="btn btn-primary">Delete</a>
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
					</div>
			</div>
		</div>

@endsection
