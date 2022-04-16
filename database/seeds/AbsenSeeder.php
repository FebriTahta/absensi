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
        for ($i=1; $i < 31 ; $i++) { 
            # code...
            if (strlen($i) < 2) {
                # code...
                $x = '0'.$i;
            }else {
                # code...
                $x = $i;
            }

            \App\Absensi::create([
                'pegawai_id' => 10,
                'tanggal'    => '2022-05-'.$x,
                'jam_hadir'  => date("08:00:00"),
                'jam_pulang' => date("19:00:00"),
                'lama_kerja' => 8,
                'lama_lembur'=> 2,
                'status'     => 'ontime',
                'created_at' => '2022-05-'.$x.' 22:23:58'
            ]);
        }
    }
}
