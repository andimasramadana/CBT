@extends('layouts.app')

@section('title', 'Tambah Siswa Baru - Admin Rayon Cibedug 1')

@section('content')
<section class="section profile-management-page">
    <div class="container profile-management-page__container">
        <div class="admin-page-top-nav">
            <a href="{{ route('profile.edit') }}" class="admin-back-link">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Panel Admin
            </a>
        </div>

        <div class="section-header">
            <div class="section-label">Administrator</div>
            <h1 class="section-title">Tambah Siswa Baru</h1>
            <p class="section-description">Masukkan biodata lengkap siswa untuk Rayon Cibedug 1.</p>
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

        <form method="POST" action="{{ route('admin.students.store') }}" enctype="multipart/form-data" class="profile-form admin-student-form">
            @csrf

            <div class="admin-form-section">
                <h3 class="admin-form-section__title"><i class="fa-solid fa-id-card"></i> Informasi Pokok</h3>
                
                <label>
                    Foto Siswa
                    <input type="file" name="photo" accept="image/*">
                </label>
                <small class="text-muted" style="margin-top: -0.5rem; margin-bottom: 1rem; display: block;">Format JPG, PNG atau WebP (Maks. 5MB)</small>

                <div class="admin-two-col">
                    <label>
                        Nama Lengkap <span class="text-danger">*</span>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Muhammad Raihan" required>
                    </label>

                    <label>
                        NIS (Nomor Induk Siswa)
                        <input type="text" name="nis" value="{{ old('nis') }}" placeholder="Contoh: 12209123">
                    </label>
                </div>

                <div class="admin-two-col">
                    <label>
                        Rombel <span class="text-danger">*</span>
                        <input type="text" name="rombel" value="{{ old('rombel') }}" placeholder="Contoh: PPLG XII-1 / RPL X-2" required>
                    </label>

                    <label>
                        Rayon <span class="text-danger">*</span>
                        <input type="text" name="rayon" value="{{ old('rayon', 'Cibedug 1') }}" required>
                    </label>
                </div>
            </div>

            <div class="admin-form-section">
                <h3 class="admin-form-section__title"><i class="fa-solid fa-user-pen"></i> Biodata &amp; Minat</h3>

                <label>
                    Biodata / Tentang Siswa (Bio)
                    <textarea name="bio" rows="4" placeholder="Tulis pengenalan singkat atau deskripsi diri siswa...">{{ old('bio') }}</textarea>
                </label>

                <div class="admin-two-col">
                    <label>
                        Keahlian (Skills)
                        <textarea name="skills" rows="3" placeholder="Contoh: Laravel, UI/UX Design, Python...">{{ old('skills') }}</textarea>
                    </label>

                    <label>
                        Minat (Interests)
                        <textarea name="interests" rows="3" placeholder="Contoh: Web Development, Mobile Apps, AI...">{{ old('interests') }}</textarea>
                    </label>
                </div>
            </div>

            <div class="admin-form-section">
                <h3 class="admin-form-section__title"><i class="fa-solid fa-share-nodes"></i> Kontak &amp; Media Sosial</h3>

                <label>
                    URL Instagram
                    <input type="url" name="instagram_url" value="{{ old('instagram_url') }}" placeholder="https://instagram.com/username">
                </label>

                <label>
                    URL WhatsApp
                    <input type="url" name="whatsapp_url" value="{{ old('whatsapp_url') }}" placeholder="https://wa.me/628123456789">
                </label>

                <label>
                    URL LinkedIn
                    <input type="url" name="linkedin_url" value="{{ old('linkedin_url') }}" placeholder="https://linkedin.com/in/username">
                </label>
            </div>

            <div class="admin-form-actions-bar">
                <a href="{{ route('profile.edit') }}" class="btn-cancel">Batal</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-user-plus"></i> Simpan Data Siswa
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
