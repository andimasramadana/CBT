@extends('layouts.app')

@section('title', 'Profil Siswa - Rayon Cibedug 1')

@section('content')

<section class="student-directory">
    <div class="student-directory__banner">
        <div class="student-directory__banner-image"></div>
        <div class="container student-directory__banner-content">
            <h1><span>Direktori</span> Siswa</h1>
            <p>Temukan dan jelajahi profil siswa SMK Wikrama Bogor</p>
        </div>
    </div>

    <div class="container student-directory__content">
        <form class="student-directory__search-panel" id="studentSearchForm">
            <div class="student-directory__search-row">
                <label class="student-directory__search-input" for="studentSearch">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input id="studentSearch" type="search" placeholder="Cari nama siswa, NIS, atau rombel..." autocomplete="off">
                </label>
                <button class="student-directory__search-button" type="submit">Cari</button>
            </div>

            <button class="student-directory__filter-toggle" type="button" id="filterToggle" aria-expanded="false">
                <i class="fa-solid fa-filter"></i>
                Filter Lanjutan
                <i class="fa-solid fa-chevron-down"></i>
            </button>

            <div class="student-directory__filters" id="studentFilters" hidden>
                <label>
                    Rombel
                    <select id="studentRombel">
                        <option value="">Semua rombel</option>
                        @foreach($students->pluck('rombel')->filter()->unique()->sort() as $rombel)
                            <option value="{{ strtolower($rombel) }}">{{ $rombel }}</option>
                        @endforeach
                    </select>
                </label>
                <label>
                    Rayon
                    <select id="studentRayon">
                        <option value="">Semua rayon</option>
                        @foreach($students->pluck('rayon')->filter()->unique()->sort() as $rayon)
                            <option value="{{ strtolower($rayon) }}">{{ $rayon }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
        </form>

        <div class="student-directory__summary">
            <span>Menampilkan <strong id="studentResultCount">{{ $students->count() }}</strong> dari {{ $students->count() }} siswa</span>
        </div>

        <div class="student-directory__grid" id="studentGrid">
            @forelse($students as $student)
                <a href="{{ route('students.show', $student) }}"
                   class="student-profile-card"
                   data-student-card
                   data-search="{{ strtolower($student->name . ' ' . ($student->nis ?? '') . ' ' . ($student->rombel ?? '') . ' ' . ($student->rayon ?? '')) }}"
                   data-rombel="{{ strtolower($student->rombel ?? '') }}"
                   data-rayon="{{ strtolower($student->rayon ?? '') }}">
                    <div class="student-profile-card__avatar">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="student-profile-card__details">
                        <h2>{{ $student->name ?? 'Nama Siswa' }}</h2>
                        <p class="student-profile-card__nis">NIS: {{ $student->nis ?? 'Belum tersedia' }}</p>
                        <span class="student-profile-card__class">{{ $student->rombel ?? 'Rombel belum tersedia' }}</span>
                        <div class="student-profile-card__actions">
                            <span class="student-profile-card__social"><i class="fa-brands fa-linkedin-in"></i></span>
                            <span class="student-profile-card__social"><i class="fa-brands fa-whatsapp"></i></span>
                            <span class="student-profile-card__social"><i class="fa-brands fa-instagram"></i></span>
                        </div>
                    </div>
                </a>
            @empty
                <div class="student-directory__empty">
                    <i class="fa-solid fa-users"></i>
                    <h2>Belum ada data siswa</h2>
                    <p>Data siswa akan ditampilkan di halaman ini.</p>
                </div>
            @endforelse
        </div>

        <p class="student-directory__no-result" id="studentNoResult" hidden>Siswa yang kamu cari belum ditemukan.</p>
    </div>
</section>

<script>
    const studentSearchForm = document.getElementById('studentSearchForm');
    const studentSearch = document.getElementById('studentSearch');
    const studentRombel = document.getElementById('studentRombel');
    const studentRayon = document.getElementById('studentRayon');
    const studentCards = [...document.querySelectorAll('[data-student-card]')];
    const studentResultCount = document.getElementById('studentResultCount');
    const studentNoResult = document.getElementById('studentNoResult');
    const filterToggle = document.getElementById('filterToggle');
    const studentFilters = document.getElementById('studentFilters');

    const filterStudents = () => {
        const query = studentSearch.value.trim().toLowerCase();
        const rombel = studentRombel.value;
        const rayon = studentRayon.value;
        let visibleStudents = 0;

        studentCards.forEach((card) => {
            const isVisible = card.dataset.search.includes(query)
                && (!rombel || card.dataset.rombel === rombel)
                && (!rayon || card.dataset.rayon === rayon);

            card.hidden = !isVisible;
            visibleStudents += isVisible ? 1 : 0;
        });

        studentResultCount.textContent = visibleStudents;
        studentNoResult.hidden = visibleStudents !== 0;
    };

    studentSearchForm?.addEventListener('submit', (event) => {
        event.preventDefault();
        filterStudents();
    });
    studentSearch?.addEventListener('input', filterStudents);
    studentRombel?.addEventListener('change', filterStudents);
    studentRayon?.addEventListener('change', filterStudents);
    filterToggle?.addEventListener('click', () => {
        const isExpanded = filterToggle.getAttribute('aria-expanded') === 'true';
        filterToggle.setAttribute('aria-expanded', String(!isExpanded));
        studentFilters.hidden = isExpanded;
    });
</script>

@endsection