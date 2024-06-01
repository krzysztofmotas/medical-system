@extends('shared.template')

@section('head')
    <link rel="stylesheet" href="{{ asset('vendor/css/pages/page-auth.css') }}" />
@endsection

@section('title', 'Logowanie')

@section('body')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <div class="app-brand justify-content-center">
                            <a href="#" class="app-brand-link gap-2">
                                <span class="app-brand-text demo text-body fw-bolder">
                                    <i class="bx bx-plus-medical me-1 text-primary"></i>
                                    medical system
                                </span>
                            </a>
                        </div>

                        <h4 class="mb-2">Witaj w systemie zarządzania placówką medyczną! 👋</h4>
                        <p class="mb-3">Zaloguj się na swoje konto, aby skorzystać z wszystkich funkcjonalności systemu.
                        </p>

                        <form class="mb-3" action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Imię</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Podaj swoje imię" value="{{ old('name') }}" autofocus required />
                                @error('name')
                                    <div class="form-text text-warning">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Nazwisko</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="Podaj swoje nazwisko" value="{{ old('last_name') }}" required />

                                @error('last_name')
                                    <div class="form-text text-warning">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" value="{{ old('is_doctor') }}" type="checkbox" name="is_doctor" id="is_doctor">
                                    <label class="form-check-label" for="is_doctor">Jestem lekarzem</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Zaloguj się</button>
                            </div>
                        </form>

                        <p class="text-center">
                            Chcesz być pacjentem naszej placówki?<br>
                            <a href="{{ route('register') }}">Załóż konto</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
