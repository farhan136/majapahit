@extends('welcome')
@section('judul', 'Index Transaksi')

@section('navbar')
@include('navbar')
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
@endsection

@section('konten')

<div class="card">
	<div class="card-header">
		Transaksi Produksi
	</div>
	<div class="card-body">
		<form method="get" id="filter">
			@csrf
			
			<div class="form-group">
				<label for="lokasi">Lokasi</label>
				<select class="form-control" id="lokasi" name="lokasi">
					<option value="" selected>Pilih Lokasi</option>
					@foreach($lokasi as $val)
					<option value="{{$val->kode}}">{{$val->nama_lokasi}}</option>
					@endforeach
				</select>
			</div>
			<button type="submit" class="btn btn-success" id="submit-filter">Submit</button>
		</form>
		<br><br><br>
		<div class="ganti-ajax">
			<table class="table table-striped table-bordered" id="example">
				<thead>
					<tr>
						<th>Tanggal</th>
						<th>Nama Item</th>
						<th>Nama Lokasi</th>
						<th>Quantity</th>
						<th>Pembuat</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
@endsection

@push('scripttambahan')
<script>
	$(document).ready(function() {
		console.log("mantap")
		let token = $("meta[name='csrf-token']").attr("content");
		let lokasi = $('#lokasi').val()
		// let tanggal = new Date($('#tanggal').val());


		const tabel = $('#example').DataTable({
			serverSide: true,
			processing: true,
			ajax: {
				url:  "{{url('/tampilan')}}",
				type: "get",
				data : function(d){ //untuk mengirim data ke controller, nanti ngambilnya dengan $request->input('lokasi')
		        d.lokasi = lokasi
		        return d
		        },
			},
			autowidth : true,
			columns:[
			{ data :"tanggal", name: "tanggal"},
			{ data :"item", name: "item"},
			{ data :"lokasi", name: "lokasi"},
			{ data :"qty", name: "qty"},
			{ data :"karyawan", name: "karyawan"},
			],
		});


		$('#filter').on("submit", function(e){
			e.preventDefault()
			lokasi = $('#lokasi').val()
			console.log(lokasi)
			tabel.ajax.reload(null, false) //setiap kali filter berubah maka tabelnya reload
		})

	} );


</script>
@endpush

