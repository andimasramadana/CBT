@extends('layouts.app')

@section('title', 'Admin - Rayon Cibedug 1')

@section('content')

<section class="section">

    <div class="container">

        <div style="
            max-width: 450px;
            margin: auto;
        ">

            <div class="section-header">

                <div class="section-label">
                    Administrator
                </div>

                <h1 class="section-title">
                    Login Admin
                </h1>

                <p class="section-description">
                    Masuk untuk mengelola data
                    Rayon Cibedug 1.
                </p>

            </div>


            <div class="card">

                <form method="POST"
                      action="{{ route('admin.login.process') }}">

                    @csrf

                    <div style="margin-bottom: 20px;">

                        <label>
                            Email atau username
                        </label>

                        <input
                            type="text"
                            name="login"
                            placeholder="admin atau email@example.com"
                            style="
                                width: 100%;
                                padding: 13px;
                                margin-top: 8px;
                                border: 1px solid #e2e8f0;
                                border-radius: 10px;
                            "
                        >

                    </div>


                    <div style="margin-bottom: 20px;">

                        <label>
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            placeholder="Password"
                            style="
                                width: 100%;
                                padding: 13px;
                                margin-top: 8px;
                                border: 1px solid #e2e8f0;
                                border-radius: 10px;
                            "
                        >

                    </div>


                    <button
                        type="submit"
                        class="btn btn-primary"
                        style="width: 100%; border: none; cursor: pointer;">

                        <i class="fa-solid fa-right-to-bracket"></i>

                        Masuk ke Admin

                    </button>

                </form>

            </div>

        </div>

    </div>

</section>

@endsection