<?php

use Illuminate\Database\Seeder;

class AbsenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 9 ; $i++) { 
            # code...
            if (strlen($i) < 2) {
                # code...
                $x = '0'.$i;
            }else {
                # code...
                $x = $i;
            }
            \App\Absensi::create([
                'pegawai_id' => 5,
                'tanggal'    => '2022-04-'.$x,
                'jam_hadir'  => date("08:00:00"),
                'jam_pulang' => date("19:00:00"),
                'lama_kerja' => 8,
                'lama_lembur'=> 2,
            ]);
        }
    }
}
