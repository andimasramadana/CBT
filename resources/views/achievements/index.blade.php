@extends('layouts.app')

@section('title', 'Prestasi - Rayon Cibedug 1')

@section('content')

<section class="section">

    <div class="container">

        <div class="section-header">

            <div class="section-label">
                Pencapaian
            </div>

            <h1 class="section-title">
                Prestasi Rayon
            </h1>

            <p class="section-description">
                Berbagai prestasi dan pencapaian
                siswa Rayon Cibedug 1.
            </p>

        </div>


        <div class="cards">

            @forelse($achievements as $achievement)

                <div class="card">

                    <div class="card-icon">

                        <i class="fa-solid fa-trophy"></i>

                    </div>

                    <h3>
                        {{ $achievement->title ?? 'Prestasi Siswa' }}
                    </h3>

                    <p>
                        {{ $achievement->description ?? 'Prestasi Rayon Cibedug 1.' }}
                    </p>

                </div>

            @empty

                <div class="card">

                    <div class="card-icon">

                        <i class="fa-solid fa-trophy"></i>

                    </div>

                    <h3>
                        Belum ada prestasi
                    </h3>

                    <p>
                        Data prestasi akan ditampilkan
                        di halaman ini.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection