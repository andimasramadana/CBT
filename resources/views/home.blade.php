@extends('layouts.app')

@section('title', 'Home - Rayon Cibedug 1')

@section('content')

<!-- HERO -->

<section class="hero">

    <div class="container hero-content">

        <div>

            <h1>

                Rayon

                <span>Cibedug 1.</span>

            </h1>

            <p class="hero-description">

                Ruang informasi dan dokumentasi
                Rayon Cibedug 1 SMK Wikrama Bogor.
                Temukan profil siswa, galeri kegiatan,
                serta berbagai prestasi yang telah diraih.

            </p>

            <div class="hero-buttons">

                <a href="{{ route('students') }}"
                   class="btn btn-primary">

                    <i class="fa-solid fa-users"></i>

                    Lihat Profil Siswa

                </a>

                <a href="{{ route('gallery') }}"
                   class="btn btn-secondary">

                    <i class="fa-solid fa-images"></i>

                    Lihat Galeri

                </a>

            </div>

        </div>


        <div class="hero-3d-visual" aria-label="Visual teknologi digital Rayon Cibedug 1">
            <div class="hero-3d-visual__glow"></div>
            <div class="hero-3d-visual__orb hero-3d-visual__orb--one"></div>
            <div class="hero-3d-visual__orb hero-3d-visual__orb--two"></div>

            <div class="hero-device hero-device--laptop-main">
                <div class="hero-device__screen">
                    <div class="hero-device__topbar"><span></span><span></span><span></span><b>cibedug-1 • informasi rayon</b></div>
                    <div class="hero-device__rayon-site">
                        <div class="hero-device__site-nav"><strong>Rayon Cibedug 1</strong><span>Profil</span><span>Kegiatan</span><span>Galeri</span></div>
                        <div class="hero-device__site-feature">
                            <div class="hero-device__site-photo"><i class="fa-solid fa-people-group"></i></div>
                            <div><small>KEGIATAN TERBARU</small><strong>Belajar, berkarya, dan bertumbuh bersama</strong><p>Jelajahi cerita siswa Rayon Cibedug 1.</p></div>
                        </div>
                        <div class="hero-device__site-links"><span><i class="fa-solid fa-user-group"></i><b>Profil siswa</b></span><span><i class="fa-solid fa-camera-retro"></i><b>Galeri kegiatan</b></span><span><i class="fa-solid fa-award"></i><b>Prestasi rayon</b></span></div>
                        <div class="hero-device__site-news"><i class="fa-solid fa-bullhorn"></i><span>Agenda dan pengumuman terbaru rayon</span></div>
                    </div>
                </div>
                <div class="hero-device__laptop-hinge"></div>
                <div class="hero-device__laptop-deck"><span></span></div>
            </div>

            <div class="hero-device hero-device--laptop">
                <div class="hero-device__laptop-screen">
                    <div class="hero-device__laptop-line"></div>
                    <div class="hero-device__laptop-card"></div>
                    <div class="hero-device__laptop-card short"></div>
                </div>
                <div class="hero-device__keyboard"></div>
            </div>

            <div class="hero-device hero-device--phone">
                <div class="hero-device__phone-notch"></div>
                <strong>Agenda</strong>
                <small>Kegiatan siswa</small>
                <b>Expo Karya</b>
                <div class="hero-device__phone-line"></div>
                <div class="hero-device__phone-line short"></div>
                <span class="hero-device__phone-dot"></span>
            </div>

            <div class="hero-ui-card hero-ui-card--activity"><i class="fa-solid fa-book-open"></i><span><b>Cerita rayon</b><small>Ruang berbagi siswa</small></span></div>
            <div class="hero-ui-card hero-ui-card--album"><i class="fa-solid fa-images"></i><span><b>Album kegiatan</b><small>Kenangan rayon</small></span></div>
            <div class="hero-prop hero-prop--book"><span>CATATAN</span><b>Ide &amp;<br>cerita siswa</b></div>
            <div class="hero-prop hero-prop--notebook"><i></i><i></i><i></i></div>
            <div class="hero-prop hero-prop--pencil"></div>
            <div class="hero-prop hero-prop--camera"><i class="fa-solid fa-camera"></i></div>
            <div class="hero-prop hero-prop--school-card"><small>SMK WIKRAMA</small><strong>Rayon<br>Cibedug 1</strong><i class="fa-solid fa-graduation-cap"></i></div>
        </div>

    </div>

</section>


<!-- INFORMASI -->

<section class="section">

    <div class="container">

        <div class="section-header">

            <div class="section-label">
                Jelajahi Website
            </div>

            <h2 class="section-title">
                Semua informasi Rayon
            </h2>

            <p class="section-description">

                Temukan berbagai informasi mengenai
                Rayon Cibedug 1 melalui beberapa
                halaman yang tersedia.

            </p>

        </div>


        <div class="cards">

            <!-- GALERI -->

            <a href="{{ route('gallery') }}"
               class="card">

                <div class="card-icon">

                    <i class="fa-solid fa-images"></i>

                </div>

                <h3>
                    Galeri
                </h3>

                <p>

                    Lihat dokumentasi kegiatan
                    dan momen bersama Rayon
                    Cibedug 1.

                </p>

            </a>


            <!-- PRESTASI -->

            <a href="{{ route('achievement') }}"
               class="card">

                <div class="card-icon">

                    <i class="fa-solid fa-trophy"></i>

                </div>

                <h3>
                    Prestasi
                </h3>

                <p>

                    Berbagai pencapaian dan
                    prestasi siswa Rayon
                    Cibedug 1.

                </p>

            </a>


            <!-- SISWA -->

            <a href="{{ route('students') }}"
               class="card">

                <div class="card-icon">

                    <i class="fa-solid fa-user-graduate"></i>

                </div>

                <h3>
                    Profil Siswa
                </h3>

                <p>

                    Kenali siswa-siswi yang
                    menjadi bagian dari
                    Rayon Cibedug 1.

                </p>

            </a>


        </div>

    </div>

</section>

<section class="mentor-section">
    <div class="container mentor-section__inner">
        <div class="mentor-section__portrait-wrap">
            <div class="mentor-section__glow"></div>
            <img
                class="mentor-section__portrait"
                src="https://i.pravatar.cc/480?img=12"
                alt="Bapak Dede Hermansyah S pembimbing Rayon Cibedug 1">
        </div>

        <div class="mentor-section__content">
            <span class="mentor-section__eyebrow"><i class="fa-solid fa-chalkboard-user"></i> Pembimbing Rayon</span>
            <h2>Bapak Dede Hermansyah S</h2>
            <p>
                Pembimbing Rayon Cibedug 1 yang mendampingi siswa dalam kegiatan,
                pengembangan diri, dan perjalanan belajar di SMK Wikrama Bogor.
            </p>
            <div class="mentor-section__signature">
                <i class="fa-solid fa-graduation-cap"></i>
                <span>SMK Wikrama Bogor</span>
            </div>
        </div>
    </div>
</section>

@endsection