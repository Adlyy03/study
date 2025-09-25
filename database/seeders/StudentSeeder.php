<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'id'            => 1,
                'nisn'          => '1234567890',
                'nama_lengkap'  => 'Ahmad Fauzi',
                'tempat_lahir'  => 'Jakarta',
                'tanggal_lahir' => '2007-05-15',
                'alamat'        => 'Jl. Merdeka No. 45, Jakarta',
                'no_telp'       => '081234567890',
                'email'         => 'ahmad.fauzi@example.com',
                'kelas'         => 'XI',
                'jurusan'       => 'RPL',
                'added_by'      => 'admin',
                'is_active'     => true,
            ],
            [
                'id'            => 2,
                'nisn'          => '0987654321',
                'nama_lengkap'  => 'Siti Aisyah',
                'tempat_lahir'  => 'Bandung',
                'tanggal_lahir' => '2008-01-20',
                'alamat'        => 'Jl. Asia Afrika No. 12, Bandung',
                'no_telp'       => '081298765432',
                'email'         => 'siti.aisyah@example.com',
                'kelas'         => 'X',
                'jurusan'       => 'TKJ',
                'added_by'      => 'admin',
                'is_active'     => true,
            ],
            [
                'id'            => 3,
                'nisn'          => '1122334455',
                'nama_lengkap'  => 'Budi Santoso',
                'tempat_lahir'  => 'Surabaya',
                'tanggal_lahir' => '2006-09-10',
                'alamat'        => 'Jl. Kenjeran No. 88, Surabaya',
                'no_telp'       => '081377889900',
                'email'         => 'budi.santoso@example.com',
                'kelas'         => 'XII',
                'jurusan'       => 'Multimedia',
                'added_by'      => 'guru',
                'is_active'     => false,
            ],
        ]);
    }
}
