<?php

namespace Database\Seeders;

use App\Models\kota;
use App\Models\provinsi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $daftarProvinsi = RajaOngkir::provinsi()->all();
        foreach($daftarProvinsi as $provinceRow) {
            provinsi::create([
                'id_provinsi' => $provinceRow['province_id'],
                'nama' => $provinceRow['province'],
            ]);
            $daftarKota = RajaOngkir::kota()->dariProvinsi($provinceRow['province_id'])->get();
            foreach ($daftarKota as $cityRow) {
            kota::create([
                'id_kota' => $cityRow['city_id'],
                'id_provinsi' => $cityRow['province_id'],
                'nama' => $cityRow['city_name'],
            ]);
            }
        }
    }
}
