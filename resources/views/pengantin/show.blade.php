@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Pengantin 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama Mempelai Pria</label>	
			  			<input type="text" name="nama_mempelai_pria" class="form-control" value="{{ $p->nama_mempelai_pria }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Nama Mempelai Wanita</label>
						<input type="text" name="nama_mempelai_wanita" class="form-control" value="{{ $p->nama_mempelai_wanita }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Tanggal Pernikahan</label>
						<input type="text" name="tanggal_pernikahan" class="form-control" value="{{ $p->tanggal_pernikahan }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">No Telepon</label>
						<input type="text" name="no_telepone" class="form-control" value="{{ $p->no_telepon }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Organizer</label>
						<input type="text" name="id_organizer" class="form-control" value="{{ $p->Organizer->email }}"  readonly>
			  		</div>
			  		<div class="form-group">
                    <strong>Pesanan</strong><br>@foreach($p->Pesanan as $data){{ $data->total_pesanan }}, @endforeach

			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection