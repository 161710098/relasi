@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="row">
	<div class="container-fluid">
	<div class="row">
	<div class="col-md-2">
	<!--nav-->
				@include('layouts.dashboard')
			<!--end nav-->
	</div>
	<div class="col-md-10">
			<div class="panel panel-primary">
			  <div class="panel-heading">Data Pengantin
			  	<div class="panel-title pull-right"><a href="{{ route('pengantin.create') }}">Tambah</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
					  <th>Nama Mempelai Pria</th>
					  <th>Nama Mempelai Wanita</th>
					  <th>Tanggal Pernikahan</th>
					  <th>No Telepon</th>
					  <th>Organizer</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($p as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td>{{ $data->nama_mempelai_pria }}</td>
				    	<td><p>{{ $data->nama_mempelai_wanita }}</p></td>
				    	<td><p>{{ $data->tanggal_pernikahan }}</p></td>
				    	<td><p>{{ $data->no_telepon }}</p></td>
				    	<td><p>{{ $data->Organizer->email }}</p></td>
						<td>
							<a class="btn btn-warning" href="{{ route('pengantin.edit',$data->id) }}">Edit</a>
						</td>
						<td>
							<a href="{{ route('pengantin.show',$data->id) }}" class="btn btn-success">Show</a>
						</td>
						<td>
							<form method="post" action="{{ route('pengantin.destroy',$data->id) }}">
								<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<input type="hidden" name="_method" value="DELETE">

								<button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Delete</button>
							</form>
						</td>
				      </tr>
				      @endforeach	
				  	</tbody>
				  </table>
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection