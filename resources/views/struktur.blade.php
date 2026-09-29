@extends('layouts.app')

@section('title', 'Struktur Organisasi Rayon')

@section('content')

{{-- ── Hero Banner ───────────────────────────────────────────────── --}}
<section class="org-hero">
    <div class="container">
        <div class="org-hero__inner">
            <div class="org-hero__badge">
                <i class="fa-solid fa-sitemap"></i>
                Organisasi Rayon
            </div>
            <h1 class="org-hero__title">
                Struktur Organisasi
                <span>Rayon Cibedug 1</span>
            </h1>
            <p class="org-hero__sub">
                SMK Wikrama Kota Bogor &mdash; Tahun Ajaran 2026 / 2027
            </p>
        </div>
    </div>
</section>

{{-- ── Chart ─────────────────────────────────────────────────────── --}}
<section class="section">
    <div class="container">
        <div class="org-chart">

            {{-- Level 1: Kepala Sekolah --}}
            <div class="org-level">
                <div class="org-node org-node--primary">
                    <div class="org-node__icon">
                        <i class="fa-solid fa-school"></i>
                    </div>
                    <div class="org-node__body">
                        <div class="org-node__role">Kepala Sekolah</div>
                        <div class="org-node__name">Iin Mulyani, S.Si</div>
                    </div>
                </div>
            </div>

            <div class="org-connector"></div>

            {{-- Level 2: Pembimbing Siswa --}}
            <div class="org-level">
                <div class="org-node org-node--accent">
                    <div class="org-node__icon">
                        <i class="fa-solid fa-chalkboard-user"></i>
                    </div>
                    <div class="org-node__body">
                        <div class="org-node__role">Pembimbing Siswa</div>
                        <div class="org-node__name">Dede Hermansyah, S.Si</div>
                    </div>
                </div>
            </div>

            <div class="org-connector"></div>

            {{-- Level 3: Ketua Rayon --}}
            <div class="org-level">
                <div class="org-node org-node--gold">
                    <div class="org-node__icon">
                        <i class="fa-solid fa-crown"></i>
                    </div>
                    <div class="org-node__body">
                        <div class="org-node__role">Ketua Rayon (XI)</div>
                        <div class="org-node__name">Teuku Adhilla Rafa</div>
                    </div>
                </div>
            </div>

            <div class="org-connector"></div>

            {{-- Level 4: Wakil Ketua --}}
            <div class="org-level">
                <div class="org-node org-node--teal">
                    <div class="org-node__icon">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                    <div class="org-node__body">
                        <div class="org-node__role">Wakil Ketua Rayon (X)</div>
                        <div class="org-node__name">Dzakwan Nur Aqli</div>
                    </div>
                </div>
            </div>

            <div class="org-connector"></div>

            {{-- Level 5: Sekretaris & Bendahara --}}
            <div class="org-level org-level--duo">
                <div class="org-bridge org-bridge--duo"></div>
                <div class="org-node org-node--purple">
                    <div class="org-node__icon">
                        <i class="fa-solid fa-file-pen"></i>
                    </div>
                    <div class="org-node__body">
                        <div class="org-node__role">Sekretaris</div>
                        <ol class="org-node__list">
                            <li>Maurida Pebriani</li>
                            <li>Aisyah</li>
                        </ol>
                    </div>
                </div>
                <div class="org-node org-node--rose">
                    <div class="org-node__icon">
                        <i class="fa-solid fa-wallet"></i>
                    </div>
                    <div class="org-node__body">
                        <div class="org-node__role">Bendahara</div>
                        <ol class="org-node__list">
                            <li>Siti Robiah Al Adawiah</li>
                            <li>Kairo</li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="org-connector"></div>

            {{-- Level 6: Seksi-Seksi --}}
            <div class="org-sections-wrap">
                <div class="org-bridge org-bridge--wide"></div>
                <div class="org-sections">

                    <div class="org-section-card org-section-card--green">
                        <div class="org-section-card__header">
                            <span class="org-section-card__icon">
                                <i class="fa-solid fa-broom"></i>
                            </span>
                            <h3>Seksi Kebersihan</h3>
                            <span class="org-section-card__sub">Tim Adiwiyata</span>
                        </div>
                        <ol class="org-section-card__list">
                            <li>Mayang</li>
                            <li>Cahya Gilang Permana</li>
                            <li>&mdash;</li>
                            <li>Qaireen</li>
                            <li>Kiandra</li>
                        </ol>
                    </div>

                    <div class="org-section-card org-section-card--blue">
                        <div class="org-section-card__header">
                            <span class="org-section-card__icon">
                                <i class="fa-solid fa-heart-pulse"></i>
                            </span>
                            <h3>Seksi Kesehatan</h3>
                        </div>
                        <div class="org-section-card__group">
                            <div class="org-section-card__group-label">Duta Gizi</div>
                            <ol class="org-section-card__list">
                                <li>Ahmad Luthfi Nizam</li>
                                <li>Jihan</li>
                            </ol>
                        </div>
                        <div class="org-section-card__group">
                            <div class="org-section-card__group-label">Peer Counselor (PC)</div>
                            <ol class="org-section-card__list">
                                <li>Sidqi Zaeda Arsy</li>
                                <li>Zalfa</li>
                            </ol>
                        </div>
                        <div class="org-section-card__group">
                            <div class="org-section-card__group-label">Duta Kesehatan</div>
                            <ol class="org-section-card__list">
                                <li>Kalista</li>
                                <li>Vadli</li>
                            </ol>
                        </div>
                    </div>

                    <div class="org-section-card org-section-card--violet">
                        <div class="org-section-card__header">
                            <span class="org-section-card__icon">
                                <i class="fa-solid fa-mosque"></i>
                            </span>
                            <h3>Seksi Kerohanian</h3>
                        </div>
                        <ol class="org-section-card__list">
                            <li>Shafa</li>
                            <li>Gibran Mahmud</li>
                        </ol>
                    </div>

                    <div class="org-section-card org-section-card--amber">
                        <div class="org-section-card__header">
                            <span class="org-section-card__icon">
                                <i class="fa-solid fa-shield-halved"></i>
                            </span>
                            <h3>Kedisiplinan</h3>
                        </div>
                        <ol class="org-section-card__list">
                            <li>Shafa Azahra</li>
                            <li>Ilyas</li>
                        </ol>
                    </div>

                    <div class="org-section-card org-section-card--cyan">
                        <div class="org-section-card__header">
                            <span class="org-section-card__icon">
                                <i class="fa-solid fa-laptop-code"></i>
                            </span>
                            <h3>Seksi KWH. &amp; TIK.</h3>
                            <span class="org-section-card__sub">Kelas XI</span>
                        </div>
                        <ol class="org-section-card__list">
                            <li>Andimas Ramadana</li>
                            <li>Fadli</li>
                        </ol>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection
