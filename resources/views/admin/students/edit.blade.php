@extends('layouts.app')

@section('title', 'Edit Siswa - Admin')

@section('content')
<section class="section profile-management-page">
    <div class="container profile-management-page__container">
        <div class="section-header">
            <div class="section-label">Administrator</div>
            <h1 class="section-title">Edit Profil Siswa</h1>
            <p class="section-description">Perbarui biodata siswa, foto, dan tautan sosialnya.</p>
        </div>

        @if(session('status'))
            <div class="profile-form__status">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.students.update', $student) }}" enctype="multipart/form-data" class="profile-form">
            @csrf
            @method('PUT')
            <div class="profile-form__avatar">
                @if($student->photo)
                    <img src="{{ asset('storage/'.$student->photo) }}" alt="Foto {{ $student->name }}">
                @else
                    <i class="fa-solid fa-user"></i>
                @endif
            </div>
            <label>Foto profil<input type="file" name="photo" accept="image/*"></label>
            <label>Nama<input type="text" name="name" value="{{ old('name', $student->name) }}" required></label>
            <label>NIS<input type="text" name="nis" value="{{ old('nis', $student->nis) }}"></label>
            <label>Rombel<input type="text" name="rombel" value="{{ old('rombel', $student->rombel) }}" required></label>
            <label>Rayon<input type="text" name="rayon" value="{{ old('rayon', $student->rayon) }}" required></label>
            <label>Bio<textarea name="bio" rows="4">{{ old('bio', $student->bio) }}</textarea></label>
            <label>Keahlian<textarea name="skills" rows="3">{{ old('skills', $student->skills) }}</textarea></label>
            <label>Minat<textarea name="interests" rows="3">{{ old('interests', $student->interests) }}</textarea></label>
            <label>Instagram<input type="url" name="instagram_url" value="{{ old('instagram_url', $student->instagram_url) }}"></label>
            <label>WhatsApp<input type="url" name="whatsapp_url" value="{{ old('whatsapp_url', $student->whatsapp_url) }}"></label>
            <label>LinkedIn<input type="url" name="linkedin_url" value="{{ old('linkedin_url', $student->linkedin_url) }}"></label>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</section>
@endsection
