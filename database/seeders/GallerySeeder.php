<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        Gallery::create([
            'title' => 'Kegiatan Rayon',
            'description' => 'Dokumentasi kegiatan Rayon Cibedug 1.',
            'image' => 'gallery/sample-1.jpg',
            'category' => 'Kegiatan Rayon',
        ]);

        Gallery::create([
            'title' => 'Kebersamaan Siswa',
            'description' => 'Dokumentasi kebersamaan siswa.',
            'image' => 'gallery/sample-2.jpg',
            'category' => 'Kebersamaan',
        ]);

        Gallery::create([
            'title' => 'Pembelajaran',
            'description' => 'Kegiatan pembelajaran siswa.',
            'image' => 'gallery/sample-3.jpg',
            'category' => 'Pembelajaran',
        ]);
    }
}