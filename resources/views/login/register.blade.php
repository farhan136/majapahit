@extends('welcome')
@section('judul', 'Register Karyawan')
@section('konten')
@if (session('status'))
<div class="alert alert-danger">
	{{ session('status') }}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif
<div class="card">
	<div class="card-header">
		Register
	</div>
	<div class="card-body">
		<form method="post" action="{{url('/register')}}">
			@csrf
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
			</div>
			@error('email')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama">
			</div>
			@error('nama')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
			<div class="form-group">
				<label for="alamat">Alamat (Kota)</label>
				<input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">
			</div>
			@error('alamat')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
			</div>
			@error('password')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
			<div class="form-group">
				<label for="password2">Konfirmasi Password</label>
				<input type="password" class="form-control @error('password2') is-invalid @enderror" id="password2" name="password2">
			</div>
			@error('password2')
			<div class="alert alert-danger">{{ $message }}</div>
			@enderror
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>
@endsection