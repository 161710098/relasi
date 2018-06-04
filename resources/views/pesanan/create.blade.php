@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Tambah Data Pesanan 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('pesanan.store') }}" method="post" >
			  		{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('total_pesanan') ? ' has-error' : '' }}">
			  			<label class="control-label">Total Pesanan</label>	
			  			<input type="text" name="total_pesanan" class="form-control"  required>
			  			@if ($errors->has('total_pesanan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('total_pesanan') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('uang_muka') ? ' has-error' : '' }}">
			  			<label class="control-label">Uang Muka</label>	
			  			<input type="text" name="uang_muka" class="form-control"  required>
			  			@if ($errors->has('uang_muka'))
                            <span class="help-block">
                                <strong>{{ $errors->first('uang_muka') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('sisa_bayar') ? ' has-error' : '' }}">
			  			<label class="control-label">Sisa Bayar</label>	
			  			<input type="text" name="sisa_bayar" class="form-control"  required>
			  			@if ($errors->has('sisa_bayar'))
                            <span class="help-block">
                                <strong>{{ $errors->first('sisa_bayar') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('tanggal_pesan') ? ' has-error' : '' }}">
			  			<label class="control-label">Tanggal Pesan</label>	
			  			<input type="text" name="tanggal_pesan" class="form-control"  required>
			  			@if ($errors->has('tanggal_pesan'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tanggal_pesan') }}</strong>
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