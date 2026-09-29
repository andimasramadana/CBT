@extends('layouts.app')

@section('title', 'Tambah Jadwal Piket - Admin')

@section('content')
<section class="section profile-management-page">
    <div class="container profile-management-page__container">
        <div class="admin-page-top-nav">
            <a href="{{ route('admin.duty-schedule.index') }}" class="admin-back-link">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Jadwal Piket
            </a>
        </div>

        <div class="section-header">
            <div class="section-label">Administrator</div>
            <h1 class="section-title">Tambah Jadwal Piket</h1>
            <p class="section-description">Tambahkan jadwal piket untuk satu hari baru.</p>
        </div>

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

        <form method="POST" action="{{ route('admin.duty-schedule.store') }}" class="profile-form admin-student-form">
            @csrf

            <div class="admin-form-section">
                <h3 class="admin-form-section__title"><i class="fa-solid fa-calendar-day"></i> Informasi Jadwal</h3>

                <div class="admin-two-col">
                    <label>
                        Nama Hari <span class="text-danger">*</span>
                        <input type="text" name="day" value="{{ old('day') }}"
                               placeholder="Contoh: Senin" required>
                    </label>

                    <label>
                        Urutan Hari <span class="text-danger">*</span>
                        <input type="number" name="order" value="{{ old('order', 1) }}"
                               min="0" placeholder="1 = Senin, 2 = Selasa, dst." required>
                    </label>
                </div>

                <label>
                    Daftar Siswa Piket <span class="text-danger">*</span>
                    <textarea name="students" rows="8"
                              placeholder="Tulis satu nama per baris, contoh:&#10;Ahmad&#10;Budi&#10;Cici" required
                              style="resize: vertical;">{{ old('students') }}</textarea>
                </label>
                <small class="text-muted" style="margin-top: -0.5rem; margin-bottom: 1rem; display: block;">
                    Tulis satu nama siswa per baris.
                </small>
            </div>

            <div class="admin-form-actions" style="display:flex; gap:.75rem; margin-top:1.5rem;">
                <button type="submit" class="btn-admin-action btn-admin-action--primary">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Jadwal
                </button>
                <a href="{{ route('admin.duty-schedule.index') }}" class="btn-admin-action btn-admin-action--secondary">
                    Batal
                </a>
            </div>
        </form>
    </div>
</section>
@endsection
