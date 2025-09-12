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
           'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA',
            'BADAN KESATUAN BANGSA DAN POLITIK',
            'BADAN KEUANGAN DAN ASET DAERAH',
            'BADAN PENANGGULANGAN BENCANA DAERAH',
            'BADAN PENDAPATAN DAERAH',
            'BADAN PERENCANAAN, PENELITIAN DAN PENGEMBANGAN DAERAH',
            'DINAS KELAUTAN DAN PERIKANAN',
            'DINAS KEPEMUDAAN, OLAHRAGA DAN PARIWISATA',
            'DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL',
            'DINAS KESEHATAN',
            'DINAS KETAHANAN PANGAN',
            'DINAS KOMUNIKASI, INFORMATIKA, STATISTIK DAN PERSANDIAN',
            'DINAS KOPERASI USAHA KECIL MENENGAH, PERINDUSTRIAN DAN PERDAGANGAN',
            'DINAS LINGKUNGAN HIDUP',
            'DINAS PEKERJAAN UMUM DAN PENATAAN RUANG',
            'DINAS PEMADAM KEBAKARAN DAN PENYELAMATAN',
            'DINAS PEMBERDAYAAN MASYARAKAT DAN DESA',
            'DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU',
            'DINAS PENDIDIKAN DAN KEBUDAYAAN',
            'DINAS PENGENDALIAN PENDUDUK, KELUARGA BERENCANA PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK',
            'DINAS PERHUBUNGAN',
            'DINAS PERPUSTAKAAN DAN KEARSIPAN',
            'DINAS PERTANIAN',
            'DINAS PERUMAHAN RAKYAT DAN KAWASAN PERMUKIMAN',
            'DINAS PETERNAKAN DAN KESEHATAN HEWAN',
            'DINAS SOSIAL',
            'DINAS TENAGA KERJA DAN TRANSMIGRASI',
            'INSPEKTORAT',
            'KECAMATAN ALAS',
            'KECAMATAN ALAS BARAT',
            'KECAMATAN BATULANTEH',
            'KECAMATAN BUER',
            'KECAMATAN EMPANG',
            'KECAMATAN LABANGKA',
            'KECAMATAN LABUHAN BADAS',
            'KECAMATAN LANTUNG',
            'KECAMATAN LAPE',
            'KECAMATAN LENANGGUAR',
            'KECAMATAN LOPOK',
            'KECAMATAN LUNYUK',
            'KECAMATAN MARONGE',
            'KECAMATAN MOYO HILIR',
            'KECAMATAN MOYO HULU',
            'KECAMATAN MOYO UTARA',
            'KECAMATAN ORONG TELU',
            'KECAMATAN PLAMPANG',
            'KECAMATAN RHEE',
            'KECAMATAN ROPANG',
            'KECAMATAN SUMBAWA',
            'KECAMATAN TARANO',
            'KECAMATAN UNTER IWES',
            'KECAMATAN UTAN',
            'KELURAHAN BRANG BARA',
            'KELURAHAN BRANG BIJI',
            'KELURAHAN BUGIS',
            'KELURAHAN LEMPEH',
            'KELURAHAN PEKAT',
            'KELURAHAN SAMAPUIN',
            'KELURAHAN SEKETENG',
            'KELURAHAN UMA SIMA',
            'RUMAH SAKIT UMUM DAERAH',
            'SATUAN POLISI PAMONG PRAJA',
            'SEKRETARIAT DAERAH',
            'SEKRETARIAT DEWAN PERWAKILAN RAKYAT DAERAH',
            'UPT PUSKESMAS KEC. ALAS',
            'UPT PUSKESMAS KEC. ALAS BARAT',
            'UPT PUSKESMAS KEC. BATULANTEH',
            'UPT PUSKESMAS KEC. BUER',
            'UPT PUSKESMAS KEC. EMPANG',
            'UPT PUSKESMAS KEC. LABANGKA',
            'UPT PUSKESMAS KEC. LABUHAN BADAS UNIT II',
            'UPT PUSKESMAS KEC. LANTUNG',
            'UPT PUSKESMAS KEC. LAPE',
            'UPT PUSKESMAS KEC. LENANGGUAR',
            'UPT PUSKESMAS KEC. LOPOK',
            'UPT PUSKESMAS KEC. LUNYUK',
            'UPT PUSKESMAS KEC. MARONGE',
            'UPT PUSKESMAS KEC. MOYO HILIR',
            'UPT PUSKESMAS KEC. MOYO HULU',
            'UPT PUSKESMAS KEC. MOYO UTARA',
            'UPT PUSKESMAS KEC. ORONG TELU',
            'UPT PUSKESMAS KEC. PLAMPANG',
            'UPT PUSKESMAS KEC. RHEE',
            'UPT PUSKESMAS KEC. ROPANG',
            'UPT PUSKESMAS KEC. UNTER IWES',
            'UPT PUSKESMAS KEC. UTAN',
            'UPT PUSKESMAS KEC.TARANO',
            'UPT PUSKESMAS KECAMATAN LABUHAN BADAS UNIT I',
            'UPT PUSKESMAS UNIT I KEC. SUMBAWA',
            'UPT PUSKESMAS UNIT II KEC. SUMBAWA',                                    
        ];

        foreach ($opds as $opd) {
            Opd::create([
                'nama_opd' => $opd,
                'status' => 'aktif'
            ]);
        }
    }
}
