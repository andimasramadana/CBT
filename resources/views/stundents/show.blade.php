@extends('layouts.app')

@section('title', 'Profil Siswa - ' . ($student->name ?? 'Siswa'))

@section('content')

<section class="section">

    <div class="container">

        <div class="student-detail-card">
            <div class="student-detail-card__avatar">
                @if($student->photo)
                    <img src="{{ \Illuminate\Support\Str::startsWith($student->photo, ['http://', 'https://']) ? $student->photo : asset('storage/' . $student->photo) }}" alt="Foto {{ $student->name }}" onerror="this.style.display='none'; if(this.nextElementSibling) this.nextElementSibling.style.display='inline-block';">
                    <i class="fa-solid fa-user" style="display: none;"></i>
                @else
                    <i class="fa-solid fa-user"></i>
                @endif
            </div>

            <h1>{{ $student->name ?? 'Nama Siswa' }}</h1>
            <p class="student-detail-card__nis">NIS: {{ $student->nis ?? 'Belum tersedia' }}</p>
            <span class="student-detail-card__class">{{ $student->rombel ?? 'Rombel belum tersedia' }}</span>
            <p class="student-detail-card__rayon">{{ $student->rayon ?? 'Cibedug 1' }}</p>

            <div class="student-detail-card__actions">
                @if($student->linkedin_url)
                    <a href="{{ $student->linkedin_url }}" target="_blank" rel="noopener" class="student-detail-card__social"><i class="fa-brands fa-linkedin-in"></i></a>
                @endif
                @if($student->whatsapp_url)
                    <a href="{{ $student->whatsapp_url }}" target="_blank" rel="noopener" class="student-detail-card__social"><i class="fa-brands fa-whatsapp"></i></a>
                @endif
                <a href="{{ $student->instagram_url ?? '#' }}" target="_blank" rel="noopener" class="student-detail-card__instagram"><i class="fa-brands fa-instagram"></i></a>
            </div>

            <a href="{{ route('students') }}"
               class="btn btn-primary">

                <i class="fa-solid fa-arrow-left"></i>

                Kembali

            </a>

        </div>

    </div>

</section>

@endsection