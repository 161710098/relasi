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
			  <div class="panel-heading">Data Organizer
			  	<div class="panel-title pull-right"><a href="{{ route('organizer.create') }}">Tambah</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
					  <th>Nama Paket</th>
					  <th>Harga</th>
					  <th>Email</th>
					  <th>No Telepon</th>
					  <th>Nama Pengantin</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($a as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td>{{ $data->nama_paket }}</td>
				    	<td>Rp.{{ $data->harga }}</td>
				    	<td>{{ $data->email }}</td>
				    	<td>{{ $data->no_telepon }}</td>
				    	<td>@foreach($data->Pengantin as $p)<li>{{ $p->nama_mempelai_pria }} Dan {{ $p->nama_mempelai_wanita }}@endforeach</li></td>
<td>
	<a class="btn btn-warning" href="{{ route('organizer.edit',$data->id) }}">Edit</a>
</td>
<td>
	<a href="{{ route('organizer.show',$data->id) }}" class="btn btn-success">Show</a>
</td>
<td>
	<form method="post" action="{{ route('organizer.destroy',$data->id) }}">
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