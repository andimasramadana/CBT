<footer class="footer-section">

    <div class="container">

        <div class="row g-4">

            <div class="col-lg-5">

                <h4>
                    <i class="fa-solid fa-school me-2"></i>
                    Rayon Cibedug 1
                </h4>

                <p>
                    Website informasi dan dokumentasi
                    Rayon Cibedug 1 SMK Wikrama Bogor.
                </p>

            </div>

            <div class="col-lg-3">

                <h6>Navigasi</h6>

                <ul class="footer-links">

                    <li>
                        <a href="{{ route('home') }}">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('gallery.index') }}">
                            Galeri
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('achievements.index') }}">
                            Prestasi
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('students.index') }}">
                            Profil Siswa
                        </a>
                    </li>

                </ul>

            </div>

            <div class="col-lg-4">

                <h6>Rayon Cibedug 1</h6>

                <p>
                    SMK Wikrama Bogor
                </p>

                <div class="social-links">

                    <a href="#">
                        <i class="fab fa-instagram"></i>
                    </a>

                    <a href="#">
                        <i class="fab fa-tiktok"></i>
                    </a>

                </div>

            </div>

        </div>

        <hr>

        <div class="text-center">

            <small>
                © {{ date('Y') }}
                Rayon Cibedug 1 - SMK Wikrama Bogor
            </small>

        </div>

    </div>

</footer>