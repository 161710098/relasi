@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Data Keluarga 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('keluarga.update',$k->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama_kepala_keluarga') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Kepala Keluarga</label>	
			  			<input type="text" name="nama_kepala_keluarga" value="{{ $k->nama_kepala_keluarga }}" class="form-control"  required>
			  			@if ($errors->has('nama_kepala_keluarga'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_kepala_keluarga') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }}">
			  			<label class="control-label">Alamat</label>	
			  			<input type="text" name="alamat" value="{{ $k->alamat }}" class="form-control"  required>
			  			@if ($errors->has('alamat'))
                            <span class="help-block">
                                <strong>{{ $errors->first('alamat') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('agama') ? ' has-error' : '' }}">
			  			<label class="control-label">Agama</label>	
			  			<input type="text" name="agama" value="{{ $k->agama }}" class="form-control"  required>
			  			@if ($errors->has('agama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('agama') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('no_telepon') ? ' has-error' : '' }}">
			  			<label class="control-label">No Telepon</label>	
			  			<input type="text" name="no_telepon" value="{{ $k->no_telepon }}" class="form-control"  required>
			  			@if ($errors->has('no_telepon'))
                            <span class="help-block">
                                <strong>{{ $errors->first('no_telepon') }}</strong>
                            </span>
                        @endif
			  		</div>


			  		<div class="form-group {{ $errors->has('id_pengantin') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Mahasiswa</label>	
			  			<select name="id_pengantin" class="form-control">
			  				@foreach($p as $data)
			  				<option value="{{ $data->id }}" {{ $selectedp == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama_mempelai_pria }} Dan {{ $data->nama_mempelai_wanita }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('id_pengantin'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_pengantin') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection