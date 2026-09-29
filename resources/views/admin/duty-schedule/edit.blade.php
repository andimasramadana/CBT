@extends('layouts.app')

@section('title', 'Edit Jadwal Piket: '.$dutySchedule->day.' - Admin')

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
            <h1 class="section-title">Edit Jadwal Piket – {{ $dutySchedule->day }}</h1>
            <p class="section-description">Ubah daftar siswa yang piket pada hari ini.</p>
        </div>

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

        <form method="POST" action="{{ route('admin.duty-schedule.update', $dutySchedule) }}"
              class="profile-form admin-student-form">
            @csrf
            @method('PUT')

            <div class="admin-form-section">
                <h3 class="admin-form-section__title"><i class="fa-solid fa-calendar-day"></i> Informasi Jadwal</h3>

                <div class="admin-two-col">
                    <label>
                        Nama Hari <span class="text-danger">*</span>
                        <input type="text" name="day"
                               value="{{ old('day', $dutySchedule->day) }}"
                               placeholder="Contoh: Senin" required>
                    </label>

                    <label>
                        Urutan Hari <span class="text-danger">*</span>
                        <input type="number" name="order"
                               value="{{ old('order', $dutySchedule->order) }}"
                               min="0" placeholder="1 = Senin, 2 = Selasa, dst." required>
                    </label>
                </div>

                <label>
                    Daftar Siswa Piket <span class="text-danger">*</span>
                    <textarea name="students" rows="8"
                              placeholder="Tulis satu nama per baris" required
                              style="resize: vertical;">{{ old('students', implode("\n", $dutySchedule->students)) }}</textarea>
                </label>
                <small class="text-muted" style="margin-top: -0.5rem; margin-bottom: 1rem; display: block;">
                    Tulis satu nama siswa per baris.
                </small>
            </div>

            <div class="admin-form-actions" style="display:flex; gap:.75rem; margin-top:1.5rem;">
                <button type="submit" class="btn-admin-action btn-admin-action--primary">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                </button>
                <a href="{{ route('admin.duty-schedule.index') }}" class="btn-admin-action btn-admin-action--secondary">
                    Batal
                </a>
            </div>
        </form>
    </div>
</section>
@endsection
