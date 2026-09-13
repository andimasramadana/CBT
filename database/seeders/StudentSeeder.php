<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::query()->delete();

        $names = [
            'Nesya', 'Maurida', 'Aldawiyah', 'Gilang', 'M. Ridho', 'M. Sidqi', 'Aisyh Dianda',
            'Alizya', 'Jihanita', 'Gibran', 'Naufal', 'Saffa Nashwa', 'Kiandra', 'Mayang',
            'M. Yurizki', 'Vadli Arrahman', 'Qaireen', 'A. Luthfi Nizam', 'Farrel', 'M. Luthfi', 'M. Rezky',
            'Fujiyani S', 'Zalva', 'Fadillah M', 'Nazry Ilyas', 'Rusya Jabr', 'M. Kairo', 'Azka',
            'Kalista', 'Teuku adhilla', 'M. Kadafi', 'M. Fakhri', 'Dzakwan', 'Shaffa Azzahra', 'Andimas',
            'Siswa Dummy 36',
        ];

        foreach ($names as $index => $name) {
            $instagramName = strtolower(preg_replace('/[^a-z0-9]+/i', '', $name));

            Student::create([
                'name' => $name,
                'nis' => '1231'.str_pad((string) ($index + 1), 4, '0', STR_PAD_LEFT),
                'instagram_url' => 'https://instagram.com/'.$instagramName,
                'whatsapp_url' => 'https://wa.me/6281234567890',
                'linkedin_url' => 'https://linkedin.com/in/'.$instagramName,
                'photo' => null,
                'rombel' => 'PPLG XII-'.(($index % 3) + 1),
                'rayon' => 'Cibedug 1',
                'skills' => 'Kolaborasi, komunikasi, dan kreativitas',
                'interests' => 'Teknologi dan kegiatan sekolah',
                'bio' => 'Siswa Rayon Cibedug 1 SMK Wikrama Bogor.',
            ]);
        }

        Student::where('name', 'Siswa Dummy 36')->update([
            'user_id' => User::where('name', 'dimas')->value('id'),
        ]);
    }
}
