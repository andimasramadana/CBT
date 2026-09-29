@extends('layouts.app')

@section('title', 'Profil & Panel Administrator - Rayon Cibedug 1')

@section('content')
<section class="section admin-profile-page">
    <div class="container">

        <!-- Status Notification -->
        @if(session('status'))
            <div class="admin-alert admin-alert--success">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="admin-alert admin-alert--danger">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Admin Identity Header -->
        <div class="admin-hero-card">
            <div class="admin-hero-card__main">
                <div class="admin-hero-card__avatar">
                    @if($user->profile_photo)
                        <img src="{{ asset('storage/'.$user->profile_photo) }}" alt="Foto {{ $user->name }}">
                    @else
                        <div class="admin-avatar-fallback">
                            <i class="fa-solid fa-user-shield"></i>
                        </div>
                    @endif
                </div>
                <div class="admin-hero-card__info">
                    <div class="admin-badge-row">
                        <span class="admin-role-badge">
                            <i class="fa-solid fa-shield-halved"></i> Administrator Rayon
                        </span>
                        <span class="admin-nonstudent-badge">
                            <i class="fa-solid fa-id-badge"></i> Bukan Akun Siswa
                        </span>
                    </div>
                    <h1 class="admin-hero-card__name">{{ $user->name }}</h1>
                    <p class="admin-hero-card__email">
                        <i class="fa-solid fa-envelope"></i> {{ $user->email }}
                    </p>
                    <p class="admin-hero-card__desc">
                        Akun ini memiliki hak akses tingkat lanjut untuk <strong>mengubah semua data siswa</strong>, 
                        menambah siswa baru, dan memperbarui informasi Rayon Cibedug 1 secara menyeluruh.
                    </p>
                </div>
            </div>

            <div class="admin-hero-card__actions">
                <a href="#adminSettings" class="btn-admin-action btn-admin-action--secondary">
                    <i class="fa-solid fa-gear"></i> Pengaturan Akun
                </a>
                <a href="{{ route('admin.duty-schedule.index') }}" class="btn-admin-action btn-admin-action--secondary">
                    <i class="fa-solid fa-calendar-check"></i> Jadwal Piket
                </a>
                <a href="{{ route('admin.students.create') }}" class="btn-admin-action btn-admin-action--primary">
                    <i class="fa-solid fa-user-plus"></i> Tambah Siswa Baru
                </a>
            </div>
        </div>

        @php
            $countTotal = $students->count();
            $count10 = $students->filter(fn($s) => str_contains(strtoupper($s->rombel ?? ''), 'X') && !str_contains(strtoupper($s->rombel ?? ''), 'XI') && !str_contains(strtoupper($s->rombel ?? ''), 'XII'))->count();
            $count11 = $students->filter(fn($s) => str_contains(strtoupper($s->rombel ?? ''), 'XI') && !str_contains(strtoupper($s->rombel ?? ''), 'XII'))->count();
            $count12 = $students->filter(fn($s) => str_contains(strtoupper($s->rombel ?? ''), 'XII'))->count();
        @endphp

        <!-- Quick Stats Cards -->
        <div class="admin-stats-grid">
            <div class="admin-stat-card">
                <div class="admin-stat-card__icon admin-stat-card__icon--blue">
                    <i class="fa-solid fa-users"></i>
                </div>
                <div class="admin-stat-card__content">
                    <span class="admin-stat-card__label">Total Siswa</span>
                    <strong class="admin-stat-card__val">{{ $countTotal }}</strong>
                </div>
            </div>

            <div class="admin-stat-card">
                <div class="admin-stat-card__icon admin-stat-card__icon--purple">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <div class="admin-stat-card__content">
                    <span class="admin-stat-card__label">Kelas 10 (X)</span>
                    <strong class="admin-stat-card__val">{{ $count10 }}</strong>
                </div>
            </div>

            <div class="admin-stat-card">
                <div class="admin-stat-card__icon admin-stat-card__icon--amber">
                    <i class="fa-solid fa-user-graduate"></i>
                </div>
                <div class="admin-stat-card__content">
                    <span class="admin-stat-card__label">Kelas 11 (XI)</span>
                    <strong class="admin-stat-card__val">{{ $count11 }}</strong>
                </div>
            </div>

            <div class="admin-stat-card">
                <div class="admin-stat-card__icon admin-stat-card__icon--emerald">
                    <i class="fa-solid fa-award"></i>
                </div>
                <div class="admin-stat-card__content">
                    <span class="admin-stat-card__label">Kelas 12 (XII)</span>
                    <strong class="admin-stat-card__val">{{ $count12 }}</strong>
                </div>
            </div>
        </div>

        <!-- Student Management Section -->
        <div class="admin-panel-card">
            <div class="admin-panel-card__header">
                <div>
                    <h2 class="admin-panel-card__title">
                        <i class="fa-solid fa-address-book"></i> Kelola Seluruh Data Siswa
                    </h2>
                    <p class="admin-panel-card__subtitle">
                        Pilih siswa di bawah ini untuk mengubah biodata, rombel, foto, keahlian, ataupun kontak sosialnya.
                    </p>
                </div>
                <a href="{{ route('admin.students.create') }}" class="btn-admin-action btn-admin-action--primary">
                    <i class="fa-solid fa-plus"></i> Tambah Siswa
                </a>
            </div>

            <!-- Search & Filter Controls -->
            <div class="admin-filter-bar">
                <div class="admin-search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" id="adminStudentSearch" placeholder="Cari nama siswa, NIS, atau rombel...">
                </div>

                <div class="admin-filter-select-wrap">
                    <label for="adminClassFilter"><i class="fa-solid fa-filter"></i></label>
                    <select id="adminClassFilter">
                        <option value="">Semua Kelas</option>
                        <option value="10">Kelas 10 (X)</option>
                        <option value="11">Kelas 11 (XI)</option>
                        <option value="12">Kelas 12 (XII)</option>
                    </select>
                </div>
            </div>

            <!-- Table / Student List -->
            <div class="admin-table-responsive">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Siswa</th>
                            <th>NIS</th>
                            <th>Rombel &amp; Kelas</th>
                            <th>Rayon</th>
                            <th>Kontak / Medsos</th>
                            <th class="text-end">Aksi Pengelolaan</th>
                        </tr>
                    </thead>
                    <tbody id="adminStudentTbody">
                        @forelse($students as $student)
                            @php
                                $rombel = strtoupper($student->rombel ?? '');
                                $classNum = '0';
                                if (str_contains($rombel, 'XII')) $classNum = '12';
                                elseif (str_contains($rombel, 'XI')) $classNum = '11';
                                elseif (str_contains($rombel, 'X')) $classNum = '10';

                                $searchText = strtolower($student->name . ' ' . ($student->nis ?? '') . ' ' . ($student->rombel ?? ''));
                            @endphp
                            <tr class="admin-student-row-item" 
                                data-search="{{ $searchText }}" 
                                data-class="{{ $classNum }}"
                                data-rombel="{{ strtolower($student->rombel ?? '') }}">
                                <td>
                                    <div class="admin-table-user">
                                        <div class="admin-table-avatar">
                                            @if($student->photo)
                                                <img src="{{ \Illuminate\Support\Str::startsWith($student->photo, ['http://', 'https://']) ? $student->photo : asset('storage/' . $student->photo) }}" 
                                                     alt="Foto {{ $student->name }}"
                                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='grid';">
                                                <div class="avatar-fallback" style="display: none;"><i class="fa-solid fa-user"></i></div>
                                            @else
                                                <div class="avatar-fallback"><i class="fa-solid fa-user"></i></div>
                                            @endif
                                        </div>
                                        <div>
                                            <div class="admin-table-user__name">{{ $student->name }}</div>
                                            @if($student->bio)
                                                <div class="admin-table-user__bio">{{ \Illuminate\Support\Str::limit($student->bio, 50) }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="admin-table-nis">{{ $student->nis ?: '-' }}</span>
                                </td>
                                <td>
                                    <span class="admin-rombel-tag admin-rombel-tag--{{ $classNum }}">
                                        {{ $student->rombel ?: 'Belum diisi' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="admin-rayon-tag">
                                        <i class="fa-solid fa-location-dot"></i> {{ $student->rayon ?: 'Cibedug 1' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="admin-social-links">
                                        @if($student->instagram_url)
                                            <a href="{{ $student->instagram_url }}" target="_blank" rel="noopener" title="Instagram" class="admin-social-icon admin-social-icon--ig"><i class="fa-brands fa-instagram"></i></a>
                                        @endif
                                        @if($student->whatsapp_url)
                                            <a href="{{ $student->whatsapp_url }}" target="_blank" rel="noopener" title="WhatsApp" class="admin-social-icon admin-social-icon--wa"><i class="fa-brands fa-whatsapp"></i></a>
                                        @endif
                                        @if($student->linkedin_url)
                                            <a href="{{ $student->linkedin_url }}" target="_blank" rel="noopener" title="LinkedIn" class="admin-social-icon admin-social-icon--in"><i class="fa-brands fa-linkedin-in"></i></a>
                                        @endif
                                        @if(!$student->instagram_url && !$student->whatsapp_url && !$student->linkedin_url)
                                            <span class="text-muted">-</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="text-end">
                                    <div class="admin-table-actions">
                                        <a href="{{ route('admin.students.edit', $student) }}" class="btn-table-edit" title="Ubah data lengkap siswa ini">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit Data
                                        </a>
                                        <form method="POST" action="{{ route('admin.students.destroy', $student) }}" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data siswa {{ $student->name }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-table-delete" title="Hapus siswa">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="admin-empty-table">
                                        <i class="fa-solid fa-user-slash"></i>
                                        <p>Belum ada data siswa yang tersimpan.</p>
                                        <a href="{{ route('admin.students.create') }}" class="btn-admin-action btn-admin-action--primary">
                                            Tambah Siswa Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- No search results row -->
            <div id="adminNoMatch" class="admin-no-match" hidden>
                <i class="fa-solid fa-magnifying-glass"></i>
                <p>Tidak ada data siswa yang cocok dengan pencarian.</p>
            </div>
        </div>

        <!-- Admin Account Settings Section -->
        <div class="admin-panel-card" id="adminSettings">
            <div class="admin-panel-card__header">
                <div>
                    <h2 class="admin-panel-card__title">
                        <i class="fa-solid fa-user-gear"></i> Pengaturan Akun Administrator
                    </h2>
                    <p class="admin-panel-card__subtitle">
                        Perbarui nama akun admin, alamat email, foto profil, atau ganti password masuk.
                    </p>
                </div>
            </div>

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="admin-account-form">
                @csrf
                @method('PUT')

                <div class="admin-form-grid">
                    <div class="admin-form-group">
                        <label for="adminName">Nama Administrator <span class="text-danger">*</span></label>
                        <input type="text" id="adminName" name="name" value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="admin-form-group">
                        <label for="adminEmail">Email Administrator <span class="text-danger">*</span></label>
                        <input type="email" id="adminEmail" name="email" value="{{ old('email', $user->email) }}" required>
                    </div>

                    <div class="admin-form-group">
                        <label for="adminPassword">Password Baru <small class="text-muted">(Kosongkan jika tidak ingin diubah)</small></label>
                        <input type="password" id="adminPassword" name="password" placeholder="Masukkan password baru...">
                    </div>

                    <div class="admin-form-group">
                        <label for="adminPhoto">Foto Profil Admin</label>
                        <input type="file" id="adminPhoto" name="profile_photo" accept="image/*">
                    </div>
                </div>

                <div class="admin-form-actions">
                    <button type="submit" class="btn-admin-action btn-admin-action--primary">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Pengaturan Akun
                    </button>
                </div>
            </form>
        </div>

    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('adminStudentSearch');
    const classFilter = document.getElementById('adminClassFilter');
    const rows = [...document.querySelectorAll('.admin-student-row-item')];
    const noMatch = document.getElementById('adminNoMatch');

    function filterTable() {
        const query = (searchInput?.value || '').trim().toLowerCase();
        const cls   = classFilter?.value || '';
        let visibleCount = 0;

        rows.forEach(row => {
            const matchesSearch = row.dataset.search.includes(query);
            const matchesClass  = !cls || row.dataset.class === cls;
            const isVisible     = matchesSearch && matchesClass;

            row.style.display = isVisible ? '' : 'none';
            if (isVisible) visibleCount++;
        });

        if (noMatch) {
            noMatch.hidden = (visibleCount > 0);
        }
    }

    searchInput?.addEventListener('input', filterTable);
    classFilter?.addEventListener('change', filterTable);
});
</script>
@endsection
