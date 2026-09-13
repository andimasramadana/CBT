@extends('layouts.app')

@section('title', 'Kelola Siswa - Admin')

@section('content')
<section class="section profile-management-page">
    <div class="container">
        <div class="section-header">
            <div class="section-label">Administrator</div>
            <h1 class="section-title">Kelola Profil Siswa</h1>
            <p class="section-description">Admin dapat mengubah seluruh biodata siswa.</p>
        </div>

        <div class="admin-student-list">
            @foreach($students as $student)
                <div class="admin-student-row">
                    <div class="admin-student-row__avatar">
                        @if($student->photo)
                            <img src="{{ asset('storage/'.$student->photo) }}" alt="Foto {{ $student->name }}">
                        @else
                            <i class="fa-solid fa-user"></i>
                        @endif
                    </div>
                    <div class="admin-student-row__info">
                        <strong>{{ $student->name }}</strong>
                        <span>{{ $student->nis }} · {{ $student->rombel }}</span>
                    </div>
                    <a href="{{ route('admin.students.edit', $student) }}" class="btn btn-secondary">Edit</a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
