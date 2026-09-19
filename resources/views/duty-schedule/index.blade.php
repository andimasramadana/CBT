@extends('layouts.app')

@section('title', 'Jadwal Piket Rayon - Cibedug 1')

@section('content')
<section class="duty-schedule-page">
    <div class="container duty-schedule-page__inner">
        <div class="duty-schedule-page__heading">
            <span class="duty-schedule-page__eyebrow"><i class="fa-solid fa-calendar-check"></i> Rayon Cibedug 1</span>
            <h1>Jadwal Piket <span>Rayon</span></h1>
            <p>Jadwal piket siswa yang bertugas setiap hari.</p>
            @if($today)
                <div class="duty-schedule-page__today"><i class="fa-solid fa-sun"></i> Hari ini: <strong>{{ $today }}</strong></div>
            @else
                <div class="duty-schedule-page__today"><i class="fa-solid fa-moon"></i> Akhir pekan: tidak ada jadwal piket</div>
            @endif
        </div>

        <div class="duty-schedule-grid">
            @foreach($schedule as $day => $students)
                <section class="duty-day-card {{ $today === $day ? 'is-today' : '' }}">
                    <header class="duty-day-card__header">
                        <span class="duty-day-card__dot"></span>
                        <h2>{{ $day }}</h2>
                        @if($today === $day)
                            <span class="duty-day-card__badge">Hari ini</span>
                        @endif
                    </header>
                    <div class="duty-day-card__students">
                        @foreach($students as $student)
                            <div class="duty-student {{ $today === $day ? 'is-on-duty' : '' }}">
                                @php($profile = $studentProfiles->get($student))
                                <span class="duty-student__avatar">
                                    @if($profile?->photo)
                                        <img src="{{ str_starts_with($profile->photo, 'http') ? $profile->photo : asset('storage/' . $profile->photo) }}" alt="Foto {{ $student }}">
                                    @else
                                        {{ strtoupper(substr($student, 0, 1)) }}
                                    @endif
                                </span>
                                <span>{{ $student }}</span>
                                @if($today === $day)
                                    <i class="fa-solid fa-circle-check"></i>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </section>
            @endforeach
        </div>
    </div>
</section>
@endsection
