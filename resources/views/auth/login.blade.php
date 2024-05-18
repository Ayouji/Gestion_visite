@extends('layouts.app')

@section('title', 'Register')
@section('content')
    <section>
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-6  col-sm-8 col-md-6 m-auto ">
                    <div class="card border-0 shadow" >
                        {{-- <div class="card-body"> --}}
                        <svg class="mx-auto my-3" xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                            fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                        <div class="card-body">
                            @if (session('fail'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('fail') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                            <form action="{{ route('auth.login') }}" method="post">
                                @csrf
                                <div class="mb-3 text-left">
                                    <label for="email" class="form-label text-left" >Email :</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 text-left">
                                    <label for="password" class="form-label" >Mot passe :</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot passe">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <button class="btn " type="submit">Login</button>
                                <a href="{{ route('auth.forgot') }}" class="">Forgot Password</a>
                                <a href="{{ url('register') }}" class="btne btn-link ">Register</a>
                            </div>
                            </form>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
