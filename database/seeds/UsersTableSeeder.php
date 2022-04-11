<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\User::create([
            'username'    => 'admin',
            'email'    => 'admin@aw.com',
            'password'    => bcrypt('admin')
        ]);

        \App\Tunjangan::create([
            'jenis'    => 'Mlontey',
            'besar'    => '50000',
        ]);

        \App\Jabatan::create([
            'jabatan'    => 'kang coly',
            'gajipokok'  => '20000',
        ]);

        \App\Jabatan::create([
            'jabatan'    => 'office boy',
            'gajipokok'  => '40000',
        ]);

        for ($i=0; $i < 10 ; $i++) { 
            # code...
            \App\Pegawai::create([
                'rfid_id' => str_random(5),
                'nama' => 'dhio'.$i,
                'jabatan_id' => 1,
                'tgl' => date("Y-m-d"),
                'ttl' => 'sidoarjo',
                'alamat' => 'sidoarjo pasar kembang',
                'telp' => '08218132122'
            ]);
        }

        for ($i=0; $i < 10 ; $i++) { 
            # code...
            \App\Absensi::create([
                'pegawai_id' => $i+1,
                'tanggal'    => date("Y-m-d"),
                'jam_hadir'  => date("08:00:00"),
                'jam_pulang' => date("19:00:00"),
                'lama_kerja' => 8,
                'lama_lembur'=> 2,
            ]);
        }
    }
}
