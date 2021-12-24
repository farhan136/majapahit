@extends('welcome')
@section('judul', 'Index Transaksi')
@section('navbar')
@include('navbar')
@endsection
@section('konten')
@if (session('status'))
<div class="alert alert-success">
	{{ session('status') }}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif
<div class="card">
	<div class="card-header">
		Transaksi Produksi
	</div>
	<div class="card-body">

		<form method="post" id="tambah-transaksi" action="{{url('/store')}}">
			@csrf
			<div class="form-group">
				<label for="tanggal">Tanggal</label>
				<input type="text" class="form-control" id="tanggal" readonly name="tanggal">
			</div>
			<div class="form-group">
				<label for="lokasi">Lokasi</label>
				<select class="form-control" id="lokasi" name="lokasi">
					@foreach($lokasi as $val)
					<option value="{{$val->kode}}">{{$val->nama_lokasi}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="item">Item</label>
				<select class="form-control" id="item" name="item">
					@foreach($item as $val)
					<option value="{{$val->kode}}">{{$val->nama_item}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="qty">Qty</label>
				<input type="number" class="form-control" id="qty" name="qty" required>
			</div>
			<button type="submit" class="btn btn-primary" id="submit-transaksi">Submit</button>
		</form>

	</div>
</div>
@endsection

@section('script')
<script>
	$(document).ready(function() {
		let tanggal = new Date().toUTCString();
		let token = $("meta[name='csrf-token']").attr("content");
		$('#tanggal').val(tanggal)

	} );


</script>
@endsection

