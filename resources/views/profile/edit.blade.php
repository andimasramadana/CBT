@extends('layouts.app')

@section('title', 'Profil Saya - Rayon Cibedug 1')

@section('content')
<section class="section profile-management-page">
    <div class="container profile-management-page__container">
        <div class="section-header">
            <div class="section-label">Akun Saya</div>
            <h1 class="section-title">Edit Profil</h1>
            <p class="section-description">Perbarui foto, biodata, dan tautan sosial Anda.</p>
        </div>

        @if(session('status'))
            <div class="profile-form__status">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="profile-form">
            @csrf
            @method('PUT')
            <div class="profile-form__avatar">
                @if($user->profile_photo)
                    <img src="{{ asset('storage/'.$user->profile_photo) }}" alt="Foto {{ $user->name }}">
                @else
                    <i class="fa-solid fa-user"></i>
                @endif
            </div>
            <label>Foto profil<input type="file" name="profile_photo" accept="image/*"></label>
            <label>Nama<input type="text" name="name" value="{{ old('name', $user->name) }}" required></label>
            <label>Email<input type="email" name="email" value="{{ old('email', $user->email) }}" required></label>
            <label>Bio<textarea name="bio" rows="4">{{ old('bio', $user->bio) }}</textarea></label>
            <label>Instagram<input type="url" name="instagram_url" value="{{ old('instagram_url', $user->instagram_url) }}" placeholder="https://instagram.com/username"></label>
            <label>WhatsApp<input type="url" name="whatsapp_url" value="{{ old('whatsapp_url', $user->whatsapp_url) }}" placeholder="https://wa.me/628..."></label>
            <label>LinkedIn<input type="url" name="linkedin_url" value="{{ old('linkedin_url', $user->linkedin_url) }}" placeholder="https://linkedin.com/in/username"></label>
            <button type="submit" class="btn btn-primary">Simpan Profil</button>
        </form>
    </div>
</section>
@endsection
