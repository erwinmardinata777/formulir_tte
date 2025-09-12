<?php
// database/seeders/DatabaseSeeder.php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Opd;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@sumbawakab.go.id',
            'password' => Hash::make('password123'),
            'role' => 'admin'
        ]);

        // Create OPDs
        $opds = [
            'Sekretariat Daerah',
            'Dinas Pendidikan dan Kebudayaan',
            'Dinas Kesehatan',
            'Dinas Pekerjaan Umum dan Penataan Ruang',
            'Dinas Sosial',
            'Dinas Tenaga Kerja dan Transmigrasi',
            'Dinas Pemberdayaan Perempuan dan Perlindungan Anak',
            'Dinas Pangan, Tanaman Pangan dan Hortikultura',
            'Dinas Peternakan dan Kesehatan Hewan',
            'Dinas Lingkungan Hidup',
            'Dinas Kependudukan dan Pencatatan Sipil',
            'Dinas Pemberdayaan Masyarakat dan Desa',
            'Dinas Pengendalian Penduduk dan Keluarga Berencana',
            'Dinas Perhubungan',
            'Dinas Komunikasi dan Informatika',
            'Dinas Koperasi, Usaha Kecil dan Menengah',
            'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu',
            'Dinas Kepemudaan dan Olahraga',
            'Dinas Pariwisata',
            'Dinas Perpustakaan dan Kearsipan',
            'Satuan Polisi Pamong Praja',
            'Badan Perencanaan Pembangunan Daerah',
            'Badan Keuangan Daerah',
            'Badan Kepegawaian dan Pengembangan SDM',
            'Badan Kesatuan Bangsa dan Politik'
        ];

        foreach ($opds as $opd) {
            Opd::create([
                'nama_opd' => $opd,
                'status' => 'aktif'
            ]);
        }
    }
}
