@extends('layouts.master')

@section('title','Kategori')

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
											<th>Name Reward</th>
											<th>Point Reedem</th>
                                            <th>Dockument</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									@php($i = 1)
                					@foreach($reward as $rew)
										<tr>
											<td>{{ $i++ }}</td>
											<td>{{$rew->name}}</td>
											<td>{{$rew->point}} point</td>
                                            <td><a href="{{url('/')}}/document/{{ $rew->path }}" target="__blank">{{ $rew->path }}</a></td>
											<td>
												<a href="/admin/{{$rew->id}}/editreward" class="btn btn-primary">Edit</a>
												<a href="/admin/dellreward/<?php echo $rew->id ?>" class="btn btn-primary">Delete</a>
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
					</div>
			</div>
		</div>

@endsection
