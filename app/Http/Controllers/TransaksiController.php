<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Transaksi_Produksi;
use App\Models\Lokasi;
use App\Models\Item;


class TransaksiController extends Controller
{
    public function index(){
    	$lokasi = Lokasi::all();
    	$item = Item::all();
    	
    	return view('transaksi.input', ['item'=>$item, 'lokasi'=>$lokasi]);
    }

    public function store(Request $request){
    	$validated = $request->validate([
           'qty' => 'required',
       ]);

    	// return response()->json($request->qty);
    	$NPK = $request->session()->get('NPK');//mendapatkan NPK dari session karyawan yang login
    	
    	$transaksi = new Transaksi_Produksi;
    	$transaksi->NPK = $NPK;
    	$transaksi->kode = $request->item;
    	$transaksi->lokasi = $request->lokasi;
    	$transaksi->qty_actual = $request->qty;
    	$transaksi->save();


    	// return response()->json(true);
    	return redirect('/transaksi')->with('status', 'Data berhasil ditambahkan');
    }

    public function tampil(Request $request){
    	$lokasi = Lokasi::all();
        
        $transaksi = DB::table('transaksi_produksi')
            ->join('master_item', 'transaksi_produksi.kode', '=', 'master_item.kode')
            ->join('master_karyawan', 'transaksi_produksi.NPK', '=', 'master_karyawan.NPK')
            ->join('master_lokasi', 'transaksi_produksi.lokasi', '=', 'master_lokasi.kode')
            ->select(
                'transaksi_produksi.tanggal_transaksi as tanggal',
                'transaksi_produksi.qty_actual as qty',
                'master_lokasi.nama_lokasi as lokasi',
                'master_karyawan.nama as karyawan',
                'master_item.nama_item as item'
            );


        if($request->input('lokasi')!=null){
            $transaksi = $transaksi->where('master_lokasi.kode', $request->lokasi)->get();        
        }else{
            $transaksi = $transaksi->get();
        }
        if($request->ajax()){
            return Datatables()->of($transaksi)
            ->make();
        }

        return view('transaksi.index', ['transaksi'=>$transaksi, 'lokasi'=>$lokasi]);
    }
}
