@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Data Pengantin 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('pengantin.update',$p->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama_mempelai_pria') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Mempelai Pria</label>	
			  			<input type="text" name="nama_mempelai_pria" class="form-control" value="{{ $p->nama_mempelai_pria }}" required>
			  			@if ($errors->has('nama_mempelai_pria'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_mempelai_pria') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('nama_mempelai_wanita') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Mempelai Wanita</label>	
			  			<input type="text" value="{{ $p->nama_mempelai_wanita }}" name="nama_mempelai_wanita" class="form-control"  required>
			  			@if ($errors->has('nama_mempelai_wanita'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_mempelai_wanita') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('tanggal_pernikahan') ? ' has-error' : '' }}">
			  			<label class="control-label">Tanggal Pernikahan</label>	
			  			<input type="text" value="{{ $p->tanggal_pernikahan }}" name="tanggal_pernikahan" class="form-control"  required>
			  			@if ($errors->has('tanggal_pernikahan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tanggal_pernikahan') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('no_telepon') ? ' has-error' : '' }}">
			  			<label class="control-label">No Telepon</label>	
			  			<input type="text" value="{{ $p->no_telepon }}" name="no_telepon" class="form-control"  required>
			  			@if ($errors->has('no_telepon'))
                            <span class="help-block">
                                <strong>{{ $errors->first('no_telepon') }}</strong>
                            </span>
                        @endif
			  		</div>


			  		<div class="form-group {{ $errors->has('id_organizer') ? ' has-error' : '' }}">
			  			<label class="control-label">Organizer</label>	
			  			<select name="id_organizer" class="form-control">
			  				@foreach($o as $data)
			  				<option value="{{ $data->id }}" {{ $selectedo == $data->id ? 'selected="selected"' : '' }} >{{ $data->email }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('id_organizer'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_organizer') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group {{ $errors->has('pesanan') ? ' has-error' : '' }}">
			  			<label class="control-label">Pesanan</label>	
			  			<select name="pesanan[]" class="form-control js-example-basic-multiple" multiple="multiple">
			  				@foreach($ps as $data)
			  				<option value="{{ $data->id }}"{{ (in_array($data->id, $selected)) ? ' selected="selected"' : '' }}>{{ $data->pesanan }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('pesanan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pesanan') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Simpan</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection