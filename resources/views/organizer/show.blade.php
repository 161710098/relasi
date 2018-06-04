@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Organizer 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama Paket</label>	
			  			<input type="text" name="nama_paket" class="form-control" value="{{ $a->nama_paket }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Harga</label>	
			  			<input type="text" name="harga" class="form-control" value="{{ $a->harga }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Email</label>	
			  			<input type="text" name="email" class="form-control" value="{{ $a->email }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">No Telepon</label>	
			  			<input type="text" name="no_telepon" class="form-control" value="{{ $a->no_telepon }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Nama Pengantin Pria</label>	
			  			<textarea rows="10" class="form-control" readonly>@foreach($a->Pengantin as $data)
			  				-> {{ $data->nama_mempelai_pria }} Dan {{ $data->nama_mempelai_wanita }}
			  				@endforeach
			  			</textarea> 
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection