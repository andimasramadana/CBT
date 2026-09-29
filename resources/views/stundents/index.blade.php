@extends('layouts.app')

@section('title', 'Profil Siswa - Rayon Cibedug 1')

@section('content')

@php
    /**
     * Kelompokkan siswa berdasarkan kolom 'kelas' di database.
     */
    $classGroups = [];

    foreach ($students as $student) {
        $kelasKey = $student->kelas ?? 'Lainnya';

        if (! isset($classGroups[$kelasKey])) {
            $classGroups[$kelasKey] = collect();
        }

        $classGroups[$kelasKey]->push($student);
    }

    // Urutkan grup sesuai urutan jenjang sekolah: 10, 11, 12, Alumni, Lainnya
    $order = ['10' => 1, '11' => 2, '12' => 3, 'Alumni' => 4, 'Lainnya' => 5];
    uksort($classGroups, function ($a, $b) use ($order) {
        $orderA = $order[$a] ?? 99;
        $orderB = $order[$b] ?? 99;
        return $orderA <=> $orderB;
    });

    // Hapus grup yang kosong
    $classGroups = array_filter($classGroups, fn($group) => $group->isNotEmpty());

    // Ambil kelas pertama yang tersedia sebagai kelas aktif default
    $activeKelasKey = ! empty($classGroups) ? (string) array_key_first($classGroups) : '';
    $activeGroup = $activeKelasKey !== '' ? $classGroups[$activeKelasKey] : collect();
@endphp

<section class="student-directory">
    <div class="student-directory__banner">
        <div class="student-directory__banner-image"></div>
        <div class="container student-directory__banner-content">
            <h1><span>Direktori</span> Murid</h1>
            <p>Temukan dan jelajahi profil murid Rayon Cibedug 1</p>
        </div>
    </div>

    <div class="container student-directory__content">
        <form class="student-directory__search-panel" id="studentSearchForm">
            <div class="student-directory__search-row">
                <label class="student-directory__search-input" for="studentSearch">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input id="studentSearch" type="search" placeholder="Cari nama murid, NIS, atau rombel..." autocomplete="off">
                </label>
                <button class="student-directory__search-button" type="submit">Cari</button>
            </div>

            <div class="student-directory__class-tabs" role="tablist" aria-label="Pilih kelas">
                @foreach($classGroups as $kelas => $groupStudents)
                    @php
                        $isActiveTab = ((string) $kelas === (string) $activeKelasKey);
                        $tabLabel = match((string) $kelas) {
                            'Alumni' => 'Alumni',
                            'Lainnya' => 'Lainnya',
                            default => 'Kelas ' . $kelas,
                        };
                    @endphp
                    <button class="student-directory__class-tab {{ $isActiveTab ? 'is-active' : '' }}"
                            type="button"
                            role="tab"
                            aria-selected="{{ $isActiveTab ? 'true' : 'false' }}"
                            data-class-tab="{{ $kelas }}">
                        {{ $tabLabel }}
                        <span>{{ $groupStudents->count() }}</span>
                    </button>
                @endforeach
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
            </div>
        </form>

        <div class="student-directory__summary">
            @php
                $activeLabel = match((string) $activeKelasKey) {
                    'Alumni' => 'alumni',
                    'Lainnya' => 'lainnya',
                    default => 'kelas ' . $activeKelasKey,
                };
            @endphp
            <span>Menampilkan <strong id="studentResultCount">{{ $activeGroup->count() }}</strong> murid <strong id="studentActiveClass">{{ $activeLabel }}</strong></span>
        </div>

        @foreach($classGroups as $kelas => $groupStudents)
            @php
                $isGroupActive = ((string) $kelas === (string) $activeKelasKey);
                $groupTitle = match((string) $kelas) {
                    'Alumni' => 'Alumni',
                    'Lainnya' => 'Murid Lainnya',
                    default => 'Kelas ' . $kelas,
                };
            @endphp
            <div class="student-class-group" data-class-group="{{ $kelas }}" {{ $isGroupActive ? '' : 'hidden' }}>
                <div class="student-class-group__header">
                    <div class="student-class-group__badge">
                        <i class="fa-solid fa-layer-group"></i>
                    </div>
                    <div>
                        <h2 class="student-class-group__title">{{ $groupTitle }}</h2>
                        <span class="student-class-group__count">
                            <span class="student-class-group__visible-count" data-group-count="{{ $kelas }}">{{ $groupStudents->count() }}</span>
                            murid
                        </span>
                    </div>
                </div>

                <div class="student-directory__grid">
                    @foreach($groupStudents as $student)
                        <a href="{{ route('students.show', $student) }}"
                           class="student-profile-card"
                           data-student-card
                           data-search="{{ strtolower($student->name . ' ' . ($student->nis ?? '') . ' ' . ($student->rombel ?? '')) }}"
                           data-rombel="{{ strtolower($student->rombel ?? '') }}"
                           data-class="{{ $student->kelas ?? '' }}">
                            <div class="student-profile-card__avatar">
                                @if($student->photo)
                                    <img src="{{ \Illuminate\Support\Str::startsWith($student->photo, ['http://', 'https://']) ? $student->photo : asset('storage/' . $student->photo) }}" alt="Foto {{ $student->name }}" onerror="this.style.display='none'; if(this.nextElementSibling) this.nextElementSibling.style.display='inline-block';">
                                    <i class="fa-solid fa-user" style="display: none;"></i>
                                @else
                                    <i class="fa-solid fa-user"></i>
                                @endif
                            </div>
                            <div class="student-profile-card__details">
                                <p class="student-profile-card__name">{{ $student->name ?? 'Nama Siswa' }}</p>
                                <p class="student-profile-card__nis">NIS: {{ $student->nis ?? 'Belum tersedia' }}</p>
                                <span class="student-profile-card__class">{{ $student->rombel ?? 'Rombel belum tersedia' }}</span>
                                <div class="student-profile-card__actions">
                                    <span class="student-profile-card__social"><i class="fa-brands fa-linkedin-in"></i></span>
                                    <span class="student-profile-card__social"><i class="fa-brands fa-whatsapp"></i></span>
                                    <span class="student-profile-card__social"><i class="fa-brands fa-instagram"></i></span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <p class="student-directory__no-result student-class-group__no-result" data-group-no-result="{{ $kelas }}" hidden>
                    Tidak ada murid yang cocok di kelas ini.
                </p>
            </div>
        @endforeach

        <p class="student-directory__no-result" id="studentNoResult" hidden>Murid yang kamu cari belum ditemukan.</p>
    </div>
</section>

<script>
    const studentSearchForm = document.getElementById('studentSearchForm');
    const studentSearch     = document.getElementById('studentSearch');
    const studentRombel     = document.getElementById('studentRombel');
    const studentCards      = [...document.querySelectorAll('[data-student-card]')];
    const studentResultCount = document.getElementById('studentResultCount');
    const studentNoResult   = document.getElementById('studentNoResult');
    const filterToggle      = document.getElementById('filterToggle');
    const studentFilters    = document.getElementById('studentFilters');
    const classTabs         = [...document.querySelectorAll('[data-class-tab]')];
    const studentActiveClass = document.getElementById('studentActiveClass');
    let activeClass = classTabs.find((tab) => tab.classList.contains('is-active'))?.dataset.classTab ?? '';

    const filterStudents = () => {
        const query  = studentSearch.value.trim().toLowerCase();
        const rombel = studentRombel.value;
        let visible  = 0;

        studentCards.forEach((card) => {
            const isVisible = card.dataset.search.includes(query)
                && (!rombel || card.dataset.rombel === rombel)
                && card.dataset.class === activeClass;

            card.hidden = !isVisible;
            if (isVisible) {
                visible++;
            }
        });

        studentResultCount.textContent = visible;
        studentNoResult.hidden = visible !== 0;
        const activeGroupCount = document.querySelector('[data-group-count="' + activeClass + '"]');
        const activeGroupNoResult = document.querySelector('[data-group-no-result="' + activeClass + '"]');

        if (activeGroupCount) {
            activeGroupCount.textContent = visible;
        }

        if (activeGroupNoResult) {
            activeGroupNoResult.hidden = visible !== 0;
        }
    };

    studentSearchForm?.addEventListener('submit', (e) => { e.preventDefault(); filterStudents(); });
    studentSearch?.addEventListener('input', filterStudents);
    studentRombel?.addEventListener('change', filterStudents);

    classTabs.forEach((tab) => {
        tab.addEventListener('click', () => {
            activeClass = tab.dataset.classTab;
            classTabs.forEach((classTab) => {
                const isActive = classTab === tab;
                classTab.classList.toggle('is-active', isActive);
                classTab.setAttribute('aria-selected', String(isActive));
            });
            document.querySelectorAll('.student-class-group').forEach((section) => {
                section.hidden = section.dataset.classGroup !== activeClass;
            });
            studentActiveClass.textContent = ['alumni', 'lainnya'].includes(activeClass.toLowerCase())
                ? activeClass.toLowerCase()
                : 'kelas ' + activeClass;
            filterStudents();
        });
    });

    filterToggle?.addEventListener('click', () => {
        const isExpanded = filterToggle.getAttribute('aria-expanded') === 'true';
        filterToggle.setAttribute('aria-expanded', String(!isExpanded));
        studentFilters.hidden = isExpanded;
    });
</script>

@endsection
