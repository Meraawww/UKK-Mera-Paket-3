<?php
// Simple seeder script to populate siswa table directly
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;

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
    echo "Created/Updated: " . $siswa['nis'] . "\n";
}

echo "\nSiswa seeding completed successfully!\n";
?>
