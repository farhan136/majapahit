@extends('welcome')
@section('judul', 'Login Karyawan')
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
		Login
	</div>
	<div class="card-body">
		<form method="post" action="{{url('/login')}}">
			@csrf
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" name="email">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" name="password">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
			<a href="{{url('/register')}}">Belum punya akun?</a>
		</form>
	</div>
</div>
@endsection