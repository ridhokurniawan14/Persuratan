<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\kode_surat_masuk;
use App\Models\kode_surat_keluars;
use App\Models\kode_yplps;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ridho Kurniawan',
            'email'=> 'ridho@gmail.com',
            'password' => bcrypt('admin'),
            'is_superadmin' => '1'            
        ]);
        kode_yplps::create([
            'kode' => 'a',
            'ket'=> 'perencanaan',
        ]);
        kode_yplps::create([
            'kode' => 'b',
            'ket'=> 'keuangan',
        ]);
        kode_yplps::create([
            'kode' => 'c',
            'ket'=> 'kepegawaian',
        ]);
        kode_yplps::create([
            'kode' => 'd',
            'ket'=> 'perlengkapan',
        ]);
        kode_yplps::create([
            'kode' => 'e',
            'ket'=> 'pendidikan',
        ]);
        kode_yplps::create([
            'kode' => 'k',
            'ket'=> 'olah raga/kesenian',
        ]);
        kode_yplps::create([
            'kode' => 'm',
            'ket'=> 'kurikulum',
        ]);
        kode_yplps::create([
            'kode' => 'u',
            'ket'=> 'undangan',
        ]);
        kode_surat_masuk::create([
            'kode' => 'mb',
            'ket'=> 'masuk biasa',
        ]);
        kode_surat_masuk::create([
            'kode' => 'mp',
            'ket'=> 'masuk penting',
        ]);
         
        $data = [
            // Data untuk kode_surat_yplp = 1
            [
                'kode_surat_yplp' => 1,
                'nomor' => '1',
                'ket' => 'urusan pengadaan tanah / lokasi sekolah / kantor yang akan dibangun',
            ],
            [
                'kode_surat_yplp' => 1,
                'nomor' => '2',
                'ket' => 'bangun kantor sekolah',
            ],
            [
                'kode_surat_yplp' => 1,
                'nomor' => '3',
                'ket' => 'rehabilitasi / perluasan bangunan',
            ],
            [
                'kode_surat_yplp' => 1,
                'nomor' => '4',
                'ket' => 'pemakaian / pinjaman gedung ruang belajar / alat-alat',
            ],
            [
                'kode_surat_yplp' => 1,
                'nomor' => '5',
                'ket' => 'lain-lain',
            ],
            // Data untuk kode_surat_yplp = 2
            [
                'kode_surat_yplp' => 2,
                'nomor' => '1',
                'ket' => 'anggaran belanja',
            ],
            [
                'kode_surat_yplp' => 2,
                'nomor' => '2',
                'ket' => 'tunjangan jabatan',
            ],
            [
                'kode_surat_yplp' => 2,
                'nomor' => '3',
                'ket' => 'honorarium',
            ],
            [
                'kode_surat_yplp' => 2,
                'nomor' => '4',
                'ket' => 'lembur',
            ],
            [
                'kode_surat_yplp' => 2,
                'nomor' => '5',
                'ket' => 'surat pertanggung jawaban',
            ],
            [
                'kode_surat_yplp' => 2,
                'nomor' => '6',
                'ket' => 'gaji pegawai',
            ],
            [
                'kode_surat_yplp' => 2,
                'nomor' => '7',
                'ket' => 'gaji guru / kepala sekolah',
            ],
            [
                'kode_surat_yplp' => 2,
                'nomor' => '8',
                'ket' => 'sewa menyewa',
            ],
            [
                'kode_surat_yplp' => 2,
                'nomor' => '9',
                'ket' => 'biaya perbaikan',
            ],
            [
                'kode_surat_yplp' => 2,
                'nomor' => '10',
                'ket' => 'biaya perjalanan',
            ],
            [
                'kode_surat_yplp' => 2,
                'nomor' => '11',
                'ket' => 'lain-lain',
            ],
            // Data untuk kode_surat_yplp = 3
            [
                'kode_surat_yplp' => 3,
                'nomor' => '1',
                'ket' => 'sk pengangkatan kepala/wakil/guru/pegawai',
            ],
            [
                'kode_surat_yplp' => 3,
                'nomor' => '2',
                'ket' => 'surat tugas',
            ],
            [
                'kode_surat_yplp' => 3,
                'nomor' => '3',
                'ket' => 'kenaikan honor',
            ],
            [
                'kode_surat_yplp' => 3,
                'nomor' => '4',
                'ket' => 'kesejahteraan pegawai',
            ],
            [
                'kode_surat_yplp' => 3,
                'nomor' => '5',
                'ket' => 'dispensasi',
            ],
            [
                'kode_surat_yplp' => 3,
                'nomor' => '6',
                'ket' => 'serah terima jabatan / pelantikan',
            ],
            [
                'kode_surat_yplp' => 3,
                'nomor' => '7',
                'ket' => 'surat panggilan pada orang tua / wali siswa',
            ],
            [
                'kode_surat_yplp' => 3,
                'nomor' => '8',
                'ket' => 'pemberitahuan',
            ],
            [
                'kode_surat_yplp' => 3,
                'nomor' => '9',
                'ket' => 'cuti sakit/hamil',
            ],
            [
                'kode_surat_yplp' => 3,
                'nomor' => '10',
                'ket' => 'lain-lain',
            ],
            // Data untuk kode_surat_yplp = 4
            [
                'kode_surat_yplp' => 4,
                'nomor' => '1',
                'ket' => 'meubilair kantor / sekolah',
            ],
            [
                'kode_surat_yplp' => 4,
                'nomor' => '2',
                'ket' => 'pengadaan perlengkapan',
            ],
            [
                'kode_surat_yplp' => 4,
                'nomor' => '3',
                'ket' => 'penginapan',
            ],
            [
                'kode_surat_yplp' => 4,
                'nomor' => '4',
                'ket' => 'alat-alat kantor / tulis',
            ],
            [
                'kode_surat_yplp' => 4,
                'nomor' => '5',
                'ket' => 'komputer / mesin cetak',
            ],
            [
                'kode_surat_yplp' => 4,
                'nomor' => '6',
                'ket' => 'perencanaan',
            ],
            [
                'kode_surat_yplp' => 4,
                'nomor' => '7',
                'ket' => 'lain-lain',
            ],
            // Data untuk kode_surat_yplp = 5
            [
                'kode_surat_yplp' => 5,
                'nomor' => '1',
                'ket' => 'pembukaan / pendirian sekolah',
            ],
            [
                'kode_surat_yplp' => 5,
                'nomor' => '2',
                'ket' => 'pengintegrasikan',
            ],
            [
                'kode_surat_yplp' => 5,
                'nomor' => '3',
                'ket' => 'subsidi / bantuan',
            ],
            [
                'kode_surat_yplp' => 5,
                'nomor' => '4',
                'ket' => 'laporan bulanan sekolah',
            ],
            [
                'kode_surat_yplp' => 5,
                'nomor' => '5',
                'ket' => 'tata tertib sekolah',
            ],
            [
                'kode_surat_yplp' => 5,
                'nomor' => '6',
                'ket' => 'pengesahan persetujuan berdirinya sekolah',
            ],
            [
                'kode_surat_yplp' => 5,
                'nomor' => '7',
                'ket' => 'kalender',
            ],
            [
                'kode_surat_yplp' => 5,
                'nomor' => '8',
                'ket' => 'ujian nasional / semester',
            ],
            [
                'kode_surat_yplp' => 5,
                'nomor' => '9',
                'ket' => 'penerimaan siswa baru',
            ],
            [
                'kode_surat_yplp' => 5,
                'nomor' => '10',
                'ket' => 'libur sekolah',
            ],
            [
                'kode_surat_yplp' => 5,
                'nomor' => '11',
                'ket' => 'penataran guru dan pegawai',
            ],
            [
                'kode_surat_yplp' => 5,
                'nomor' => '12',
                'ket' => 'lain-lain',
            ],
            // Data untuk kode_surat_yplp = 6
            [
                'kode_surat_yplp' => 6,
                'nomor' => '1',
                'ket' => 'kesenian',
            ],
            [
                'kode_surat_yplp' => 6,
                'nomor' => '2',
                'ket' => 'kegiatan sekolah',
            ],
            [
                'kode_surat_yplp' => 6,
                'nomor' => '3',
                'ket' => 'organisasi olah raga',
            ],
            [
                'kode_surat_yplp' => 6,
                'nomor' => '4',
                'ket' => 'osis',
            ],
            [
                'kode_surat_yplp' => 6,
                'nomor' => '5',
                'ket' => 'lain-lain',
            ],
            // Data untuk kode_surat_yplp = 7
            [
                'kode_surat_yplp' => 7,
                'nomor' => '1',
                'ket' => 'metode mengajar / belajar',
            ],
            [
                'kode_surat_yplp' => 7,
                'nomor' => '2',
                'ket' => 'ekstrakurikuler',
            ],
            [
                'kode_surat_yplp' => 7,
                'nomor' => '3',
                'ket' => 'pelajaran praktik',
            ],
            [
                'kode_surat_yplp' => 7,
                'nomor' => '4',
                'ket' => 'penyusunan rpp',
            ],
            [
                'kode_surat_yplp' => 7,
                'nomor' => '5',
                'ket' => 'ijazah',
            ],
            [
                'kode_surat_yplp' => 7,
                'nomor' => '6',
                'ket' => 'laporan-laporan',
            ],
            [
                'kode_surat_yplp' => 7,
                'nomor' => '7',
                'ket' => 'tabel akhir',
            ],
            [
                'kode_surat_yplp' => 7,
                'nomor' => '8',
                'ket' => 'uks',
            ],
            [
                'kode_surat_yplp' => 7,
                'nomor' => '9',
                'ket' => 'lain-lain',
            ],
            // Data untuk kode_surat_yplp = 8
            [
                'kode_surat_yplp' => 8,
                'nomor' => '1',
                'ket' => 'rapat-rapat',
            ],
            [
                'kode_surat_yplp' => 8,
                'nomor' => '2',
                'ket' => 'penataran / diklat',
            ],
            [
                'kode_surat_yplp' => 8,
                'nomor' => '3',
                'ket' => 'panggilan',
            ],
            [
                'kode_surat_yplp' => 8,
                'nomor' => '4',
                'ket' => 'rapat kerja (RAKER)',
            ],
            [
                'kode_surat_yplp' => 8,
                'nomor' => '5',
                'ket' => 'radiogram / telegram',
            ],
            [
                'kode_surat_yplp' => 8,
                'nomor' => '6',
                'ket' => 'izin / dispensasi',
            ],
            [
                'kode_surat_yplp' => 8,
                'nomor' => '7',
                'ket' => 'lain-lain',
            ],
        ];

        // Loop untuk membuat data
        foreach ($data as $item) {
            kode_surat_keluars::create($item);
        }
    }
}
