<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    public function run()
    {
        $item = [
        	[
        		"kode" => "M001",
        		"nama" => "Bolpen"
        	],
        	[
        		"kode" => "M002",
        		"nama" => "Pensil"
        	],
        	[
        		"kode" => "M003",
        		"nama" => "Penghapus"
        	],
        	[
        		"kode" => "M004",
        		"nama" => "Spidol"
        	],
        	[
        		"kode" => "M005",
        		"nama" => "Penggaris"
        	],
        	[
        		"kode" => "M006",
        		"nama" => "Tinta Spidol"
        	],
        	[
        		"kode" => "M007",
        		"nama" => "Buku"
        	]
        ];
        foreach ($item as $i) {
        	$item = new Item();
        	$item->kode = $i['kode'];
        	$item->nama_item = $i['nama'];
        	$item->save();
        }
    }
}
