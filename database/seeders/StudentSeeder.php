<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $studentsData = [
            ['nis' => '12309510', 'name' => 'Alinda Euis Soleha', 'rombel' => 'PPLG XII-4'],
            ['nis' => '12309532', 'name' => 'Annasya Siti Anjany', 'rombel' => 'PPLG XII-3'],
            ['nis' => '12309630', 'name' => 'Fahmi Haerul Anwar', 'rombel' => 'TJKT XII-1'],
            ['nis' => '12309680', 'name' => 'Indri Auliani', 'rombel' => 'KLN XII-2'],
            ['nis' => '12309735', 'name' => 'Maulana Yusuf M. Zehar', 'rombel' => 'DKV XII-2'],
            ['nis' => '12309770', 'name' => 'M. Azmi Naziyulloh', 'rombel' => 'PPLG XII-4'],
            ['nis' => '12309866', 'name' => 'M. Hanif Assidiq', 'rombel' => 'TJKT XII-2'],
            ['nis' => '12309872', 'name' => 'M. Ikbal Saputra', 'rombel' => 'HTL XII-2'],
            ['nis' => '12309981', 'name' => 'Raisya Kamila Azzura', 'rombel' => 'MPLB XII-1'],
            ['nis' => '12310001', 'name' => 'Restu Lintang Asih', 'rombel' => 'PPLG XII-2'],
            ['nis' => '12310053', 'name' => 'Sintia Galih', 'rombel' => 'MPLB XII-1'],
            ['nis' => '12310081', 'name' => 'Syahputra Winata', 'rombel' => 'PPLG XII-4'],
            ['nis' => '12310088', 'name' => 'Tega Sereal', 'rombel' => 'TJKT XII-1'],
            ['nis' => '12410192', 'name' => 'Annisa Julianti', 'rombel' => 'MPLB XI-2'],
            ['nis' => '12410203', 'name' => 'Asri Aulia Erwin', 'rombel' => 'KLN XI-1'],
            ['nis' => '12410219', 'name' => 'Azzam Shalahuddin Wafi', 'rombel' => 'PPLG XI-5'],
            ['nis' => '12410225', 'name' => 'Berlian Nurul Hikhmah', 'rombel' => 'MPLB XI-1'],
            ['nis' => '12410252', 'name' => 'Denisyan Rudiansyah', 'rombel' => 'KLN XI-2'],
            ['nis' => '12410331', 'name' => 'Indira Nurzaini', 'rombel' => 'PMN XI-1'],
            ['nis' => '12410347', 'name' => 'Kaila Putri Padillah', 'rombel' => 'KLN XI-2'],
            ['nis' => '12410401', 'name' => 'Moch Alif Ibrahim', 'rombel' => 'PPLG XI-3'],
            ['nis' => '12410427', 'name' => 'M. Fachri', 'rombel' => 'HTL XI-1'],
            ['nis' => '12410479', 'name' => 'M. Yasir', 'rombel' => 'HTL XI-1'],
            ['nis' => '12410508', 'name' => 'M. Dzakir Jaelani', 'rombel' => 'PPLG XI-3'],
            ['nis' => '12410514', 'name' => 'M. Faisal Hadi', 'rombel' => 'PPLG XI-3'],
            ['nis' => '12410551', 'name' => 'M. Rafael Agustian', 'rombel' => 'DKV XI-2'],
            ['nis' => '12410714', 'name' => 'Siti Namira', 'rombel' => 'PMN XI-1'],
            ['nis' => '12410725', 'name' => 'Siti Zulfah Rahmawati', 'rombel' => 'DKV XI-2'],
            ['nis' => '12410769', 'name' => 'Zahra Elfariani Setiawan', 'rombel' => 'MPLB XI-2'],
            ['nis' => '12410773', 'name' => 'Zeldyne S. Permana', 'rombel' => 'KLN XI-1'],
            ['nis' => '12510806', 'name' => 'Ahmad Luthfi Nizam', 'rombel' => '-'],
            ['nis' => '12510824', 'name' => 'Alizya Meilantika Setya', 'rombel' => '-'],
            ['nis' => '12510834', 'name' => 'Andimas Ramadana', 'rombel' => '-'],
            ['nis' => '12510871', 'name' => 'Azka Anindya Asis', 'rombel' => '-'],
            ['nis' => '12510885', 'name' => 'Cahya Gilang Permana', 'rombel' => '-'],
            ['nis' => '12510948', 'name' => 'Farrel Evan Aditya', 'rombel' => '-'],
            ['nis' => '12510963', 'name' => 'Gibran Mahmud Al Munawar', 'rombel' => '-'],
            ['nis' => '12511069', 'name' => 'Maurida Pebriani', 'rombel' => '-'],
            ['nis' => '12511133', 'name' => 'M. Said Kadafi', 'rombel' => '-'],
            ['nis' => '12511135', 'name' => 'M. Sidqi Zaeda Arsy', 'rombel' => '-'],
            ['nis' => '12511172', 'name' => 'M. Fakhri Mubarok', 'rombel' => '-'],
            ['nis' => '12511192', 'name' => 'M. Luthfi', 'rombel' => '-'],
            ['nis' => '12511207', 'name' => 'M. Rezky Arsy Ramadhan', 'rombel' => '-'],
            ['nis' => '12511208', 'name' => 'M. Ridho', 'rombel' => '-'],
            ['nis' => '12511218', 'name' => 'M. Yurizki Akbar N.', 'rombel' => '-'],
            ['nis' => '12511249', 'name' => 'Naufal Hakim Arrofi', 'rombel' => '-'],
            ['nis' => '12511259', 'name' => 'Nesya Rizki Br Ginting', 'rombel' => '-'],
            ['nis' => '12511359', 'name' => 'Shafa Azzahra N.', 'rombel' => '-'],
            ['nis' => '12511376', 'name' => 'Siti Robiah Al Adawiyah', 'rombel' => '-'],
            ['nis' => '12511394', 'name' => 'Teuku Adhilla Raffa', 'rombel' => '-'],
        ];

        // Hapus data siswa lama
        Student::query()->delete();

        // Hapus akun user non-admin yang lama
        User::where('is_admin', false)->delete();

        foreach ($studentsData as $item) {
            $nis = $item['nis'];
            $name = $item['name'];
            $rombel = ! empty($item['rombel']) ? $item['rombel'] : '-';

            // Menentukan kelas berdasarkan awalan NIS:
            // 123 -> Alumni
            // 124 -> Kelas 12
            // 125 -> Kelas 11
            if (str_starts_with($nis, '123')) {
                $kelas = 'Alumni';
            } elseif (str_starts_with($nis, '124')) {
                $kelas = '12';
            } elseif (str_starts_with($nis, '125')) {
                $kelas = '11';
            } else {
                $kelas = 'Lainnya';
            }

            // Buat akun User dengan username NIS dan password NIS
            $user = User::create([
                'name' => $name,
                'email' => $nis.'@student.cibedug1.test',
                'password' => Hash::make($nis),
                'is_admin' => false,
            ]);

            $cleanUsername = strtolower(preg_replace('/[^a-z0-9]+/i', '', $name));

            Student::create([
                'name' => $name,
                'user_id' => $user->id,
                'nis' => $nis,
                'instagram_url' => 'https://instagram.com/'.$cleanUsername,
                'whatsapp_url' => 'https://wa.me/6281234567890',
                'linkedin_url' => 'https://linkedin.com/in/'.$cleanUsername,
                'photo' => null,
                'rombel' => $rombel,
                'rayon' => 'Cibedug 1',
                'kelas' => $kelas,
                'skills' => 'Kolaborasi, komunikasi, dan kreativitas',
                'interests' => 'Teknologi dan kegiatan sekolah',
                'bio' => $kelas === 'Alumni' ? 'Alumni Rayon Cibedug 1 SMK Wikrama Bogor.' : 'Siswa Rayon Cibedug 1 SMK Wikrama Bogor.',
            ]);
        }
    }
}
