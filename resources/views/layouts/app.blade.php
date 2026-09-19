<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>
        @yield('title', 'Rayon Cibedug 1')
    </title>

    <meta name="description"
          content="Website resmi Rayon Cibedug 1 SMK Wikrama Bogor">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">

        <div class="container navbar-container">

            <a href="{{ route('home') }}" class="brand">

                <img
                    class="brand-logo"
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTp3T5PBvrOMH4FUefAbhETRbYdg3UHqwLBC7N4VekGIg&s=10"
                    alt="SMK Wikrama Bogor">

                <div class="brand-text">
                    <strong>Cibedug 1</strong>
                </div>

            </a>

            <div class="nav-menu">

                <a href="{{ route('home') }}"
                   class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    Home
                </a>

                <a href="{{ route('gallery') }}"
                   class="{{ request()->routeIs('gallery') ? 'active' : '' }}">
                    Galeri
                </a>

                <a href="{{ route('students') }}"
                   class="{{ request()->routeIs('students') ? 'active' : '' }}">
                    Siswa
                </a>

                <a href="{{ route('duty-schedule') }}"
                   class="{{ request()->routeIs('duty-schedule') ? 'active' : '' }}">
                    Jadwal Piket
                </a>

                @auth
                    <a href="{{ route('profile.edit') }}" class="admin-button user-profile-link">
                        @if(auth()->user()->profile_photo)
                            <img src="{{ asset('storage/'.auth()->user()->profile_photo) }}" alt="Foto {{ auth()->user()->name }}">
                        @else
                            <i class="fa-solid fa-user"></i>
                        @endif
                        {{ auth()->user()->name }}
                    </a>
                    <form method="POST" action="{{ route('admin.logout') }}" class="logout-form">
                        @csrf
                        <button type="submit" class="logout-button">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('admin.login') }}" class="admin-button">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Login
                    </a>
                @endauth

            </div>

            <button class="mobile-menu-button"
                    onclick="toggleMenu()">

                <i class="fa-solid fa-bars"></i>

            </button>

        </div>

    </nav>


    <!-- CONTENT -->

    <main>
        @yield('content')
    </main>


    <!-- FOOTER -->

    <footer class="footer">

        <div class="container footer-container">

            <div>
                <span>
                    <i class="fa-solid fa-location-dot"></i>
                    Alamat
                </span>

                <p>
                    Jl. Raya Wangun Kelurahan Sindangsari Bogor Timur 16720
                </p>
            </div>

            <!-- PETA GOOGLE MAPS -->
            <div class="footer-map">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.0138401170886!2d106.84130027499402!3d-6.645371993349132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8e169112f47%3A0x23a3b2b00224d081!2sSMK%20Wikrama%20Bogor!5e0!3m2!1sid!2sid!4v1710000000000!5m2!1sid!2sid" 
                    width="100%" 
                    height="200" 
                    style="border:0; border-radius: 8px;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <div class="footer-info">

                <span>
                    <i class="fa-solid fa-phone"></i>
                    085772013534
                    (WhatsApp)
                </span>

                <span>
                    <i class="fa-solid fa-graduation-cap"></i>
                    SMK Wikrama Bogor
                </span>

            </div>

        </div>

        <div class="footer-bottom">

            © {{ date('Y') }} Rayon Cibedug 1.
            All rights reserved.

        </div>

    </footer>


    <script>

        function toggleMenu() {

            const menu =
                document.querySelector('.nav-menu');

            menu.classList.toggle('show');

        }

    </script>

</body>
</html>