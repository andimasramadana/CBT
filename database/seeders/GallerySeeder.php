<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        Gallery::query()->delete();

        Gallery::create([
            'title' => 'Angkatan 30',
            'description' => 'Dokumentasi Angkatan 30',
            'image' => 'gallery/17.jpeg',
            'category' => 'Angkatan',
        ]);

        Gallery::create([
            'title' => 'Bagi Raport',
            'description' => 'Dokumentasi Bagi Raport',
            'image' => 'gallery/4.jpeg',
            'category' => 'Kegiatan',
        ]);

        Gallery::create([
            'title' => 'Piket Rayon',
            'description' => 'Dokumentasi Piket Rayon',
            'image' => 'gallery/2.jpeg',
            'category' => 'Piket',
        ]);
    }
}
