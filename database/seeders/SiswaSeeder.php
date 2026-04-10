<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update existing records or create new ones
        $siswas = [
            ['nis' => '12345', 'nama_siswa' => 'Budi Santoso', 'kelas' => 'XI A'],
            ['nis' => '12346', 'nama_siswa' => 'Siti Nurhaliza', 'kelas' => 'XI B'],
            ['nis' => '12347', 'nama_siswa' => 'Ahmad Ridho', 'kelas' => 'XI A'],
        ];

        foreach ($siswas as $siswa) {
            Siswa::updateOrCreate(
                ['nis' => $siswa['nis']],
                [
                    'nama_siswa' => $siswa['nama_siswa'],
                    'kelas' => $siswa['kelas'],
                    'password' => Hash::make('456'),
                ]
            );
        }
    }
}
