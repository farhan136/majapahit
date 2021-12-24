<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Karyawan;

class KaryawanSeeder extends Seeder
{
    public function run()
    {
        $karyawan = [
        	[
        		"npk" => "10001",
        		"nama" => "Agus",
        		"alamat" => "Jakarta"
        	],
        	[
        		"npk" => "10002",
        		"nama" => "Bejo", 
        		"alamat" => "Depok"
        	],
        	[
        		"npk" => "10003",
        		"nama" => "Cecep",
        		"alamat"=> "Bandung"
        	]
        ];
        foreach ($karyawan as $i) {
        	$karyawan = new karyawan();
        	$karyawan->NPK = $i['npk'];
        	$karyawan->nama = $i['nama'];
        	$karyawan->alamat = $i['alamat'];
        	$karyawan->save();
        }
    }
}
