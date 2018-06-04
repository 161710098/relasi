@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Keluarga  
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama Kepala Keluarga</label>	
			  			<input type="text" name="nama_kepala_keluarga" class="form-control" value="{{ $k->nama_kepala_keluarga }}"  readonly>
			  		</div>

        			<div class="form-group">
			  			<label class="control-label">Alamat</label>	
			  			<input type="text" name="alamat" class="form-control" value="{{ $k->alamat }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Agama</label>	
			  			<input type="text" name="agama" class="form-control" value="{{ $k->agama }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">No Telepon</label>	
			  			<input type="text" name="no_telepon" class="form-control" value="{{ $k->no_telepon }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Nama Pengantin</label>	
			  			<input type="text" name="id_pengantin" class="form-control" value="{{ $k->Pengantin->nama_mempelai_pria }} Dan {{ $k->Pengantin->nama_mempelai_wanita }}"  readonly>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection