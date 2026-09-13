@extends('layouts.app')

@section('title', 'Galeri - Rayon Cibedug 1')

@section('content')

<section class="section">

    <div class="container">

        <div class="section-header">

            <div class="section-label">
                Dokumentasi
            </div>

            <h1 class="section-title">
                Galeri Rayon
            </h1>

            <p class="section-description">
                Dokumentasi kegiatan dan momen
                Rayon Cibedug 1 SMK Wikrama Bogor.
            </p>

        </div>


        <div class="cards">

            @forelse($galleries as $gallery)

                <div class="card">

                    <div class="card-icon">

                        <i class="fa-solid fa-image"></i>

                    </div>

                    <h3>
                        {{ $gallery->title ?? 'Dokumentasi Rayon' }}
                    </h3>

                    <p>
                        {{ $gallery->description ?? 'Dokumentasi kegiatan Rayon Cibedug 1.' }}
                    </p>

                </div>

            @empty

                <div class="card">

                    <div class="card-icon">

                        <i class="fa-solid fa-images"></i>

                    </div>

                    <h3>
                        Belum ada galeri
                    </h3>

                    <p>
                        Dokumentasi akan ditampilkan
                        di halaman ini.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection