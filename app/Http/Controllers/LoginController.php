<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){
    	return view('login.login');
    }

    public function loginstore(Request $request){
    	$validated = $request->validate([
	        'email' => 'required|email',
	        'password' => 'required|max:255'
	    ]);
    	$karyawan = Karyawan::where('email', $request->email)->firstOrFail();
    	
	    if ($karyawan) {
	    	
	    	if (Hash::check($request->password, $karyawan->password)) {
	    		session(['berhasil' => true, 'nama'=>$karyawan->nama, 'NPK'=>$karyawan->NPK]);
	    		return redirect('/transaksi')->with('status', 'Anda berhasil login');
	    	}
	    	return redirect('/')->with('status', 'Password tidak sesuai');	
	    }
    	return redirect('/')->with('status', 'Email tidak sesuai');
    }

    public function register(){
    	return view('login.register');
    }

    public function registerstore(Request $request){
    	$validated = $request->validate([
	        'nama' => 'required|max:255',
	        'email' => 'required|unique:master_karyawan|email|max:255',
	        'alamat' => 'required|max:10',
	        'password' => 'required|max:255',
	        'password2' => 'required|max:255'
	    ]);


    	if($request->password == $request->password2){ //memastikan apakah konfirmasi passwornya benar
    		do {
    			//generate kode dan melakukan perulangan agar tidak ada duplikat di db
	    		$random = rand(1000,9999);
	    		$kode = "K".$random;	
    		} while (Karyawan::where('NPK', $kode)->get()->isNOtEmpty());

    		$karyawan = new Karyawan();

	    	$karyawan->nama = $request->nama;
	    	$karyawan->email = $request->email;
	    	$karyawan->alamat = $request->alamat;
	    	$karyawan->NPK = $kode;
	    	$karyawan->password = bcrypt($request->password);
	    	$karyawan->save();

	    	return redirect('/')->with('status', 'Data berhasil ditambahkan, silahkan login');	
    	}else{
    		return redirect('/register')->with('status', 'Password tidak sesuai');
    	}
    	
    }

    public function logout(Request $request){
    	$request->session()->forget('berhasil');

    	return redirect('/');
    }
}
