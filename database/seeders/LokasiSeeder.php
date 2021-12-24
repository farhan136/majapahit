<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lokasi;

class LokasiSeeder extends Seeder
{
    public function run()
    {
        $lokasi = [
        	[
        		"kode" => "L001",
        		"nama" => "Cawang"
        	],
        	[
        		"kode" => "L002",
        		"nama" => "Cijantung"
        	],
        	[
        		"kode" => "L003",
        		"nama" => "Pasar Minggu"
        	],
        	[
        		"kode" => "L004",
        		"nama" => "Pasar Rebo"
        	],
        	[
        		"kode" => "L005",
        		"nama" => "Salemba"
        	],
        	[
        		"kode" => "L006",
        		"nama" => "Lenteng Agung"
        	]
        ];
        foreach ($lokasi as $i) {
        	$lokasi = new Lokasi();
        	$lokasi->kode = $i['kode'];
        	$lokasi->nama_lokasi = $i['nama'];
        	$lokasi->save();
        }
    }
}
