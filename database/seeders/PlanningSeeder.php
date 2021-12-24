<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Planning;

class PlanningSeeder extends Seeder
{
    public function run()
    {
        $planning = [
        	[
        		"kode" => "M001",
        		"qty_target" => 5,
        		"waktu_target" => 10
        	],
        	[
        		"kode" => "M002",
        		"qty_target" => 5,
        		"waktu_target" => 10
        	],
        	[
        		"kode" => "M003",
        		"qty_target" => 10,
        		"waktu_target" => 15
        	],
        	[
        		"kode" => "M004",
        		"qty_target" => 20,
        		"waktu_target" => 20
        	],
        ];
        foreach ($planning as $i) {
        	$planning = new Planning();
        	$planning->kode = $i['kode'];
        	$planning->qty_target = $i['qty_target'];
        	$planning->waktu_target = $i['waktu_target'];
        	$planning->save();
        }
    }
}
