@extends('layouts.app')

@section('title', 'Login - Rayon Cibedug 1')

@section('content')

<section class="login-page">
    <div class="login-wrapper">
        <div class="login-form-panel">
            <div class="login-form-header">
                <h2>Masuk untuk memulai Rayon Cibedug 1</h2>
            </div>

            @if($errors->any())
                <div class="login-error">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    {{ $errors->first('login') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.process') }}" class="login-form">
                @csrf

                <div class="login-field">
                    <label for="login-username">Username atau NIS</label>
                    <div class="login-input-wrap">
                        <input
                            id="login-username"
                            type="text"
                            name="login"
                            value="{{ old('login') }}"
                            placeholder="Masukkan username atau NIS"
                            autocomplete="username"
                            required
                            autofocus
                        >
                    </div>
                </div>

                <div class="login-field">
                    <label for="login-password">Password</label>
                    <div class="login-input-wrap">
                        <input
                            id="login-password"
                            type="password"
                            name="password"
                            placeholder="Masukkan password"
                            autocomplete="current-password"
                            required
                        >
                        <button type="button" class="login-toggle-pw" onclick="togglePassword()" title="Tampilkan password">
                            <i class="fa-solid fa-eye" id="pw-toggle-icon"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="login-submit-btn">Masuk</button>
            </form>

            <p class="login-help">Lupa password? Hubungi pembimbing rayon.</p>
        </div>
    </div>

    <a href="{{ route('students') }}" class="login-explore-button">
        <i class="fa-solid fa-compass"></i>
        Jelajahi siswa
    </a>

</section>

<script>
    function togglePassword() {
        const input = document.getElementById('login-password');
        const icon = document.getElementById('pw-toggle-icon');

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>

@endsection
