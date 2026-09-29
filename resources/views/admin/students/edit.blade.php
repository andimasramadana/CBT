@extends('layouts.app')

@section('title', 'Edit Data Siswa: '.$student->name.' - Admin')

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
            <h1 class="section-title">Edit Data Siswa</h1>
            <p class="section-description">Admin dapat mengubah seluruh biodata, kelas, foto, dan informasi siswa {{ $student->name }}.</p>
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

        <form method="POST" action="{{ route('admin.students.update', $student) }}" enctype="multipart/form-data" class="profile-form admin-student-form">
            @csrf
            @method('PUT')

            <div class="admin-form-section">
                <h3 class="admin-form-section__title"><i class="fa-solid fa-id-card"></i> Informasi Pokok</h3>

                <div class="admin-student-edit-avatar-wrap">
                    <div class="profile-form__avatar">
                        @if($student->photo)
                            <img src="{{ \Illuminate\Support\Str::startsWith($student->photo, ['http://', 'https://']) ? $student->photo : asset('storage/'.$student->photo) }}" 
                                 alt="Foto {{ $student->name }}"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='grid';">
                            <div class="avatar-fallback" style="display:none;"><i class="fa-solid fa-user"></i></div>
                        @else
                            <div class="avatar-fallback"><i class="fa-solid fa-user"></i></div>
                        @endif
                    </div>
                    <div>
                        <label>
                            Ganti Foto Profil Siswa
                            <input type="file" name="photo" accept="image/*">
                        </label>
                        <small class="text-muted">Format JPG, PNG atau WebP (Maks. 5MB)</small>
                    </div>
                </div>

                <div class="admin-two-col">
                    <label>
                        Nama Lengkap Siswa <span class="text-danger">*</span>
                        <input type="text" name="name" value="{{ old('name', $student->name) }}" required>
                    </label>

                    <label>
                        NIS (Nomor Induk Siswa)
                        <input type="text" name="nis" value="{{ old('nis', $student->nis) }}">
                    </label>
                </div>

                <div class="admin-two-col">
                    <label>
                        Rombel <span class="text-danger">*</span>
                        <input type="text" name="rombel" value="{{ old('rombel', $student->rombel) }}" placeholder="Contoh: PPLG XII-1" required>
                    </label>

                    <label>
                        Rayon <span class="text-danger">*</span>
                        <input type="text" name="rayon" value="{{ old('rayon', $student->rayon) }}" required>
                    </label>
                </div>
            </div>

            <div class="admin-form-section">
                <h3 class="admin-form-section__title"><i class="fa-solid fa-user-pen"></i> Biodata &amp; Minat</h3>

                <label>
                    Biodata / Tentang Siswa (Bio)
                    <textarea name="bio" rows="4">{{ old('bio', $student->bio) }}</textarea>
                </label>

                <div class="admin-two-col">
                    <label>
                        Keahlian (Skills)
                        <textarea name="skills" rows="3">{{ old('skills', $student->skills) }}</textarea>
                    </label>

                    <label>
                        Minat (Interests)
                        <textarea name="interests" rows="3">{{ old('interests', $student->interests) }}</textarea>
                    </label>
                </div>
            </div>

            <div class="admin-form-section">
                <h3 class="admin-form-section__title"><i class="fa-solid fa-share-nodes"></i> Kontak &amp; Media Sosial</h3>

                <label>
                    URL Instagram
                    <input type="url" name="instagram_url" value="{{ old('instagram_url', $student->instagram_url) }}" placeholder="https://instagram.com/username">
                </label>

                <label>
                    URL WhatsApp
                    <input type="url" name="whatsapp_url" value="{{ old('whatsapp_url', $student->whatsapp_url) }}" placeholder="https://wa.me/628...">
                </label>

                <label>
                    URL LinkedIn
                    <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $student->linkedin_url) }}" placeholder="https://linkedin.com/in/username">
                </label>
            </div>

            <div class="admin-form-actions-bar">
                <a href="{{ route('profile.edit') }}" class="btn-cancel">Batal</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan Data Siswa
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
