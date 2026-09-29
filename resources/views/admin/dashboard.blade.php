@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

<section class="section">

    <div class="container">

        <div class="section-header">

            <div class="section-label">
                Administrator
            </div>

            <h1 class="section-title">
                Dashboard Admin
            </h1>

            <p class="section-description">
                Kelola data Rayon Cibedug 1
                melalui dashboard administrator.
            </p>

        </div>


        <div class="cards">

            <a href="{{ route('admin.students.index') }}" class="card">

                <div class="card-icon">
                    <i class="fa-solid fa-users"></i>
                </div>

                <h3>
                    Data Siswa
                </h3>

                <p>
                    Kelola profil siswa Rayon Cibedug 1.
                </p>

            </a>


            <a href="{{ route('admin.duty-schedule.index') }}" class="card">

                <div class="card-icon">
                    <i class="fa-solid fa-calendar-check"></i>
                </div>

                <h3>
                    Jadwal Piket
                </h3>

                <p>
                    Kelola jadwal piket rayon harian.
                </p>

            </a>

        </div>

    </div>

</section>

@endsection