<nav class="navbar navbar-expand-lg floating-navbar" id="mainNavbar">

    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
            <div class="brand-icon">
                <i class="fa-solid fa-school"></i>
            </div>

            <div>
                <strong>CIBEDUG 1</strong>
                <small>SMK WIKRAMA BOGOR</small>
            </div>
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarContent">

            <i class="fa-solid fa-bars"></i>

        </button>

        <div
            class="collapse navbar-collapse"
            id="navbarContent">

            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">

                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}"
                        href="{{ route('gallery.index') }}">
                        Galeri
                    </a>
                </li>

                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('students.*') ? 'active' : '' }}"
                        href="{{ route('students.index') }}">
                        Profil Siswa
                    </a>
                </li>

                <li class="nav-item ms-lg-2">
                    <a
                        href="{{ route('admin.login') }}"
                        class="btn btn-admin">
                        <i class="fa-solid fa-lock me-1"></i>
                        Admin
                    </a>
                </li>

            </ul>

        </div>

    </div>

</nav>