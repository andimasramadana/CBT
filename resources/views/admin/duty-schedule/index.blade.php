@extends('layouts.app')

@section('title', 'Kelola Jadwal Piket - Admin')

@section('content')
<section class="section profile-management-page">
    <div class="container">

        @if(session('status'))
            <div class="admin-alert admin-alert--success">
                <i class="fa-solid fa-circle-check"></i>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        <div class="section-header">
            <div class="section-label">Administrator</div>
            <h1 class="section-title">Kelola Jadwal Piket</h1>
            <p class="section-description">Atur jadwal piket rayon setiap hari.</p>
        </div>

        <div class="admin-panel-card">
            <div class="admin-panel-card__header">
                <div>
                    <h2 class="admin-panel-card__title">
                        <i class="fa-solid fa-calendar-check"></i> Daftar Jadwal Piket
                    </h2>
                    <p class="admin-panel-card__subtitle">
                        Klik edit untuk mengubah daftar siswa yang piket pada hari tersebut.
                    </p>
                </div>
                <a href="{{ route('admin.duty-schedule.create') }}" class="btn-admin-action btn-admin-action--primary">
                    <i class="fa-solid fa-plus"></i> Tambah Hari
                </a>
            </div>

            <div class="admin-table-responsive">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Urutan</th>
                            <th>Hari</th>
                            <th>Daftar Siswa Piket</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($schedules as $schedule)
                            <tr>
                                <td><span class="admin-table-nis">{{ $schedule->order }}</span></td>
                                <td><strong>{{ $schedule->day }}</strong></td>
                                <td>
                                    <div class="admin-duty-name-list">
                                        @foreach($schedule->students as $name)
                                            <span class="admin-duty-name-chip">{{ $name }}</span>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="text-end">
                                    <div class="admin-table-actions">
                                        <a href="{{ route('admin.duty-schedule.edit', $schedule) }}"
                                           class="btn-table-edit" title="Edit jadwal piket">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                        <form method="POST"
                                              action="{{ route('admin.duty-schedule.destroy', $schedule) }}"
                                              class="d-inline"
                                              onsubmit="return confirm('Hapus jadwal piket hari {{ $schedule->day }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-table-delete" title="Hapus">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <div class="admin-empty-table">
                                        <i class="fa-solid fa-calendar-xmark"></i>
                                        <p>Belum ada jadwal piket. Tambahkan jadwal baru.</p>
                                        <a href="{{ route('admin.duty-schedule.create') }}"
                                           class="btn-admin-action btn-admin-action--primary">
                                            Tambah Jadwal Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div style="padding: 1rem 1.5rem;">
                <a href="{{ route('profile.edit') }}" class="admin-back-link">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Panel Admin
                </a>
            </div>
        </div>

    </div>
</section>
@endsection
