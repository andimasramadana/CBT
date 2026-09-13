<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    public function run(): void
    {
        Achievement::create([
            'title' => 'Juara Kompetisi Programming',
            'student_name' => 'Contoh Siswa',
            'category' => 'Programming',
            'level' => 'Kota',
            'year' => 2026,
            'image' => null,
            'description' => 'Prestasi dalam kompetisi programming.',
        ]);

        Achievement::create([
            'title' => 'Juara Desain',
            'student_name' => 'Contoh Siswa 2',
            'category' => 'Desain',
            'level' => 'Sekolah',
            'year' => 2026,
            'image' => null,
            'description' => 'Prestasi dalam bidang desain.',
        ]);
    }
}